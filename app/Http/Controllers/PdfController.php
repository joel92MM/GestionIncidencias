<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapte;



class PdfController extends Controller
{
    // public function index(){
    //     Storage::disk('local')->put('pruebas.txt', 'Contents');
    //     $files=Storage::append('archivos/pruebas.txt', 'final dfel archivo');
    //   return $files->get();
    // }
    public function comprobarYCrearFichero(Request $request){
      $almacenaRutaDestino=public_path("storage/prueba.txt");

      if(!Storage::exists($almacenaRutaDestino)){
        Storage::put($almacenaRutaDestino,"Ese es un contenido simple");
      }else{
        Storage::replace($almacenaRutaDestino,"Este es el contenido del archivo reemplazado");
      }
      return response("Archivo creado/reemplazado correctamente");
    }

    // public function descargarFichero(Request $request){
    //     $contador=1;
    //     $ruta=Storage::disk('public');
    //     $ruta->putFileAs('almacenamientoArchivos', $request->imagen,'imagen'.$contador.'.jpg');
    //     $contador+=1;
    //     return 'La ruta es: '.$ruta;
    // }

}
