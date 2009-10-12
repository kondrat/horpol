<?php
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package		cake
 * @subpackage	cake.cake.libs.controller
 */
class PagesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	var $name = 'Pages';
/**
 * Default helper
 *
 * @var array
 * @access public
 */
	var $helpers = array('Html','Form');
/**
 * This controller does not use a model
 *
 * @var array
 * @access public
 */
	var $uses = array();
	
	//var $cacheAction ;//= "1 hour";
	//var $cacheAction = array('display/' => '60000');

	
  function beforeFilter() {
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
    }
    
    
    
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		
		//$this->cacheAction = "10000 hours";

		//debug($this->params);
		$path = func_get_args();

		if (!count($path)) {
			$this->redirect('/');
		}
		$count = count($path);
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set('ref',$this->referer());
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', $path));
	}
	
//--------------------------------------------------------------------	
	function admin_index() {
		$this->set('headerName','Главная страница');
		$this->redirect( array('controller'=>'sub_categories','action'=>'index') );	
	}
	
}

?>