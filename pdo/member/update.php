<?php
    require_once('../../pdo/database/database.php');

    function updateInfoMember()
    {
        $bdd = new Database();
        $bdd->connexion();
        $id = $_GET['id'];
        $username = $_POST['username_update'];
        $email = $_POST['email_update'];
        $password = $_POST['password_update'];
        $password_confirmation = $_POST['password_confirmation_update'];

        $query = $bdd->getBdd()->prepare($bdd->updateMemberId());
        $array = array (
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password_confirmation
        );
        $query->execute($array);
        $query->closeCursor();

        if (isset($_POST['form_update']))
            updateInfoMember();
    }