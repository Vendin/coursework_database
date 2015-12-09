$(document).ready(function() {

  $('[name="mark"]').on('change', function(){
    mark = (this.value);
    $.ajax({
      type: "POST",
      url: "client/getAllModel",
      data: {
        mark: mark
      },
      success: function(data){
        list = JSON.parse(data);
        console.log((list));
        $('#mod').animate(
            {height: "show"},
            600
        )
        $('#model').html('');
        $('#model').append('<option disabled selected>Выберите модель</option>');
        $.each(list, function(i){
          $('#model').append('<option value="' + this['moid'] + '">' +  this['name_model'] + '</option>');
        });
        $('#model').removeAttr('disabled');

      }
    });
  });
  $('#save').on('click', function(){
    $('#client').animate(
        {opacity: "hide"},
        400,
        function(){
          $('#auto').animate(
              {opacity: "show"},
              600
          )
        }
    )
  });

  $('#sub').on('click', function(){
    $.ajax({
      type: "POST",
      url: "client/add",
      data: {
        uis: $('[name="uis"]').val(),
        firstname: $('[name="firstname"]').val(),
        lastname: $('[name="lastname"]').val(),
        number_pas: $('[name="number_pas"]').val(),
        number_phone: $('[name="number_phone"]').val(),
        mark: $('[name="mark"]').val(),
        model: $('[name="model"]').val(),
        year: $('[name="year"]').val()
      },
      success: function(data){
        praice = JSON.parse(data);
        $('#p').text(praice.price);
        $('#auto').animate(
            {opacity: "hide"},
            400,
            function(){
              $('#pri').animate(
                  {opacity: "show"},
                  600
              )
            }
        )
      }
    });
  })
});