<?php 
require_once('connect.php');
$json_file = file_get_contents('test-assignment.json');

$jfo = json_decode($json_file);
// read the title value
// copy the posts array to a php var
$events = $jfo;
// listing posts
foreach ($events as $event) {
   $impot = $pdo->prepare("INSERT INTO `sports_poll`.`events` VALUES ($event->id, '$event->objectId', '$event->sport', '$event->name', '$event->homeName', '$event->awayName', '$event->group', '$event->state', '$event->country', '$event->createdAt')");
   $impot->execute();
   $impot->closeCursor();
   }
   return "b1"
?>

