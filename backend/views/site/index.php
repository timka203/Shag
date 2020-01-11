<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Themes';
?>
<head>
<link href="/Shag/backend/views/site/my.css" rel="stylesheet">
</head>
<div class="site-index">
<a class='btn btn-success' href='/Shag/backend/web/index.php/theme/create'>create theme</a>

 <div class="space4"></div>
<?php




$hostname = 'localhost';
$user     = 'user';
$password = 'user';
$db_name  = 'php';

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
            echo "<h1>" . $product['theme_name'] . '</h1><br>';
            echo "<p>" . $product['text'] . "</p></div>";
           echo "<div class='theme-theme'>";
		    echo " <a class='btn btn-success' href='/Shag/backend/web/index.php/theme/theme?id=". $product['ID'] . "'" ." > Go to Theme </a>" . "</div>";
		
		  
        }
    } else {
        echo $error;
    }
}
    mysqli_close($mysql);

?>
</div>
