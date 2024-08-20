<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClienteCollection;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function seleccionar()
    {
        $respuesta = Cliente::get();
        return new ClienteCollection($respuesta);
        //return response()->json($respuesta);
    }

    public function crear(Request $request)
    {
        // Obtenemos del request solo los campos name email y passwort
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

        $cliente = new Cliente();
        $cliente->nombres = $request->nombres;
        $cliente->id = $user->id;
        $cliente->primer_apellido = $request->primer_apellido;
        $cliente->segundo_apellido = $request->segundo_apellido;
        $cliente->nro_documento = $request->nro_documento;
        $cliente->direccion = $request->direccion;
        $cliente->celular = $request->celular;
        $cliente->f_registro = now();;
        $cliente->save();
        // new ClienteResource($cliente);

        $cotizacion = Cotizacion::find($request->id_cotizacion);
        $cotizacion->id_cliente = $cliente->id_cliente;
        $cotizacion->save();

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente. Ahora puede iniciar sesión con su correo electrónico y contraseña.',
            'user_id' => $user->id
        ], 200);
    }

    public function actualizar(Request $request, $id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        $cliente->nombres = $request->nombres;
        $cliente->primer_apellido = $request->primer_apellido;
        $cliente->segundo_apellido = $request->segundo_apellido;
        $cliente->nro_documento = $request->nro_documento;
        $cliente->direccion = $request->direccion;
        $cliente->celular = $request->celular;
        $cliente->save();

        $id = $cliente->id;
        $user = User::find($id);
        if ($user->email != $request->email) {
            $user->email = $request->email;
            $user->save();
        }

        return new ClienteResource($cliente);
        //return response()->json($cliente);
    }
    public function eliminar($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        if ($cliente != null) {
            $cliente->delete();
        }
        $responder = [
            'mensaje' => 'Eliminado correctamente',
        ];

        return new ClienteResource($responder);
        //return response()->json($responder);
    }
}
