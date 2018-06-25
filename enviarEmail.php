
<?php
    $nome = $_POST['nome'];
    $email= $_POST['email'];
    $comentarios= $_POST['comentarios'];
    $to = "lip.emerim@gmail.com";
    $assunto = "Fale Conosco";

    mail($to,'sadas','sddsadsaads');

    header('Location: faleConosco.php');
?>
