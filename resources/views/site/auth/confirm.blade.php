@extends('site.layouts.layout')
@section('content')
    <div class="d-md-flex half">
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5"> <img class="w-100 mb-4" src="{{ asset('assets/images/top.png') }}" > </div>
                            <div class="loginform text-center" style="color: white;"> <img class="usr d-block mx-auto" src="{{ asset('assets/images/tik.png') }}" style="border-radius: 50%;background: white;">
                                <h2 class="mt-3" style="font-size: 24px;"> اطلاعات شما با موفقیت ثبت شد </h2>
                                <h4 style="font-size: 19px;">هم اکنون در کانال زیر عضو شوید:</h4>
                                <h3 style="font-size: 19px;">quranbsj_ir@</h3>
                                <a href="https://eitaa.com/quranbsj_ir" class="btn-reg btn mx-auto py-2 btn-primary"> عضویت </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
