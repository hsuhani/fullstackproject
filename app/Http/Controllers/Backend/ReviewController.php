<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Intervention\Image\ImageManager;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Drivers\Gd\Driver;


class ReviewController extends Controller
{
    public function AllReview(){
        $review= Review::latest()->get();
        return view('admin.backend.review.all_review',compact('review'));
    }

    public function AddReview(){
        $review= Review::latest()->get();
        return view('admin.backend.review.add_review',compact('review'));
    }

    public function storeReview(Request $request){
        if($request->file('image')){
            $image = $request->file('image');

            // ----- COMMENTED GD / INTERVENTION PART -----
            // $manager = new ImageManager(Driver::class);
            // $name_gen = hexadec(uniqid()).'.'.$image->getClientOriginalExtension();
            // $img = $manager->read($image);
            // $img->resize(60,60)->save(public_path('upload/review/'.$name_gen));
            // $save_url = 'upload/review/'.$name_gen;
            // ---------------------------------------------

            // TEMPORARY FALLBACK: Upload image normally
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/review'), $name_gen);
            $save_url = 'upload/review/'.$name_gen;

            Review::create([
                'name'=> $request->name,
                'position'=> $request->position,
                'message'=> $request->message,
                'image'=> $save_url,
            ]);
        }

        $notification = [
            'message' => 'Review inserted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.review')->with($notification);
    }

    public function EditReview($id){
        $review= Review::find($id);
        return view('admin.backend.review.edit_review',compact('review'));
    }

    public function UpdateReview(Request $request){
        $rev_id= $request->id;

        if($request->file('image')){
            $image = $request->file('image');

            // ----- COMMENTED GD / INTERVENTION PART -----
            // $manager = new ImageManager(Driver::class);
            // $name_gen = hexadec(uniqid()).'.'.$image->getClientOriginalExtension();
            // $img = $manager->read($image);
            // $img->resize(60,60)->save(public_path('upload/review/'.$name_gen));
            // $save_url = 'upload/review/'.$name_gen;
            // ---------------------------------------------

            // TEMPORARY FALLBACK: Upload image normally
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/review'), $name_gen);

            

            $save_url = 'upload/review/'.$name_gen;

            Review::find($rev_id)->update([
                'name'=> $request->name,
                'position'=> $request->position,
                'message'=> $request->message,
                'image'=> $save_url,
            ]);

            $notification = [
                'message' => 'Review updatedsuccessfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.review')->with($notification);
        }
        else{
            Review::find($rev_id)->update([
                'name'=> $request->name,
                'position'=> $request->position,
                'message'=> $request->message,
            ]);

            $notification = [
                'message' => 'Review inserted without image successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.review')->with($notification);
        }
    }

    public function DeleteReview($id){
        $item= Review::find($id);
        $img=$item->image;
        unlink($img);

        Review::find($id)->delete();

        $notification = [
            'message' => 'Review deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    // Show Getall section
public function ShowGetall(){
    $getall = Getall::find(1); 
    return view('admin.backend.getall.get_all', compact('getall'));
}
public function GetAll()
{
    $getall = Getall::with('tabs')->find(1); 
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

}
