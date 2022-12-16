@extends('layouts.admin')

@section('pagetitle')
    Update Division
@endsection

@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Update Division</h6>
            <a href="{{url('division')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Division List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">
            {!! Form::model($division, ['method' => 'put','enctype'=>'multipart/form-data','class'=>'user','route' => ['division.update', $division->id]]) !!}
            @include('division.form')

            <div class="form-group">
                {!! Form::submit('Update Division', ['class'=>'btn btn-primary btn-profile btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

