<?php

/**
 * Description of GameOfLifeData
 *
 * @author sergio
 */
class GameOfLifeData {

    private $width;
    private $height;
    private $grid; // game field

    public function __construct($width, $height) {

        $this->width = $width;
        $this->height = $height;


        for ($i = 1; $i <= $this->width; $i++) {
            for ($j = 1; $j <= $this->height; $j++) {

                $this->grid[$i][$j] = new Cell(false);
            }
        }

        $this->populate();  // polished method after editing the constructor and solving a bug with random numers in preveious version
    }
    
    
/* populates the grid for the firstt iteration. with 50% of cells alive */
    public function populate() {  
        $total_cells = $this->width * $this->height;
        $percentage = (int) ($total_cells / 2);   // 50%  of alive cells
        $count = 0;

        while ($count < $percentage) {

            $x = rand(1, $this->width);
            $y = rand(1, $this->height);
            $this->grid[$x][$y]->come_to_life();
            $count++;
        }
    }

    /* given a position  x,y it returns the number of neighbors alive to that cell */
    public function neighbors_alive($x, $y) {
        $num_alive = 0;

        if ($x - 1 >= 1) {    //  up side
            if ($this->grid[$x - 1][$y]->getStatus() == "alive") {
                $num_alive++;
            }
        }

        // down side
        if (($x + 1) <= $this->width) {
            if ($this->grid[$x + 1][$y]->getStatus() == "alive") {
                $num_alive++;
            }
        }

        // left side  
        if (($y - 1) >= 1) {
            if ($this->grid[$x][$y - 1]->getStatus() == "alive") {
                $num_alive++;
            }
        }

        //  right side 
        if (($y + 1) <= ($this->height)) {

            if ($this->grid[$x][$y + 1]->getStatus() == "alive") {
                $num_alive++;
            }
        }

        //  down  left
        if (($x - 1) >= 1 && ($y - 1) >= 1) {
            if ($this->grid[$x - 1][$y - 1]->getStatus() == "alive") {
                $num_alive++;
            }
        }

        // down right
        if (($x - 1) >= 1 && ($y + 1) <= $this->height) {
            if ($this->grid[$x - 1][$y + 1]->getStatus() == "alive") {
                $num_alive++;
            }
        }


        //  up right
        if (($x + 1) <= $this->width && ($y + 1) <= $this->height) {
            if ($this->grid[$x + 1][$y + 1]->getStatus() == "alive") {
                $num_alive++;
            }
        }
        // up left
        if (($x + 1) <= $this->width && ($y - 1) >= 1) {
            if ($this->grid[$x + 1][$y - 1]->getStatus() == "alive") {
                $num_alive++;
            }
        }

        return $num_alive;
    }

    public function getGrid() {
        return $this->grid;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

}
