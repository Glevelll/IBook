<?php
if ($_POST) {
    $name = filter_var($_POST['Имя'], FILTER_UNSAFE_RAW);
    $email = filter_var($_POST['Почта'], FILTER_UNSAFE_RAW);
    $phone = filter_var($_POST['Телефон'], FILTER_UNSAFE_RAW);
    $city = filter_var($_POST['Город'], FILTER_UNSAFE_RAW);
    $full = $name . ',' . $email . ',' . $phone . ',' . $city;

    session_start();
    $value = $_SESSION['value'];

    $connection=mysqli_connect('localhost', 'root', 'мой пароль', 'ibook');

    try {
        $result = $connection->query("INSERT INTO `user_params` (`namee`,`email`,`phone`,`city`) VALUES ('$name','$email','$phone','$city')");
    } catch (mysqli_sql_exception $e) {
        header('Location: error.php?message=' . urlencode($e->getMessage()));
        exit();
    }
        $result = $connection->query("INSERT INTO `form` (`info`) VALUES ('$full')");

        try {
            $result = $connection->query("INSERT INTO userr (info) VALUES ('$email')");
        } catch (mysqli_sql_exception $e) {
            // игнорируем и продолжаем выполнение кода
        }

        $result = $connection->query("INSERT INTO `basket` (`email`, `sum`) VALUES ('$email', '$value')");

        $result = $connection->query("INSERT INTO `zakaz` (`info_user`, `summary`) VALUES ('$full', '$value')");



        $connection->close();
        header('Location: http://localhost/Web/.idea/Index.php');
    
}
?>