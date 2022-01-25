<?php
if(isset($_SESSION['status'])){
    echo ' <div class="container">
                <div class="alert alert-'.$_SESSION['status'].' text-center mt-2">
                    '.$_SESSION['msg_retorno'].'
                </div>
            </div>';
    unset($_SESSION['status']);
}
?>
<div class="container mt-3">
    <div class="row justify-content-end">
        <div class="col-auto ">
            <a href="<?= base_url(). 'principal' ?>" class="btn btn-primary">Voltar </a>
        </div>
    </div>
</div>

<section id="section_enviar" class="mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    Enviar comunicado
                  </div>
                  <div class="card-body">
                    <form action="<?= base_url().'enviar' ?>" method="POST" id="form_enviar">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inp_mes" class="col-form-label">Mensagem</label>
                            </div>
                            <div class="col-10">
                                <textarea name="mensagem" id="mensagem" rows="10" class="form-control"></textarea>
                            </div>
                            
                            <hr>
                        </div>
                    </form>

                    <div class="row justify-content-end">
                        <div class="col-auto ">
                            <button type="button" class="btn btn-success "  id="btn_enviar"> Enviar </button>
                        </div>

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</section>