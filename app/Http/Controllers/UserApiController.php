<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    
    public function index()
    {
        return response()->json(User::all(),200);
    }

    public function store(Request $request)
    {
        # validaciones
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'document' => 'required|integer|unique:users,document|min:100000',
            'city' => 'required|integer|not_in:0',
            'phone' => 'required|integer|min:1000000000|max:9999999999',
            'email' => 'required|email|unique:users,email',
        ]);

        # validacion  fallida
        if($validator->fails()){
            return response()->json([
                'message' => 'Error de validacion de datos',
                'errors' => $validator->errors() 
            ],400);
        }

        # creacion de usuario
        $user = new User();
        $user->fill($request->all());
        $user->id_city = $request->city;
        $user->save();
        return response()->json([
            'message' => 'Usuario Creado Correctamente',
            'user' => $user
        ],200);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                'message' => 'No se encontro el usuario con id ' . $id
            ],404);
        }
        return response()->json(User::find($id),200);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                'message' => 'No se encontro el usuario con id ' . $id
            ],404);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'min:3',
            'lastname' => 'min:3',
            'document' => 'integer|min:100000',
            'city' => 'integer|not_in:0',
            'phone' => 'integer|min:1000000000|max:9999999999',
            'email' => 'email',
        ]);

        # validacion  fallida
        if($validator->fails()){
            return response()->json([
                'message' => 'Error de validacion de datos',
                'errors' => $validator->errors()
            ],400);
        }

        if($request->has('name')){
            $user->name = $request->name;
        }

        if($request->has('lastname')){
            $user->lastname = $request->lastname;
        }

        if($request->has('document')){
            $user->document = $request->document;
        }

        if($request->has('phone')){
            $user->phone = $request->phone;
        }

        if($request->has('city')){
            $user->id_city = $request->city;
        }

        if($request->has('email')){
            $user->email = $request->email;
        }

        $user->save();

        return response()->json([
            'message' => 'Usuario Actualizado',
            'user' => $user
        ],200);
    }

    public function destroy(string $id)
    {
        //
    }
}
