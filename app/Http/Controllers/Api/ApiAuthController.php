<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $roles = [
            'name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
        ];
        $validator = Validator::make($request->all(), $roles);
        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $isSaved = $user->save();
            if ($isSaved) {
                return $this->generateToken($user, 'REGISERED_SUCCESSFULY');
            } else {
                ////////
            }
        } else {
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
        }
    }

    public function login(Request $request)
    {
        $roles = [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(), $roles);
        if (!$validator->fails()) {
            $user = User::where('email', $request->get('email'))->first();
            if (Hash::check($request->get('password'), $user->password)) {
                // $this->revokePreviousTokens($user->id);
                // return $this->generateToken($user, 'LOGGED_IN_SUCCESSFULLY');

                if ($this->checkActiveTokens($user->id)) {
                    return ControllerHelper::generateResponse(false, 'Login denied, thier is an active access!');
                } else {
                    return $this->generateToken($user, 'LOGGED_IN_SUCCESSFULLY');
                }
            } else {
                return ControllerHelper::generateResponse(false, 'Error credentials');
            }
        } else {
            return ControllerHelper::generateResponse(false, $validator->getMessageBag()->first());
        }
    }

    public function logout(Request $request)
    {
        $request->user('user')->token()->revoke();
        return ControllerHelper::generateResponse(true, 'Logged out successfully');
    }

    private function revokePreviousTokens($userId)
    {
        DB::table('oauth_access_tokens')
            ->where('user_id', $userId)
            ->update([
                'revoked' => true
            ]);
    }

    private function checkActiveTokens($userId)
    {
        return DB::table('oauth_access_tokens')
            ->where('user_id', $userId)
            ->where('revoked', false)
            ->count() >= 1;
    }

    private function generateToken($user, $message)
    {
        $tokenResult = $user->createToken('Doccure-User');
        $token = $tokenResult->accessToken;

        $user->setAttribute('token', $token);
        return response()->json([
            'status' => true,
            'message' => $message,
            'object' => $user,
        ]);
    }
}
