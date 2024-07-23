<?php 
$insert=false;
if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['email'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];
    $reason=$_POST['desc'];


    $servername="localhost";
    $username="root";
    $password="";
    $dbname="registration";

    $conn=mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        die("unable to connect the serever".mysql_connect_error());
    }


$sql="insert into trip (name,email,age,phone,reason) values('$name','$email','$age','$phone','$reason');";
$result=mysqli_query($conn,$sql);

if(!$result){
    die("unable to insert the data in the database because".mysqli_connect_error($conn));
}
$insert=true;
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply form</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        body{
            height: 130vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-attachment: scroll;
            background-image: url(images/vpm.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            

        }.content{
            background: rgba(0, 0, 0, 0.2);
            color:whitesmoke;
            width: 100%;
            backdrop-filter: blur(5px);
            position:fixed;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 10vh;
            border-radius: 10px;
            border: 2px solid snow;
            padding: 10px;
            text-align: center;
        }
        form{
           margin-top: 130px;
            display: flex;
            flex-direction: column;
            background-color: whitesmoke;
            padding: 35px;
            border: 2px solid black;
            border-radius: 15px;
            align-items: center;
            flex-direction: column;


        }
        input,#desc{
            width: 100%;
            border: 2px solid black;
            height: 4;
            padding: 15px;
            margin: 7px;
            font-size: x-large;
            font-family:monospace;
            border-radius: 10px;

        }
        label{
            font-size: xx-large;
            text-decoration:underline ;
            text-transform: capitalize;
            color: rgb(97, 92, 92)
        }
        #desc{
            height: 25vh;
        }
        #submsg{
            color: yellowgreen;
            background-color: black;
            font-size: x-large;
        }
#btn{
    background-color: rgb(71, 235, 71);
    color: black;
    border: 2px solid black;
    border-radius: 10px;
    width: 220px;
    height: 50px;
    font-size: xx-large;
}#btn:hover{
    background-color: red;
    color:white;
}
    </style>
</head>
<body >
    <div class="content"><h1>VPM RZ SHAH Trip to silicon valley !!</h1>
    <p>get a chance to meet with mark zukerburk</p>
    
  <?php  if($insert==true){echo "<p id='submsg'>your form is submitted succesfulluy... !</p>";} ?></div>
        <form action="index.php" method="POST" >
            <label for="name">Name</label>
<input type="text" name="name" placeholder="enter your name">
<label for="email">email</label>
<input type="email" name="email" placeholder="enter your email">
<label for="age">age</label>
<input type="age" name="age" placeholder="enter your age">
<label for="phone">phone</label>
<input type="phone" name="phone" placeholder="enter your mob number">
<label for="desc">FEEDBACK</label>
<textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter your other reasons"></textarea>

<button id="btn" name="submit">submit</button>
        </form>
</body>
<script>
</script>
</html>