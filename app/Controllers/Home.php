<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
           'title' => 'Aplikasi Iventaris'
        ];
        
            

        return view('home/index', $data);
    }
}
