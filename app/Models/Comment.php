<?php

namespace App\Models;

class Comment extends Model
{
	protected $table = 'comment';

    public function getCorrectComs($numArt)
    {
        return $this->query("
            SELECT c.*
            FROM comment c
            INNER JOIN article ac ON ac.numArt = c.numArt
            WHERE ac.numArt = ? AND c.affComOK = 1
        ", [$numArt]);
    }

    public function getComsOfArticle(int $numArt)
    {
        return $this->query("
            SELECT c.*
            FROM comment c
            INNER JOIN article ac ON ac.numArt = c.numArt
            WHERE ac.numArt = ? AND c.affComOK = 1
        ", [$numArt]);
    }

    public function getComsReplyOfArticle(int $numArt)
    {
        return $this->query("
            SELECT *
            FROM commentplus
            WHERE numArt = ?
        ", [$numArt]);
    }
    
    public function getAuthorName()
    {
        $res = $this->query("
            SELECT *
            FROM membre
            WHERE numMemb = ?
        ", [$this->numMemb], true);

        return $res != false ? $res->pseudoMemb : "Inconnu";
    }
}