<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function manage_post(){

        $post = Post::with('user')->get();
        return view('posts.manage',[
            'posts' => $post,
        ]);
    }

     public function create_post(){
        return view('posts.create');
    }
     public function edit_post(){
        return view('posts.edit');
    }

}
