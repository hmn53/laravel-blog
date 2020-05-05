<?php

namespace App\Http\Controllers;
use Auth;
use App\Blog;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function redirect(){ 
        if(Auth::guest()){
            return redirect('/login');
        }else{
            return redirect('/home');
        }
    }

    public function create(){ 
        if(Auth::guest()){
            return redirect('/login');
        }else{
            return view("pages.create");
        }
        
    }

    public function store(Request $request){ 
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required',
        ]);
        $blog = new Blog;
        $blog->title=$request->input('title');
        $blog->subtitle=$request->input('subtitle');
        $blog->body=$request->input('body');
        $blog->save();
        return redirect('/home')->with('success','Blog Created');
        
    }

    public function delete(Request $request,$id){
        $blog = Blog::find($id);
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
        $blog->title=$request->input('title');
        $blog->subtitle=$request->input('subtitle');
        $blog->body=$request->input('body');
        $blog->save();
        return redirect('/show/'.$id)->with('success','Blog Updated');
        
    }
}
