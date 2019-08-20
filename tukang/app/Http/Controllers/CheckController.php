<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use \App\User;
use \App\Provinsi;
use Image;

class CheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->user()->is_complete == 0) {
            return redirect('complete-first');
        }elseif ($request->user()->active == 0) {
            return redirect('waiting');
        }

        return view('dashboard');
    }

    public function completeData()
    {
        
        $data['province'] = Provinsi::get();

        return view('complete-first', $data);
    }

    public function doUpdate(Request $request)
    {

        $user = User::where('tukang_id', $request->tukang_id)->first();
        $user->name = $request->name;
        $user->province = $request->provinsi;
        $user->dob = $request->dob;
        $user->alamat = $request->alamat;
        $user->price_per_day = $request->price_per_day;
        $user->price_per_hour = $request->price_per_hour;
        $user->is_complete = 1;
        $user->save();

        if($request->hasFile('img_selfie'))
        {
            $storage = Storage::disk('public');
            $path = 'user/'.$user->id.'/';

            if(!empty($user->img_selfie))
            {
                $storage->delete($path.$user->img_selfie);
            }
            
            $file = $request->file('img_selfie');
      
            $fileName = $file->getClientOriginalName();
            $image = file_get_contents($file);
            $ext = $file->getClientMimeType();

            if (!str_contains($ext, ['gif', 'video'])) // kalo selain gif, resize imagenya
            {                
                $img = Image::make($image);
                // $img->fit(600, 600);
                $img = $img->stream()->__toString();
                $storage->put($path.$fileName, $img);
            } 
            else
            {
                $storage->put($path.$fileName, $image);
            }
            
            $user->img_selfie = $fileName;
            $user->save();
        }

        if($request->hasFile('img_ktp'))
        {
            $storage = Storage::disk('public');
            $path = 'user/'.$user->id.'/';

            if(!empty($user->img_ktp))
            {
                $storage->delete($path.$user->img_ktp);
            }
            
            $file = $request->file('img_ktp');
      
            $fileName = $file->getClientOriginalName();
            $image = file_get_contents($file);
            $ext = $file->getClientMimeType();

            if (!str_contains($ext, ['gif', 'video'])) // kalo selain gif, resize imagenya
            {                
                $img = Image::make($image);
                // $img->fit(600, 600);
                $img = $img->stream()->__toString();
                $storage->put($path.$fileName, $img);
            } 
            else
            {
                $storage->put($path.$fileName, $image);
            }
            
            $user->img_ktp = $fileName;
            $user->save();
        }
        dd('stop');


        return redirect('check');

    }
}
