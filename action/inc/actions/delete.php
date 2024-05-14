<main class="modal_ventana_content hidden" id="modal">
    <section class="modal_ventana modal_delete bg_light">
         <article class="mv_body">
                <i class="ai-info color_danger icon"></i>
                <h1 class="message">Are you sure to delete the user?</h1>
         </article>
         <article class="mv_footer">
            <div class="botons">
                <form method="post">
                    <input type="hidden" name="idUsuario" value="<?php echo $usuario['IdUsuario']; ?>">
                    <button type="submit" class="bg_danger">Eliminar<i class="ai-double-check"></i></button>
                </form>
                <button type="submit" class="button border bg_light color_dark btn_cerrar">Cancelar<i class="ai-cross"></i></button>
            </div>
         </article>
    </section>
</main>