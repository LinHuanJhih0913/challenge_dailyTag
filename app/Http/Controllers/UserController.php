<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('tag') != null) {
            $result = array();
            $tags = Tag::where('tag', $request->query('tag'))->select(['user_id'])->distinct()->get();

            foreach ($tags as $tag) {
                array_push($result, $tag->user);
            }
            return $result;
        }
        return 'something wrong';
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required|max:20',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|confirmed'
        ];
        $messages = [
            'name.max' => ':attribute 不得超過 :max 個字符',
            'email.max' => ':attribute 長度限制 :max',
            'email.email' => ':attribute 必須是有效的電子郵件地址',
            'email.unique' => ':attribute 重複註冊',
            'required' => ':attribute 欄位必填',
            'confirmed' => ':attribute confirmation 不符'
        ];
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ]);
        }

        if (!User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ])) {
            return response()->json([
                'status' => 'error'
            ]);
        }

        return response()->json([
            'status' => 'register success'
        ]);
    }

    public function show($user)
    {
        $user = User::find($user);

        if (!$user) {
            return response()->json([
                'status' => 'no user'
            ]);
        } else {
            return $user->tags;
        }
    }
}
