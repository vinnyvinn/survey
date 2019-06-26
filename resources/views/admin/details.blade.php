@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Take Survey</div>
                <div class="card-body">
                	@php( $count =1 )
					@foreach($responses as $response)
                    <ul>
                      <li> {{ $count ++}} . {{$response->question->question}}
                            <ul>
                              @if($response->answer_type == App\Questionnaire::USER_INPUT)
                                <li>{{ $response->answer }}</li>
                              @elseif($response->answer_type == App\Questionnaire::SELECT_ONE)

                                    @foreach($response->question->answer->whereIn('id',[$response->answer]) as $ans)
                                      <li> {{ $ans->choice }}</li>
                                    @endforeach
                                 
                              @else($response->answer_type == App\Questionnaire::SELECT_MULTIPLE)
									@php($data = collect(json_decode($response->answer))->toArray())
                                    @foreach($response->question->answer->whereIn('id',$data) as $ans)
                                      <li> {{ $ans->choice }}</li>
                                    @endforeach
                                 
                              @endif

                            </ul>
                      </li>

                    </ul>
					@endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
