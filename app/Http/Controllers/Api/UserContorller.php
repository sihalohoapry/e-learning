<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class UserContorller extends Controller
{
    public function login( Request $request){
        $input = $request->all();
        $validator = Validator::make($input,[
            'main_number'=>'required',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'msg' => $validator->errors(),
            ],400);
        }

        $main_number = $request->input('main_number');
        $password = $request->input('password');

        $user = User::where([
            ['main_number', $main_number],
        ])->first();

        if(is_null($user)){
            return response()->json([
                'status'=>FALSE,
                'msg'=> "Nomer Induk dan Password Tidak Sesuai",
            ],200);
        } else{
            if(password_verify($password,$user->password)){
                if(is_null($user->class_students_id)){
                    return response()->json([
                        'status'=>TRUE,
                        'msg' => "User Ditemukan",
                        'data'=> new UserResource($user),
                    ],200);
                } else{
                    return response()->json([
                        'status'=>TRUE,
                        'msg' => "User Ditemukan",
                        'data'=> new UserResource($user),
                    ],200);
                }
            }else{
                return response()->json([
                    'status'=>FALSE,
                    'msg' => "Nomer Induk dan Password Tidak Sesuai",
                ],200);
            }
        }

    }

    public function getUserById(Request $request){
        $id = $request->input('id');
        $user = User::where('roles','SISWA')->find($id);

        if(is_null($user)){
            return response()->json([
                'status' => FALSE,
                'msg' => 'User tidak ditemukan'
            ],200);
        }else{
            return response()->json([
                'status' => TRUE,
                'msg' => 'User ditemukan',
                'data' => new UserResource($user),

            ]);
        }
    }

    public function editProfile(Request $request){

        $input = $request->all();
        $user = User::find($request->get('id'));

        if(is_null($user)){
            return response()->json([
                'status' => FALSE,
                'msg' => 'User Tidak Ditemukan'
            ],404);
        }

        $validator = Validator::make($input,[
            'photo_user' => 'sometimes|image|max:2048',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'msg' => $validator->errors,
            ],400);
        }

        if($request->hasFile('photo_user')){
            if($request->file('photo_user')->isValid()){
                $input['photo_user'] = $request->file('photo_user')->store('assets/photo/photo_user','public');
            }
        }

        if($request->password){
            $input['password'] = bcrypt($request->password);
        }
        else{
            unset($input['password']);
        }

        $user->update($input);
        return response()->json([
            'status'=> TRUE,
            'msg' => 'Berhasil mengupdate profile',
        ],200);


    }
    

}
