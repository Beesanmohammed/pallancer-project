@extends('layout.front')
@section('content')
	<!-- Start of page head section
		============================================= -->
			<!-- End of page head section
		============================================= -->
		<br><br><br>
		<br>
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="{{asset('images/books/pexels-photo-1031588.jpeg')}}" >
  <div class="text">The world was hers for the reading .

</div>
</div>

<div class="mySlides fade">
  <img src="{{asset('images/books/pexels-photo-2465877.jpeg')}}" >
  <div class="text">Reading brings us unknown friends .</div>
</div>

<div class="mySlides fade">
  <img src="{{asset('images/books/pexels-photo-904616.jpeg')}}" >
  <div class="text ">A good book is an event in my life.</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none; }
img {vertical-align: middle;}
.mySlides {
	display: none;
	

}

/* Slideshow container */
.slideshow-container {
  position: relative;
}

/* Caption text */
.text {
  color:black;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
  background-color: #ffffff6b;
  margin:left;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 4.0s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3.0s;
  animation-name: fade;
  animation-duration: 3.0s;
  height:600px;
   width:1550px;
}
.fade img{
	object-fit:cover;
	height:100%;
   width:100%;
}


@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>




	<!-- Start of portfolio section
		============================================= -->
		<section id="portfolio" class="portfolio-section">
			<div class="container">
				<div class="row">
					<div class="portfolio-content">
						<div class="portfolio-tab pb55">
							<div id="filters" class="button-group pb45">
							<button class="tab-button active" data-filter="*">All categories<span>{{$categories->count()}}</span></button>
						@foreach($categories as $category)

								<button class="tab-button" data-filter=".cat-{{$category->id}}">{{$category->name}}<span>{{$category->books_count}}</span></button>
								@endforeach
							<!-- /tab-button -->

							<div class="portfolio-tab-text-pic row">
								<div id="posts">
									@foreach($books as $book)
									<div id="1" class="item item-grid cat-{{$book->category_id}}">
										<div class="item-wrap">
											<div class="work-item">
												<div class="work-pic">
													<img src="{{asset('images/books/'.$book->image)}}" alt="image">
												</div>
												<!-- //img -->
												<div class="hover-content">
													<div class="hover-text text-center">
														<a href="{{asset('images/books/'.$book->image)}}" 
														data-lightbox="roadtrip"><span class="ti-fullscreen"></span></a>
													</div>
													<!-- //light-box-img -->
													<div class="project-description text-uppercase ul-li">
														<h3><a href="{{ route('bookDiscription',$book->id)}}">{{$book->name}}</a></h3>
														<ul class="project-catagorry text-capitalize">
															<li>{{$book->auther}} </li>

														</ul>
													</div>
													<!-- //project-description -->
												</div>
											</div>
										</div>
									</div>
									@endforeach
									<!-- /item -->

									
								</div><!--//posts-->
							</div><!--//portfolio-tab-text-pic-->
						</div><!--//portfolio-tab-->


						
						</div>
						<!-- //.more -->

					</div><!--//portfolio-content -->
				</div><!--  /.row -->
			</div><!--  /.conatiner -->
		</section>
	<!-- End of portfolio section
		============================================= -->



	<!-- Start of our Add Book section
		============================================= -->
		<section id="service" class="service-section pt90 pb40" >
			<div class="container" style="border: 5px solid #555" height="" width="70%">
				<div class="">
					<br>  <div class="section-title text-capitalize deep-black pb75 center">
						<a id="book"></a><h2>Add Book</h2>
						<br> 
						<form action="{{route('storebook')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">

    <label for="name">Name</label>
	<input type="text" class="form-control @error('name') is-invalid @enderror" 
	name="name" id="name">
    @error('name')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">category ID</label>
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="{{old('category_id'),$book->category_id}}">Select Category</option>

        @foreach (App\Category::all() as $cat)

        <option value="{{ $cat->id }}" > {{ $cat->name }}</option>

        @endforeach

    </select>
    @error('category_id')
    <p class="text-danger">{{ $message }}</p> 
    @enderror

</div>

  	<div class="form-group">
    <label for="auther">auther</label>
	<input type="text" class="form-control @error('auther') is-invalid @enderror" 
	name="auther" id="auther">

    @error('auther')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="discription">discription</label>
	<input type="text" class="form-control @error('discription') is-invalid @enderror"
	 name="discription" id="discription">
    @error('discription')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="image">image</label>
    <div class="d-flex">
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
         id="image">
    </div>
    @error('image')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<div class="form-group">
    <label for="file">File</label>
    <div class="d-flex">
        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file"
         id="file">
    </div>
    @error('file')
    <p class="text-danger">{{$message}}></p>
    @enderror
</div>

<button type="submit" class="btn btn-primary"><i class="fa fa-folder">save</i></button>
						</form>


					</div>
				</div>
			</div>
		</section>
	
		

	<!-- End of our Add Book section
		============================================= -->


	<!-- Start of our service section
		============================================= -->
		 <section id="service" class="service-section pt90 pb40">
			<div class="container">
				<div class="row">
					<div class="section-title text-capitalize deep-black pb75">
						<a id="#foot"> </a><h2 >Our latest blog</h2>
					</div>
					@foreach($blogs as $blog)
					<!-- //title -->

					<div class="latest-blog-content">
						<div class="row">

							<div class="col-md-4">
								<div class="latest-blog-text-pic">
									<div class="latest-blog-img mb10"> 
	           <img src="{{asset('images/books/'.$blog->image)}}" alt="image">
									
										</div>
									</div>
										<!-- //.blog-head -->
										<div class="blog-details mt15">
											<p>
											{{$blog->discription}}											</p>
										</div>
									
										

								</div>
								<!-- //.latest-blog-text-pic -->
							@endforeach
							</div>
							<!-- //.col-md-4 -->


							
		</section>

	<!-- End of our service section
        ============================================= -->
        @endsection