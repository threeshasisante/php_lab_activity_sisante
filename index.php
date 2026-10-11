<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

    <div class="container py-5">
        <h2 class="text-center mb-4">User Management System</h2>
        <div class=" row g-4">
            <div class="col-12 col-lg-4">

                <div class="card shadow-sm h-100">

                    <div class="card-header">
                        <h4>Add New User</h4>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="text" class="form-control" placeholder="Email Address" name="email" required>
                            </div>
                            <button type="submit" name="btnsubmit" class=" btn btn-primary w-100">Submit</button>
                        </form>
                    </div> 
                </div>    
            </div>

            <?php
                if(isset($_POST['name'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];

                    $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

                    $result = $conn->query($query);
                }
            
            ?>
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="mb-0">Registered Users</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql_query = "SELECT * FROM users";

                                        $result = $conn->query($sql_query);

                                        foreach ($result as $row){
                                    ?>
                                            <tr>
                                                <td><?=$row['name']?></td>
                                                <td><?=$row['email']?></td>
                                                <td><?=$row['created_at']?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-sm" href="edit.php?id=<?=$row['id']?>">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?=$row['id']?>"
                                                        onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>

                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                </div> 
            </div>    
        </div>
    </div>
    
</body>
</html>