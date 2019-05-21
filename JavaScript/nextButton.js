
$('.btn').on('click', function () {
    var number = parseInt($(this).attr('id'));
    var buttonId = 'personal' + (number + 1);
    $('#' + buttonId).click();
});

$('.btn-tab').on('click', function(){
    var tabName = $(this).attr('name');
    $(tabName).click();
});
