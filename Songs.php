<!DOCTYPE html>

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
            <table align="left" style="border:none">
                <tr>
                    <td>Add Title to List</td>
                </tr>
                <tr>
                    <td width="27%" valign="top">
                        Song Name
                    </td>
                    <td width="5%" valign="top">
                        Minutes
                    </td>
                    <td width="5%" valign="top">
                        Seconds
                    </td>
                    <td width="20%" valign="top">
                        Beats Per Minute
                    </td>
                    <td> <div></div></td>
                </tr>
                <tr>
                    <td valign="top">
                        <textarea id="SongName" rows="1" cols="25"></textarea>
                    </td>
                    <td valign="top">
                        <textarea id="SongMin" rows="1" cols="4"></textarea>
                    </td>
                    <td valign="top">
                        <textarea id="SongSec" rows="1" cols="5"></textarea>
                    </td>
                    <td valign="top">
                        <textarea id="SongBPM" rows="1" cols="13"></textarea>
                    </td>
                    <td valign="top">
                        <button id="AddSong" class="StdButton" onclick="AddSong()">Add Song</button>
                    </td>
                </tr>
            </table>
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
				<td> Delete Entry</td>
				</tr>


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