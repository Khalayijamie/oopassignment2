<?php

class DBConn  {
    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO(
                'mysql:host=' . Config::getHost() . ';dbname=' . Config::getDBName(),
                Config::getUser(),
                Config::getPassword()
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }

    

    

    public function insert($table, $data) {
        try {

            if ($table === 'users' && isset($data['email'])) {
                $email = $data['email'];
                $existingUsers = $this->getAllUsers();

                foreach ($existingUsers as $user) {
                    if ($user['email'] === $email) {

                        return false;
                    }
                }
            }

            ksort($data);

            $fieldNames = implode('`, `', array_keys($data));
            $fieldValues = implode("', '", array_values($data));

            $sql = "INSERT INTO $table (`$fieldNames`) VALUES ('$fieldValues')";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
           
            error_log('Database Error: ' . $e->getMessage());

            return false;
        }
    }

    public function getAllUsers() {
        try {
            $sql = "SELECT * FROM users";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            // Log the error message
            error_log('Database Error: ' . $e->getMessage());
    
            return [];
        }
    }
    
}
