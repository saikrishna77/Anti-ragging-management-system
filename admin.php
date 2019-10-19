
<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<title>Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="font-awesome.min.css">
<style>
th,tr,td,table{
                border:1px solid black;
                border-collapse:collapse;
                text-align: center;
            }
            table{
                width: 100%;
            }
.lef1t{
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

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    
    <a href="project.html" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="enquiry.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Enquiry</a>
    <a href="commitee.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Committee</a>
    
    <a href="contact.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Contact Us</a>
    
    <a style="float: right;margin-right: 10px;margin-top: 2px"href=""><img style="max-width: 46px;max-height:80px " src="r.jpeg"/></a>
    <a href="admin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="float: right;margin-right: 10px;"><?php echo $_SESSION['username']; ?></a>
  </div>
</div >

<!-- Header --><br><br><br><br><center>
<form action="" method="POST" style="border: 1px solid black;border-radius: 5px;border-top-width:5px ;border-top-color:red;margin-top: 10% max-height:820px;max-width:60%;box-shadow:  5px 10px 18px #888888;"><br>
    <center><h3>Update Status of FIR</h3></center>
   <label>FIR no:</label>
   <input type="number" name="fir"><br><br>

   <input type="radio" name="Resolved" value="resolved"checked>Resolved
   <input type="radio" name="Resolved" value="unresolved">Unresolved<br><br>
  
   <input type="submit" value="update"><br><br>
<?php 

 $servername="localhost";
         $user="root";
         $pass="root";
         $dbname="sem6";
         $conn=new mysqli($servername,$user,$pass,$dbname);
         if($conn->connect_error){
    die("Error".mysqli_connect_error());
  }

              
  ?>
 </form>
</center>
   
<div><br><br><br>
<?php
      
        
      

         
        $sql = "SELECT * FROM fir";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     //Let say If I put the file name Bang.png

    // output data of each row
    echo "<table class='table1'><tr><th>FIR No</th><th>Complaint Name</th><th>Victim Name</th><th>Victim Address</th><th>Phone</th><th>Victim Email</th><th> pincode</th><th>Incident Details</th><th>File</th><th>Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["idFir"]. " </td><td> " . $row["Complaint_name"]."</td><td>" . $row["Victim_name"]. "</td><td>" . $row["Address"]. "</td><td>". $row["mobile"]."</td><td>". $row["Email"]."</td><td>". $row["pincode"]."</td><td>". $row["Incident_details"]."</td><td>";
       echo '<a><img src="data:image/jpeg;base64,'.base64_encode($row['file']).'"height="300" width="300" />'
        .  "</td><td>". $row["status"]."</td></tr>";
   
       
    
    }
    echo "</table>";
} else {
    echo "0 results";
}
    

if(!isset($_POST["submit"])){
  
          $idfir=$_POST["fir"];
          $resolved=$_POST["Resolved"];
          $adminid=$_SESSION["username"];

          $result1=$conn->query("update fir set status='$resolved' where idfir='$idfir';");
          $result2=$conn->query("update statuss set status='$resolved' ,adminid='$adminid',date=curdate() where idfir='$idfir';");
          
          
          }
           
        ?><div>
	<center>



    </center>
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
