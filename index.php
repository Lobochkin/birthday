<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width,initial-scale=1"> 
	<title>Сколько ещё ждать</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class="container">
			<h2>Ваши данные:</h2>
	    	<!-- Контейнер для вывода результата (id = "result") -->
	    	<div class="result" id="result">Введите в таблицу Имя и день рождения</div>
		<form class="form" method="post" id="form">
			<p class="form__title"><b>Таблица для ввода данных</b></p>
			<ul class="form__inner">
  				<li>
  					<label for="name" >Ваше имя ? </label>
					<input id="name" type="text" name="name" value="<?=$_COOKIE['name']??''?>" required>
				</li>
				<li>
					<label for="date" >Когда Ваш день рожденья ? </label>
					<input id="date" type="date" name="data">
				</li>
				<li>
					<button class="form__button" id="button">Отправить</button>
				</li>
			</ul>
		</form>	
	</div>
	<script src="script.js"></script>
</body>
</html>



