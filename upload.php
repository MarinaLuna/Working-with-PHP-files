<!DOCTYPE HTML>
<html>
 <head>
 <meta charset='utf-8'>
 <link rel='stylesheet' href='style.css'>
 <title>Loading...</title>
 </head>
				<div class="blok">
					<div style="display: flex; flex-direction: column; padding-bottom: 20px;">
					
						<h1>Загрузка файла</h1>



						<?php
						$target_dir = "uploads/";
						$target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
						$uploadOk = 1;
						$uploaderror = $_FILES["uploadFile"]["name"];
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
						if (empty($uploaderror)) {
						    echo "Файл не был выбран.";
						    $uploadOk = 0;
						} else {
						    if (file_exists($target_file)) {
						        echo "Извините, файл уже существует.";
						        $uploadOk = 0;
						    }

						    if ($_FILES["uploadFile"]["size"] < 51200) {
						        echo "Извините, ваш файл слишком маленький.\n";
						        $uploadOk = 0;
						    }
						    if ($_FILES["uploadFile"]["size"] > 102400) {
						        echo "Извините, ваш файл слишком большой.\n";
						        $uploadOk = 0;
						    }
						    if ($imageFileType != "docx") {
						        echo "Извините, разрешено только файлы docx.\n";
						        $uploadOk = 0;
						    }
						    if ($uploadOk == 0) {
						        echo " <br> Ваш файл не был загружен. <br>Загрузите другой файл.";

						    } else {
						        if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file)) {
						            echo "Файл " . basename($_FILES["uploadFile"]["name"]) . " был загружен. Можете загрузить ещё. ";
						        } else {
						            echo "К сожалению, произошла ошибка при загрузке файла.";
						        }
						    }
						}
						?>

						<form method="post" action="upload.php"  enctype="multipart/form-data">
							<h1>Загрузка файла</h1>
							
								<p>Выберите файл</p><input name="uploadFile" style="margin-top: 10px;" type="file">
								<input style="margin-left: 20px;" type="submit" value="Загрузить">
							
						</form>

					</div>						
				</div>
</html> 