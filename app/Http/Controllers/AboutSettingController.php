<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class AboutSettingController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=AboutSetting::paginate(10);
        return view('about_setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about_setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data=new AboutSetting;
            $data->about_title=$request->about_title;
            $data->about_description=$request->about_description;
            $data->mission_title=$request->mission_title;
            $data->mission_description=$request->mission_description;
            if($request->has('about_image'))
                $data->about_image=$this->resizeImage($request->about_image,'uploads/about_setting/about_image',true,200,200,false);
            
            if($request->has('mission_image_1'))
                $data->mission_image_1=$this->resizeImage($request->mission_image_1,'uploads/about_setting/mission_image_1',true,200,200,false);
        
            if($request->has('mission_image_2'))
                $data->mission_image_2=$this->resizeImage($request->mission_image_2,'uploads/about_setting/mission_image_2',true,200,200,false);
        
            if($request->has('mission_image_3'))
                $data->mission_image_3=$this->resizeImage($request->mission_image_3,'uploads/about_setting/mission_image_3',true,200,200,false);

            if($data->save()){
            Toastr::success('Settings Create Successfully!');
            return redirect()->route(currentUser().'.about_setting.index');
            }else{
            Toastr::warning('Please try Again!');
            return redirect()->back();
            }
        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutSetting  $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutSetting  $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting=AboutSetting::findOrFail(encryptor('decrypt',$id));
        return view('about_setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutSetting  $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $data=AboutSetting::findOrFail(encryptor('decrypt',$id));
            $data->about_title=$request->about_title;
            $data->about_description=$request->about_description;
            $data->mission_title=$request->mission_title;
            $data->mission_description=$request->mission_description;
            $path1='uploads/about_setting/about_image';
            $path2='uploads/about_setting/mission_image_1';
            $path3='uploads/about_setting/mission_image_2';
            $path4='uploads/about_setting/mission_image_3';

            if($request->has('about_image') && $request->about_image)
            if($this->deleteImage($data->about_image,$path1))
                $data->about_image=$this->resizeImage($request->about_image,$path1,true,200,200,false);

            if($request->has('mission_image_1') && $request->mission_image_1)
            if($this->deleteImage($data->mission_image_1,$path2))
                $data->mission_image_1=$this->resizeImage($request->mission_image_1,$path2,true,200,200,false);

            if($request->has('mission_image_2') && $request->mission_image_2)
            if($this->deleteImage($data->mission_image_2,$path3))
                $data->mission_image_2=$this->resizeImage($request->headmission_image_2er_logo,$path3,true,200,200,false);

            if($request->has('mission_image_3') && $request->mission_image_3)
            if($this->deleteImage($data->mission_image_3,$path4))
                $data->mission_image_3=$this->resizeImage($request->mission_image_3,$path4,true,200,200,false);
        
            if($data->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.about_setting.index');
            }else{
            Toastr::warning('Please try Again!');
            return redirect()->back();
            }

        }
        catch (Exception $e){
            dd($e);
            Toastr::warning('Please try Again!');
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutSetting  $aboutSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $as= AboutSetting::findOrFail(encryptor('decrypt',$id));
        $as->delete();
        return redirect()->back();
    }
}
