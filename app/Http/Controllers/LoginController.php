<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid login credentials'], 401);
        }

        // Generate a new API token for the authenticated user
        $user = Auth::user();
        if (!$user->user_types_id == 4) {
            return response()->json(['error' => 'Invalid login credentials'], 401);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;

        // Return a success response with the token
        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
