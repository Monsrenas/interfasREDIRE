<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
    

use Illuminate\Http\Request;

class ManagerCrontroller extends Controller
{

    Public function ListaMateriales() {
        $url = env('URL_SERVER_API','http//127.0.0.1');

        $response = Http::get($url.'/materiales')->json();
        $categoria = Http::get($url.'/categorias')->json();

        return view('principal')->with(['datos' => $response])->with(['categ' => $categoria]);
    }

    Public function VerMaterial($id) {
        
        $url = env('URL_SERVER_API','http//127.0.0.1');
        $categoria = Http::get($url.'/categorias')->json();

        if ($id=='0')   {     
            return view('material')->with(['datos' => []])->with(['categ' => $categoria]);
        }    
        
        $response = Http::get($url.'/material/'.$id)->json();
        

        return view('material')->with(['datos' => $response])->with(['categ' => $categoria]);

    }
    

    Public function ActuaMaterial(Request $request) { 
            $url = env('URL_SERVER_API','http//127.0.0.1');
            
            if ($request->id=='0') {
                
                $response = Http::post($url.'/material',[
                    'nombre' => $request->nombre, 
                    'estado' => $request->estado, 
                    'descripcion' => $request->descripcion, 
                    'stock_minimo' => $request->stock_minimo, 
                    'categoria_id' => $request->categoria_id
                ])->json();
            } else {
                $response = Http::put($url.'/material',[
                    'id'=> $request->id,
                    'nombre' => $request->nombre, 
                    'estado' => $request->estado, 
                    'descripcion' => $request->descripcion, 
                    'stock_minimo' => $request->stock_minimo, 
                    'categoria_id' => $request->categoria_id
                ])->json(); 
            }

        return redirect()->route('material.lista');
    }

    Public function ActuaCategoria(Request $request) { 

        $url = env('URL_SERVER_API','http//127.0.0.1');
        
        if ($request->id=='0') {
            
            $response = Http::post($url.'/categoria',[
                'nombre' => $request->nombre, 
                'estado' => $request->estado
            ])->json();
        } else {
            
            $response = Http::put($url.'/categoria',[
                'id'=> $request->id,
                'nombre' => $request->nombre, 
                'estado' => $request->estado
            ])->json(); 
        }

        $response = Http::get($url.'/materiales')->json();
        $categoria = Http::get($url.'/categorias')->json();

        return view('principal')->with(['datos' => $response])->with(['categ' => $categoria])->with(['$activaCat' => 'true']);

    }

}
