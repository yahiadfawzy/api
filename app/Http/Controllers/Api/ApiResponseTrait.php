<?php
namespace App\Http\Controllers\Api;
trait ApiResponseTrait
{
    public function API_RES($data = null, $error = null , $code = 200){
        $array = [
          'data' => $data,
          'status' => in_array($code,$this->sucess_code())? true:false,
          'error' => $error
        ];
        return response($array , $code);
    }

    public function sucess_code(){
        return [200,201,202];
    }

}
