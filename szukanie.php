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
        <a class="github-logo" href="https://github.com/3ti-2020/crud-wiele-do-wielu-kuba-nocon">
    <img class="github-logo" src="github.png" alt="github.com - odnośnik">
    </a>
         <a class="logo" href="https://musicblogapp.herokuapp.com/"><h1 class="titlesite">Music Information Blog</h1></a>   
        </div>
        <div class="main">
            <?php
                $conn = new mysqli("remotemysql.com", "Q5ce6IILxv", "d8rRn6imdt", "Q5ce6IILxv");

                $result1 = $conn->query("SELECT DISTINCT * FROM post JOIN post_tag ON post.id_post=post_tag.id_post JOIN tag ON post_tag.id_tag=tag.id_tag WHERE tag.tagname ='".$_POST['szukaj_tag']."'");
                while($row1 = $result1->fetch_assoc() ){
                    echo("<article class='post'>");
                    echo("<h2 class='tytul'>".$row1['tytul']."</h2>");
                    echo("<img src='".$row1['foto']."' class='zdj'>");
                    echo("<p class='tresc'>");
                    echo($row1['tresc']);
                    echo("</p>");
                    echo("<div class='tagi'>");
                    echo("<h3 class='tag'>");
                        $result2 = $conn->query("SELECT * FROM tag JOIN post_tag ON tag.id_tag=post_tag.id_tag WHERE post_tag.id_post='".$row1['id_post']."'");
                        while($row2 = $result2->fetch_assoc()){
                            echo("<form action='szukanie.php' method='post' class='form_tag'>
                                 <input type='submit' class='in_tag' name='szukaj_tag' value='".$row2['tagname']."'>
                                </form>");
                        }
                        
                    echo("</h3>");
                    echo("</div>");
                    echo("</article>");
                }


            ?>  
        </div>
    </div>
</body>
</html>
