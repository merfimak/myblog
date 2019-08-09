<form action="<?php isset($article->id) ? '/Admin/Edit?id=' . $article->id :  '/Admin/add'  ?>" method="post">
	<p>название</p>
	<input type="text" name="title" value="<?php echo $article->title ?>"><br>
	<p>текст</p>
	<textarea name="text" cols="60" rows="10" ><?php echo $article->text ?></textarea><br>
	<input type="submit" name="Add" value="Add">
</form>
<?php echo $msg; ?>