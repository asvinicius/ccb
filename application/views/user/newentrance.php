<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Fluxo</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
    </head>
    <body>
        <h1> Nova Entrada </h1>

        <?php
            $visitorselect = $this->session->userdata('visitor');
        ?>
        <?php if ($savefail != null) { ?>
            <div class="alert alert-<?php echo $savefail["class"]; ?> "> <?php echo $savefail["message"]; ?> </div>
        <?php } ?>
      
        <div class="bs-docs-grid">
            <div class="row-fluid show-grid">
                <div class="span6">
                    <form class="form-horizontal" method="get" action="<?= base_url('flow/save'); ?>">
                        <input type="hidden" id="visitor" name="visitor" value="<?= $visitorselect; ?>" >
                        <h4>Informações da Entrada</h4>
                        <div class="row">
                            <div class="control-group span4">
                                <label class="control-label" for="showdate">Data</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showdate" name="showdate" required="true" maxlength="11"><?= date("d/m/y"); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group span4">
                                <label class="control-label" for="showhour">Hora</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showhour" name="showhour" required="true" maxlength="11"><?= date("H:i"); ?></span>
                                </div>
                            </div>
                        </div>
                        <h4>Informações do Visitante</h4>
                        <div class="row">
                            <div class="control-group span11">
                                <label class="control-label" for="showname">Nome</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span5" id="showname" name="showname" required="true" maxlength="2"> <?= $this->session->userdata('visitor_name'); ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group span4">
                                <label class="control-label" for="showcpf">CPF</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showcpf" name="showcpf" required="true" maxlength="11"> <?= $this->session->userdata('visitor_cpf'); ?> </span>
                                </div>
                            </div>
                            <div class="control-group span4">
                                <label class="control-label" for="showrg">RG</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showrg" name="showrg" required="true" maxlength="11"> <?= $this->session->userdata('visitor_rg'); ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group span11">
                                <label class="control-label" for="showphone">Telefone</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span3" id="showphone" name="showphone" required="true" maxlength="2"> <?= $this->session->userdata('visitor_phone'); ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-success" >Confirmar</button>
                                    <a class="btn btn-danger" href="<?= base_url('flow/cancel'); ?>">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="span6" style="text-align: center">
                    <h4 style="text-align: left">Pesquisar Visitante</h4>
                    <div class="input-append">
                        <form method="get" action="<?= base_url('flow/searchvisitor'); ?>">
                            <input class="span8" placeholder="Somente números ou letras" type="text" title="CPF, RG ou Nome" id="searchcamp" name="searchcamp" style="text-transform: uppercase;" maxlength="14">
                            <button class="btn" type="submit">
                                <img title="Procurar" src="<?= base_url(); ?>assets/img/icon/search.png" class="img-responsive" height="17" width="17">
                            </button>
                        </form>
                    </div>
                    <table class="table table-condensed">
                        <?php if($visitors){ ?>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th class="span3">Nome</th>
                                    <th>Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($visitors as $visitor){ ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('flow/select/'.$visitor->id); ?>">
                                                <img title="Selcionar" src="<?= base_url(); ?>assets/img/icon/select.png" class="img-responsive" height="13" width="13">
                                            </a>
                                        </td>
                                        <td><?php echo $visitor->cpf; ?></td>
                                        <td><?php echo $visitor->rg; ?></td>
                                        <td><?php echo $visitor->name; ?></td>
                                        <td><?php echo $visitor->phone; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php }
                              else{
                                  echo '<h4  style="text-align: left">Faça uma busca para listar os visitantes cadastrados no sistema.</h4>';
                              }?>
                    </table>
                </div>
            </div>
        </div>
        
    </body>
</html>