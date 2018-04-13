<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Song Added</title>
</head>
<body>

    <?php
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    $link = mysqli_connect("localhost", "root", "rootroot", "mydb");

    // Check connection
    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
	else {
		echo $link->host_info . "<br/>";
		}

     

    // Escape user inputs for security
    $song_name = mysqli_real_escape_string($link, $_REQUEST['songName']);
    $minutes = mysqli_real_escape_string($link, $_REQUEST['songMinutes']);
    $seconds = mysqli_real_escape_string($link, $_REQUEST['songSeconds']);
	$bpm = mysqli_real_escape_string($link, $_REQUEST['beats']);

     

    // attempt insert query execution
    $sql = "INSERT INTO songs (song_name, minutes, seconds, bpm) VALUES ('$song_name', '$minutes', '$seconds', '$bpm')";

    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }

     

    // close connection
    mysqli_close($link);

    ?>


</body>
</html>