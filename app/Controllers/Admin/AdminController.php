<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;

class AdminController extends Controller
{

    public function index() 
    {
        $this->isAdmin();

        return $this->view('admin.index');
    }

}
