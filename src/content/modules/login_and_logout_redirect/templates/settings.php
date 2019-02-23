<?php
if (Request::isPost()) {
    
    ?>
<div class="alert alert-success alert-dismissable fade in">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php translate("changes_was_saved")?>
		</div>
<?php
}
?>
<form
	action="<?php Template::escape(ModuleHelper::buildAdminURL("login_and_logout_redirect"));?>"
	method="post">
<?php csrf_token_html();?>
<h3><?php translate("login_redirect")?></h3>
	<table>
		<tr>
			<td><strong><?php translate("redirect_to");?></strong></td>
			<td><input type="text" name="login_redirect"
				value="<?php Template::escape(Settings::get("login_redirect"));?>"></td>
		</tr>
	</table>
	<h3><?php translate("logout_redirect")?></h3>
	<table>
		<tr>
			<td><strong><?php translate("redirect_to");?></strong></td>
			<td><input type="text" name="logout_redirect"
				value="<?php Template::escape(Settings::get("logout_redirect"));?>"></td>
		</tr>
	</table>
	<br />
	<p>
		<button type="submit" class="btn btn-default"><i class="fa fa-save"></i> <?php translate("save");?></button>
	</p>
</form>