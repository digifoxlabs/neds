<?php

namespace App\Controllers\Api;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Load Model
use App\Models\CustomerModel;
use App\Models\FamilyModel;

class Entry extends ResourceController
{



    protected $helpers = ['url', 'html', 'form','text','filesystem'];

    public $db;
    protected $table = 'customers';

    public function __construct(){

        $data = array( 
            'pageTitle' => 'MCS-Members',                      
        );

       
        $this->db = \Config\Database::connect();    
        $this->builder =  $this->db->table('family');   

    }

    public function create(){


        $data_raw = file_get_contents("php://input");
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->name) && isset($data->token)){

            $key = $this->getKey();
            //Extract Token from Json Data
            $token = $data->token;

        try {
           
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            if ($decoded) {

                $user_id = $decoded->data->u_id;

                 $model = new CustomerModel();
       
                //Extract Json Data
                $customerData = [

                    'customer_id' => $this->generateUserId(),
                    'name' => $data->name,
                    'father_name' => $data->father_name,
                    'gender' => $data->gender,
                    'community' => $data->community,
                    'dob' => $data->dob,
                    'doj_service' => $data->doj_service,
                    'maritial_status' => $data->maritial_status,
                    'is_disable' => $data->is_disable,
                    'disability' => $data->disability,
                    'disabilitypcn' => $data->disabilitypcn,

                    'res_hno' => $data->res_hno,
                    'res_street' => $data->res_street,
                    'res_district' => $data->res_district,
                    'res_city' => $data->res_city,
                    'res_contact' => $data->res_contact,
                    'res_email' => $data->res_email,
                    'res_adminunit' => $data->res_adminunit,
                    'res_unit_name' => $data->res_unit_name,

                    'ofc_hno' => $data->ofc_hno,
                    'ofc_street' => $data->ofc_street,
                    'ofc_district' => $data->ofc_district,
                    'ofc_city' => $data->ofc_city,
                    'ofc_contact' => $data->ofc_contact,
                    'ofc_email' => $data->ofc_email,
                    'ofc_adminunit' => $data->ofc_adminunit,
                    'ofc_unit_name' => $data->ofc_unit_name,

                    'ration_card' => $data->ration_card,
                    'iden_1' => $data->iden_1,
                    'iden_2' => $data->iden_2,

                    'image' => NULL,
                    'created_by_user' => $user_id,
                    'valid_upto' => Date('y:m:d', strtotime('365 days')),

                //     //'status' => $this->request->getVar('status'),
                ];

                $model->save($customerData);
                $c_id = $model->insertID();               

                if(!empty($data->family)) {

                    $msg ="FAMILIY";
                    $memberData = array();

                    $i = 0;
                    foreach ($data->family as $item){

                        $memberData[$i] = array(

                                'c_id' => $c_id,
                                'relationship' => $item->relationship,
                                'member_name' => $item->member_name,
                                'gender' => $item->gender,
                                'dob' => $item->dob,
                                'aadhar' => $item->aadhar,
                                'is_disable' => $item->is_disable,
                                'disability' => $item->disability,
                                'disabilitypcn' => $item->disabilitypcn,
                        );
                        $i++;


                    }

                    $this->builder->insertBatch($memberData);

                }


                $response = [
                    'status' => 200,
                    'error' => false,
                    'messages' => "Record Created",
                    'data' => [ ]
                ];
              // return $this->respondCreated($response);
            }
        } catch (Exception $ex) {

            $response = [
                'status' => 401,
                'error' => true,
                'messages' => 'Access denied',
                'data' => []
            ];
            //return $this->respondCreated($response);
        }  



        }
        //Invalid Json
        else {

            
            $response = [
                'status' => 500,
                'error' => true,
                'message' => "No Input",
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


    /*Fetch ALl Clients */
    public function fetchAll(){

        $key = $this->getKey();
        $authHeader = $this->request->getHeader("Authorization");
        $authHeader = $authHeader->getValue();
        $token = $authHeader;

        try {
           // $decoded = JWT::decode($token, $key, array("HS256"));
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            if ($decoded) {

                $user_id = $decoded->data->u_id;

                $data_1 = $this->db->query("SELECT * from customers WHERE created_by_user = $user_id ")->getResult();

                foreach ($data_1 as $temp_1){         
                    
                   // $items[] = array();                 
                                               
                    $items['c_id'] = $temp_1->c_id;            
                    $items['customer_id'] = $temp_1->customer_id;
                    $items['name'] = $temp_1->name; 
                    $items['father_name'] = $temp_1->father_name; 
                    $items['gender'] = $temp_1->gender; 
                    $items['community'] = $temp_1->community;
                    $items['dob'] = $temp_1->dob; 
                    $items['doj_service'] = $temp_1->doj_service; 
                    $items['maritial_status'] = $temp_1->maritial_status; 
                    $items['is_disable'] = $temp_1->is_disable; 
                    $items['disability'] = $temp_1->disability; 
                    $items['disabilitypcn'] = $temp_1->disability_pcn; 

                    $items['res_hno'] = $temp_1->res_hno; 
                    $items['res_street'] = $temp_1->res_street; 
                    $items['res_district'] = $temp_1->res_district; 
                    $items['res_city'] = $temp_1->res_city; 
                    $items['res_contact'] = $temp_1->res_contact; 
                    $items['res_email'] = $temp_1->res_email; 
                    $items['res_adminunit'] = $temp_1->res_adminunit; 
                    $items['res_unit_name'] = $temp_1->res_unit_name; 

                    $items['ofc_hno'] = $temp_1->ofc_hno; 
                    $items['ofc_street'] = $temp_1->ofc_street; 
                    $items['ofc_district'] = $temp_1->ofc_district; 
                    $items['ofc_city'] = $temp_1->ofc_city; 
                    $items['ofc_contact'] = $temp_1->ofc_contact; 
                    $items['ofc_email'] = $temp_1->ofc_email; 
                    $items['ofc_adminunit'] = $temp_1->ofc_adminunit; 
                    $items['ofc_unit_name'] = $temp_1->ofc_unit_name; 
                    
                    $items['ration_card'] = $temp_1->ration_card; 
                    $items['iden_1'] = $temp_1->iden_1; 
                    $items['iden_2'] = $temp_1->iden_2; 

                    $items['image'] = base_url('public/assets/img/default_img.jpg');

                    //Check Image
                    $image = $temp_1->image;     

                    if(!empty($image)){

                        $items['image'] = base_url('assets/img/customers').'/'.$image;
                    }
                         
              
                    $data_2 = $this->db->query("SELECT * from family WHERE c_id = $temp_1->c_id")->getResult();

                    $items['family'] = array();

                    $member_count = count($data_2);
                    if($member_count > 0){

                        $temp = array();

                        foreach ($data_2 as $mem){

                            $temp['c_id'] = $mem->c_id;
                            $temp['f_id'] = $mem->f_id;
                            $temp['relationship'] = $mem->relationship;
                            $temp['member_name'] = $mem->member_name;
                            $temp['gender'] = $mem->gender;
                            $temp['dob'] = $mem->dob;
                            $temp['aadhar'] = $mem->aadhar;
                            $temp['is_disable'] = $mem->is_disable;
                            $temp['disability'] = $mem->disability;
                            $temp['disabilitypcn'] = $mem->disabilitypcn;                        
                            $items['family'][] = array_merge($temp);

                        }
                    }
                   
                    $output[] = array_merge($items);                   
                   
                }       
                
               $respData = array_merge($output);

                $response = [
                    'status' => 200,
                    'error' => false,
                    'messages' => 'User details',
                    'data' => 
                    $respData
                    
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


    //Post Image
    public function photo(){

        // $key = $this->getKey();
        // $authHeader = $this->request->getHeader("Authorization");
        // $authHeader = $authHeader->getValue();
        // $token = $authHeader;

        $data_raw = file_get_contents("php://input");
        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->c_id) && isset($data->image) && isset($data->token)){

            $key = $this->getKey();
            //Extract Token from Json Data
            $token = $data->token;

        try {
           // $decoded = JWT::decode($token, $key, array("HS256"));
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            if ($decoded) {


                $c_id = $data->c_id;         
    
                $image = '';
                $upload_file = '';    
                $imagedata = $data->image;    
           
                $image_array_1 = explode(";",$imagedata);           
                $image_array_2 = explode(",",$image_array_1[1]);
                $image = base64_decode($image_array_2[1]);
                $imageName = uniqid().'.png';    
                $path = 'assets/img/customers/'.$imageName;
                file_put_contents($path,$image);
                $model = new CustomerModel();
                $newData = [
                    'c_id' => $c_id,
                    'image' => $imageName,                
                ];
                $model->save($newData);



                $response = [
                    'status' => 200,
                    'error' => false,
                    'messages' => 'Image Uploaded',
                    'data' => [ ]
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

    //invalid json
    else {

            
        $response = [
            'status' => 500,
            'error' => true,
            'message' => "No Input",
            'data' => []
        ];

    }


    return $this->respondCreated($response);



    }



    private function getKey()
    {
        return "my_application_secret";
    }

    public function generateUserId(){
      
        $random_num = random_string('numeric', 6);
        $random_id = 'ID'.$random_num;       
        
        $count = $this->db->table($this->table)->where(["customer_id" => $random_id])->countAllResults();
           
        if($count > 0){         
            
            $this->generateUserId();
            
        }             
       return $random_id;      
                
    }



} ?>