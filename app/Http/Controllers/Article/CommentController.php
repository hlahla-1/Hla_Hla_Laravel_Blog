<?php

namespace App\Http\Controllers\Article;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create()
    {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        if(Gate::allows('comment-delete',$comment)){
            $comment->delete();
            return back();
        }
        else{
            return back()->with('error','Unauthorize');
        }

        // if(Gate::denies('comment-delete', $comment)) {
        //     return back()->with('error', 'Unauthorize'); 
        // }
        // $comment->delete();
        // return back();
           
        
        // if($comment->user_id==auth()->user()->id){
        //     $comment->delete();
        //     return back();
        // }
        // else{
        //     return back()->with('error','Unauthorize');
        // }
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
