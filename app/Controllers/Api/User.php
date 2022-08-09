<?php

namespace App\Controllers\Api;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User extends ResourceController
{



    public function login()
    {
        $rules = [
            "email" => "required|valid_email|min_length[6]",
            "password" => "required",
        ];

        $messages = [
            "email" => [
                "required" => "Email required",
                "valid_email" => "Email address is not in format"
            ],
            "password" => [
                "required" => "password is required"
            ],
        ];

        if (!$this->validate($rules, $messages)) {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => $this->validator->getErrors(),
                'data' => []
            ];

            return $this->respondCreated($response);
        } else {
            $userModel = new UserModel();

            $userdata = $userModel->where("email", $this->request->getVar("email"))->first();

            if (!empty($userdata)) {

                if (password_verify($this->request->getVar("password"), $userdata['password'])) {

                    $key = $this->getKey();

                    $iat = time(); // current timestamp value
                    $nbf = $iat + 10;
                    $exp = $iat + 3600;

                    $payload = array(
                        "iss" => "The_claim",
                        "aud" => "The_Aud",
                        "iat" => $iat, // issued at
                        "nbf" => $nbf, //not before in seconds
                        "exp" => $exp, // expire time in seconds
                        "data" => $userdata,
                    );

                    $token = JWT::encode($payload, $key, "HS256");

                    $response = [
                        'status' => 200,
                        'error' => false,
                        'messages' => 'User logged In successfully',
                        'data' => [[
                            'token' => $token,
                            'name'=> $userdata['name'],
                            'email'=> $userdata['email'],
                        ]]
                    ];
                    return $this->respond($response);
                } else {

                    $response = [
                        'status' => 500,
                        'error' => true,
                        'messages' => 'Incorrect details',
                        'data' => []
                    ];
                    return $this->respond($response);
                }
            } else {
                $response = [
                    'status' => 404,
                    'error' => true,
                    'messages' => 'User not found',
                    'data' => []
                ];
                return $this->respond($response);
            }
        }
    }


    private function getKey()
    {
        return "my_application_secret";
    }


    public function profile()
    {
        $key = $this->getKey();
        $authHeader = $this->request->getHeader("Authorization");
        $authHeader = $authHeader->getValue();
        $token = $authHeader;

        try {
           // $decoded = JWT::decode($token, $key, array("HS256"));
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            if ($decoded) {

                $response = [
                    'status' => 200,
                    'error' => false,
                    'messages' => 'User details',
                    'data' => [
                        'profile' => $decoded->data
                    ]
                ];
                return $this->respondCreated($response);
            }
        } catch (Exception $ex) {

            $response = [
                'status' => 401,
                'error' => true,
                'messages' => 'Access denied',
                'data' => []
            ];
            return $this->respondCreated($response);
        }
    }




}