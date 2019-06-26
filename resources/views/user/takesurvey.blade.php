
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Take Survey
                    
                    <a  href="{{ URL::Previous() }}" class="btn btn-success pull-right"> Later</a>
                </div>

                <div class="card-body">
                @if(session('filled'))
                    <div class="alert alert-success">
                        filled successfully
                    </div>
                @else

                    @if(count($questionnaires) < 1)
                      <div class="alert alert-danger"> No Questions yet</div>
                    @endif
                    @php($count =1)
                    <form method="POST" action="{{ url('survey') }}">
                    	@csrf
                    @foreach($questionnaires->question as $question)
                    <div class="form-group">
	
                      <label>{{ $count ++}} . {{$question->question}} </label>
                              @if($question->type == App\Questionnaire::USER_INPUT)
                                <input type="text" 
                                name="su_{{$questionnaires->id}}_{{$question->id}}_{{$question->type}}" 
                                class="form-control" required>
                              @elseif($question->type == App\Questionnaire::SELECT_ONE)
                                @foreach($question->answer as $ans)<br/>
                            		<input type="radio" name="su_{{$questionnaires->id}}_{{$question->id}}_{{$question->type}}" value="{{ $ans->id }}" required>  
                            		<label> {{$ans->choice}}</label>

                                @endforeach
                              @else($question->type == App\Questionnaire::SELECT_MULTIPLE)
                                    @foreach($question->answer as $ans)
                                    <br/>
	                                    <input type="checkbox" name="su_{{$questionnaires->id}}_{{$question->id}}_{{$question->type}}[]" value="{{ $ans->id }}">  
                                    	<label> {{$ans->choice}}</label>
                                    @endforeach
                              @endif
					</div>
                    @endforeach

                    @if(count($questionnaires) > 0 )
                    	<button type="submit" class="btn btn-sm btn-success"> submit</button>
                    @endif
                </form>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection