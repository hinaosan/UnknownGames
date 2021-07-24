<?php
require_once(ROOT_PATH .'/Models/Games.php');

class Controller{
  private $request;
  private $Games;

  public function __construct(){
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;
    $this->Games = new Games();
  }

  public function findid($email){
    $user = $this->Games->finduser($email);
    return $user;
  }

  public function myfav_list($email){
    $fav_game = $this->Games->myfav_list_game($email);
    $fav_creator = $this->Games->myfav_list_creator($email);
    $fav_game = [
      'fav_game' => $fav_game,
      'fav_creator' => $fav_creator
    ];
    return $fav_game;
  }

  public function findurl($name){
    $user = $this->Games->channel($name);
    return $user;
  }

  public function list(){
    $play_list = $this->Games->review_play_list($this->request['get']['id']);
    $list = $this->Games->review_list($this->request['get']['id']);
    $result = [
      'play_list' => $play_list,
      'list' => $list
    ];
    return $result;
  }

  public function fav_list($result){
    $result = $this->Games->favorite_list($result);
    return $result;
  }

  public function c_id($result){
    $result = $this->Games->find_c_id($result);
    return $result;
  }

  public function findgame($name){
    $games = $this->Games->creatorgames($name);
    $params = [
      'games' => $games
    ];
    return $params;
  }

  public function view(){
    if(empty($this->request['get']['id'])){
      echo "指定のパラメータが不正です。このページを表示できません。";
      exit;
    }
    $game = $this->Games->gamedetail($this->request['get']['id']);
    $game_list = $this->Games->game_list($this->request['get']['id']);
    $fav_count = $this->Games->fav_count($this->request['get']['id']);
    $params = [
      'game' => $game,
      'game_list' => $game_list,
      'fav_count' => $fav_count
    ];
    return $params;
  }

  public function del(){
    $this->Games->del_game($this->request['get']['id']);
  }

  public function favorite($result){
    $this->Games->fav_game($result);
  }

  public function del_favorite($result){
    $this->Games->del_fav($result);
  }

  public function c_favorite($result){
    $this->Games->fav_creator($result);
  }

  public function del_c_favorite($result){
    $this->Games->del_fav_creator($result);
  }

  public function post($result){
    $this->Games->register($result);
  }

  public function game_post($result){
    $this->Games->game_register($result);
  }

  public function game_edit($result){
    $this->Games->editok($result);
  }

  public function game_info($result){
    $this->Games->info_update($result);
  }

  public function review4($result){
    $this->Games->review_post4($result);
  }

  public function review5($result){
    $this->Games->review_post5($result);
  }

  public function search($result){
    $games = $this->Games->search_games($result);
    $params = $games;
    return $params;
  }

  public function notime_search($result){
    $games = $this->Games->notime_search_games($result);
    $params = $games;
    return $params;
  }
}
?>
