<?php

require_once('models/Movie.php');

//cargar modelo
$db = Connection::connect();

$query = 'SELECT * FROM films;';

$result = $db->query($query);

if($result){
    while($row=$result->fetch_assoc()){
        $movies[] = new Movie($row['id'], $row['title'], $row['director'], $row['poster'], $row['year']);
    }
}
//comprobar variables

//operar

// cargar vista
 if(isset($_GET['id'])){
    $query1 = 'SELECT * FROM films WHERE id='.$_GET["id"].';';

$result1 = $db->query($query1);

if($result1){
    $info = false;
    if($row=$result1->fetch_assoc()){
        $movie = new Movie($row['id'], $row['title'], $row['director'], $row['poster'], $row['year']);
    }else{
        $info = "No existe la pelicula";
    }
    require_once 'views/detailView.phtml';
}
    
 }else{
    require_once 'views/mainView.phtml';
 }
