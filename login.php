<?php 
    include('config/db.php');
    session_start();
    $email = $password = $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); 

        $sql = "SELECT id FROM users WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
            session_register("email");
            $_SESSION['login_user'] = $email;
            header("Location: index.php");
        } else {
            $error = "Your Email or Password is invalid";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>

    <section class="container grey-text">
        <h4 class="center">Login</h4>
        <form action="login.php" method="POST" class="white">
            <label for="">Add Your Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <label for="">Add Your Password</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

</html>