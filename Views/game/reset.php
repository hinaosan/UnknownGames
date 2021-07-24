<?php
require_once(ROOT_PATH .'/Models/Games.php');
$login = new Games();

$pass = $Err = "";
session_start();
if(isset($_POST['login'])){
  $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, "UTF-8");
  $pass2 = htmlspecialchars($_POST['pass2'], ENT_QUOTES, "UTF-8");

  if ( preg_match("/\A[a-z\d]{8,32}+\z/i",$pass) != 0 && !empty($pass) && $pass === $pass2 ){
    $_SESSION['pass'] = $_POST;
    $user = $login->passreset($_SESSION);
    $alert = "<script type='text/javascript'>alert('パスワードを変更しました。');</script>";
    $index = "<script type='text/javascript'>location.href = 'index.php';</script>";
    echo $alert;
    echo $index;
    $_SESSION = [];
  } else {
    $Err = "パスワードは正しく入力してください。\n8~32桁の英数字の組み合わせでご入力ください。";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Unknown Games ‐ パスワード再設定</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
</head>
<body>
</div>
<div class="modal-content"><p class="log">PASSWORD RESET</p>
  <div id="login">
    <p class="error"><?php if (!empty($Err)) {
      echo nl2br($Err);
    } ?></p>
    <form action="" method="post" class="login">
      <input type="password" name="pass" placeholder="パスワード" class="l-form" value="<?php echo $pass; ?>">
      <input type="password" name="pass2" placeholder="パスワード再入力" class="l-form" value="">
      <button name="login" type="submit" class="l-btn">設定する</button>
      <div class="back">
        <a href="index.php"><img src="/img/back.png" alt="もどる"> もどる</a>
      </div>
    </div>
  </div>
</body>
</html>
