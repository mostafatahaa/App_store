<?php

namespace PHPMVC\Models;

use PHPMVC\LIB\Database\DatabaseConn;

class AbstractModel
{
    const TYPE_BOOL = \PDO::PARAM_BOOL;
    const TYPE_INT  = \PDO::PARAM_INT;
    const TYPE_STR  = \PDO::PARAM_STR;
    const TYPE_DEC  = 5;

    public static function create_named_params_sql()
    {
        $named_params = "";
        foreach (static::$table_schema as $params => $type) {
            $named_params .= "$params " . " = :" . "$params, ";
        }
        return trim($named_params, " ,");
    }

    public function prepare_val(&$stmt)
    {
        foreach (static::$table_schema as $params => $type) {
            if ($type == 5) {
                $filter_dec = filter_var($this->$params, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$params}", $filter_dec);
            } else {
                $stmt->bindValue(":{$params}", $this->$params, $type);
            }
        }
    }

    public function create()
    {
        $sql = "INSERT INTO " . static::$table_name . " SET " . self::create_named_params_sql();
        $stmt = DatabaseConn::connect_db()->prepare($sql);
        $this->prepare_val($stmt);
        $stmt->execute();
    }

    public function update()
    {
        $sql = "UPDATE " . static::$table_name . " SET " . self::create_named_params_sql() . " WHERE " . static::$primary_key . " = " . $this->{static::$primary_key};
        $stmt = DatabaseConn::connect_db()->prepare($sql);
        $this->prepare_val($stmt);
        return $stmt->execute();
    }

    public function save()
    {
        return $this->{static::$primary_key} === null ? $this->create() : $this->update();
    }

    public function delete()
    {

        $sql = "DELETE FROM " . static::$table_name . " WHERE " . static::$primary_key . " = " . $this->{static::$primary_key};
        $stmt = DatabaseConn::connect_db()->prepare($sql);
        return  $stmt->execute();
    }


    public static function get_all()
    {

        $sql = "SELECT * FROM " . static::$table_name;
        $stmt = DatabaseConn::connect_db()->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$table_schema));
        return is_array($result) && !empty($result) ? $result : false;
    }

    public static function get_by_key($pk)
    {

        $sql = "SELECT * FROM " . static::$table_name . " WHERE " . static::$primary_key . " = " . "$pk";
        $stmt = DatabaseConn::connect_db()->prepare($sql);
        if ($stmt->execute()) {
            $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$table_schema));
            return $obj = array_shift($obj);
        }
        return false;
    }
}
