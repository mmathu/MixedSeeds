<?php
require 'dbConnection.php';

function outputArticles($Genre){
    global $conn;
    $sqlGetArticles = "SELECT Article_Title, Article_Link FROM articleinformation WHERE Article_Genre='$Genre' ";
    $resultGetArticles = $conn->query($sqlGetArticles);

    if($resultGetArticles->num_rows > 0){
        while($articleInfo = $resultGetArticles->fetch_assoc()){
            $htmlLink = $articleInfo["Article_Link"];
            $htmlTitle = $articleInfo["Article_Title"];

           // echo '<pre>';
            echo"<div class='contentBox'>";
            echo"<a href='$htmlLink'>";

            if("$htmlTitle" != '' ){
                echo'<h3>';
                echo "$htmlTitle";
                echo'</h3>';
            }
            else{
                //If no title is found - a the link is displayed instead
                echo '<p>';
                echo "$htmlLink";
                echo '</p>';
            }

            echo'</a>';
            echo"</div>";
           // echo'</pre>';


        }
    }
}