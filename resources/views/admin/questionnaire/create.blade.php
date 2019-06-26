@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Available Questions
                    
                    <a  href="{{ URL::Previous() }}" class="btn btn-success pull-right"> Back</a>
                </div>

                <div class="card-body">
                    @if(count($questionnaires) < 1)
                      <div class="alert alert-danger"> No Questions yet</div>
                    @endif
                    @php($count =1)
                    @foreach($questionnaires as $question)
                    <ul>
                      <li> {{ $count ++}} . {{$question->question}}
                            <ul>
                              @if($question->type == App\Questionnaire::USER_INPUT)
                                <li>___________(user input)_________</li>
                              @elseif($question->type == App\Questionnaire::SELECT_ONE)
                                  <label class="badge badge-success"> Single Choice</label>
                                    @foreach($question->answer as $ans)
                                      <li> {{ $ans->choice }}</li>
                                    @endforeach
                              @else($question->type == App\Questionnaire::SELECT_MULTIPLE)
                                  <label class="badge badge-success"> Multiple Choice</label>
                                    @foreach($question->answer as $ans)
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
         <div class="col-md-6">
            <div class="card">
                <div class="card-header"> Create Question
                </div>

                <div class="card-body">
                  <form method="POST" action="{{ url('question')}}">
                      @csrf


                      <input type="hidden" name="template_id" value="{{$template_id}}">
                      <div class="form-group">
                          <label>Question</label>
                          <input type="text" name="question" class="form-control" required="true">
                      </div>
                      <div class="form-group">
                       <label> Question type </label> <br/>
                       <input type="radio" name="type" value="1" checked="true" onclick="getTemplate(1);" > User Input Field &nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="type" value="2" onclick="getTemplate(2);"> Radio Button Check&nbsp;&nbsp;
                       <input type="radio" name="type" value="3" onclick="getTemplate(3);"> Multiple Choices
                      </div>
                      <div class="row">
                        <div class="col-md-12 selectAnswer" style="display:none;">
                          <div class="pull-right">
                             <button class="btn btn-sm" type="button" onclick="addAnswer();"> add</button>
                          </div>
                          <div id="InputContainer">
                            <div class="row form-group div1">
                                <div class="col-md-10">
                                  <label>Options </label>
                                  <input type="text" name="options[]" class="form-control">
                                </div>
                                <div class="col-md-2">
                                  <button class="btn btn-sm mt-4" type="button" onClick="remove(1)"> rem</button>
                                </div>
                            </div>
                          </div>
                        </div>
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
@section('scripts')
<script >
    
    function getTemplate(id){

      if(id == 1){
        $('.selectAnswer').css({'display':'none'});

      }else if(id == 2){
        $('.selectAnswer').css({'display':'inline-block'});

      }else if(id == 3){
        $('.selectAnswer').css({'display':'inline-block'});
      }
    } 

    var  count= 2;

  function addAnswer(){
    var htmlrow='<div class="row form-group div'+count+'">'+
                              '<div class="col-md-10">'+
                                '<label>Option</label>'+
                                '<input type="text" name="options[]" class="form-control">'+
                              '</div>'+
                              '<div class="col-md-2">'+
                                '<button type="button" class="btn btn-sm mt-4" onclick="remove('+count+')"> rem</button>'+
                              '</div>'+
                          '</div>';
          count ++;
      $('#InputContainer').append(htmlrow);
  }

  function remove(id)
  {
    $('.div'+id).remove();
  }

</script>


@endsection