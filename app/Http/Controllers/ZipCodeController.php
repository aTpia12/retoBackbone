<?php

namespace App\Http\Controllers;

use App\Traits\BodyJsonZipCode;
use App\Traits\ValidateZipCodeTrait;

class ZipCodeController extends Controller
{
    use ValidateZipCodeTrait; 
    use BodyJsonZipCode;

    public function show($zip_code)
    {
        $validate_zip_code = $this->validateZipCode($zip_code);

        if($validate_zip_code < 1){
            return response()->json([
                "error" => "El C.P. Debe ser númerico de 5 dígitos"
            ]);
        }
        
        $response = $this->generate($zip_code);

        return $response;
 
        
    }

}
