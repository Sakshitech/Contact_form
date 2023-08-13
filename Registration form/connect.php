<?php
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Database Connection
$conn = new mysqli('localhost','root','','Registration_form');
if($conn->connect_error){
    die('Connection failed :'.$conn->connect_error );

}else{
    $stmt = $conn->prepare(" insert into contact_form(fullName , email, subject, message, number) values(?,?,?,?,?)");
    $stmt->bind_param("ssssi", $fullName, $email, $subject, $message, $number)
    $stmt->execute();
    echo "registration successful";
    $stmt->close();
    $conn->close();
}

?>