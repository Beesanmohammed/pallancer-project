@extends('layout.front')
@section('content')
<br>
<br>
<br>
<br>
<br>



    <div class="container">
  <form action="/homepage/send" method="post">
@csrf
    <label for="name"> Name</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="email">email</label>
    <input type="text" id="email" name="name" placeholder="Your email name..">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
    <div class="d-flex">

    <input type="submit" value="Submit">


  </form>
  
</div>
               
<style>input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
           
</style>

@endsection
