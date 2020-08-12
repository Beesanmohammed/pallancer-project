@extends('layout.admin')
@section('content')

@if(session()->has('alert-success'))
<div class="alert alert-success">
  {{session('alert-success')}}
</div>
@endif
<div calss="cintainer">
  <div class="d-flex">
      <h1 class="h3 mb-4 text-gray-800">Categories</h1>
     <div class="ml-auto"> <a href="/admin/category/create" 
     class="btn-btn-outline-dark">create new </a> </div>
</div>

    <table class="table">
          <table class="table">
              <thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>created_at</th>
            <th>updated_ut</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        @foreach($categories as $cate)  
        <tbody> <tr>
          <td>{{$cate->id}}</td>
          <td>{{$cate->name}}</td>
          <td>{{$cate->updated_at}}</td>
          <td>{{$cate->created_at}}</td>
          <div class="d-flex">
          <td> <a href="/admin/category/{{$cate->id}}/edit"  class="btn btn-primary cursor-pointer"> Edit </td>
         <td> <form action="/admin/category/{{$cate->id}}/delete" method="post">
        <button type="submit" class="btn btn-danger cursor-pointer"><i class="fa fa-trash"></i></button>
        @method('delete')
        @csrf 
        </form>
           </td>
          </div>

          </tr>
@endforeach   
 </tbody>   
          </table>
          {{$categories->links()}}

            
        @endsection