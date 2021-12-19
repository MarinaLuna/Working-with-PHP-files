<?php

	$familia=$_POST["familia"];
	$name=$_POST["name"];
	$otchestvo=$_POST["otchestvo"];
	$databd=$_POST["databd"];
	$nompas=$_POST["nompas"];
	$number=$_POST["number"];
	$login=$_POST["login"];
	$mail=$_POST["mail"];
	$data=$_POST["data"];
	$spect=$_POST["spect"];
	$question=$_POST["question"];
	$payment=$_POST["payment"];
	$zam=$_POST["zam"];
	$promo=$_POST["promo"];
	$str = '';

	if (!empty($_POST['dop']))
		{
			$dop = $_POST['dop'];
			foreach($dop as $index)
				{
					if ($index == 'a1')
					{
						$str .= "Высшее &nbsp;";
					}
					if ($index == 'a2')
					{
						$str .= "СПО &nbsp;";
					}
					if ($index == 'a3')
					{
						$str .= "Закончил(а) школу &nbsp;";
					}
				}
		} else {
				$str .= "Образование не выбрано";
		};

	if (empty($_POST['zam']))
	{
		$str1 = "Достижений нет";
	} else{
		$str1 = $zam;
	}

	if ($question=='a1'){
		$str2 = "Сокращенное(3 мес.)";
	} elseif ($question=='a2') {
		$str2 = "Полное(8 мес.)";
	}
	
	if (empty($_POST['promo']))
	{
		$str3 = "<img src='skidka.png' style='width: 7%'> Мы отправили Вам промокод на скидку 15% на E-mail!";
	}
	else {
		$str3 = "<img src='promo.png' style='width: 7%'> Промокод успешно применён!";
	}
	
	
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
				 				
}





$loginErr = '';
$nompasErr = '';

if (empty($_POST['login'])) {
$loginErr = '* Логин обязателен';
} else{
	$login = test_input($_POST['login']);
	if (!preg_match('/^[0-9]+:[А-Рк-э]{4}+\^.{0,}\*[e-m]{2}$/u',$login)){
		$loginErr = ' * Некорректно заполнен логин';
	}				 	
}

if (empty($_POST['nompas'])) {
$nompasErr = '* Номер паспорта обязателен';
} else{
	$nompas = test_input($_POST['nompas']);
	if (!preg_match('/[02468]{2}+[358]{2}+[3-7]{3}+[246]{3}/',$nompas)){
		$nompasErr = ' * Некорректно заполнен номер паспорта';
	}				 	
}



if ( (empty($_POST["login"])) or (empty($_POST["nompas"])) or (!empty($loginErr)) or (!empty($nompasErr))  ){
echo "
<!DOCTYPE HTML>
<html>
 <head>
 <meta charset='utf-8'>
 <link rel='stylesheet' href='style.css'>
 <title>Заявка на дистанционное обучение</title>
 </head>
	 <body>

	 	<div class='blok'>
		<h1>Дистанционное обучение</h1>
		<form action='main.php' method='post'>
			<div style='display: flex; flex-direction: column;''>
				<h1><em>Личные данные</em></h1>
						<label for='familia'>Фамилия</label>
						<input type='text' value='$familia' placeholder='Иванов' required name='familia'><span></span>
						<label for='name'>Имя</label>
						<input type='text' value='$name' placeholder='Иван' required name='name'><span></span>
						<label for='otchestvo'>Отчество</label>
						<input type='text' value='$otchestvo' placeholder='Иванович' required name='otchestvo'><span></span>
						<label for='databd'>Дата рождения</label>
						<input type='date' value='$databd' required name='databd'/>
						<label for='nompas'>Номер паспорта</label>
						<input type='text' value='$nompas' name='nompas'><span> </span>
						<label for='number'>Номер телефона </label>
						<input type='text' value='$number' placeholder='+7' maxlength='25' name='number' required><span></span>
						<label for='login'>Логин (номер студенческого билета)</label>
						<input type='text' value='$login' maxlength='25' placeholder='___:___^___*___' name='login'> <span> </span>
						<label for='mail'>E-mail</label>
						<input type='text' value='$mail' placeholder='ivan@mail.ru' required name='mail'><span></span>
			</div>


			<div style='display: flex; flex-direction: column;'>
					<h1><em>Обучение</em></h1>
						<label for='data'>Выберите дату начала обучения</label>
						<input type='date' required name='data'/>
						<label for='spect'>Выберите курс обучения</label>
						<select size='1' name='spect' required>
							<option selected value='$spect'>$spect</option>
							<option value='Разработка сайтов'>Разработка сайтов</option>
							<option value='Разработка мобильных приложений'>Разработка мобильных приложений</option>
							<option value='Анимация'>Анимация</option>
							<option value='UX/UI дизайн'>UX/UI дизайн</option>
						</select>
						<label for='question'>Выберите срок обучения</label>
						<div style='display: flex;'>
							<div><input type='radio' name='question' value='a1'>Сокращенное(3 мес.)</div>
							<div><input type='radio' name='question' value='a2'>Полное(8 мес.)</div>
						</div>
						<label for='payment'>Выберите способ оплаты</label>
						<div style='display: flex;'>
							<div><input type='radio' name='payment' value='money'>Наличные</div>
							<div><input type='radio' name='payment' value='card' checked>Банковская карта</div>
						</div>
				</div>

				<div style='display: flex; flex-direction: column;'>
					<h1><em>Дополнительная информация</em></h1>
						<label for='dop'>Какое образование Вы имеете на данный момент?</label>
						<div>
							<div><input type='checkbox' name='dop[0]' value='a1'>Высшее</div>
							<div><input type='checkbox' name='dop[1]' value='a2'> СПО</div>
							<div><input type='checkbox' name='dop[2]' value='a3'> Закончил(а) школу</div>
						</div>
						<label for='zam'>Ваши достижения</label>
						<textarea name='zam' rows='5' wrap='hard' placeholder='Ваши достижения'>$zam</textarea>
				</div>

				<div >
					<h1><em>Бонусная программа</em></h1>
						<label for='promo'>Промокод</label>
						<input type='text' name='promo'><span></span>
				</div>
			</div>
			
			
				
				<div class='btn'>
					<input type='submit' class='btn1' name='send' value='Оплата'>
					<input type='reset' class='btn1' name='clear' value='Очистить'>					
				</div>
				
			
		</form>
		</div>
		<style type='text/css'>
			.err{
				color: red;
			}
		</style>
	 </body>
</html> 
";
} else{




    $textForFile = "Личные данные\r\nФамилия:&nbsp;$familia\r\nИмя:&nbsp;$name\r\nОтчество:&nbsp;$otchestvo\r\nДата рождения:&nbsp;$databd\r\nНомер паспорта:&nbsp;$nompas\r\nНомер телефона:&nbsp;$number\r\nЛогин(номер студенческого билета):&nbsp;$login\r\nE-mail:&nbsp;$mail\r\nДополнительная информация\r\nВаши достижения:&nbsp;$zam";
    $file = "uploads/info.txt";
    $saved_file = fopen($file, 'w+');
    fwrite($saved_file, $textForFile);
    fclose($saved_file);


echo "
<!DOCTYPE HTML>
<html>
	<head>
		<title>Дистанционное обучение</title>
	</head>
	<body>
	
		<div class='blok'>
			<h2>Личные данные</h2>
				<h3><strong>Фамилия:</strong>&nbsp;$familia</h3>
				<h3><strong>Имя:</strong>&nbsp;$name</h3>
				<h3><strong>Отчество:</strong>&nbsp;$otchestvo</h3>
				<h3><strong>Дата рождения:</strong>&nbsp;$databd</h3>
				<h3><strong>Номер паспорта:</strong>&nbsp;$nompas</h3>
				<h3><strong>Номер телефона:</strong>&nbsp;$number</h3>
				<h3><strong>Логин(номер студенческого билета):</strong>&nbsp;$login</h3>
				<h3><strong>E-mail:</strong>&nbsp;$mail</h3>
			<h2>Обучение</h2>
				<h3><strong>Дата начала обучения:</strong>&nbsp;$data</h3>
				<h3><strong>Курс обучения:</strong>&nbsp;$spect</h3>
				<h3><strong>Срок обучения:</strong>&nbsp;$str2</h3>
				<h3><strong>Способ оплаты:</strong>&nbsp;$payment</h3>
			<h2>Дополнительная информация</h2>
				<h3><strong>Какое образование Вы имеете на данный момент?</strong>&nbsp;$str</h3>
				<h3><strong>Ваши достижения:</strong>&nbsp;$str1</h3>
			<h2>Бонусная программа</h2>
				<h3 style=''><strong>$str3</strong></h3>
		</div>


			 <form action='text-to-file.php' method='get' style='text-align: center;'>
	 				<button>Скачать информацию</button>
	 		 </form>
		</div>

		



		<style type='text/css'>
			body 
			{
				font-family: Times New Roman;
				font-weight:300;
				font-size: 12px;
				background-size: cover; 
				margin: 0; 
				background-image: url(fon.jpg);
			}
			h3{
				text-align:left;
				padding-left: 25px;
				font-weight:500;
				color:#000;
				font-size: 15px;
			}
			h1, h2{
				text-align:center;
				color:#000;
				font-weight:300;
				font-size: 20px;
			}
			.blok{	
				padding-top: 3px; 
				padding-bottom:10px; 
				padding-left:10px;
				padding-right:10px; 
				border-radius: 20px;
				margin:50px auto; 
				max-width:700px;  
				width:100%; 
				box-shadow: 0 10px 30px rgba(0,0,0,0.25); 
				background-color: #F3AC35;
			}
		</style>
	</body>	
</html>";

}


 ?>
