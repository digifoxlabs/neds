<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Controllers\AdminController;

// Load Model
use App\Models\UserModel;

class District extends AdminController
{

    public function __construct(){  
        parent::__construct();
        $this->db = \Config\Database::connect();       

    }

    public function index()
    {

        //fetch all Data
        $userModel = new UserModel();
        $usersData = $userModel->where('user_type', "coordinator")
                                ->where("created_by",session()->get('id') )
                                ->findAll();

       // $modelData = $model->findAll();
        $data = array( 
            'pageTitle' => 'MCS-District Coordinator',                      
            'districtData' => $usersData,                      
        ); 
        $this->render_view('admin/pages/districtcoordinator',$data);
    }


    /**Add New Distrcuit Coordinators */
    public function addCoordinator(){

        $rules = [
            'name' => 'required|trim',
            'gender' => 'required|trim',
            'email_id' => 'required|trim|is_unique[users.email]',
            'contact' => 'trim|required|numeric',        
            'district' => 'required|trim',            
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
            return redirect()->to(base_url('admin/district'));


        }else {

            $model = new UserModel();

            $newData = [
                'name' => $this->request->getVar('name'),
                'mobile' => $this->request->getVar('contact'),
                'gender' => $this->request->getVar('gender'),
                'dob' => $this->request->getVar('dob'),
                'email' => $this->request->getVar('email_id'),
                'district' => $this->request->getVar('district'),
                'address' => $this->request->getVar('address'),
                'user_type' => "coordinator",
                'created_by' => session()->get('id'),
                'password' => 'district123',
              
            ];
            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Coordinator Added');
            return redirect()->to(base_url('admin/district/'));
        }
    }


    /**delete Coordinator */

    public function deleteCoordinator(){

            if (isset($_POST['row_id'])) {      
                $id = $this->request->getVar('row_id');                
                $model = new UserModel();
                $model->delete($id );
                $session = session();
                $session->setFlashdata('success', 'Member Deleted');
                return redirect()->to(base_url('admin/district/'));
          }
          
          else {
              
              $this->session->set_flashdata('error', 'Error occurred!!');
              return redirect()->to(base_url('admin/district/'));
          }   
    
    }

    /**Update Coordinator */
    public function updateCoordinator(){

        $rules = [
            'name' => 'required|trim',
            'gender' => 'required|trim',
            'email_id' => 'required|trim|is_unique[users.email,u_id,{row_id}]',
            'contact' => 'trim|required|numeric',        
            'district' => 'required|trim',            
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
            return redirect()->to(base_url('admin/district'));


        }else {

            $model = new UserModel();
            $newData = [
                'u_id' => $this->request->getVar('row_id'),
                'name' => $this->request->getVar('name'),
                'mobile' => $this->request->getVar('contact'),
                'gender' => $this->request->getVar('gender'),
                'dob' => $this->request->getVar('dob'),
                'email' => $this->request->getVar('email_id'),
                'district' => $this->request->getVar('district'),
                'address' => $this->request->getVar('address'),
                'status' => $this->request->getVar('status'),                    
            ];

            $model->save($newData);
            $session = session();
            $session->setFlashdata('success', 'Coordinator Updated');
            return redirect()->to(base_url('admin/district/'));
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
                return redirect()->to(base_url('admin/district/'));
        }
        
        else {          
            $this->session->set_flashdata('error', 'Error occurred!!');
            return redirect()->to(base_url('admin/district/'));
        } 
    }




}
