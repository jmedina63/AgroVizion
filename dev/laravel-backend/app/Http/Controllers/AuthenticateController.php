<?php

namespace App\Http\Controllers;

use App\role_user;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{

    public function authenticate(Request $request)
    {
        // check active or non-active user
        $tmp= User::where('email', $request['email'])->select('status')->first();
        if($tmp['status'] == 1)
        {
            $request['status'] = $tmp['status'];
        }
        else
        {
            return response()->json(['error' => 'Your account is not active! You should active account by email activation link.'], 401);
        }


        $permissions = array();
        $credentials = $request->only('email', 'password','status');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid Credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $role = DB::table('role_user')->where('user_id',Auth::user()->id)->first();
        $role = Role::find($role->role_id);
        $user=Auth::user();
             $temp=$role->perms()->get()->pluck('name');
        foreach($temp as $value){
            $permissions[]=$value;
         }
        $user->permissions=$permissions;
        return response()->json(compact('token','user'));

    }

    public function authAPI(Request $request) {
        // check active or non-active user
        $user = User::where('password', $request['password'])->select('*')->first();
        $token = null;
        if ($user['status'] == 1) {
            $token = JWTAuth::fromUser($user);
            $user['token'] = $token;
            return response()->json($user, 202);
        } else {
            try {
                // verify the credentials and create a token for the user
                if (! $token = JWTAuth::attempt(['password' => $request['password'], 'status' => 1])) {
                    return response()->json(['error' => 'Invalid Credentials'], 401);
                }
            } catch (JWTException $e) {
                // something went wrong
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            $user = Auth::user();
            $user['token'] = $token;
            return response()->json($user, 202);
            // JWTAuth::setToken($token);
            // $tmp['name'] = JWTAuth::toUser();
        }
    }

    public function tokenRefresh() {
        $oldtoken = JWTAuth::getToken();
        try {
            $newToken = JWTAuth::refresh($oldtoken);
            return response()->json(['token' => $newToken], 201);
        } catch(TokenBlacklistedException  $e) {
            return response()->json(['error' => 'Token blacklisted'], 401);
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'Token caducado'], 401);
        } catch(JWTException $e) {
            return response()->json(['error' => 'Token ausente'], 401);
        }
        throw new UnauthorizedHttpException('jwt-auth', $e->getMessage(), $e, $e->getCode());
    }

}
