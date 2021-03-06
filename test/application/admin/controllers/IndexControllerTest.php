<?
/**
 * IndexControllerTest - Test the default index controller
 * 
 * @author
 * @version 
 */
require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';
require_once realpath(dirname(__FILE__) . '/../../../../application/bootstrap.php');

/**
 * Admin_IndexController Test Case
 */
class Admin_IndexControllerTest extends Zend_Test_PHPUnit_ControllerTestCase 
{

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		
        Bootstrap::setupPaths();
		$application = new Zend_Application(
		    APPLICATION_ENV,
		    APPLICATION_PATH . '/settings/application.ini'
		);
		
		$this->bootstrap = $application;
		
		parent::setUp();
	}

	/**
	 * Prepares the environment before running a test.
	 */
	public function appBootstrap() {
		$this->frontController->registerPlugin ( new Bootstrap( 'test' ) );
		$this->getFrontController()->setDefaultModule('admin');
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		Zend_Session::destroy();
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	public function _loginFirst() {
		$this->getRequest()->setParams(array(
			'name' => 'administrator',
			'password' => 'password',
			'is_submitted' => 1
		));
		
		$this->dispatch( '/admin/login/index/' );
	}
	/**
	 * Tests the admin dashboard landing page
	 */
	public function testIndexAction() {
		$this->_loginFirst();
		
		$this->dispatch ( '/admin/index/index/' );
		
		$this->assertModule( 'admin' );
		$this->assertController ( 'index' );
		$this->assertAction ( 'index' );
		
		Zend_Session::destroy();
	}
}
?>
