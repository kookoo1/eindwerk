<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Strong_Cell
 *
 * @author webmaster
 */
class Strong_Cell extends Cell {
    //put your code here
    
    public function getContent() {
        return '<strong>'.$this->_content.'</strong>';
    }    
}

?>
