<?php
/* Database credentials. Running MySQL
server with default setting (user 'root' with no password) */
session_start();
// initialize variables
$Username = "";
$Title ="";
$Date="";
$Content="";
$imageUrl="";
$errors = array();
$id = 0;

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'imel');
        
//LOGIN USER
if (isset($_POST['log'])) {
    $Username = mysqli_real_escape_string($db, $_POST['Username']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);
    if (empty($Username)) {
        array_push($errors, "Username is required");
    }
    if (empty($Password)) {
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
        //$password = md5($password);
        $query = "SELECT * FROM users WHERE Username='$Username' AND Password='$Password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['Username'] = $Username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

//DELETE POST

if(isset($_GET['delete'])) {
    $id =$_GET['delete'];
    mysqli_query($db, "DELETE FROM posts WHERE id = $id");
        $_SESSION['message'] = "Post DELETED!"; 
        header('location: index.php');
}

//Show POST

if (isset($_GET['view'])) {
        $id = $_GET['view'];
        $update = true;
        $result= mysqli_query($db, "SELECT * FROM posts WHERE id= $id");
        $result = mysqli_fetch_array($result);
        $Title =$result['Title'];
        $Date = $result['Date'];
        $Content = $result['Content'];
        $imageUrl = $result['imageUrl'];
}


//EDIT POST
if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $result= mysqli_query($db, "SELECT * FROM posts WHERE id= $id");
        $result = mysqli_fetch_array($result);
        $Title =$result['Title'];
        $Date = $result['Date'];
        $Content = $result['Content'];
        $imageUrl = $result['imageUrl'];
}

//UPDATE POST

if (isset($_POST['update'])) {
    if($_FILES['imageUrl']['name'])
    {
        $target='assets/img/'.$_FILES['imageUrl']['name'];
        $source=$_FILES['imageUrl']['tmp_name'];
        copy($source,$target);
    }
    $id = $_POST['id'];
    $Title = $_POST['Title'];
    $Date = $_POST['Date'];
    $Content = $_POST['Content'];
    $imageUrl = $_FILES['imageUrl']['name'];
    mysqli_query($db, "UPDATE posts SET Title='$Title', Date='$Date', Content='$Content', imageUrl='$imageUrl' WHERE id=$id");
    $_SESSION['message'] = "Post updated!"; 
    header('location: index.php');
 }

//ADD POST

if (isset($_POST['submit'])) {
    if($_FILES['imageUrl']['name'])
     {
        $target='assets/img/'.$_FILES['imageUrl']['name'];
        $source=$_FILES['imageUrl']['tmp_name'];
        copy($source,$target);
    }
$Title = $_POST['Title'];
$Date = $_POST['Date'];
$Content = $_POST['Content'];
$imageUrl = $_FILES['imageUrl']['name'];
mysqli_query($db,"INSERT INTO posts (Title, Date, Content, imageUrl) VALUES ('$Title', '$Date','$Content', '$imageUrl')");
$_SESSION['message'] = "Post added"; 
header('location: index.php');

}

?>