<?php
require("utility.php");

$servername = "localhost";
$username = "root";
$password = "qwerty";

function showTable($table,$conn)
{
    $sql = "select * from ".$table;
    $data = $conn->query($sql);
    foreach ($data as $key) {
        echo $key["id"] . " " . $key["fname"] ." ".$key["fname"]. " ".$key["age"]." " . $key["mobile"] ." ".$key["email"]."\n";
    }
}

function delete($id,$conn)
{
    $sql = "delete from user where id=".$id;
    $conn->query($sql);
    echo "id ".$id." deleted\n";
}

function insert($conn)
{
    echo "first name\n";
    $fname = trim(fgets(STDIN));
    echo "last name";
    $lname = trim(fgets(STDIN));
    echo "age\n";
    $age = getInt();
    $age = validInt($age,0,99);
    echo "mobile\n";
    $mobile = getInt();
    //$mobile = validInt($mobile,999999999,9999999999);
    echo "email\n";
    $email = trim(fgets(STDIN));

    $sql = "insert into user(fname,lname,age,mobile,email)
    values
    ('".$fname."','".$lname."',".$age.",".$mobile.",'".$email."')";
    
    if ($conn->query($sql)) {
        echo "done\n";
    } else {
        echo "sorry\n";
    }
}
try {
    $conn = new PDO("mysql:host=$servername;dbname=api", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully\n";
    

    //showTable("user",$conn);
    
    
    insert($conn);
    showTable("user",$conn);


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


