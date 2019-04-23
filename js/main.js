var messages = {
  init : function(){
    console.log('init');
    $('#new_message').on('submit', function(event){
      event.preventDefault();
      console.log('submit');
      messages.post_message(this);
    });
    messages.display_messages();
    var timerId = setInterval(function(){messages.display_messages()},20000);
    // clearTimeout(timerId);
  },
  get_message : function(form){
    var value = $(form).find('.message').val();
    return value;
  },
  post_message : function(form){
    var current_message = messages.get_message(form);
    if(current_message != ''){
      $.ajax({
        method: "POST",
        url: "chat.php",
        data: {
          step: 'add_message',
          message: current_message
        }
      }).done(function(result){
        if(result){
          messages.display_messages();
        }
      });
    }
  },
  display_messages : function(){
    $.ajax({
      method: "POST",
      url: "chat.php",
      dataType: 'json',
      data: {
        step: 'display_messages',
      }
    }).done(function(result){
      if(result){
        var chat_data = '';
        $.each(result,function(i,e){
          console.log(e.time);
          if(e.u_name){
            var user_name = e.u_name;
          }else{
            var user_name = 'Guest';
          }
          chat_data += "<li><div class='name'>"+user_name+"</div><div class='text_cont'>"+e.message+"</div><div class='text_time'>"+e.time+"</div>";
        });
        $('.chat_contain').html(chat_data);
      }
    });
  }


}

$(function(){
  messages.init();
})