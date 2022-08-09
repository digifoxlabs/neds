<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\AdminController;

// Load Model
use App\Models\UserModel;

class User extends AdminController
{
   public function __construct(){

       parent::__construct();

   }

    public function login(){        

        $data = array( 
            'pageTitle' => 'NEDS-Login',             
        );    

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[3]|max_length[50]|valid_email',
                'password' => 'required|min_length[3]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('admin/pages/login', [
                    "validation" => $this->validator,'pagetitle' => 'MCS-Login',
                ]);
            } else {
                
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();
                // Stroing session values
                $this->setUserSession($user);
                // Redirecting to dashboard after login
                return redirect()->to(base_url('admin/dashboard'));
            }
        }

      
        return view('admin/pages/login', $data);

    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['u_id'],
            'name' => $user['name'],
            'mobile' => $user['mobile'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin/login');
    }

    //User Profile
    public function profile(){

        $data = array( 
            'pageTitle' => 'MCS-Profile',             
        );  
              //Fetch User Data
              $model = new UserModel();

              $data['profiledetails'] = $model->where('email', session()->get('email'))
                  ->first(); 


        if ($this->request->getMethod() == 'post') {

            //Check if not empty password
            if(!empty($this->request->getVar('password'))){

                $rules = [
                    'name' => 'required|min_length[3]|max_length[50]',
                    'password'=> 'required|min_length[3]|max_length[50]',
                ];

                if (!$this->validate($rules)) {
                    $data['validation'] = $this->validator;
                    return view('admin/pages/profile',$data);                    
                } else {
                    $model = new UserModel();    
                    $newData = [
                        'u_id' => session()->get('id'),
                        'name' => $this->request->getVar('name'),                       
                        'password' => $this->request->getVar('password'),
                    ];
                    $model->save($newData);
                    $session = session();
                    $session->setFlashdata('success', 'Updated Successfully');
                    return redirect()->to(base_url('admin/profile'));
                }


            } else {

                //Empty Password
                $rules = [
                    'name' => 'required|min_length[3]|max_length[50]',
                
                ];

                if (!$this->validate($rules)) {

                    $data['validation'] = $this->validator;
                    return view('admin/pages/profile',$data);
                    
                } else {
                    $model = new UserModel();
    
                    $newData = [
                        'u_id' => session()->get('id'),
                        'name' => $this->request->getVar('name'),                      
                    ];

                    $model->save($newData);
                    $session = session();
                    $session->setFlashdata('success', 'Updated Successfully');
                    return redirect()->to(base_url('admin/profile'));
                }
            }
        

        }

        else {

            //Fetch User Data
            $model = new UserModel();

            $data['profiledetails'] = $model->where('email', session()->get('email'))
                ->first();

            $this->render_view('admin/pages/profile',$data);

        }

       

    }



}
