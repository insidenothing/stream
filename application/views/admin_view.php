<div class="title">Speed in Simplicity...</div>
<table><tr><td>
<table>
	<tr>
		<td>Database</td>
		<td>Human</td>
		<td>Input</td>
	</tr>
	<tr>
		<td>id</td>
		<td>auto-increment</td>
		<td>automatic</td>
	</tr>
	<tr>
		<td>published_date</td>
		<td>first published</td>
		<td>automatic</td>
	</tr>
	<tr>
		<td>updated_datetime</td>
		<td>last updated</td>
		<td>automatic</td>
	</tr>
</table>
</td><td>
<table>
	<tr>
		<td>name</td>
		<td>Company Name</td>
		<td><input></td>
	</tr>
	<tr>
		<td>symbol</td>
		<td>Symbol</td>
		<td><input></td>
	</tr>
	<tr>
		<td>managers</td>
		<td>Managers</td>
		<td><input></td>
	</tr>
	<tr>
		<td>catagory</td>
		<td>Type</td>
		<td><input></td>
	</tr>
	<tr>
		<td>shares</td>
		<td>Shares</td>
		<td><input>M</td>
	</tr>
	<tr>
		<td>price</td>
		<td>Priced at</td>
		<td>$<input></td>
	</tr>
	<tr>
		<td>updates</td>
		<td>Update Notes</td>
		<td><textarea></textarea></td>
	</tr>
</table>
</td></tr>
<tr><td colspan="2">
<?PHP echo $list; ?>
</td></tr></table>