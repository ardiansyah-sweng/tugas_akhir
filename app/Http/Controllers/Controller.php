<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\OTP;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isEmailExist($email)
    {
        $recordUsers = User::where('email', $email)->get();
        if (count($recordUsers) > 0) {
            $this->saveNewOTP($recordUsers[0]['email']);
        }
        return response()->json($recordUsers);
    }

    public function isOTPExist($email, $otp)
    {
        $recordOTPs = OTP::where('otp', $otp)->where('email', $email)->where('status', 'active')->get();
        return response()->json($recordOTPs);
    }

    public function saveNewOTP($email)
    {
        OTP::create([
            'email' => $email,
            'otp' => $this->generateOTP(),
            'status' => 'active'
        ]);
    }

    public function generateOTP()
    {
        return mt_rand(0, 10000);
    }
}
