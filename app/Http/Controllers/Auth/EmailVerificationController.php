<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomEmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    //view send to the email provider
    public function view()
    {
        return view('auth.verify-email');
    }

    //validate the email from the "verify email", redirect the view
    public function validate_redirect(CustomEmailVerificationRequest $request)
    {

        $request->fulfill();

        return redirect(route('home'));
    }

    //resend the link
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
