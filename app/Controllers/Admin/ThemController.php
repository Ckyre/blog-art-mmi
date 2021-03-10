<?php

namespace App\Controllers\Admin;

use App\Models\Langue;
use App\Models\Thematique;
use App\Controllers\Controller;

class ThemController extends Controller {

    public function index()
    {
        $this->isAdmin();

        $thems = new Thematique($this->getDB());
        $thems = $thems->all();

        return $this->view('admin.them.index', compact('thems'));
    }

    public function create()
    {
        $this->isAdmin();

        $langues = new Langue($this->getDB());
        $langues = $langues->all();

        return $this->view('admin.them.form', compact('langues'));
    }
    
    public function createThem()
    {
        $this->isAdmin();
        
        $them = new Thematique($this->getDB());

        $_POST['numThem'] = $this->generateNewThem();

        $result = $them->create($_POST);

        if ($result) {
            return header('Location: /admin/thems');
        }
    }

    public function edit($numThem)
    {
        $this->isAdmin();
        
        $them = new Thematique($this->getDB());
        $them = $them->findById($numThem);

        $langues = new Langue($this->getDB());
        $langues = $langues->all();

        return $this->view('admin.them.form', compact('them', 'langues'));
    }

    public function update($numThem)
    {
        $this->isAdmin();

        $them = new Thematique($this->getDB());
        $them = $them->findById($numThem);

        $result = $them->update($_POST);

        if ($result) {
            return header('Location: /admin/thems');
        }
    }

    public function destroy($numThem)
    {
        $this->isAdmin();

        $them = new Thematique($this->getDB());
        $them = $them->findById($numThem);
        $result = $them->destroy();

        if ($result) {
            return header('Location: /admin/thems');
        }
    }

    public function generateNewThem()
    {
        $them = new Thematique($this->getDB());
        $result = $them->query("
            SELECT numThem FROM thematique
            ORDER BY numThem DESC
            LIMIT 1
        ");

        $newThem = str_replace('THE', '', $result[0]->numThem);
        $newThem = intval($newThem) + 1;
        
        return $newThem < 1000 ? 'THE0' . $newThem : 'THE' . $newThem;
    }

}