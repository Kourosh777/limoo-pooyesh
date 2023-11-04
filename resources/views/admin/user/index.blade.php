@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست کاربران
{{--            <small>کنترل پنل</small>--}}
        </h1>
        {{--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">داشبرد</li>
        </ol>--}}
    </section>
    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">جدول ریسپانسیو</h3>

                    {{--<div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>--}}
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>شماره</th>
                            <th>کاربر</th>
                            <th>استان</th>
                            <th>شهرستان</th>
                            <th>موبایل</th>
                            <th>تاریخ عضویت</th>
{{--                            <th>وضعیت</th>--}}
{{--                            <th>دلیل</th>--}}
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->ostan_id }}</td>
                            <td>{{ $user->shahrestan_id }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ jdate($user->created_at)->format('Y/m/d') }}</td>
{{--                            <td><span class="label label-success">تایید شده</span></td>--}}
{{--                            <td>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </td>--}}
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    </section>
@endsection
