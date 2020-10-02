<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Project\CreateProjectRequest;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Gate::allow(config('constants.3DTEAM_PERMISSION')) || Gate::allow(config('constrants.USER_PERMISSION'))){
            
        //     $projects = Project::paginate(15);
  
        //       return view('project.index',compact('projects'))
        //       ->with('i', ($request->input('page', 1) - 1) * 5);
  
  
        //   }
        return csrf_token();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allow(config('constants.3DTEAM_PERMISSION')) || Gate::allow(config('constrants.USER_PERMISSION'))){
        
            return view('project.create');   
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        // if(Gate::allow(config('constants.3DTEAM_PERMISSION')) || Gate::allow(config('constrants.USER_PERMISSION'))){
        
            $project = new Project();
            $project->title = $request->title;
            $project->save();
        
            // return view('info.create',with($project->id)));
            // return view('info.create',['project'=>$project,'projectid'=>$project->id]);
            // return view('info.create',['project'=>$project]);  
            return $project; 
        // }
        
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


    public function infoProject($id){
        $project = Project::find($id)->with('info:id,logo,thumbnail,phone,link_register,link_film,project_id')->get();        
        
        return $project;

    }
}
