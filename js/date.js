let sptil_date = 0;
function sptil_date1(){
    let date_block_id = document.getElementById("date_block");
    date_block_id = date_block_id.value;
    let sptil_date = date_block_id.split('-');
    sptil_date.shift();
	sptil_date = sptil_date.map(item => item.split('').filter(num => num !== '0').join(''));
	console.log(sptil_date);
    $.ajax({
		url: '../functions/getSing.php',         /* Куда пойдет запрос */
		method: 'get',             /* Метод передачи (post или get) */
		dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
		data: {
			day: sptil_date[1],
            month: sptil_date[0]
		},     /* Параметры передаваемые в запросе. */
		success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
			// localStorage.date = data;
			console.log(date);
			console.log(day);
			console.log(month);
        }
	})
}