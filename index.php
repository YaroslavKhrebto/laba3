<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="script1.js" defer></script>
    <script src="script2.js" defer></script>
    <script src="script3.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>


    
    <h1>Выберите дату (доход с проката):</h1>
	
		<label for="date">Дата:</label>
		<input type="date" name="date" id="date">
		<button id = 'prokat_btn'>Отправить</button>
	
    <div id = 'prokat'></div>







    <h1>Выберите производителя</h1>  

        <label for="vendor">Выберите производителя:</label>
        <select name="vendor" id="vendor">
            <?php
            $conn = new PDO('mysql:host=localhost;dbname=lb_pdo_rent', 'root', '');
            $query = "SELECT * FROM vendors";
            $result = $conn->query($query);

            foreach($result as $row) {
                echo "<option value=\"" . $row["ID_Vendors"] . "\">" . $row["Name"] . "</option>";
            }

            ?>
        </select>
        <button id = 'proisv--btn'>Отправить</button>

    <div id = 'proisv'></div>









    <h1>Выберите дату (свободные авто)</h1>
    <form method="POST" id = 'form-avto'>
        <label for="date">Выберите дату:</label>
        <input type="date" name="date" id="dateAvto">
        <button type="submit" id = 'avto_btn'>Проверить доступность</button>
    </form>
    <div id = 'avto'></div>

</body>
</html>