@extends('admins._layouts.base_index')

@section('page-title')
    <div class="page-header">
        <h1>{{ $page_name }}</h1>
        <a href="{{ route($routePrefix . '.create') }}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Create New</a>
    </div>
@endsection

@section('page-sub-title', $page_name)

@section('table-header')
    <th>Name</th>
    <th>Email</th>
    <th>Super User</th>
    <th>Active</th>
@endsection

@section('table-content')
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-center">{!! booleanViewForIndex($user->is_superuser) !!}</td>
            <td class="text-center">{!! booleanViewForIndex($user->is_active) !!}</td>
            <td class="text-center">
                <a href="{{ route($routePrefix . '.edit', $user->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a href="#" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash"></i> Delete
                </a>
            </td>
        </tr>
    @endforeach
@stop