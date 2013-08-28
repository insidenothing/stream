<form method="post">
Name:<br>
<input value="<?PHP echo $name;?>"><br>
<br>
Link:<br>
<input value="<?PHP echo $link;?>"><br>
<br>
<?PHP if ($name != ''){?>
	<input type="submit" value="Save Update"> or <a href="/media">Discard and/or Start New</a>
	<input type="hidden" name="query_type" value="update">
<?PHP }else{ ?>
	<input type="submit" value="Save New">
	<input type="hidden" name="query_type" value="insert">
<?PHP } ?>
</form>
<?PHP echo $list;?>

<?PHP echo $results;?>