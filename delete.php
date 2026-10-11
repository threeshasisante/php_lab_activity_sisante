<?php
    include 'dbcon.php';

    //Get the student ID fro the URL
    $id = $_GET['id'];

    //Delete the record 
    $query = "DELETE FROM users WHERE id = $id";

    $result = $conn->query($query);

    if($result){

        //Go back to the main page
        header("Location: index.php");
        exit();

    }else{

        echo "Error: ".$conn->error;
    }