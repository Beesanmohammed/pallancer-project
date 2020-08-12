@extends('layout.front')
@section('content')

<section id="service" class="service-section pt90 pb40">
    <div class="container">
        <div class="row">
            <div class="section-title text-capitalize deep-black pb75">


                <br><br>
                <div class="container">
                    <h2>Book information</h2>
                    <br>
                    <div class="d-flex">
                        <div>
                            <img style="border: 5px solid #555" height="170" width="200"
                             src="{{asset('images/books/' .$bk->image)}}" alt="Avatar woman">
                        </div>
                        <div>
                            <p>Book Name : {{$bk->name}} </p>
                            <p>Category : {{$bk->category->name}}</p>
                            <p>Book auther : Name{{$bk->auther}}</p>
                        </div>
                    </div>
                    <div>
                        <p>Book discription :{{$bk->discription}}</p>
                    </div>

                       <a href="{{url('images/books/bookPDF/' .$bk->file)}}"> <button class="btn">
                           <i class="fa fa-download"></i> Download</button> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection