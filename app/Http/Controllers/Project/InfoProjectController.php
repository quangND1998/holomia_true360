<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InfoProject;
use App\Models\Project;
use App\Http\Requests\Project\CreateInfoRequest;
use App\Http\Requests\Project\UpdateInfoRequest;
use Illuminate\Support\Facades\File; 
class InfoProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infoes = InfoProject::all();
        // return view('info.index',compact('infoes'));

        //return csrf_token();
        return $infoes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Gate::allow(config('constants.3DTEAM_PERMISSION')) || Gate::allow(config('constrants.USER_PERMISSION'))){
        //     return view('info.ce');
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInfoRequest $request,$id)
    {
        

        $infoProject = new InfoProject();

        if($request->hasFile('logo')){

            $logo = $request->file('logo');
            $name =$logo->getClientOriginalName();
            $destinationPath = public_path('/uploads/logos');
            $logo->move($destinationPath,$name);
            $infoProject->logo = $name;
            

        }
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $thubname =$thumbnail->getClientOriginalName();
            $destinationPath = public_path('/uploads/thumbnails');
            $thumbnail->move($destinationPath, $thubname);
            $infoProject->thumbnail = $thubname;
        }
        $infoProject->phone = $request->phone;
        $infoProject->link_register = $request->link_register;
        $infoProject->link_film = $request->link_film;
        $infoProject->project_id = $id;
        $infoProject->address = $request->address;
        $infoProject->save();
        return $infoProject;


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
        $inforproject = InfoProject::find($id);
        return view('info.edit',compact('inforproject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInfoRequest $request, $id)
    {
        
        
        $infoProject =  InfoProject::find($id);
        if($request->hasFile('logo')){


            $logo = $request->file('logo');
            $name = $logo->getClientOriginalName();
            if($infoProject->logo == $name){
                
                $infoProject->logo = $name;
            
            }
            else{
                $destinationPath = public_path('/uploads/logos');
                unlink('uploads/logos/'.$infoProject->logo);

                $logo->move($destinationPath,$name);
                $infoProject->logo =$name;
               

            }

        }

        if($request->hasFile('thumbnail')){


            $thumbnail = $request->file('thumbnail');
            $thubname = $thumbnail->getClientOriginalName();
            if($infoProject->thumbnail == $thubname){
                
                $infoProject->thumbnail = $thubname;
            }
            else{
                $destinationPath = public_path('/uploads/thumbnails');
                unlink('uploads/thumbnails/'.$infoProject->thumbnail);

                $thumbnail->move($destinationPath,$thubname);
                $infoProject->thumbnail = $thubname;

            }

        }

        $infoProject->phone = $request->phone;
        $infoProject->link_register = $request->link_register;
        $infoProject->link_film = $request->link_film;
        $infoProject->address = $request->address;
        $infoProject->save();

        return $infoProject;
       
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
