<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@include('menu')
<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <h1 class="mb-4">Edit point</h1>
    <form style="min-width: 30%;" method="POST" action='{{url('/updatePoint/'.$point->id)}}'>
        @method('PUT')
        @csrf

        <div class="d-flex justify-content-evenly">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            <span style="width: 30%;" class="input-group-text" id="inputGroup-sizing-default">Name</span>
            <input value="{{ $point->name }}" name="name" id="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
            <span style="width: 30%;" class="input-group-text" id="inputGroup-sizing-default">Lat</span>
            <input value="{{ $point->lat }}" name="lat" id="lat" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
            <span style="width: 30%;" class="input-group-text" id="inputGroup-sizing-default">Lng</span>
            <input value="{{ $point->lng }}" name="lng" id="lng" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex justify-content-center">
            <input type="submit" name="send" value="Submit" class="border btn btn-success rounded mb-10">
            <input type="reset" name="reset" value="Reset" class="border btn btn-danger rounded mb-10">
        </div>


    </form>

</div>
</body>
</html>
