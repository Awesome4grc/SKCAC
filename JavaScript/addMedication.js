$('.btn-med').on('click', function(){
    var num = parseInt($(this).attr('name'));

    $('.medications').append("<input type=\"text\" class=\"form-control\" id=\"med" + num +"\">");
    $('.frequencies').append("<input type=\"text\" class=\"form-control\" id=\"freq" + num +"\">");
    $('.times').append("<input type=\"text\" class=\"form-control\" id=\"time"+ num + "\">");

    $(this).attr('name', num+1);
});