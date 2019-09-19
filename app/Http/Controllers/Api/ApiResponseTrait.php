<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;

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

    public function notFoundResponse(){
        return $this->API_RES(null,'not found',404);

    }

    public function Api_Validtion($requset,$array){
        //validate form
        $validate = Validator::make($requset->all(),$array);

        if($validate->fails()){
            return $this->API_RES(null,$validate->errors(),422);
        }
    }

    public function unKnownError(){
        return $this->API_RES(null,'un known error',520);
    }
}

