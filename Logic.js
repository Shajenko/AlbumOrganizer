// JavaScript Document
	

var SongList = [{ name: "Ring of Fire", minutes: 3, seconds: 30, bpm: 76 },
				 { name: "Singing in the Rain", minutes: 2, seconds: 21, bpm:65 },
				 { name: "Putting on the Ritz", minutes: 4, seconds: 11, bpm:81 }];

function initialize()
{
    "use strict";
    writeSongs();
    return;
}

function defaultToolFunc(tName)
{
    if(tName == "SongList")
    {
        writeSongs();
        return;
    }
}


function openTool(evt, toolName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(toolName).style.display = "block";
    evt.currentTarget.className += " active";

    // Run the default function for the tool
    defaultToolFunc(toolName);
}

function Delete(index)
{
    SongList.splice(index, 1);
    writeSongs();
}

function AddSong()
{
    var sname, timeMin, timeSec, beats, newSong;

    sname = document.getElementById("SongName").value;
    timeMin = parseInt(document.getElementById("SongMin").value);
    if (!Number.isInteger(timeMin))
    {
        alert("Error: Please enter an integer for the number of minutes.");
        document.getElementById("SongMin").value = 0;
        return;
    }

    timeSec = parseInt(document.getElementById("SongSec").value);
    if (!Number.isInteger(timeSec)) {
        alert("Error: Please enter an integer for the number of seconds.");
        document.getElementById("SongSec").value = 0;
        return;
    }

    beats = parseInt(document.getElementById("SongBPM").value);
    if (!Number.isInteger(bpm)) {
        alert("Error: Please enter an integer for the number of seconds.");
        document.getElementById("SongBPM").value = 0;
        return;
    }


    newSong = { name: sname, minutes: timeMin, seconds: timeSec, bpm: beats };

    SongList.push(newSong);
    writeSongs();
}

function writeSongs()
{
    var outputString = "";


    outputString += "<table width=\"100%\">"

    outputString += "<tr>";
    outputString += "<td width=\"20%\"> Song Name </td>";
    outputString += "<td width=\"10%\" align=\"center\"> Minutes</td > ";
    outputString += "<td width=\"10%\" align=\"center\"> Seconds</td>";
    outputString += "<td width=\"10%\" align=\"center\"> Beats per Minute</td>";
    outputString += "<td> Delete Entry</td>";
    outputString += "</tr>";



    for (i = 0; i < SongList.length; i++) {
        outputString += "<tr>";
        outputString += "<td width=\"20%\">" + SongList[i].name + "</td>";
        outputString += "<td align=\"center\">" + SongList[i].minutes + "</td > ";
        outputString += "<td align=\"center\">" + SongList[i].seconds + "</textarea>" + "</td>";
        outputString += "<td align=\"center\">" + SongList[i].bpm + "</td > ";
        outputString += "<td>" + "<button name=\"" + SongList[i].name + "Delete\" onclick=\"Delete(" + i + ")\">X</button>" + "</td>";
        outputString += "</tr>";
    }
    outputString += "</table>";
    document.getElementById("SongList").innerHTML = outputString;
}
