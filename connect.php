<?php
     $name = $_POST['name'];
     $roll = $_POST['roll'];
     $semester = $_POST['semester'];
     $num1 = $_POST['num1'];
     $num2 = $_POST['num2'];
     $num3 = $_POST['num3'];
     $num4 = $_POST['num4'];

     //database connection
     $conn = new mysqli('localhost', 'root', '', 'test');
    //  '' -> this is for xampp password
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into mark(name,roll,semester,num1,num2,num3,num4) values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisiiii", $name, $roll, $semester, $num1, $num2, $num3, $num4);
        $stmt->execute();
        echo "Marks record added successfully!";
        $stmt->close();
        $conn->close();
    }
?>