<?php

namespace App\Controllers\Admin;

use App\Models\Statut;
use App\Controllers\Controller;

class StatutController extends Controller {

    public function index()
    {
        $statuts = new Statut($this->getDB());
        $statuts = $statuts->all();

        return $this->view('admin.statut.index', compact('statuts'));
    }

    public function create()
    {
        $this->isAdmin();

        return $this->view('admin.statut.form');
    }

    public function createStatut()
    {
        $this->isAdmin();
        
        $statut = new Statut($this->getDB());

        $result = $statut->create($_POST);

        if ($result) {
            return header('Location: /admin/statuts');
        }
        
    }

    public function edit(int $idStat)
    {
        $this->isAdmin();
        
        $statut = new Statut($this->getDB());
        $statut = $statut->findById($idStat);

        return $this->view('admin.statut.form', compact('statut'));
    }

    public function update(int $idStat)
    {
        $this->isAdmin();

        $statut = new Statut($this->getDB());
        $statut = $statut->findById($idStat);
        $result = $statut->update($_POST);

        if ($result) {
            return header('Location: /admin/statuts');
        }
    }

    public function destroy(int $idStat)
    {
        $this->isAdmin();

        $statut = new Statut($this->getDB());
        $statut = $statut->findById($idStat);
        $result = $statut->destroy();

        if ($result) {
            return header('Location: /admin/statuts');
        }
    }

}