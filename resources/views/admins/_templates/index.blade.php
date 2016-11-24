@extends('admins._layouts.base_index')

@section('page-title')
    <h1 class="page-header">{{ $page_name }}</h1>
@endsection

@section('page-sub-title', $page_name)

@section('table-header')
    <th>Column 1</th>
    <th>Column 2</th>
    <th>Column 3</th>
    <th>Column 4</th>
    <th>Column 5</th>
@endsection

@section('table-content')
    @foreach (range(0, 30) as $number)
        <tr>
            <td>Nama {{ $number }}</td>
            <td>Slug {{ $number }}</td>
            <td class="text-center">
                <span class="label label-success label-circle">
                    <i class="fa fa-check"></i>
                </span>
            </td>
            <td>Alamat {{ $number }}</td>
            <td>Contoh deskripsi panjang</td>
            <td>
                <a href="#" class="btn btn-success btn-xs">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a href="#" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
@stop