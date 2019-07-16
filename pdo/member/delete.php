<?php
    require_once('../../pdo/database/database.php');

    function deleteMember()
    {
        $bdd = new Database();
        $bdd->connexion();
        $id = $_GET['id'];
        $query = $bdd->getBdd()->prepare($bdd->deleteMemberId());
        $array = array(
            'id' => $id,
        );
        $query->execute($array);
        $query->closeCursor();
        header('location: ./liste.php');
    }
    deleteMember();