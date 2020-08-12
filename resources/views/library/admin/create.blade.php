@extends('layout.admin')
@section('content')

      <h1>create category </h1>
  <form action="/admin/category/store" method="post">
  @csrf
  <div class="form-group">

  <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
         name="name" id="name" >
         @error('name')
         <p class="text-danger">{{$message}}
           @enderror
</div>
            <button type="submit" class="btn btn-primary">Add</button>
  </form>
  
        @endsection