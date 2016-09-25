<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MY_Output extends CI_Output {

	function _display_cache(&$CFG, &$URI) {
        
        return FALSE;
        
		/* Call the parent function to re-enable cache */
		//return parent::_display_cache($CFG,$URI);
	}
}
?>