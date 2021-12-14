<?php
    $categories = $response["data"]["categories"];
    $sujets = $response["data"]["sujets"];
    $messages = $response["data"]["messages"];
?>
<section class="admin">
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom de Catégorie</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        foreach($categories as $cat)
        {
        ?>

        <tr>
            <td><?= $cat->getId() ?></td>
            <td><?= $cat->getNom() ?></td>
            <td><?= $cat->getStatut() ?></td>
        </tr>
    
        <?php
        }   
    ?>
    </tbody>
    </table>

    <form action="?ctrl=admin&action=addCategorie" method="POST">
            <h2>Ajouter une catégorie : </h2>
            <input name="message" id="message"></input>
            <button type="submit">Envoyer</button>
    </form>

    <form action="?ctrl=admin&action=disableCategorie" method="POST">
        <h2>Désactiver une categorie :</h2>
            <label for="id">id :</label>
            <input name="id" id="id"></input>

            <label for="statut">statut :</label>
            <input name="statut" id="statut"></input>
            
            <button type="submit">Envoyer</button>
    </form>

    <hr>

    <table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom de Sujets</th>
            <th>Date</th>
            <th>Membres</th>
            <th>Catégories</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        foreach($sujets as $sujet)
        {
        ?>

        <tr>
            <td><?= $sujet->getId() ?></td>
            <td><?= $sujet->getNom() ?></td>
            <td><?= $sujet->getDate() ?></td>
            <td><?= $sujet->getUser()->getUsername() ?></td>
            <td><?= $sujet->getCategories()->getNom() ?></td>
            <td><?= $sujet->getStatut() ?></td>
        </tr>
    
        <?php
        }   
    ?>
    </tbody>
    </table>

    <form action="?ctrl=admin&action=disableSujet" method="POST">
        <h2>Désactiver un sujet :</h2>
            <label for="id">id :</label>
            <input name="id" id="id"></input>

            <label for="statut">statut :</label>
            <input name="statut" id="statut"></input>
            
            <button type="submit">Envoyer</button>
    </form>

    <hr>

    <table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Contenu</th>
            <th>Date</th>
            <th>Membre</th>
            <th>Sujet</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        foreach($messages as $msg)
        {
        ?>

        <tr>
            <td><?= $msg->getId() ?></td>
            <td><?= $msg->getContenu() ?></td>
            <td><?= $msg->getDate() ?></td>
            <td><?= $msg->getUser()->getUsername() ?></td>
            <td><?= $msg->getSujets()->getNom() ?></td>
            <td><?= $msg->getStatut() ?></td>

        </tr>
    
        <?php
        }   
    ?>
    </tbody>
    </table>

    <form action="?ctrl=admin&action=disableMessage" method="POST">
        <h2>Désactiver un message :</h2>
            <label for="id">id :</label>
            <input name="id" id="id"></input>

            <label for="statut">statut :</label>
            <input name="statut" id="statut"></input>
            
            <button type="submit">Envoyer</button>
    </form>
    
</section>