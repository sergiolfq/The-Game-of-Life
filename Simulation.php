<?php

/**
 * Description of Simulation
 * game of life
 * @author sergio
 */
class Simulation {

    private $num_iteration;
    private $data;

    public function __construct($num_iteration, GameOfLifeData $data) {

        $this->num_iteration = $num_iteration;
        $this->data = $data;
    }

/* takes the data from the game field and updates every row using the theory's rules */
    public function iteration() {

        $width = $this->data->getWidth(); // size of matrix or field
        $height = $this->data->getHeight();
        $ite_result=' <div class="Table">';   // result of an iteration
         
            for ($i = 1; $i <= $width; $i++) {
               $ite_result.=' <div class="Row">';   // result of an iteration

                $numbers = 0; // of neighbors
                for ($j = 1; $j <= $height; $j++) {
                    $numbers = $this->data->neighbors_alive($i, $j);
                    $alive=$this->data->getGrid()[$i][$j]->getStatus()=="alive"?true:false;

                    // comaparison  starts
                    if ($alive && $numbers <= 1) {
                        $this->data->getGrid()[$i][$j]->die_();  // dies of lonlines
                    } else if ($alive && $numbers >= 4) {
                        $this->data->getGrid()[$i][$j]->die_(); // dies of overpopulation
                    } 
                    //   a cell with 3 inhabited neighbors gets populated
                    if ($numbers == 3 && $alive==false ) {
                        $this->data->getGrid()[$i][$j]->come_to_life(); // alive 
                    }
                    $ite_result.=' <div class="Cell '.$this->data->getGrid()[$i][$j]->getStatus().'"> &nbsp;&nbsp;  </div> ';
                }
                $ite_result.="</div>";
            }
        $ite_result.="</div>";
        
        
        return $ite_result;
    }
    
    
    
    public function simulate(){
        $simulation_log="";  // this will get the log of the simulation in  divs with table class from each iteration
         for ($i = 1; $i <= $this->num_iteration; $i++) {  // for each iteration  
           
          $simulation_log.="<h3> Iteration Number $i </h3>";   
          $simulation_log.=$this->iteration();
          }
         return $simulation_log;
    }
    
    

    public function getNum_iteration() {
        return $this->num_iteration;
    }

    public function getData() {
        return $this->data;
    }

    public function setNum_iteration($num_iteration) {
        $this->num_iteration = $num_iteration;
    }

    public function setData($data) {
        $this->data = $data;
    }

}
