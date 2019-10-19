
<?php 

$connect = new mysqli('localhost','root','root','sem6');
        if($connect->connect_error){
            die("Connection failed: " . $connect->connect_error);
        }
        if(isset($_POST["submit"])){
          $user=$_POST["username"];
          $pass=$_POST["password"];
          $result=$connect->query("select * from admins");
          if($result->num_rows >0){  
            while($row = $result->fetch_assoc()){
              if($user == $row["adminid"])
                { if($pass == $row["password"]){
                session_start();
                if(isset($_SESSION['username'])){unset($_SESSION['username']);}
                $_SESSION['username']=$user;

                header("Location: admin.php");}
                
              }
              else {echo '<script type="text/javascript">

          window.onload = function () { alert("Incorrect username and password"); }

</script>';}
              } 
              

            }
          }
          
   
?>
<!DOCTYPE html>
<html lang="en">
<title>commitee</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="font-awesome.min.css">
<style>
input{
  margin-left: 10px;
 border-radius: 6px;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
.texte-hover{
  background-color: red; 
}
</style>

<body>

<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="project.html" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="Enquiry.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Enquiry</a>
    <a href="Commitee.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Committee</a>
    
    <a href="Contact.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>

    <a style="float: right;margin-right: 10px;margin-top: 2px"href=""><img style="max-width: 46px;max-height:80px " src="r.jpeg"/></a>
        <a href="admin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="float: right;margin-right: 10px;margin-top: 2px">Admin</a>
  </div>

  <!-- Navbar on small screens -->
  <!--div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 4</a>
  </div-->

</div >

<!-- Header --><br><br><br><br>
  <center><form  method="POST" style="border: 1px solid black;border-radius: 5px;border-top-width:5px ;border-top-color:red;margin-top: 10% max-height:820px;max-width:60%;box-shadow:  5px 10px 18px #888888;"><br>
    <center><h3>Login</h3></center>
   <label>USERNAME</label>
   <input type="text" name="username"><br><br>
   <label>PASSWORD</label>
   <input type="password" name="password"><br><br>
   <input type="submit" name="submit" value="Submit"><br><br></form><br>
   
  <br><br>

</div>


<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Ragging does not break the ice, it breaks lives, careers and families!</h1>
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  
 <p>Website developed by S.Saikrishna</p>
</footer>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
