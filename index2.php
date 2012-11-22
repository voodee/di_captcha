<?php
  session_start();
  define('THE_NUMBER_OF_LETTERS', 6);
  if (isset($_POST['action']{14}) && $_POST['action'] == 'captcha_refresh') {
    require 'phar://di_captcha.class.phar.gz/di_captcha.class.php';
    $captcha = new di\captcha();
    $captcha->set('noise', 1);
    echo json_encode(array(THE_NUMBER_OF_LETTERS, $captcha->get()));
  } else {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>Test</title>
  <link rel='stylesheet' media='all' href='style.css'>
  <script type='text/javascript' src='jquery-1.6.1.min.js' charset='utf-8'></script>
  <script type='text/javascript' src='script2.js' charset='utf-8'></script>
</head>
<body>
  <p id='Title'>Сим-сим, откройся!</p>
  <p id='Msg'>
  <?php
    if (isset($_POST['action']{11}) && $_POST['action'] == 'captcha_send') {;
      require 'phar://di_captcha.class.phar.gz/di_captcha.class.php';
      $captcha = new di\captcha();
      echo ($captcha->check($_POST['text_captcha']))?'Сим-сим открылся!':'К сожалению, Вы ошиблись...';
    }
  ?>
  </p>
  <form action='index2.php' method='post'>
    <div id='DICaptchaPic'></div>
    <p style='padding: 0 10px;'>
      <input type='text' name='text_captcha' id='text_captcha' value='<?php echo $_POST['text_captcha']; ?>' placeholder='6 символов с картинки'><br><label for='text_captcha'>*aнти-спам</label> <a href='#' onclick='di_captcha_refresh(); return false;'>Не вижу</a>
    </p>
    <p style='padding: 10px 0;'>
      <input type='hidden' name='action' value='captcha_send' />
      <input type='submit' name='submit' value='Проверить' />
    </p>
  </form>
</body>
</html>
<?php
  }
?>