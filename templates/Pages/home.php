<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};



$cakeDescription = 'Portfolio inteligente de veículos por marca.';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <meta property="og:title" content="G2iCar - Portfolio inteligente de veículos por marca">
    <meta property="og:site_name" content="G2iCar">
    <meta property="og:url" content="g2icar.herokuapp.com">
    <meta property="og:description" content="Encontre os modelos de veículos que cada marca lançou, conforme o ano.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/img/logo_grande.PNG">


    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>">G2iCar</a>
        </div>
        <div class="top-nav-links">
            <a href="/">Pesquisar</a>
            <a href="/veiculos">Veículos</a>
            <a href="/marcas">Marcas</a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <div class="content">

                <div class="row">
                    <div class="column">
                        <form id="pesquisar-veiculos">
                            <fieldset>

                                <input type="text" placeholder="Nome do carro" name="veiculo_nome">
                                
                                <select id="marca_id" name="marca_id">
                                <option value="-1">Selecione a marca</option>
                                
                                </select>

                                <select id="ano" name="veiculo_ano">
                                <option value="-1">Selecione o ano</option>
                                </select>
                                
                                
                                <input class="button-primary" type="submit" value="Pesquisar">
                                <input class="button-outline" type="reset" value="Limpar">
                                
                            </fieldset>
                        </form>
                    </div>
                </div>

                <section id="resultado"></section>
                

            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $.get('/api/listar-marcas', function(data){
                

                let html = '';

                data['dados'].map(function(marca){
                    html += `<option value="${marca['id']}">${marca['nome']}</option>` ;
                });

                $('#marca_id').append(html);

            })

            $.get('/api/listar-anos', function(data){

                let html = '';

                data['dados'].map(function(ano){
                    html += `<option value="${ano['ano']}">${ano['ano']}</option>` ;
                });

                $('#ano').append(html);

            })

            $('#pesquisar-veiculos').on('submit', function(e){
                e.preventDefault();

                $.get('/api/buscar-veiculos', $('#pesquisar-veiculos').serialize(), function(data){

                    let html = '';

                    data['dados'].map((resultado)=>{
                        html += `<hr>
                                <div class="row">
                                    <div class="column">
                                        <h3>${resultado['veiculo_nome']}</h3>
                                        <p><b>${resultado['veiculo_ano']}</b> - <b>${resultado['marca_nome']}</b></p>
                                        <br />
                                        <p><a class="button" href="/veiculos/view/${resultado['veiculo_id']}">Mais detalhes</a></p>
                                    </div>
                                </div>`;
                    })

                    $('#resultado').html(html);

                })


            })

        });
    </script>

</body>
</html>
