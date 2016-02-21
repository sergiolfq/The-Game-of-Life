<?php
include "Cell.php";
include "GameOfLifeData.php";
include "Simulation.php";


$data = new GameOfLifeData(18, 45); // rows x columns nxM


$simulation = new Simulation(20, $data);
$result = $simulation->simulate();
?>

<html lang="en">
    <head>
        <style>
            .Table
            {
                display: table;
            }
            .Title
            {
                display: table-caption;
                text-align: center;
                font-weight: bold;
                font-size: larger;
            }
            .Heading
            {
                display: table-row;
                font-weight: bold;
                text-align: center;
            }
            .Row
            {
                display: table-row;
            }
            .Cell
            {
                display: table-cell;
                border: solid;
                border-width: thin;
                padding-left: 2px;
                padding-right: 2px;
            }
            .alive
            {
                background-color: lightskyblue;                
            }
            .dead
            {
                background-color: black;
            }
            .info{
                font-size: 75%;                
            }
            body{
                font-family: cursive;
            }
        </style>
        

        <title>  Game of life Simulation by Sergio fuenmayor  </title>
                </head>    
                                
                <body>
                    
                    <h1> Game of life Simulation by Sergio fuenmayor </h1>
                     <div class='info'> Blue cells are  alive, black cells are dead. </div>
                    <?php echo $result; ?>
                        
                </body>


</html>