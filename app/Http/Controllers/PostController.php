<?php
namespace App\Http\Controllers;
use App\Http\Resources\postRecource;
use App\post;
use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController
{
    use ApiResponseTrait;
    function read(){
        $result = postRecource::collection(post::all());
        return $this->API_RES($result);
    }

     function show($id){
        $result = post::find($id);

        if($result){
         $result = new postRecource($result);
         return $this->API_RES($result,null,202);
        }
        else
           return $this->API_RES($result,'not found',404);
    }

    function readPage($page){
        $result =
            postRecource::collection(post::all()->forPage($page,7));
        return $this->API_RES($result);
    }

    function store(Request $requset){

     $validate = Validator::make($requset->all(),[
       'title'=>'required|min:3|max:10',
       'body'=>'required|min:6|max:50'
     ]);

     if($validate->fails()){
         return $this->API_RES(null,$validate->errors(),422);
     }

      $post = new postRecource(post::create($requset->all()));
      if($post)
          return $this->API_RES($post,null,201);
      else
          return $this->API_RES(null,'can add data',520);
    }

    //witout using resource to cotroll the return
    /* function read(){
        $result =post::all();
        return $this->API_RES($result);
    }

    function show($id){
        $result = post::find($id);
        if($result)
            return $this->API_RES($result,null,202);
        else
            return $this->API_RES($result,'not found',404);
    }

    function readPage($page){
        $result = post::all()->forPage($page,7);
        return $this->API_RES($result);
    }*/


}
