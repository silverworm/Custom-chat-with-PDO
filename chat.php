<?php
require_once 'core/init.php';

$data = new Messages();

if(isset($_POST['step'])){
  switch ($_POST['step']) {
    case 'add_message':
    if(Filter::chec_URLs($_SzzERVER['HTTP_HOST'])){
      if(isset($_POST['message'])){
        $result = $data->add_message($_POST['message']);
        echo $result;
      }
      return $result;
    }else{
      return 'baned';
    }
    break;
    case 'display_messages':
    $count_messages = Config::get('count_display_messages');
    $result = $data->get_with_count($count_messages);
    echo json_encode($result);
    break;

    default:
      # code...
    break;
  }
}
?>