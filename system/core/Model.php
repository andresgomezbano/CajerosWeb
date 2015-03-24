<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

        //private $tablename;
	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct($data = null)
	{
            if($data != NULL)
            {
                foreach($data as $key => $value)$this->$key = $value;
            }   
            log_message('debug', "Model Class Initialized");
	}

	/**
	 * __get
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string
	 * @access private
	 */
	function __get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}
        
        function save()
        {
            $tablename = $this->tablename;
            unset($this->tablename);
            if(!isset($this->id) || $this->id == NULL)
            {
                unset($this->id);
                $this->db->query($this->db->insert_string($tablename, (array)$this));
                $this->id = $this->db->insert_id();
            }
            else
            {
                $id = $this->id;
                unset($this->id);
                $where = "id = ".$id;
                $this->db->query($this->db->update_string($tablename, (array)$this, $where));
                $this->id = $id;
            }
            $this->tablename = $tablename;
        }
}
// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */