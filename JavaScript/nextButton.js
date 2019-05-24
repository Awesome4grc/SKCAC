/**
 * Author: Awesome Four (Adolfo, Alec, Bo, Keith)
 */

$('.btn-acc').on('click', function () {
    if(validate($(this).attr('name'))) {
        var number = parseInt($(this).attr('id'));
        var buttonId = 'personal' + (number + 1);
        $('#' + buttonId).click();
    }

});

$('.btn-tab').on('click', function(){
    var tabName = $(this).attr('name');
    $(tabName).click();
});

function validate(name) {

    var pass = true;

// Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName(name);
        console.log(forms);

// Loop over them and prevent submission
        Array.prototype.filter.call(forms, function (form) {
                if (form.checkValidity() === false) {
                    console.log("What");
                    pass = false;
                    console.log(form);
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
    console.log(pass);
    return pass;
}
