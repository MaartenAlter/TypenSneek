<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";


// Create connection
try {
    $conn = new PDO('mysql:host=localhost;dbname=typensneek', $username);
    // set the PDO error mode to exception 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $chat_id = $_POST["chat_message_id"];
    $to_user_id = $_POST["to_user_id"];
    $from_user_id = $_POST["from_user_id"];
    $message = $_POST["chat_message"];

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO 
    chat_message (
        chat_message_id,
        to_user_id,
        from_user_id,
        chat_message,
        TIMESTAMP)
    VALUES(
        :chat_message_id,
        :to_user_id,
        :from_user_id,
        :chat_message,
        CURRENT_TIME()
    )");

    $stmt->bindParam(':chat_message_id', $chat_id);
    $stmt->bindParam(':to_user_id', $to_user_id);
    $stmt->bindParam(':from_user_id', $from_user_id);
    $stmt->bindParam(':chat_message', $message);

    $stmt->execute();

    //change to whatever the chat page is 
    header("Location: coachchat.php");
    exit(); 

    
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>