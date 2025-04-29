<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>UNIVER.TEHNON.com.ua</title>
  
</head>
<body>
  <?php  require "blocks/header.php" ?>
  
  <div class="container mt-5">
  <img src="img/Shwartc2.jpg" class="img-fluid mx-auto d-block" alt="Центрированная картинка" style="max-width: 350px;">
    <br/>
  <h3 class="mb-5">Программы тренировок в зале для начинающих и более опытных спортсменов</h3>

    <div class="d-flex flex-wrap">
    <?php
        for($i = 0; $i < 6; $i++):
    ?>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Просто текст</h4>
      </div>
      <div class="card-body">
        <img src="img/priroda_<?php echo ($i + 1) ?>.jpg" class="img-thumbnail">
        <ul class="list-unstyled mt-3 mb-4">
          <li>10 users included</li>
          <li>2 GB of storage</li>
          <li>Email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Подробнее</button>
      </div>
    </div>
  <?php endfor; ?>
  </div>
  <?php
// Функция для получения фильмов с API
function fetchMovies() {
    $apiKey = "4e5548c37fdfda0975c70c0688c24955";
    $url = "https://api.themoviedb.org/3/discover/movie?api_key=$apiKey";

    $response = file_get_contents($url);
    if ($response === FALSE) {
        return [];
    }

    $data = json_decode($response, true);
    return $data['results'] ?? [];
}

$movies = fetchMovies();

// Узнаем, сколько фильмов показывать
$visibleMovies = isset($_GET['visible']) ? intval($_GET['visible']) : 10;
if ($visibleMovies > count($movies)) {
    $visibleMovies = count($movies);
}
?>


  <h1>Movie List</h1>

<ul>
    <?php for ($i = 0; $i < $visibleMovies; $i++): ?>
        <li><?php echo htmlspecialchars($movies[$i]['title']); ?></li>
    <?php endfor; ?>
</ul>

<?php if ($visibleMovies < count($movies)): ?>
    <form method="get">
        <input type="hidden" name="visible" value="<?php echo $visibleMovies + 5; ?>">
        <button type="submit">Load More</button>
    </form>
<?php endif; ?>
  </div>
  
  <?php  require "blocks/footer.php" ?>
  
</body>
</html>
