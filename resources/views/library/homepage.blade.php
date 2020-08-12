@extends('layout.front')
@section('content')
	<!-- Start of page head section
		============================================= -->
		<section id="page-head" class="page-head-section">
			<div class="page-head-overlay"></div>
			<div id="page-head-effect" class="page-head-effect">
				<canvas id="demo-canvas"></canvas>
				
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>

  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="url(../img/banner/img1.jpg)" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="url(../img/banner/img2.jpg)" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="url(../img/banner/img3.jpg)" alt="Third slide">
	</div>
	<div class="carousel-item">
      <img class="d-block w-100" src="url(../img/banner/img4.jpg)" alt="Fourth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
					
							<!-- /.page-head-social -->
						</div>
						<!-- /.page-head-content -->
					</div>
				</div><!--  /.row-->
			</div><!--  /.container -->
		</section>
	<!-- End of page head section
		============================================= -->





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





	<!-- Start of our service section
		============================================= -->
		<section id="service" class="service-section pt90 pb40">
			<div class="container">
				<div class="row">
					<div class="section-title text-capitalize deep-black pb75">
						<h2 id="foot">Our latest blog</h2>
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