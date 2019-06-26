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
                            @foreach($surveys as $template)
                            <tr>
                               <td>{{ $template->name }}</td> 
                               <td>{{ $template->description }}</td> 
                               <td> 
                                <label class="badge badge-info">{{ count($template->question) }}</label>
                                </td> 
                                <td> 
                                 	<a  href="{{ url('survey',['id'=> $template])}}" class="btn btn-sm btn-info"> take </a>
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
