@extends('layouts.admin')

@section('pagetitle')
    Add Division
@endsection

@section('content')
    <div class="card card-hover shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add Division</h6>
            <a href="{{url('division')}}" class="btn btn-primary btn-circle btn-sm" title="Back to Division List">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        <div class="card-body">
            {{Form::open(['route' => 'division.store','class'=>'user','enctype'=>'multipart/form-data'])}}
            @include('division.form')

            <div class="form-group">
                {!! Form::submit('Add Division', ['class'=>'btn btn-primary btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

