<?php

namespace App\Models;

use Database\DBConnetion;


abstract class Model
{
    protected $db;
    protected $table;

    public function __construct(DBConnetion $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", $id, true);
    }

    public function destroy(int $id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", $id);
    }

    public function query(string $sql, int $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (strpos($sql, 'DELETE' === 0 ) || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'CREATE') === 0) 
        {
            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->db]);

            return  $stmt->execute([$param]);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch' ;

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query')
        {
            return $stmt->$fetch();
        }else {
            $stmt->execute([$param]);
            return $stmt->$fetch();
        }

    }

  
}