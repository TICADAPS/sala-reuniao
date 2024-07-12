<?php

namespace Classes;

use Models\ModelConect;

class ClassEvents extends ModelConect
{
    #Trazer os dados de eventos do banco
    public function getEvents()
    {
        $b = $this->conectDB()->prepare("SELECT r.id,r.color,r.textColor,r.disciplina_desc as title,concat(r.dia,' ',p.periodoinicial) as 'start',concat(r.dia,' ', p.periodoinicial) as 'end' FROM reserva r INNER JOIN periodo p on r.periodo_id = p.id;");
        $b->execute();
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }

    #Criação da consulta no banco
    public function createEvent($id = 0, $sala, $time, $date, $solicitante, $title, $status, $description)
    {
        // consulta de existe uma reserva com o mesmo periodo e dia
        $b = $this->conectDB()->prepare("SELECT * FROM reserva WHERE periodo_id = $time and dia = '$date' and sala_id = $sala;");
        $b->execute();
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($f);
        if (empty($f)) {
            // insere uma nova reserva                
            $sql = "INSERT INTO reserva VALUES (?,?,?,?,?,?,?,?)";
            $b = $this->conectDB()->prepare($sql);
            $b->bindParam(1, $id, \PDO::PARAM_INT);
            $b->bindParam(2, $sala, \PDO::PARAM_STR);
            $b->bindParam(3, $time, \PDO::PARAM_STR);
            $b->bindParam(4, $date, \PDO::PARAM_STR);
            $b->bindParam(5, $solicitante, \PDO::PARAM_STR);
            $b->bindParam(6, $title, \PDO::PARAM_STR);
            $b->bindParam(7, $status, \PDO::PARAM_INT);
            $b->bindParam(8, $description, \PDO::PARAM_STR);
            $b->execute();
            session_start();
            $_SESSION['reserva'] = "Período reservado com sucesso!";
            header("Location: ../view/user/add.php");
        } else {
            session_start();
            $_SESSION['reservado'] = "Já existe uma reserva para esse período!";
            header("Location: ../view/user/add.php");
        }
    }

    #Buscar eventos pelo id
    public function getEventsById($id)
    {
        $b = $this->conectDB()->prepare("SELECT r.id,r.observacao,r.professor_desc,r.disciplina_desc as title,p.periodoinicial as 'start',p.periodoinicial as 'end',r.dia FROM reserva r INNER JOIN periodo p on r.periodo_id = p.id where r.id=?");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->execute();
        return $f = $b->fetch(\PDO::FETCH_ASSOC);
    }


    #Update no banco de dados
    public function updateEvent($id, $title, $description, $solicitante,$date,$time)
    {
        $b = $this->conectDB()->prepare("UPDATE reserva SET periodo_id=?,professor_desc=?,disciplina_desc=?, observacao=?, dia=? where id=?");
        $b->bindParam(1, $time, \PDO::PARAM_STR);
        $b->bindParam(2, $solicitante, \PDO::PARAM_STR);
        $b->bindParam(3, $title, \PDO::PARAM_STR);
        $b->bindParam(4, $description, \PDO::PARAM_STR);
        $b->bindParam(5, $date, \PDO::PARAM_STR);
        $b->bindParam(6, $id, \PDO::PARAM_INT);
        $b->execute();
        session_start();
        $_SESSION['reservado'] = "Reserva editada com sucesso";
        header("Location: ../view/manager/editar.php");
    }
}
