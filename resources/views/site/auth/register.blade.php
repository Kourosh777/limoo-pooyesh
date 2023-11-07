@extends('site.layouts.layout')
@section('content')
<div class="d-md-flex half">
  <div class="contents">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
          <div class="form-block mx-auto">

            <div class="text-center" style="margin-bottom: 3rem"> <img class="w-100 mb-4" src="{{ asset('assets/images/top.png') }}" > </div>
              @if ($errors->any())
                  <div class="alert alert-danger" style="margin-bottom: 6rem">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
                <div>
                    <form action="{{ route('register') }}" method="post" class="loginform">
                        @csrf
                        <img class="usr d-block mx-auto" src="{{ asset('assets/images/usr.png'); }}" >
                        <div class="form-group first">
                            <label for="name">نام و نام خانوادگی</label>
                            <input name="name" type="text" class="form-control" placeholder="نام و نام خانوادگی" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group last mb-3 d-flex justify-content-center">
                            <div class="w-50 ml-1">
                                <label for="city">استان</label>
                                <select name="ostan_id" class="form-control"  id="ostans">
                                    @foreach($ostans as $ostan)
                                        <option value="{{ $ostan->id }}">{{ $ostan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-50 mr-1">
                                <label for="city2">شهرستان</label>
                                <select name="shahrestan_id" class="form-control" id="child_shahrestans">
                                    @foreach($shahrestans as $shahrestan)
                                    <option value="{{ $shahrestan->id }}">{{ $shahrestan->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group last mb-3">
                            <label for="mob">تلفن همراه</label>
                            <input name="phone_number" type="number" class="form-control" placeholder="" id="mob" value="{{ old('phone_number') }}">
                        </div>
                        <div class="text-center">
                            <input type="submit" value="ثبت اطلاعات" class="btn-submit btn mx-auto py-2 btn-primary">
                        </div>
                    </form>

                    <div class="text-center text-white" style="font-weight: bold; font-size: 1.3rem;">
                        تعداد شرکت کننده ها :
                        <span style="font-size: 1.5rem;">{{ $registerd_count }}</span>
                    </div>
                </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
                    for (var i = 0; i < len; i++) {
                        var id = data[i]['id'];
                        var name = data[i]['name'];

                        $("#child_shahrestans").append("<option value='" + id + "'>" + name + "</option>");

                    }
                }
                // console.log(data);

            });
        });
    </script>
@endpush
