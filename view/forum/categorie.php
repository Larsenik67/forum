<?php
    $sujets = $response["data"]["sujets"];
?>
<section class="products">
    <?php  
        foreach($sujets as $sujet)
        {
        ?>
            <div class="products__item">
                <h2>
                    <a href="?ctrl=forum&action=sujets&id=<?= $sujet->getId() ?>">
                        <?= $sujet->getNom() ?>
                    </a>
                </h2>
            </div>
        <?php 
        }
    ?>
</section>