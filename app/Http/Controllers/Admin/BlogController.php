<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::paginate();
       return view('library.blog.blog')->with('blogs',$blogs);
        
    }


    public function create()
    {
        return view('library.blog.addblog');
    
    }

    public function store(Request $request)
    {
            $request->validate([
                'discription'=>['required','string','min:3'],
                'image'=>'image',
    
                
            ]);
          
            $image_path=null;
            if($request->hasFile('image') && $request->file('image')->isValid() ){
           $image= $request->file('image');
           $image_path= $image->store('/','books'); 
            }
    
            $data=$request->all();
            $data['image']=$image_path;
    
         $blogs =Blog::create($data);
    
            return redirect('admin/blog/index')
            ->with('alert-success','blog created successfully :)',$blogs ,'$blogs');
            
                  }
    

    public function show($id)
    {
    }

   
    public function edit($id)
    {
        $blogs =Blog::find($id);
        return view('library.blog.edit')->with('blogs',$blogs);
       
        
        }

    public function update (Request $request , $id){
        $request->validate([
            'image'=>('image'),
            'discription'=>['required','string','min:3']
            ]);

            $data=$request->all();
            $blogs =Blog::find($id);
    
            if($request->hasFile('image') && $request->file('image')->isValid() ){
                $image= $request->file('image');
    
                if($$blogs->image && Storage::disk('books')->exists($books->image)){
                $image_path= $image->storeAs('/',basename($blogs->image),'books');
             }
                else{
                    $image_path= $image->store('/','books'); 
                } 
            $data['image']=$image_path;
            }
            $blogs->update($data);
    
            return redirect('admin/blog/index')
            ->with('alert-success','blog updated successfully :)');        
    }
    
    
    public function delete ($id){
        $blogs =Blog::find($id)->delete();
        return redirect('admin/blog/index')
        ->with('alert-success','blog deleted successfully :)');        ;
}
}

   

   
