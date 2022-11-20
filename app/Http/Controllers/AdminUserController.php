<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::paginate(50)
        ]);
    }
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User Deleted!');
    }

}
