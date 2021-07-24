<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Games extends Db{
  public function __construct($dbh = null){
    parent::__construct($dbh);
  }

  public function finduser($email){
    $sql = 'SELECT * FROM user WHERE email = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array($email));
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function find_c_id($name){
    $sql = 'SELECT id, name FROM user WHERE name = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array($name));
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function myfav_list_game($email){
    $sql = 'SELECT * FROM favorite_game INNER JOIN game ON favorite_game.game_id = game.id
            WHERE favorite_game.user_id = (SELECT user.id FROM user WHERE user.email = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $email, PDO::PARAM_STR);
    $sth->execute();
    $user = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $user;
  }

  public function myfav_list_creator($email){
    $sql = 'SELECT user.id, user.name FROM favorite_user INNER JOIN user ON favorite_user.made_name = user.name
            WHERE favorite_user.user_id = (SELECT user.id FROM user WHERE user.email = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $email, PDO::PARAM_STR);
    $sth->execute();
    $user = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $user;
  }

  public function channel($name){
    $sql = 'SELECT channel FROM user WHERE name = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array($name));
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function fav_count($id = 0){
    $sql = 'SELECT count(id) AS fav FROM favorite_game WHERE game_id = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    $game = $sth->fetch(PDO::FETCH_ASSOC);
    return $game;
  }

  public function creatorgames($name){
    $sql = 'SELECT * FROM game WHERE made_name= ?';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array($name));
    $game = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $game;
  }

  public function review_play_list($id = 0){
    $sql = 'SELECT review.name, review.review, review.url, (SELECT user.channel FROM user WHERE user.name = review.name) AS c_url
    FROM review WHERE game_id = ? AND url IS NOT NULL ORDER BY review.c_date DESC';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function review_list($id = 0){
    $sql = 'SELECT name, review FROM review WHERE game_id = ? AND url IS NULL ORDER BY review.c_date DESC';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function favorite_list($result){
    $sql = 'SELECT * FROM favorite_game WHERE favorite_game.game_id = ? AND favorite_game.user_id = (SELECT user.id FROM user WHERE user.email = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['game_id'], PDO::PARAM_INT);
    $sth->bindParam(2, $result['email'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function gamedetail($id = 0){
    $sql = 'SELECT * FROM game WHERE id = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function game_list($id = 0){
    $sql = 'SELECT * FROM game WHERE game.made_name = (SELECT user.name FROM user WHERE user.id = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function del_game($id = 0){
    $sql = 'DELETE FROM game WHERE id = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $id);
    $sth->execute();
  }

  public function fav_game($result){
    $sql = 'INSERT INTO favorite_game SET favorite_game.game_id = ?, favorite_game.user_id = (SELECT user.id FROM user WHERE user.email = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['game_id'], PDO::PARAM_INT);
    $sth->bindParam(2, $result['email'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function del_fav($result){
    $sql = 'DELETE FROM favorite_game WHERE favorite_game.game_id = ? AND favorite_game.user_id = (SELECT user.id FROM user WHERE user.email = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['game_id'], PDO::PARAM_INT);
    $sth->bindParam(2, $result['email'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function fav_creator($result){
    $sql = 'INSERT INTO favorite_user SET favorite_user.made_name = ?, favorite_user.user_id = (SELECT user.id FROM user WHERE user.email = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['made_name'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['email'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function del_fav_creator($result){
    $sql = 'DELETE FROM favorite_user WHERE favorite_user.made_name = ? AND favorite_user.user_id = (SELECT user.id FROM user WHERE user.email = ?)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['made_name'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['email'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function register($result){
    $pass = password_hash($result['pass'], PASSWORD_DEFAULT);
    $sql = 'INSERT INTO user SET email = ?, password = ?, name = ?, category = ?, play_time = ?, type = ?, channel = ?, c_date = NOW()';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['email'], PDO::PARAM_STR);
    $sth->bindParam(2, $pass, PDO::PARAM_STR);
    $sth->bindParam(3, $result['name'], PDO::PARAM_STR);
    $sth->bindParam(4, $result['category'], PDO::PARAM_STR);
    $sth->bindParam(5, $result['play_time'], PDO::PARAM_STR);
    $sth->bindParam(6, $result['type'], PDO::PARAM_STR);
    $sth->bindParam(7, $result['curl'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function game_register($result){
    $sql = 'INSERT INTO game SET game_name = ?, made_name = ?, category = ?, play_time = ?, system = ?, spec = ?, story = ?, sale = ?, file_path = ?, c_date = NOW()';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['game_name'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['made_name'], PDO::PARAM_STR);
    $sth->bindParam(3, $result['category'], PDO::PARAM_STR);
    $sth->bindParam(4, $result['play_time'], PDO::PARAM_STR);
    $sth->bindParam(5, $result['system'], PDO::PARAM_STR);
    $sth->bindParam(6, $result['spec'], PDO::PARAM_STR);
    $sth->bindParam(7, $result['story'], PDO::PARAM_STR);
    $sth->bindParam(8, $result['sale'], PDO::PARAM_STR);
    $sth->bindParam(9, $result['file_path'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function editok($result){
    $sql = 'UPDATE game SET game_name = ?, made_name = ?, category = ?, play_time = ?, system = ?, spec = ?, story = ?, sale = ?, file_path = ?, c_date = NOW() WHERE id = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['game_name'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['made_name'], PDO::PARAM_STR);
    $sth->bindParam(3, $result['category'], PDO::PARAM_STR);
    $sth->bindParam(4, $result['play_time'], PDO::PARAM_STR);
    $sth->bindParam(5, $result['system'], PDO::PARAM_STR);
    $sth->bindParam(6, $result['spec'], PDO::PARAM_STR);
    $sth->bindParam(7, $result['story'], PDO::PARAM_STR);
    $sth->bindParam(8, $result['sale'], PDO::PARAM_STR);
    $sth->bindParam(9, $result['file_path'], PDO::PARAM_STR);
    $sth->bindParam(10, $result['id'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function info_update($result){
    $sql = 'UPDATE user SET category = ?, play_time = ?, c_date = NOW() WHERE email = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['category'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['play_time'], PDO::PARAM_STR);
    $sth->bindParam(3, $result['email'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function passreset($result){
    $pass = password_hash($result['pass']['pass'], PASSWORD_DEFAULT);
    $sql = 'UPDATE user SET password = ? WHERE email = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $pass, PDO::PARAM_STR);
    $sth->bindParam(2, $result['email'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function review_post4($result){
    $sql = 'INSERT INTO review SET game_id = ?, name = ?, review = ?, c_date = NOW()';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['id'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['name'], PDO::PARAM_STR);
    $sth->bindParam(3, $result['review'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function review_post5($result){
    $sql = 'INSERT INTO review SET game_id = ?, name = ?, review = ?, url = ?, c_date = NOW()';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['id'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['name'], PDO::PARAM_STR);
    $sth->bindParam(3, $result['review'], PDO::PARAM_STR);
    $sth->bindParam(4, $result['play_url'], PDO::PARAM_STR);
    $sth->execute();
  }

  public function login($result){
    $sql = 'SELECT * FROM user WHERE email= ?';
    $sth = $this->dbh->prepare($sql);
    $sth->execute(array($result['email']));
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    return $user;
  }

  public function search_games($result){
    $sql = 'SELECT * FROM game WHERE category = ? AND play_time = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['category'], PDO::PARAM_STR);
    $sth->bindParam(2, $result['play_time'], PDO::PARAM_STR);
    $sth->execute();
    $game = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $game;
  }

  public function notime_search_games($result){
    $sql = 'SELECT * FROM game WHERE category = ?';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(1, $result['category'], PDO::PARAM_STR);
    $sth->execute();
    $game = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $game;
  }
}
?>
