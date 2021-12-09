<?php
    $categories = $response["data"]["categories"];
?>
<section class="products">
    <?php  
        foreach($categories as $cat)
        {
        ?>
            <div class="products__item">
                <h2>
                    <a href="?ctrl=forum&action=categories&id=<?= $cat->getId() ?>">
                        <?= $cat->getNom() ?>
                    </a>
                </h2>
            </div>
        <?php 
        }
    ?>
</section>