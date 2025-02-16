<?php echo $this->Form->create("Share", array("action" => "post", "inputDefaults" => array("div" => false, "label" => false, "cols" => null, "rows" => null)))?>
	<h2>SNS投稿</h2>
	<table class="edit shares table table-bordered">
		<tr>
			<th nowrap="nowrap">URL</th>
			<td><?php echo $this->Form->input("link", array("type" => "text"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">本文</th>
			<td><?php echo $this->Form->input("body", array("type" => "textarea"))?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">Facebook token</th>
			<td>
				<?php echo $fbPageToken?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">投稿</th>
			<td>
				<?php echo $this->Form->submit("投稿", array("class" => "btn btn-primary"))?>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end()?>