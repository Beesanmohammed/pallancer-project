@extends('layout.admin')
@section('content')

      <h1>Edit Blog </h1>

      <form action="/admin/blog/{{$blogs->id}}/update" method="post" enctype="multipart/form-data">
  @method('put')
 @include('library.blog._form')
 


  </form>
  
        @endsection