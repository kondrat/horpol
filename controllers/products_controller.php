<?php
class ProductsController extends AppController {

	var $name = 'Products';
	//var $helpers = array('Html', 'Form');
	var $paginate = array('limit' => 5);
	var $components = array('Upload');
	var $uses = array('Product', 'Brand','Category', 'SubCategory');
//--------------------------------------------------------------------	
  function beforeFilter() {
        //$this->Auth->allow('view', 'index','addProduct');
        parent::beforeFilter();  
        $this->set('headerName','Товары');
    }
//--------------------------------------------------------------------

	function admin_index() {
		if ( isset($this->params['named']['subcat'])&&$this->params['named']['subcat']!=null ) {
			
			$conditions = array('subcategory_id' => $this->params['named']['subcat']);
			
			$this->set('dataToShow',$this->Product->SubCategory->find('first', array('conditions' => array('SubCategory.id'=>$this->params['named']['subcat']), 
																																'fields' => array('SubCategory.name'),
																																'contain'=> array('Category'=>array('fields'=>array('Category.name')),
																																									'Brand'=>array('fields'=>array('Brand.name'))),
																																) 
																									) 
								);
		} else {
			$conditions = array();
			$this->set('dataToShow',null);
		}
		$this->paginate['Product'] = array(
			'contain' => false,
			'limit' => 10,
			'order' => array('Product.created' => 'desc'),
			'conditions' => $conditions,
		);

		$this->set('products', $this->paginate());
	}
//--------------------------------------------------------------------
	function admin_view($id = null) {
		if ( (!$id) ||  ($this->Product->read(null, $id) == false ) ) {
			$this->Session->setFlash(__('Invalid Product.', true));
			$this->redirect(array('action'=>'index'));			
		} else {
			$this->set('product', $this->Product->read(null, $id));
		}
	}

//--------------------------------------------------------------------

	function admin_add() {
			
				//saving module
				if ( isset($this->data['Product']['name']) ) {
					
						/**
						 * We uploading the product photo first
						 *
						 */

						$file = array();
						// set the upload destination folder
						$destination = WWW_ROOT.'img'.DS.'catalog'.DS;

						// grab the file
						$file = $this->data['Product']['userfile'];

				
						if ($file['error'] == 4) {
							$this->data['Product']['logo'] = 'default.jpg';
							//$this->Session->setFlash('Файл не загружен');
							
						} else {
												
							// upload the image using the upload component
							$result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('150', '100') ) );
								if ( $result != 1 ){
									$this->data['Product']['logo'] = $this->Upload->result;
								} else {
									// display error
									$errors = $this->Upload->errors;
									// piece together errors
									if( is_array($errors) ) { 
										$errors = implode("<br />",$errors); 
									}	   
										$this->Session->setFlash($errors);
										$this->redirect(array('action' => 'add'), null, true);
								}
						}								
					
					
											
						$this->Product->create();
						if ($this->Product->save($this->data)) {						
							if ( isset($this->data['Product']['remember_cat']) && $this->data['Product']['remember_cat'] == 1 ) {
								$this->Session->write('CatBrandData.ses', true );
								$bla = $this->SubCategory->find('first', array( 'conditions' => array('SubCategory.id' => $this->data['Product']['subcategory_id'] ), 'fields' => array('SubCategory.name') ) );	
								$this->Session->write('CatBrandData.subcatFinal.id', $this->data['Product']['subcategory_id'] );	
								$this->Session->write('CatBrandData.subcatFinal.name', $bla['subCategory']['name'] );					
							} 
									
							$this->Session->setFlash('Товар был сохранен в базе');
							$this->redirect( array('action'=>'index',$this->data['Product']['subcategory_id']),null,true );
						} else {
							$this->Session->setFlash('Товар не был сохранен, попробуте еще раз');
							if (  isset($this->Upload->result) && $this->Upload->result != null) {
								@unlink($destination.$this->Upload->result);
							}
						}												
											
				}	

			

	}
//--------------------------------------------------------------------
	function addProduct() {
		$prodName = null;
		//$prodName = trim($this->data['Product']['name']);
		Configure::write('debug', 0);			
				//saving module
				if ( isset($this->data['Product']['name'])&& $this->data['Product']['name']!=null ) {
					
					$cropType = 'crop';
					if( isset($this->data['Product']['photoType']) && $this->data['Product']['photoType'] == 1 ) {
						$cropType = 'resizecrop';
					}
					
					
					
					$prodName = $this->data['Product']['name'];
						//unset($this->data['Product']['id']);
						/**
						 * We uploading the product photo first
						 *
						 */

						$file = array();
						// set the upload destination folder
						$destination = WWW_ROOT.'img'.DS.'catalog'.DS;
						
						$destinationB = WWW_ROOT.'img'.DS.'catalog'.DS.'b'.DS;
						$destinationS = WWW_ROOT.'img'.DS.'catalog'.DS.'s'.DS;
						// grab the file
						$file = $this->data['Product']['userfile'];

				
						if ($file['error'] == 4) {
							$this->data['Product']['logo1'] = null;
							echo json_encode(array('error'=>'Файл не загружен'));
							$this->autoRender = false;
							exit();									
						} else {

								// upload the image using the upload component
								for ( $i=0; $i<=1; $i++) {
									switch($i) {
										case(0):
											$result = $this->Upload->upload($file, $destinationS, null, array('type' => $cropType, 'size' => array('150', '100') ) ); 

											if ($result != 1) {
												$this->data['Product']['logo1'] = $this->Upload->result;
											}
											break;
										case(1):
											$result = $this->Upload->upload($file, $destinationB, null, array( ) );
											break;
									}
									if ( $result == 1 ) {
										// display error
										$errors = $this->Upload->errors;
										// piece together errors
										if( is_array($errors) ) { 
											$errors = implode("<br />",$errors); 
										}
						   
										echo json_encode(array('error'=>$errors));											
										$this->autoRender = false;
									 	exit();	
									}					
								}

						}								

											
						$this->Product->create();
						if ($this->Product->save($this->data)) {						
										
									$prodId = $this->Product->id;						
									$arr = array ( 'img'=> $this->data['Product']['logo1'],'prodId'=> $prodId,'prodName'=> $prodName );
									echo json_encode($arr);											
									$this->autoRender = false;
					 				exit();									
							
						} else {
									if (  isset($this->Upload->result) && $this->Upload->result != null) {
										@unlink($destinationB.$this->Upload->result);
										@unlink($destinationS.$this->Upload->result);
									}
									
									$arr = array ( 'error'=> 'Ошибка при сохранении товара' );
									echo json_encode($arr);												
									$this->autoRender = false;
					 				exit();														
						}												
											
				}	

			

	}
//--------------------------------------------------------------------
	function editProduct() {
		$prodName = null;
		//$prodName = trim($this->data['Product']['name']);
		Configure::write('debug', 0);			
				//saving module
			echo 'hi';
			exit;
					
					$cropType = 'crop';
					if( isset($this->data['Product']['photoType']) && $this->data['Product']['photoType'] == 1 ) {
						$cropType = 'resizecrop';
					}
					
					
					
					$prodName = $this->data['Product']['name'];
						//unset($this->data['Product']['id']);
						/**
						 * We uploading the product photo first
						 *
						 */

						$file = array();
						// set the upload destination folder
						$destination = WWW_ROOT.'img'.DS.'catalog'.DS;
						
						$destinationB = WWW_ROOT.'img'.DS.'catalog'.DS.'b'.DS;
						$destinationS = WWW_ROOT.'img'.DS.'catalog'.DS.'s'.DS;
						// grab the file
						$file = $this->data['Product']['userfile'];

				
						if ($file['error'] == 4) {
							$this->data['Product']['logo1'] = null;
							echo json_encode(array('error'=>'Файл не загружен'));
							$this->autoRender = false;
							exit();									
						} else {

								// upload the image using the upload component
								for ( $i=0; $i<=1; $i++) {
									switch($i) {
										case(0):
											$result = $this->Upload->upload($file, $destinationS, null, array('type' => $cropType, 'size' => array('150', '100') ) ); 

											if ($result != 1) {
												$this->data['Product']['logo1'] = $this->Upload->result;
											}
											break;
										case(1):
											$result = $this->Upload->upload($file, $destinationB, null, array( ) );
											break;
									}
									if ( $result == 1 ) {
										// display error
										$errors = $this->Upload->errors;
										// piece together errors
										if( is_array($errors) ) { 
											$errors = implode("<br />",$errors); 
										}
						   
										echo json_encode(array('error'=>$errors));											
										$this->autoRender = false;
									 	exit();	
									}					
								}

						}								

											
						$this->Product->create();
						if ($this->Product->save($this->data)) {						
										
									$prodId = $this->Product->id;						
									$arr = array ( 'img'=> $this->data['Product']['logo1'],'prodId'=> $prodId,'prodName'=> $prodName );
									echo json_encode($arr);											
									$this->autoRender = false;
					 				exit();									
							
						} else {
									if (  isset($this->Upload->result) && $this->Upload->result != null) {
										@unlink($destinationB.$this->Upload->result);
										@unlink($destinationS.$this->Upload->result);
									}
									
									$arr = array ( 'error'=> 'Ошибка при сохранении товара' );
									echo json_encode($arr);												
									$this->autoRender = false;
					 				exit();														
						}												
											
	

			

	}
//--------------------------------------------------------------------
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Несуществующий товар');
			$this->redirect(array('action'=>'index'));
		}

		$pageParam = Router::parse($this->referer());
		if(isset($pageParam['named']['page']) && $pageParam['named']['page'] != null) {
			$this->Session->write('editPage',$pageParam['named']['page']);
		}

		if (!empty($this->data)) {		
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.'catalog'.DS;
			//debug($destination );
			// grab the file
			$file = $this->data['Product']['userfile'];
			//debug($file);
			
			if ($file['error'] == 4) {
				unset($this->data['Product']['logo']);
				//$this->Session->setFlash('Файл не загружен');
				
			}else {				
					// upload the image using the upload component
					$result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => array('150', '100') ) );
					
					if ( $result != 1 ){
						if ( isset($this->data['Product']['logo']) && $this->data['Product']['logo'] != null) {
							$oldFile = $this->data['Product']['logo'];
							
						}
						$this->data['Product']['logo'] = $this->Upload->result;
					} else {
						// display error
						$errors = $this->Upload->errors;
						// piece together errors
						if( is_array($errors) ) { 
							$errors = implode("<br />",$errors); 
						}	   
							$this->Session->setFlash($errors);
							$this->redirect(array('action' => 'edit'), null, true);
					}
			}		
		
		

			if ($this->Product->save($this->data)) {
				$this->Session->setFlash('Изменения сохранены');
				@unlink($destination.$oldFile);
				if ( $this->Session->check('editPage') ) {
					$this->redirect( array('action'=>'index',$this->data['Product']['subcategory_id'],'page:'.$this->Session->read('editPage') ) );
				} else {
					$this->redirect(array('action'=>'index',$this->data['Product']['subcategory_id']));
				}
				
			} else {
				$this->Session->setFlash('Изменения не были сохранены. Попробуйте еще раз');
						$this->data['Product']['logo'] = $oldFile;
						if (  isset($this->Upload->result) && $this->Upload->result != null) {
							@unlink($destination.$this->Upload->result);
						}
			}
		}
		if (empty($this->data)) {
			$toEdit = $this->Product->find('first',array('conditions' => array('Product.id'=>$id),'fields'=>array('Product.id','Product.name','Product.logo','Product.subcategory_id','Product.content1'),'contain'=>array('subCategory' => array('fields'=>array('id'),'Category.type') ) ) );
			$this->data = $toEdit;
			$this->set('catType',$toEdit['subCategory']);
		}

	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Несуществующий товар');
			$this->redirect(array('controller' => 'sub_categories', 'action'=>'index'));
		} else {
			$del = $this->Product->find('first', array('conditions' => array('Product.id' => $id),'fields' => array('id','subcategory_id'), 'contain' => false ) );
		}
		if ($this->Product->del($id)) {
			$this->Session->setFlash('Товар удален');
			$this->redirect(array('action'=>'index',$del['Product']['subcategory_id']));
		}
	}
//--------------------------------------------------------------------
	function admin_delall() {
		if ( isset($this->data['Product']) ) {
			$count = 0;
			foreach($this->data['Product']['id'] as $value) {  
				if($value != 0) { 
					if($this->Product->delete($value) ){
						$count = 1; 
					} 
				}  
			}
			if ($count == 0) {
				$this->Session->setFlash('Вы не выбрали товары','default',array('class'=>'er'));
			} else {
				$this->Session->setFlash('Товары удалены');
			}
			$this->redirect($this->referer());
			$this->Session->setFlash('here');
		} else {
			$this->Session->setFlash('Удаление невозможно','default',array('class'=>'er'));
			$this->redirect($this->referer());
		}
	}
//--------------------------------------------------------------------
}
?>