<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location: login.php');
    exit;
}

// Delete book functionality
if (isset($_GET['delete_book_id'])) {
    $delete_book_id = $_GET['delete_book_id'];
    
    $delete_query = mysqli_query($conn, "DELETE FROM borrowed_books WHERE book_id = '$delete_book_id'");

    if ($delete_query) {
        header('Location: borrowers_list.php');
        exit;
    } else {
        die('Delete query failed: ' . mysqli_error($conn));
    }
}

// Retrieve borrowed books information
$borrowers_query = mysqli_query($conn, "
    SELECT u.name AS user_name, b.id AS book_id, b.title, b.author, bb.borrow_date
    FROM borrowed_books bb
    INNER JOIN user_form u ON bb.member_id = u.id
    INNER JOIN books b ON bb.book_id = b.id
    ORDER BY bb.borrow_date DESC
");

// Check if query execution failed
if (!$borrowers_query) {
    die('Query failed: ' . mysqli_error($conn));
}

// Counter for table rows
$row_number = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Borrowers List</title>

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/list.css">
</head>
<body>
   
<div class="container">

   <div class="borrowers-list">
      <h2>Borrowers List</h2>
      <table>
         <thead>
            <tr>
               <th>#</th>
               <th>User Name</th>
               <th>Book Title</th>
               <th>Author</th>
               <th>Borrow Date</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php while ($row = mysqli_fetch_assoc($borrowers_query)): ?>
               <tr>
                  <td><?php echo $row_number++; ?></td>
                  <td><?php echo $row['user_name']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['author']; ?></td>
                  <td><?php echo $row['borrow_date']; ?></td>
                  <td>
                     <a href="borrowers_list.php?delete_book_id=<?php echo $row['book_id']; ?>" class="btn-delete">Delete</a>
                  </td>
               </tr>
            <?php endwhile; ?>
         </tbody>
      </table>
      <a href="home.php" class="btn">Back to Home</a>
      <a href="done_retrieving.php" class="btn">Done Retrieving</a>
   </div>

</div>

</body>
</html>
