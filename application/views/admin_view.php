<div class="title">Speed in Simplicity...</div>
<form>
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
		<td>Update Notes<br /><textarea name="updates" cols="45" rows="15"><?PHP echo $updates;?></textarea></td>
	</tr>
</table>
</td></tr>
<tr><td colspan="2">
<?PHP if ($name != ''){?>
	<input type="submit" value="Save Update">
<?PHP }else{ ?>
	<input type="submit" value="Save New">
<?PHP } ?>
</td></tr>
<tr><td colspan="2">
<?PHP echo $list; ?>
</td></tr></table>
</form>