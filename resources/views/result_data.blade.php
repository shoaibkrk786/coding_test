@extends('layout.layout')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading"><h3>Result of Submited Form </h3></div>
        <div class="panel-body">

            <div class='table-responsive'>
                <table class="table">
                    <thead>
                    <tr class ="table_heading">
                        <th>id</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Services</th>
                        <th>Comments</th>
                        <th>Term & Condition</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->project_name}}</td>
                            <td>{{$result->project_type	}}</td>
                            <td>{{$result->service}}</td>
                            <td>{{$result->comment}}</td>
                            <td>{{$result->terms}}</td>
                            <td>{{$result->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endsection