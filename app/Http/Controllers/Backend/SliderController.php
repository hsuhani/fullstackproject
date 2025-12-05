<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Title;
use Intervention\Image\ImageManager;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;





class SliderController extends Controller
{
    public function GetSlider(){
        $slider= Slider::find(1);
        return view('admin.backend.slider.get_slider',compact('slider'));
    }
    public function UpdateSlider(Request $request){
        $slider = Slider::find(1); 
        $slider_id = $slider->id;

        if($request->file('image')){
            $image = $request->file('image');

            // ----- COMMENTED GD / INTERVENTION PART -----
            // $manager = new ImageManager(Driver::class);
            // $name_gen = hexadec(uniqid()).'.'.$image->getClientOriginalExtension();
            // $img = $manager->read($image);
            // $img->resize(306,618)->save(public_path('upload/slider/'.$name_gen));
            // $save_url = 'upload/review/'.$name_gen;
            // ---------------------------------------------

            // TEMPORARY FALLBACK: Upload image normally
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/sliderupload/'), $name_gen);

            if(file_exists(public_path($slider->image))){
                @unlink(public_path($slider->image));
            }

            

            $save_url = 'upload/slider/'.$name_gen;

            Slider::find($slider_id)->update([
                'title'=> $request->title,
                'link'=> $request->link,
                
                'description'=> $request->description,
                
                'image'=> $save_url,
            ]);

            $notification = [
                'message' => 'slider updatedsuccessfully with image',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
        else{
            Slider::find($slider_id)->update([
                'title'=> $request->title,
                'link'=> $request->link,
                
                'description'=> $request->description,
            ]);

            $notification = [
                'message' => 'slider inserted without image successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function EditSlider(Request $request,$id){
        $slider= Slider::findOrFail($id);
        if($request->has('title')){
            $slider->title=$request->title;
        }
        if($request->has('description')){
            $slider->description=$request->description;
        }
        $slider->save();
        return response()->json(['success'=>true]);
    }
    public function EditFeatures(Request $request,$id){
        $title= Title::findOrFail($id);
        if($request->has('features')){
            $title->features=$request->features;
        }
       
        $title->save();
        return response()->json(['success'=>true]);
    }
        public function EditReviews(Request $request,$id){
        $title= Title::findOrFail($id);
        if($request->has('reviews')){
            $title->reviews=$request->reviews;
        }
       
        $title->save();
        return response()->json(['success'=>true]);
    }
        public function EditAnswer(Request $request,$id){
        $title= Title::findOrFail($id);
        if($request->has('answer')){
            $title->answer=$request->answer;
        }
       
        $title->save();
        return response()->json(['success'=>true]);
    }
    
    public function UpdateConnect(Request $request, $id)
{
    $connect = Connect::findOrFail($id);

    // Correct array syntax: separate strings for each field
    $connect->update($request->only(['title', 'description']));

    return response()->json([
        'success' => true,
        'message' => 'updated successfully'
    ]);
}


}
