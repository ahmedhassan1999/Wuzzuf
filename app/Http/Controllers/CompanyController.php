<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Cv;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $posts=Post::where('user_id',Auth::user()->id)->get();

      //  $cvs=$posts->cvs()->get();
      //return dd($cvs);

       // return(dd($cvs));
        return view('showapplied',['user'=>$user,'posts'=>$posts]);
    }
    public function Accept(Post $post,Cv $cv)
    {

        $cv_employee=Cv::find($cv->id);
            $cv_employee->company=$post->nameofcompany;
            $cv_employee->accept_or_not=1;
            $cv_employee->id_post=$post->id;
            $cv_employee->save();
            $user=User::find($cv_employee->user_id);
            $user->notify( new \App\Notifications\PostNewNotification($post,$cv));
            return back();

    }
}
