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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
          <script src="assets/js/script.js" type="text/javascript"></script>  
</head>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container">
    <a class="navbar-brand" href="index.php"> Blog Management</a>
    <div class "box1"> 
    <a class ="box1" href="addPost.php"> <i class="fa fa-pencil"></i> New Blog Post</a>
</div>
    <div clas="box2">
    <a class ="box2" href="logout.php"> Logout</a>
  <div>
    </div>
</nav>
  <div class="header"> 
        <h2 style="font-family: Heebo;padding: 25px;">New Blog Posts</h2>
<form action="configDB.php" method="post" enctype="multipart/form-data">
<div class="container">
<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="row">
		<div class="col-6">
     <p><label>Title</label><br/>
<input class="form-control form-control-lg" type="text" placeholder="Title" name="Title" value="<?php echo $Title; ?>"></p>
</div>

<div class="col-2"></div>
<div class="col-4" style="">
<p><label>Date</label><br/>
    <input class="form-control form-control-lg" type="date" placeholder="Date" name="Date" value="<?php echo $Date; ?>"></p>
		</div>
        </di
<div class="row">    
<div class="col-6">
<div class="form-group green-border-focus">
  <label>Content</label>
  <textarea class="form-control form-control-lg" rows="20" cols="50" name="Content"><?php echo $Content; ?></textarea>
</div>
</div>

<div class="col-2"></div>
<div class="col-4">
<div class='image' style="width:300px; height:300px">
         <label>Feature image:</label> </br>
              <?php $results = mysqli_query($db, "SELECT * FROM posts WHERE id= $id");?>
        <?php while ($row = mysqli_fetch_array($results)) { ?>

     <?php 
 echo "<img src='assets/img/".$row['imageUrl']."' style=width:350px;>"; 
} ?>

            <input type="file" name="imageUrl" id="imageUrl" class="form-control" onchange="loadFile(event)"style="display:none">
            <img id="imagePreview" width="100%"/>
              <div class="row">
                <div class="col-md-6">
                  <label for="imageUrl" class="custom-file-upload selectImage" style="color:#2D9CDB", "font-family:Heebo, sans-serif">
                      Select Image
                  </label>
                </div>
                <div class="col-md-6">
                  <label for="reset" class="custom-file-upload resetImage" onclick="reset()" style="color:red", "font-family:Heebo, sans-serif"> 
                   Remove Image
                  </label>
                </div>
              </div>

 </div>
<div class="row">
<div class="col-12">
</div>
</div>
</div>
<div class="col-6"></div>
<div class="col-2"></div>
<div class="col-4">
<input type="reset" class="btn btn-dark" name="reset" value="Cancel" onclick="cancel()">
<button type="update" class="btn btn-success" name="update"  style:"background: #4ECE3D;">Publish post</button>
</div>
</div>
</div>
</div>
</form>
</body>
</html>