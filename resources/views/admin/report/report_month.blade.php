@extends('layouts.dashboard_master')
@section('title')
  Monthly Report
@endsection
@section('report')
  active
@endsection

@section('content')


  <section class="content">
      <div class="block-header">
          <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                  <h2>Today Report</h2>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                      <li class="breadcrumb-item active">Today Report</li>
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

          <div class="col-sm-12">
              <div class="card">
                  <div class="header">
                      <h2><strong>Month Order</strong>report</h2>
                      <ul class="header-dropdown">
                          <li class="remove">
                              <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                          </li>
                      </ul>
                  </div>
                  <div class="table-responsive social_media_table">
                      <table class="table table-hover c_table">
                          <thead>
                              <tr>
                                  <th>Month</th>
                                  <th>Year</th>
                                  <th>Total Order</th>
                                  <th>Total Delevery</th>
                                  <th>Total Sales</th>
                              </tr>
                          </thead>
                          <tbody>
                            @for ($i=1; $i <= 12; $i++)
                              @php
                                $data = App\Model\Order::whereYear('date',date("Y"))->whereMonth("date",$i)->where('status','!=',4)->get();
                              @endphp
                              <tr>
                                <td>
                                  @switch($i)
                                      @case(1)
                                          January
                                          @break
                                      @case(2)
                                          February
                                          @break
                                      @case(3)
                                          March
                                          @break
                                      @case(4)
                                          April
                                          @break
                                      @case(5)
                                          May
                                          @break
                                      @case(6)
                                          Jun
                                          @break
                                      @case(7)
                                          July
                                          @break
                                      @case(8)
                                          August
                                          @break
                                      @case(9)
                                          September
                                          @break
                                      @case(10)
                                          October
                                          @break
                                      @case(11)
                                          November
                                          @break
                                      @case(12)
                                          December
                                          @break
                                  @endswitch
                                </td>
                                <td>{{ date("Y") }}</td>
                                <td>{{ $data->count() }}</td>
                                <td>{{ App\Model\Order::whereYear('date',date("Y"))->whereMonth("date",$i)->where('status',3)->get()->count() }}</td>
                                <td>{{ $data->sum('total') }}</td>
                              </tr>
                            @endfor

                          </tbody>
                      </table>
                      {{-- {{ $order->sum("total") }} --}}
                  </div>
              </div>
          </div>

        </div>
      </div>
  </section>


@endsection
@section('script')


@endsection
