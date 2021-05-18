@extends('adminlte::page')
@section('title', 'Subjects')
@section('content')
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Update subject {{$subject->s_name}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('subject.update', $subject->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Update subject</label>
                    <input type="text" name="s_name" value="{{$subject->s_name}}" class="form-control {{ $errors->has('s_name') ? 'is-invalid' : '' }}" id="exampleInputEmail1">
                    @if($errors->has('s_name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('s_name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
