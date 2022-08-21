<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\AdminController;

// Load Model
use App\Models\UserModel;

class Operator extends AdminController
{


    public function __construct(){  

        parent::__construct();
        $this->db = \Config\Database::connect();       

    }

    public function index()
    {

        //fetch all Data
        $userModel = new UserModel();

        //Fetch all operators only for admin
        if(session()->get('user_type') == 'admin') { 
            $usersData = $userModel->where('user_type', "operator")
                                    ->findAll();
        }
        else{
            $usersData = $userModel->where('user_type', "operator")
                                    ->where("created_by",session()->get('id') )
                                    ->findAll();       
        }     

       // $modelData = $model->findAll();
        $data = array( 
            'pageTitle' => 'MCS-Operator',                      
            'districtData' => $usersData,                      
        ); 
        $this->render_view('admin/pages/operator',$data);
    }


    /**Add New Operator */
    public function addOperator(){

        $rules = [
            'name' => 'required|trim',
            'gender' => 'required|trim',
            'email_id' => 'required|trim|is_unique[users.email]',
            'contact' => 'trim|required|numeric',        
              
        ];

        $errors = [
  
            'name' => [
                'required' => "Name is Required",
            ], 
           
        ];

        if (!$this->validate($rules,$errors)) {
            $data['validation'] = $this->validator;
            // return view('admin/pages/profile',$data);     
            // $this->render_view('admin/pages/customers/add',$data);   
            $session = session();
            $session->setFlashdata('error', 'Error');
            return redirect()->to(base_url('admin/operator'));


        }else {

            $model = new UserModel();

            $newData = [
                'name' => $this->request->getVar('name'),
                'mobile' => $this->request->getVar('contact'),
                'gender' => $this->request->getVar('gender'),
                'dob' => $this->request->getVar('dob'),
                'email' => $this->request->getVar('email_id'),
                'district' => NULL,
                'address' => $this->request->getVar('address'),
                'user_type' => "operator",
                'created_by' => session()->get('id'),
                'password' => 'operator123',
              
            ];
            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Operator Added');
            return redirect()->to(base_url('admin/operator/'));
        }
    }


    /**delete operator */

    public function deleteOperator(){

            if (isset($_POST['row_id'])) {      
                $id = $this->request->getVar('row_id');                
                $model = new UserModel();
                $model->delete($id );
                $session = session();
                $session->setFlashdata('success', 'Member Deleted');
                return redirect()->to(base_url('admin/operator/'));
          }
          
          else {
              
              $this->session->set_flashdata('error', 'Error occurred!!');
              return redirect()->to(base_url('admin/operator/'));
          }   
    
    }

    /**Update operator */
    public function updateOperator(){

        $rules = [
            'name' => 'required|trim',
            'gender' => 'required|trim',
            'email_id' => 'required|trim|is_unique[users.email,u_id,{row_id}]',
            'contact' => 'trim|required|numeric',        
                       
        ];

        $errors = [
  
            'name' => [
                'required' => "Name is Required",
            ], 
           
        ];

        if (!$this->validate($rules,$errors)) {
            $data['validation'] = $this->validator;
            // return view('admin/pages/profile',$data);     
            // $this->render_view('admin/pages/customers/add',$data);   
            $session = session();
            $session->setFlashdata('error', 'Error');
            return redirect()->to(base_url('admin/operator'));


        }else {

            $model = new UserModel();
            $newData = [
                'u_id' => $this->request->getVar('row_id'),
                'name' => $this->request->getVar('name'),
                'mobile' => $this->request->getVar('contact'),
                'gender' => $this->request->getVar('gender'),
                'dob' => $this->request->getVar('dob'),
                'email' => $this->request->getVar('email_id'),
                'district' => NULL,
                'address' => $this->request->getVar('address'),
                'status' => $this->request->getVar('status'),                    
            ];

            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Operator Updated');
            return redirect()->to(base_url('admin/operator/'));
        }
    }

    /*Reset Password */
    public function resetPassword(){

            if (isset($_POST['row_id'])) {     

                $id = $this->request->getVar('row_id');            
                $model = new UserModel();            
                $newData = [
                    'u_id' => $this->request->getVar('row_id'),
                    'password' => $this->request->getVar('password'),                                    
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Member Deleted');
                return redirect()->to(base_url('admin/operator/'));
        }
        
        else {          
            $this->session->set_flashdata('error', 'Error occurred!!');
            return redirect()->to(base_url('admin/operator/'));
        } 
    }









}
