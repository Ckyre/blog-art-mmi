<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Models\Statut;
use App\Controllers\Controller;

class UserController extends Controller {
    
    public function index()
    {
        $this->isAdmin();

        $users = (new User($this->getDB()))->all();

        return $this->view('admin.user.index', compact('users'));
    }

    public function edit(int $numMemb)
    {
        $this->isAdmin();

        $user = new User($this->getDB());
        $user = $user->findById($numMemb);

        $statuts = new Statut($this->getDB());
        $statuts = $statuts->all();

        return $this->view('admin.user.form', compact('user', 'statuts'));
    }

    public function update(int $numMemb)
    {
        $this->isAdmin();

        $user = new User($this->getDB());
        $user = $user->findById($numMemb);
        $result = $user->update($_POST);

        if ($result) {
            return header('Location: /admin/users');
        }
    }

}