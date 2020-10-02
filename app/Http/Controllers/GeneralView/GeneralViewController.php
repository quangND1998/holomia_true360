<?php

namespace App\Http\Controllers\GeneralView;
use App\Models\GeneralView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use File;
use ZipArchive;
class GeneralViewController extends Controller
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
    public function storePresentImg(Request $request ,$id)
    {
        $genelralview = new GeneralView();

        $zip = new ZipArchive;

        

        if($request->hasFile('folder_present_image')){
            $file =$request->file('folder_present_image');
            if($file->getClientOriginalExtension()=="zip" ){
               
                $zip->open($file->getRealPath());
                $zip->extractTo('general/present');
                $string =explode(".zip", $file->getClientOriginalName())[0];
                $path ='general/present/'.$string.'/tour.html';
         
            }

            $genelralview->folder_present_image = $path;  



        }
        $genelralview->project_id = $id;
        $genelralview->save();
     
        return $genelralview;
    }
    public function storeImgNight(Request $request, $id){

        $genelralview = GeneralView::find($id);
        
        $zip = new ZipArchive;

        

        if($request->hasFile('folder_img_night')){
            $file =$request->file('folder_img_night');
            if($file->getClientOriginalExtension()=="zip" ){
               
                $zip->open($file->getRealPath());
                $zip->extractTo('general/night');
                $string =explode(".zip", $file->getClientOriginalName())[0];
                $path ='general/night/'.$string;
         
            }

            $genelralview->folder_img_night = $path;  



        }
        $genelralview->save();
     
        return $genelralview;


        

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
}
