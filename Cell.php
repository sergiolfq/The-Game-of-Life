<?php

/**
 * Description of Cell
 *
 * @author sergio fuenmayor 
 * @email sergiolfq@gmail.com
 */
class Cell {

    private $status; // string "dead" or "alive" 

    public function __construct($bool) {  //  is habitated or not
        if ($bool == true) {
            $this->status = "alive";
        } else {
            $this->status = "dead";
        }
    }

    public function die_() {  // die function is reserved in php so i used die_ 
        $this->status = "dead";
    }

    public function come_to_life() {
        $this->status = "alive";
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
