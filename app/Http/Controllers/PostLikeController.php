<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request){
        
        // check if user have already liked the post
        if($post->likedBy($request->user())){
            return back();
        }

        //create like in post
        Like::create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request){
        
        //using relationship user hasmany like
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
        
        // $like = Like::where([
        //     'post_id' => $post->id,
        //     'user_id' => $request->user()->id 
        // ]);

        // $like->delete();
        // return back();
    }
}
