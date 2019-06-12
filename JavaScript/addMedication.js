$('.btn-med').on('click', function(){
    var num = parseInt($(this).attr('name'));

    $('.medications').append("<input type=\"text\" class=\"form-control\" id=\"med" + num +"\" name='medArray'>");
    $('.frequencies').append("<input type=\"text\" class=\"form-control\" id=\"freq" + num +"\" name='freqArray'>");
    $('.times').append("<input type=\"text\" class=\"form-control\" id=\"time"+ num + "\" name='timeArray'>");

    $(this).attr('name', num+1);
});