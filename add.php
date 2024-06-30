<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>add result</title>
        <style>
            body{
                padding:40px;
                background: linear-gradient(to right, gray, lightgray); /* Linear gradient from left to right */
            height: 100vh; /* Full viewport height */
            font-family: Arial, sans-serif; /* Sets a default font */
            }
            h1{
                text-align:center;
                font-size: 3rem;
            }
            form{
                max-width:600px;
                margin:0 auto;
                padding:20px;
            }
            label{
                display:block;
              
            }
            input[type="text"],
            input[type="number"]
            {
                padding:10px;
                width:100%;
                margin-bottom:20px;
            }
            input[type="submit"]{
                padding:10px;
            }
            .btn{
                margin:6px;
        padding:12px;
        background-color:black;
        color:white;
        border-radius:4px;
        cursor: pointer;
        border: 0;
        width: 100%;
        margin:auto;
        
        }
        .btn:hover{
        color: white;
        background-color: darkblue;
        
       }
       .btn_container{
        display:flex;
        justify-content: center;
        align-items:center;
        text-align:center;
       }
           
        </style>
</head>
<body>
    <h1>Add student Result</h1>
     <?php
    // database connection
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $connection=mysqli_connect("localhost","root","","result-process");
        // $connection=mysqli_connect("localhost","root","","test");
        if(!$connection){
            die("connection failed:".mysqli_connect_error());
        }
        // retrive from data
        $name=mysqli_real_escape_string($connection,$_POST['name']);
        $roll=mysqli_real_escape_string($connection,$_POST['roll']);
        $semester=mysqli_real_escape_string($connection,$_POST['semester']);
        $physics=mysqli_real_escape_string($connection,$_POST['physics']);
        $software=mysqli_real_escape_string($connection,$_POST['software']);
        $networking=mysqli_real_escape_string($connection,$_POST['networking']);
        $toc=mysqli_real_escape_string($connection,$_POST['toc']);
        $embedded=mysqli_real_escape_string($connection,$_POST['embedded']);
        //insert into database
        $sql="INSERT INTO student(name,roll,semester,physics,software,networking,toc,embedded)
        VALUES('$name','$roll','$semester','$physics','$software','$networking','$toc','$embedded')";
        if(mysqli_query($connection,$sql)){
            echo" <p>STUDENT ADD SUCESSFULLY</p>";

        }
        else{
echo "<p>Error:'.mysqli_error($connection)'</p>"; }
        mysqli_close($connection);
    }
    ?>
    <form action="add.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="roll">Roll:</label>
        <input type="number" id="roll" name="roll" required>

        <label for="semester">Semester:</label>
        <input type="number" id="semester" name="semester" required>

        <label for="physics">physics:</label>
        <input type="number" id="physics" name="physics" required>

        <label for="software">Software:</label>
        <input type="number" id="software" name="software" required>

        <label for="networking">networking:</label>
        <input type="number" id="networking" name="networking" required>

        <label for="toc">Theory of Computation:</label>
        <input type="number" id="toc" name="toc" required>

        <label for="embedded">Embedded:</label>
        <input type="number" id="embedded" name="embedded" required>

        <div class="btn_container">
        <input class="btn" type="submit" value="Save Now">
        </div>
        


    </form>
</body>
</html>