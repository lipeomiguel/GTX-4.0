<?php

require __DIR__ . "/../funcoes/func.verificaSessao.php";
require __DIR__ . "/../funcoes/func.dadosPerfil.php";
require __DIR__ . "/../funcoes/func.dadoStream.php";
require __DIR__ . "/../funcoes//func.plataformaStream.php";
require __DIR__ . "/../model/model.areaLogada.php";

verificaSessao();

$boasvindas = $_SESSION['nome'];

$nickSessao = $_SESSION['nick'];
$nickPerfil = carregaPerfil($nickSessao);

$idSessao = $_SESSION['id_sessao'];
$dadoStream =carregaStream($idSessao);

$plataformasStream = carregaPlataformas();

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $formularios = $_POST['formLogado'];
    
    switch ($formularios) {
        case 'perfilNick':
            # code.
            break;

        case 'salvaVersao':
            $versao = $_POST['versao'];
            require __DIR__ . "/../funcoes/func.versao.php";
            if ($versao != verificaVersao()){
                require __DIR__ . "/../funcoes/func.salvaVersao.php";
                alteraVersao($versao);
                header("location: /index.php");
            }
            break;
        
        case 'form_sair':
            require __DIR__ . "/../funcoes/func.sair.php";
            sair();
            break;
    }
}

require __DIR__ . "/../view/view.areaLogada.php";

?>
