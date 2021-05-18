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
                <h3 class="card-title">Update auditory {{$auditories->num}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('auditory.update', $auditories->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Group</label>
                        <input type="text" name="auditory"
                               value="{{$auditories->number}}"
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
@stop
