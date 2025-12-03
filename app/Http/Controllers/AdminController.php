<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function AdminLogin(Request $request){
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            $user=Auth::user();

            $verificationCode=random_int(10000,999999);
        session(['verification_code'=>$verificationCode,'user_id'=>$user->id]);

        Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));


        Auth::logout();
        return redirect()->route('custom.verification.form')->with('status','verification code sent to your mail');

        }
        return redirect()->back()->withErrors(['email'=>'invalid creentials provided']);

    }
    public function ShowVerification(){
        return view('auth.verify');
    }
    public function VerificationVerify(Request $request){
        $request->validate(['code'=>'required|numeric']);
        if($request->code==session('verification_code')){
            Auth::loginUsingID(session('user_id'));

            session()->forget(['verification_code','user_id']);
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['code'=>'invalid verification code']);
    }
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData=User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    }
    public function ProfileStore(Request $request){
        $id=Auth::user()->id;
        $data=User::find($id);

        $data->name= $request->name;
        
        
        
        $data->phone= $request->phone;
        
        $data->adress= $request->adress;
        $OldPhotoPath= $data->photo;
        if($request->hasFile('photo')){
            $file =$request->file('photo');
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'),$filename);
            $data->photo=$filename;

            if($OldPhotoPath && $OldPhotoPath!==$filename ){
                $this->deleteOldImage($OldPhotoPath);

            }

        }
        $data->save();
        $notification= array(
            'message'=>'profile updated successffully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
private function deleteOldImage(string $OldPhotoPath ):void{
    $fullPath = public_path('upload/user_images/' . $OldPhotoPath);

    if(file_exists($fullPath)){
        unlink($fullPath);
    }
}
public function PasswordUpdate(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
    ]);

    // Fix: Hash::check — and condition corrected
    if (!Hash::check($request->old_password, $user->password)) {

        $notification = [
            'message' => "Old password not match",
            'alert-type' => 'error',
        ];

        return back()->with($notification);
    }

    // Fix: Hash::make (you wrote Has::make)
    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    Auth::logout();

    $notification = [
        'message' => 'Password updated successfully',
        'alert-type' => 'success',
    ];

    // Fix: redirect()->route('login') — not array
    return redirect()->route('login')->with($notification);
}
}
