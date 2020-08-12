<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Book;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index(){ 
        
        $categories=Category::paginate();
       return view('library.admin.categories')->with('categories',$categories);
     

    }
    public function show($id){
   
        $category = Category::findOrFail($id);
      return $category->books;
  }  

  public function create(Request $request){
 
    return view('library.admin.create');
}   

    public function store (Request $request){
        $request->validate([
            'name'=>['required','string',
            'unique:categories,name', 
            ]
        ]);
        Category::create([
            'name'=>$request->name,
        ]);
        return redirect('admin/category/index')
        ->with('alert-success','Category created successfully :)');
        
              }

    public function edit ($id){ 
        $category =Category::find($id);
        return view('library.admin.edit')->with('category',$category);
       
        
        }

    public function update (Request $request , $id){
        $category =Category::find($id);
        $category->update($request->all());
        return redirect('admin/category/index');

    }
public function delete ($id){
    $category =Category::find($id)->delete();
    return redirect('admin/category/index')
    ->with('alert-success','Category deleted successfully :)');
    ;


}

public function adminDashbord(Request $request)
{
    $books=Book::get();
    return view('library.admin.adminDashbord')->with('book',$books);
  
}



    }