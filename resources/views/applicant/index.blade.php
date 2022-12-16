@extends('layouts.admin')

@section('pagetitle')
    Applicant
@endsection

@section('content')
<div class="card card-hover shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Applicant List</h6>
        <a class="btn btn-primary btn-sm" href="{{url('applicant/create')}}">
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
                    <th>Email</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Upozila</th>
                    <th>Address</th>
                    <th>Language</th>
                    <th>Exam</th>
                    <th>University</th>
                    <th>Board</th>
                    <th>GPA</th>
                    <th>Photo</th>
                    <th>CV</th>
                    <th>Training</th>
                    <th width="180px">Action</th>
                </tr>
                @foreach ($applicants as $applicant)
                    <tr>
                        <td>{{ $applicant->id }}</td>
                        <td>{{ $applicant->name }}</td>
                        <td>{{ $applicant->email }}</td>
                        <td>{{ $applicant->division->name }}</td>
                        <td>{{ $applicant->district->name }}</td>
                        <td>{{ $applicant->upozila->name }}</td>
                        <td>{{ $applicant->address }}</td>
                        <td>{{ $applicant->language }}</td>
                        <td>{{ $applicant->exam }}</td>
                        <td>{{ $applicant->university }}</td>
                        <td>{{ $applicant->board }}</td>
                        <td>{{ $applicant->gpa }}</td>
                        <td>
                            <img src="{{url(Storage::url($applicant->photo))}}" class="image" alt="image" width="50px">
                        </td>
                        <td><a href="{{url(Storage::url($applicant->cv))}}" target="_blank">View CV</a></td>
                        <td>{{ $applicant->training }}</td>
                        <td>
                            <form action="{{ route('applicant.destroy',$applicant->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('applicant.show',$applicant->id) }}">Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('applicant.edit',$applicant->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $applicants->links() !!}
        </div>
    </div>
</div>
@endsection