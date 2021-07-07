<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Cv;
use App\Models\Comment;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appear = 0;


        $user = Auth::user();
        $user_id = Auth::user();
        $posts = Post::all();
        $image = " not yet";
        $res = Cv::where('user_id', Auth::user()->id)->count();
        //  return dd($res);


        if ($res == 0) {
            $specialization = "please  create your  profile to offer our jops";
        } else {
            $appear = 1;

            $specialization = Auth::user()->cvs->specialization;
            $image = Auth::user()->cvs->post_image;
            $posts = Post::where('title', $specialization)->get();
        }
        /*$quary=$posts->comments;
        return $quary->id;*/



        if ($user->type == "company")
            return view('company')->with('user', $user);
        else
            return view('employee', ['user_id' => $user_id, 'posts' => $posts, 'user' => $user, 'specialization' => $specialization, 'image' => $image, 'appear' => $appear]);





    }
}
