<?php
class BannersController extends AppController {

	var $name = 'Banners';
	var $components = array('Upload');
	
//--------------------------------------------------------------------	
  function beforeFilter() {
        $this->Auth->allow('statpage');
        parent::beforeFilter(); 
        $this->set('headerName','Баннеры'); 
   }
//--------------------------------------------------------------------

	function admin_index() {
		$conditions = array();	
		if(isset($this->params['named']['type'])&&$this->params['named']['type'] != null) {
			$conditions = array('Banner.type'=>$this->params['named']['type']);
		} 
		
		
		$banners = $this->Banner->find('all',array('conditions'=>$conditions,'contain'=>false));
		$this->set('banners', $banners);
	}
	
//--------------------------------------------------------------------

	function statpage($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid StaticPage.', true));
			$this->redirect(array('controller'=>'pages','action'=>'index'));
		}
		if (isset($this->params['requested'])) {
			$banner = $this->Banner->StaticPage->find('first',array('conditions'=>array('StaticPage.id'=>$id),'fields'=>array('StaticPage.id'),'contain'=>array('Banner'=>array('fields'=>array('Banner.logo','Banner.url'),'order'=> array('BannersStaticPage.id'=>'DESC') )) ) );
			return $banner;
		} else {
			exit();
		}					
	}
	
//--------------------------------------------------------------------

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Banner.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('banner', $this->Banner->read(null, $id));
	}
//--------------------------------------------------------------------	
	function admin_append($id = null) {
		$categories = array();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Banner', true));
			$this->redirect(array('action'=>'index'));
		}

		$banner = $this->Banner->find('first',array('conditions'=>array('Banner.id'=>$id),'fields'=>array('id','logo','type'),'contain'=>false ) );
		
		$this->set('banner',$banner);
		
		if(isset($banner['Banner']['type'])&&$banner['Banner']['type']== 1){
			
			$staticpages = $this->Banner->StaticPage->find('first',array('conditions'=>array('StaticPage.id'=>1),'fields'=>array('id','name'), 'contain' => array('Banner'=>array('fields'=>array('Banner.id'),'order'=> array('BannersStaticPage.id'=>'DESC') ) ) ) );
			$this->set('staticpages',$staticpages);	
				
			$categories = $this->Banner->Category->find('all',array('fields'=>array('id','name','type'), 'contain' => array('Banner'=> array('fields'=> array('Banner.id'),'order'=> array('BannersCategory.id'=>'DESC') ) ) ) );
			$this->set('categories',$categories);	
								
		} elseif (isset($banner['Banner']['type'])&&$banner['Banner']['type']== 2) {
						

			$categories = $this->Banner->Category->find('all',array('conditions'=>array('Category.type <>'=>'2'),
																															'fields'=>array('id','name','type'),
																															'contain'=>array('Brand'=>array('id','name') )//array('BrandsCategory'=>array('Banner','Brand'=>array('id','name'))) 
																															) 
																									);

			//$this->set('categories',$categories);	
			
			$catBrandBanner = $this->Banner->BrandsCategory->find('all',array(	'conditions'=>array(),
																																					'order'=>array(),
																																					'contain'=>array(	'Category'=>array('id','name'),
																																														'Brand'=>array('name'),
																																														'Banner'=>array('fields'=>array('id','logo'),'order'=>array('BannersBrandsCategory.id'=>'DESC') ) 
																																													) 
																																				) 
																													);
			$this->set('catBrandBanner',$catBrandBanner);


			$new = array();
			$i = 0;
			foreach( $categories as $cat ) {

				$j = 0;
				foreach( $catBrandBanner as $cb ) {
					
					if( $cat['Category']['id'] == $cb['Category']['id'] ) {
											
						$new[$i]['cat']['name'] = $cat['Category']['name'];
						$new[$i]['cat']['type'] = $cat['Category']['type'];
						$new[$i]['item'][$j]['BrandsCategory'] = $cb['BrandsCategory']['id'];
						$new[$i]['item'][$j]['Brand'] = $cb['Brand'];
						$new[$i]['item'][$j]['Banner'] = $cb['Banner'];
					}
					$j++;
					
				}
	
				$i++;
			}

			$this->set('new',$new);
			
			
		}

		
	}
//--------------------------------------------------------------------
	function admin_glue() {
				
				if( isset($this->data['Category']['Category']) ){
					
					$CatCat = $this->data['Category']['Category'];
					$this->data['Category']['Category'] = array();
					
					foreach( $CatCat as $cc){
						if($cc != 0){
							$this->Banner->BannersCategory->deleteAll(array('BannersCategory.category_id' => $cc));
							$this->data['Category']['Category'][] = $cc;
						}
					}
					
					$StaticPage = $this->data['StaticPage']['StaticPage'];
					$this->data['StaticPage']['StaticPage'] = array();
							
					foreach( $StaticPage as $cp){
						if($cp != 0){
							//$this->Banner->bindModel(array('hasMany'=>'BannersStaticPage'));
							$this->Banner->BannersStaticPage->deleteAll(array('BannersStaticPage.static_page_id' => $cp));
							$this->data['StaticPage']['StaticPage'][] = $cp;
						}
					}		
		
		
				$this->Banner->create();
				if ($this->Banner->save($this->data)) {
					$this->Session->setFlash('Баннер был прикреплен');
					$this->redirect(array('action'=>'index'));
				} else {
						$this->Session->setFlash('Баннер не был прикреплен');
				}
				
			} else {
				$this->Session->setFlash('Баннер не был прикреплен');
			}				
				
	}
//--------------------------------------------------------------------
	function admin_glue2() {
				
				if( isset($this->data['BrandsCategory']['BrandsCategory']) ){
					
					$CatCat = $this->data['BrandsCategory']['BrandsCategory'];
					$this->data['BrandsCategory']['BrandsCategory'] = array();
					
					foreach( $CatCat as $cc){
						if($cc != 0){
							$this->Banner->BannersBrandsCategory->deleteAll(array('BannersBrandsCategory.brand_category_id' => $cc));
													
							$this->data['BrandsCategory']['BrandsCategory'][] = $cc;
						}
					}
					
		
		
		
				$this->Banner->create();
				if ($this->Banner->save($this->data)) {
					$this->Session->setFlash('Баннер был прикреплен');
					$this->redirect(array('action'=>'index'));
				} else {
						$this->Session->setFlash('Баннер не был прикреплен');
				}
				
			} else {
				$this->Session->setFlash('Баннер не был прикреплен');
			}				
				
	}
//--------------------------------------------------------------------
	function admin_add() {
		if (!empty($this->data)) {
			
			$bannerSize = array('700', '120');
			
			
			if( !empty($this->data['Banner']['type']) ) {
				if ($this->data['Banner']['type'] == 2 ) {
					$bannerSize = array('500', '70');
				}
			} 
			
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.'banner'.DS;
			//debug($destination );
			// grab the file
			$file = $this->data['Banner']['userfile'];
			//debug($file);
			
			if ($file['error'] == 4) {
				$this->data['Banner']['logo'] = null;
				$this->Session->setFlash('Файл не загружен','default',array('class'=>'er'));
				
			}else {
									
				// upload the image using the upload component
				//old $result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => $bannerSize ) );
				$result = $this->Upload->upload($file, $destination, null, array() );
					if ( $result != 1 ){
						$this->data['Banner']['logo'] = $this->Upload->result;
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
			
			if ( isset($this->data['Banner']['logo']) && $this->data['Banner']['logo'] != null ) {	
						
				$this->Banner->create();
				if ($this->Banner->save($this->data)) {
					$this->Session->setFlash('Баннер был сохранен');
					$this->redirect(array('action'=>'index'));
				} else {
						$this->Session->setFlash('Баннер не был сохранен','default',array('class'=>'er'));
						if (  isset($this->Upload->result) && $this->Upload->result != null) {
							@unlink($destination.$this->Upload->result);
						}
				}
				
				
			}
						
		}

	}
//--------------------------------------------------------------------
	function bannerEditLogo() {
		Configure::write('debug', 0);
		if (!empty($this->data)) {

			$bannerSize = array('700', '120');
			
			
			if( !empty($this->data['Banner']['type']) ) {
				if ($this->data['Banner']['type'] == 2 ) {
					$bannerSize = array('500', '70');
				}
			} 


			
			$file = array();
			// set the upload destination folder
			$destination = WWW_ROOT.'img'.DS.'banner'.DS;
			// grab the file
			$file = $this->data['Banner']['userfile'];

			if ($file['error'] == 4) {
				$this->data['Banner']['logo'] = null;
					echo json_encode(array('error'=>'Файл не загружен'));
					$this->autoRender = false;
					exit();							
			}else {
									
				// upload the image using the upload component
				// old $result = $this->Upload->upload($file, $destination, null, array('type' => 'resizecrop', 'size' => $bannerSize ) );
				$result = $this->Upload->upload($file, $destination, null, array() );
					if ( $result != 1 ){
						$this->data['Banner']['logo'] = $this->Upload->result;
					} else {
						// display error
						$errors = $this->Upload->errors;
						// piece together errors
						if( is_array($errors) ) { 
							$errors = implode("<br />",$errors); 
						}	   
							//$this->Session->setFlash($errors);
						echo json_encode(array('error'=>$errors));											
						$this->autoRender = false;
					 	exit();	
					}
			}			
			
					
			if ( isset($this->data['Banner']['logo']) && $this->data['Banner']['logo'] != null ) {							
					$this->Banner->create();
					if ($this->Banner->save($this->data)) {
									
									$arr = array ( 'img'=> $this->data['Banner']['logo'] );
									echo json_encode($arr);											
									$this->autoRender = false;
					 				exit();
					} else {
						if (  isset($this->Upload->result) && $this->Upload->result != null) {
							@unlink($destination.$this->Upload->result);
						}
									echo json_encode('error');											
									$this->autoRender = false;
					 				exit();					
						
					}
			}

		}
	}

//--------------------------------------------------------------------
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Banner', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Banner->save($this->data)) {
				$this->Session->setFlash(__('The Banner has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Banner could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Banner->read(null, $id);
		}
		$categories = $this->Banner->Category->find('list');
		$this->set(compact('categories'));
	}
//--------------------------------------------------------------------
	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Баннер не был удален','default',array('class'=>'er'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Banner->del($id)) {
			$this->Session->setFlash('Баннер удален');
			$this->redirect(array('action'=>'index'));
		}
	}
//--------------------------------------------------------------------
	function bannerEditUrl() {
		Configure::write('debug', 0);
		$this->layout = 'ajax';
		$this->autorender = false;
		if ($this->data) {
			if ($this->RequestHandler->isAjax()) {		
									
						
						
						$this->Banner->set($this->data);
						$errors = $this->Banner->invalidFields();
						if($errors['url'] != null) {
							//echo $errors['url'];
							echo 1;						
							exit;
						}
						
						$this->Banner->id = (int)$this->data['Banner']['id'];
						if( $this->Banner->saveField('url',trim($this->data['Banner']['url']),true ) ) {
								echo trim($this->data['Banner']['url']);
						} else {
							//echo 	$this->data['Brand']['id'];
							echo $this->Banner->id;
						}			
						exit;		
			}	
		}		
	}
//--------------------------------------------------------------------
}
?>