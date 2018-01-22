<?php

$ok = move_uploaded_file($_FILES['fileSent']['tmp_name'],"./files/".$_FILES['fileSent']['name']);
if (!$ok){
    echo("<h1>File non caricato</h1>");
} else {
    echo("<h2>Il file ".$_FILES['fileSent']['name']." è stato caricato con successo</h2><br><a href='index.html'>Ritorna alla homepage</a>");
}

