<?php
/**
 * ZRECommerce e-commerce web application.
 * 
 * @author ZRECommerce
 * 
 * @package Datamodel
 * @subpackage Datamodel
 * @category Datamodel
 * 
 * @version $Id$
 * @copyright Copyrights 2008 ZRECommerce. All rights reserved.
 * @license Creative Commons license - See public/license.txt
 */

/**
 * Zre_Dataset_Model_UsersProfile - Provides common queries related
 * to user profiles.
 *
 */
class Zre_Dataset_Model_UsersProfile extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'users_profile';
	
	public function __construct($config = array())
	{
		$settings = Zre_Config::getSettingsCached();
    	
		$this->_name = $settings->db->table_name_prepend . $this->_name;
		$this->_primary = 'user_profile_id';
		$this->setDefaultAdapter( Zre_Db_Mysql::getInstance() );
		
		parent::__construct($config);
	}

}