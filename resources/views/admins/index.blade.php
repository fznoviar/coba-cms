@extends('admins._layouts.base')

@section('page-title')
    <h1 class="page-header">Page Title</h1>
@endsection

@section('page-sub-title', 'Page')

@section('table-header')
    <tr>
        <th>Column 1</th>
        <th>Column 2</th>
        <th>Column 3</th>
        <th>Column 4</th>
        <th>Column 5</th>
    </tr>
@endsection

@section('table-content')
    @foreach (range(0, 30) as $number)
        <tr>
            <td>Nama {{ $number }}</td>
            <td>Slug {{ $number }}</td>
            <td class="center">{{ $number }}</td>
            <td>Alamat {{ $number }}</td>
            <td>X</td>
        </tr>
    @endforeach
@stop