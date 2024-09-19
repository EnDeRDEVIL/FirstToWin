<?php

    require 'connect.class.php';
    

    class Aula
    {
        private $id_aula;
        private $nomeAula;
        private $descricao;
        private $duracao;
        private $dataPublicacao;
        private $link;

        private $con;

        public function __construct()
        {
            $this->con = new Connect();
        }

       public function addAula($nomeAula,$descricao,$duracao,$dataPublicacao,$link)
       {
            try
            {
                $this->nomeAula = $nomeAula;
                $this->descricao = $descricao;
                $this->duracao = $duracao;
                $this->dataPublicacao = $dataPublicacao;
                $this->link = $link;
                
                $sql = $this->con->connection()->prepare("INSERT INTO aula (nomeAula, descricao, duracao, dataPublicacao, link) VALUES (:nomeAula, :descricao, :duracao, :dataPublicacao, :link)");

                $sql->bindParam(":nomeAula", $this->nomeAula, PDO::PARAM_STR);
                $sql->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
                $sql->bindParam(":duracao", $this->duracao, PDO::PARAM_STR);
                $sql->bindParam(":dataPublicacao", $this->dataPublicacao, PDO::PARAM_STR);
                $sql->bindParam(":link", $this->link, PDO::PARAM_STR);

                $sql->execute();
            }
            catch(PDOException $ex)
            {
                echo 'ERRO: '.$ex->getMessage();
            }
       }

       public function listAula()
       {
            try
            {
                $sql = $this->con->connection()->prepare("SELECT * FROM aula");

                $sql->execute();

                return $sql->fetchAll();
            }
            catch(PDOException $ex)
            {
                echo 'ERRO: '.$ex->getMessage();
            }
        }

        public function showAula($id_aula)
        {
            try
        {
                $sql = $this->con->connection()->prepare("SELECT id_aula, nomeAula, descricao, duracao, dataPublicacao, link FROM aula WHERE id_aula = :id_aula");
                $sql->bindValue(':id_aula',$id_aula);
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

        public function searchAula($id_aula)
        {
            try
            {
                $sql = $this->con->connection()->prepare("SELECT * FROM aula WHERE id_aula = :id_aula");
                $sql->bindValue(':id_aula', $id_aula);
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

       public function editAula($nomeAula,$descricao,$duracao,$dataPublicacao,$link,$id_aula)
       {
            try
            {
                $sql = $this->con->connection()->prepare("UPDATE aula SET nomeAula = :nomeAula, descricao =:descricao, duracao = :duracao, dataPublicacao = :dataPublicacao, link = :link WHERE id_aula = :id_aula");

                $sql->bindValue(":nomeAula", $nomeAula, PDO::PARAM_STR);
                $sql->bindValue(":descricao", $descricao, PDO::PARAM_STR);
                $sql->bindValue(":duracao", $duracao, PDO::PARAM_STR);
                $sql->bindValue(":dataPublicacao", $dataPublicacao, PDO::PARAM_STR);
                $sql->bindValue(":link", $link, PDO::PARAM_STR);
                $sql->bindValue(":id_aula", $id_aula, PDO::PARAM_STR);

                $sql->execute();
            }
            catch(PDOException $ex)
            {
                echo 'ERRO: '.$ex->getMessage();
            }
       }

       public function deleteAula($id_aula)
        {
            try
            {
                $sql = $this->con->connection()->prepare("DELETE FROM aula WHERE id_aula = :id_aula");

                $sql->bindParam(':id_aula',$id_aula);

                $sql->execute();
            }
            catch (PDOException $ex)
            {
                echo 'Erro: '.$ex->getMessage();
            }
        }
    }

?>