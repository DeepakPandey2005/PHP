<?php
$sever="localhost";
$username="root";
$password="";
$dbname="workout";
$conn=mysqli_connect($sever,$username,$password,$dbname);

    $insert =false;
if(isset($_POST['submit']) && !empty($_POST['day_name']) && !empty($_POST['workout_name'])){
$day=$_POST['day_name'];
$workout=$_POST['workout_name'];

$sql="insert into plan(day_name,workout_name) values('$day','$workout');";
$result=mysqli_query($conn,$sql);
if(!$result){
    die("value insertion failed".mysqli_connect_error($conn));
}
$insert=true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #logo img{
            height: 60px;
            width:60px;
            border: 2px solid whitesmoke;
            border-radius: 50%;
            position: absolute;
            z-index: 2;
            top: 4px;
            left: 20px;
        }
        h1{
            text-align: center;
            background:rgba(0,0,0,0.4);
            position: fixed;
            top: 0;
            width: 100%;
            backdrop-filter: blur(4px);
            font-family: monospace;
            color: red;
            font-size: 40px;
            margin-bottom: 20px;
            padding: 10px;
        }
        body{
            height: 160vh;
            background-image:url(images/gymbarbel.jpg);
            background-size:cover;
            background-position:center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        form{
            display: flex;
            flex-direction: column;
        }
        label{
            text-align: center;
            color: white;
            font-size: xx-large;
            width: auto;
            margin:50px 0px ;
            display: inline;
        }
        input{
            width: 50vw;
            text-align: center;
            height: 2vh;
            outline: none;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: larger;
            background:rgba(0,0,0,0.4);
            backdrop-filter: blur(22px);
            border: 2px solid black;
            border-radius: 15px;
            color: whitesmoke;
            padding: 20px;
            margin: auto;
        }
        textarea{
            height: 15vh;
            outline: none;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: larger;
            border: 2px solid black;
            background:rgba(0,0,0,0.4);
            backdrop-filter: blur(22px);
            color: whitesmoke;
            border-radius: 20px;
            margin: 10px;
            padding: 10px;
            text-align: center;
        }
        #sub{
            height: 6vh;
            width: 6vw;
            background-color: greenyellow;
            color: black;
            padding: 10px;
        }
        #sub:hover{
            background-color: red;
            color: white;
        }table{
            margin: auto;
            width: 60vw;
            height: 12vh;
            border: 2px solid rgb(19, 2, 2);
            border-radius: 10px;
            border: 2px solid black;
            background:rgba(0,0,0,0.4);
            backdrop-filter: blur(10px);
            color: white;
            font-size:25px;
        }
        th{
            background-color: aqua;
            color: black;
            border-radius:5px
        }
        tr td{
padding: 10px;
border-radius:10px;
margin: 3px;
        }
        #msg{
            color:green;
            font-size:3rem;
            position: fixed;
            z-index: 3;
            top:80px;
            width: 100%;
            text-align:center;
        }
.products{
    margin-top: 20px;
    text-align: center;
    height: 30vh;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}
.products p{
    text-align: center;
}
.products p a {
    text-decoration: none;
    color: white;
    padding: 50px;
    font-size: 25px;
}
.products p a:hover{
    color: red;
}
footer{
    text-align: center;
    font-size: 20px;
    background-color: black;
    color: white;
    padding: 20px;
    bottom:1px;
}
     </style>   
</head>
<body>
    <div id="logo"><img src="images/gymbuddy logo.jpg" alt=""></div>
    <h1>Muscles are made at Gym not in Insta reels !</h1>
    <div class="content">
        <?php 
        if($insert==true){ echo "<p id='msg'>Workout has  added  succesfully !!!</p>";}
        ?>
        <form action="index.php" method="POST">
            <label for="title" >Day</label>

                <input type="text" name="day_name"    placeholder="enter the Day" >
                
                <label for="Desc">Workout</label>
                <textarea name="workout_name" id="desc" name="workout_name" placeholder="enter the Exercise and muscle to train"></textarea>
           
           <input type="submit" name="submit" id="sub"  value="Save">
           
           
            </form>

            <table border="1" > 
                <th>sr no</th>
                <th>Day</th>
                <th>Workout</th>
<?php
$count=0;
$sql="select * from plan;";
$result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $count++;
                echo '<tr>
                    <td>'.$count.'</td>
                    <td>'.$row['day_name'].'</td>
                    <td>'.$row['workout_name'].'</td>
                </tr>';
                }
                mysqli_close($conn);

?>
            </table>

            <div class="products">
                <p><a href="https://www.bing.com/ck/a?!&&p=490fa26a7872e878JmltdHM9MTcyMzMzNDQwMCZpZ3VpZD0yN2JjODE0Zi05ODI0LTYxODItMjYzMi05MmJlOTlkYzYwNWQmaW5zaWQ9NTI1OQ&ptn=3&ver=2&hsh=3&fclid=27bc814f-9824-6182-2632-92be99dc605d&psq=best+workout+plan&u=a1aHR0cHM6Ly93d3cubXVzY2xlYW5kc3RyZW5ndGguY29tL3dvcmtvdXQtcm91dGluZXM&ntb=1">click here to see more workout plans and diets</a></p>
                <p><a href="https://www.bing.com/ck/a?!&&p=7f23730bac9b7fd1JmltdHM9MTcyMzMzNDQwMCZpZ3VpZD0yN2JjODE0Zi05ODI0LTYxODItMjYzMi05MmJlOTlkYzYwNWQmaW5zaWQ9NTI4NA&ptn=3&ver=2&hsh=3&fclid=27bc814f-9824-6182-2632-92be99dc605d&psq=best+supplements+for+muscle+growth+with+low+price&u=a1aHR0cHM6Ly9iYXJiZW5kLmNvbS9iZXN0LXN1cHBsZW1lbnRzLWZvci1tdXNjbGUtZ3Jvd3RoLw&ntb=1">Need protein ? Buy best supplements at lowest cost from here</a></p>
            </div>
            </div>
            <footer>
                &copy;Copyright 2024 All rights are reserved.
            </footer>
            </body>
</html>