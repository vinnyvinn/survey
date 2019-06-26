<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'template_id' => 'required',
            'question' => 'required',
            'type' =>'required',
        ]);

        $data = $request->all();

        if($data['type'] != Questionnaire::USER_INPUT AND $data['options'][0] == null){

        flash('A select Questionnaire must have choices')->error();

            return  redirect()->back()->withInput();
        }

        $id = Questionnaire::create($data)->id;

        if($data['type'] != Questionnaire::USER_INPUT){

            foreach($data['options'] as $question){

                Answer::create([
                    'questionnaire_id' => $id,
                    'choice' => $question
                ]);
            }

        }
        flash('Questionnaire added successfully')->success();

        return redirect()->route('question-create',['id' => $request->template_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function templateQuestion($id)
    {
        $questionnaire = Questionnaire::Bytemplate($id)->with(['answer'])->get();

        return view('admin.questionnaire.create',[
                'questionnaires' => $questionnaire,
                'template_id'=> $id
            ]);
    }
}
