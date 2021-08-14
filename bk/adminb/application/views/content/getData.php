<?php

// configuration
include 'config.php';

$row = $_POST['row'];
$rowperpage = 20;

// selecting posts
$query = 'SELECT * FROM images2 limit '.$row.','.$rowperpage;
$result = mysqli_query($con,$query);

$html = '';

while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $title = $row['img'];

    // Creating HTML structure
    $html .= '<div id="post_'.$id.'" class="post">';
    $html .= '<h1>'.$title.'</h1>';
    $html .= '</div>';

}

echo $html;
