<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   <link href="{{asset('libs/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">AutoCom</a>
            <a class="navbar-brand" href="{{route('user.index')}}"><small class="ml-3">Participantes</small></a>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" hidden> AbeasData</a>
                </li>
            </div>
            
            <div class="d-flex">
                <a href="{{route('contact')}}" >
                    <img src="{{asset('img\\call.png')}}" alt="Contactanos" title="contactanos" width="50" height="40">
                </a>
            </div>
        </div>
    </nav>

    <div class="contend">
        @yield('contend')
    </div>

    <div class="footer">
        <h6>AutoCom Bogota 2024 &#10084;</h6>
    </div>
    
    
    <script src="{{asset('libs/jquery.js')}}"></script>
    {{-- Helpers js --}}
    <script src="{{asset('libs/componentAlert.js')}}"></script>

    @error('success')
        <input type="hidden"  id="success" value="{{$message}}">
        <script>
            boxAlert($('#success').val(),'success');
        </script>
    @enderror

    @error('error')
        <input type="hidden"  id="error" value="{{$message}}">
        <script>
            boxAlert($('#error').val(),'danger');
        </script>
    @enderror

    @yield('js')
</body>
</html>
