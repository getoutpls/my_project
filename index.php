<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Поликлиника</title>
</head>
<body>
    <!-- Навигационная панель -->
    <?php require_once "blocks/header.php";?>

    <!-- О поликлинике -->
     <div class="about-section" id="about">
        <h1>О Поликлинике</h1>
        <p class="description">
            Наша поликлиника предоставляет широкий спектр медицинских услуг, обеспечивая комфорт и
            качество лечения для всех наших пациентов. Мы стремимся к улучшению здоровья
            и благополучия наших клиентов.
        </p>
        
        <h2>Миссия и ценности</h2>
        <p class="mission">
            Миссия нашей поликлиники - предоставить высококачественные медицинские услуги в
            доступной форме, основываясь на принципах уважения, заботы и профессионализма.
        </p>
        <ul class="values">
            <li>Профессионализм</li>
            <li>Доступность</li>
            <li>Человечность</li>
            <li>Инновации</li>
        </ul>

        <h2>Фото</h2>
        <div class="gallery">
            <img src="/files/photo/photo_hospital.jpg" alt="Здание поликлиники" class="gallery-item">
            <img src="/files/photo/team.jpg" alt="Команда врачей" class="gallery-item">
        </div>
    </div>

    <!-- Врачи: -->
     <div class="doctors-section" id="doctors">
        <h1>Наши Врачи</h1>
        <div class="carousel">
            <div class="carousel-item">
                <img src="/files/photo/doctor1.jpg" alt="Врач 1" class="doctor-image">
                <div class="doctor-info">
                    <h3>Анна Петрова</h3>
                    <p>Терапевт</p>
                    <p>Стаж: 10 лет</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/files/photo/doctor2.jpg" alt="Врач 2" class="doctor-image">
                <div class="doctor-info">
                    <h3>Игорь Сидоров</h3>
                    <p>Хирург</p>
                    <p>Стаж: 15 лет</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/files/photo/doctor3.jpg" alt="Врач 3" class="doctor-image">
                <div class="doctor-info">
                    <h3>Елена Васильева</h3>
                    <p>Педиатр</p>
                    <p>Стаж: 8 лет</p>
                </div>
            </div>
        </div>

        <!-- <button class="appointment-button">Записаться к врачу</button> -->
    </div>

    <script>
        // Простой скрипт для карусели
        let currentIndex = 0;
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;

        function showItem(index) {
            items.forEach((item, i) => {
                item.style.display = (i === index) ? 'block' : 'none';
            });
        }

        showItem(currentIndex);

        setInterval(() => {
            currentIndex = (currentIndex + 1) % totalItems;
            showItem(currentIndex);
        }, 3000);
    </script>

    <!-- Отзывы пациентов -->
    <?php require_once "blocks/reviews.php";?>

    <!-- Контакты: -->
    <?php require_once "blocks/contacts.php";?>

    <!-- Подвал -->
     <?php require_once "blocks/footer.php";?> 
</body>
</html>
