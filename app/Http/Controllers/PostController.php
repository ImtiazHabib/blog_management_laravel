<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function manage_post(){

        $post = Post::with('user')->get();
        return view('posts.manage',[
            'posts' => $post,
        ]);
    }

     public function create_post(Request $request){
        $request->validate([
             'name' =>['required'],
             'description' =>['required'],
             'date' =>['required'],
        ]);

        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->date = $request->date;

        $post->save();

        $posts = Post::all();

        return view('posts.manage',[
            'posts' => $posts,
        ]);
    }
     public function edit_post($id){
        $post = Post::where('id',$id)->get();
        return view('posts.edit',[
            'posts' => $post,
        ]);
    }

     public function create_post_page(){
        return view('posts.create');
     }

    public function update_post(Request $request){
        

        try{
              $request->validate([
              'name' =>['required'],
             'description' =>['required'],
             'date' =>['required'],
          ]);

          $post = Post::where('id',$request->post_id)->update([
                'name' =>$request->name,
                'description' =>$request->description,
                'date' =>$request->date,
          ]);

        
          $posts = Post::all();



           return view('posts.manage',[
            'posts' => $posts,
           ]);
        }catch(Throwable $e){
            Log::channel('post_error')->error('Post Update failed',[
                'message' =>$e->getMessage(),
                'line' =>$e->getLine(),
            ]);
        }
    }

    public function delete_post($id){
         $post = Post::where('id',$id)->delete();

         $posts = Post::all();

         return view('posts.manage',[
            'posts'=>$posts,
         ]);
    }

}
