$(document).ready(function() {
    $("#btn").click(
        function() {
            sendAjaxForm('result_form', 'form_id', 'ajax/action_ajax_form.php');
            return false;
        }
    );
    $("#btn2").click(
        function() {
            sendAjaxForm('result_form2', 'form_id2', 'ajax/action_ajax_form.php');
            return false;
        }
    );
});

function sendAjaxForm(result_form, ajax_form, url) {
    var $this = jQuery("#" + ajax_form)
    jQuery.ajax({
        url: url, //url страницы (action_ajax_form.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: jQuery("#" + ajax_form).serialize(), // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
            result = jQuery.parseJSON(response);
            if (result.status === true) $this.hide(); //скрывает форму
            ym(87422196, 'reachGoal', 'form-send');
            gtag('event', 'send', { 'event_category': 'gis2', 'event_action': 'click' });
            document.getElementById(result_form).innerHTML = "Ваши данные отправлены! Спасибо за доверие " + result.name + "!";
        },
        error: function(response) { // Данные не отправлены
            document.getElementById(result_form).innerHTML = "Ошибка. Данные не отправлены.";
        }
    });
}