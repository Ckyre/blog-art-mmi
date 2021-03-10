<?php 

namespace App\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Validation\Validator;

class UserController extends Controller {

    public function login()
    {
        if (isset($_SESSION['auth'])) {
            return header('Location: /user');
        } else {
            return $this->view('auth.login');
        }
    }

    public function loginPost() 
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'pseudoMemb' => ['required'],
            'passMemb' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /login');
            exit;
        }

        $user = (new User($this->getDB()));
        $user = $user->getByUsername($_POST['pseudoMemb']);
        
        if (!$user) {
            // L'utilisateur n'existe tout simplement pas
            $errors['password'][] = "Ce pseudonyme n'existe pas.";
            $_SESSION['errors'][] = $errors;
            header('Location: /login');
            exit;
        }
        
        if (password_verify($_POST['passMemb'], $user->passMemb)) {
            // Tout est vérifié, on connecte l'utilisateur
            $_SESSION['auth'] = true;
            $_SESSION['rank'] = $user->idStat;
            $_SESSION['user'] = $user->pseudoMemb;
            $_SESSION['numMemb'] = $user->numMemb;
            return header('Location: /');
            exit;
        } else {
            // Mauvais mot de passe
            $errors['password'][] = "Mauvais mot de passe.";
            $_SESSION['errors'][] = $errors;
            return header('Location: /login');
            exit;
        }
    }

    public function register() 
    {
        return $this->view('auth.register');
    }

    public function registerPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'nomMemb' => ['required', 'min:2', 'contains:@%!$€'],
            'prenomMemb' => ['required', 'min:2', 'contains:@%!$€'],
            'pseudoMemb' => ['required', 'min:3', 'contains:@%!$€'],
            'eMailMemb' => ['required', 'mail'],
            'passMemb' => ['required', 'min:6']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /register');
            exit;
        }

        $_POST['passMemb'] = password_hash($_POST['passMemb'], PASSWORD_DEFAULT);
        $_POST['idStat'] = 2;

        $user = new User($this->getDB());
        $res = $user->create($_POST);

        if ($res) {
            $_SESSION['auth'] = true;
            $_SESSION['rank'] = 2;
            $_SESSION['user'] = $_POST['pseudoMemb'];
            return header('Location: /');
        }
    }

    public function logout()
    {
        session_destroy();

        return header('Location: /');
    }

    public function dashboard()
    {
        if ($_SESSION['auth'] == true) {
            $user = new User($this->getDB());
            $user = $user->getByUserName($_SESSION['user']);

            $articlesLiked = new Article($this->getDB());
            $articlesLiked = $articlesLiked->getLikedByUserId($_SESSION['numMemb']);

            return $this->view('user.dashboard', compact('user', 'articlesLiked'));
        } else {
            return header('Location: /login');
        }
    }

    public function test() 
    {
        return $this->view('blog.test');    
    }
    
    public function profile()
    {
        return $this->view("user.profile");
    }
    
    public function apropos() 
    {
        return $this->view('blog.apropos');    
    }

    public function accueil() 
    {
        return $this->view('blog.accueil');    
    }

    public function contact()
    {
        return $this->view('contact') ;
    }

}
