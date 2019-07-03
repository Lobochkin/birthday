<?php 
function show_programmer($num)
{
    $string = '';
    if ($num % 10 === 1 &&  $num % 100 !== 11) {
        $string =  $num ." день!";
    } elseif ($num % 10 >=2 && $num % 10 <= 4 && ($num % 100 < 12 || $num % 100 > 14)) {
        $string =  $num ." дня!";
    } else {
        $string =  $num ." дней!";
    } 
    return $string;
} 

$result =[];
if ((isset($_POST['name'])) && (!empty($_POST["name"]))) {
    // присвоить $result['name'] значение $_POST['name']
        $result['name'] = $_POST['name'];
    } else {
    // иначе, $result['name'] присвоить указанную строку
        $result['name'] = 'Вы не ввели в поле Ваше имя!';
    }
  // если в массиве $_POST есть ключ message и его значение не равно пустоте, то  
    if ((isset($_POST['data']))&& (!empty($_POST["data"]))) {
      // присвоить $result['message'] значение $_POST['message']
        $result['data'] = $_POST['data'];

        $arr_date = explode("-", $_POST['data']);
        $day = date("z", mktime(0, 0, 0, $arr_date[1], $arr_date[2], $arr_date[0])) - date("z");
        if ($day < 0) {
            $result['message'] = $_POST['name'] .", до дня рожденья осталось " . show_programmer(365 + $day);
        } elseif ($day === 0) {
            $result['message'] = "<h1>C днем рожденья ". $_POST['name']. " !</h1>";
        } else {
            $result['message'] = $_POST['name'] .", до дня рожденья осталось " . show_programmer($day);
        }
        } else {
          // иначе, $result['message'] присвоить указанную строку
            $result['data'] = 'Вы не ввели в поле дату!';
        }
  // преобразовать массив $result в json, а затем вывести его с помощью echo
echo json_encode($result);