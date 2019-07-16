<?php

function listAllMembers()
{
    $bdd = new Database();
    $bdd->connexion();
    $query = $bdd->getBdd()->query($bdd->selectAllMembers());

    echo '<table>';
        echo '<tr>';
            echo '<th>' . "id" . '</th>';
            echo '<th>' . "username" . '</th>';
            echo '<th>' . "email" . '</th>';
            echo '<th>' . "password" . '</th>';
            echo '<th>' . "admin" . '</th>';
            echo '<th>' . "creation date" . '</th>';
            echo '<th>' . "update date" . '</th>';
        echo '</tr>';

    while ($data = $query->fetch())
    {
        echo '<tr>';
            echo '<th>'.$data['id'].'</th>';
            echo '<th>'.$data['username'].'</th>'; 
            echo '<th>'.$data['email'].'</th>'; 
            echo '<th>'.$data['password'].'</th>';
            echo '<th>'.$data['admin'].'</th>'; 
            echo '<th>'.$data['created_at'].'</th>'; 
            echo '<th>'.$data['updated_at'].'</th>'; 
            echo '<th>'.'<a id="link_update_member" href="edit.php?id='.$data['id'].'">'."Edit".'</a>'.'</th>'; 
            echo '<th>'.'<a id="link_delete" href="member/delete.php?id='.$data['id'].'">'."Remove".'</a>'.'</th>';
        echo '</tr>';
    }

    echo '</table>';
    $query->closeCursor();
}