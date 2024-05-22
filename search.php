<?php
include_once "database.php";
include_once "result.php";
$database = new Database();
$db = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['searchData'];
    // инициализируем объект
    $result = new Result($db);
    // запрашиваем данные
    $stmt = $result->read($data);
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
    http_response_code(200);
    echo json_encode($result->create($data));
}
}
