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
                      <li class="breadcrumb-item active">Add Post</li>
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
              <div class="col-12 m-auto">
                <div class="card mt-5">
                    <div class="header">
                        <h2><strong>Post</strong> Add</h2>
                    </div>
                    <div class="body">
                        <form action="{{ url('admin/blog/post/add/store') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="row clearfix">
                            <div class="col-6">
                              <label for="post_title_en">Post Title English</label>
                              <div class="form-group">
                                  <input type="text" name="post_title_en" id="post_title_en" required class="form-control" placeholder="Enter Cantegory Name">
                                  @error ('post_title_en')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                            </div>

                            <div class="col-6">
                              <label for="post_title_bn">Post Title Bangla</label>
                              <div class="form-group">
                                  <input type="text" name="post_title_bn" id="post_title_bn" required class="form-control" placeholder="Enter Cantegory Name">
                                  @error ('post_title_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                            </div>

                            <div class="col-12">
                              <label for="category_id">Select Category</label>
                              <div class="form-group">
                                <select class="form-control show-tick" name="category_id" required>
                                    <option value="">-- Please select --</option>
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                  @endforeach
                                </select>
                                @error ('category_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>

                            <div class="col-12">
                              <label for="post_picture">Post Picture</label>
                              <input type="file" name="post_picture" class="form-control dropify" required>
                            </div>

                            <div class="col-12">
                              <label for="Postdetails">Post Details English</label>
                              <textarea name="post_details_en" class="summernote" required></textarea>
                              @error ('post_details_en')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="col-12 mt-2">
                              <label for="">Post Details Bangla</label>
                              <textarea name="post_details_bn" class="form-control summernote" required></textarea>
                              @error ('post_details_bn')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect btn-block mt-3">Add Post</button>
                          </div>

                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </section>


@endsection
