<?php

namespace App\Controllers\Admin;

use App\Models\Langue;
use App\Models\Motcle;
use App\Controllers\Controller;

class MotcleController extends Controller {

    public function index()
    {
        $this->isAdmin();

        $motcles = new Motcle($this->getDB());
        $motcles = $motcles->all();

        return $this->view('admin.motcle.index', compact('motcles'));
    }

    public function create()
    {
        $this->isAdmin();

        $langues = new Langue($this->getDB());
        $langues = $langues->all();

        return $this->view('admin.motcle.form', compact('langues'));
    }
    
    public function createMotcle()
    {
        $this->isAdmin();
        
        $motcle = new Motcle($this->getDB());
        $result = $motcle->create($_POST);

        if ($result) {
            return header('Location: /admin/motcles');
        }
    }

    public function edit($numMotCle)
    {
        $this->isAdmin();

        $motcle = new Motcle($this->getDB());
        $motcle = $motcle->findById($numMotCle);

        $langues = new Langue($this->getDB());
        $langues = $langues->all();

        return $this->view('admin.motcle.form', compact('motcle', 'langues'));
    }

    public function update($numMotCle)
    {
        $this->isAdmin();

        $motcle = new Motcle($this->getDB());
        $motcle = $motcle->findById($numMotCle);
        $result = $motcle->update($_POST);

        if ($result) {
            return header('Location: /admin/motcles');
        }
    }

    public function destroy($numMotCle)
    {
        $this->isAdmin();

        $motcle = new Motcle($this->getDB());
        $motcle = $motcle->findById($numMotCle);
        $result = $motcle->destroy();

        if ($result) {
            return header('Location: /admin/motcles');
        }
    }

}