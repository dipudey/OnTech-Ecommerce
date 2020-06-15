@extends('layouts.dashboard_master')
@section('title')
  Contact List
@endsection
@section('contact')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Contact List</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active">Contact List</li>
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
                <div class="card">
                    <div class="header">
                        <h2><strong>Contact</strong> List </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th>Message Time</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Message Time</th>
                                    <th>Action</th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                  @foreach ($contacts as $contact)
                                    <tr>
                                      <td>{{ $contact->name }}</td>
                                      <td>{{ $contact->email }}</td>
                                      <td>
                                        @if ($contact->status == 0)
                                        <span class="badge badge-warning">Unseen</span>
                                        @endif
                                      </td>
                                      <td>{{ $contact->created_at->diffForHumans() }}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a href="{{ url('admin/contact/view/'.$contact->id) }}" class="btn btn-success">View</a>
                                          <a href="{{ url('admin/contact/seen/'.$contact->id) }}" class="btn btn-warning">Seen</a>
                                          <a href="{{ url('admin/contact/delete/'.$contact->id) }}" class="btn btn-danger" id="delete">Delete</a>
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

            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Seen Contact</strong> List </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Status</th>
                                      <th>Message Time</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Message Time</th>
                                    <th>Action</th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                  @foreach ($seen_contacts as $seen_contact)
                                    <tr>
                                      <td>{{ $seen_contact->name }}</td>
                                      <td>{{ $seen_contact->email }}</td>
                                      <td>
                                        @if ($seen_contact->status == 1)
                                        <span class="badge badge-success">seen</span>
                                        @endif
                                      </td>
                                      <td>{{ $seen_contact->created_at->diffForHumans() }}</td>
                                      <td>
                                        <div class="btn-group">
                                          <a href="{{ url('admin/contact/view/'.$seen_contact->id) }}" class="btn btn-success">View</a>
                                          <a href="{{ url('admin/contact/unseen/'.$seen_contact->id) }}" class="btn btn-warning">Unseen</a>
                                          <a href="{{ url('admin/contact/delete/'.$seen_contact->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
@section('script')

@endsection
