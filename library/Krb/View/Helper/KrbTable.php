<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Table
 *
 * @author Kris Brassaertr
 */
class KrbTable {
    //put your code here
    
    
    private $_rows;// always underscore ==> privet or protectd vars!!!
    
    
    public function __construct() {
        
        $this->_rows = array();
    }
    
    public function append ($rows) {
        
        $this->_rows[] = $rows;
    }
    
    public function draw() {
        
        echo '<table border="1">'.PHP_EOL;// in de bron code komt deze rows onder elkaar ipv op één lijn!!!!
        
        // here we see the value of the  
        /*
        echo '<pre>';
        var_dump($this->_rows);die;
        echo '</pre>';
        */
        foreach ($this->_rows as $row) {
            
            echo '<tr>'.PHP_EOL;
            foreach ($row->getCells() as $cell) {
                echo '<td>'.$cell->getContent().'</td>'.PHP_EOL;
            }
            
            echo '</tr>'.PHP_EOL;
        }
        
        
        
        echo '</table>'.PHP_EOL;
    }
    
}

?>
