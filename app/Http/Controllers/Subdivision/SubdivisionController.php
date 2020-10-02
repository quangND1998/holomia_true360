<?php

namespace App\Http\Controllers\Subdivision;
use App\Models\SubdivisionView;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subdivision\CreateSubdivisionRequest;
use App\Http\Requests\Subdivision\UpdateSubdivisionRequest;
use ZipArchive;
use File;
class SubdivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(CreateSubdivisionRequest $request, $id)
    {
        $subdivision = new SubdivisionView();
        $zip = new ZipArchive;
   


        if($request->hasFile('folder_image')){
            $file =$request->file('folder_image');
            if($file->getClientOriginalExtension()=="zip" ){
               
                $zip->open($file->getRealPath());
                $zip->extractTo('subdivision');
                $string =explode(".zip", $file->getClientOriginalName())[0];
                $path ='subdivision/'.$string.'/index.html';
         
            }

            $subdivision->folder_image = $path;  



        }
        $subdivision->title = $request->title;
        $subdivision->project_id = $id;
        $subdivision->save();
        return $subdivision;
        

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
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubdivisionRequest $request, $id)
    {
        $subdivision = SubdivisionView::find($id);
        $zip = new ZipArchive;
    
   


        if($request->hasFile('folder_image')){
            $file =$request->file('folder_image');
            if($file->getClientOriginalExtension()=="zip" ){
                
                $oldzip =explode("/index.html",$subdivision->folder_image)[0];
                File::deleteDirectory($oldzip);
                $zip->open($file->getRealPath());
                $zip->extractTo('subdivision');
                $string =explode(".zip", $file->getClientOriginalName())[0];
                $path ='subdivision/'.$string.'/index.html';;
            }
            $subdivision->folder_image = $path;  



        }
        $subdivision->title = $request->title;
        $subdivision->save();
        return  $subdivision;


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
