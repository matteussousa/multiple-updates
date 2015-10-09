<?php
$conn = new PDO('mysql:host=localhost;dbname=noticias', 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec('SET NAMES UTF8');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class='container'>
            <br/><br/><br/>
            <?php
            $listPosts = $conn->prepare("SELECT * FROM `posts` ORDER BY id ASC");
            $listPosts->execute();
            ?>
            <form name='form_update' method='post' action='update.php'>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Slug</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($posts = $listPosts->fetchObject()):
                        ?>
                        <tr>
                            <td><?php echo $posts->id;?></td>
                            <td><input type="text" value="<?php echo $posts->titulo;?>" name="titulo[<?php echo $posts->id;?>]"</td>
                            <td><input type="text" value="<?php echo $posts->slug;?>" name="slug[<?php echo $posts->id;?>]"</td>
                            <td><input type="text" value="<?php echo $posts->descricao;?>" name="descricao[<?php echo $posts->id;?>]"</td>
                            <input type="hidden" name="id[]" value="<?php echo $posts->id;?>"/>
                        </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
                <div class="well-lg well">
                    <input type="submit" name="updateAll" value="Atualizar Todos" class="btn btn-primary btn_update_all"/>
                </div>
            </form>

        </div>

        <script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

            });
        </script>
    </body>
</html>