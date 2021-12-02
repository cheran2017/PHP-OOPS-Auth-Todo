<?php

include('../helpers/ErrorReporting.php');


class Database {

    private $serverName = 'localhost';
    private $userName   = 'root';
    private $password   = '';
    private $database   = 'todo';
    public  $conn;

    public function __construct() {
        // Create connection
        $this->conn = new mysqli($this->serverName, $this->userName, $this->password);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $this->createDatabase();
        $this->createUserTable();
        $this->createTaskTable();
    }

    public function save($table='tasks',$fields=['task'],$values=['Complete Oops']) {
        //implode
        $strFields   = implode(",",$fields);

        $strValues   = implode("','",$values);

        $sql = "INSERT INTO $table ($strFields)
                VALUES ('$strValues')";
        
        if ($this->conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

    }

    public function selectAll($table) {
        $sql = "SELECT * FROM $table";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data =  [];
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
            // // output data of each row
            
        } else {
            return false;
        }
    }

    public function selectLimit($table,$email,$password) {
        $sql = "SELECT * FROM $table 
                WHERE email= '$email' AND password = '$password'";
        // echo $sql;die;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();

            
        } else {
            return false;
            echo "0 results";
        }
    }

    public function delete($table,$id) {
        // sql to delete a record
        $sql = "DELETE FROM task WHERE id=$id";

        if ($this->conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->conn->error;
        }
    }

    public function createDatabase() {
       // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS todo";
        if ($this->conn->query($sql) === TRUE) {
            // echo "Database created successfully";
        } else {
            echo "Error creating database: " . $this->conn->error;
        }
    }
    public function createUserTable() {
        // Change db to "test" db
        $this->conn->select_db("todo");
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS users (
                    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user_name VARCHAR(30) NOT NULL,
                    email VARCHAR(30) NOT NULL,
                    password VARCHAR(50)  NOT NULL
                )";
            
        if ($this->conn->query($sql) === TRUE) {
            // echo "Table Users created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function createTaskTable() {
        // Change db to "test" db
        $this->conn->select_db("todo");
        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS tasks (
                    id INT(60) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    task VARCHAR(30) NOT NULL
                )";
            
        if ($this->conn->query($sql) === TRUE) {
            // echo "Table Tasks created successfully";
        } else {
            echo "Error creating table: " . $this->conn->error;
        }
    }

    public function register($table,$fields,$values) {
        //implode
        $strFields   = implode(",",$fields);

        $strValues   = implode("','",$values);

        $sql = "INSERT INTO $table ($strFields)
                VALUES ('$strValues')";
        
        if ($this->conn->query($sql) === TRUE) {
            echo  "New User created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

    }
    
}



?>