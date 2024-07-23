<?php
$sever="localhost";
$username="root";
$password="";
$dbname="notes";
$conn=mysqli_connect($sever,$username,$password,$dbname);

    $insert =false;
if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['desc'])){
$title=$_POST['title'];
$desc=$_POST['desc'];

$sql="insert into note (title,description) values('$title','$desc');";
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
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        h1{
            text-align: center;
            background-color: black;
            color: white;
            margin-bottom: 20px;
        }
        body{
            height: 40vh;
        }
        form{
            display: flex;
            flex-direction: column;
        }
        label{
            text-align: center;
            background-color:rgb(137, 161, 176);
            color: black;
            font-size: x-large;
        }
        input{
            width: 50vw;
            height: 2vh;
            outline: none;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: larger;
            border: 2px solid black;
            border-radius: 15px;
            margin: 10px;
            padding: 20px;
        }
        textarea{
            height: 15vh;
            outline: none;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: larger;
            border: 2px solid black;
            border-radius: 20px;
            margin: 10px;
            padding: 10px;
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
            border-radius: 15px;
        }
        th{
            background-color: aqua;
            border-radius:15px
        }
        tr td{
padding: 10px;
border-radius:10px;
margin: 3px;
        }
        #msg{
            color:green;
            font-size:3rem;
        }

     </style>   
</head>
<body><h1>TODO List </h1>
    <div class="content">
        <?php 
        if($insert==true){ echo "<p id='msg'>Notes has  inserted  succesfully !!!</p>";}
        ?>
        <form action="index.php" method="POST">
            <label for="title" >Title</label>

                <input type="text" name="title"    placeholder="enter the title" >
                
                <label for="Desc">Description</label>
                <textarea name="desc" id="desc" name="desc" placeholder="enter the Description"></textarea>
           
           <input type="submit" name="submit" id="sub">
           
           
            </form>

            <table border="1" > 
                <th>sr no</th>
                <th>title</th>
                <th>Description</th>
<?php
$count=0;
$sql="select * from note;";
$result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $count++;
                echo '<tr>
                    <td>'.$count.'</td>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['description'].'</td>
                </tr>';
                }
                mysqli_close($conn);

?>
            </table>
            </div>
</body>
</html>