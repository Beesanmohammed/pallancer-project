@extends('layout.admin')
@section('content')

@include('library.books._alert')
<div calss="cintainer">
    <div class="d-flex">
        <h1 class="h3 mb-4 text-gray-800">Blogs</h1>
        <div class="ml-auto"> <a href="{{asset('/admin/blog/create')}}" 
        class="btn-btn-outline-dark">create new </a> </div>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>discription</th>
                    <th>image</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            @foreach($blogs as $blog)
            <tbody>
                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->discription}}</td>
                    <td><img height="55" src="{{asset('images/books/' .$blog->image)}}"></td>
                    
                    <div class="d-flex">
                    <td> <a href="/admin/blog/{{$blog->id}}/edit" class="btn btn-primary ml-1"> Edit </td>
                    <td> <form action="/admin/blog/{{$blog->id}}/delete" method="post">
                            <button type="submit"class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                             </button>
                           
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </div>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection