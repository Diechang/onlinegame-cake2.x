<?php echo $this->Session->flash("auth")?>
<?php if ($this->Session->check("Message.auth")) $this->Session->flash("auth");?>
<?php echo $this->Form->create("User", array("url" => array("action" => "login"), "inputDefaults" => array("div" => false, "label" => false)))?>
	<table id="login" class="table table-bordered">
		<tr>
			<th>User</th>
			<td><?php echo $this->Form->input("username");?></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><?php echo $this->Form->input("password");?></td>
		</tr>
		<tr>
			<th>Login</th>
			<td><?php echo $this->Form->submit("login", array("class" => "btn"))?></td>
		</tr>
	</table>
<?php echo $this->Form->end();?>
