$(document).ready(function(){
  $('th#aj').on('click', function(){
    var number = $(this).text();
    $.ajax({
      type: "POST",
      url: "otchet",
      data: {
        number: number
      },
      success: function(){

      }
    })
  })
});