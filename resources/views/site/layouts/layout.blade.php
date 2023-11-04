<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css');}}">
<!-- Style -->
<link rel="stylesheet" href="{{ asset('/assets/css/style.css'); }}">
<title>نورباران</title>
</head>
<body>
@yield('content')

<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
@stack('scripts')
</body>
</html>
