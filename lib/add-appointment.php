<?php
// Подключение к базе данных
require "dbconnect.php";

// Получение услуг для выпадающего списка
$services = [];
$serviceSql = 'SELECT * FROM services';
$serviceQuery = $pdo->query($serviceSql);
while ($service = $serviceQuery->fetch()) {
    $services[] = $service['name'];
}

// Проверка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение содержимого переменных из массива post
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
    $servicename = trim(filter_var($_POST['servicename'], FILTER_SANITIZE_SPECIAL_CHARS));
    $date = trim(filter_var($_POST['date'], FILTER_SANITIZE_SPECIAL_CHARS));

    // Проверка переменных
    if (strlen($username) < 1) {
        echo "Username error";
        exit;
    }
    if (strlen($servicename) < 1) {
        echo "Service name error";
        exit;
    }
    if (strlen($date) < 1) {
        echo "Date error";
        exit;
    }

    // Проверка существования пользователя
    $userCheckSql = 'SELECT * FROM users WHERE username = ?';
    $userCheckQuery = $pdo->prepare($userCheckSql);
    $userCheckQuery->execute([$username]);
    $user = $userCheckQuery->fetch();

    if (!$user) {
        echo "Пользователь не найден!";
        exit;
    }

    // SQL для вставки записи
    $sql = 'INSERT INTO appointment(username, servicename, date) VALUES(?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username, $servicename, $date]);

    header('Location: /lucky-appointment.php');

}
?>

<div class="appointment-section" id="appointment">
    <h1>Запись</h1>
    <h2>Введите данные</h2>
    <form id="appointmentForm" method="post" action="">
        <label for="username">Имя:</label>
        <input type="text" id="username" name="username" required>

        <label for="servicename">Услуга:</label>
        <select id="servicename" name="servicename" required>
            <?php foreach ($services as $service): ?>
                <option value="<?= htmlspecialchars($service) ?>"><?= htmlspecialchars($service) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="date">Дата:</label>
        <input type="text" id="date" name="date" required>

        <button type="submit" class="submit-button">Записаться</button>
    </form>
</div>
    
    <!-- Контакты: -->
    <?php require_once "blocks/contacts.php";?>

    <!-- Подвал -->
     <?php require_once "blocks/footer.php";?> 