<?php
    $sujets = $response["data"]["sujets"];
?>
<section>
    <?php  
        foreach($sujets as $sujet)
        {
        ?>
            <div class="sujets">
                <div class="sujet">
                    <a href="?ctrl=forum&action=sujets&id=<?= $sujet->getId() ?>">
                        <?= $sujet->getNom() ?>
                    </a>
                </div>
                <div class="sujet">
                    Nb de réponse
                </div>
                <div class="sujet">
                    Nb de vues
                </div>
            </div>
        <?php 
        }
    ?>
</section>