<main class="modal_ventana_content hidden" id="modal">
    <section class="modal_ventana modal_edit bg_light">
        <article class="mv_head">
            <a class="btn_cerrar">
                <div class="close color_text"><i class="ai-x-small"></i></div>
            </a>
        </article>
         <article class="mv_body">
            <div class="heading">
                    <h3><?php echo $usuario['Nombres']; ?> <i class="ai-person"></i>
                        <p>Account created on <span class="color_primary"><?php echo $usuario['FechaRegistro']; ?></span></p>
                    </h3>
            </div>
            <form method="post" class="column" action="">
                            <div class="column-6">
                                <div class="group">
                                 

                                    <div class="group">
                                    <label>Assign status</label><br>

                                    <div class="select_contender2">
                                    <?php 
                                    $icon_classes = ["ai-face-happy icon", "ai-face-neutral icon", "ai-face-sad icon", "ai-thumbs-down icon"];
                                    ?>

                                    <?php foreach ($status as $key => $statu): ?>
                                        <div class="group">
                                            <input type="radio" name="estado" value="<?php echo $statu; ?>">
                                            <i></i>
                                            <label> <i class="<?php echo $icon_classes[$key]; ?>"></i>  <?php echo $statu; ?> </label>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>

                                </div>
                                </div>
                            </div>

                            <div class="column-12">
                                <div class="f_r">
                                    <button type="submit" class="bg_verify">Save<i class="ai-save"></i></button>
                                </div>
                            </div>
            </form>
         </article>
    </section>
</main>