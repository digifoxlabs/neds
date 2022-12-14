<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\AdminController;

use App\Libraries\Ciqrcode;

use CodeIgniter\Files\File;

// Load Model
use App\Models\CustomerModel;
use App\Models\FamilyModel;

class Customers extends AdminController
{
    public $db;
    protected $table = 'customers';

    public function __construct(){

        $data = array( 
            'pageTitle' => 'MCS-Members',                      
        );

        parent::__construct();
        $this->db = \Config\Database::connect();       

    }


    /**View ID CARD */
    public function id_card($id){

        $data = array( 
            'pageTitle' => 'MCS-Members',            
            'cust_id' => $id,            
        );


                //Fetch User Data
                $customerModel = new CustomerModel();
                $customerDetails = $customerModel->where('c_id', $id)->first();   
                if($customerDetails){
        
                    //fetch Members
                    $familyModel = new FamilyModel();
                    $data['customerDetails'] = $customerDetails;
                    $data['familyDetails'] = $familyModel->where('c_id', $id)->findAll();

                    //generate QR code
                    $qrdata = '';
                    if(!empty($customerDetails['name']))
                    $qrdata = 'Name: '.$customerDetails['name'];
                    
                    if(!empty($customerDetails['dob']))
                    $qrdata .= ' ,DOB: '.$customerDetails['dob'];
     
                    if(!empty($customerDetails['father_name']))
                    $qrdata .= ' ,Father Name: '.$customerDetails['father_name'];

                    if(!empty($customerDetails['gender']))
                    $qrdata .= ' ,Gender: '.$customerDetails['gender'];

                    if(!empty($customerDetails['valid_upto']))
                    $qrdata .= ' ,ValidUpto: '.$customerDetails['valid_upto'];

          
        
                    $data['qr_code'] = $this->generate_code($qrdata);
                   $this->render_view('admin/pages/customers/id-card',$data);


                  // return view('admin/pages/customers/id-card', $data);
        
                 }
        
                 else {
                    return redirect()->to(base_url('admin/customers'));
        
                 } 


    }


    /**Print Customer Data */

    public function printcustomer($id){


        $data = array( 
            'pageTitle' => 'MCS-Members',            
            'cust_id' => $id,            
        );

        //Fetch User Data
        $customerModel = new CustomerModel();
        $customerDetails = $customerModel->where('c_id', $id)->first();   
        if($customerDetails){

            //fetch Members
            $familyModel = new FamilyModel();
            $data['customerDetails'] = $customerDetails;
            $data['familyDetails'] = $familyModel->where('c_id', $id)->findAll();

         
           // $this->render_view('admin/pages/customers/view',$data);
           return view('admin/pages/card', $data);

         }

         else {
            return redirect()->to(base_url('admin/customers'));

         } 



    }


    /**New Customer */
    public function new(){
  
        $data = array( 
            'pageTitle' => 'MCS-Customers',             
        );

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'name' => 'required|trim',
                'father_name' => 'required|trim',
                'gender' => 'required|trim',
                'category' => 'required|trim',
                'dob' => 'required|trim',
                'doj' => 'required|trim',
                'isdisable' => 'required|trim',
                'res_hno' => 'trim',
                'res_street' => 'trim',
                'res_district' => 'trim',
                'res_city' => 'trim',           
            ];

            $errors = [
                'name' => [
                    'required' => "Name is Required",
                ],
                'father_name' => [
                    'required' => "Father Name is Required",
                ],
                'gender' => [
                    'required' => "Select a Gender",
                ],
                'category' => [
                    'required' => "Select a Category",
                ],
                'dob' => [
                    'required' => "Date of Birth is required",
                ],
                'doj' => [
                    'required' => "Date of Joining is required",
                ],
                'is_disable' => [
                    'required' => "Select Disability",
                ]
      
            ];

            if (!$this->validate($rules,$errors)) {
                $data['validation'] = $this->validator;
                // return view('admin/pages/profile',$data);     
                $this->render_view('admin/pages/customers/add',$data);               
            }else {
                   
                $model = new CustomerModel();

                $newData = [
                    'customer_id' => $this->generateUserId(),
                    'name' => $this->request->getVar('name'),
                    'father_name' => $this->request->getVar('father_name'),
                    'gender' => $this->request->getVar('gender'),
                    'community' => $this->request->getVar('category'),
                    'dob' => $this->request->getVar('dob'),
                    'doj_service' => $this->request->getVar('doj'),
                    'maritial_status' => $this->request->getVar('maritial'),
                    'is_disable' => $this->request->getVar('isdisable'),
                    'disability' => $this->request->getVar('disability'),
                    'disabilitypcn' => $this->request->getVar('disabilitypcn'),

                    'res_hno' => $this->request->getVar('res_hno'),
                    'res_street' => $this->request->getVar('res_street'),
                    'res_district' => $this->request->getVar('res_district'),
                    'res_city' => $this->request->getVar('res_city'),
                    'res_contact' => $this->request->getVar('res_contact'),
                    'res_email' => $this->request->getVar('res_email'),
                    'res_adminunit' => $this->request->getVar('res_adminunit'),
                    'res_unit_name' => $this->request->getVar('res_unit_name'),

                    'ofc_hno' => $this->request->getVar('ofc_hno'),
                    'ofc_street' => $this->request->getVar('ofc_street'),
                    'ofc_district' => $this->request->getVar('ofc_district'),
                    'ofc_city' => $this->request->getVar('ofc_city'),
                    'ofc_contact' => $this->request->getVar('ofc_contact'),
                    'ofc_email' => $this->request->getVar('ofc_email'),
                    'ofc_adminunit' => $this->request->getVar('ofc_adminunit'),
                    'ofc_unit_name' => $this->request->getVar('ofc_unit_name'),

                    'ration_card' => $this->request->getVar('ration_card'),
                    'iden_1' => $this->request->getVar('iden_1'),
                    'iden_2' => $this->request->getVar('iden_2'),

                    'image' => NULL,
                    'created_by_user' => session()->get('id'),
                    'valid_upto' => Date('y:m:d', strtotime('365 days')),
                ];
                $model->save($newData);
               // $last_id = $model->insertID();

              //  echo "Form Submitted with ID:".$last_id;

              $session = session();
              $session->setFlashdata('success', 'Created Successfuly');

             if( (session()->get('user_type') == 'operator')) { 

                return redirect()->to(base_url('admin/customers/'.session()->get('id')));

             }
             return redirect()->to(base_url('admin/customers'));

              


            }

        }else {

            $this->render_view('admin/pages/customers/add',$data);

        }      

    }


    /**View Customer */
    public function viewcustomer($id){

        $data = array( 
            'pageTitle' => 'MCS-Members',            
            'cust_id' => $id,            
        );

        //Fetch User Data
        $customerModel = new CustomerModel();
        $customerDetails = $customerModel->where('c_id', $id)->first();   
        if($customerDetails){

            //fetch Members
            $familyModel = new FamilyModel();
            $data['customerDetails'] = $customerDetails;
            $data['familyDetails'] = $familyModel->where('c_id', $id)->findAll();

         
            $this->render_view('admin/pages/customers/view',$data);

         }

         else {
            return redirect()->to(base_url('admin/customers'));

         } 

    }

    /**Update Customer */
    public function updatecustomer($id){

         //Fetch User Data
         $model = new CustomerModel();

        $data = array( 
            'pageTitle' => 'MCS-Customers',            
            'customerDetails' => $model->where('c_id', $id)->first(),        
        );
       
        if ($this->request->getMethod() == 'post') {

              
            $rules = [
                'name' => 'required|trim',
                'father_name' => 'required|trim',
                'gender' => 'required|trim',
                'category' => 'required|trim',
                'dob' => 'required|trim',
                'doj' => 'required|trim',
                'isdisable' => 'required|trim',
                'res_hno' => 'trim',
                'res_street' => 'trim',
                'res_district' => 'trim',
                'res_city' => 'trim', 
                'status' => 'required', 
            ];

            $errors = [
                'name' => [
                    'required' => "Name is Required",
                ],
                'father_name' => [
                    'required' => "Father Name is Required",
                ],
                'gender' => [
                    'required' => "Select a Gender",
                ],
                'category' => [
                    'required' => "Select a Category",
                ],
                'dob' => [
                    'required' => "Date of Birth is required",
                ],
                'doj' => [
                    'required' => "Date of Joining is required",
                ],
                'is_disable' => [
                    'required' => "Select Disability",
                ],
            ];

            if (!$this->validate($rules,$errors)) {
                $data['validation'] = $this->validator;
                // return view('admin/pages/profile',$data);     
                $session = session();
                $session->setFlashdata('error', 'Error');
                return redirect()->to(base_url('admin/customers/update/'.$id));         
            }else {
                   
                $model = new CustomerModel();

                $newData = [
                    'c_id' => $id,
                    'customer_id' => $this->generateUserId(),
                    'name' => $this->request->getVar('name'),
                    'father_name' => $this->request->getVar('father_name'),
                    'gender' => $this->request->getVar('gender'),
                    'community' => $this->request->getVar('category'),
                    'dob' => $this->request->getVar('dob'),
                    'doj_service' => $this->request->getVar('doj'),
                    'maritial_status' => $this->request->getVar('maritial'),
                    'is_disable' => $this->request->getVar('isdisable'),
                    'disability' => $this->request->getVar('disability'),
                    'disabilitypcn' => $this->request->getVar('disabilitypcn'),

                    'res_hno' => $this->request->getVar('res_hno'),
                    'res_street' => $this->request->getVar('res_street'),
                    'res_district' => $this->request->getVar('res_district'),
                    'res_city' => $this->request->getVar('res_city'),
                    'res_contact' => $this->request->getVar('res_contact'),
                    'res_email' => $this->request->getVar('res_email'),
                    'res_adminunit' => $this->request->getVar('res_adminunit'),
                    'res_unit_name' => $this->request->getVar('res_unit_name'),

                    'ofc_hno' => $this->request->getVar('ofc_hno'),
                    'ofc_street' => $this->request->getVar('ofc_street'),
                    'ofc_district' => $this->request->getVar('ofc_district'),
                    'ofc_city' => $this->request->getVar('ofc_city'),
                    'ofc_contact' => $this->request->getVar('ofc_contact'),
                    'ofc_email' => $this->request->getVar('ofc_email'),
                    'ofc_adminunit' => $this->request->getVar('ofc_adminunit'),
                    'ofc_unit_name' => $this->request->getVar('ofc_unit_name'),

                    'ration_card' => $this->request->getVar('ration_card'),
                    'iden_1' => $this->request->getVar('iden_1'),
                    'iden_2' => $this->request->getVar('iden_2'),

                    'status' => $this->request->getVar('status'),
                ];
                $model->save($newData);
               // $last_id = $model->insertID();

               // echo "Form Submitted with ID:".$last_id;
               $session = session();
               $session->setFlashdata('success', 'Updated Successfuly');
               return redirect()->to(base_url('admin/customers/update/'.$id));


            }
        }

        else {

            $this->render_view('admin/pages/customers/update',$data);

        }    

    }

    /**Delete Customer */
    public function deletecustomer(){

        if (isset($_POST['row_id'])) {      

            // Loading Query builder instance
            $builder = $this->db->table('family');

            $id = $this->request->getVar('row_id');           
            $modelCustomer = new CustomerModel();
           // $modelFamily = new FamilyModel();
            $modelCustomer->delete($id );

            $builder->where('c_id', $id);
            $builder->delete();

            //$modelFamily->delete($id );
            $session = session();
            $session->setFlashdata('success', 'Member Deleted');
            return redirect()->to(base_url('admin/customers'));
      }
      
      else {
          
          $this->session->set_flashdata('error', 'Error occurred!!');
            redirect('admin/categories/deletemember', 'refresh');
      }

    }


    /**Upload Customer Image */
    public function customerimage(){

        if (isset($_POST['row_id'])) {  

             $id = $this->request->getVar('row_id');         
    
            $data = '';
            $upload_file = '';

            $data = $this->request->getVar('image'); 

           // echo $data;

            $image_array_1 = explode(";",$data);           
            $image_array_2 = explode(",",$image_array_1[1]);
            $image = base64_decode($image_array_2[1]);
            $imageName = uniqid().'.png';    
            $path = 'assets/img/customers/'.$imageName;
            file_put_contents($path,$image);
            $model = new CustomerModel();
            $newData = [
                'c_id' => $id,
                'image' => $imageName,                
            ];
            $model->save($newData);

           // $this->render_view('admin/pages/customers/view',$id);

        }


    }





    /*View Customer Members */
    public function members($id){


            $data = array( 
                'pageTitle' => 'MCS-Members',            
                'cust_id' => $id,            
            );
             //Fetch User Data
             $model = new CustomerModel();

             $customerDetails = $model->where('c_id', $id)->first();    
             
             if($customerDetails){

                //fetch Members
                $family = new FamilyModel();
                $data['familyDetails'] = $family->where('c_id', $id)->findAll();

                $data['customerDetails'] = $customerDetails;
                $this->render_view('admin/pages/customers/members',$data);

             }

             else {
                return redirect()->to(base_url('admin/customers'));

             }       
    }

    /*New Members */
    public function savemembers(){

        
        if ($this->request->getMethod() == 'post') {

            $cid = $this->request->getVar('c_id');

            $rules = [
                'relationship' => 'required|trim',
                'name' => 'required|trim',
                'gender' => 'required|trim',
                'dob' => 'required|trim',
                'aadhar' => 'trim',
                'isdisable' => 'required|trim',
                
            ];

            $errors = [
                'relationship' => [
                    'required' => "Relationship is Required",
                ],
                'name' => [
                    'required' => "Name is Required",
                ],
                'gender' => [
                    'required' => "Select a Gender",
                ],
                'dob' => [
                    'required' => "Date of Birth is required",
                ],
               
            ];

            if (!$this->validate($rules,$errors)) {
                $data['validation'] = $this->validator;
                // return view('admin/pages/profile',$data);     
                // $this->render_view('admin/pages/customers/add',$data);   
                $session = session();
                $session->setFlashdata('error', 'Error');
                return redirect()->to(base_url('admin/customers/members/'.$cid));


            }else {
                   
                $model = new FamilyModel();

                $newData = [
                    'c_id' => $this->request->getVar('c_id'),
                    'relationship' => $this->request->getVar('relationship'),
                    'member_name' => $this->request->getVar('name'),
                    'gender' => $this->request->getVar('gender'),
                    'dob' => $this->request->getVar('dob'),
                    'aadhar' => $this->request->getVar('aadhar'),
                    'is_disable' => $this->request->getVar('isdisable'),
                    'disability' => $this->request->getVar('disability'),
                    'disabilitypcn' => $this->request->getVar('disabilitypcn'),
                  
                ];
                $model->save($newData);
               // $last_id = $model->insertID();

               // echo "Form Submitted with ID:".$last_id;

               $session = session();
               $session->setFlashdata('success', 'Member Added');
               return redirect()->to(base_url('admin/customers/members/'.$cid));
            }
        }

        else {

            echo "bad request";
        }
    }

    /** Delete Member */
    public function deletemember(){

        if (isset($_POST['row_id'])) {      
            $id = $this->request->getVar('row_id');
            $ret_id = $this->request->getVar('ret_id');
            $model = new FamilyModel();
            $model->delete($id );
            $session = session();
            $session->setFlashdata('success', 'Member Deleted');
            return redirect()->to(base_url('admin/customers/members/'.$ret_id));
      }
      
      else {
          
          $this->session->set_flashdata('error', 'Error occurred!!');
            redirect('admin/categories/deletemember', 'refresh');
      } 

    }

    /** Update Member */
    public function updatemember(){


        if ($this->request->getMethod() == 'post') {

            $cid = $this->request->getVar('c_id');

            $rules = [
                'relationship' => 'required|trim',
                'name' => 'required|trim',
                'gender' => 'required|trim',
                'dob' => 'required|trim',
                'aadhar' => 'trim',
                'isdisable' => 'required|trim',
                
            ];

            $errors = [
                'relationship' => [
                    'required' => "Relationship is Required",
                ],
                'name' => [
                    'required' => "Name is Required",
                ],
                'gender' => [
                    'required' => "Select a Gender",
                ],
                'dob' => [
                    'required' => "Date of Birth is required",
                ],
               
            ];

            if (!$this->validate($rules,$errors)) {
                $data['validation'] = $this->validator;
                // return view('admin/pages/profile',$data);     
                // $this->render_view('admin/pages/customers/add',$data);   
                $session = session();
                $session->setFlashdata('error', 'Error');
                return redirect()->to(base_url('admin/customers/members/'.$cid));


            }else {
                   
                $model = new FamilyModel();

                $newData = [
                    'f_id' => $this->request->getVar('row_id'),
                    'relationship' => $this->request->getVar('relationship'),
                    'member_name' => $this->request->getVar('name'),
                    'gender' => $this->request->getVar('gender'),
                    'dob' => $this->request->getVar('dob'),
                    'aadhar' => $this->request->getVar('aadhar'),
                    'is_disable' => $this->request->getVar('isdisable'),
                    'disability' => $this->request->getVar('disability'),
                    'disabilitypcn' => $this->request->getVar('disabilitypcn'),
                  
                ];
                $model->save($newData);
               // $last_id = $model->insertID();
               // echo "Form Submitted with ID:".$last_id;
               $session = session();
               $session->setFlashdata('success', 'Member Updated');
               return redirect()->to(base_url('admin/customers/members/'.$cid));
            }
        }

        else {

            echo "bad request";
        }




    }


    /*Manager all customers by ADMIN*/

    public function manage($id='')
    {
        //fetch Customers of Operators
        if($id){
            $data = array( 
                'pageTitle' => 'MCS-Customers',   
                'custMsg' => 'Showing Customers of Operator',          
                'operatorID' => $id,          
            );
            $this->render_view('admin/pages/customers/manage',$data);            
        }

        //All Customers for ADMin VIEW
        else {

            $data = array( 
                'pageTitle' => 'MCS-Customers',             
                'custMsg' => 'Showing All Customers', 
                'operatorID' => NULL,             
            );
            $this->render_view('admin/pages/customers/manage',$data);
        }

    }


    /**Manage Customers of Operators */

    // public function ofOperators()
    // {
    //     $data = array( 
    //         'pageTitle' => 'MCS-Customers',             
    //     );
    //     $this->render_view('admin/pages/customers/cust_operators',$data);
    // }


    public function ajaxLoadAllCustomers()
    {
        // echo "HELLO";

        // exit;

       // $created_by = session()->get('id');

        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        /* If we pass any extra data in request from ajax */
        //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

        $valueStatus = isset($_REQUEST['status'])?$_REQUEST['status']:"";
        $created_by = isset($_REQUEST['created_by'])?$_REQUEST['created_by']:"";

        /* Value we will get from typing in search */
        $search_value = $_REQUEST['search']['value'];

        if(!empty($search_value)){
            // If we have value in search, searching by id, name, email, mobile

            // count all data for admin
            if(session()->get('user_type') == 'admin') { 

                $total_count = $this->db->query("SELECT * from customers WHERE customer_id like '%".$search_value."%' OR name like '%".$search_value."%'")->getResult();
                $data = $this->db->query("SELECT * from customers WHERE customer_id like '%".$search_value."%' OR name like '%".$search_value."%' limit $start, $length")->getResult();

            }
            else {

                $total_count = $this->db->query("SELECT * from customers WHERE ((customer_id like '%".$search_value."%' OR name like '%".$search_value."%')AND (created_by_user = $created_by)")->getResult();
                $data = $this->db->query("SELECT * from customers WHERE ((customer_id like '%".$search_value."%' OR name like '%".$search_value."%') AND (created_by_user = $created_by)) limit $start, $length")->getResult();

            }
           
        }
        
        else if(!empty($valueStatus)){
            // If we have value in search, searching by id, name, email, mobile

            // count all data for admin
            if(session()->get('user_type') == 'admin') { 
                 $total_count = $this->db->query("SELECT * from customers WHERE status=".$valueStatus."")->getResult();
                 $data = $this->db->query("SELECT * from customers WHERE status=".$valueStatus."")->getResult();
            }
            else {

                $total_count = $this->db->query("SELECT * from customers WHERE (status=".$valueStatus." AND created_by_user = $created_by)")->getResult();
                $data = $this->db->query("SELECT * from customers WHERE (status=".$valueStatus." AND created_by_user = $created_by)")->getResult();

            }
        }        
        
        else{
            // count all data for admin
            if(session()->get('user_type') == 'admin') { 
                $total_count = $this->db->query("SELECT * from customers")->getResult();
                // get per page data
                 $data = $this->db->query("SELECT * from customers limit $start, $length")->getResult();
            }
            else {

                $total_count = $this->db->query("SELECT * from customers WHERE created_by_user = $created_by")->getResult();
                // get per page data
                 $data = $this->db->query("SELECT * from customers WHERE created_by_user = $created_by limit $start, $length")->getResult();

            }
        }
        
        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);         

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

    /**Generate QR Code */

    public function generate_code($data){

       // $data = "Name:AMLAN BHUYAN;DOB:17/12/1990";

                /* Load QR Code Library */
               // $this->load->library('ciqrcode');

                $qr = new ciqrcode();

                /* Data */
                $hex_data   = bin2hex($data);
                $save_name  = $hex_data . '.png';
        
                /* QR Code File Directory Initialize */
                $dir = 'assets/media/qrcode/';
                if (! file_exists($dir)) {
                    mkdir($dir, 0775, true);
                }
        
                /* QR Configuration  */
                $config['cacheable']    = true;
                $config['imagedir']     = $dir;
                $config['quality']      = true;
                $config['size']         = '1024';
                $config['black']        = [255, 255, 255];
                $config['white']        = [255, 255, 255];
               // $this->ciqrcode->initialize($config);
               $qr->initialize($config);
        
                /* QR Data  */
                $params['data']     = $data;
                $params['level']    = 'L';
                $params['size']     = 10;
                $params['savename'] = FCPATH . $config['imagedir'] . $save_name;
        
                //$this->ciqrcode->generate($params);
                $qr->generate($params);


                return $dir . $save_name;
        
                /* Return Data */
                // return [
                //     'content' => $data,
                //     'file'    => $dir . $save_name,
                // ];

    }





}
