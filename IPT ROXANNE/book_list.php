<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location: login.php');
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book List</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script type="text/javascript" src="jquery/jquery-3.7.1-jquery.min.js"></script>

</head>
<body>
   
<div class="container">

   <div class="book-list">
      <h2>Available Books for Borrowing</h2>
      <ul>
         <?php
            $book_query = mysqli_query($conn, "SELECT * FROM `books` WHERE available = 1") or die('query failed');
            if(mysqli_num_rows($book_query) > 0){
               while($book = mysqli_fetch_assoc($book_query)){
                  echo '<li>'.$book['title'].' by '.$book['author'].' <a href="borrow_book.php?book_id='.$book['id'].'" class="btn">Borrow</a></li>';
               }
            } else {
               echo '<li>No books available at the moment</li>';
            }
         ?>
      </ul>
      <a href="borrowers_list.php" class="btn">View Borrowers List</a>
      <a href="home.php" class="btn">Back to Home</a>
   </div>

</div>

</body>
</html>
