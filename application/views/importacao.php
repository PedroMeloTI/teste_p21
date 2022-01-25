
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

<section id="section_import" class="mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    Importação da planilha
                  </div>
                  <div class="card-body">
                    <form action="<?= base_url().'importacao' ?>" method="POST" id="form_import_info" enctype="multipart/form-data">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inp_mes" class="col-form-label">Mês/Ano</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="inp_mes" name="inp_mes" class="form-control mask_my" placeholder="__/____" >
                            </div>
                            <div class="col-auto">
                                <label for="inp_file" class="col-form-label">Arquivo XML</label>
                            </div>
                            <div class="col-auto">
                                <input type="file" id="inp_file" name="inp_file" class="form-control">
                            </div>
                            <hr>
                        </div>
                    </form>

                    <div class="row justify-content-end">
                        <div class="col-auto ">
                            <button type="button" class="btn btn-success "  id="btn_subir_import"> Subir arquivo</button>
                        </div>

                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section id="section_manual" class="mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="card">
                  <div class="card-header" id="title_cad_alt">
                    Cadastro de torcedores
                  </div>
                  <div class="card-body">
                    <form action="<?= base_url().'/principal/cadastro_manual' ?>" method="POST" id="form_cad_manual" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-1">
                                <label for="nome" class="col-form-label">Nome</label>
                            </div>
                            <div class="col-11">
                                <input type="text" id="nome" name="nome" class="form-control">
                            </div>
                        </div> </br>
                        <div class="row">
                            <div class="col-1">
                                <label for="documento" class="col-form-label">Documento</label>
                            </div>
                            <div class="col-5">
                                <input type="text" id="documento" name="documento" class="form-control">
                            </div>
                            <div class="col-1">
                                <label for="email" class="col-form-label">E-mail</label>
                            </div>
                            <div class="col-5">
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div> </br>
                        <div class="row">
                            <div class="col-1">
                                <label for="cep" class="col-form-label">CEP</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="cep" name="cep" class="form-control mask_cep">
                            </div>
                            <div class="col-1">
                                <label for="endereco" class="col-form-label">Endereço</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="endereco" name="endereco" class="form-control">
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-1">
                                <label for="bairro" class="col-form-label">Bairro</label>
                            </div>
                            <div class="col-4">
                                <input type="text" id="bairro" name="bairro" class="form-control">
                            </div>
                            <div class="col-1">
                                <label for="cidade" class="col-form-label">Cidade</label>
                            </div>
                            <div class="col-4">
                                <input type="text" id="cidade" name="cidade" class="form-control">
                            </div>
                            <div class="col-1">
                                <label for="uf" class="col-form-label">UF</label>
                            </div>
                            <div class="col-1">
                                <input type="text" id="uf" name="uf" maxlength="2" class="form-control">
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-1">
                                <label for="telefone" class="col-form-label">Telefone</label>
                            </div>
                            <div class="col-3">
                                <input type="text" id="telefone" name="telefone" class="form-control mask_cel">
                            </div>
                            
                        </div> <br>

                    </form>

                    <div class="row justify-content-end">
                        <div class="col-auto ">
                            <button type="button" class="btn btn-success "  id="btn_cad_manual"> Cadastrar</button>
                            <button type="button" class="btn btn-info " onclick="window.location=base_url+'/principal/importacao'"> novo</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Lista dos torcedores -->
<section id="section_import" class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    Lista dos torcedores
                  </div>
                  <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                            <th scope="col">Situação</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Documento</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">UF</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            if($qtd_torcedores > 0 ){
                                $html = '';
                                for($t = 0; $t < $qtd_torcedores; $t++){
                                    $html .=  '<tr>';
                                    $html .= '<td>'.(($res_torcedores[$t]['ativo'] == 1) ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>').'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['nome'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['documento'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['cep'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['endereco'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['bairro'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['cidade'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['uf'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['telefone'].'</td>';
                                    $html .= '<td>'.$res_torcedores[$t]['email'].'</td>';
                                    $html .= '<td><button type="button" onclick="return abre_edicao_torcedores(\''.$res_torcedores[$t]['documento'].'\')" class="btn btn-warning btn-sm">Editar</button></button></td>';
                                    $html .= '</tr>';
                                }

                                echo $html;

                            } else {
                                echo '<tr> <td colspan="11" align="center">Nenhum registro encontrado</td></tr>';
                            }


                            ?>
                            
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>