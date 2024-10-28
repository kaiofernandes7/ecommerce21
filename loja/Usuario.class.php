<?php

class Usuario
{
    public function login($email, $senha)
    {
        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", md5($senha));
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $dado = $stmt->fetch();
            $_SESSION['idUser'] = $dado['idusuario'];
            return true;
        } else {
            return false;
        }
    }

    public function logged($id)
    {
        global $pdo;

        $sql = "SELECT nome FROM usuarios WHERE idusuario = :idusuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":idusuario", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }
        return [];
    }
}
?>