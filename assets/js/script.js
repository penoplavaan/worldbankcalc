$(document).ready(function () {
	window.location.assign("https://livebook72.ru/worldbankcalc/");
    var slider = document.getElementById("sumContrSlider");
    var output = document.getElementById("sumContr");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.setAttribute("value", this.value);
    }

    var sliderAdd = document.getElementById("sumAddSlider");
    var outputAdd = document.getElementById("sumAdd");
    outputAdd.innerHTML = sliderAdd.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    sliderAdd.oninput = function() {
        outputAdd.setAttribute("value", this.value);
    }

    $("#calculate-button").click(
		function(){
            if($("#datepicker").val()){
                sendAjaxForm('#for-result', 'calc', 'assets/calc.php');
                return false; 
            }
			else{
                alert('Ошибка. Заполните все поля!');
                return false; 
            }
			
		}
	);

    function sendAjaxForm(result_form, ajax_form, url) {
        $.ajax({
            url:     url, //url страницы (action_ajax_form.php)
            type:     "POST", //метод отправки 
            data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
            success: function(response) { //Данные отправлены успешно 
                result = $.parseJSON(response)
                $(result_form).html('<span class="greenAccent">Сумма:</span> '+result.sum);
            } 
         });
    }

  });

 
