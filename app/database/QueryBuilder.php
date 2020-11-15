<?php

namespace App\App\Database;

use PDO;

class QueryBuilder
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectAll(string $table, string $fetchClass = null)
    {
        $query = $this->db->prepare("select * from {$table};");
        $query->execute();

        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $query = $this->db->prepare($sql);

        return $query->execute($parameters);
    }

    public function find(string $table, $id)
    {
        $query = $this->db->prepare("select * from {$table} where id = {$id};");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ)[0];
    }

    public function update(string $table, $id, array $parameters = null)
    {
        $query = $this->getQuery($parameters);
        $query = $this->db->prepare("UPDATE {$table} SET {$query} where id = {$id};");
        $query->execute();

        return $parameters;
    }

    private function getQuery($parameters = null)
    {
        $query = '';
        if ($parameters) {
            if (!empty($parameters['id'])) {
                unset($parameters['id']);
            }
            $check = 1;
            $count = count($parameters);
            foreach ($parameters as $key => $value) {
                $query .= ($count != $check) ? "{$key} = '$value'," : "{$key} = '$value'";
                $check++;
            }
        }
        return $query;
    }

    public function delete(string $table, $id)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE id=' . $id;
        $query = $this->db->prepare($sql);

        return $query->execute();
    }
}
