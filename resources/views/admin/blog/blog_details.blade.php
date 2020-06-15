@extends('layouts.dashboard_master')
@section('title')
  Blog Post
@endsection
@section('blog')
  active
@endsection

@section('content')
  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Blog Post</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('admin/blog/post') }}">Post</a></li>
                      <li class="breadcrumb-item active">Blog Post</li>
                  </ul>
                  <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
              </div>
              <div class="col-lg-5 col-md-6 col-sm-12">
                  <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
              </div>
          </div>
      </div>

      <div class="container-fluid">
        <div class="row clearfix">
          <div class="col-8 m-auto">
            <div class="card mt-4">
              <div class="blogitem mb-5">
                  <div class="blogitem-image">
                      <img src="{{ asset('uploads/posts') }}/{{ $post->post_picture }}" alt="blog image" width="100%">
                      <span class="blogitem-date">{{ $post->created_at->format("D - M - Y") }}</span>
                  </div>
                  <div class="blogitem-content">

                      <h5 class="text-info">{{ $post->post_title_en }}</h5>

                      {!! $post->post_details_en !!}
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>

    </section>

@endsection
