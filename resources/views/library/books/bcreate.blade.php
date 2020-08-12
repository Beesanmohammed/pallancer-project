@extends('layout.admin')
@section('content')

    <h1>create Book </h1>
  <form action="/admin/book/store" method="post" enctype="multipart/form-data">
 @include('library.books._form', [
  'book'=>new App\Book(),
  'gallary'=>[],
  
  ]);
  

  </form>
  
        @endsection