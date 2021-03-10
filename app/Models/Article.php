<?php

namespace App\Models;

use DateTime;

class Article extends Model
{

    protected $table = 'article';
    protected $idName = "numArt";

    public function getCreatedAt(): string
    {
        return (new DateTime($this->dtCreArt))->format('d/m/Y à H:i');
    }

    public function getExcerpt(): string
    {
        return substr($this->parag1Art, 0, 110) . '..';
    }

    public function getButton(): string
    {
        return <<<HTML
        <a href="/articles/$this->numArt" class="btn btn-primary">Lire l'article</a>
HTML;
    }

    public function getMotCles() 
    {
        return $this->query(" 
        SELECT m.* FROM motcle m
        INNER JOIN motclearticle am ON am.numMotCle = m.numMotCle
        WHERE am.numArt = ?
        ", [$this->numArt]);
    }

    public function getLikes()
    {
        $res = $this->query("
            SELECT *
            FROM likeart
            WHERE numArt = ?
        ", [$this->numArt]);
        return $res != null ? sizeof($res) : 0;
    }

    public function getCorrectComs()
    {
        return $this->query("
        SELECT c.*
        FROM comment c
        INNER JOIN article ac ON ac.numArt = c.numArt
        WHERE ac.numArt = ? AND c.affComOK = 1
        ", [$this->numArt]);
    }

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);

        $post = $this->query("SELECT * FROM article ORDER BY numArt DESC");
        $id = $post[0]->numArt;

        foreach ($relations as $tagId)
        {
            $stmt = $this->db->getPDO()->prepare("INSERT motclearticle (numArt, numMotCle) VALUES(?, ?)");
            $stmt->execute([$id, $tagId]);
        }

        return true;
    }

    public function update(array $data, ?array $relations = null)
    {
        parent::update($data);
        $id = $this->idName;
        $stmt = $this->db->getPDO()->prepare("DELETE FROM motclearticle WHERE numArt = ?");
        $result = $stmt->execute([$this->$id]);

        foreach ($relations as $motCleId)
        {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO motclearticle(numArt, numMotCle) VALUES (?, ?)");
            $stmt->execute([$this->$id, $motCleId]);
        }

        if ($result) {
            return true;
        }

    }

    public function removeAllMotCle($numArt)
    {
        return $this->query("DELETE FROM motclearticle WHERE numArt = {$numArt}");
    }

    public function removeAllComment($numArt)
    {
        $this->query("DELETE FROM likeart WHERE numArt = {$numArt}");
        $this->query("DELETE FROM likecom WHERE numArt = {$numArt}");
        $this->query("DELETE FROM commentplus WHERE numArt = {$numArt}");

        return $this->query("DELETE FROM comment WHERE numArt = {$numArt}");
    }

    public function getLikedByUserId($numMemb)
    {
        return $this->query(
        "SELECT a.* FROM article a
        INNER JOIN likeart la ON la.numArt = a.numArt
        WHERE la.numMemb = ?", [$numMemb]);
    }

}
