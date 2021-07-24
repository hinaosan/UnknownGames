<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

require_once(ROOT_PATH .'/Controllers/Controller.php');
$id = new Controller();
$email = $_SESSION['email'];
$user = $id->findid($email);
$game = $id->view();

if (empty($_SESSION)){
  header("location:index.php");
}

$Err = [];
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $game_name = h($_POST['game_name']);
  $category = h($_POST['category']);
  $play_time = h($_POST['play_time']);
  $system = h($_POST['system']);
  $spec = h($_POST['spec']);
  $story = h($_POST['story']);
  $sale = h($_POST['sale']);

  if (empty($_POST["game_name"]) || mb_strlen($_POST["game_name"]) > 20) {
    $Err["game_name"] = "ゲームタイトルは必須入力です。20文字以内でご入力ください。";
  }

  if (empty($_POST["category"])) {
    $Err["category"] = "ジャンルを選択してください。";
  }

  if (empty($_POST["play_time"])) {
    $Err["play_time"] = "プレイ時間を選択してください。";
  }

  if (empty($_POST["system"])) {
    $Err["system"] = "操作方法を入力してください。";
  }

  if (empty($_POST["spec"])) {
    $Err["spec"] = "推奨環境を入力してください。";
  }

  if (empty($_POST["story"])) {
    $Err["story"] = "ゲーム内容を入力してください。";
  }

  if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i',$_POST["sale"]) == 0 || empty($_POST["sale"])) {
    $Err["sale"] = "販売元URLは正しくご入力ください。";
  }

  if (count($Err) == 0) {
    $_SESSION['game_post'] = array();
    $_SESSION['game_post'] = $_POST;
    if (!empty($_FILES['image']['tmp_name'])) {
      $_SESSION['image']['name'] = $_FILES['image']['name'];
      $_SESSION['image']['tmpfile'] = $_FILES['image']['tmp_name'];
      $_SESSION['image']['data'] = file_get_contents($_FILES['image']['tmp_name']);
      $_SESSION['image']['type'] = exif_imagetype($_FILES['image']['tmp_name']);
    } else {
      $_SESSION['game_post']['file_path'] = $game['game']['file_path'];
    }
    header("Location:game_confirm.php");
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
<body id="top">
  <header class="myh">
    <?php
    include('header.php');
    ?>
  </header>
    <div id="recommend" class="caption">
      <h2><?php echo $game['game']['game_name']; ?>の編集</h2>
    </div>
    <div id="koumoku">
      <div class="koumoku">
        <form method="post" name="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="made_name" value="<?php echo $user['name']; ?>">
          <input type="hidden" name="id" value="<?php echo $game['game']['id']; ?>">
          <div class="koumoku">
            <p>タイトル<span class="error">*</span></p>
            <?php if (isset($Err["game_name"])): ?>
              <span class="error"><?php echo $Err["game_name"]; ?></span>
              <input type="text" name="game_name" class="c-form" value="<?php echo $game_name; ?>" >
            </div>
          <?php else: ?>
            <input type="text" name="game_name" class="c-form" value="<?php echo $game['game']['game_name']; ?>" >
          </div>
        <?php endif; ?>

        <p>ジャンル<span class="error">*</span></p>
        <?php if (isset($Err["category"])): ?>
          <span class="error"><?php echo $Err["category"]; ?></span>
          <div class="cp_ipselect cp_sl02">
            <select name="category" size="1" class="c-form">
              <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
              <option value="ホラー">ホラー</option>
              <option value="RPG">RPG</option>
              <option value="アドベンチャー">アドベンチャー</option>
            </select>
          </div>
        <?php else: ?>
          <div class="cp_ipselect cp_sl02">
            <select name="category" size="1" class="c-form">
              <option value="<?php echo $game['game']['category']; ?>"><?php echo $game['game']['category']; ?></option>
              <option value="ホラー">ホラー</option>
              <option value="RPG">RPG</option>
              <option value="アドベンチャー">アドベンチャー</option>
            </select>
          </div>
        <?php endif; ?>

        <p>プレイ時間<span class="error">*</span></p>
        <?php if (isset($Err["play_time"])): ?>
          <span class="error"><?php echo $Err["play_time"]; ?></span>
          <div class="cp_ipselect cp_sl02">
            <select name="play_time" size="1" class="c-form">
              <option value="<?php echo $play_time; ?>"><?php echo $play_time; ?></option>
              <option value="30分以下">30分以下</option>
              <option value="30～1時間">30～1時間</option>
              <option value="1時間～2時間">1時間～2時間</option>
              <option value="指定なし">指定なし</option>
            </select>
          </div>
        <?php else: ?>
          <div class="cp_ipselect cp_sl02">
            <select name="play_time" size="1" class="c-form">
              <option value="<?php echo $game['game']['play_time']; ?>"><?php echo $game['game']['play_time']; ?></option>
              <option value="30分以下">30分以下</option>
              <option value="30～1時間">30～1時間</option>
              <option value="1時間～2時間">1時間～2時間</option>
              <option value="指定なし">指定なし</option>
            </select>
          </div>
        <?php endif; ?>

        <div class="koumoku">
          <p>操作方法<span class="error">*</span></p>
          <?php if (isset($Err["system"])): ?>
            <span class="error"><?php echo $Err["system"]; ?></span>
            <input type="text" name="system" placeholder="ゲームパッド対応" class="c-form" value="<?php echo $system; ?>">
          </div>
        <?php else: ?>
          <input type="text" name="system" placeholder="ゲームパッド対応" class="c-form" value="<?php echo $game['game']['system']; ?>">
        </div>
      <?php endif; ?>

      <div class="koumoku">
        <p>推奨環境<span class="error">*</span></p>
        <?php if (isset($Err["spec"])): ?>
          <span class="error"><?php echo $Err["spec"]; ?></span>
          <textarea name="spec" class="r-form"><?php echo $spec; ?></textarea>
        </div>
      <?php else: ?>
        <textarea name="spec" class="r-form"><?php echo $game['game']['spec']; ?></textarea>
      </div>
    <?php endif; ?>

    <div class="koumoku">
      <p>内容<span class="error">*</span></p>
      <?php if (isset($Err["story"])): ?>
        <span class="error"><?php echo $Err["story"]; ?></span>
        <textarea name="story" class="r-form"><?php echo $story; ?></textarea>
      </div>
    <?php else: ?>
      <textarea name="story" class="r-form"><?php echo $game['game']['story']; ?></textarea>
    </div>
  <?php endif; ?>

  <div class="koumoku">
    <p>販売元URL<span class="error">*</span></p>
    <?php if (isset($Err["sale"])): ?>
      <span class="error"><?php echo $Err["sale"]; ?></span>
      <input type="text" name="sale" placeholder="https://...." class="c-form" value="<?php echo $sale; ?>">
    </div>
  <?php else: ?>
    <input type="text" name="sale" placeholder="http://...." class="c-form" value="<?php echo $game['game']['sale']; ?>">
  </div>
<?php endif; ?>
</div>
<div class="img-edit">
  <img src="<?php echo $game['game']['file_path']; ?>">
  <p>サムネイル画像を変更する<Br>(縦:横の比率は1:2～2:3推奨)</p>
    <input type="file" name="image" accept="image/*" multiple>
  </div>
</div>
</div>
</div>
</div>
<input type="submit" name="post_btn" value="確認画面へ" class="post_btn">
</form>
</div>
<div class="jump">
  <a href="#recommend"><img src="/img/top.png" alt=""><br>PAGE TOP</a>
</div>
<div class="back">
  <a href="#" onclick="window.history.back(); return false;"><img src="/img/back.png" alt="もどる"> もどる</a>
</div>
</body>
</html>
