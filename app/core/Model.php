<?php

class Model
{
    // Parents:
    use Database;

    // Properties:
    protected $table = "users";
    protected $limit = 10;
    protected $offset = 0;

    // Methods:
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $statement = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $statement .= $key." = :".$key." && ";
        }

        foreach ($keys_not as $key) {
            $statement .= $key." != :".$key." && ";
        }

        $statement = trim($statement, " && ");

        $statement .= " LIMIT $this->limit OFFSET $this->offset";
        $full_data = array_merge($data, $data_not);

        return $this->query($statement, $full_data);
    }

    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $statement = "SELECT * FROM $this->table WHERE ";

        foreach ($keys as $key) {
            $statement .= $key." = :".$key." && ";
        }

        foreach ($keys_not as $key) {
            $statement .= $key." != :".$key." && ";
        }

        $statement = trim($statement, " && ");

        $statement .= " LIMIT $this->limit OFFSET $this->offset";
        $full_data = array_merge($data, $data_not);

        $result = $this->query($statement, $full_data);

        if($result){
            return $result[0];
        }
        return false;
    }

    public function insert($data): bool
    {
        $keys = array_keys($data);
        $statement = "INSERT INTO $this->table (".implode(', ', $keys).") VALUES (:".implode(', :', $keys).")";
        $this->query($statement, $data);
        return false;
    }

    public function update($id, $data, $id_column = "id")
    {
        $keys = array_keys($data);
        $statement = "UPDATE $this->table SET ";

        foreach ($keys as $key) {
            $statement .= $key." = :".$key.", ";
        }

        $statement = trim($statement, ", ");

        $statement .= "  WHERE $id_column = :$id_column";

        $data[$id_column] = $id;
        $this->query($statement, $data);
        return false;
    }

    public function delete($id, $id_column = "id"): bool
    {
        $data[$id_column] = $id;
        $statement = "DELETE FROM $this->table WHERE $id_column = :$id_column";

        $this->query($statement, $data);
        return false;
    }
}