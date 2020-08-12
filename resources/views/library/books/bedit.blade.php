

@extends('layout.admin')
@section('content')
      <h1>Edit Book </h1>
      
      
  <form action="/admin/book/{{$book->id}}/update" method="post" enctype="multipart/form-data">
  @method('put')
 @include('library.books._form')
 

  </form>
    
@endsection