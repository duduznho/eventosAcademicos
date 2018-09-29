<section>
    <div class="container">
        <header>
            <h1>
                XXI Semana Academica Fapan/Fapen
            </h1>
        </header>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
        </p>
    </div>
</section>

<?php
$Read = new Read();
$Read->ExeRead('tcc_eventos', "WHERE env_ativo = :a", "a=1");
if ($Read->getResult()):
    foreach ($Read->getResult() as $evento):
        ?>
        <div class="row">
            <div class="col s12 m7">
                <div class="card">
                    <div class="card-image">
                        <img src="<?=HOME.'/uploads/'.$evento['env_img']?>">
                        <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                        <p><?= $evento['env_descri']?></p>
                    </div>
                    <div class="card-action">
                        <a href="#">This is a link</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    endforeach;
endif;
?>

