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

$('.btn-guard').on('click', function() {
    var guardInputs = document.getElementsByName("guardian");
    var guardAdd2 = document.getElementById('guardAddress2');
    for (let i = 0; i < guardInputs.length; i++){
        if(guardInputs[i].required) {
            guardInputs[i].required = false;
            guardInputs[i].disabled = true;
            guardAdd2.disabled = true;
        } else {
            guardInputs[i].required = true;
            guardInputs[i].disabled = false;
            guardAdd2.disabled = false;
        }
    }
    });

/*$('.btn-tab').on('click', function(){
    var tabName = $(this).attr('name');
    $(tabName).click();
});*/

$('.btn-conf').on('click', function(){
    var inputs = document.getElementsByTagName("input");
    var valid = true;
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].required){
            console.log(inputs[i].value);
            if(inputs[i].value === ""){

                valid = false;
            }
        }
        $.post('model/sessionBuilder.php', {value : inputs[i].value, id : inputs[i].id});

    }
    var medArray = document.getElementsByName('medArray');
    var medValues = [];
    var freqArray = document.getElementsByName('freqArray');
    var freqValues = [];
    var timeArray = document.getElementsByName('timeArray');
    var timeValues = [];
    for (let i = 0; i < medArray.length; i++){
        medValues[i] = medArray[i].value;
        freqValues[i] = freqArray[i].value;
        timeValues[i] = timeArray[i].value;
    }
    console.log(medValues);
    $.post('model/medicalArrays.php', {meds : medValues, freqs : freqValues, times: timeValues});
    if(valid === true){
        window.location.href="confirmation";
    }

});

function validate(name) {
    console.log(name);
    var pass = true;

// Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName(name);
    var inputs = document.getElementsByTagName("input");
    for (let i = 0; i < inputs.length; i++) {
        $.post('model/sessionBuilder.php', {value : inputs[i].value, id : inputs[i].id});
    }
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
