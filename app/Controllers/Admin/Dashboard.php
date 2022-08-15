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
        $builder = $this->db->table('customers');

        $noCustomers = $builder->countAllResults();
        $activeCustomers = $builder->where(["status" => 1])->countAllResults();
        $inactiveCustomers = $builder->where(["status" => 2])->countAllResults();
 

        $data = array( 
            'pageTitle' => 'MCS-Dashboard',             
            'totalCustomers' => $noCustomers,             
            'activeCustomers' =>  $activeCustomers,             
            'inactiveCustomers' =>  $inactiveCustomers,             
        );

       // return view('admin/pages/dashboard', $data);

       $this->render_view('admin/pages/dashboard',$data);
        


    }


    public function card(){

        $data = array( 
            'pageTitle' => 'MCS-Dashboard',                      
        );

        // $this->render_view('admin/pages/card',$data);
        return view('admin/pages/card', $data);

    }


}
