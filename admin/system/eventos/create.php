<div class="content form_create">

    <article>

        <header>
            <h1>Criar Evento:</h1>
        </header>

        <?php
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($post) && $post['SendEvenForm']):
            if (!in_array('', $post)):
                $post['env_ativo'] = ($post['SendEvenForm'] == 'Cadastrar' ? '0' : '1' );
                $image = ( $_FILES['env_img']['tmp_name'] ? $_FILES['env_img'] : null );
                unset($post['SendEvenForm']);
                $content = $post['env_descri'];
                unset($post['env_descri']);
                $post = array_map('strip_tags', $post);
                $post = array_map('trim', $post);
                $post['env_descri'] = $content;
                $post['env_img'] = $image;
                $post['env_data'] = Check::Data($post['env_data']);

                if (!empty($post['env_img']['tmp_name'])):
                    $Upload = new Upload();
                    $Upload->Image($post['env_img']);
                    if ($Upload->getResult()):
                        $post['env_img'] = $Upload->getResult();
                    endif;
                else:
                    unset($post['env_img']);
                endif;
                $Create = new Create();
                $Create->ExeCreate('tcc_eventos', $post);
                if ($Create->getResult()):
                    WSErro("O evento foi cadastrado com sucesso", WS_ACCEPT);
                endif;

            else:
                WSErro("Por Favor Preencha todos os campos", WS_ALERT);
            endif;
        endif;
        ?>


        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

            <label class="label">
                <span class="field">Enviar Capa:</span>
                <input type="file" name="env_img" />
            </label>

            <label class="label">
                <span class="field">Titulo:</span>
                <input type="text" name="env_nome" value="" />
            </label>

            <div class="label_line">

                <label class="label_small">
                    <span class="field">Bairro:</span>
                    <input type="text" name="env_bairro" value="" />
                </label>


                <label class="label_small">
                    <span class="field">Endereço:</span>
                    <input type="text" name="env_ender" value="" />
                </label>

                <label class="label_small">
                    <span class="field">Professor:</span>
                    <input type="text" name="env_prof" value="" />
                </label>
            </div>

            <label class="label">
                <span class="field">Descrição:</span>
                <textarea class="js_editor" name="env_descri" rows="10"></textarea>
            </label>

            <div class="label_line">

                <label class="label_small">
                    <span class="field">Data:</span>
                    <input type="text" class="formDate center" name="env_data" value="<?php
                    if (isset($post['post_date'])): echo $post['post_date'];
                    else: echo date('d/m/Y H:i:s');
                    endif;
                    ?>" />
                </label>


                <label class="label_small">
                    <span class="field">Faculdade:</span>
                    <input type="text" name="env_facul" value="" />
                </label>

                <label class="label_small">
                    <span class="field">Preço:</span>
                    <input type="text" name="env_preco" value="" />
                </label>
                
             
                <label class="label_small">
                    <span class="field">Carga Horaria:</span>
                    <input type="text" name="env_carga" value="" />
                </label>


            </div><!--/line-->


            <input type="submit" class="btn blue" value="Cadastrar" name="SendEvenForm" />
            <input type="submit" class="btn green" value="Cadastrar & Publicar" name="SendEvenForm" />

        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->