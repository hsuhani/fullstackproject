<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Clarify;
use App\Models\GetTab;
use App\Models\Getall;
use App\Models\Usability;

use App\Models\Connect;


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

public function GetUsability(){
    $usability = Usability::find(1); // fetch the Clarify model instance
    return view('admin.backend.usability.get_usability', compact('usability'));
}
public function UpdateUsability(Request $request){

    $usabi_id=$request->id;
    $usability = Usability::find($usabi_id); 

    if(!$usability){
        return redirect()->back()->with([
            'message' => ' not found!',
            'alert-type' => 'error'
        ]);
    }

    if($request->file('image')){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/get_usability/'), $name_gen);

        // delete old image
        if($usability->image && file_exists(public_path($usability->image))){
            @unlink(public_path($usability->image));
        }

        $usability->update([
            'title' => $request->title,
            'description' => $request->description,
            'youtubelink' => $request->youtubelink,
            'link' => $request->link,
            'image' => 'upload/get_clarify/'.$name_gen,
        ]);
        $notification = [
                'message' => ' updatedsuccessfully with image',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.review')->with($notification);

    } else {

        $usability->update([
            'title' => $request->title,
            'description' => $request->description,
            'youtubelink' => $request->youtubelink,
            'link' => $request->link,
        ]);
    }

    return redirect()->back()->with([
        'message' => ' updated successfully without image',
        'alert-type' => 'success'
        
    ]);
}
public function AllConnect(){
        $connect= Connect::latest()->get();
        return view('admin.backend.connect.all_connect',compact('connect'));
    }

public function AddConnect(){
        $connect= Connect::latest()->get();
        return view('admin.backend.connect.add_connect',compact('connect'));
    }   
public function StoreConnect(Request $request){
        Connect::create([
            'title'=> $request->title,
    
            'description'=> $request->description,
        ]);

        $notification = array(
            'message' => 'conect inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.connect')->with($notification);
    }
public function EditConnect($id){
        $connect = Connect::find($id);
        return view('admin.backend.connect.edit_connect', compact('connect'));
    }
public function UpdateConnect(Request $request){

    $connect = Connect::find($request->id); // FIXED

    if(! $connect){
        return redirect()->back()->with([
            'message' => 'Clarify not found!',
            'alert-type' => 'error'
        ]);
    }

    

        $connect->update([
            'title' => $request->title,
            'description' => $request->description,
            
        ]);


    $notification = [
                'message' => ' updatedsuccessfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.connect')->with($notification);
        }
    

public function DeleteConnect($id){
        Connect::find($id)->delete();
        $notification = array(
            'message' => ' deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
}
public function UpdateConnect(Request $request, $id)
{
    $connect = Connect::findOrFail($id);

    $connect->update([
        'title' => $request->input('title'),
        'description' => $request->input('description')
    ]);

    return response()->json(['success' => true]);
}


}

