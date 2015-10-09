<?php
echo '<a href="http://localhost/multiplo-updates">Voltar</a>';
echo '<br/>';
echo '<br/>';
$conn = new PDO('mysql:host=localhost;dbname=noticias', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec('SET NAMES UTF8');
if(isset($_POST['updateAll'])):
    foreach ($_POST['id'] as $id):
        $titulo = $_POST['titulo'][$id];
        $slug = $_POST['slug'][$id];
        $descricao = $_POST['descricao'][$id];
        $Up = $conn->prepare("UPDATE `posts` SET titulo = '$titulo', slug = '$slug', descricao = '$descricao' WHERE id = '$id' LIMIT 1");
        $Up->execute();
        if($Up->rowCount()>0):
            echo "Atualizou com sucesso o posts com id '$id'".'<br/>';
        endif;
    endforeach;
endif;
