<?php

class UsersController extends AppController {
	var $uses = array('User');
	var $name = 'Users';
	var $helpers = array('Form', 'Html');
	var $components = array( 'Security', 'userReg');
	var $pageTitle = 'Данные пользователя';
	var $paginate = array('limit' => 5);

//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow( 'login','logout', 'reset');
        parent::beforeFilter(); 
        $this->Auth->autoRedirect = false;
        //debug($this->Session->read() );
    }

//--------------------------------------------------------------------
	function login() {
		$this->pageTitle = 'ВХОД В СИСТЕМУ УПРАВЛЕНИЯ';
		if( !empty($this->data) ) {

			if( $this->Auth->login() ) {
				
            	// Retrieve user data

             		
             		if ( $this->Auth->user() ) {
             			$this->data['User']['remember_me'] = true;
						if ( !empty($this->data) && $this->data['User']['remember_me'] ) {
							$cookie = array();
							$cookie['username'] = $this->data['User']['username'];
							$cookie['password'] = $this->data['User']['password'];
							$this->Cookie->write('Auth.User', $cookie, true, '+3 hours');
							unset($this->data['User']['remember_me']);
						}

         			}


						$this->redirect( $this->Auth->redirect() );

			
			} else {
				$this->data['User']['password'] = null;
				$this->Session->setFlash("Проверьте ваш логин и пароль",'default', array('class' => 'nomargin flash'));
			}
		} else {
			if( !is_null( $this->Session->read('Auth.User.username') ) ){
				$this->Session->setFlash('You are logged in already as <span style ="font-size: x-large">'.$this->Session->read('Auth.User.username').'</span>, sorry.');
				$this->redirect( $this->Auth->redirect() );			
			}
		}
	}

//--------------------------------------------------------------------
    function admin_logout() {
    	
    	if ( $this->Session->check('Auth.User.id') ) {
    		$tempUserName = '<b>'.$this->Session->read('Auth.User.username'). '</b> вышел из системы';
    	} else {
    		$tempUserName = ' Вы не входили в систему';
    	}
    	$this->Session->del('subCatData');
    	$this->Session->del('CatBrandData');
        $this->Auth->logout();

        $this->Session->setFlash( $tempUserName );
        $this->redirect( $this->Auth->redirect() );        
    }
//--------------------------------------------------------------------
	function admin_reg() {
		//debug($this->data);
		$this->pageTitle = 'Регистрация';
		$this->subheaderTitle = 'РЕГИСТРАЦИЯ';
		
		/*
		$this->User->displayField = 'role';
		$roles = $this->User->find('list'); 
		$this->set( compact('roles') );
		*/
		
		
		if ( !empty($this->data) ) {		
			$this->User->create();

			if ( $this->User->save( $this->data) ) {
				$this->Session->setFlash('Новый аккаунт создан');
				$this->redirect( array('controller' => 'pages', 'action' => 'index','admin' => false) );
         	} else {
         		// Failed, clear password field
				$this->data['User']['password1'] = null;
				$this->data['User']['password2'] = null;
				$this->Session->setFlash('Новый аккаунт не был создан');
			}
		} 

	}

//--------------------------------------------------------------------
    function admin_newpassword() {

    	if( !empty($this->data) ) {
    		
				$user = $this->User->find( 'first', array( 'conditions' => array('User.username' => $this->Auth->user('username') ), 'fields' => array('id', 'password'), 'contain' => false ) ) ;
				// Check old password is correct
				if( isset($user['User']['password']) && $user['User']['password'] != $this->Auth->password( $this->data['User']['password']) ) {
					$this->User->invalidate('password', 'Неправильно введен пароль' );
					
					$this->data['User']['password'] = null;
					$this->data['User']['password1'] = null;
					$this->data['User']['password2'] = null;
					return;
				} 

				$this->User->id = $user['User']['id'];
				if( $this->User->save( $this->data, true, array( 'password','password1','password2') ) ) {
					//return;
					$this->Session->setFlash( 'Пароль был изменен');
					$this->redirect(array('controller' => 'pages', 'action' => 'index'), null, true );
				} else {
					$this->data['User']['password1'] = null;
					$this->data['User']['password2'] = null;
					$this->Session->setFlash('Пароль не был изменен');
				}
	
    	}

    }
//--------------------------------------------------------------------
    function reset() {
    	$this->subheaderTitle = 'ВОССТАНОВЛЕНИЕ ПАРОЛЯ';
    	
    	if( empty($this->data) ) {
    		return;    		
    	}

		// Check email is correct
		$user = $this->User->find( 'first', array( 'conditions' => array('User.email' => $this->data['User']['email'] ), 'fields' => array('id', 'username', 'email'), 'contain' => false ) ) ;

		if(!$user) {
			$this->User->invalidate('email', 'Этот E-mail не зарегистрирован' );
			return;
		}
		
		// Generate new password
		$password = $this->userReg->createPassword();
		//debug ($user);
		$data['User']['password'] = $this->Auth->password($password);
		$this->User->id = $user['User']['id'];
		if(!$this->User->saveField('password', $this->Auth->password($password) ) ) {
			return;
		}
		
			// Send email
			if(!$this->__sendNewPasswordEmail( $user, $password) ) {
				$this->flash('Ошибка при отправке Email', 'reset', 10);
			}
			else {
				$this->flash('Новый пароль выслан на  '.$user['User']['email'].'. Please login', '/users/login', 10);
			}
    }
//--------------------------------------------------------------------
    /**
     * Send out an password reset email to the user email
     * 	@param Array $user User's details.
     *  @param Int $password new password.
     *  @return Boolean indicates success
    */
    function __sendNewPasswordEmail($user, $password) {

        // Set data for the "view" of the Email
        $this->set('password', $password );
        $this->set( 'username', $user['User']['username'] );
       
        $this->Email->to = $user['User']['username'].'<'.$user['User']['email'].'>';
        $this->Email->subject = env('SERVER_NAME') . ' - New password';
        $this->Email->from = 'noreply@' . env('SERVER_NAME');
        $this->Email->template = 'user_password_reset';
        $this->Email->sendAs = 'text';   // you probably want to use both :)   
        return $this->Email->send();
	}     
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		$id = $this->Auth->user('id');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid User');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Данные были сохранены');
				$this->redirect(array('controller' => 'pages', 'action'=>'index'), null, true);
			} else {
				$this->Session->setFlash('Данные не могут быть сохранены. попробуйте еще раз');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}

	}

//-------------------------------------------------------------------- 
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User');
			$this->redirect(array('action'=>'index'), null, true);
		}
		if ( $this->User->del($id) ) {
			$this->Session->setFlash('User #'.$id.' deleted');
			$this->redirect(array('action'=>'index'), null, true);
		}
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		$id = $this->Auth->user('id');
		if (!$id) {
			$this->Session->setFlash('Invalid User.');
			$this->redirect(array('action'=>'index'), null, true);
		}
		$this->set('user', $this->User->read(null, $id));

	}


//-----------------------------
	function admin_clearcache() {
		clearCache();
		$this->redirect( $this->referer() );
	}
}
?>