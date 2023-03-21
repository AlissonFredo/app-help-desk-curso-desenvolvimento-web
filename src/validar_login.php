<?php
session_start();

$usuario_autenticado = false;

$usuario_id = null;

$usuario_perfil_id = null;

$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

$usuarios_app = array(
    array(
        'id' => 1,
        'email' => 'adm@teste.com',
        'senha' => '12345678',
        'perfil_id' => 1
    ),
    array(
        'id' => 2,
        'email' => 'user@teste.com',
        'senha' => '12345678',
        'perfil_id' => 2
    )
);

foreach ($usuarios_app as $user) {
    if (
        $user['email'] == $_POST['email'] &&
        $user['senha'] == $_POST['senha']
    ) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
}

?>