﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Album Organizer - Songs</title>

	<script language="javascript" src="Logic.js"></script>
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
        <a href="./Index.html">
            <em>Song Titles</em>
        </a>
        <br />
        <img src="./record.png" alt="vinyl record" width="200" height="160" /> <br />
        <img src="./divider.png" alt="" width="500" height="40"/>
    </div>

    <br>

    <!-- Tab Links-->
    <div class="tab">
        <button class="tablinks" onclick="openTool(event, 'FullSongList')" id="defaultOpen">Song Titles </button>
    </div>

    <!-- Tab Content-->
    <div id="FullSongList" class="tabcontent">
        <h3>Song Titles</h3>

        <div name="TitleAddDiv" style="vertical-align: top">
			<p>Add Title to List</p>
            <form action="NewSong.php" method="post">
				<p>
					<label for="song_name">Song Name:</label>
					<input type="text" name="songName" id="songName">
				</p>
				<p>
					<label for="minutes">Minutes:</label>
					<input type="int" name="songMinutes" id="minutes">
				</p>
				<p>
					<label for="seconds">Seconds:</label>
					<input type="int" name="songSeconds" id="seconds">
				</p>
				<p>
					<label for="beats">Beats Per Minute:</label>
					<input type="int" name="beats" id="beats">
				</p>
				<input type="submit" value="Submit">
			</form>
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
		//echo $link->host_info . "<br/>";
		}



	// Get records from database, put in div "ListOfSongs
	// Prepare a select statement
	$sql = 'SELECT * FROM songs';
		
	$query = mysqli_query($link, $sql);

	if (!$query) {
		die ('SQL Error: ' . mysqli_error($link));
	}


	// close connection
    mysqli_close($link);

?>



        <div id="ListOfSongs" style="vertical-align: top">
			<table width=\"100%\">
				<th>
					<td width=\"27%\"> Song Name </td>
					<td width=\"5%\" align=\"center\">Minutes</td > 
					<td width=\"5%\" align=\"center\">Seconds</td>
					<td width=\"20%\" align=\"center\">Beats per Minute</td>
				</th>


				<?php
				$no 	= 1;
				while ($row = mysqli_fetch_array($query))
				{
					$id  = $row['id'];
					echo '<tr>
							<td>'.$row['song_name'].'</td>
							<td>'.$row['minutes'].'</td>
							<td>'.$row['seconds'].'</td>
							<td>'.$row['bpm'].'</td>
						</tr>';
					$no++;
				}?>

			</table>

        </div>

</div>

    <script>
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>
</html>