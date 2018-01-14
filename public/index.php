<!DOCTYPE html>
<html lang="en">
	<head>
		<title>FDC Petty Cash</title>
		<meta charset='utf-8'>
		<?php require_once "../includes/cssincludes.php" ?>
	</head>
	<body>
		
		<?php require_once "pages/layout/_header.php" ?>
		<?php require_once "pages/layout/_topnav.php" ?>

		<div id="divcontent" class="divcontentbg">
			<div id="div-login" class="shadowed">
				<span id="login-link" class="pointer" title="Login">&nbsp;&nbsp;USER LOGIN</span>
				<div id="login-panel" >
					<form id="frmlogin">
						<table width="100%">
							<tr>
								<td>USERNAME</td>
							</tr>
							<tr>
								<td><input name="username" id="username" type="text" value=""/></td>
							</tr>
							<tr>
								<td>PASSWORD</td>
							</tr>
							<tr>
								<td><input name="password" id="password" type="password" value="" autocomplete="true" /></td>
							</tr>
							<tr>
								<td><br><img id="btn-login" class="pointer" src="/PETTY_CASH/images/24b.png"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<table height="100%" width="100%">
				<tr align="center">
					<td><h2 class='stroked' id="lbl-welcome"></h2></td>
				</tr>
			</table>
		</div>

		<?php require_once "pages/layout/_footer.php" ?>
		<?php require_once "../includes/jsincludes.php" ?>
		<script src="scripts/User.js"></script>
		<script src="scripts/login/login.js"></script>
	</body>
</html>