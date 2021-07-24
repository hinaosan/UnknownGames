<?php
require_once(ROOT_PATH .'/Controllers/Controller.php');
$id = new Controller();
$email = $_SESSION['email'];
$user = $id->findid($email);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">

  $(function(){
    $('a[href^="#"]').click(function() {
      var speed = 800;
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top - 150;
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
    });
  });

  $(function(){
    let jump = $('.jump');
    $(window).scroll(function () {
      let now = $(window).scrollTop() ;
      if(now > 680) {
        jump.addClass("active");
      } else if (now <= 680) {
        jump.removeClass("active");
      }
    });
  });

  </script>
</head>
<body>
  <header id="header" class="header">
    <?php if ($user['type'] == "3"): ?>
      <div class="neon-btn"><a href="c-mypage.php"><img src="/img/mypage.png" alt="">マイページ</a></div>
      <div class="neon-btn"><a href="logout.php"><img src="/img/logout.png" alt="">ログアウト</a></div>
    <?php else: ?>
      <div class="neon-btn"><a href="mypage.php"><img src="/img/mypage.png" alt="">マイページ</a></div>
      <a href="mypage.php" class="menu">おすすめゲーム</a>
      <a href="mygame.php" class="menu">お気に入りゲーム</a>
      <a href="mycreator.php" class="menu">登録ゲーム制作者</a>
      <div class="neon-btn"><a href="logout.php"><img src="/img/logout.png" alt="">ログアウト</a></div>
    <?php endif; ?>
  </header>
  <hr class="cp_hr05" />
  <div class="jump">
    <a href="#top"><img src="/img/top.png" alt=""><br>PAGE TOP</a>
  </div>
</body>
</html>
