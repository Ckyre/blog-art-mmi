<?php

namespace App\Models;

class Motcle extends Model
{

    protected $table = 'motcle';
    protected $idName = 'numMotCle';

    public function getArticles()
    {
        return $this->query("
        SELECT a.* FROM article a
        INNER JOIN motclearticle am on am.numArt = a.numArt
        WHERE am.numMotCle = ?
        ", [$this->id]);
    }

}