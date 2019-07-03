'use strict';   
var TIME_DELAY = 10000;
// после загрузки DOM модели
document.addEventListener('DOMContentLoaded', function() {
  // получим форму с id = "form"
  var form = document.getElementById('form');
  var result = document.getElementById('result');
  // при возникновении у формы события submit
  form.addEventListener('submit', function(e) {
    // создадим объект FormData и добавим в него данные из формы
    var formData = new FormData(form);
    // создадим объект XHR
    var xhr = new XMLHttpRequest();
    xhr.responseType = 'json';
      xhr.addEventListener('error', function () {
    console.log('Произошла ошибка соединения');
  });
  xhr.timeout = TIME_DELAY; // 10s
  xhr.addEventListener('timeout', function () {
    console.log('Запрос не успел выполниться за ' + xhr.timeout + 'мс');
  });

    // при изменении состояния запроса        
    xhr.addEventListener('readystatechange', function() {
      // если запрос завершился и код ответа сервера OK (200), то
      if (this.readyState == 4 && this.status == 200) {
        // разбираем строку json, который вернул сервер и помещаем её в переменную data
        var data = this.response;
        // создаём переменную, в которую будем складывать результат работы (маркированный список)
        var output = '<ul class="form__inner form__inner--flex">';
        // переберём объект data
        var names = {
          'name': 'Имя:',
          'data': 'Дата рождения:',
          'message': 'Сообщение для вас: ',
        };

        for (var key in data) {
          output += '<li><b>' + names[key] + "</b> " + data[key] + '</li>';
        }
        // добавим к переменной закрывающий тег ul
        output += '</ul>';
        // выведем в элемент (id = "result") значение переменной output
        document.getElementById('result').innerHTML = output;
        result.style.textAlign = 'inherit';
      } else if (this.readyState == 4 && this.status !== 200) {
        console.log('Ошибка: ' + xhr.status + ' ' + xhr.statusText);
      }
    });
    // инициализирум запрос
    xhr.open('POST', 'result.php');
    // отправляем запрос на сервер
    xhr.send(formData);
    // отменяем отправку формы стандартным способом
    e.preventDefault();
  });
});
