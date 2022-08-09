<?php

namespace App\Controllers;



class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

public function login(){

    $data = array( 
        'pagetitle' => 'MCS-Login',         
    ); 

    return view('admin/pages/login', $data);
}

public function register(){

    $data = array(
 
        'title' => 'register page',
         
    );    
  

}


}
