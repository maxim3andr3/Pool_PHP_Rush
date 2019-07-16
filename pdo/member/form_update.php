<?php
    function displayInfoMember()
    {
        $bdd = new Database();
        $bdd->connexion();
        $id = $_GET['id'];

        $query = $bdd->getBdd()->prepare($bdd->selectMemberId());
        $array = array(
            'id' => $id
        );
        $query->execute($array);

        if ($data = $query->fetch())
        {
            echo '<form action="member/update.php?id='.$data['id'].'" method="post">';
                echo '<label for="username_update">Username </label><input type="text" name="username_update" value="'.$data['username'].'" required/>'.'</br>';
                echo '<label for="email_update">Email </label><input type="email" name="email_update" value="'.$data['email'].'" required/>'.'</br>';
                echo '<label for="password_update">Password </label><input type="password" name="password_update" required/>'.'</br>';
                echo '<label for="password_confirmation_update">Password confirmation </label><input type="password" name="password_confirmation_update" required/>'.'</br>';
                echo 'input type="submit" name="submit" value="Submit"';
            echo '</form>';
        }
        else
            echo '<p>'."Nothing found.".'</p>';
        
        $query->closeCursor();
    }