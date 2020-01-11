<?php

use yii\helpers\Html;

$this->title = 'Comments';
use yii\bootstrap\ActiveForm;
?>
<head>
<link href="/Shag/backend/views/site/my.css" rel="stylesheet">
</head>

<div class="theme-theme">

<?php




$hostname = 'localhost';
$user     = 'user';
$password = 'user';
$db_name  = 'php';

$mysql = mysqli_connect($hostname, $user, $password, $db_name);
if (!$mysql) {
    echo "ERROR DB";
} else {
	
	$sql_q1="SELECT username from user LEFT JOIN (theme) on (theme.user_id=user.id)";
	$sql_q2="SELECT comment.text, user.username, comment.another_com_id from comment LEFT JOIN (theme,user) on (comment.user_id=user.id and comment.theme_id=theme.id )WHERE comment.theme_id=" . $model['ID'] ;
    $sql_query = "SELECT * FROM theme WHERE ID = ". $model['ID'] .";";
    $result    = mysqli_query($mysql, $sql_query);
$name    = mysqli_query($mysql, $sql_q1);
$name1= mysqli_fetch_array($name) ;
$comment= mysqli_query($mysql, $sql_q2);
    $error = mysqli_error($mysql);
    if ($error == '') {

      
        while ($product = mysqli_fetch_array($result)) {
			echo"<div class='theme'> ";
        echo "from:" .$name1['username'] ;
            echo "<h1>" . $product['theme_name'] . '</h1><br>';
            echo "<p>" . $product['text'] . "</p></div>";
        }
		 while ($product = mysqli_fetch_array($comment)) {
			
			echo"<div class='theme'> ";
        echo "from:" .$product['username'] ;
           
            echo "<p>" . $product['text'] . "</p></div>";
        }
    } else {
        echo $error;
    }
}

    mysqli_close($mysql);
echo "<a class='btn btn-success' href='/Shag/backend/web/index.php/comment/create?theme_id=" . $model['ID']."'>create comment</a>";

?>
</div>

