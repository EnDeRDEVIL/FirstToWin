<?php

    require 'connect.class.php';
    

    class Tournament
    {
        private $id_tournament;
        private $nomeTrnmt;
        private $gameName;
        private $dataInicio;
        private $dataFim;
        private $premiacao;
        private $multiGanhadores;

        private $con;

        public function __construct()
        {
            $this->con = new Connect();
        }

       /* private function validateNomeTrnmt($nomeTrnmt)
        {
            $sql = $this->con->connection()->prepare("SELECT id_tournament FROM tournament WHERE nomeTrnmt = :nomeTrnmt");
            $sql->bindParam(':nomeTrnmt', $nomeTrnmt, PDO::PARAM_STR);
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
        }*/
    
        public function addTrnmt($nomeTrnmt,$gameName,$dataInicio,$dataFim,$premiacao,$multiGanhadores)
        {
                try
                {
                    $this->nomeTrnmt = $nomeTrnmt;
                    $this->gameName = $gameName;
                    $this->dataInicio = $dataInicio;
                    $this->dataFim = $dataFim;
                    $this->premiacao = $premiacao;
                    $this->multiGanhadores = $multiGanhadores;

                    $sql = $this->con->connection()->prepare("INSERT INTO tournament (nomeTrnmt,gameName,dataInicio,dataFim,premiacao,multiGanhadores) VALUES (:nomeTrnmt,:gameName,:dataInicio,:dataFim,:premiacao,:multiGanhadores)");

                    $sql->bindParam(":nomeTrnmt", $this->nomeTrnmt, PDO::PARAM_STR);
                    $sql->bindParam(":gameName", $this->gameName, PDO::PARAM_STR);
                    $sql->bindParam(":dataInicio", $this->dataInicio, PDO::PARAM_STR);
                    $sql->bindParam(":dataFim", $this->dataFim, PDO::PARAM_STR);
                    $sql->bindParam(":premiacao", $this->premiacao, PDO::PARAM_STR);
                    $sql->bindParam(":multiGanhadores", $this->multiGanhadores, PDO::PARAM_STR);

                    $sql->execute();
                }
                catch(PDOException $ex)
                {
                    echo 'ERRO: '.$ex->getMessage();
                }
        }

        public function listTrnmt()
        {
            try
            {
                $sql = $this->con->connection()->prepare("SELECT * FROM tournament");

                $sql->execute();

                return $sql->fetchAll();
            }
            catch(PDOException $ex)
            {
                echo 'ERRO: '.$ex->getMessage();
            }
        }

        public function showTrnmt($id_tournament)
        {
            try
        {
                $sql = $this->con->connection()->prepare("SELECT id_tournament,nomeTrnmt,gameName,dataInicio,dataFim,premiacao,multiGanhadores FROM tournament WHERE id_tournament = :id_tournament");
                $sql->bindValue(':id_tournament',$id_tournament);
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

        public function searchTrnmt($id_tournament)
        {
            try
            {
                $sql = $this->con->connection()->prepare("SELECT * FROM tournament WHERE id_tournament = :id_tournament");
                $sql->bindValue(':id_tournament', $id_tournament);
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

        public function editTrmnt($nomeTrnmt,$gameName,$dataInicio,$dataFim,$premiacao,$multiGanhadores,$id_tournament)
        {
                try
                {
                    $sql = $this->con->connection()->prepare("UPDATE tournament SET nomeTrnmt = :nomeTrnmt, gameName = :gameName, dataInicio = :dataInicio ,dataFim = :dataFim ,premiacao = :premiacao, multiGanhadores = :multiGanhadores WHERE id_tournament = :id_tournament");

                    $sql->bindValue(':nomeTrnmt',$nomeTrnmt);
                    $sql->bindValue(':gameName',$gameName);
                    $sql->bindValue(':dataInicio',$dataInicio);
                    $sql->bindValue(':dataFim',$dataFim);
                    $sql->bindValue(':premiacao',$premiacao);
                    $sql->bindValue(':multiGanhadores',$multiGanhadores);
                    $sql->bindValue(':id_tournament',$id_tournament);

                    $sql->execute();

                    return TRUE;
                }
                catch (PDOException $ex)
                {
                    echo 'ERRO: '.$ex->getMessage();
                }
        }

        public function deleteTrnmt($id_tournament)
        {
            try
            {
                $sql = $this->con->connection()->prepare("DELETE FROM tournament WHERE id_tournament = :id_tournament");

                $sql->bindParam(':id_tournament',$id_tournament);

                $sql->execute();
            }
            catch (PDOException $ex)
            {
                echo 'Erro: '.$ex->getMessage();
            }
        }
    }

?>