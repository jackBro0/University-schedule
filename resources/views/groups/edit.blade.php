@extends('adminlte::page')
@section('title', 'Groups')
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
                <h3 class="card-title">Update group {{$group->group}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('group.update', $group->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Group</label>
                        <input type="text" name="group"
                               value="{{$group->name}}"
                               class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}"
                               id="exampleInputEmail1">
                        @if($errors->has('group'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('group') }}</strong>
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
