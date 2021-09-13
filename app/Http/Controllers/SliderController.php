<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
   public function addslider(){
       return view('admin.addslider');
   }
   
   public function sliders(){
       $sliders=Slider::All();
       return view('admin.sliders')->with('sliders',$sliders);
   }

   public function saveslider(Request $request){
                 $this->validate($request,['description1'=> 'required',
                                            'description2'=>'required',                                          
                                            'slider_image'=>'image|nullable|max:1999|required']);

// get file name with ext
$fileNameWithExt=$request->file('slider_image')->getClientOriginalName();
// get just filename
$fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
// get the ext
$extension=$request->file('slider_image')->getClientOriginalExtension();
// filename to store
$fileNameToStore=$fileName.'_'.time().'.'.$extension;
// upload image
$path=$request->file('slider_image')->storeAs('public/slider_images',
$fileNameToStore);

$slider= new Slider();
$slider->description1=$request->input('description1');
$slider->description2=$request->input('description2');
$slider->slider_image=$fileNameToStore;

$slider->status=1;

$slider->save();

return back()->with('status', 'The slider was saved');
   }

   public function edit_slider($id){
       $slider=Slider::find($id);
       return view('admin.edit_slider')->with('slider', $slider);
   }

   public function updateslider(Request $request){
    $this->validate($request,['description1'=> 'required',
                                'description2'=>'required',                                          
                                'slider_image'=>'image|nullable|max:1999']);

    $slider= Slider::find($request->input('id'));
        $slider->description1=$request->input('description1');
        $slider->description2=$request->input('description2');

        
        if($request->hasfile('slider_image')){
            // get file name with ext
            $fileNameWithExt=$request->file('slider_image')->getClientOriginalName();
            // get just filename
            $fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get the ext
            $extension=$request->file('slider_image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            // upload image
            $path=$request->file('slider_image')->storeAs('public/slider_images',
            $fileNameToStore);
        
            Storage::delete('public/slider_images/'.$slider->slider_image);            
            
            $slider->slider_image=$fileNameToStore;}
        
        $slider->update();

        return redirect('/sliders')->with('status', 'The slider was updated');
   }

   public function delete_slider($id){
       $slider=Slider::find($id);
       
       Storage::delete('public/slider_images/'.$slider->slider_image);
       
       $slider->delete();
       
       return back()->with('status','The slider was deleted');
   }

   public function activate_slider($id){
       $slider=Slider::find($id);
       $slider->status=1;
       $slider->update();
       
       return back()->with('status','The slider has been activated');
   }

   public function unactivate_slider($id){
       $slider=Slider::find($id);
       $slider->status=0;
       $slider->update();
       
       return back()->with('status','The slider has been unactivated');
   }
}