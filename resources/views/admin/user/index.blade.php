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

                    <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="box-title">جدول ریسپانسیو</h3>


<div>
                    <form action="{{ route('users.export-excel') }}" method="get" id="excel_form" enctype="multipart/form-data">
                        @isset($selected)
                            <input type="hidden" name="ostan" value="{{ $selected['ostan'] ?? ""  }}">
                            <input type="hidden" name="shahrestan" value="{{ $selected['shahrestan'] ?? ""  }}">
                            <input type="hidden" name="role" value="{{ $selected['role']  ?? "" }}" >
                            <input type="hidden" name="status" value="{{ $selected['status']  ?? "" }}" >
                        @endisset
                        <div class="row" style=" margin-left: 1rem;">
                            <a  href="#" onclick="document.getElementById('excel_form').submit()"  class="btn btn-block btn-success btn-flat" style="border-radius: 25px;"
                            > خروجی اکسل <i class="fa fa-file-excel-o" ></i></a>
                        </div>
                    </form>
</div>
                    </div>
                    {{--<div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="جستجو">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>--}}


                    <div style="margin-top: 2rem;">
                        <form action="{{ route('users.search') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="my-form-container row mt-3" style="display: flex; align-items: center">
{{--                                @if(!auth()->user()->isOstaniAdmin())--}}
                                    <div class="form-group col-md-3">
                                        <label>استان</label>
                                        <select name="ostan" id="ostans" class="form-control">
                                            <option value="">همه</option>
                                            @foreach($ostans as $ostan)
                                                <option value="{{ $ostan->id }}" @if( isset($selected['ostan']) && $selected['ostan'] == $ostan->id ) selected @endif >{{ $ostan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                @endif--}}
                                <div class="form-group col-md-3">
                                    <label>شهرستان</label>
                                    <select name="shahrestan" id="child_shahrestans" class="form-control">
                                        <option value="">همه</option>
                                        @foreach($shahrestans as $shahrestan)
                                            <option value="{{ $shahrestan->id }}" @if( isset($selected['shahrestan']) && ($selected['shahrestan']== $shahrestan->id) ) selected @endif >{{ $shahrestan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                              {{--  <div class="form-group col-md-3">
                                    <label>نقش</label>
                                    <select name="role" id="ostans" class="form-control">
                                        <option value="">همه</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if( isset($selected['role']) && $selected['role'] == $role->id ) selected @endif >{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-3">
                                    <label>وضعیت</label>
                                    <select name="status" id="mosque" class="form-control">
                                        <option value=""  @if($selected['status'] == null) selected @endif>همه</option>
                                        <option value="0" @if($selected['status'] === "0") selected @endif>بررسی نشده</option>
                                        <option value="1" @if($selected['status'] == 1) selected @endif >تایید شده</option>
                                        <option value="2" @if($selected['status'] == 2) selected @endif>رد شده توسط مدیر استانی</option>
                                        <option value="3" @if($selected['status'] == 3) selected @endif>تایید شده توسط مدیر استانی</option>
                                        <option value="5" @if($selected['status'] == 5) selected @endif>رد شده توسط مدیر کشوری</option>
                                        @isset($statuses)
                                        @endisset
                                    </select>
                                </div>--}}

                                <div class="form-group align-self-end mr-2 col-md-3" style="align-self: end;">
                                    <button class="btn btn-secondary" style="max-height:content-box" type="submit">جستجو</button>
                                </div>
                            </div>
                        </form>


                        <div class="filter-result-container py-3">
                            <span>کلید جستجو : </span>
                            @isset($selected['ostan'])
                                استان :
                                <span class="text-bold label label-primary p-2"> {{ \App\Models\Ostan::find($selected['ostan'])->name }}</span>
                            @endisset
                            @isset($selected['shahrestan'])
                                - شهرستان :
                                <span class="text-bold label label-success p-2"> {{ \App\Models\Shahrestan::find($selected['shahrestan'])->name  }}</span>
                            @endisset
                            @isset($selected['role'])
                                {{--                            <span>کلید جستجو : </span>--}}
                                نقش :
                                <span class="text-bold badge badge-info font p-2"> {{ \App\Models\Role::find($selected['role'])->name }}</span>
                            @endisset
                            @isset($selected['status'])
                                {{--                        @if(!is_null($selected['status']))--}}
                                وضعیت :
                                {{--                        <span class="text-bold badge badge-danger"> {{ \App\Models\masjed::find($selected['status'])->hoze  }}</span>--}}

                                @if($selected['status'] == 1)
                                    <td><span class="badge badge-success p-2" >تایید شده</span></td>
                                @elseif($selected['status'] === "0")
                                    <td><span class="badge badge-secondary p-2"  >بررسی نشده</span></td>
                                @elseif($selected['status'] == 2)
                                    <td><span class="badge badge-warning p-2"  >رد شده توسط مدیر استانی</span></td>
                                @elseif($selected['status'] == 3)
                                    <td><span class="badge badge-warning p-2"  >تایید شده توسط مدیر استانی</span></td>
                                @elseif($selected['status'] == 5)
                                    <td><span class="badge badge-danger p-2"  >رد شده توسط مدیر کشوری</span></td>
                                @endif
                                {{--                        @endif--}}
                            @endisset

                        </div>
                    </div>


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
                            <td>{{ $user->ostan()->first()?->name }}</td>
                            <td>{{ $user->shahrestan?->name }}</td>
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

                <div class="box-footer clearfix">
                    {{ $users->links() }}
                </div>

            </div>
            <!-- /.box -->
        </div>
    </div>
    </section>

@endsection
@push('scripts')
    <script>
        $('#ostans').on('change', function () {
            // alert( this.value );
            let ostan_id = this.value;
            // alert( ostan_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Content-Type': 'application/json'
                }
            })
            $.ajax({
                type: 'POST',
                url: '{{ url("/"); }}/get-child-shahrestans',
                data: JSON.stringify({ostan_id: ostan_id}),
                success: function (data) {
                    var len = data.length;

                    $("#child_shahrestans").empty();
                    $("#child_shahrestans").append("<option value='" + "0" + "'>" + "همه" + "</option>");
                    for (var i = 0; i < len; i++) {
                        var id = data[i]['id'];
                        var name = data[i]['name'];
                        if (i == 0){

                        }

                        $("#child_shahrestans").append("<option value='" + id + "'>" + name + "</option>");
                    }
                }
                // console.log(data);

            });
        });
    </script>
@endpush
