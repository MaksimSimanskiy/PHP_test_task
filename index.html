

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Поиск</title>
</head>
<body>
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center mb-5">
      <div class="col-md-6 mb-6">
        <form id="searchForm">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="searchInput" placeholder="Введите текст" aria-label="Введите текст" aria-describedby="search-button">
            <button class="btn btn-primary" type="submit" id="search-button">Поиск</button>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
    <div id = "results" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
</div>
</div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    
  function createCard(cardData) {
    var card = $('<div>').addClass('card mb-3 mx-2').css('width', '18rem');
    var cardBody = $('<div>').addClass('card-body');
    var title = $('<h5>').addClass('card-title').text(cardData.name);
    var listGroup = $('<ul>').addClass('list-group list-group-flush');
    var listItem1 = $('<li>').addClass('list-group-item').text(cardData.author);
    var listItem2 = $('<li>').addClass('list-group-item').text(cardData.stars);
    var listItem3 = $('<li>').addClass('list-group-item').text(cardData.watchers);
    var cardLink = $('<a>').attr('href', cardData.url).addClass('stretched-link');
    cardBody.append(title);
    listGroup.append(listItem1);
    listGroup.append(listItem2);
    listGroup.append(listItem3);
    cardBody.append(listGroup);
    cardBody.append(cardLink);
    card.append(cardBody);
    $('#results').append(card);
}
</script>
  <script>
    $(document).ready(function() {
      $('#searchForm').submit(function(event) {
        event.preventDefault();
        var searchData = $('#searchInput').val();
        $("#results").empty();
        $.ajax({
          type: 'POST',
          url: '/test/test2/read.php',
          data: { searchData: searchData },
          success: function(response) {
           console.log(response);
            var data = JSON.parse(response);
// Создание карточек для каждого объекта данных
            data.forEach(function(cardData) {
            createCard(cardData);

  })
          },
          error: function() {
            console.log('Ошибка при отправке запроса');
          }
        });
      });
    });
  </script>
</body>
</html>



