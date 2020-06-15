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
            <div class="col-lg-12">
              <div class="float-right mt-4">
                <a href="{{ url('admin/blog/post/add') }}" class="btn btn-success">Add Post</a>
              </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Blog Post</strong> List </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>SL No</th>
                                      <th>Category Name</th>
                                      <th>Post Title</th>
                                      <th>Post Picture</th>
                                      <th>Created At</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                      <th>SL No</th>
                                      <th>Category Name</th>
                                      <th>Post Title</th>
                                      <th>Post Picture</th>
                                      <th>Created At</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $post->blogcategory->category_name_en }}</td>
                                        <td>{{ $post->post_title_en }}</td>
                                        <td>
                                          <img src="{{ asset('uploads/posts') }}/{{ $post->post_picture }}" height="40" alt="">
                                        </td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                         <td>
                                          <div class="btn-group">
                                            <a href="{{ url('admin/blog/post/view') }}/{{ $post->id }}" class="btn btn-info">View</a>
                                            <a href="{{ url('admin/blog/post/edit') }}/{{ $post->id }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('admin/blog/post/delete') }}/{{ $post->id }}" class="btn btn-danger" id="delete">Delete</a>
                                          </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>


@endsection
