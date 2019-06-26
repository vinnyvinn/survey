@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Available Questions
                    
                    <a  href="{{ URL::Previous() }}" class="btn btn-success pull-right"> Back</a>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
         <div class="col-md-5">
            <div class="card">
                <div class="card-header">Available Questions
                    
                    <a  href="{{ URL::Previous() }}" class="btn btn-success pull-right"> Back</a>
                </div>

                <div class="card-body">
                  <form method="POST" action="{{ url('template')}}">
                      @csrf
                      <div class="form-group">
                          <label>Survey Name</label>
                          <input type="text" name="name" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" rows="4" name="description"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block"> Create</button>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
