@extends('layout.admin')
@section('content')

@include('library.books._alert')
<div calss="cintainer">
    <div class="d-flex">
        <h1 class="h3 mb-4 text-gray-800">Books</h1>
        <div class="ml-auto"> <a href="{{asset('/admin/book/create')}}" 
        class="btn-btn-outline-dark">create new </a> </div>
    </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>category_id</th>
                    <th>discription</th>
                    <th>image</th>
                    <th>auther</th>

                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @foreach($book as $bk)
            <tbody>
                <tr>
                    <td>{{$bk->id}}</td>
                    <td>{{$bk->name}}</td>
                    <td>{{$bk->category_id}}</td>
                    <td>{{$bk->discription}}</td>
                    <td><img height="55" src="{{asset('images/books/' .$bk->image)}}"></td>
                    <td>{{$bk->auther}}</td>

                    <div class="d-flex">
                    <td> <a href="/admin/book/{{$bk->id}}/edit" class="btn btn-primary ml-1"> Edit </td>
                    <td> <form action="/admin/book/{{$bk->id}}/delete" method="post">
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