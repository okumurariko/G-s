<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>space</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
    <div class="wrapper">
        <!-- <div class="container"> -->
            <div class="element">
                <a class="navbar-brand" href="{{ url('') }}">
                    HOME
                </a>
                <a class="navbar-brand" href="{{ url('/index') }}">
                    space
                </a>
        </div>
    </div>
    <div class="my-navbar-control">
      @if(Auth::check())
      <font color="white">
        <span class="my-navbar-item">Loginユーザー：{{ Auth::user()->name }}</span></font>
        
        {{ csrf_field() }}
        </form>
      @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        ｜
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
      @endif
        
    </header>

    <div>
        @yield('content')
    </div>
</body>
</html>