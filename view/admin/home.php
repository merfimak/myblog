<h3>Привет админ</h3>	

<a href="/admin/add"><strong>Написать новую статью</strong></a>
<hr>

<?php foreach($this->data['items'] as $news): ?>
<div class="edit_list">
	<div class="edit_list_a"><a href="article/One?id=<?php echo $news->id?>"><?php echo $news->title;?></a></div>
	<a href="/admin/edit?id=<?php echo $news->id?>">редактировать</a>
	<form action="/admin/destroy?id=<?php echo $news->id?>" method="POST">
		<input type="submit" value="удалить" >
	</form>
</div>
<?php endforeach; ?>