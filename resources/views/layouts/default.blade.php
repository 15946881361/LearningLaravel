<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title','weibo App') --Laravel 新手入门</title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/caicai/app.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" ></script>
  <script src="/bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>
    @include('layouts._header')

  <div class="container">
    @yield('content')

    @include('layouts._footer')
  </div>


</body>
</html>
