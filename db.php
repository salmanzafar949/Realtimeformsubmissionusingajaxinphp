<?php
/**
 * Created by Salman Zafar.
 * User: Salman
 * Date: 11/15/2017
 * Time: 12:37 PM
 */

session_start();
Class DbConn
{


    protected $server = "localhost";
    protected $uname  = "root";
    protected $pass   = "";
    protected $db     = "lrs";
    public    $conn   = "";

    public function __construct()
    {
        $this->connect($this->server, $this->uname,$this->pass,$this->db);
    }

    public function connect($server, $user,$pass, $db)
    {
        $this->conn = new mysqli($server,$user,$pass,$db);
        if($this->conn->connect_error)
        {
            die("Connection failed: ".$this->conn->connect_error);
        }
    }

}

$db = new DbConn();
