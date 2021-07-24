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

if (empty($_GET)) {
  $user = $id->findid($_SESSION['email']);
  $name = $user['name'];
  $games = $id->findgame($name);
} elseif (!empty($_GET)) {
  $games = $id->view();
  $fav_list = $id->myfav_list($_SESSION['email']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Unknown Games</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/carousel.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="/js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript">
  function del(){
    if(confirm("削除しますか？")) {
      alert("削除しました");
    }else{
      return false;
    }
  };
  function fav() {
    alert('お気に入り登録しました。');
  }
  function delfav() {
    alert('お気に入り解除しました。');
  }
  </script>
</head>
<body id="top">
  <header>
    <?php
    include('header.php');
    ?>
  </header>
  <?php if ($user['type'] == 3): ?>
    <div id="recommend" class="caption">
      <h2><?php echo $user['name']; ?>さんが制作したゲーム一覧</h2>
    </div>
    <?php if (empty($games['games'])): ?>
      <div class="favorite">
        <img src="/img/null.png">
        <div class="gaiyou">
          <p>まだ登録がないようです。</p>
          <p>ゲームを新規投稿するとここに表示されます。</p>
        </div>
      </div>
    <?php else: ?>
      <p>サムネイル画像クリックで詳細画面へ遷移します</p>
      <?php foreach ($games['games'] as $games): ?>
        <div class="favorite">
          <a href="game.php?id=<?=$games['id']?>"><img src="<?php echo $games['file_path']; ?>"></a>
          <div class="gaiyou">
            <p>タイトル：<?php echo $games['game_name']; ?></p>
            <p>ジャンル：<?php echo $games['category']; ?></p>
          </div>
          <div class="games">
            <a href="game_edit.php?id=<?=$games['id']?>" class="kwsk">編集画面へ</a>
            <a href="delete.php?id=<?=$games['id']?>" onclick="return del();" class="delite">削除する</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
    <div class="post_game">
      <a href="game_post.php"> <img src="/img/controller.png" alt=""><p>ゲームを新規投稿する</p></a>
    </div>
  <?php else: ?>
    <div id="recommend" class="caption">
      <h2><?php echo $games['game_list']['0']['made_name']; ?>さんが制作したゲーム一覧</h2>
    </div>
    <?php foreach ($games['game_list'] as $key => $value): ?>
      <div class="favorite">
        <a href="game.php?id=<?=$value['id']?>"><img src="<?php echo $value['file_path']; ?>"></a>
        <div class="gaiyou">
          <p>タイトル：<?php echo $value['game_name']; ?></p>
          <p>ジャンル：<?php echo $value['category']; ?></p>
        </div>
        <div class="games">
          <a href="game.php?id=<?=$value['id']?>" class="kwsk">詳細画面へ</a>
        </div>
      </div>
    <?php endforeach; ?>
    <?php if (in_array($games['game_list']['0']['made_name'], array_column($fav_list['fav_creator'], 'name'))): ?>
      <div class="post_game">
        <a href="del_c_favorite.php?id=<?=$games['game_list']['0']['made_name']?>" onclick="delfav()" id="sumi"><img src="/img/heart.png" alt=""><p>お気に入りを解除する</p></a>
      </div>
    <?php else: ?>
      <div class="post_game">
        <a href="c_favorite.php?id=<?=$games['game_list']['0']['made_name']?>" onclick="fav()"><img src="/img/heart.png" alt=""><p>この制作者をお気に入り登録する</p></a>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <div class="jump">
    <a href="#recommend"><img src="/img/top.png" alt=""><br>PAGE TOP</a>
  </div>
</body>
</html>
