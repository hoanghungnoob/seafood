<?php
class Menu{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function search($keyword){
        $query="SELECT * FROM `dish` WHERE `dish_name` LIKE '%"+$keyword+"%';";
        
    }

}