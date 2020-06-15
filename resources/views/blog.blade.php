@extends('layouts.frontend_master')
@section('title')
  Blog
@endsection
@section('add_css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/blog_styles.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/blog_responsive.css">
@endsection
@section('frontend_content')

  <!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Technological Blog</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
            @foreach($posts as $post)
  						<!-- Blog post -->
  						<div class="blog_post">
  							<div class="blog_image" style="background-image:url({{ asset('uploads/posts/'.$post->post_picture) }})"></div>
  							<div class="blog_text">
                  <h4>
                    @if (Session::has('lang'))
                        {{ $post->post_title_bn }}
                    @else
                        {{ $post->post_title_en }}
                    @endif
                  </h4>
                  @if (Session::has('lang'))
                    {!! Str::limit($post->post_details_bn,100) !!}
                  @else
                    {!! Str::limit($post->post_details_en,100) !!}
                  @endif
                </div>
  							<div class="blog_button"><a href="{{ url('blog/post/'.$post->id) }}">
                  @if (Session::has('lang'))
                    পরবর্তী আরো পড়তে
                  @else
                    Continue Reading
                  @endif
                </a></div>
  						</div>
            @endforeach


					</div>
				</div>



			</div>
      <div class="mt-5">
        {{ $posts->links() }}
      </div>
		</div>
	</div>

	<!-- Newsletter -->
  @include('layouts.frontend_newslatter')

@endsection
@section('js_script')
  <script src="{{ asset('frontend_assets') }}/js/blog_custom.js"></script>
@endsection
