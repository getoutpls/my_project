<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <!-- Навигационная панель -->
    <?php require_once "blocks/header.php";?>

        <!-- Блоки с выводом названия услуги и описания: -->
    <?php
        require_once "lib/dbconnect.php";

        $sql = 'SELECT * FROM services ORDER BY id LIMIT 3';
        $query = $pdo->prepare($sql);
        $query->execute();
        $service = $query->fetchAll(PDO::FETCH_OBJ);

        foreach($service as $el)
            echo '<div class="block">
                <h2>'.$el->name.'</h2>
                <p>'.$el->description.'</p>
                </div>'
    ?>
        
    <!-- Контакты: -->
    <?php require_once "blocks/contacts.php";?>

    <!-- Подвал -->
     <?php require_once "blocks/footer.php";?> 
</body>
</html>
