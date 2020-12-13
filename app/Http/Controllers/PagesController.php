<?php

namespace App\Http\Controllers;
use Auth;
use App\Blog;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PagesController extends Controller
{
    //
    public function redirect(){
        // if(Auth::guest()){
        //     return redirect('/login');
        // }else{
        //     return redirect('/home');
        // }
        return redirect('/home');
    }

    public function create(){ 
        if(Auth::guest()){
            return redirect('/login');
        }else{
            return view("pages.create");
        }
        
    }

    public function store(Request $request){
        if (Auth::guest()) {
            return redirect('/login');
        } 
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required',
        ]);
        $blog = new Blog;
        $blog->title=$request->input('title');
        $blog->subtitle=$request->input('subtitle');
        $blog->body=$request->input('body');
        $blog->user_id = Auth::id();
        $blog->user_name = Auth::user()->name;
        $blog->save();
        return redirect('/home')->with('success','Blog Created');
        
    }

    public function delete(Request $request,$id){
        $blog = Blog::find($id);
        if(Auth::id() != $blog->user_id && !Auth::user()->is_admin){
            abort(403);
        }

        $blog->delete();
        return redirect('/home')->with('success','Blog Removed');
    }

    public function update(Request $request,$id){ 
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required',
        ]);
        $blog = Blog::find($id);
        if (Auth::id() != $blog->user_id && !Auth::user()->is_admin) {
            abort(403);
        }
        $blog->title=$request->input('title');
        $blog->subtitle=$request->input('subtitle');
        $blog->body=$request->input('body');
        $blog->save();
        return redirect('/show/'.$id)->with('success','Blog Updated');
        
    }

    public function user(Request $request, $id)
    {
        $user = User::find($id)->name;
        $blogs = Blog::where('user_id', $id)->orderBy('created_at', 'DESC')->paginate(2);
        return view('pages.user')->with('blogs', $blogs)->with('user',$user);
        
    }
}
