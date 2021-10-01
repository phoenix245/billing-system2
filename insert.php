<?php
require_once "db_connection.php";

if(isset($_POST['submit']))
{  

$sql = "INSERT INTO customer_details (Table_number,Name,Age,Gender,Phone,Address)
     VALUES (?,?,?,?,?,?)";  

     if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssisis", $Table_number,$Name,$Age,$Gender,$Phone,$Address);//s:'string'  i:'integer'


     $Table_number =  $_REQUEST['table_no'];
     $Name =  $_REQUEST['cname'];
     $Age =  $_REQUEST['cage'];
     $Gender =  $_REQUEST['cgender'];
     $Phone =  $_REQUEST['phone_num'];
     $Address =  $_REQUEST['caddress'];
     
     if(mysqli_stmt_execute($stmt)){
        echo "Records inserted successfully.";
    } 
    else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
        
        

    }//else close

    }//if close
    
    }//main if close

// Close statement
mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($conn);
?>