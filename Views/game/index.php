<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

require_once(ROOT_PATH .'/Models/Games.php');
$login = new Games();

$email = $pass = $Err = "";
session_start();
if(isset($_POST['login'])){
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
  $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, "UTF-8");
  $_SESSION = $_POST;
  $user = $login->login($_SESSION);

  if ( !empty($user) && password_verify($_SESSION['pass'], $user['password']) ){
    header('Location:mypage.php');
    exit;
  }else{
    $Err = "メールアドレス、パスワードは正しく入力してください。";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/button.css">
  <link rel="stylesheet" type="text/css" href="/css/grow.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
  $(function(){
    $('#about').on('click',function(){
      $('.modal-about').fadeIn(100);
      return false;
    });
    $('.modal-bg-close').on('click',function(){
      $('.modal-about').fadeOut(10);
      return false;
    });
  });
  </script>
</head>
<body>
  <h1>Unknown Games</h1>
  <div class="glow"></div>
  <div class="particles">
    <div class="rotate">
      <div class="angle">
        <div class="size">
          <div class="position">
            <div class="pulse">
              <div class="particle">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="angle">
        <div class="size">
          <div class="position">
            <div class="pulse">
              <div class="particle">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="angle">
        <div class="size">
          <div class="position">
            <div class="pulse">
              <div class="particle">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p class="catch">あなた好みのゲームを、一緒に見つけます。</p>
  <div id="modal">
    <div class="modal-about">
      <div class="modal-bg-close"></div>
      <div class="modal-about-content">
        <p>ここでは個人で制作された様々なゲームの中から、<br>気に入ったものを見つけ、遊ぶことができます。
          <br>また、そのゲームを実況し配信している動画も見ることができます。<br><br>
          ゲームのある生活が、より良いものになるよう<br>お手伝いするサイトです。</p>
          <div class="mimg">
            <img src="/img/controller.png" alt="" style="zoom:50%;">
            <img src="/img/com.png" alt="" style="zoom:50%;">
            <img src="/img/creator.png" alt="" style="zoom:200%;">
          </div>
        </div>
      </div>
    </div>
    <div class="top-btn">
      <div class="neon-tbtn"><a href="register.php" alt="新規登録">新規登録</a></div>
      <div class="neon-tbtn"><a href="login.php" alt="ログイン">ログイン</a></div>
      <div class="neon-tbtn"><a href="notuser.php" alt="ログインせず使用">ログインせず使用</a></div>
    </div>
    <div class="about" id="about">
      <a href="#">- このサイトについて -</a>
    </div>
  </body>
  </html>
