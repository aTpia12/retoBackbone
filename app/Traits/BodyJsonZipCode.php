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
                "name" => $this->eliminar_tildes($sep[1]),
                "zone_type" => strtoupper($sep[13]),
                "settlement_type" => array(
                    "name" => utf8_encode($sep[2])
                )
                
            );
            array_push($data,  $row);
        }

        //Genera cabecera y adjunta cuerpo de datos
        $arrayJson = [
            "zip_code" => $divide[0],
            "locality" => $this->eliminar_tildes($divide[5]),
            "federal_entity" => [
                "key" => $divide[7],
                "name" => $this->eliminar_tildes($divide[4]),
                "code" => null
            ],
            "settlements" => $data,
            "municipality" => array(
                "key" => $sep[12],
                "name" => $this->eliminar_tildes($divide[3])
            )
          ];

        return $arrayJson; 
    }

    function eliminar_tildes($cadena){

        //Codificamos la cadena en formato utf8 en caso de que nos de errores
        $cadena = utf8_encode($cadena);
    
        //Ahora reemplazamos las letras
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );
    
        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena );
    
        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena );
    
        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena );
    
        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena );
    
        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );
    
        return strtoupper($cadena);
    }
}