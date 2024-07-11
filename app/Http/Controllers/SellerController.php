<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Validator;


class SellerController extends Controller
{
    public function index()
    {
        try {
            $sellers = Seller::all();
            return response()->json($sellers, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Sellers not found'], 404);
        }
        // try {
        //     $loggedInSellerId = Auth::user()->id;
        //     $seller = Seller::findOrFail($loggedInSellerId);
        //     return response()->json($seller, 200);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Seller not found'], 404);
        // }
    }

    public function show($id)
    {
        try {
            $seller = Seller::findOrFail($id);
            return response()->json($seller, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Seller not found'], 404);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // try {
        //     $validatedData = $request->validate([
        //         'email' => 'required|unique:seller,email',
        //         'password' => 'required|min:6',
        //         'name' => 'required',
        //         'username' => 'required|unique:seller,username',
        //         'phone' => 'required|max:11',
        //         'address' => 'required',
        //         'picture' => 'required|image',
        //     ]);

        //     $path = $request->file('picture')->store('pictures', 'public');

        //     $seller = Seller::create([
        //         'email' => $validatedData['email'],
        //         'password' => Hash::make($validatedData['password']),
        //         'name' => $validatedData['name'],
        //         'username' => $validatedData['username'],
        //         'phone' => $validatedData['phone'],
        //         'address' => $validatedData['address'],
        //         'picture' => $path,
        //     ]);

        //     Mail::to($seller->email)->send(new ConfirmMail($seller));

        //     return response()->json([
        //         'success' => 'Registered successfully.',
        //         'seller' => $seller,
        //         'status' => 200
        //     ]);

        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     return response()->json([
        //         'error' => 'Validation failed.',
        //         'errors' => $e->errors(),
        //         'status' => 422
        //     ]);
        // }
//---------------
        // $request->validate([
        //     'name' => 'required',
        //     'username' => 'required|unique:seller',
        //     'email' => 'required|email|unique:seller',
        //     'password' => 'required|min:8',
        //     'address' => 'required',
        //     'phone' => 'required',
        //     'picture' => 'required|image',

        // ]);

        // // Process and store seller data
        // $seller = new Seller();
        // $seller->name = $request->input('name');
        // $seller->username = $request->input('username');
        // $seller->email = $request->input('email');
        // $seller->password = bcrypt($request->input('password'));
        // $seller->address = $request->input('address');
        // $seller->phone = $request->input('phone');

        // // Handle picture upload
        // if ($request->hasFile('picture')) {
        //     $picture = $request->file('picture');
        //     $filename = time() . '_' . $picture->getClientOriginalName();
        //     $path = $request->file('picture')->storeAs('public/seller_images', $filename);
        //     $seller->picture = $filename;
        // }

        // $seller->save();

        // return response()->json(['message' => 'Seller created successfully', 'seller' => $seller], 201);
    
    }

    public function update(Request $request, $id)
    {
        $seller = Seller::find($id);
        if (!$seller) {
            return response()->json(['message' => 'Seller not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:seller,username,' . $id,
            'email' => 'required|string|email|max:255|unique:seller,email,' . $id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $seller->update($request->all());

        return response()->json(['message' => 'Seller updated successfully', 'seller' => $seller]);
    }

    public function destroy($id)
        {
            $seller = Seller::findOrFail($id); // 
            $seller->delete();

            return response()->json(['message' => 'Seller deleted successfully']);
        }

          

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('seller')->attempt($credentials)) {
    //         $seller = Auth::guard('seller')->user();

    //         // Generate API token if not already generated
    //         if (empty($seller->api_token)) {
    //             $seller->api_token = bcrypt(uniqid());
    //             $seller->save();
    //         }

    //         return response()->json([
    //             'message' => 'Seller login successful',
    //             'seller' => $seller,
    //             'token' => $seller->api_token,
    //         ], 200);
    //     }

    //     return response()->json(['message' => 'Unauthorized'], 401);
    // }

    public function updateStatus(Request $request, $id)
    {
        $seller = Seller::findOrFail($id);
        $seller->status = $request->input('status');
        $seller->save();
    
        return response()->json(['message' => 'Seller status updated successfully', 'seller' => $seller]);
    }

}
