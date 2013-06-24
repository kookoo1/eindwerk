<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cell
 *
 * @author webmaster
 */
//class KrbCell {
class Krb_View_Helper_KrbCell extends Zend_View_Helper_Abstract {
    //put your code here
    
    
    protected $_content;
    
    
    public function __construct($content) {
        
        $this->_content = $content;
        
    }
    
    public function getContent() {
        return $this->_content;
    }
}

?>
