<?php

namespace App\Models;

class LikeArt extends Model
{
    protected $table = 'likeArt';

    public function addLike($numMemb, $numArt) 
    {
        $res = $this->query("SELECT * FROM likeart WHERE numMemb = ? AND numArt = ?", [$numMemb, $numArt]);

        if (!$res) {
            $this->query("INSERT INTO likeart(numMemb, numArt, likeA) VALUES (?, ?, ?)", [$numMemb, $numArt, 1]);
        } else {
            $this->query("DELETE FROM likeart WHERE numMemb = ? AND numArt = ?", [$numMemb, $numArt]);
        }
        
        header("Location: /articles/" . $numArt);
        exit();
    }
}