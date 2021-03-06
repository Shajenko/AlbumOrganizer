<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Album Organizer - Contact Page</title>


	<link rel="stylesheet" type="text/css" href="MainPage.css">

</head>
<body>
	
	<table align="center" width="100%" xcellspacing="5" cellpadding="5px">
        <tbody>
            <tr>
                <td width="20%"><a class="navbar-brand" href="./Index.html">Album Organizer</a></td>
                <td width="50%" align="right"><a href="./Index.html">Home</a> | <a href="./Songs.php">Songs</a> | <a href="./About.html">About</a> | <a href="./Contact.html">Contact</a></td>
            </tr>
        </tbody>
    </table>

    <br>


    <div id="TitleContent" style="text-align: center">
        <a href="./Contact.html">
            <em>Contact Page</em>
        </a>
        <br />
        <img src="./record.png" alt="vinyl record" width="200" height="160" /> <br />
        <img src="./divider.png" alt="" width="500" height="40" />
    </div>

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
    $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email_address']);

     

    // attempt insert query execution
    $sql = "INSERT INTO persons (first_name, last_name, email_address) VALUES ('$first_name', '$last_name', '$email')";

    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($link);
    }

     

    // close connection
    mysqli_close($link);

    ?>

	    <form action="Insert.php" method="post">
        <p>
            <label for="firstName">First Name:</label>
            <input type="text" name="first_name" id="firstName">
        </p>
        <p>
            <label for="lastName">Last Name:</label>
            <input type="text" name="last_name" id="lastName">
        </p>
        <p>
            <label for="emailAddress">Email Address:</label>
            <input type="text" name="email" id="emailAddress">
        </p>
        <input type="submit" value="Submit">
    </form>


</body>
</html>