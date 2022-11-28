<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Foundation\Auth\RegistersUsers;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;

    use Illuminate\Http\Request;
    use Illuminate\Auth\Events\Registered;
    use Jrean\UserVerification\Traits\VerifiesUsers;
    use Jrean\UserVerification\Facades\UserVerification;
    use Illuminate\Validation\Rule;
    use App\Notifications\WelcomeEmail;
    use App\Models\User;


    class RegisterController extends Controller
    {
        /*
        |--------------------------------------------------------------------------
        | Register Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles the registration of new users as well as their
        | validation and creation. By default this controller uses a trait to
        | provide this functionality without requiring any additional code.
        |
        */

        use RegistersUsers;

        use VerifiesUsers;

        /**
         * Where to redirect users after registration.
         *
         * @var string
         */
        protected $redirectTo = '/email-verification';

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            // Based on the workflow you need, you may update and customize the following lines.

            $this->middleware(['guest'], ['except' => ['getVerification', 'getVerificationError', 'awaitingVerification']]);
        }

        public function showRegistrationForm(){
            return view('register.create');
        }

        public function awaitingVerification(){
            return view('register.verify');
        }

        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
        protected function validator(array $data)
        {

            return Validator::make($data, [
                'name'=> ['required','max:255'],
                'username'=>['required','max:255','min:3',Rule::unique('users','username')],
                'email' => ['required','email','max:255', Rule::unique('users','email')],
                'password' => ['required','max:255','min:8']
            ]);
        }

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return User
         */
        protected function create(array $data)
        {
            return User::create($data);
        }

        /**
         * Handle a registration request for the application.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function register(Request $request)
        {
            $this->validator($request->all())->validate();

            $user = $this->create($request->except(['_token']));

            event(new Registered($user));

            $this->guard()->login($user);

            UserVerification::generate($user);

            UserVerification::send($user, 'SpeakUp - Email Verification');

            $user->notify(new WelcomeEmail($user));

            return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
        }
    }
