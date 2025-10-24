<?php

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
       
        return $this->view('home');
    }

    public function getusers()
    {
        $users = User::all();
        
        $data = [
            'title' => 'Daftar Users', 
            'users' => $users
        ];

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        return $this->view('home', $data);
    }
}