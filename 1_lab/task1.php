<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title>Laba №1</title>
</head>
<body>
    <h1>Лабораторная работа №1. Часть №1.</h1>
    <?php
        $a = 15;        # целое
        $fl = 3.14;         # с плавающей точкой
        $boo = TRUE;         # boolean
        $str = "0x22stroka";     # строка
        $nol = 0;
        $pusto = "";
        
        $s1 = "Переменная a = $a \n";   # разбираемая строка
        $s2 = 'Переменная a = $a \n';   # неразбираемая строка

        $mas = array( "one" => TRUE, 1 => -20, "three" => 3.14);
        $mas[]="two";
        $mas["four"]=4;
        
        define("HOST", "kappa.cs.karelia.ru");

        echo '<table>';
		echo '  <tr>';
		echo '      <th>';
		echo            "№";
		echo '		</th>';
		echo '		<th>';
		echo            "Решение задания";
		echo '		</th>';
		echo '		<th>';
		echo            "Результат";
		echo '		</th>';
        echo '  </tr> ';
        
		for($task = 1; $task <= 17; $task++) {
			$file_content = file_get_contents($task . '.php');
            echo '<tr>';
            echo '  <td>';
			echo $task;
			echo '  </td>';
			echo '  <td>';
			$file_content_text = explode(PHP_EOL, $file_content);
			foreach ($file_content_text as $token) {
				echo $token . "<br>";
			}
			echo '  </td>';
			echo '  <td>';
			eval($file_content);
			echo '  </td>';
			echo '</tr>';
		}
		echo '</table>';
    ?>
</body>
</html>
