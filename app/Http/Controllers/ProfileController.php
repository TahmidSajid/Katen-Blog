<?php

namespace App\Http\Controllers;

use App\Mail\OTP_Verify;
use App\Models\User;
use App\Models\Verifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public function view(){
        $otp_check = Verifications::where('user_id',auth()->user()->id)->exists();
        if ($otp_check) {
            $new_email = Verifications::where('user_id',auth()->user()->id)->first()->new_email;
            $otp_sent = '4 digit otp sent to your email '. auth()->user()->email;
        }
        else{
            $new_email = false;
            $otp_sent = false;
        }
        return view('dashboard.profile',compact('otp_check','new_email','otp_sent'));
    }

    public function name_change(Request $request){
        $request->validate([
            'new_name' => 'required',
        ]);
        User::where('id',auth()->user()->id)->update([
            'name' => $request->new_name,
        ]);
        return back();
    }

    public function profile_picture(Request $request){

        $request->validate([
            'profile_photo' => 'required|file',
        ]);

        $Image = new ImageManager(new Driver());
        $new_name = Str::random(5).time().".".$request->file('profile_photo')->getClientOriginalExtension();
        $image = $Image->read($request->file('profile_photo'))->resize(450,450);
        $image->save(('uploads/profile_photos/'.$new_name),quality:80);

        if (auth()->user()->photo) {
            unlink('uploads/profile_photos/'.auth()->user()->photo);
        }
        User::where('id',auth()->user()->id)->update([
            'photo' => $new_name,
        ]);

        return back();
    }

    public function email_change(Request $request){

        $request->validate([
            'new_email' => 'required|email|unique:users,email',
        ]);

        $OTP = rand(1000,5000);

        Verifications::create($request->except('_token')+[
            'OTP' => $OTP,
            'user_id' => auth()->user()->id,
            'user_email' => auth()->user()->email,
            'new_email' => $request->new_email,
        ]);

        Mail::to(auth()->user()->email)->send(new OTP_Verify($OTP,$request->new_email));


        return back();
    }
    public function otp_verify(Request $request){

        $request->validate([
            'otp' => 'required',
        ]);

        $otp_check = Verifications::where('OTP',$request->otp)->exists();
        if ($otp_check) {
            User::where('id',auth()->user()->id)->update([
                'email' => $request->new_email,
            ]);
            Verifications::where('user_id',auth()->user()->id)->delete();
        }

        return back();
    }
}
