<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">UNIVER.TEHNON.COM.UA</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Главная</a>
    <a class="p-2 text-dark" href="/about.php">Контакты</a>
  </nav>
  <?php
     if($_COOKIE['user'] == 'Да'):
  ?>
  <a class="btn btn-outline-primary" href="/auth.php">Кабинет пользователя</a>
  <?php else: ?>
  <a class="btn btn-outline-primary" href="/auth.php">Войти</a>
  <?php endif; ?>
</div>
