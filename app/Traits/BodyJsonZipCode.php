<?php
namespace App\Traits;

trait BodyJsonZipCode{

    public function generate($zip_code){

        //Obtiene el archivo para lectura
        $array_file = file(public_path()."/CPdescarga.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $search = $zip_code;

        //Genera array nuevo con las coincidencias de la busqueda
        $matches = array_filter($array_file, function($var) use ($search){
            return preg_match_all("/^.*$search.*\$/m", $var);
        });
        
        $data = [];
    
        $datos = array_values($matches);

        $divide = explode("|", $datos[0]);

        //Genera formato Json para datos encontrados
        foreach($datos as $num){
            $sep = explode("|", $num);
            $row = array(
                "key" => (int)$sep[12],
                "name" => strtoupper(utf8_encode($sep[1])),
                "zone_type" => strtoupper($sep[13]),
                "settlement_type" => array(
                    "name" => utf8_encode($sep[2])
                ),
                "municipality" => array(
                    "key" => $sep[12],
                    "name" => utf8_encode($sep[3])
                )
                
            );
            array_push($data,  $row);
        }

        //Genera cabecera y adjunta cuerpo de datos
        $arrayJson = [
            "zip_code" => $divide[0],
            "locality" => strtoupper(utf8_encode($divide[5])),
            "federal_entity" => [
                "key" => $divide[7],
                "name" => strtoupper(utf8_encode($divide[4])),
                "code" => null
            ],
            "settlements" => $data
          ];

        return $arrayJson; 
    }
}