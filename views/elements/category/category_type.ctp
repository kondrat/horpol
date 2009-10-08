<?php 
	if (isset($catType)&&$catType != null ) {
		switch($catType) {
			case 1:
				echo 'Товары без описания (Основной тип)';
			break;
			case 2:
				echo 'Товары без Бренда (пример: Винтаж)';
			break;
			case 3:
				echo 'Товары с описанием (пример: Лаки)';
			break;
			default:
				echo 'Товары без описания (Основной тип)';
			break;
		}
	}
?>