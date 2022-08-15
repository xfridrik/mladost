<?php

require_once "MyPDO.php";

class Room
{
    protected $db;
    protected $id;
    protected $building;
    protected $unit;
    protected $room;

    public function __construct()
    {
        $this->db = new MyPDO();
    }

    public static function get_all(){
        return MyPDO::instance()->run("SELECT * FROM rooms")->fetchAll();
    }

    public static function find($id){
        return MyPDO::instance()->run("SELECT * FROM rooms where id = ?",[$id])->fetch();
    }

    public function save()
    {
        $this->db->run("INSERT INTO `rooms`(`building`,`unit`,`room`) VALUES (?,?,?)", [$this->building, $this->unit, $this->room])->fetch();
        //$this->id = $this->db->lastInsertId();
        //return $this->id;
    }


    /**
     * @return MyPDO
     */
    public function getDb(): MyPDO
    {
        return $this->db;
    }

    /**
     * @param MyPDO $db
     */
    public function setDb(MyPDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @param mixed $building
     */
    public function setBuilding($building)
    {
        $this->building = $building;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

}