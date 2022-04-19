@extends('layouts.app')
@section('content')
@section('title', 'Add Candidate')

<div class="content">
    <div class="container-fluid">

        <div class="row">
<div class="col-md-8 offset-md-2">
<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">CANDIDATE REGISTRATION FORM</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('candidate.save')}}" enctype="multipart/form-data" >
        @csrf
        @if(Session::has('data_saved'))
        <div class="alert alert-success" role="success">
            {{Session::get('data_saved')}}
        </div>
        @endif
        <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name">
          @error('name')
                  <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
          <div class="form-group">
              <label for="address">Address</label>
              <textarea id="address" name="address" class="form-control"></textarea>
              @error('address')
              <span class="text-danger">{{$message}}</span>
             @enderror
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                  <div class="input-group date">
                      <input type="text" class="form-control" autocomplete="off" id="datepicker" name="dob" />
                      <div class="input-group-append">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                  @error('dob')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>

        <div class="form-group">
          <label for="resume">Upload Resume</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="file" name="file" accept=".pdf" placeholder="">
              <label class="custom-file-label" id="filename" for="resume">Choose file</label>
            </div>
          </div>
          @error('file')
                  <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->

        </div>
        </div>

    </div>
</div>


  @endsection
