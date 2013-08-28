 <div class="block" style="margin-bottom: 15px; height:450px;">
	<div class="block-border">
		<div class="block-content">
			<h4 class="widgettitle">TV and Press</h4>
			<div class="widget widget_text" id="text-2">
			
			
			<?PHP if ($level == 'Operator'){?>
				<div class="title">Speed in Simplicity...</div>
				<form method="post">
				Name:<br>
				<input name="name" value="<?PHP echo $name;?>"><br>
				<br>
				Link:<br>
				<input name="link" value="<?PHP echo $link;?>"><br>
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
			<?PHP } ?>
			<?PHP echo $public;?>
			
			
			</div>
		</div>
	</div>
</div>
 