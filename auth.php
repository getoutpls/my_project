<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Авторизация</title>
</head>
<body>
    <!-- Навигационная панель -->
    <?php require_once "blocks/header.php";?>

        <!-- Форма для записи: -->
     <div class="appointment-section" id="appointment">
        <h1>Авторизация</h1>
        <form id="appointmentForm" method="post" action="../lib/auth.php">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="submit-button">Авторизоваться</button>
        </form>
    </div>

    <!-- Контакты: -->
    <?php require_once "blocks/contacts.php";?>

    <!-- Подвал -->
     <?php require_once "blocks/footer.php";?> 
</body>
</html>
