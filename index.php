<?php 
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>
    <div class="container center">
        <h1>Welcome <?php echo $login_session ?></h1>
        <h2><a href='logout.php'>Logout</a></h2>
    </div>
</body>
</html>