<?php 
    include('config/db.php');
    $username = $email = $password = $passwordagain = "";
    $errors = array('email' => '', 'username' => '', 'password' => '');

    if(isset($_POST['submit'])){
        // check email
        if(empty($_POST['email'])){
            $errors['email'] = 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        // check username
        if(empty($_POST['username'])){
            $errors['username'] = 'Username is required <br />';
        } else {
            $title = $_POST['username'];
        }

        // check password
        if(empty($_POST['password']) || empty($_POST['passwordagain'])){
            $errors['password'] = 'Password is required <br />';
        } else if($_POST['password'] != $_POST['passwordagain']) {
            $errors['password'] = 'Passwords do not match <br />';
        } else {
            $password = $_POST['password'];
        }

        if(!array_filter($errors)){
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            // create sql
            $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            
            // save db and check
            if(mysqli_query($conn, $sql)){
                // success
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }

            header('Location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Register</h4>
        <form action="register.php" method="POST" class="white">
            <label for="">Add Your Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email'] ?></div>

            <label for="">Add Your Username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
            <div class="red-text"><?php echo $errors['username'] ?></div>

            <label for="">Add Your Password</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            <label for="">Add Your Password Again</label>
            <input type="password" name="passwordagain" value="<?php echo htmlspecialchars($passwordagain) ?>">
            <div class="red-text"><?php echo $errors['password'] ?></div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

</html>