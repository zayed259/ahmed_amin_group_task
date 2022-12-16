@extends('layouts.admin')

@section('pagetitle')
    Upozila
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Upozila List</h6>
        <a class="btn btn-primary btn-sm" href="{{url('upozila/create')}}">
            <i class="fas fa-plus fa-sm"></i>
            Add
        </a>
    </div>
    
    @include('partial.flash')
    @include('partial.error')
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>District</th>
                    <th>Division</th>
                    <th width="180px">Action</th>
                </tr>
                @foreach ($upozilas as $upozila)
                    <tr>
                        <td>{{ $upozila->id }}</td>
                        <td>{{ $upozila->name }}</td>
                        <td>{{ $upozila->district->name }}</td>
                        <td>{{ $upozila->division->name }}</td>
                        <td class="d-flex justify-content-between">
                            {!! Form::open(['method' => 'delete','route' => ['upozila.destroy', $upozila->id]]) !!}
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm btn-circle">Delete</button>
                            {!! Form::close() !!}
                            <a href="{{url('upozila/'.$upozila->id.'/edit')}}" class="btn btn-primary btn-circle btn-sm" title="Edit">
                                Edit
                            </a>
                            <a href="{{url('upozila/'.$upozila->id)}}" class="btn btn-primary btn-circle btn-sm" title="View">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $upozilas->links() !!}
        </div>
    </div>
</div>
@endsection