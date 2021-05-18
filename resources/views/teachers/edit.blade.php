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
                <h3 class="card-title">Update teacher</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('teacher.update', $teacher->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="{{$teacher->name}}"
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
                        <input type="text" name="surname" value="{{$teacher->surname}}"
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
                                    <option @if($subject->id == $teacher->subject_id) selected="selected" @endif value="{{$subject->id}}">{{$subject->s_name}}</option>
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
@stop
