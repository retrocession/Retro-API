<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $user = User::create(array_merge(
                $request->all(),
                ['password' => bcrypt($request->password)]
            ));
            $user['token'] = $user->createToken('tokens')->plainTextToken;
            return response()->json($user, 201);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
          'email' => ['required', 'email'],
          'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['token' => $user->createToken('is_admin:' . $user->is_admin)->plainTextToken]);
        } else {
            return response()->json('Unauthorized.', 401);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $user = $user->update($request->all());
        return response()->json($user, 204);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
