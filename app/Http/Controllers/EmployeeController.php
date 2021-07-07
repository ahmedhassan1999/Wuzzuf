<?php

namespace App\Http\Controllers;

use App\Models\Accepting;
use App\Models\User;
use App\Models\Cv;
use App\Models\Post;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function make()
    {
        $user = Auth::user();

        //$image=Auth::user()->cvs->post_image->count();,Auth::id()
        $res = Cv::where('user_id', Auth::user()->id)->count();
        if ($res == 0) {
            $image = " ";
        } else {
            $image = Auth::user()->cvs->post_image;
        }

        return view('employeeprofile', ['image' => $image, 'user' => $user]);
    }
    public function save(Request $request)
    {
        // return dd(request('age'));


        $inputs = request()->validate([
            'name' => 'required|min:3|max:255',
            'age' => 'required',
            'specialization' => 'required',
            'post_image' => ['file'],
        ]);
        // return dd($inputs);


        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->storePublicly('images');
            //return dd($request->image);
        }
        // return dd(request('age'));

        auth()->user()->cvs()->create($inputs);
        return back();
    }
    public function applay(Post $post)
    {

        $user_cv_id = Auth::user()->cvs->id;
        $row = DB::table('cv_post')
        ->where('post_id', '=', $post->id)
        ->where('cv_id', '=', $user_cv_id)->get();
            if(count($row)!=0)
            {
                Session()->flash('applay', ' you have applayed in this before ');
                return back();
            }
            else
            {
                $post->cvs()->attach($user_cv_id, ['company_id' => $post->user_id, 'company_name' => $post->nameofcompany]);
                Session()->flash('applay', ' Done! you have applied in' .  ' ' . $post->nameofcompany . ' company successfully  ');
                return back();

            }




    }
    public function notification()
    {
        $user = User::find(Auth::user()->id);
       // $user = Auth::user();

        //$image=Auth::user()->cvs->post_image->count();,Auth::id()
        $res = Cv::where('user_id', Auth::user()->id)->count();
        if ($res == 0) {
            $image = " ";
        } else {
            $image = Auth::user()->cvs->post_image;
        }

        return view('notification', ['user' => $user,'image' => $image]);
    }
}
