<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit;
}

if (isset($_GET['book_id'])) {
   $book_id = $_GET['book_id'];
   

   $update_query = mysqli_query($conn, "UPDATE `books` SET available = 0 WHERE id = '$book_id'") or die('query failed');
   
   if ($update_query) {
      $insert_query = mysqli_query($conn, "INSERT INTO borrowed_books (member_id, book_id, borrow_date) VALUES ('$user_id', '$book_id', CURDATE())");
      
      if ($insert_query) {
         header('location: book_list.php');
         exit;
      } else {
         $error_message = "Failed to borrow the book. Please try again.";
      }
   } else {
      $error_message = "Failed to borrow the book. Please try again.";
   }
} else {
   $error_message = "Book ID not specified.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Borrow Book</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script type="text/javascript" src="jquery/jquery-3.7.1-jquery.min.js"></script>

</head>
<body>
   
<div class="container">

   <div class="borrow-book">
      <h2>Borrow Book</h2>
      <?php if(isset($error_message)): ?>
         <p><?php echo $error_message; ?></p>
      <?php endif; ?>
      <a href="book_list.php" class="btn">Back to Book List</a>
      <a href="home.php" class="btn">Back to Home</a>
   </div>

</div>

</body>
</html>
