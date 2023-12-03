const modal_overlay = document.getElementById("modal_overlay");
const modal_block = document.getElementById("modal_block");
const modal_block2 = document.getElementById("modal_block2");

function update_redord(id) {
  let temp_id = id;
  up_button.value = temp_id;
  modal_block.style.visibility = "visible";
  modal_overlay.style.visibility = "visible";

  $.ajax({
    url: "../functions/who.php" /* Куда пойдет запрос */,
    method: "get" /* Метод передачи (post или get) */,
    dataType: "html" /* Тип данных в ответе (xml, json, script, html). */,
    data: {
      text: temp_id,
    } /* Параметры передаваемые в запросе. */,
    success: function (data) {
      /* функция которая будет выполнена после успешного запроса.  */
      var response = JSON.parse(data);
      up_header.value = response[0];
      up_text.value =
        response[1]; /* В переменной data содержится ответ от index.php. */
    },
  });
}
function promo(){
	if(promo_day.value == 'Avtor'){
		localStorage.setItem('text', '');
		localStorage.text = header_text.innerHTML = 'Автор приложение - Нижегородцев Дмитрий Ф3105с9';
	}
}
function close_win() {
  modal_block2.style.visibility = "hidden";
  modal_block.style.visibility = "hidden";
  modal_overlay.style.visibility = "hidden";
  // modal_overlay.style.display = 'none';
}
function add_records() {
  modal_overlay.style.visibility = "visible";
  modal_block2.style.visibility = "visible";
  modal_overlay.style.display = "flex";
}
