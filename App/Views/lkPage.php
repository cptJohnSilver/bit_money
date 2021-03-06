<?php
require 'baseTop.php';
?>
		<br><a href='index.php'>Главная</a><br>
		<h1>Личный кабинет</h1>
		<?php if ($loggedIn) {
			if ((isset($result)) && ($result == true) && (isset($quantity))){
				echo "<div class='alert alert-success'>Операция выполнена успешно.</div>";
				echo "<div class='alert alert-success'>С вашего счета списано ".$quantity." условных единиц.</div>";
			} elseif ((isset($result)) && ($result == false) && (isset($quantity))) {
				echo "<div class='alert alert-danger'>При выполнении операции возникла ошибка.</div>";
				echo "<div class='alert alert-danger'>Не удалось списать ".$quantity." условных единиц с Вашего счета.</div>";
			}
		?>
		<p>Приветствую, <b><?= htmlspecialchars($user, ENT_QUOTES); ?></b>!</p>
		<p>На Вашем счете <b><?= $balance; ?></b> условных единиц.</p>
		<p>Чтобы списать средства, Вы можете воспользоваться формой ниже:</p>
		<form class='form-inline' action='index.php?section=users&action=transaction' method='post'>
			<div class='form-group'>
				<input class='form-control mx-sm-3' type='text' name='quantity'><br>
				<button class='btn btn-primary' type='submit'>Списать</button>
			</div>
		</form><br>
		<p><a href='index.php?section=users&action=logout'>Завершить работу в системе</a></p>
		<?php } else { ?>
		<p>Чтобы начать работу, необходима <a href='index.php?section=users&action=login'>авторизация</a>.</p>
		<?php } ?>
<?php
require 'baseFooter.php';
?>