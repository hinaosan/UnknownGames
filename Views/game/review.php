<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

if (empty($_SESSION)){
  header("location:index.php");
}

require_once(ROOT_PATH .'/Controllers/Controller.php');
$id = new Controller();
$email = $_SESSION['email'];
$user = $id->findid($email);
$game = $id->view();

$review = $play_url = "";
$Err = [];
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $review = h($_POST['review']);

  if (empty($_POST["review"])) {
    $Err["review"] = "投稿内容は必須入力です。";
  }

  if ($user['type'] == "2") {
    $play_url = h($_POST['play_url']);
    if (preg_match("/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/",$_POST["play_url"])==0 || empty($_POST["play_url"])) {
      $Err["play_url"] = "実況動画URLは必須入力です。正しくご入力ください。";
    }
  }

  if (count($Err) == 0) {
    $_SESSION['game_review'] = array();
    $_SESSION['game_review'] = $_POST;
    $_SESSION['game_review']['name'] = $user['name'];
    $_SESSION['game_review']['id'] = $game['game']['id'];
    header("Location:review_confirm.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/carousel.css">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
  <header>
    <?php
    include('header.php');
    ?>
  </header>
  <div id="recommend" class="caption">
    <?php if ($user['type'] == "1"): ?>
      <h2><?php echo $game['game']['game_name']; ?>のレビューを投稿する</h2>
    <?php elseif ($user['type'] == "2"): ?>
      <h2><?php echo $game['game']['game_name']; ?>のレビューを投稿する</h2>
    <?php endif; ?>
    <div id="koumoku">
      <div class="koumoku">
        <form method="post" action="">
          <p>登録名　:　<?php echo $user['name'];?></p>
        </div>
        <div class="koumoku">
          <p>投稿内容<span class="error">*</span></p>
          <?php if (isset($Err["review"])): ?>
            <span class="error"><?php echo $Err["review"];?></span>
            <textarea name="review" placeholder="こちらに本文をご記載ください。結末などのネタバレの記載はお控えください。" class="r-form" ><?php echo $review; ?></textarea>
          </div>
        <?php else: ?>
          <textarea name="review" placeholder="こちらに本文をご記載ください。結末などのネタバレの記載はお控えください。" class="r-form" ><?php echo $review; ?></textarea>
        </div>
      <?php endif; ?>
      <?php if ($user['type'] == "2"): ?>
        <div class="koumoku">
          <p>動画URL<span class="error">*</span></p>
          <?php if (isset($Err["play_url"])): ?>
            <span class="error"><?php echo $Err["play_url"];?></span>
            <input type="url" name="play_url" placeholder="http://...." class="c-form" value="<?php echo $play_url; ?>" >
          </div>
        <?php else: ?>
          <input type="url" name="play_url" placeholder="http://...." class="c-form" value="<?php echo $play_url; ?>" >
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  <input type="submit" name="post_btn" value="確認画面へ" class="post_btn">
</form>
<div class="back">
  <a href="#" onclick="window.history.back(); return false;"><img src="/img/back.png" alt="もどる"> もどる</a>
</div>
</body>
</html>
