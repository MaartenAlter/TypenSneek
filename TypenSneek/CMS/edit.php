<?php

$databaseHost = 'localhost';
$databaseName = 'typensneek';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE cms SET NamePage='$name',Title='$title',Text='$text' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: read.php");
}
?>

<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM cms WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data['NamePage'];
    $title = $user_data['Title'];
    $text = $user_data['Text'];
}
?>
<!doctype html>
<html lang="nl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<a href="read.php">Terug</a>
<br/><br/>

<form name="update_user" method="post" action="edit.php" style="width: 40%; float: left; margin: 2% ;">
    
            <div class="form-group">
                <label for="exampleInputEmail1">Naam Pagina</label>
                <input type="text" class="form-control" name="name" readonly value=<?php echo $name; ?>>
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Titel</label>
                <input type="text" class="form-control" name="title" value=<?php echo $title; ?>>
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tekst</label>
                <textarea style="width: 100%; height: 500%" type="text"  name="text"><?php echo $text; ?></textarea>
                
            </div>
            
        
        
           
            
        
        
            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            <input type="submit" name="update" value="Wijzigen" class="btn btn-primary">
        
</form>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
