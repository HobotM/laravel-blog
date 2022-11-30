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
            'users' => User::paginate(50)
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
