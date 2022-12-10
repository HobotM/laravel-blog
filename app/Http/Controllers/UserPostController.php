<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Storage;


class UserPostController extends Controller
{

    public function index()
    {
        return view('user.posts.index', [
            'posts' => Post::paginate(50)->where('user_id', auth()->id())
        ]);
    }
    public function create()
    {
        return view('user.posts.create');
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {

        $path = $post->thumbnail;
        if($path === null)
        {
            $post->delete();
            return back()->with('success', 'Post Deleted!');
        }

        elseif(Storage::disk('public')->exists($path))
        {
            Storage::disk('public')->delete($path);

            $post->delete();

            return back()->with('success', 'Post Deleted!');
        }


    }

    public function profile(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|string',

        ]);
        
        $user->update($attributes);
        $user->save();

        return back()->with('success', 'User details Updated!');
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('/images/thumbnails')
        ]));

        return redirect('/');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image', 'max:15000'] : ['required', 'image', 'max:15000'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }

    public function edit(Post $post, User $user)
    {
        if ($post->user_id !== auth()->id()){
            abort(403);
        }
        else {
            return view('user.posts.edit', ['post' => $post]);
        }
    }
}
