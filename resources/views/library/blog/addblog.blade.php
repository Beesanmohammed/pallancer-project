@extends('layout.admin')
@section('content')

      <h1>create Blog </h1>
  <form action="/admin/blog/store" method="post" enctype="multipart/form-data">
  @csrf
 @include('library.blog._form', [
  'blogs'=>new App\Blog(),
  
  ]);
  

  </form>
  
        @endsection