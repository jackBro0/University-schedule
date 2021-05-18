@extends('adminlte::page')
@section('title', 'Teachers')
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
                <h3 class="card-title">Add teacher</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('teacher.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name"
                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               id="exampleInputEmail1">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Surname</label>
                        <input type="text" name="surname"
                               class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}"
                               id="exampleInputPassword1">
                        @if($errors->has('surname'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label>Subject</label>
                            <select class="form-control select2" name="subject" style="width: 100%;">
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}" selected="selected">{{$subject->s_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if($errors->has('subject'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('subject') }}</strong>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Subject</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{$teacher->name}}</td>
                                        <td>{{$teacher->surname}}</td>
                                        <td>{{$teacher->subjects->s_name}}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-primary float-left">Edit</a>
                                                <form action="{{route('teacher.destroy', $teacher->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger float-right">Delete
                                                    </button>
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
{{--@section('css')--}}
{{--    /*<link rel="stylesheet" href="/css/admin_custom.css">*/--}}
{{--@stop--}}
