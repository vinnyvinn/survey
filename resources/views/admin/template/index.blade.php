@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Templates 
                    
                    <a  href="{{ url('template/create') }}" class="btn btn-success pull-right"> Create</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-boardered">
                        <thead>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Questions</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($templates as $template)
                            <tr>
                               <td>{{ $template->name }}</td> 
                               <td>{{ $template->description }}</td> 
                               <td> 
                                <label class="badge badge-info">{{ count($template->question) }}</label>
                                </td> 
                                <td> 
                                    @if($template->status)
                                    <label class="badge badge-success"> Active</label>
                                    @else
                                    <label class="badge badge-success"> InActive</label>
                                    @endif
                                </td> 
                                <td>
                                    @if($template->status)
                                    <a class="btn btn-sm btn-info" href="{{ url('template-status',['id'=> $template->id,'action'=>'false']) }}">Deactivate</a>
                                    @else
                                    <a class="btn btn-sm btn-info" href="{{ url('template-status',['id'=> $template->id,'action'=> 'true']) }}"> Activate </a>
                                    @endif

                                    <a href="{{ url('question-create',['id'=> $template->id]) }}"> Questions </a>

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
