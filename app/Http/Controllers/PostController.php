<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);

    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }




}
