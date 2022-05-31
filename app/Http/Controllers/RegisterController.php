<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        //ddd(request()->merge(session('registration_data'))->all());
        /*$attributes = request()-> validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:255']
        ]);*/

        $user = User::create([
            'name' => request()->merge(session('registration_data'))->name,
            'email' => request()->merge(session('registration_data'))->email,
            'password' => request()->merge(session('registration_data'))->password,
            'google2fa_secret' => request()->merge(session('registration_data'))->google2fa_secret
        ]);


        return redirect('/')->with('success', 'Your account has been created');
    }

    public function register(Request $request)
    {
        //Validate the incoming request using the already included validator method
        validator($request->all())->validate();

        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');

        // Save the registration data in an array
        $registration_data = $request->all();

        // Add the secret key to the registration data
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

        // Save the registration data to the user session for just the next request
        $request->session()->flash('registration_data', $registration_data);

        // Generate the QR image. This is the image the user will scan with their app
        // to set up two factor authentication
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );
        // Pass the QR barcode image to our view
        return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    }

    public function completeRegistration(Request $request)
    {
        // add the session data back to the request input
        $request->merge(session('registration_data'));

        // Call the default laravel authentication
        return $this->registration($request);
    }
}
