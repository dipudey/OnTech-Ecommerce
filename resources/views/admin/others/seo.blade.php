@extends('layouts.dashboard_master')
@section('title')
  Seo
@endsection
@section('other_setting')
  active
@endsection

@section('content')


    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Seo</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active">Seo</li>
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
                  <div class="card mt-5">
                      <div class="header">
                          <h2><strong>Seo</strong></h2>
                      </div>
                      <div class="body">
                          <form action="{{ url('admin/seo/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                              <label for="meta_title">Meta Title</label>
                              <div class="form-group">
                                  <input type="text" name="meta_title" value="{{ $seo->meta_title }}" id="meta_title" class="form-control" placeholder="Enter Cantegory Name">
                                  @error ('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="meta_author">Meta Author</label>
                              <div class="form-group">
                                  <input type="text" name="meta_author" value="{{ $seo->meta_author }}" id="meta_author" class="form-control" placeholder="Enter Cantegory Name">
                                  @error ('meta_author')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="meta_tag">Meta Tag</label>
                              <div class="form-group">
                                  <input type="text" name="meta_tag" value="{{ $seo->meta_tag }}" id="meta_tag" class="form-control" placeholder="Enter Cantegory Name">
                                  @error ('meta_tag')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="meta_description">Meta Description</label>
                              <div class="form-group">
                                  <textarea name="meta_description" class="form-control" rows="4" >{{ $seo->meta_description }}</textarea>
                                  @error ('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="google_analytics">Google Analytics</label>
                              <div class="form-group">
                                  <textarea name="google_analytics" class="form-control" rows="4" >{{ $seo->google_analytics }}</textarea>
                                  @error ('google_analytics')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <label for="bing_analytics">Bing Analytics</label>
                              <div class="form-group">
                                  <textarea name="bing_analytics" class="form-control" rows="4" >{{ $seo->bing_analytics }}</textarea>
                                  @error ('bing_analytics')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>



                              <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect btn-block">Update</button>
                          </form>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </section>


@endsection
