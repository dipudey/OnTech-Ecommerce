<!-- Left Sidebar -->
@php
  $admin = Auth::user()
@endphp
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="{{ asset('dashboard_assets') }}/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                  @if(App\Admin::find(Auth::id())->picture == '')
                    <a class="image" href="{{ url('admin/profile') }}"><img src="{{ asset('dashboard_assets') }}/images/profile_av.jpg" alt="User"></a>
                  @else
                    <a class="image" href="{{ url('admin/profile') }}"><img src="{{ asset('uploads/admin/') }}/{{ App\Admin::find(Auth::id())->picture }}" alt="User"></a>
                  @endif
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </li>
            <li class="@yield('home')"><a href="{{ url('admin/home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

            @if($admin->category == 1)
              <li class="@yield('category')"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-dns"></i><span>Category</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ url('admin/category') }}">Category</a></li>
                      <li><a href="{{ url('admin/subcategory') }}">SubCategory</a></li>
                      {{-- <li><a href="{{ url('admin/category/add') }}">Add Category</a></li> --}}
                  </ul>
              </li>
            @endif

            @if($admin->brand == 1)
              <li class="@yield('brand')"><a href="{{ url('admin/brand') }}"><i class="zmdi zmdi-blur"></i><span>Brand</span></a></li>
            @endif

            @if($admin->cupon == 1)
              <li class="@yield('cupon')"><a href="{{ url('admin/cupon') }}"><i class="zmdi zmdi-minus-square"></i><span>Cupon</span></a></li>
            @endif

            @if($admin->product == 1)
              <li class="@yield('product')"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-basket"></i><span>Product</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ url('admin/product/add') }}">Add Product</a></li>
                      <li><a href="{{ url('admin/product') }}">All Product</a></li>
                  </ul>
              </li>
            @endif

            @if($admin->blog)
              <li class="@yield('blog')"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ url('admin/blog/category') }}">Category</a></li>
                      <li><a href="{{ url('admin/blog/post') }}">Post</a></li>
                  </ul>
              </li>
            @endif

            @if($admin->order == 1)
              <li class="@yield('order')"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Order</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ url('admin/order/new/orders') }}">New Orders</a></li>
                      <li><a href="{{ route('admin.payment.accept') }}">Accept Payment</a></li>
                      <li><a href="{{ route('admin.progress.delevery') }}">Progress Delevery</a></li>
                      <li><a href="{{ route('admin.delevery.success') }}">Delevery Success</a></li>
                      <li><a href="{{ route('admin.order.cancel') }}">Cancel Order</a></li>
                  </ul>
              </li>
            @endif

            @if($admin->stock == 1)
              <li class="@yield('stock')"><a href="{{ url('admin/product/stock') }}"><i class="zmdi zmdi-hc-fw"></i><span>Product Stock</span></a></li>
            @endif

            @if ($admin->report == 1)
              <li class="@yield('report')"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment-o"></i><span>Report</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ url('admin/report/today') }}">Today Report</a></li>
                      <li><a href="{{ url('admin/report/month') }}">Month Report</a></li>
                  </ul>
              </li>
            @endif

            @if($admin->user == 1)
              <li class="@yield('user')"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-accounts"></i><span>User</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ url('admin/user/add') }}">Add User</a></li>
                      <li><a href="{{ url('admin/user') }}">All Users</a></li>
                  </ul>
              </li>
            @endif

            @if($admin->contact == 1)
              <li class="@yield('contact')"><a href="{{ url('admin/contact/list') }}"><i class="zmdi zmdi-receipt"></i><span>Contact List</span></a></li>
            @endif

            @if($admin->others == 1)
              <li class="@yield('other_setting')"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings-square"></i><span>Others Setting</span></a>
                  <ul class="ml-menu">
                      <li><a href="{{ url('admin/seo') }}">Seo</a></li>
                      <li><a href="{{ url('admin/site/setting') }}">Site Setting</a></li>
                  </ul>
              </li>
            @endif

        </ul>
    </div>
</aside>
