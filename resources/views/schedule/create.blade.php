@extends('adminlte::page')
@section('title', 'Schedule')
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="post" action="{{ route('schedule.store') }}">
                            @csrf
                            <div class="card-header">
                                <h1 class="card-title text-bold text-lg d-flex">
                                    <div class="m-2">
                                        Group -
                                    </div>
                                    <div class="m-2">
                                        <select class="form-control select2" name="group_id" style="width: 100%;">
                                            <option></option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Day of the week</th>
                                        <th>Lesson №</th>
                                        <th>Subject (Teacher)</th>
                                        <th>Room</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($days as $day)
                                        @for($x = 1; $x<= 5; $x++)
                                            <tr>
                                                @if($x == 1)
                                                    <td rowspan="5" class="font-weight-bold">{{$day}}</td>
                                                @endif
                                                <td>{{ $x }}</td>
                                                <td>
                                                    <select class="form-control select2"
                                                            name="days[{{$day}}][{{$x}}][teacher]">
                                                        <option></option>
                                                        @foreach($teachers as $teacher)
                                                            <option value="{{$teacher->id}}">
                                                                {{$teacher->subjects->s_name}}
                                                                ({{$teacher->name}} {{$teacher->surname}})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control select2"
                                                            name="days[{{$day}}][{{$x}}][auditory]">
                                                        @foreach($auditories as $auditorie)
                                                            <option></option>
                                                            <option value="{{$auditorie->id}}">
                                                                {{$auditorie->number}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                    @endfor
                                    @endforeach
                                </table>
                                <button type="submit">Submit</button>
                            </div>
                            <!-- /.card-body -->
                        </form>
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

