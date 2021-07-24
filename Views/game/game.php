<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
session_cache_limiter('none');
session_start();

if (empty($_SESSION)){
  header("location:login.php");
}

require_once(ROOT_PATH .'/Controllers/Controller.php');
$id = new Controller();
$game = $id->view();
$review = $id->list();

$c_id = $id->c_id($game['game']['made_name']);

$fav = array();
$fav['game_id'] = strval($_GET['id']);
$fav['email'] = strval($_SESSION['email']);
$fav_list = $id->fav_list($fav);
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
  <script type="text/javascript">
  function fav() {
    alert('お気に入り登録しました。');
  }
  function delfav() {
    alert('お気に入り解除しました。');
  }
  </script>
</head>
<body id="top">
  <header class="myh">
    <?php
    include('header.php');
    ?>
  </header>
  <div id="recommend" class="caption">
    <h2><?php echo $game['game']['game_name']; ?></h2>
  </div>
  <div id="game-detail">
    <div class="game-detail">
      <img src="<?php echo $game['game']['file_path']; ?>">
      <div class="outline">
        <div class="tab-wrap">
          <input id="tab01" type="radio" name="tab" class="tab-switch" checked="checked" /><label class="tab-label" for="tab01">ゲーム概要</label>
          <div class="tab-content">
            <p>制作者名：<?php echo $game['game']['made_name']; ?><?php if ($user['type'] != "3"): ?><a href="c-mypage.php?id=<?=$c_id['id']?>">（この制作者の他のゲームをみる）</a><?php endif; ?></p>
            <p>ジャンル：<?php echo $game['game']['category']; ?></p>
            <p>プレイ時間：<?php echo $game['game']['play_time']; ?></p>
            <p>内容<br><?php echo nl2br($game['game']['story']); ?></p>
          </div>
          <input id="tab02" type="radio" name="tab" class="tab-switch" /><label class="tab-label" for="tab02">操作方法・推奨環境</label>
          <div class="tab-content">
            <p>操作方法<br><?php echo $game['game']['system']; ?></p>
            <p>推奨環境<br><?php echo nl2br($game['game']['spec']); ?></p>
          </div>
          <input id="tab03" type="radio" name="tab" class="tab-switch" /><label class="tab-label" for="tab03">実況動画一覧</label>
          <div class="tab-content">
            <?php if (count($review['play_list']) != 0): ?>
              <?php foreach ($review['play_list'] as $key => $value): ?>
                <p style="text-align: center;">名前クリックでYouTubeチャンネルへ遷移します</p>
                <dl>
                  <dt><a href="<?php echo $value['c_url']; ?>" target="_blank" rel="noopener noreferrer"><img src="/img/douga.png" alt=""><?php echo $value['name']; ?></a></dt>
                  <dd><?php echo nl2br($value['review']); ?></dd>
                  <dd><a href="<?php echo $value['url']; ?>" target="_blank" rel="noopener noreferrer" class="play">&raquo;&#187;&nbsp;実況動画を見る</a></dd>
                </dl>
              <?php endforeach; ?>
            <?php else: ?>
              <p>投稿がありません。</p>
            <?php endif; ?>
          </div>
          <input id="tab04" type="radio" name="tab" class="tab-switch" /><label class="tab-label" for="tab04">レビュー一覧</label>
          <div class="tab-content">
            <?php if (count($review['list']) != 0): ?>
              <?php foreach ($review['list'] as $key => $value): ?>
                <dl>
                  <dt><img src="/img/review.png" alt=""><?php echo $value['name']; ?></dt>
                  <dd><?php echo nl2br($value['review']); ?></dd>
                </dl>
              <?php endforeach; ?>
            <?php else: ?>
              <p>投稿がありません。</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="sns">
      <a href="<?php echo $game['game']['sale']; ?>" target="_blank" rel="noopener noreferrer">
        <div class="f-btn">
          <img src="/img/controller.png" alt="controller">
          <div class="mask">
            <div class="caption">販売元サイトへ</div>
          </div>
        </div>
      </a>
      <a href="https://twitter.com/intent/tweet?url=<?php echo $game['game']['sale']; ?>">
        <div class="f-btn">
          <img src="/img/twitter.png" alt="twitter">
          <div class="mask">
            <div class="caption">このゲームについて<br>Tweetする</div>
          </div>
        </div>
      </a>
    </form>
    <?php if ($user['type'] == "1"): ?>
      <a href="review.php?id=<?=$game['game']['id']?>">
        <div class="f-btn">
          <img src="/img/review.png" alt="review">
          <div class="mask">
            <div class="caption">レビューする</div>
          </div>
        </div>
      </a>
    <?php elseif ($user['type'] == "2"): ?>
      <a href="review.php?id=<?=$game['game']['id']?>">
        <div class="f-btn">
          <img src="/img/douga.png" alt="douga">
          <div class="mask">
            <div class="caption">実況動画を投稿する</div>
          </div>
        </div>
      </a>
    <?php endif; ?>
    <?php if (!empty($fav_list)): ?>
      <a href="del_favorite.php?id=<?=$game['game']['id']?>" onclick="delfav()">
        <div class="f-btn" id="sumi">
          <img src="/img/heart.png" alt="heart">
          <div class="mask">
            <div class="caption">お気に入り登録を<br>解除する</div>
          </div>
        </div>
      </a>
    <?php elseif ($user['type'] !== "3"): ?>
      <a href="favorite.php?id=<?=$game['game']['id']?>" onclick="fav()">
        <div class="f-btn">
          <img src="/img/heart.png" alt="heart">
          <div class="mask">
            <div class="caption">お気に入り登録する</div>
          </div>
        </div>
      </a>
    <?php endif; ?>
    <?php if ($user['type'] == "3"): ?>
      <?php if ($game['fav_count']['fav'] == 0): ?>
        <div class="favcount">
          <img src="/img/heart.png" alt="heart">
          <p>まだお気に入り登録されていません。</p>
        </div>
      <?php else: ?>
        <div class="favcount">
          <img src="/img/heart.png" alt="heart">
          <p>このゲームを<?php echo $game['fav_count']['fav']; ?>人の方が<br>お気に入り登録しています！</p>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</body>
</html>
