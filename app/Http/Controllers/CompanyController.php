<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Report;
use App\Models\Accepting;
use Illuminate\Http\Request;
use DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Cv;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $posts = Post::where('user_id', Auth::user()->id)
            ->join('cv_post', 'posts.id', "=", 'cv_post.post_id')
            ->select(
                'posts.id as id',
                'posts.created_at as created_at',
                'posts.updated_at as updated_at',
                'posts.nameofcompany as nameofcompany',
                'posts.post_image as post_image',
                'posts.body as body',
                'posts.title as title',
                'posts.user_id as user_id',
            )
            ->distinct()
            ->get();

        return view('showapplied', ['user' => $user, 'posts' => $posts]);
    }
    public function Accept(Post $post, Cv $cv)
    {
        $row = DB::table('cv_post')
            ->where('post_id', '=', $post->id)
            ->where('cv_id', '=', $cv->id)
            ->delete();
        $cv_employee = Cv::find($cv->id);
        $accepted = 1;
        $user = User::find($cv_employee->user_id);
        $user->notify(new \App\Notifications\PostNewNotification($post, $cv, $accepted));
        return back();
    }
    public function Reject(Post $post, Cv $cv)
    {
        
        $row = DB::table('cv_post')
            ->where('post_id', '=', $post->id)
            ->where('cv_id', '=', $cv->id)
            ->delete();
        $cv_employee = Cv::find($cv->id);
        $accepted = 0;
        $user = User::find($cv_employee->user_id);
        $user->notify(new \App\Notifications\PostNewNotification($post, $cv, $accepted));
        return back();
    }
}
