@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Agents 
                </div>
                <div class="card-body">
                    <table class="table table-striped table-boardered">
                        <thead>
                            <th>Name</th>
                            <th>email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                               <td>{{ $user->name }}</td> 
                               <td>{{ $user->email }}</td> 
                               <td> 
                                <label class="badge badge-info">{{ count($user->status) }}</label>
                                </td> 
                                <td> 

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
