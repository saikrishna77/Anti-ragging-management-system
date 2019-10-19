
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
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="float: right;margin-right: 10px;margin-top: 2px">Admin</a>
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
 <?php
        $id=$_POST["fir"];

         $servername="localhost";
         $user="root";
         $pass="root";
         $dbname="sem6";
         $conn=new mysqli($servername,$user,$pass,$dbname);
         if($conn->connect_error){
    die("Error".mysqli_connect_error());
  }
        
        $sql = "SELECT * FROM fir WHERE idFir='$id' ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
     
    echo "<table><tr><th>FIR No</th><th>Complaint Name</th><th>Victim Name</th><th>Victim Address</th><th>Phone</th><th>Victim Email</th><th> pincode</th><th>Incident Details</th><th>File</th><th>Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["idFir"]. " </td><td> " . $row["Complaint_name"]."</td><td>" . $row["Victim_name"]. "</td><td>" . $row["Address"]. "</td><td>". $row["mobile"]."</td><td>". $row["Email"]."</td><td>". $row["pincode"]."</td><td>". $row["Incident_details"]."</td><td>";
       echo '<a><img src="data:image/jpeg;base64,'.base64_encode($row['file']).'"height="300" width="300" />'
        ."</td><td>".$row["status"]."</td></tr>";
   
       
    
    }
    echo "</table>";
} else {
    echo "0 results";
}
        ?>
	
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
