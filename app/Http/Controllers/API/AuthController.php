<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = FacadesValidator::make($request->all(),[
            'nip' => 'required|string|min:9',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!FacadesAuth::attempt($request->only('nip', 'password')))
        {
            return response()
                ->json(['message' => 'Silahkan Masukkan NIP dan Password Anda'], 401);
        }

        $user = User::where('nip', $request['nip'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hallo '.$user->name.', Selamat Datang Di Tambong In Your Hand','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Anda Berhasil Logout dan Token anda telah terhapus'
        ];
    }
}
