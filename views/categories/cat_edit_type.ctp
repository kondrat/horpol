	<?php
		if(isset($catEditType) && $catEditType != null) {
			echo $this->element('category/category_type',array('catType'=>$catEditType) );
		} else {
			if(isset($blin)){
				echo $blin;
			} else {
				echo 'nu';
			}
		}
	?>
