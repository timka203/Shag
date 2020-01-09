<?php

/* @var $this yii\web\View */

$this->title = 'Themes';
?>
<head>
<link href="/Shag/backend/views/site/my.css" rel="stylesheet">
</head>
<div class="site-index">

<?php




$hostname = 'localhost';
$user     = 'user';
$password = 'user';
$db_name  = 'advanced_203';

$mysql = mysqli_connect($hostname, $user, $password, $db_name);
if (!$mysql) {
    echo "ERROR DB";
} else {
    $sql_query = "SELECT * FROM theme;";
    $result    = mysqli_query($mysql, $sql_query);

    $error = mysqli_error($mysql);
    if ($error == '') {

       
        while ($product = mysqli_fetch_array($result)) {
			echo"<div class='theme'> ";
            echo "<tr>";
            echo "<td><h1>" . $product['theme_name'] . '</h1></td><br>';
            echo "<td>" . $product['text'] . '</td>';
            echo "</tr>";
			echo "</div>";
        }
        echo "</table>";
    } else {
        echo $error;
    }
}

    mysqli_close($mysql);

?>
</div>
