<?php

namespace Esteban\models;
use Esteban\libs\Database;
use PDOException;
use PDO;

class Profesores extends Database{

    private string $uuid;

    public function __construct (  private string $nombre='', private string $apellido='', private string $asignatura='', private string $turno=''){
        parent::__construct();

        $this->uuid= uniqid();

    }

    public function save(){

        $query= $this->connect()->prepare("INSERT INTO profes (uuid,nombre,apellido,asignatura,turno) VALUES (:uuid, :nombre, :apellido, :asignatura, :turno)" );
        
        $query->execute(['uuid'=> $this->uuid ,'nombre'=>$this->nombre, 'apellido'=>$this->apellido, 'asignatura'=>$this->asignatura, 'turno'=>$this->turno]);
    }

    public function update(){

        $query= $this->connect()->prepare("UPDATE profes SET nombre = :nombre,apellido = :apellido, asignatura = :asignatura, turno = :turno WHERE uuid = :uuid");

        $query->execute(['uuid'=>$this->uuid, 'nombre'=>$this->nombre, 'apellido'=>$this->apellido, 'asignatura'=>$this->asignatura, 'turno'=>$this->turno]);
    }

    public function delete($uuid){
        $query= $this->connect()->prepare("DELETE FROM profes WHERE uuid = :uuid");

        try {

            $query->execute([
                'uuid'=>$uuid
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function get($uuid){

        $db =  new Database();
        $query = $db->connect()->prepare('SELECT*FROM profes WHERE uuid = :uuid');
        $query->execute(['uuid'=>$uuid]);

        $profes = Profesores::createFromArray($query->fetch(PDO::FETCH_ASSOC));

        return $profes;
    }

    public static function getAll(){

        $profesores= [];
        $db =  new Database();
        $query = $db->connect()->query('SELECT*FROM profes');
    
        while($r = $query->fetch(PDO::FETCH_ASSOC)){
            $profes = Profesores::createFromArray($r);
            array_push($profesores, $profes);
        }

        return $profesores;
    }

    public static function createFromArray($arr):Profesores {
        $profes = new Profesores($arr['nombre'],$arr['apellido'],$arr['asignatura'],$arr['turno']);
        $profes->setUUID($arr['uuid']);

        return $profes;
    }

    public function getUUID(): string
        {
            return $this->uuid;
        }

    public function setUUID ($value)
        {
            $this->uuid = $value;
        }


    public function getNombre(): string
        {
            return $this->nombre;
        }

    public function setNombre ($value)
        {
            $this->nombre = $value;
        }


     public function getApellido(): string
        {
            return $this->apellido;
        }

    public function setApellido ($value)
        {
            $this->apellido = $value;
        }


    public function getAsignatura(): string
        {
            return $this->asignatura;
        }

    public function setAsignatura ($value)
        {
            $this->asignatura = $value;
        }


    public function getTurno(): string
        {
            return $this->turno;
        }

    public function setTurno ($value)
        {
            $this->turno = $value;
        }

}