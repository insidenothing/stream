<div class="block" style="margin-top: 5px;">
	<div class="block-border">
		<div class="block-content">
			<h4 class="widgettitle">Basic Report for <?php echo $symbol;?></h4>
			<table cellspacing="0" cellpadding="2" border="1" width="100%" style="border-colapse:colaspe;">				
				<tr>
					<td style="white-space: pre">Published</td>
					<td style="white-space: pre">Name</td>
					<td style="white-space: pre">Symbol</td>
					<td>Manager</td>
					<td style="white-space: pre">Catagory</td>
					<td style="white-space: pre">Shares (mm)</td>
					
					<td style="white-space: pre">Price Low</td>
					<td style="white-space: pre">Pre IPO Price</td>
					<td style="white-space: pre">Price High</td>
					
					<td style="white-space: pre">Pre IPO Amount (mm)</td>
					<td style="white-space: pre">Estimate</td>
					
					<td style="white-space: pre">Expected</td>
					<td style="white-space: pre">40 Day</td>
					<td style="white-space: pre">180 Day</td>
					<td>Recommendation</td>
					<td>Rating</td>
					<td>Report</td>
				</tr>
			<?php echo $details; ?>
			</table>


		</div>
	</div>
</div>


<div class="block" style="margin-top: 5px;">
	<div class="block-border">
		<div class="block-content">
		<?php if ($premium == 'yes') { ?>
			<h4 class="widgettitle">Premium Report</h4>			
			<?php echo $premium_content; ?>
		<?php }else{ ?>
			 <div class="block" style="margin-bottom: 15px;">
	<div class="block-border">
		<div class="block-content">
			<h4 class="widgettitle">SyndicateStream Pricing</h4>
			<div class="widget widget_text" id="text-2">
			Basic: 24.99 
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="BRMPPUCCDRDRJ">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

 <br /><br /><br />

Includes timing and deal size, structure, underwriters and economics, and the SyndicateStream heat rating.
<br /><br /><br />
 

Advanced: 39.99 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="GDDDTZMVWWBYA">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

 <br /><br /><br />

All of the above plus book color updated throughout the day as we hear it, comparative financials to industry peers, and concessions if available.
<br /><br /><br />
 

Institutional: Call us for Pricing
<br /><br /><br />
 

Fixed Income: Call us for Pricing<br /><br /><br /><br /><br />
<A HREF="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=P2SQGTQQATJ6E">
<IMG SRC="https://www.paypalobjects.com/en_US/i/btn/btn_unsubscribe_LG.gif" BORDER="0">
</A>
			</div>
		</div>
	</div>
</div>
 
		<?php } ?>
		</div>
	</div>
</div>

<?php if ($operator != ''){ ?>

<div class="block" style="margin-top: 5px;">
<div class="block-border">
<div class="block-content">
<h4 class="widgettitle">Operator: <?php echo $operator;?></h4>
			<div class="widget widget_text" id="text-2">
				<li><a href="/ipo/edit/<?php echo $symbol;?>">Edit IPO</a></li>
			</div>
		</div>
	</div>
</div>

	
<?php }else{?>
<small>[User]</small>
<?php }?>
