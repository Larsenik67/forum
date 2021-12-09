<?php
    $categories = $response["data"]["products"];
?>
<section class="products">
    <?php  
        foreach($categories as $cat)
        {
        ?>
            <div class="products__item">
                <h2>
                    <a href="?ctrl=store&action=product&id=<?= $cat->getId() ?>">
                        <?= $cat->getName() ?>
                    </a>
                </h2>
            </div>
        <?php
        }
    ?>
</section>