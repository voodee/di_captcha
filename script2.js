var cell_size = 3;
function di_captcha_refresh() {
  $.post('./index2.php', {action: 'captcha_refresh'},
    function(data) {
      var data = eval(data);
      $('#DICaptchaPic').css('width', ((((cell_size+2)*6)+(3*cell_size)+1)*data[0]));
      var html_p_tag = '';
      for (i = 1; i <= 7*7*data[0]; ++i)  {
        var style = (i%7 == 0)?'margin-right: '+2*cell_size+'px;':'';
        for (j = 0; j < data[1].length; j += 2) style +=(((i%(data[0]*7)==0)?(data[0]*7):i%(data[0]*7)) == data[1][j] && Math.ceil(i/(data[0]*7)) == data[1][j+1])?'background-color: #000;':'';
        html_p_tag += '<p'+((style=='')?'':' style=\''+style+'\'')+'></p>';
      }
      $('#DICaptchaPic').html(html_p_tag);
    }
  )
}

$(document).ready(function() {
  $('#DICaptchaPic').css('overflow', 'hidden');
  $('#DICaptchaPic').css('height', (cell_size+2)*7);
  di_captcha_refresh();
  $('#DICaptchaPic').click(function() {di_captcha_refresh();});
  $('#text_captcha').focus()
})