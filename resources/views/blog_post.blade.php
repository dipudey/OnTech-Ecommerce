@extends('layouts.frontend_master')
@section('title')
  Post
@endsection
@section('add_css')
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/blog_single_styles.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets') }}/styles/blog_single_responsive.css">
@endsection
@section('frontend_content')

  <!-- Home -->

	{{-- <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url({{ asset('uploads/posts/'.$post->post_picture) }});" data-speed="0.8"></div>
	</div> --}}
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-8 m-auto">
          <img src="{{ asset('uploads/posts/'.$post->post_picture) }}" alt="" width="100%">
        </div>
      </div>
    </div>
  </div>

	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">
            @if (Session::has('lang'))
              {{ $post->post_title_bn }}
            @else
              {{ $post->post_title_en }}
            @endif
          </div>
					<div class="single_post_text">
						@if (Session::has('lang'))
              {!! $post->post_details_bn !!}
            @else
              {!! $post->post_details_en !!}
            @endif
          </div>
				</div>
			</div>
		</div>
	</div>

  <!-- Blog Posts -->

  <div class="blog">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
            @foreach($related_posts as $related_post)
              <!-- Blog post -->
              <div class="blog_post">
                <div class="blog_image" style="background-image:url({{ asset('uploads/posts/'.$related_post->post_picture) }})"></div>
                <div class="blog_text">
                  <h4>
                    @if (Session::has('lang'))
                        {{ $related_post->post_title_bn }}
                    @else
                        {{ $related_post->post_title_en }}
                    @endif
                  </h4>
                  @if (Session::has('lang'))
                      {!! Str::limit($related_post->post_details_bn,80) !!}
                  @else
                      {!! Str::limit($related_post->post_details_en,80) !!}
                  @endif
                </div>
                <div class="blog_button"><a href="{{ url('blog/post/'.$related_post->id) }}">
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
    </div>
  </div>




  <!-- Newsletter -->
  @include('layouts.frontend_newslatter')

@endsection
@section('js_script')
  <script src="{{ asset('frontend_assets') }}/js/blog_single_custom.js"></script>
@endsection
