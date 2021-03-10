<?php 

namespace App\Controllers;

use App\Models\LikeArt;

class LikeController extends Controller {

    public function update($numArt)
    {
        if ($_SESSION['auth']) {
            $like = new LikeArt($this->getDB());
            $like = $like->addLike($_SESSION['numMemb'], $numArt);
        } else {
            header("Location: /login");
            exit();
        }

    }
    
}
