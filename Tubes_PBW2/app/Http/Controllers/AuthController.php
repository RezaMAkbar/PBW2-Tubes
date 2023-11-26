<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
$validatedData = $request->validate([
'username' => 'required|string|max:255',
'name' => 'required|string|max:255',
 'email' => 'required|string|email|max:255|unique:users',
 'password' => 'required|string|min:8',
]);
 $user = User::create([
 'username' => $validatedData['username'],
 'name' => $validatedData['name'],
 'email' => $validatedData['email'],
 'password' => Hash::make($validatedData['password']),
 ]);
$token = $user->createToken('auth_token')->plainTextToken;
return response()->json([
 'access_token' => $token,
 'token_type' => 'Bearer',
]);

}
public function login(Request $request)
{
if (!Auth::attempt($request->only('username', 'password'))) {
return response()->json([
'message' => 'Invalid login details'
 ], 401);
 }
$user = User::where('username', $request['username'])->firstOrFail();
$token = $user->createToken('auth_token')->plainTextToken;
return response()->json([
 'access_token' => $token,
 'token_type' => 'Bearer',
]);
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
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
}
