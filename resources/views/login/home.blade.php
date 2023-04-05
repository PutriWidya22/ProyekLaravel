@extends('login.main')
@section('content')

<table border="1">
    <tr>
        <td>ID : </td><td>{{$data['id']}}</td>
    </tr>
    <tr>
        <td>Name : </td><td>{{$data['name']}}</td>
    </tr>
</table>

<h1>Selamat Datang!!</h1>
<a href="/logout" class="btn btn-danger">Logout</a>
@endsection