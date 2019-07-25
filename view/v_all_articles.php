<?php foreach($this->data['items'] as $news): ?>

<h1><a href="One?id=<?php echo $news->id?>"><?php echo $news->title;?></a></h1>	
<div>	<?php echo $news->text;?></div>
<hr>

<?php endforeach; ?>
