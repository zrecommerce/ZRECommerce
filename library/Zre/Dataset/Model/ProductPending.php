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
 * @copyright Copyrights 2008 ZRECommerce. See README file.
 * @license GPL v3 or higher. See README file.
 */

/**
 * Zre_Dataset_Model_ProductPending - Provides common queries related to
 * product pending records.
 *
 */
class Zre_Dataset_Model_ProductPending extends Zend_Db_Table_Abstract {
	/**
	 * The default table name
	 */
	protected $_name = 'product_pending';

	public function __construct($config = array())
	{
		$settings = Zre_Config::getSettingsCached();


		$this->_name = $settings->db->table_name_prepend . $this->_name;
		$this->_primary = 'product_pending_id';
		$this->setDefaultAdapter( Zre_Db_Mysql::getInstance() );

		parent::__construct($config);
	}

}