<?php
    $messages = $response["data"]["messages"];
    $sujets = $response["data"]["sujets"];
?>
<section>
<a href="?ctrl=forum&action=categories&id=<?= $sujets->getCategories()->getId() ?>">
                        Retour
        </a>
                <h1>
                    <?= $sujets->getNom() ?>
                </h1><hr>
    <?php  
        foreach($messages as $msg){
        ?>
            <div>
                <?= $msg->getContenu() ?><br>
                <?= $msg->getDate() ?><hr>
            </div>
        <?php 
        }
        ?>
    <form class="tinymce" action="?ctrl=forum&action=addMessage&id=<?= $sujets->getId() ?>" method="POST">
            <textarea name="message" id="message"></textarea>
            <button type="submit">Envoyer</button>
    </form>
</section>