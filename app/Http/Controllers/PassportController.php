<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use Illuminate\Support\Facades\Validator;

class PassportController extends Controller
{
    public function register(Request $request)
    {
        // Obtenemos del request solo los campos name email y password
        $input = $request->only(['name', 'email', 'password']);
        // Agregando reglas de validación
        $validate_data = [
            'name' => 'required|string|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
        // Validamos los datos de entrada
        $validator = Validator::make($input, $validate_data);
        // Si la validación falla, retornamos un json con los errores
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación. Por favor, vea el parámetro de errores para todos los errores.',
                'errors' => $validator->errors()
            ]);
        }
        // Si la validación es correcta, creamos el usuario
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password'])
        ]);
        // Retornamos un json con el mensaje de éxito
        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente. Ahora puede iniciar sesión con su correo electrónico y contraseña.'
        ], 200);
    }

    public function login(Request $request)
    {
        // Obtenemos del request solo los campos email y password
        $input = $request->only(['email', 'password']);
        // Agregando reglas de validación
        $validate_data = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
        // Validamos los datos de entrada
        $validator = Validator::make($input, $validate_data);
        // Si la validación falla, retornamos un json con los errores
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación. Por favor, vea el parámetro de errores para todos los errores.',
                'errors' => $validator->errors()
            ]);
        }
        // Si la validación es correcta, intentamos autenticar al usuario
        if (auth()->attempt($input)) {
            // Si la autenticación es exitosa, creamos un token de acceso y lo enviamos al usuario
            $user = auth()->user();
            $token = auth()->user()->createToken('passport_token')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'User login succesfully, Use token to authenticate.',
                'id_cliente' => $user->cliente->id_cliente,
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User authentication failed.'
            ], 401);
        }
    }

    public function userDetail()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => auth()->user() // Obtenemos los datos del usuario autenticado
        ], 200);
    }

    public function logout()
    {
        $access_token = auth()->user()->token();
        // Revocar el token de acceso en un solo dispositivo
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($access_token->id);
        // User este código si desea revocar el token de acceso en todos los dispositivos
        // $refreshTokenRepository = app(RefreshTokenRepository::class);
        // $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($$access_token->id);
        return response()->json([
            'success' => true,
            'message' => 'User logout successfully.'
        ], 200);
    }
}
