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

    public function cadastrar($nome, $email, $senha)
    {
        global $pdo;

        // Verifica se o e-mail já está cadastrado
        $sql = "SELECT idusuario FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            // Caso o e-mail não exista, faz o cadastro
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", md5($senha)); // Salva a senha com MD5
            $stmt->execute();
            return true;
        } else {
            // Retorna falso caso o e-mail já exista
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
