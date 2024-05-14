<main class="modal_ventana_content hidden" id="modal">
    <section class="modal_ventana bg_light">
        <article class="mv_head">
            <a class="btn_cerrar">
                <div class="close color_text"><i class="ai-x-small"></i></div>
            </a>
        </article>
         <article class="mv_body">
            <div class="heading">
                    <h2><?php echo $usuario['Nombres']; ?> <i class="ai-info"></i>
                        <p>Account created on <span class="color_primary"><?php echo $usuario['FechaRegistro']; ?></span></p>
                    </h2>
            </div>
            <aside class="column">
                <div class="column-4">
                    <p>Name</p>
                    <h6><?php echo $usuario['Nombres']; ?></h6>
                </div>
                <div class="column-4">
                    <p>Lastname</p>
                    <h6><?php echo $usuario['Apellidos']; ?></h6>
                </div>
                <div class="column-4">
                    <p>User</p>
                    <h6><?php echo $usuario['Usuario']; ?></h6>
                </div>
                <div class="column-4">
                    <p>Code</p>
                    <h6><?php echo $usuario['CodUsuario']; ?></h6>
                </div>
                <div class="column-4">
                    <p>Status</p>
                    <h6 class="color_verify"><?php echo $usuario['Estado']; ?></h6>
                </div>
            </aside>
           
         </article>
    </section>
</main>