<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginseller(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
    
        // Attempt to find the seller by email
        $seller = Seller::where('email', $request->email)->first();
    
        if ($seller) {
            // Check if seller is active
            if ($seller->status == 'Active') {
                // Verify password
                if (Hash::check($request->password, $seller->password)) {
                    // Generate a new API token if needed
                    // $token = $seller->createToken('seller-token')->plainTextToken;
    
                    return response()->json([
                        'success' => true,
                        'message' => 'Seller login successful',
                        'seller' => $seller
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid email or password'
                    ], 401);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Your account has been deactivated by admin. Contact admin to activate your account.'
                ], 401);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password'
            ], 401);
        }
    }

    public function loginadmin(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

         // Attempt to find the seller by email
         $admin = Admin::where('email', $request->email)->first();

         if ($admin && Hash::check($request->password, $admin->password)) {
             // Generate a new API token
            //  $token = $seller->createToken('seller-token')->plainTextToken;
 
             return response()->json([
                 'success' => true,
                 'message' => 'Seller login successful',
                 
                 'admin' => $admin
             ]);
         } else {
             return response()->json([
                 'success' => false,
                 'message' => 'Invalid email or password'
             ], 401);
         }
    }
}
