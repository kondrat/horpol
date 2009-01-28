
<?php echo $html->image('gallery/b/'.$image['Image']['image']);?>
<br />
<?php echo $html->link('Редактировать '.$image['Image']['name'], array('action' => 'edit',$image['Image']['id']), null  ); ?>

<br />
<?php echo $html->link('Удалить '.$image['Image']['name'], array('action' => 'delete',$image['Image']['id']), null, sprintf('Удалить   %s?', $image['Image']['name']) ); ?>
<br />
<?php //debug($image);?>


