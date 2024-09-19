<?php

require 'connect.class.php';

class User
{
    private $id_user;
    private $nome;
    private $dtNasc;
    private $nick;
    private $senha;
    private $email;
    private $telefone;
    private $permissao;

    private $con;

    public function __construct()
    {
        $this->con = new Connect();
    }

    public function doLogin($email,$senha)
    {
        $sql = $this->con->connection()->prepare("SELECT * FROM user WHERE email = :email AND senha = :senha");

        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);

        $sql->execute();

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();

            $_SESSION['logged'] = $sql['id_user'];
            $_SESSION['nick'] = $sql['nick'];
            $_SESSION['permissao'] = $sql['permissao'];

            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    private function validateEmail($email)
    {
        $sql = $this->con->connection()->prepare("SELECT id_user FROM user WHERE email = :email");
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            $array = $sql->fetch();
        }
        else
        {
            $array = array();
        }

        return $array;
    }

    public function addUser($nome,$dtNasc,$nick,$senha,$email,$telefone,$permissao)
    {
        $validateEmail = $this->validateEmail($email);
        if(count($validateEmail) == 0)
        {
            try
            {
                $this->nome = $nome;
                $this->dtNasc = $dtNasc;
                $this->nick = $nick;
                $this->senha = $senha;
                $this->email = $email;
                $this->telefone = $telefone;
                $this->permissao = $permissao;

                $sql = $this->con->connection()->prepare("INSERT INTO user (nome,dtNasc,nick,senha,email,telefone,permissao) VALUES (:nome,:dtNasc,:nick,:senha,:email,:telefone,:permissao)");

                $sql->bindParam(':nome',$this->nome, PDO::PARAM_STR);
                $sql->bindParam(':dtNasc',$this->dtNasc, PDO::PARAM_STR);
                $sql->bindParam(':nick',$this->nick, PDO::PARAM_STR);
                $sql->bindParam(':senha',md5($this->senha), PDO::PARAM_STR);
                $sql->bindParam(':email',$this->email, PDO::PARAM_STR);
                $sql->bindParam(':telefone',$this->telefone, PDO::PARAM_STR);
                $sql->bindParam(':permissao',$this->permissao, PDO::PARAM_STR);

                $sql->execute();

                return TRUE;
            }
            catch(PDOException $ex)
            {
                echo "Erro ".$ex->getMessage();
            }
        }
        else
        {
            return FALSE;
        }
    }

    public function listUsers()
    {
        try
        {
            $sql = $this->con->connection()->prepare("SELECT id_user,nome,dtNasc,nick,senha,email,telefone,permissao FROM user");

            $sql->execute();

            return $sql->fetchAll();
        }
        catch (PDOException $ex)
        {
            echo 'ERRO: '.$ex->getMessage();
        }
    }

    public function showUsers($id_user)
    {
        try
        {
            $sql = $this->con->connection()->prepare("SELECT id_user,nome,dtNasc,nick,senha,email,telefone,permissao FROM user WHERE id_user = :id_user");
            $sql->bindValue(':id_user',$id_user);
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                return $sql->fetch();
            }
            else
            {
                return array();
            }

            return $sql->fetchAll();
        }
        catch (PDOException $ex)
        {
            echo 'ERRO: '.$ex->getMessage();
        }
    }

    public function searchUser($id_user)
    {
        try
        {
            $sql = $this->con->connection()->prepare("SELECT * FROM user WHERE id_user = :id_user");
            $sql->bindValue(':id_user', $id_user);
            $sql->execute();
            if($sql->rowCount() > 0){
                return $sql->fetch();
            }else{
                return array();
            }
        }
        catch (PDOException $ex)
        {
            echo 'ERRO: '.$ex->getMessage();
        }
    }

    public function editUser($nome,$dtNasc,$nick,$senha,$email,$telefone,$permissao,$id_user)
    {
        $validateEmail = $this->validateEmail($email);
        if(count($validateEmail) > 0 && $validateEmail['id_user'] != $id_user)
        {
            return FALSE;
        }
        else
        {
            try
            {
                $sql = $this->con->connection()->prepare("UPDATE user SET nome = :nome,dtNasc = :dtNasc,nick = :nick,senha = :senha,email = :email, telefone = :telefone, permissao = :permissao WHERE id_user = :id_user");

                $sql->bindValue(':nome',$nome);
                $sql->bindValue('dtNasc',$dtNasc);
                $sql->bindValue('nick',$nick);
                $sql->bindValue(':senha',md5($senha));
                $sql->bindValue(':email',$email);
                $sql->bindValue(':telefone',$telefone);
                $sql->bindValue(':permissao',$permissao);
                $sql->bindValue(':id_user',$id_user);

                $sql->execute();

                return TRUE;
            }
            catch (PDOException $ex)
            {
                echo 'ERRO: '.$ex->getMessage();
            }
        }
    }

    public function deleteUser($id_user)
    {
        try
        {
            $sql = $this->con->connection()->prepare("DELETE FROM user WHERE id_user = :id_user");

            $sql->bindParam(':id_user',$id_user);

            $sql->execute();
        }
        catch (PDOException $ex)
        {
            echo 'Erro: '.$ex->getMessage();
        }
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$valor;
    }
    
    public function setUser($id_user)
    {
        $this->id_user = $id_user;
        $sql = $this->con->connection()->prepare("SELECT * FROM user WHERE id_user = :id_user");
        $sql->bindValue(":id_user",$id_user);
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            $this->permissao = explode(',',$sql['permissao']);//Transforma em Array(add,edit,del,super)
        }
    }

    public function getPermissions()
    {
        return $this->permissao;
    }

    public function havePermission($p)
    {
        if(in_array($p, $this->permissao))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function searchPermissionAdd($arrayperm)
    {
        foreach($arrayperm as $item)
        {
            if($item == "add")
            {
                return TRUE;
            }
        }
    }

    public function searchPermissionEdit($arrayperm)
    {
        foreach($arrayperm as $item)
        {
            if($item == "edit")
            {
                return TRUE;
            }
        }
    }

    public function searchPermissionDel($arrayperm)
    {
        foreach($arrayperm as $item)
        {
            if($item == "del")
            {
                return TRUE;
            }
        }
    }

    public function searchPermissionSuper($arrayperm)
    {
        foreach($arrayperm as $item)
        {
            if($item == "super")
            {
                return TRUE;
            }
        }
    }
}

?>