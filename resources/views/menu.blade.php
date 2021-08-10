<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<nav style="position: fixed; width: 100%; min-height: 5%; " class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/addPoint')}}">Add Point</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/allPoints')}}">All Points</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
