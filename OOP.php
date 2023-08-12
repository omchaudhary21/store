<?php


class School {

    //properties and methods

    private $name = 'Om';

    function set_name($name){
        $this->name= $name;
    }

    function get_name(){
        return $this->name;
    }
}


$primary = new School;
$primary->set_name('Om Boarding high school');
echo $primary->get_name();
echo $primary->name;