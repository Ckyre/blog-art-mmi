<?php 

namespace App\Controllers;

use PDO;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Comment;

class BlogController extends Controller {

    public function index()
    {
        $article = new Article($this->getDB());
        $articles = $article->all();

        return $this->view('blog.accueil', compact('articles'));
    }

    public function show(int $numArt)
    {

        $article = new Article($this->getDB());
        $article = $article->findById($numArt);

        $comments = new Comment($this->getDB());
        $commentsReplies = new Comment($this->getDB());
        // $comments = $comments->getCorrectComs($article->numArt);

        $comments = $comments->getComsOfArticle($numArt);
        $commentsReplies = $commentsReplies->getComsReplyOfArticle($numArt);

        $orders = array();

        foreach ($comments as $comment) {
            $orders[] = $comment->numSeqCom;
        }

        $replies = array();

        foreach ($commentsReplies as $commentsReply) {
            $replies[] = [$commentsReply->numSeqCom => $commentsReply->numSeqComR];
        }
        
        return $this->view('blog.show', compact('article', 'comments', 'replies', 'orders'));
    }

    public function tag(int $id)
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        return $this->view('blog.tag', compact('tag'));
    }

}