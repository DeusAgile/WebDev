<?php
class Card {
    public $num;
    public $isValid;
    public $emit;
    public function validate() {
        $sum = 0;
        $num = $_POST['num'];
        $num = strrev(preg_replace('/[^\d]/', '', $num));
        //Luna
        for ($i = 0, $j = strlen($num); $i < $j; $i++) {
            if (($i % 2) == 0) {
                $val = $num[$i];
            } else {
                $val = $num[$i] * 2;
                if ($val > 9)  $val -= 9;
            }
            $sum += $val;
            if (($sum%10)==0){
                $isValid = "Valid";
            } else {
                $isValid = "Invalid";
            }
        }
        //Эмитент
        $num = strrev($num);
        if((preg_match('/[5][1-5]/', mb_substr($num, 0, 2))) || (preg_match('/[6][7]/', mb_substr($num, 0, 2))) || (preg_match('/[6][7]/', mb_substr($num, 0, 2)))){
            $emit = 'MasterCard';
        } elseif ((preg_match('/[4][0-9]/', mb_substr($num, 0, 2))) || (preg_match('/[14]/', mb_substr($num, 0, 2)))) {
            $emit = 'Visa';
        } else {
            $emit = 'Проверьте правильность введенных данных!';
        }

        echo "<h2>Спасибо!</h2>";
        echo "<p>Номер карты: $num; Валидность: $isValid; Эмитент: $emit<p>";
    }
}

$CreditCard = new Card();
$CreditCard->validate();

?>