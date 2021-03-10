<?php

namespace App\Controllers\Admin;

use App\Models\Angle;
use App\Models\Langue;
use App\Controllers\Controller;

class AngleController extends Controller {

    public function index()
    {
        $this->isAdmin();

        $angles = new Angle($this->getDB());
        $angles = $angles->all();

        return $this->view('admin.angle.index', compact('angles'));
    }

    public function create()
    {
        $this->isAdmin();

        $langues = new Langue($this->getDB());
        $langues = $langues->all();

        return $this->view('admin.angle.form', compact('langues'));
    }
    
    public function createAngle()
    {
        $this->isAdmin();
        
        $angle = new Angle($this->getDB());

        $_POST['numAngl'] = $this->generateNewAngle();

        $result = $angle->create($_POST);

        if ($result) {
            return header('Location: /admin/angles');
        }
    }

    public function edit($numAngl)
    {
        $this->isAdmin();
        
        $angle = new Angle($this->getDB());
        $angle = $angle->findById($numAngl);

        $langues = new Langue($this->getDB());
        $langues = $langues->all();

        return $this->view('admin.angle.form', compact('angle', 'langues'));
    }

    public function update($numAngl)
    {
        $this->isAdmin();

        $angle = new Angle($this->getDB());
        $angle = $angle->findById($numAngl);
        $result = $angle->update($_POST);

        if ($result) {
            return header('Location: /admin/angles');
        }
    }

    public function destroy($numAngl)
    {
        $this->isAdmin();

        $angle = new Angle($this->getDB());
        $angle = $angle->findById($numAngl);
        $result = $angle->destroy();

        if ($result) {
            return header('Location: /admin/angles');
        }
    }

    public function generateNewAngle()
    {
        $angle = new Angle($this->getDB());
        $result = $angle->query("
            SELECT numAngl FROM angle
            ORDER BY numAngl DESC
            LIMIT 1
        ");

        $newAngl = str_replace('ANGL', '', $result[0]->numAngl);
        $newAngl = intval($newAngl) + 1;
        
        return $newAngl < 1000 ? 'ANGL0' . $newAngl : 'ANGL' . $newAngl;
    }

}