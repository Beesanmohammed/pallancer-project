@extends('layout.admin')
@section('content')
      <h1>edit category </h1>
      
  <form action="/admin/category/{{$category->id}}/update" method="post">
  @csrf 
  @method('put')
  <div class="form-group">
  <label for="name">Name</label>
        <input type="text" class="form-control"
         name="name" id="name" value="{{$category->name}}">
            <button type="submit" class="btn btn-primary">Update</button>
</div>
</form> 
 
@endsection