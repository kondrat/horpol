<?php  
 class UserFixture extends CakeTestFixture { 
	var $name = 'User'; 
	//var $import = array('model' => 'User', 'records' => true);  
         
      var $fields = array( 
          'id' => array('type' => 'integer', 'key' => 'primary'), 
          'username' => array('type' => 'string', 'length' => 64, 'null' => false), 
          'password' => array('type' => 'string', 'length' => 64, 'null' => false), 
          'created' => 'datetime', 
          'updated' => 'datetime' 
      ); 
      var $records = array( 
          array ('id' => 2, 'username' => 'kondrat', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'created' => '2007-03-18 10:39:23', 'updated' => '2007-03-18 10:41:31'), 
          array ('id' => 3, 'username' => 'admin', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99','created' => '2007-03-18 10:39:23', 'updated' => '2007-03-18 10:41:31'), 
          array ('id' => 4, 'username' => 'za', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'created' => '2007-03-18 10:39:23', 'updated' => '2007-03-18 10:41:31'), 
      ); 
      
 } 
 ?> 