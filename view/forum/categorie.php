<?php
    $sujets = $response["data"]["sujets"];
    $categorie = $response["data"]["categorie"];
?>
<section>
    <div class="retour">
        <a href="?ctrl=forum">
            Retour
        </a>
        <span class="newSujet">
            <a href="?ctrl=forum&action=newSujets&id=<?= $categorie->getId() ?>">
                Nouveau
            </a>
        </span>
    </div>
    <?php  
        foreach($sujets as $sujet)
        {
        ?>
        <a href="?ctrl=forum&action=sujets&id=<?= $sujet->getId() ?>">
            <div class="sujets">
                <div class="sujet">
                    
                        <?= $sujet->getNom() ?>
                    
                </div>
                <div class="sujet">
                    Nb de réponse
                </div>
                <div class="sujet">
                    Nb de vues
                </div>
                
            </div>
        </a>
        <?php 
        }
    ?>
</section>