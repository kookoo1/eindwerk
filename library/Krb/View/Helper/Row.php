<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Row
 *
 * @author webmaster
 */
class Row {
    //put your code here
    
    private $_cells;
    
    public function __construct() {
        
    
        $this->_cells = array();
    }
    
    
    public function append($cells) {
        
        $this->_cells[] = $cells;
    }
    
    
    /**
     * private attributes are no available from an external call
     * we create a getter to solve this
     * @return array
     */
    public function getCells() {
        return $this->_cells;
    }
}

?>
