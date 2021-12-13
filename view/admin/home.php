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
    
</section>