<?php


class database
{
    private $host;
    private $dbUser;
    private $dbPass;
    private $dbName;
    public $conn;

    function __construct()
    {
        require __DIR__ . '/connect.php';
        $this->host = $host;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbName = $dbName;

        include_once __DIR__ . '/DatabaseConnectionSingleton.php';
        $this->conn = Singleton::getinstance($this->host, $this->dbUser, $this->dbPass, $this->dbName);
    }

    // return number of records
    function check($sql)
    {
        if ($result = $this->conn->query($sql)) {
            $num = $result->num_rows;
            return $num;
        }
    }

    // return records (in array)
    function display($sql)
    {
        if ($result = $this->conn->query($sql)) {
            $num = $result->num_rows;
            if ($num > 0) {
                for ($i = 0; $i < $num; $i++) {
                    $data[$i] = $result->fetch_array(MYSQLI_ASSOC);
                }
                return $data;
            }
        } else {
            throw new Exception("problem in query:" . $sql);
        }
    }

    // return one record only
    function select($sql)
    {
        if (!$result = $this->conn->query($sql)) {
            throw new Exception("can not make query :" . $sql);
            return false;
        }
        if ($row = $result->fetch_array(MYSQLI_ASSOC))
            $result->close();
        return $row;
    }

    // update a record in a table
    function update($sql)
    {
        if (!$result = $this->conn->query($sql)) {
            throw new Exception("Error:can not execute the query");
        } else {
            return true;
        }
    }

    // insert in a table
    function insert($sql)
    {
        if ($result = $this->conn->query($sql)) {
            return true;
        } else {
            throw new Exception("Error :SQL:" . $sql);
            return false;
        }
    }

    // delete from table
    function delete($sql)
    {
        if (!$result = $this->conn->query($sql)) {
            throw new Exception("Error: not deleted");
            return false;
        } else {
            return true;
        }
    }


    // return last record in a table
    function getLastRecordData($tablename)
    {
        $query = "SELECT * FROM $tablename ORDER BY id  DESC LIMIT 1";
        
        if ($result = $this->conn->query($query)) {
            $data = $result->fetch_array(MYSQLI_ASSOC);
        }
        return $data;
    }
}
