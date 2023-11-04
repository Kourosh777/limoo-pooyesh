<!-- right side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="{{  asset("assets/images/usr.png")}}" class="img-circle" alt="User Image">
{{--          <img src="{{  asset("dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">--}}
        </div>
        <div class="pull-right info">
          <p>{{ auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
        </div>
      </div>
      <!-- search form -->
      {{--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="جستجو">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>--}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">منو</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>کاربران</span>
            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('admin.user.index') }}"><i class="fa fa-circle-o"></i>لیست کاربران</a></li>
{{--            <li><a href="index2.html"><i class="fa fa-circle-o"></i> داشبرد دوم</a></li>--}}
          </ul>
        </li>
{{--        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>مستندات</span></a></li>--}}
{{--<li class="header">برچسب ها</li>
<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>مهم</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>هشدار</span></a></li>
<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>اطلاعات</span></a></li>--}}
    </ul>

</section>
<!-- /.sidebar -->
</aside>
