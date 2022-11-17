<?php
namespace App\Traits;

trait ValidateZipCodeTrait
{
    public function validateZipCode($zip_code)
    {
        $regex = "/^[0-9]{5}$/";
        return preg_match($regex, $zip_code);

    }
}