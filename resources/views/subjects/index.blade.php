@extends('adminlte::page')
@section('title', 'Subjects')
@section('content')
    <div class="form-group">
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add subject</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('subject.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Add subject</label>
                        <input type="text" name="s_name" class="form-control {{ $errors->has('s_name') ? 'is-invalid' : '' }}" id="exampleInputEmail1">
                        @if($errors->has('s_name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('s_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title text-bold text-lg">Teachers list</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-sm-2 table-hover">
                                <thead>
                                <tr>
                                    <th>Subject name</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->s_name}}</td>
                                    <td>
                                        <div>
                                            <a href="{{route('subject.edit', $subject->id)}}" class="btn btn-primary float-left">Edit</a>
                                            <form action="{{route('subject.destroy', $subject->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
