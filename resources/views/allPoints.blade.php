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
<table style="margin: 5% auto 5% auto; width: auto;" class="table table-dark table-hover">
    <thead>
    <tr class="">
        <th scope="col">Name</th>
        <th scope="col">Lat</th>
        <th scope="col">Lng</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($points as $point)
        <tr>
            <td>{{$point->name}}</td>
            <td>{{$point->lat}}</td>
            <td>{{$point->lng}}</td>
            <td>

                <a class="btn btn-danger" href="{{url('/deletePoint/'.$point->id)}}">Delete</a>
                <a class="btn btn-primary" href="{{url('/editPoint/'.$point->id)}}">Edit</a>
{{--                <a class="btn btn-success" href="{{url('/getPoint/'.$point->id)}}">Detail</a>--}}

            </td>
        </tr>
    @endforeach
    </tbody>
    <div class="d-flex justify-content-evenly">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</table>
</body>
</html>
