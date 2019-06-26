<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $templates = Template::with(['question'])->get();

        return view('admin.template.index',['templates' => $templates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('admin.template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:templates',
            'description' => 'required'
        ]);

        Template::create($data);

        flash('Template created successfully')->success();

        return redirect()->route('template.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.template.show');
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
    public function update(Request $request, Template $template)
    {
         $data = $request->validate([
            'name' => 'required|unique:templates',
            'description' => 'required'
        ]);

        $template->update($data);

        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        
        $template->delete();

        flash('Template deleted successfully')->success();

        return redirect()->back();
    }


    public function changeStatus($id, $action)
    {

        $template = Template::where('id',$id)->with(['question'])->first();

        if(count($template->question) > 0){

            if($action){
                
                $template->update(['status' => Template::ACTIVE]);
                flash('Activated')->success();

            }else{
                $template->update(['status' => !Template::ACTIVE]);
                flash('Deactivated')->success();

            }

            return redirect()->route('template.index');
        }

        flash('I cannot activate a survey with no questions')->error();
        return redirect()->route('template.index');
    }
}
