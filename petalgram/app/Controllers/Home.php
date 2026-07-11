<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home - Petalgram',
            'content' => 'home/index'
        ];
        return view('layouts/main', $data);
    }
}
