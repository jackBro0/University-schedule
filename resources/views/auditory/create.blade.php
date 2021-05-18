@extends('adminlte::page')
@section('title', 'Auditories')
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
                <h3 class="card-title">Add auditory</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('auditory.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Auditory</label>
                        <input type="text" name="auditory"
                               class="form-control {{ $errors->has('auditory') ? 'is-invalid' : '' }}"
                               id="exampleInputEmail1">
                        @if($errors->has('auditory'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('auditory') }}</strong>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title text-bold text-lg">Groups list</h1>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Auditory</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($auditories as $auditory)
                                    <tr>
                                        <td>{{$auditory->number}}</td>
                                        <td>
                                            <div>
                                                <a href="{{route('auditory.edit', $auditory->id)}}" class="btn btn-primary float-left">Edit</a>
                                                <form action="{{route('auditory.destroy', $auditory->id)}}" method="post">
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
