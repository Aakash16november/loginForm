<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sign up from</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <?php
      if($_SERVER['REQUEST_METHOD'] == "POST"){
        include "connect.php";

        $email = $_POST['email'];
        $password = $_POST['pass'];

        

            // $sql = "INSERT INTO information (email, password)
            //     VALUES ('$email', '$password')";

            //     $result = mysqli_query($conn, $sql);
            //     if($result){
            //         echo "inserted successfully";
            //     }else{
            //         die(mysqli_error($conn));
            //     }

            $sql = "select * from information where email ='$email'";

            $result = mysqli_query($conn,$sql);
            if($result){
                $num=mysqli_num_rows($result);
                if($num>0){
                    echo '<div class="alert alert-warning alert-dismissible fade show alert-danger" role="alert">
                    <strong>User Already Exist!</strong> Please Try Again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }else{
                    $sql = "INSERT INTO information (email, password)
                   VALUES ('$email', '$password')";
                   $result = mysqli_query($conn, $sql);
                    
                    if($result){
                        echo '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <strong>Inserted Successfully!</strong> Login To Verify.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }else{
                        die(mysqli_error($conn));
                    }
                }
            }
      }
      
    ?>
    <h1 style="text-align: center; margin-top: 2rem;">SIGN UP FORM!</h1>

    <div class="container" style="margin-top: 2rem;">
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="Email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="email" required>
                
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="pass" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>