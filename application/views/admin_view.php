<div class="title">Speed in Simplicity...</div>
<div class="title"><?PHP echo $results; ?></div>
<form method="post">
<table><tr><td>
<table>
	<tr>
		<td>Company Name</td>
		<td><input name="name" value="<?PHP echo $name;?>"></td>
	</tr>
	<tr>
		<td>Symbol</td>
		<td><input name="symbol" value="<?PHP echo $symbol;?>"></td>
	</tr>
	<tr>
		<td>Managers</td>
		<td><input name="managers" value="<?PHP echo $managers;?>" size="25"></td>
	</tr>
	<tr>
		<td>Type</td>
		<td><input name="catagory" value="<?PHP echo $catagory;?>"></td>
	</tr>
	<tr>
		<td>Shares</td>
		<td><input name="shares" value="<?PHP echo $shares;?>" size="5">M</td>
	</tr>
	<tr>
		<td>Priced at</td>
		<td>$<input name="price" value="<?PHP echo $price;?>" size="5"></td>
	</tr>
</table>
</td><td>
<table>
	<tr>
		<td>Release Notes*<br /><textarea name="updates" cols="45" rows="15"><?PHP echo $updates;?></textarea><br />*You can use HTML,<br /><?PHP echo htmlspecialchars("<br>");?> for a line break,<br /><?PHP echo htmlspecialchars("<b>some text</b>");?> for <b>bold</b>.<br />Just remember, simple is good.</td>
	</tr>
</table>
</td></tr>
<tr><td colspan="2">
<?PHP if ($name != ''){?>
	<input type="submit" value="Save Update"> or <a href="/admin">Discard and/or Start New</a>
	<input type="hidden" name="query_type" value="update">
<?PHP }else{ ?>
	<input type="submit" value="Save New">
	<input type="hidden" name="query_type" value="insert">
<?PHP } ?>
</form>
<?PHP if ($name != ''){?>
<form method="post">
	<input type="submit" value="DELETE (This cannot be undone)">
	<input type="hidden" name="query_type" value="delete">
</form>
<?PHP } ?>
</td></tr>
<tr><td colspan="2">
<?PHP echo $list; ?>
</td></tr></table>
