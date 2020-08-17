@extends('layout.admin')
@section('content')


<form action="/homepage/usercontact" method="post">

@csrf
<div calss="cintainer">
        <h1 class="h3 mb-4 text-gray-800">message's Management</h1>
        <br><br>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>E-mail</th>
                    <th>Subject</th>
                    <th>connect</th>
                </tr>
            </thead>
            @foreach($msgs as $msg)
            <tbody>
                <tr>
                    <td>{{$msg->id}}</td>
                    <td>{{$msg->name}}</td>
                    <td>{{$msg->email}}</td>
                    <td>{{$msg->subject}}</td>
                    <td> <a href="{{asset('https://mail.google.com/')}}" 
                    class="btn btn-primary ml-1"> connect </td>

                    
                </tr>
                @endforeach
            </tbody>
        </table>
</div>




</form>

  @endsection