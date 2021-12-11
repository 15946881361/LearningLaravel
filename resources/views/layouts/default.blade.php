<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title','weibo App') --Laravel 新手入门</title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/caicai/app.css">

</head>
<body>
    @include('layouts._header')

  <div class="container">
    <div class="offset-md-1 col-md-10">
      @include('layouts._message')
      @yield('content')
      @include('layouts._footer')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js" ></script>
  <script src="/bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>
