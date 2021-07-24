<?php
require_once(ROOT_PATH .'/Models/Games.php');
$login = new Games();

$email = $pass = $Err = "";
session_start();
if(isset($_POST['login'])){
  $email = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
  $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, "UTF-8");
  $_SESSION = $_POST;
  $user = $login->login($_SESSION);

  if ( !empty($user) && password_verify($_SESSION['pass'], $user['password']) && $user['type'] != '3' ){
    header('Location:mypage.php');
    exit;
  } elseif ( !empty($user) && password_verify($_SESSION['pass'], $user['password']) && $user['type'] = '3' ) {
    header('Location:c-mypage.php');
  } else {
    $Err = "メールアドレス、パスワードは正しく入力してください。";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Unknown Games ‐ ログイン</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
</head>
<body>
</div>
<div class="modal-content"><p class="log">LOGIN</p>
  <div id="login">
    <p class="error"><?php if (!empty($Err)) {
      echo $Err;
    } ?></p>
    <form action="" method="post" class="login">
      <input type="email" name="email" placeholder="メールアドレス" class="l-form" value="<?php echo $email; ?>">
      <input type="password" name="pass" placeholder="パスワード" class="l-form" value="<?php echo $pass; ?>">
      <button name="login" type="submit" class="l-btn">ログイン</button>
      <br>
      <a href="passreset.php">パスワードを忘れた方はこちら</a>
      <div class="back">
        <a href="index.php"><img src="/img/back.png" alt="もどる"> もどる</a>
      </div>
    </div>
  </div>
</body>
</html>
