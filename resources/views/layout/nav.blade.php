<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pharma</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="icon" href="{{ asset('assets/img/logoo.jpg') }}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class="bg-gradient-success">
    @auth
        <div class="d-flex " id="wrapper">
            <div class="bg-white text-center" id="sidebar-wrapper">
                <div class="sidebar-heading p-0"><img src="{{ asset('assets/img/logoo.jpg') }}" class="" width="120"
                        alt=""><span class="ml-2">Pharma</span></div>
                <div class="list-group list-group-flush">
                    @foreach ($sidbar as $item)
                        <a href="{{ str_replace(' ', '', $item->name) }}"
                            class="btn bg-gradient-success radius-20 m-3 text-white"><i class="{{ $item->icon }} ml-3"
                                style="position: absolute;left:0"></i>
                            {{ $item->name }}</a>
                    @endforeach
                    <form method="post" action="logout">
                        @csrf
                        <button class=" btn mt-3 mb-3 bg-gradient-danger radius-20 w100 text-white"><i class="ion-log-out ml-3"style="position: absolute;left:0"></i>
                        Logout</button>
                       
                    </form>
                </div>
            </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-white p-2 ">
                    <button class="btn bg-gradient-success text-white btn-sm radius-20" id="menu-toggle">Toggle
                        Menu</button>
                </nav>
                <div class="container-fluid">
                @endauth

                @yield('content')

                @auth
                </div>
            </div>
        </div>
    @endauth
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>
