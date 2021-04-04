<?php
    // einbinden der Headerdatei -> head & navbar
    $page_title = 'Home';
    $page_stylesheets = array();
    include_once '../templates/header.php';

    // prüfe ob Benutzer angemeldet ist
    if(!$_SESSION['auth_user']){
        header('location: login.php');
        exit();
    }
?>



<?php
    include_once '../templates/footer.php';
?>