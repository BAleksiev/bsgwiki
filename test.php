<?php
session_start();

if(!$_SESSION['smetka'])
    $_SESSION['smetka'] = 100;

if($_POST) {
    $cvqt = rand(1,2);
    
    if($cvqt == $_POST['cvqt']) {
        $_SESSION['smetka'] += $_POST['zalog']*2;
        echo 'spe4eli';
    } else {
        $_SESSION['smetka'] -= $_POST['zalog'];
        echo 'zagubi';
    }
}

echo '<br/>'.$_SESSION['smetka'];
?>
<form action="test.php" method="POST">
    <input type="text" name="cvqt" placeholder="cvqt"/> - 
    <input type="text" name="zalog" placeholder="zalog"/>
    <input type="submit" name="submit" value="varti" />
</form>