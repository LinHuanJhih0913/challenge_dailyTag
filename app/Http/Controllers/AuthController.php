<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->all();
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ];
        $messages = [
            'email.max' => ':attribute 長度限制 :max',
            'email.email' => ':attribute 必須是有效的電子郵件地址',
            'required' => ':attribute 欄位必填'
        ];
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }

        $user_info = [
            'email' => $input['email'], 'password' => $input['password']
        ];
        if (!Auth::attempt($user_info)) {
            return response()->json([
                'status' => 'something wrong'
            ]);
        } else {
            // 產生 api_token
            $token = str_random(20);

            // 將 api_token 存進 DB
            User::where('id', Auth::id())->update([
                'api_token' => $token
            ]);

            // 發 api_token 給 client
            return response()->json([
                'statue' => 'login success',
                'api_token' => $token
            ]);
        }
    }
}
