@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Take Survey</div>
                <div class="card-body">
                    <table class="table table-striped table-boardered">
                        <thead>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Questions</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                            @foreach($filedsurveys as $survey)
                            <tr>
                               <td>{{ $survey->survey->name }}</td> 
                               <td>{{ $survey->survey->description }}</td> 
                               <td>{{ $survey->user->name }}</td> 
                                <td> 
                                 	<a  href="{{ url('survey-response',['user'=> $survey->user_id,'survey' => $survey->survey_id])}}" class="btn btn-sm btn-info"> Show </a>
                                </td> 

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
