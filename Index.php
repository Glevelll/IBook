<?php
$connection=mysqli_connect('localhost', 'root', 'мой пароль', 'ibook');
if(!$connection)
die('disconnect'.mysqli_connect_error());

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cssbasket/normalize.css">
    <link rel="stylesheet" href="cssbasket/main.css">
    <link rel="stylesheet" href="cssbasket/section-top.css">
    <link rel="stylesheet" href="cssbasket/components.css">
    <link rel="stylesheet" href="cssbasket/header-page.css">
    <link rel="stylesheet" href="cssbasket/section-about.css">
    <link rel="stylesheet" href="cssbasket/section-contacts.css">
    <link rel="stylesheet" href="cssbasket/footer-page.css">
    <link rel="stylesheet" href="cssbasket/popup.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:400,700&amp;subset=cyrillic-ext" rel = "stylesheet">
    <title>IBooks</title>
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">IBooks</div>
            <nav class="nav">
                <a class ="nav__link" href='#about'>О нас</a>
                <a class ="nav__link" href='#rec'>Рекомендации</a>
                </a>
            </nav>
        </div>
    </div>
</header>

<div class="intro">
    <div class="intro_inner">
        <h1 class="intro__title">Время читать!</h1>

        <a class ="btn1" href="#rec">Выбрать книги</a>
    </div>

</div>

<section class = "section" id ="about">
    <div class = "container">
        <div class = "section__header">
            <h3 class = "section__suptitle">
                Чем мы занимаемся
            </h3>
            <h2 class="section__title">
                Описание нашего сайта
            </h2>
            <div class="section__text">
                <p>Мы радуем книгами наших покупателей начиная с 2022 года. Сайт создал студент КФУ, Никишин Глеб.</p>
            </div>
        </div>
        <div class="about">
            <div class="about__item">
                <div class="about__image">
                    <img src="assets/images/1.png" alt="">
                </div>
                <div class="about__text">Классика</div>
            </div>
            <div class="about__item">
                <div class="about__image">
                    <img src="assets/images/2.png" alt="">
                </div>
                <div class="about__text">Наука</div>
            </div>
            <div class="about__item">
                <div class="about__image">
                    <img src="assets/images/3.png" alt="">
                </div>
                <div class="about__text">Комиксы</div>
            </div>
        </div>
    </div>
</section>

<?php
$query = "SELECT get_table_counts() AS result";

$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $result_value = $row['result'];
} else {
    $result_value = 0;
}

preg_match_all('/\d+/', $result_value, $matches);
$result1 = $matches[0][0]; 
$result2 = $matches[0][1]; 
$result3 = $matches[0][2]; 
?> 

<div class="statistics">
    <div class="container">
        <div class="stat">
            <div class="stat__item">
                <div class="stat__count"><?php echo $result1 ?></div>
                <div class="stat__text">Клиенты</div>
            </div>
            <div class="stat__item">
                <div class="stat__count"><?php echo $result2 ?></div>
                <div class="stat__text">Заказы</div>
            </div>
            <div class="stat__item">
                <div class="stat__count"><?php echo $result3 ?></div>
                <div class="stat__text">Города</div>
            </div>
        </div>
    </div>
</div>

<?php
$types[] = null;
$result = mysqli_query($connection,"SELECT * FROM `typy`");
while ($type = mysqli_fetch_assoc($result)){
    $types[] = $type['info'];}
?> 

<section id="rec" class="section-catalog">
    <div class="container">
        <header class ="section__header">
            <h2 class="section__title section__title--accent">
                Каталог
            </h2>
            <nav class="catalog-nav">
                <ul class="catalog-nav__wrapper">
                    <li class="catalog-nav__item">
                        <button class="catalog-nav__btn is-active" type ="button" data-filter="all">
                            Все
                        </button>
                        <button class="catalog-nav__btn" type ="button" data-filter="<?php echo $types[1]?>">
                            <?php echo $types[1]?>
                        </button>
                        <button class="catalog-nav__btn" type ="button" data-filter="<?php echo $types[2]?>">
                            <?php echo $types[2]?>
                        </button>
                        <button class="catalog-nav__btn" type ="button" data-filter="<?php echo $types[3]?>">
                            <?php echo $types[3]?>
                        </button>
                    </li>
                </ul>
            </nav>
        </header>

<?php
$res = mysqli_query($connection,"SELECT * FROM `book_params`");
while ($param = mysqli_fetch_assoc($res)){
    $name[] = $param['namee'];
    $description[] = $param['descriptionn'];
    $price[] = $param['price'];}
?> 

<div class="catalog">
                <div class="catalog__item" data-category ="<?php echo $types[2]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[0]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/хокинг1.png">
                    <img src="assets/images/хокинг1.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[0] ?></h3>
                        <p class="product_description"><?php echo $description[0]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[0]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

                <div class="catalog__item" data-category ="<?php echo $types[2]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[1]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/хокинг2.png">
                    <img src="assets/images/хокинг2.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[1] ?></h3>
                        <p class="product_description"><?php echo $description[1]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[1]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

                <div class="catalog__item" data-category ="<?php echo $types[3]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[2]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/лс.png">
                    <img src="assets/images/лс.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[2] ?></h3>
                        <p class="product_description"><?php echo $description[2]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[2]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>
</div>

        <div class="catalog">
        <div class="catalog__item" data-category ="<?php echo $types[3]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[9]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/инж.png">
                    <img src="assets/images/инж.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[9] ?></h3>
                        <p class="product_description"><?php echo $description[9]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[9]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="catalog__item" data-category ="<?php echo $types[3]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[10]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/флэш.png">
                    <img src="assets/images/флэш.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[10] ?></h3>
                        <p class="product_description"><?php echo $description[10]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[10]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="catalog__item" data-category ="<?php echo $types[3]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[3]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/бэтмен.png">
                    <img src="assets/images/бэтмен.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[3] ?></h3>
                        <p class="product_description"><?php echo $description[3]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[3]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>
</div>

        <div class="catalog">
        <div class="catalog__item" data-category ="<?php echo $types[3]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[4]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/человекпаук.png">
                    <img src="assets/images/человекпаук.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[4] ?></h3>
                        <p class="product_description"><?php echo $description[4]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[4]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="catalog__item" data-category ="<?php echo $types[2]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[5]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/хокинг3.png">
                    <img src="assets/images/хокинг3.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[5] ?></h3>
                        <p class="product_description"><?php echo $description[5]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[5]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="catalog__item" data-category ="<?php echo $types[1]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[6]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/Дубровский.png">
                    <img src="assets/images/Дубровский.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[6] ?></h3>
                        <p class="product_description"><?php echo $description[6]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[6]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>
</div>

        <div class="catalog">
        <div class="catalog__item" data-category ="<?php echo $types[1]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[7]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/Братья.png">
                    <img src="assets/images/Братья.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[7] ?></h3>
                        <p class="product_description"><?php echo $description[7]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[7]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="catalog__item" data-category ="<?php echo $types[1]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[8]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/Обломов.png">
                    <img src="assets/images/Обломов.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[8] ?></h3>
                        <p class="product_description"><?php echo $description[8]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[8]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="catalog__item" data-category ="<?php echo $types[1]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[11]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/гнв.png">
                    <img src="assets/images/гнв.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[11] ?></h3>
                        <p class="product_description"><?php echo $description[11]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[11]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>
</div>

<div class="catalog">
<div class="catalog__item" data-category ="<?php echo $types[1]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[12]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/гоу.png">
                    <img src="assets/images/гоу.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[12] ?></h3>
                        <p class="product_description"><?php echo $description[12]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[12]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="catalog__item" data-category ="<?php echo $types[1]?>">
                <div class="product catalog_product js-product" data-product-name = "<?php echo $name[13]?>" data-product-price="<?php echo $price[0]?>" data-product-attribute = "" data-product-src = "assets/images/мд.png">
                    <img src="assets/images/мд.png" alt="" class="product_img">
                    <div class="product_content">
                        <h3 class="product_title"><?php echo $name[13] ?></h3>
                        <p class="product_description"><?php echo $description[13]?></p>
                    </div>
                    <footer class="product__footer">
                        <div class="product_bottom">
                            <div class="product_price">
                                <span class="product_price-value"><?php echo $price[13]?></span>
                                <span class="product_currency">&#8381;</span>
                            </div>
                            <button class="btn product_btn js-btn-add-to-cart" type="button">Заказать</button>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<form action="send.php" method="POST">
    <div class="popup popup-order">
        <div class="popup_wrapper">
            <div class="popup_inner">
                <div class="popup_content">
                    <button class="btn_close popup_btn-close popup-close" type="button"></button>
                    <h2 class="page-title">Корзина</h2>
                    <div class="cart js-cart-wrapper">
                        <form class="form cart_form form-send">
                            <div class="cart_items js-cart">
                            </div>
                            <div class="cart_totals">
                                <div>Итого: <span class="cart_bold"><span class="js-cart-total-price" ></span> ₽</span></div>
                            </div>
                            <div class="order">
                                <h3 class="order_title">Форма</h3>
                                <div class="form_main">
                                    <input class="form_input" type="text" name="Имя" placeholder="Имя" required="">
                                    <input class="form_input" type="text" name="Почта" placeholder="Почта" required="">
                                    <input class="form_input" type="text" name="Телефон" placeholder="Телефон" required="">
                                    <input class="form_input" type="text" name="Город" placeholder="Город" required="">
                                    <input class="js-cart-total-price-input" type="hidden" name="value" >
                                    <button class="btn form_btn" type="submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                        <div class="cart_empty">
                            <p class="cart_info">Нет товаров</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>





<button class="cart-btn" data-popup="popup-order">
    <span class="cart-btn_counter js-cart-total-count-items">0</span>
    <img class="cart-btn_icon" src="assets/images/basket.png">
</button>


<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="https://unpkg.com/focus-visible@5.2.0/dist/focus-visible.js"></script>
<script src="js/myLib.js"></script>
<script src="js/header.js"></script>
<script src="js/popup.js"></script>
<script src="js/catalog.js"></script>
<script src="js/cart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>