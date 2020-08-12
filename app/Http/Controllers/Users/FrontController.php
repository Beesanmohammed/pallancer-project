<?php

namespace App\Http\Controllers\Users;

use App\Blog;
use App\Book;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage(Request $request)
    {
        $books=Book::all();
        $categories=Category::withCount('books')->get();
        $blogs=Blog::all();

        return view('library.homepage')->with(['books'=>$books,'categories'=>$categories,'blogs'=>$blogs]);
    }

    public function blog(Request $request)
    {
        return view('library.front.blog');
    }

    public function aboutus(Request $request)
    {
        return view('library.front.aboutus');
    }


    public function bookDiscription($id)
    {
        $books=Book::findOrfail($id);
        return view('library.front.bookDiscription')->with('bk',$books);
    }
    




    public function contact(Request $request)
    {
        return view('library.front.contact');
    }

    public function send(Request $request)
    {
        $books=Book::all();
        $categories=Category::withCount('books')->get();
        $blogs=Blog::all();

        return redirect ('/')->with(['books'=>$books,'categories'=>$categories,'blogs'=>$blogs]);
    
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        //
    }

 

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
