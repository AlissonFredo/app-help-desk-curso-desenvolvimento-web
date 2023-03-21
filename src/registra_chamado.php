<?php
session_start();

$titulo = str_replace('#', '-', $_POST['titulo']);

$categoria = str_replace('#', '-', $_POST['categoria']);

$descricao = str_replace('#', '-', $_POST['descricao']);

$id = $_SESSION['id'];

$texto = $id . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

$arquivo = fopen('arquivo.hd', 'a');

fwrite($arquivo, $texto);

fclose($arquivo);

header('Location: abrir_chamado.php');
?>