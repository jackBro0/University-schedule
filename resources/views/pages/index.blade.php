@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

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
    <h1>Laravel {{ Auth::user()->name }}</h1>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @foreach($time_tables as $table)
                            <div class="card-header">
                                <h1 class="card-title text-bold text-lg d-flex">
                                    <div class="m-2">
                                        Group -
                                    </div>
                                    <div class="m-2">
                                        <select disabled class="form-control select2" name="group_id"
                                                style="width: 100%;">
                                            <option selected>{{$table->groups->name}}</option>
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
                                    @foreach($table->schedules as $day)
                                        @for($x = 1; $x<= 5; $x++)
                                            <tr>
                                                @if($x == 1)
                                                    <td rowspan="5" class="font-weight-bold">{{$day->day}}</td>
                                                @endif
                                                <td>{{ $x }}</td>
                                                <td>
                                                    @if($x == 1 and !empty($day->teachers_first))
                                                        {{$day->teachers_first->subjects()->first()->s_name}}
                                                        ({{ $day->teachers_first->surname }})
                                                    @elseif($x == 2 and !empty($day->teachers_second))
                                                        {{$day->teachers_second->subjects()->first()->s_name}}
                                                        ({{ $day->teachers_second->surname }})
                                                    @elseif($x == 3 and !empty($day->teachers_third))
                                                        {{$day->teachers_third->subjects()->first()->s_name}}
                                                        ({{ $day->teachers_third->surname }})
                                                    @elseif($x == 4 and !empty($day->teachers_fourth))
                                                        {{$day->teachers_fourth->subjects()->first()->s_name}}
                                                        ({{ $day->teachers_fourth->surname }})
                                                    @elseif($x == 5 and !empty($day->teachers_fifth))
                                                        {{$day->teachers_fifth->subjects()->first()->s_name}}
                                                        ({{ $day->teachers_fifth->surname }})
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($x == 1 and !empty($day->rooms_first))
                                                        ({{ $day->rooms_first->number }})
                                                    @elseif($x == 2 and !empty($day->rooms_second))
                                                        ({{ $day->rooms_second->number }})
                                                    @elseif($x == 3 and !empty($day->rooms_third))
                                                        ({{ $day->rooms_third->number }})
                                                    @elseif($x == 4 and !empty($day->rooms_fourth))
                                                        ({{ $day->rooms_fourth->number }})
                                                    @elseif($x == 5 and !empty($day->rooms_fifth))
                                                        ({{ $day->rooms_fifth->number }})
                                                    @endif
                                                </td>
                                            </tr>
                                    @endfor
                                    @endforeach
                                </table>
                                <button type="submit">Submit</button>
                            </div>
                            <!-- /.card-body -->
                        @endforeach
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

@section('js')
    <script> console.log('Hi!'); </script>
@stop
