<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminPostController;



class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::paginate(50)->where('isAdmin', '0')->where('isSuperAdmin', '0')
        ]);
    }
    public function admins()
    {
        return view('admin.user.admins', [
            'users' => User::paginate(50)->where('isAdmin', '1')
        ]);
    }
    public function SuperAdmins()
    {
        return view('admin.user.superAdmins', [
            'users' => User::paginate(50)->where('isSuperAdmin', '1')
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'isAdmin' => 'nullable|boolean',

        ]);
        $user->isAdmin = !!$user->isAdmin;
        $user->update($attributes);
        $user->save();

        return back()->with('success', 'User details Updated!');
    }

    public function destroy(User $user)
    {
        if(request()->user()->id !== $user->id){
            $user->posts->each(function ($post) {
                if(Storage::disk('public')->exists($post->thumbnail))
                {
                    Storage::disk('public')->delete($post->thumbnail);
                    $post->delete();
                }
            });
            $user->delete();

            return back()->with('success', 'User Deleted!');
        }
        else
        return back()->with('error', 'Cannot delete');

    }

}
