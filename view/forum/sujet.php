<?php
    $messages = $response["data"]["messages"];
    $sujets = $response["data"]["sujets"];
?>
<section class="products">
                <h1>
                    <?= $sujets->getNom() ?>
                </h1><hr>
    <?php  
        foreach($messages as $msg)
        {
        ?>
            <div class="products__item">
                <?= $msg->getContenu() ?><br>
                <?= $msg->getDate() ?><hr>
            </div>
        <?php 
        }
    ?>
</section>