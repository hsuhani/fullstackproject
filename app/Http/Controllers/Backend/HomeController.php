<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Clarify;
use App\Models\GetTab;
use App\Models\Getall;
use App\Models\Connect;
use App\Models\Faq;

class HomeController extends Controller
{
    public function AllFeature(){
        $feature= Feature::latest()->get();
        return view('admin.backend.feature.all_feature',compact('feature'));
    }

    public function AddFeature(){
        return view('admin.backend.feature.add_feature');
    }

    public function StoreFeature(Request $request){
        Feature::create([
            'title'=> $request->title,
            'icon'=> $request->icon,
            'description'=> $request->description,
        ]);

        $notification = array(
            'message' => 'FEATURE inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.feature')->with($notification);
    }

    public function EditFeature($id){
        $feature = Feature::find($id);
        return view('admin.backend.feature.edit_feature', compact('feature'));
    }

    public function UpdateFeature(Request $request){
        $fea_id = $request->id;

        Feature::find($fea_id)->update([
            'title'=> $request->title,
            'icon'=> $request->icon,
            'description'=> $request->description,
        ]);

        $notification = array(
            'message' => 'FEATURE updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.feature')->with($notification);
    }
    public function DeleteFeature($id){
        Feature::find($id)->delete();
        $notification = array(
            'message' => 'FEATURE deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
 // Show Clarify section
public function GetClarifies(){
    $clarify = Clarify::find(1); // fetch the Clarify model instance
    return view('admin.backend.clarify.get_clarify', compact('clarify'));
}

// Update Clarify section
public function EditClarify($id){
        $clarify = Clarify::find($id);
        return view('admin.backend.feature.edit_feature', compact('clarify'));
    }

    
    
public function UpdateClarify(Request $request){

    $clarify = Clarify::find($request->id); // FIXED

    if(!$clarify){
        return redirect()->back()->with([
            'message' => 'Clarify not found!',
            'alert-type' => 'error'
        ]);
    }

    if($request->file('image')){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/get_clarify/'), $name_gen);

        // delete old image
        if($clarify->image && file_exists(public_path($clarify->image))){
            @unlink(public_path($clarify->image));
        }

        $clarify->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'upload/get_clarify/'.$name_gen,
        ]);

    } else {

        $clarify->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }

    return redirect()->back()->with([
        'message' => 'Clarify updated successfully',
        'alert-type' => 'success'
    ]);
}


    
    // Show Getall section
public function ShowGetall(){
    $getall = Getall::find(1); 
    return view('admin.backend.getall.get_all', compact('getall'));
}

// Update Getall section
public function UpdateGetall(Request $request){

    // Fetch the main Getall section (parent)
    $getall = Getall::find(1); 
    $getall_id = $getall->id;

    // If a new image is uploaded
    if($request->file('image')){
        $image = $request->file('image');

        // ----- COMMENTED GD / INTERVENTION (Same style as Clarify) -----
        // $manager = new ImageManager(Driver::class);
        // $name_gen = hexadec(uniqid()).'.'.$image->getClientOriginalExtension();
        // $img = $manager->read($image);
        // $img->resize(306,618)->save(public_path('upload/getall/'.$name_gen));
        // $save_url = 'upload/getall/'.$name_gen;
        // ---------------------------------------------------------------

        // TEMPORARY FALLBACK: Upload image normally
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/getall/'), $name_gen);

        // Delete previous image if exists
        if(file_exists(public_path($getall->image))){
            @unlink(public_path($getall->image));
        }

        // New image save path
        $save_url = 'upload/getall/'.$name_gen;

        // Update with image
        Getall::find($getall_id)->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'image'=> $save_url,
        ]);

        // Notification
        $notification = [
            'message' => 'Getall updated successfully with image',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // If NO image uploaded
    else{

        Getall::find($getall_id)->update([
            'title'=> $request->title,
            'description'=> $request->description,
        ]);

        // Notification
        $notification = [
            'message' => 'Getall updated successfully without image',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
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

public function AllFaq(){
        $faq= Faq::latest()->get();
        return view('admin.backend.faq.all_faq',compact('faq'));
    }
    
public function AddFaq(){
    return view('admin.backend.faq.add_faq');
}
public function StoreFaq(Request $request){
        Faq::create([
            'title'=> $request->title,
            
            'description'=> $request-> description,
        ]);

        $notification = array(
            'message' => 'Faq inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }
public function EditFaq($id){
        $faq = Faq::find($id);
        return view('admin.backend.faq.edit_faq', compact('faq'));
    }

public function UpdateFaq(Request $request){
        $faq = $request->id;

        Faq::find($faq)->update([
            'title'=> $request->title,
            
            'description'=> $request->description,
        ]);

        $notification = array(
            'message' => 'faq updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }
    public function DeleteFaq($id){
        Faq::find($id)->delete();
        $notification = array(
            'message' => ' deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}