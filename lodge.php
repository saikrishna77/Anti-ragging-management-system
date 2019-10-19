
<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="font-awesome.min.css">
<style>

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
    <a href="admin.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="float: right;margin-right: 10px;">Admin</a>
  </div>
</div >

<!-- Header --><br><br><br><br>
	<center>
    <form method="POST" onclick="myFunction()" style="border: 1px solid black;border-radius: 5px;border-top-width:5px ;border-top-color:red;margin-top: 10% max-height:820px;max-width:420px;box-shadow:  5px 10px 18px #888888;" enctype="multipart/form-data"><br>
		<center><h3>FIR(First Information Report)</h3><span style="font-size: 11px">Your Fir Number will be generated at the bottom of the page</span></center><br>
		<label >Complaint Name:</label>
    <input class="lef1t" type="text" name="Complaint" placeholder="Your Name_incident" ><br><br>
		<label class="lef1t" style="margin-left: 20px">Victim Name:</label>
    <input  class="lef1t" type="text" name="victim_name"><br><br>
		<label >  Victim Address:     </label>
    <input class="lef1t" type="text" name="address"><br><br>
		<label style="margin-left: 22px"> Victim email:</label>
    <input type="text" class="lef1t" name="email"><br><br>
		<label>Victim Number:    </label>
    <input type="number" class="lef1t" name="mobile"><br><br>
		<label style="margin-left: 12%">Pincode: </label>
    <input class="lef1t" type="number" name="pincode"><br><br>
    <label style="margin-left: 16%">State: </label>
    <input class="lef1t" type="text" name="state"><br><br>
		<label >Incident Details:</label>
        <textarea class="text1"rows="4" cols="30" name="incident"></textarea>
		<br><br>
		<label style="margin-left: 20%">File:</label>
    <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg" required/>
    <br><br>
		<input type="submit" name="submit" id="submit" value="submit"><br><br>
	</form></center>
	<br><br>
</div>
<?php 
$connect = new mysqli('localhost','root','root','sem6');
        if($connect->connect_error){
            die("Connection failed: " . $connect->connect_error);
        }
if(isset($_POST["submit"])){
  
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    //Complaint_name,Victim_name,Email,mobile,Address,pincode,State,Incident_details,file
    $Complaint=$_POST["Complaint"];
    $victim_name=$_POST["victim_name"];
    $address=$_POST["address"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $pincode=$_POST["pincode"];
    $incident=$_POST["incident"];
    $state=$_POST["state"];
    $query = "INSERT INTO fir (Complaint_name,Victim_name,Email,mobile,Address,pincode,State,Incident_details,file,status)values('$Complaint','$victim_name',' $email','$mobile','$address','$pincode','state','$incident','$file','unresolved')";
    if ($connect->query($query) === TRUE) {
      $query = $connect->query("select * from fir where Complaint_name='$Complaint'");

  $row = $query->fetch_assoc();
  $idFir= $row['idFir'];
  echo '<center><p> Your FIR(First Information Report) Number is : '.$idFir.'</p></center>';
  //$conectt=$connect->query("insert into status values('$idFir')");
    } else {
        echo "Error: ". "<br>" . $connect->error;
    }}

?>

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
