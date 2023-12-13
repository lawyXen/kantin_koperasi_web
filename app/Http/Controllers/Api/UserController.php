<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
//D:\AAA_IT DEL\Semester 4\PAM\Proyek\Aplikasi_Web_Admin\PAM-Kantin_Koperasi_Web\app\Http\Controllers\Api\UserController.php
class UserController extends Controller
{
    public function login(Request $requset){
        // dd($requset->all());die();
        $user = User::where('email', $requset->email)->first();

        if($user){

            $user->update([
                'fcm' => $requset->fcm
            ]);

            if(password_verify($requset->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang '.$user->name,
                    'user' => $user
                ]);
            }
            return $this->error('Password yang dimasukkan Salah');
        }
        return $this->error('Email tidak terdaftar');
    }

    public function register(Request $requset){
        //nama, email, password
        $validasi = Validator::make($requset->all(), [
            'ktp' => 'required',
            'nama_lengkap' => 'required',
            'nohp' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = User::create(array_merge($requset->all(), [
            'password' => bcrypt($requset->password)
        ]));

        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang Register Berhasil',
                'user' => $user
            ]);
        }

        return $this->error('Registrasi gagal');

    }

    public function error($pasan){
        return response()->json([
            'success' => 0,
            'message' => $pasan
        ]);
    }

}