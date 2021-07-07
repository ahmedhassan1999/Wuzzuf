<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function  create()
    {

        return view('createpost');
    }
    public function store(Request $request)
    {


        //dd(request()->all());
        $inputs = request()->validate([
            'title' => 'required|min:3|max:255',
            'post_image' => 'file',
            'body' => 'required',
            'nameofcompany' => 'required|min:3|max:255',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            //return dd($request->post_image);
        }


        auth()->user()->posts()->create($inputs);


        return back();
    }
}
