<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function write_comment(Request $request,$post_id)
    {
       // $img=Cv::where('user_id',Auth::user()->id )->first();
        //return $img->post_image;
        $exist_cv=Cv::where('user_id',Auth::user()->id)->get();
        if(count($exist_cv)==0)
        {
            Session()->flash('comment', 'you must write your cv first before write any comment ');

            return back();

        }else
        {
            $comment=new Comment();
            $comment->body=$request->write_comment;
            $comment->post_id=$post_id;
            $comment->user_id=Auth::user()->id;
            $comment->image= Auth::user()->cvs->post_image;
            $comment->save();
            return back();

        }






    }
}
