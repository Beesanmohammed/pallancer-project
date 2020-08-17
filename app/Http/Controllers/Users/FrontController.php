<?php

namespace App\Http\Controllers\Users;

use App\Blog;
use App\Book;
use App\Category;
use App\Contact;
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
 

    public function storebook (Request $request){
        $validation= $request->validate([
            'name'=>['required','string','unique:book,name', ] ,
            'image'=>'image',
            'auther'=>['required','string'],
            'discription'=>['required','string','min:3'],
            'file'=>'required|mimes:pdf',
        ]);
        $image_path=null;
        if($request->hasFile('image') && $request->file('image')->isValid() ){
       $image= $request->file('image');
       $image_path= $image->store('/','books'); 
        }
        
        $file_path=null;
        if($request->hasFile('file') && $request->file('file')->isValid() ){
       $file= $request->file('file');
      $file_path= $file->store('/','books'); 
        }

        $data=$request->all();
        $data['image']=$image_path;
        $data['file']=$file_path;

     $books =Book::create($data);           
      
        return redirect('/')
        ->with('alert-success','book created successfully :)');
            }
    


            public function contact(Request $request)
            {
                return view('library.front.contact');
            }
        
            public function send(Request $request)
            {
               $request->validate([
                      'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'subject' => ['required', 'string',],
                ]);
            
                Contact::create([
                    'name'=>$request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                ]); 
                            
                return redirect ('/homepage/contact')->with('your msg send thank you');
            
            }
 

            public function usercontact(Request $request)
            {
                
        $msgs=Contact::get();
                return view('library.front.usercontact')->with('msgs',$msgs);
                
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
