<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            th,tr,td,table{
                border:1px solid black;
                border-collapse:collapse;
                text-align: center;
            }
            table{
                width: 100%;
            }
        </style>
    </head>
    <body>
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
     //Let say If I put the file name Bang.png
 
    // output data of each row
    echo "<table><tr><th>FIR No</th><th>Complaint Name</th><th>Victim Name</th><th>Victim Address</th><th>Phone</th><th>Victim Email</th><th> pincode</th><th>Incident Details</th><th>File</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["idFir"]. " </td><td> " . $row["Complaint_name"]."</td><td>" . $row["Victim_name"]. "</td><td>" . $row["Address"]. "</td><td>". $row["mobile"]."</td><td>". $row["Email"]."</td><td>". $row["pincode"]."</td><td>". $row["Incident_details"]."</td><td>";
       echo '<a><img src="data:image/jpeg;base64,'.base64_encode($row['file']).'"height="300" width="300" />'
        ."</td></tr>";
   
       
    
    }
    echo "</table>";
} else {
    echo "0 results";
}
        ?>
    </body>
</html>
