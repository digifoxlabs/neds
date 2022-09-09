<?php

namespace App\Controllers\Api;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Entry extends ResourceController
{

    public function create(){


        $data_raw = file_get_contents("php://input");
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->name)){


            $response = [
                'status' => 200,
                'error' => false,
                'message' => "Successfully Created",
                'data' => []
            ];



        }
        else {

            
            $response = [
                'status' => 500,
                'error' => true,
                'message' => "Invalid Input",
                'data' => []
            ];

        }


        return $this->respondCreated($response);


    }

    public function create1(){

        $rules = [
            "name" => "required|trim",
            "father_name" => "required",
        ];

        $messages = [
            "name" => [
                "required" => "Name is required",
               
            ],
         
        ];

        if (!$this->validate($rules, $messages)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];
        } else {

            $data = [
                "name" => $this->request->getVar("name"),
                "father_name" => $this->request->getVar("email"),
  
            ];




            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => [$data]
            ];


        }
        return $this->respondCreated($response);


    }




} ?>