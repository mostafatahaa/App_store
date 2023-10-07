<?php

namespace PHPMVC\Models;

use PHPMVC\LIB\Database\DatabaseConn;

class AbstractModel
{
    const TYPE_BOOL = \PDO::PARAM_BOOL;
    const TYPE_STR = \PDO::PARAM_STR;
    const TYPE_INT = \PDO::PARAM_INT;
    const TYPE_DECIMAL = 4;
    const TYPE_DATE = 5;

    // VALID DATE RANGE IS 1000-01-01 TO 9999-12-31
    const VALIDATE_DATE_STRING = '/^[1-9][1-9][1-9][1-9]-[0-1]?[0-2]-(?:[0-2]?[1-9]|[3][0-1])$/';

    // TODO:: Check the valid dates in MYSQL to create a proper pattern
    const VALIDATE_DATE_NUMERIC = '^\d{6,8}$';
    const DEFAULT_MYSQL_DATE = '1970-01-01';

    private static $db;

    private function prepareValues(\PDOStatement &$stmt)
    {
        foreach (static::$table_schema as $columnName => $type) {
            if ($type == 4) {
                $sanitizedValue = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}", $sanitizedValue);
            } else {
                $stmt->bindValue(":{$columnName}", $this->$columnName, $type);
            }
        }
    }

    private function buildNameParametersSQL()
    {
        $namedParams = '';
        foreach (static::$table_schema as $columnName => $type) {
            $namedParams .= $columnName . ' = :' . $columnName . ', ';
        }
        return trim($namedParams, ', ');
    }

    private function create()
    {
        $sql = 'INSERT INTO ' . static::$table_name . ' SET ' . $this->buildNameParametersSQL();
        $stmt =  DatabaseConn::connect_db()->prepare($sql);
        $this->prepareValues($stmt);
        if ($stmt->execute()) {
            $this->{static::$primary_key} =  DatabaseConn::connect_db()->lastInsertId();
            return true;
        }
        return false;
    }

    private function update()
    {
        $sql = 'UPDATE ' . static::$table_name . ' SET ' . $this->buildNameParametersSQL() . ' WHERE ' . static::$primary_key . ' = ' . $this->{static::$primary_key};
        $stmt =  DatabaseConn::connect_db()->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute();
    }

    public function save($checkPrimaryKey = true)
    {
        if ($checkPrimaryKey === false) {
            return $this->save();
        }
        return $this->{static::$primary_key} === null ? $this->create() : $this->update();
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table_name . '  WHERE ' . static::$primary_key . ' = ' . $this->{static::$primary_key};
        $stmt =  DatabaseConn::connect_db()->prepare($sql);
        return $stmt->execute();
    }

    public static function get_all()
    {
        $sql = 'SELECT * FROM ' . static::$table_name;
        $stmt =  DatabaseConn::connect_db()->prepare($sql);
        $stmt->execute();
        if (method_exists(get_called_class(), '__construct')) {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$table_schema));
        } else {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        }
        if ((is_array($results) && !empty($results))) {
            return new \ArrayIterator($results);
        };
        return false;
    }

    public static function get_by_key($pk)
    {
        $sql = 'SELECT * FROM ' . static::$table_name . '  WHERE ' . static::$primary_key . ' = "' . $pk . '"';
        $stmt =  DatabaseConn::connect_db()->prepare($sql);
        if ($stmt->execute() === true) {
            if (method_exists(get_called_class(), '__construct')) {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$table_schema));
            } else {
                $obj = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
            }
            return !empty($obj) ? array_shift($obj) : false;
        }
        return false;
    }

    public static function get_by($columns, $options = [])
    {
        $whereClauseColumns = array_keys($columns);
        $whereClauseValues = array_values($columns);
        $whereClause = [];
        for ($i = 0, $ii = count($whereClauseColumns); $i < $ii; $i++) {
            $whereClause[] = ":" . $whereClauseColumns[$i] . ' = ' . $whereClauseValues[$i] . '';
        }
        $whereClause = implode(' AND ', $whereClause);
        $sql = 'SELECT * FROM ' . static::$table_name . ' WHERE ' . $whereClause;
        return static::get($sql, $options);
    }

    public static function get($sql, $options = [])
    {

        $stmt = DatabaseConn::connect_db()->prepare($sql);
        if (!empty($options)) {
            foreach ($options as $columnName => $type) {
                if ($type[0] == 4) {
                    $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $stmt->bindValue(":{$columnName}", $sanitizedValue);
                } elseif ($type[0] == 5) {
                    if (!preg_match(self::VALIDATE_DATE_STRING, $type[1]) || !preg_match(self::VALIDATE_DATE_NUMERIC, $type[1])) {
                        $stmt->bindValue(":{$columnName}", self::DEFAULT_MYSQL_DATE);
                        continue;
                    }
                    $stmt->bindValue(":{$columnName}", $type[1]);
                } else {
                    $stmt->bindValue(":{$columnName}", $type[1], self::TYPE_STR);
                }
            }
        }
        $stmt->execute();
        if (method_exists(get_called_class(), '__construct')) {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$table_schema));
        } else {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        }
        if ((is_array($results) && !empty($results))) {
            return new \ArrayIterator($results);
        };
        return false;
    }

    public static function getOne($sql, $options = array())
    {
        $result = static::get($sql, $options);
        return $result === false ? false : $result->current();
    }
}
