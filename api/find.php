<?php
include_once "../database.php";
include_once "../result.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    $database = new Database();
    $db = $database->getConnection();
    $data = $_POST['searchData'];
// инициализируем объект
    $result = new Result($db);
// запрашиваем данные
    $stmt = $result->read();
    $num = $stmt->rowCount();
// проверка, найдено ли больше 0 записей
if ($num > 0) {
    // получаем содержимое нашей таблицы
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // извлекаем строку
        $searchResult = $row["response"];
    }
    // устанавливаем код ответа - 200 OK
    http_response_code(200);
    // выводим данные  в формате JSON
    echo json_encode($searchResult);
}
else {
    echo json_encode($result->create($searchData));
}
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $database = new Database();
    $db = $database->getConnection();
// инициализируем объект
    $result = new Result($db,$data);

// запрашиваем данные
    $stmt = $result->readAll();
    $num = $stmt->rowCount();
// проверка, найдено ли больше 0 записей
if ($num > 0) {
    // получаем содержимое нашей таблицы
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // извлекаем строку
        $searchResult = $row["response"];
    }
    // устанавливаем код ответа - 200 OK
    http_response_code(200);
    // выводим данные  в формате JSON
    echo json_encode($searchResult);
}
else {
    echo json_encode(array("message" => "Список поисков пуст"), JSON_UNESCAPED_UNICODE);
}
}
