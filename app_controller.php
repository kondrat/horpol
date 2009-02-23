<?php
class AppController extends Controller {
	var $components      = array( 'Auth', 'RequestHandler', 'Email', 'Cookie','DebugKit.Toolbar');
    var $helpers         = array('Javascript', 'Html', 'Form', 'Menu', 'Tree', 'Cache');
    var $publicControllers = array('pages');
   	//var $uses = array('Category');
   	var $subheaderTitle = 'Hor pol';
//--------------------------------------------------------------------
	function beforeFilter() {
		
        if( isset($this->Auth) ) {
								
            if($this->viewPath == 'pages' && $this->params['action'] != 'admin_index') {
                $this->Auth->allow('*');
            } else {
                $this->Auth->authorize = 'controller';
	            if ( in_array( low($this->params['controller']), $this->publicControllers) ) {
                	//$this->Auth->allow('*');
                	$this->Auth->deny('pages/admin_index');
                }
            }
            $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');

        } 

	}
	
	function isAuthorized() {
            if ($this->Auth->user('role') == 'admin') {
                return true;
            } else {
                return false;
            }
        return true;
    }

//--------------------------------------------------------------------

	function beforeRender() {
		if( ( (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') or isset($this->params['admin']) ) && $this->Session->read('Auth.User.role') == 'admin' ) {
			
			$this->layout = 'admin';
		}
		
		
		
	}

}
?>