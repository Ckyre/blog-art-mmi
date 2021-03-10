<?php

namespace App\Models;

use PDO;
use stdClass;
use Database\DBConnection;

abstract class Model
{

    protected $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    } 

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table}");
    }

    public function findById($id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE {$this->idName} = ?", [$id], true);
    }

    public function create(array $data, ?array $relations = null)
    {
        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? "" : ", ";
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";
            $i++;
        }
        
        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) 
        VALUES($secondParenthesis)", $data);
    }

    public function update(array $data, ?array $relations = null)
    {
        $sqlRequestPart = "";
        $i = 1;

        foreach ($data as $key => $value)
        {
            $comma = $i === count($data) ? "" : ", ";
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $idName = $this->idName;
        $data['id'] = $this->$idName;
        
        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE {$this->idName} = :id", $data);
    }

    public function destroy(): bool
    {
        $id = $this->idName;
        return $this->query("DELETE FROM {$this->table} WHERE {$this->idName} = ?", [$this->$id]);
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (strpos($sql, 'DELETE') === 0 
        || strpos($sql, 'UPDATE') === 0
        || strpos($sql, 'INSERT') === 0) {

            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }

}
