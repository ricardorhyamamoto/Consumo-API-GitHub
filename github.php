<?php

function curlRequest($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Firefox'));
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);
    
    return $response;
}

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $profileUrl = sprintf('https://api.github.com/users/%s', $user);
    $starsUrl = sprintf('https://api.github.com/users/%s/starred', $user);
    $profile = curlRequest($profileUrl);
}

?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href="./style.css" rel="stylesheet">

<div class="container">
    <?php if(!isset($profile['message'])) { ?>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
                <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">

                            <!-- FORMATAÇÃO DATA PADRÃO BRASILEIRO -->
                            <?php $profile['created_at'] = DateTime::createFromFormat("Y-m-d\TH:i:sZ", $profile['created_at'])->format('d/m/Y'); ?>
                            
                            <img src="<?=$profile['avatar_url']?>" class="img-responsive img-fluid">
                            <h2><?=$profile['name']?></h2>
                            <p><strong><?=$profile['login']?></strong></p>
                            <p><strong>Localização: </strong><?=$profile['location']?></p>
                            <p><strong>Cadastrado desde: </strong><?=$profile['created_at']?></p>
                            <a href="https://github.com/<?=$profile['login']?>" class="btn btn-primary">Acessar Perfil no Github</a>
                        </div>
                    </div>
                    <div class="col-xs-12 divider text-center">
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong><?=$profile['followers']?></strong></h2>
                            <p><small>Seguidores</small></p>
                        </div>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong><?=$profile['following']?></strong></h2>
                            <p><small>Seguindo</small></p>
                        </div>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong><?=$profile['public_repos']?></strong></h2>
                            <p><small>Repositórios</small></p>
                        </div>
                    </div>
                </div>
                <a href="index.php" class="btn btn-success">Realizar uma nova busca</a>
            </div>
        </div>
        
    <?php } else { ?>
        <div class="row">
            <h1 class="h3 mb-3 font-weight-normal">Perfil não encontrado</h1>
            <a href="index.php" class="btn btn-info">Voltar para Página Inicial</a>
        </div>
    <!-- FECHAMENTO IF -->
    <?php } ?>
</div>