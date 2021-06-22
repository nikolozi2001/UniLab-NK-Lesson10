<?php


$description = $_POST['description'];
$subject = $_POST['subject'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];

//Database connection

$conn = new mysqli('localhost', 'root', "", 'contact');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into form(description, subject, fullname, email) values(?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $description, $subject, $fullname, $email);
    $execval = $stmt->execute();
    echo $execval;
    echo "Form sent successfully...";
    $stmt->close();
    $conn->close();
}

?>