<?php  
   App::import('Model','User'); 

   class UserTestCase extends CakeTestCase { 
		var $fixtures = array( 'app.user' ); 
		
		function testGetUserData() {
			$this->User =& ClassRegistry::init('User');
			
			$result = $this->User->getUserData( 'kondrat' );
			$expected = array('ID' => 2);

		    
			$this->assertEqual($result, $expected);
		}
		/*
		function testUserTe() {
			$this->User =& ClassRegistry::init('User');
			
			$result = $this->User->userTe( );
			//debug($result);
			$expected = 'kondrat';		    
			$this->assertEqual($result, $expected);
		}
		*/

   } 
 ?> 