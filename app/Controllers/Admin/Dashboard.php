<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\AdminController;

class Dashboard extends AdminController
{
    public function __construct(){

        parent::__construct();

        $this->db = db_connect();

    }


    public function index()
    {

        // if(!in_array('updateAllO', $this->permission) ) {
        //     echo "OK ARRAY";
        // }

        // Loading Query builder instance
        $customers = $this->db->table('customers');
        $users = $this->db->table('users');

        //For admin
        if(session()->get('user_type') == 'admin') { 

            $totalCustomers = $customers->countAllResults();
            $coordinators = $users->where(["user_type" => 'coordinator'])->countAllResults();
            $operators = $users->where(["user_type" => 'operator'])->countAllResults();
           // $activeCustomers = $builder->where(["status" => 1])->countAllResults();
           // $inactiveCustomers = $builder->where(["status" => 2])->countAllResults();

           $data = array( 
            'pageTitle' => 'MCS-Dashboard',             
            'totalCustomers' => $totalCustomers,             
            'coordinators' =>  $coordinators,             
            'operators' =>  $operators,             
             );      
            
             $this->render_view('admin/pages/dashboard',$data);
        


        }

        //For District Coordinator

        if(session()->get('user_type') == 'coordinator') { 

            $operators = $users->where(["user_type" => 'operator'])
                                ->where("created_by",session()->get('id') )
                                ->countAllResults();            
           $data = array( 
            'pageTitle' => 'MCS-Dashboard',                                
            'operators' =>  $operators,             
             );      
            
            $this->render_view('admin/pages/dashboard',$data); 



        }


        //For Operator

        if(session()->get('user_type') == 'operator') { 


           
            $totalCustomers = $customers->where("created_by_user",session()->get('id') )->countAllResults(); 

            $data = array( 
            'pageTitle' => 'MCS-Dashboard',                                
            'totalCustomers' => $totalCustomers,           
            );      

            $this->render_view('admin/pages/dashboard',$data);




        }
 

   


    }


    public function card(){

        $data = array( 
            'pageTitle' => 'MCS-Dashboard',                      
        );

        // $this->render_view('admin/pages/card',$data);
        return view('admin/pages/card', $data);

    }


}
