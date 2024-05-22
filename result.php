<?php
error_reporting(0);
class Result
{
    // подключение к базе данных и таблице
    private $conn;
    private $searchData;
    // свойства объекта
    public $request;
    public $response;

    // конструктор для соединения с базой данных
    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read($searchData)
    {
        $this-> searchData = $searchData;
        // выбираем записи согласно условию
        $query = "SELECT * FROM result WHERE request = :searchData";
        // подготовка запроса
        $query = $this->conn->prepare($query);
        // выполняем запрос
        $query->execute(['searchData' => $this->searchData]);
        return $query;
    }
    function readAll()
    {
        // выбираем все записи
        $query = "SELECT * FROM result";
        // подготовка запроса
        $query = $this->conn->prepare($query);
        // выполняем запрос
        $query->execute();
        return $query;
    }
    function addData(){
        
        $query ="INSERT INTO result (request, response) VALUES (:searchData, :result)";
        $query = $this->conn->prepare($query);
        $query->execute(['searchData' => $this->searchData,'result' => $this->response]);

    }
    function create($searchData){

        $this-> searchData = $searchData;
        $url = 'https://api.github.com/search/repositories?q=' . urlencode($this->searchData);
        $agent = get_browser(null, true);
        // Инициализируем cURL сеанс
        $ch = curl_init();
        // Устанавливаем параметры запроса
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Выполняем запрос
        $execute = curl_exec($ch);
        // Закрываем cURL сеанс
        curl_close($ch);
        // Обработка ответа
    if ($execute) {

        $data = json_decode($execute, true); // Преобразуем JSON в массив
        // Выводим результаты поиска
        if (isset($data['items'])) {
            
            $cards = array();
            foreach ($data['items'] as $item) {
               
                $title =  "Проект: " . $item['name'] ;
                $author = "Автор: " . $item['owner']['login'] ;
                $stars = "Количество звезд: " . $item['stargazers_count'] ;
                $watchers = "Количество просмотров: " . $item['watchers'];
                $url =   $item['html_url'];
                
                $card = array(
                    'name' => $title,
                    'author' => $author,
                    'stars' => $stars,
                    'watchers' => $watchers,
                    'url' => $url
                );
                array_push($cards, $card);
            }
            $this->response = json_encode($cards);
            //$this-> addData();
            return $this->response;
            
        } 
    } else {
        echo "Ошибка при выполнении запроса.";
    }
    }
}