@extends('layouts.app')
@section('content')
@section('title', 'Candidate Details')

<div class="content">
    <div class="container-fluid">
        <div style="float:right;padding-bottom:15px">
            <a href="{{route('candidate.create')}}" class="btn btn-primary btn-md">Add New</a>
        </div>
        @if(Session::has('data_deleted'))
        <div class="alert alert-danger" role="danger">
            {{Session::get('data_deleted')}}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Resume</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($data as $data1)
                <tr>
                    <td>{{ $data1->id }}</td>
                    <td>{{ $data1->name }}</td>
                    <td>{{ $data1->email }}</td>
                    <td>{{ $data1->phone }}</td>
                    <td>{{ $data1->dob }}</td>
                    <td>{{ $data1->address }}</td>
                    <td>{{ $data1->docname }}<!-- Trigger the modal with a button -->
                        <br>
                        <a href="uploads/{{$data1->docname}}" target="_blank">Open the pdf!</a></td>
                    <td style="width: 150px">
                        <a href="edit/{{$data1->id}}" class="btn btn-success btn-sm">Edit</a>
                        <a href="delete/{{$data1->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $data->links() }}

    </div>
</div>

@endsection
