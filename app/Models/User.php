<?php

namespace App\Models;

class User extends Model {

    protected $table = "membre";
    protected $idName = "numMemb";
    protected $date = "dtCreaMemb";

    public function getByUserName(string $username)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE pseudoMemb = ?",
        [$username], true);
    }

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);

        return true;
    }

    public function getStatut()
    {
        return $this->query("SELECT * FROM statut WHERE idStat = ?", [$this->idStat], true);
    }



}