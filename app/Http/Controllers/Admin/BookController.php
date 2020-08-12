<?php

namespace App\Http\Controllers\Admin;
use App\Book;
use App\BookImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile ;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BookController extends Controller
{
    public function index(){ 
        

        $books=Book::get();
       return view('library.books.book')->with('book',$books);
     

    }
      public function create(Request $request){
        return view('library.books.bcreate');
    }   

    public function store (Request $request){
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
      
        return redirect('admin/book/index')
        ->with('alert-success','book created successfully :)');
            }
    
        public function edit ($id){ 
        $books=Book::find($id);
        $gallary=BookImage::where('book_id',$id)->get();
        return view('library.books.bedit',
        [
            'book'=>$books,
            'gallary'=>$gallary,
        ]);
        return view('library.books.bedit')->with('book',$books);    
    }

    public function update (Request $request , $id){
        $request->validate([
            'name'=>'required|string|unique:book,name,'.$id ,
            'image'=>('image'),
            'auther'=>['required','string'],
            'discription'=>['required','string','min:3'],
            ]);  

        $data=$request->except('image');
        $books =Book::find($id);
        
        if($request->hasFile('image') && $request->file('image')->isValid() ){
            $image= $request->file('image');

            if($books->image && Storage::disk('books')->exists($books->image)){
            $image_path= $image->storeAs('/',basename($books->image),'books');
         }
            else{
                $image_path[]= $image->store('/','books'); 
            } 
        $data['image']=$image_path;
        }

        if($request->hasFile('file') && $request->file('file')->isValid() ){
            $file= $request->file('file');

            if($books->file && Storage::disk('books')->exists($books->file)){
            $file_path= $file->store('/','books');
         }
            else{
                $file_path[]= $file->store('/','books'); 
            } 
        $data['file']=$file_path;
        }

        $books->update($data);

        DB::beginTransaction();
        try {

        if($request->hasFile('gallary')){
            $images= $request->file('gallary');
            foreach($images as $image){

                if($image->isValid()){
                 $image_path[]= $image->store('/','books');
                        BookImage::create([
                            'book_id'=>$books->id,
                            'path'=>$image_path,
                        ]);
                }
                 }
           } 
       DB::commit();
        }
        catch (Throwable $e) {
            DB::rollBack();
            return redirect('admin/book/index')
            ->with('alert-error',$e->getMessage());
            throw $e ; }
        

        return redirect('admin/book/index')
        ->with('alert-success','book updated successfully :)');


    }

public function delete ($id){
    
    $books =Book::find($id);
    $images=BookImage::where('book_id',$id)->get();

  //  BookImage::where('book_id',$id)->delete();
    $books->delete();
    
    if ($books->image){
        Storage::disk('books')->delete($books->image);
    }
    foreach($images as $image){
        Storage::disk('books')->delete($image->path);
    }

    return redirect('admin/book/index')
    ->with('alert-success','book deleted successfully :)');

}





    }

    
    
      