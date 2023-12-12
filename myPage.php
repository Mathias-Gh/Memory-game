<?php
    require_once 'utils/common.php';
    require_once SITE_ROOT . 'utils/database.php';
  
    if(!empty($_SESSION['userId'])){$IdUser = $_SESSION['userId'];}
    if (isset($_POST['messageInput'])) {
        $ChatMessage = $_POST['messageInput'];
        $pdo = connectToDbAndGetPdo();
        $pdoStatement = $pdo->prepare("INSERT INTO `Message` (IdGame, IdUser, Chat)
        VALUES (1,$IdUser,'$ChatMessage');");
        $pdoStatement->execute();
        // $db->insert('insert into ') //etc...
    }
?>