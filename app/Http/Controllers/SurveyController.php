<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Questionnaire;
use App\SurveyResponse;
use Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $surveys = Template::get();
        return view('user.survey',['surveys' => $surveys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[

            ]);

        $data = $request->except('_token');

        foreach($data as $key => $dt){

            $map = explode('_',$key);

            SurveyResponse::create([
                'user_id' => Auth::id(),
                'survey_id' => $map[1],
                'question_id' => $map[2],
                'answer_type' => $map[3],
                'answer' => is_array($dt)? json_encode($dt):$dt,
            ]);
        }

        flash('survey filled successfully')->success();

        return redirect()->back()->with('filled','filled');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaires = Template::with(['question.answer'])->find($id);

        return view('user.takesurvey',['questionnaires' => $questionnaires]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
