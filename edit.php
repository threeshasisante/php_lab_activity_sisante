<?php
include 'dbcon.php';

//Get the existing ID from the URL
$id = $_GET['id'];

//Get the existing data
$query = "SELECT * FROM users WHERE id = $id";

$result = $conn->query($query);

$row = $result->fetch_assoc();

//Get if the update button was clicked
if(isset($_POST['btnedit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    //Update the record
    $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";

    $result = $conn->query($query);

    if($result){

        echo "Record updated successfully!";

        //Go back to the main page
        header("Location: index.php");
        exit();
    }else{

        echo "Error: ".$conn->error;

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">

            <div class="card-header">
                <h2 class="mb-0">Edit User</h2>
            </div>
            
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Edit Full Name</label>
                        <input type="text" class="form-control" placeholder="Full Name" name="name" value="<?=$row['name']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Edit Email Address</label>
                        <input type="text" class="form-control" placeholder="Email Address" name="email" value="<?=$row['email']?>" required>
                    </div>
                    
                    <div class="mb-3 text-center">
                        <button type="submit" name="btnedit" class="btn btn-success">Edit</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    </div>
                    
                </form>
            </div>
            
        </div>
       
    </div>
</body>
</html>