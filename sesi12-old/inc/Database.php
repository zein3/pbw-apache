<?php
class Database
{
    protected $connection = null;

    public function connect()
    {
        try {
            $dbOptions = [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ];

            $this->connection = new \PDO("mysql:dbname=" . DB_DATABASE_NAME . ";host=" . DB_HOST, DB_USERNAME, DB_PASSWORD, $dbOptions);

            if ($this->connection->errorCode()) {
                throw new Exception("Failed to connect to MySQL: " . $this->connection->errorCode());
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "", $params = array())
    {
        try {
            $stmt = $this->executeStatement($query, $params);
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }

    public function executeStatement($query = "", $params = array())
    {
        try {
            $stmt = $this->connection->prepare($query);
            if ($stmt === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            $stmt->execute($params);

            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
