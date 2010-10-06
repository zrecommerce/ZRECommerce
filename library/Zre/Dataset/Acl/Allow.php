<?php
/**
 * ZRECommerce e-commerce web application.
 * 
 * @author ZRECommerce
 * 
 * @package Acl
 * @subpackage Acl_Allow
 * @category Dataset
 * 
 * @version $Id$
 * @copyright Copyrights 2008 ZRECommerce. All rights reserved.
 * @license Creative Commons license - See public/license.txt
 */
/**
 * Zre_Dataset_Acl_Allow
 *
 */
class Zre_Dataset_Acl_Allow extends Data_Set_Abstract
{
	protected $_modelName = 'Zre_Dataset_Model_AclAllow';
	
	public function flush() {
		$table = $this->getModel();
		
		return $table->delete( $table->getAdapter()
									->quoteInto('id = ? OR 1 = 1', 0) );
	}
}
?>