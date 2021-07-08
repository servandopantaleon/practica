<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Genero;
use App\Modelos\EstadoCivil;
use App\Modelos\Nivel;
use App\Modelos\Licenciatura;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDatos()
    {
        $generos = Genero::all(['id', 'nombre']);

        $estados_civiles = EstadoCivil::all(['id', 'nombre']);

        $niveles= Nivel::all(['id','nombre']);



        return response()->json([
            'generos' => $generos,
            'estados_civiles' => $estados_civiles,
            'niveles_interes' => $niveles,
            'estatus' => true 
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLicenciaturas()
    {
        $nivel=(int)request('nivel');
        $licenciaturas = Licenciatura::where('nivel_id',$nivel)->get(['id', 'nombre']);

        return response()->json([
            'licenciaturas' => $licenciaturas,
            'estatus' => true 
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearUsuario(Request $request)
    {
        
        $user= User::where('email',$request->email)->first(['id']);
        if ($user) {
            return response()->json([
                'estatus' => false,
                'mensaje' => 'El E-mail ya existe' 
            ]);           
        }
        $usuario = new User;
        $usuario->name             =$this->filtro($request->nombre);
        $usuario->apellido_paterno =$this->filtro($request->apellido_paterno);
        $usuario->apellido_materno =$this->filtro($request->apellido_materno);
        $usuario->edad             =(int)$request->edad;
        $usuario->email            =$this->filtro($request->email);
        $usuario->nivel_id         =(int)$request->nivel;
        $usuario->licenciatura_id  =(int)$request->licenciatura;
        $usuario->genero_id        =(int)$request->genero;
        $usuario->estado_civil_id  =(int)$request->estado_civil;
        $usuario->password         =\Hash::make($request->password);
        $usuario->save();

       
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           return response()->json([
                'estatus' => true,
                'mensaje' =>''
            ]);
        }else {
            return response()->json([
                'estatus' => false,
                'mensaje' => 'Intentarlo mas tarde' 
            ]); 
        }

        
    }


    public function filtro($string){

        $Newvalue1 = str_replace("/", "", $string);
        $Newvalue2 = str_replace("*", "", $Newvalue1);
        $Newvalue3 = str_replace("?", "", $Newvalue2);
        $Newvalue4 = str_replace(";", "", $Newvalue3);
        $Newvalue5 = str_replace("&", "", $Newvalue4);
        $Newvalue6 = str_replace("\\", "", $Newvalue5);
        $Newvalue7 = str_replace("+", "", $Newvalue6);
        $Newvalue8 = str_replace("(", "", $Newvalue7);
        $Newvalue9 = str_replace(")", "", $Newvalue8);
        $Newvalue10 = str_replace("[", "", $Newvalue9);
        $Newvalue11 = str_replace("]", "", $Newvalue10);
        $Newvalue12 = str_replace("<", "", $Newvalue11);
        $Newvalue13 = str_replace(">", "", $Newvalue12);
        $Newvalue14 = str_replace("{", "", $Newvalue13);
        $Newvalue15 = str_replace("}", "", $Newvalue14);
        $Newvalue16 = str_replace("`", "", $Newvalue15);
        $Newvalue17 = str_replace("|", "", $Newvalue16);
        $Newvalue18 = str_replace("\"", "", $Newvalue17);
        $Newvalue19 = str_replace("'", "", $Newvalue18);

        $Newvalue20 = filter_var($Newvalue19, FILTER_SANITIZE_STRING);

        return $Newvalue20;

    }


}
