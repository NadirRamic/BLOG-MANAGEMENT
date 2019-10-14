<?php include('configDB.PHP'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="assets/css/Styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container">
    <a class="navbar-brand" href="#">Blog Management</a>
    <div class "box1"> 
    <a class ="box1" href="addPost.php"> <i class="fa fa-pencil"></i> New Blog Post</a>
</div>
    <div clas="box2">
    <a class ="box2" href="logout.php" name="logout"> Logout</a>
  <div>
    </div>
</nav> 
    <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
    <div class="header"> 
        <h2 style="font-family: Heebo;padding: 25px;">Blog posts lists</h2>
    </div>
    <div class="container">
    <?php $results = mysqli_query($db, "SELECT id, Title, Date FROM posts");?>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <form action="" method="post">
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>    
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo $row['Date']; ?></td>
            <td>
            <a href="SinglePost.php?view=<?php echo $row["id"]; ?>" class="fa fa-globe"</a>
            
            </td>
            <td>
            <a href="edit.php?edit=<?php echo $row['id']; ?>" class="fa fa-pencil" </a>
            </td>
            <td> 
            <a href="configDB.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')" class="fa fa-trash" </a>
            </td>
        </tr>
    <?php 
} ?>
</table>
</form>
</div>
</div>
</body>
</html>