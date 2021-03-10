<?php

namespace App\Controllers\Admin;

use App\Models\Angle;
use App\Models\Motcle;
use App\Models\Article;
use App\Models\Thematique;
use App\Controllers\Controller;

class ArticleController extends Controller {
    
    public function index() 
    {
        $this->isAdmin();

        $articles = (new Article($this->getDB()))->all();
        return $this->view('admin.article.index', compact('articles'));
    }

    public function create()
    {
        $this->isAdmin();

        $motcles = (new Motcle($this->getDB()))->all();
        $angles = (new Angle($this->getDB()))->all();
        $thematiques = (new Thematique($this->getDB()))->all();

        return $this->view('admin.article.form', compact('motcles', 'angles', 'thematiques'));
    }
    
    public function createArticle() 
    {
        $this->isAdmin();

        $article = new Article($this->getDB());

        $tags = array_pop($_POST);

        $result = $article->create($_POST, $tags);

        if ($result) {
            return header('Location: /admin/articles');
        }
    }

    public function edit(int $numArt) 
    {
        $this->isAdmin();

        $article = new Article($this->getDB());
        $article = $article->findById($numArt);
        $motcles = (new Motcle($this->getDB()))->all();
        $angles = (new Angle($this->getDB()))->all();
        $thematiques = (new Thematique($this->getDB()))->all();
        
        return $this->view('admin.article.form', compact('article', 'motcles', 'angles', 'thematiques'));
    }

    public function update(int $numArt)
    {
        $this->isAdmin();

        $article = (new Article($this->getDB()));
        $article = $article->findById($numArt);

        $motcles = array_pop($_POST);

        if (is_array($motcles)) {
            $result = $article->update($_POST, $motcles);
        } else {
            $result = $article->update($_POST);
        }

        if ($result) {
            return header('Location: /admin/articles');
        }
    }

    public function destroy(int $numArt)
    {
        $this->isAdmin();
        
        $article = new Article($this->getDB());
        $article->removeAllComment($numArt);
        $article->removeAllMotCle($numArt);
        $article = $article->findById($numArt);

        $result = $article->destroy();

        if ($result) {
            return header('Location: /admin/articles');
        }
    }



}