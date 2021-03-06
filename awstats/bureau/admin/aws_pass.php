<?php
/*
 ----------------------------------------------------------------------
 AlternC - Web Hosting System
 Copyright (C) 2000-2012 by the AlternC Development Team. 
 https://alternc.org/ 
 ----------------------------------------------------------------------
 LICENSE

 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License (GPL)
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 To read the license please visit http://www.gnu.org/copyleft/gpl.html
 ----------------------------------------------------------------------
 Purpose of file: Change a user's password.
 ----------------------------------------------------------------------
*/
require_once("../class/config.php");

$fields = array (
	"login" => array ("request", "string", ""),
	"pass"  => array ("request", "string", ""),
	"passconf"  => array ("request", "string", ""),
);

getFields($fields);

if (!$aws->login_exists($login)) {
	$error=$err->errstr();
	include("aws_users.php");
	exit();
}

if ($pass) {
    if ($pass != $passconf) {
	$error = _("Passwords do not match");
	include("aws_users.php");
        exit();
    }else{
	if (!$aws->change_pass($login,$pass)) {
		$error=$err->errstr();
	} else {
		$error = _("Password successfuly updated");
		include("aws_users.php");
		exit();
	}
    }
}

include_once("head.php");

?>
<h3><?php __("Change a user's password"); ?></h3>
<?php
if (isset($error) && $error) {
?>
<p class="error"><?php echo $error ; $error=''; ?></p>
<?php } ?>

<form method="post" action="aws_pass.php" name="main" id="main">
<?php csrf_get(); ?>
<table class="tedit">
<tr><th>
<?php __("Username"); ?></th><td>
	<code><?php echo $login; ?></code> <input type="hidden" name="login" value="<?php echo $login; ?>" />
</td></tr>
<tr><th><label for="pass"><?php __("New Password"); ?></label></th><td><input type="password" class="int" name="pass" id="pass" value="<?php echo $pass; ?>" size="20" maxlength="64" /><?php display_div_generate_password(DEFAULT_PASS_SIZE,"#pass","#passconf"); ?></td></tr>
<tr><th><label for="passconf"><?php __("Confirm password"); ?></label></th><td><input type="password" class="int" name="passconf" id="passconf" value="" size="20" maxlength="64" /></td></tr>
<tr class="trbtn"><td colspan="2">
  <input type="submit" class="inb" name="submit" value="<?php __("Change this user's password"); ?>" />
  <input type="button" class="inb" name="cancel" value="<?php __("Cancel"); ?>" onclick="document.location='aws_users.php'"/>
</td></tr>
</table>
</form>

<script type="text/javascript">
document.forms['main'].pass.focus();
document.forms['main'].setAttribute('autocomplete', 'off');
</script>


<?php include_once("foot.php"); ?>
