<?php

Trait Database
{
    private function connect(): PDO
    {
        $dsn = "mysql:hostname=".DB_HOST.";dbname=".DB_NAME;
        return new PDO($dsn, DB_USER, DB_PASSWORD);
    }

    public function query($statement, $data = [])
    {
        $con = $this->connect();
        $preparation = $con->prepare($statement);
        $execution = $preparation->execute($data);
        if($execution){
            $result = $preparation->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result;
            }
        }

        return false;
    }

    public function get_row($statement, $data = [])
    {
        $con = $this->connect();
        $preparation = $con->prepare($statement);
        $execution = $preparation->execute($data);
        if($execution){
            $result = $preparation->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result[0];
            }
        }

        return false;
    }
}