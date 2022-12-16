@extends('layouts.admin')

@section('pagetitle')
    Upozila
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Upozila Details</h6>
        <a href="{{url('upozila')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Upozila List">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-responsive">
            <tr class="table-bordered">
                <th>Id</th>
                <td>{{ $upozila->id }}</td>
            </tr>
            <tr class="table-bordered">
                <th>Name</th>
                <td>{{ $upozila->name }}</td>
            </tr>
            <tr class="table-bordered">
                <th>Division</th>
                <td>{{ $upozila->division->name }}</td>
            </tr>
            <tr class="table-bordered">
                <th>District</th>
                <td>{{ $upozila->district->name }}</td>
            </tr>

        </table>
    </div>
</div>
@endsection