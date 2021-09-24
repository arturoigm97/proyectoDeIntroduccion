<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotasController extends Controller
{
    //ESTOS SON METODOS QUE RETORNAN COSAS,
    //PODEMOS DECLARALOS Y MANDARLOS A LLAMAR EN EL ARCHIVO "web.php"

    public function indexmascotas(Request $request){   
        
        //

        return view("vistasmascotas");

    }
    //"Request ese escribe con R mayuscula!!!!"

    public function motorola (Request $request){
        $suma=1+2;
    return $suma;

    }

    public function json (Request $request){
       $arreglo= array(
            "carro"=>"Azul",
            "telefono"=>"rojo",
            "reloj"=>"cafe"
        );
         $json = json_encode($arreglo);
        return $json;
    
    }

    public function retornaVista (Request $request){

$machoAlfa=['pedro'=>'alto','maria'=>'bajita'];

$mujerAlfa=['cotex','always','sava'];

$arregloDoble=[['nombre'=>'pedro' ,'edad'=>20],
                ['nombre'=>'marisol','edad'=>800],
                ['nombre'=>'pedrito sola','edad'=>167]];

        return view('hijo.hijo',[
            'carro'=> 'negro', 
            'machoAlfa'=>$machoAlfa,
            'mujerAlfa'=>$mujerAlfa,
            'arregloDoble'=>$arregloDoble

        ]);
    }

    public function insertarMascotas (Request $request){

       try {
           //ELOQUENT

           
           $mascota=(new Mascota);

           $mascota->nommascota = $request->nommascota;
           $mascota->color=$request->color;
           $mascota->peso=$request->peso;
           $mascota->rasgoparticular=$request->rasgoparticular;
           
           if($request->hasFile ('rutaFoto')){
               $rutaFoto=$request->file('rutaFoto')->store('uploads','public');
               
           }
           //$rutaFoto=$request->file('rutafoto')-insertarMascotas('uploads','public');
           
           //$mascota->rutaFoto=$rutaFoto;
           $mascota->rutaFoto=url('/').('/').$rutaFoto;


       
   
           $mascota->save();
           return response()->json([
                "status" => 201,
                "mensaje"=>"Mascota agregada de manera correcta"
           ],201);

   
           return 'mascota guardada';
   
       } catch (\Throwable $th) {
           //throw $th;
           return response()->json ([
                "status"=> 500,
                "mensaje" => "error al registrar la mascota" . $th->getMessage()
           ],500);

       }

      


    }

public function ObtenerMascotas (Request $request){
try {

    /* Obtiene informacion de una tabla */
    /* $Elmanchas= (new Mascota) -> get(); */

    $Elmanchas= (new Mascota) -> where
       (["nommascota"=>"carlos"  ])->get();

    //ESTA SECCION PERMITE BUSCAR UN COINCIDENCIA CON DIFERENTES FILTROS

    /* $Elmanchas= (new Mascota) -> where(
        [["nommascota","=","carlos"],
         ["peso",">","10"],
         ["color", "=","cafe"]
        ])->get();
     */
    return response()->json([
       
        "status" => 201,
        "mensaje"=>"Mascota obtenida",       
        "manchas"=>$Elmanchas ],201);

    //code...
} catch (\Throwable $th) {
    //throw $th;
    return response()->json ([
        "status"=> 500,
        "mensaje" => "error al obtener mascota" . $th->getMessage()
   ],500);
}

}

public function ViewFormulario (Request $request){
    return view("hijo.formulario");
}

public function recibirDatos (Request $request){
$datosMascota=request()->all;
return response()->json($datosMascota);

}
}

