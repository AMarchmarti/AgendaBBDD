<?php

class AgendaPDO{
    private $connection = null;

    function __construct($connectionValues)
    {
        try {
            $this->connection = new PDO("mysql:host=" . $connectionValues[0] . ";dbname=" . $connectionValues[1], $connectionValues[2], $connectionValues[3]);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }


    function showAllResults(){
        try{
            $query = "SELECT * FROM agenda";

            $stmt = $this->connection->prepare($query);
            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                echo "<table class='table table-hover table-responsive d-flex justify-content-center align-items-center'>"
                ."<tr>"
                ."<th>ID</th>"
                ."<th>Name</th>"
                ."<th>Phone</th>"
                ."</tr>";

                while ($row = $stmt->fetch()) {
                    extract($row);
                    echo "<tr>"
                    ."<td>{$Id}</td>"
                    ."<td>{$Nombre}</td>"
                    ."<td>{$Telefono}</td>"
                    ."</tr>";
                }
                echo "</table>";
            }

        }catch(PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
    }

    function insertData($name, $phone){
        try{
            $query = "INSERT INTO agenda (Nombre, Telefono) VALUES (:name, :phone)";
            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);

            if ($stmt->execute()) {
                echo "<div class='alert alert-primary' role='alert'>Los datos se han insertado correctamente</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Hemos tenido un problema en la insercción</div>";
            }


        }catch(PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
    }
    

    function deleteData($phone){
    try{
        $query= "DELETE FROM agenda WHERE Telefono = :phone";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':phone', $phone);

        if ($stmt->execute()) {
            echo "<div class='alert alert-primary' role='alert'>Los datos se han eliminado correctamente</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Hemos tenido un problema en la eliminación de datos</div>";
        }
    }catch(PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
    }


    function updateData($name, $newName, $phone){
        try{
            $query = "UPDATE diary SET name = :newName, surname = :surname, phone = :phone WHERE name = :name";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':newName', $newName);
            $stmt->bindParam(':phone', $phone);

            if ($stmt->execute()) {
                echo "<div class='alert alert-primary' role='alert'>Los datos se han eliminado correctamente</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Hemos tenido un problema en la eliminación de datos</div>";
            }
        }
        catch(PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
    }
}
?>