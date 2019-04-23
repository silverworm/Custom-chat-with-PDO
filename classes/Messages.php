<?php
class Messages{
  private $_db;

  function __construct(){
    $this->_db = DB::getInstance();
  }

  public function get_with_count($count){
    $data = $this->_db->get_count('messages', $count);
    return array_reverse($data->results());
  }

  public function add_message($message){

    $message = Filter::chec_words($message);

    $data_message = ['message'=>$message];
    $data = $this->_db->insert('messages', $data_message);
    return $data;
  }

}
?>