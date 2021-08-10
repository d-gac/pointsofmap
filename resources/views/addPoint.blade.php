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
    <h1 class="mb-4">Add point</h1>
    {{--    <p>testowanie!!!!</p>--}}
    <form method="POST" action='{{url('/addPoint')}}'>

        @csrf

        <div class="d-flex justify-content-evenly">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight ">
                <label>Name</label>
            </div>
            <div class="ms-auto p-2 bd-highlight">
                <input value="{{ old('name') }}" type="text" class="border rounded mb-10" name="name" id="name">
            </div>
        </div>

        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <label>Lat</label>
            </div>
            <div class="ms-auto p-2 bd-highlight">
                <input value="{{ old('lat') }}" type="text" class="border rounded mb-10" name="lat" id="lat">
            </div>
        </div>
        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight">
                <label>Lng</label>
            </div>
            <div class="ms-auto p-2 bd-highlight">
                <input value="{{ old('lng') }}" type="text" class="border rounded mb-10" name="lng" id="lng">
            </div>
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
