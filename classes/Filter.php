<?php
class Filter{

  public static function chec_words($text){ //filter bad words
    $_db = DB::getInstance();
    $data = $_db->get_all('bad_words');

    foreach ($data->results() as $key => $word) {
      if(!empty(stristr($text,$word->word))){
        $text = str_ireplace($word->word, "***", $text);
        error_log(print_r($_SERVER['HTTP_ORIGIN'].$_SERVER['HTTP_HOST']."-- bad word" ,true),3,Config::get('logs_path')."/log.log");
      }
    }

    return $text;
  }

  public static function chec_URLs($url){ //filter bad words

    error_log(print_r($_SERVER['HTTP_ORIGIN'].$_SERVER['HTTP_HOST']."-- host" ,true),3,Config::get('logs_path')."/log.log");

    $_db = DB::getInstance();
    $data = $_db->get_all('black_list');

    $data_with_black_list = [];

    foreach ($data->results() as $key => $url_blocked) {
      $data_with_black_list[] = $url_blocked->ip;
    }

    if(in_array($url, $data_with_black_list)){
      return false;
    }

    return true;
  }
}
?>