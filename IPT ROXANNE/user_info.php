<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['update_hobbies'])){
   $new_hobbies = mysqli_real_escape_string($conn, $_POST['hobbies']);
   mysqli_query($conn, "UPDATE `user_form` SET hobbies = '$new_hobbies' WHERE id = '$user_id'") or die('query failed');
   header('location:user_info.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Info & Hobbies</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script type="text/javascript" src="jquery/jquery-3.7.1-jquery.min.js"></script>
</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <p><strong>Email:</strong> <?php echo $fetch['email']; ?></p>
      <p><strong>Hobbies:</strong> <?php echo $fetch['hobbies']; ?></p>
      <a href="home.php" class="btn">Back to Home</a>

      <form action="" method="post">
         <textarea name="hobbies" placeholder="Edit your hobbies" required><?php echo $fetch['hobbies']; ?></textarea>
         <input type="submit" name="update_hobbies" value="Update Hobbies" class="btn">
      </form>
   </div>

</div>

</body>
</html>
