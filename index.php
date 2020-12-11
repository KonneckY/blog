<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Info Blog</title>
    <link rel="stylesheet" href="styleBLOG.css">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
</head>
<body>
    
<body>
    <div class="container">
        <div class="head">
            <h1 class="titlesite">Music Information Blog</h1>     
        </div>
        <div class="main">
            <?php
                $conn = new mysqli("remotemysql.com", "Q5ce6IILxv", "d8rRn6imdt", "Q5ce6IILxv");

                $result1 = $conn->query("SELECT * FROM post");
                while($row1 = $result1->fetch_assoc() ){
                    echo("<article class='post'>");
                    echo("<h2 class='tytul'>".$row1['tytul']."</h2>");
                    echo("<img src='".$row1['foto']."' class='zdj'>");
                    echo("<p class='tresc'>");
                    echo($row1['tresc']);
                    echo("</p>");
                    echo("<h3 class='tag'>");
                        $result2 = $conn->query("SELECT * FROM tag JOIN post_tag ON tag.id_tag=post_tag.id_tag WHERE post_tag.id_post=".$row1['id_post']);
                        while($row2 = $result2->fetch_assoc()){
                            echo(" ".$row2['tagname']);
                        }
                    echo("</h3>");
                    echo("</article>");
                }


            ?>  
        </div>
    </div>
</body>
</html>