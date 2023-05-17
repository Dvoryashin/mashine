<?php
abstract class Mashine{
    public function __construct(int $speed_drive_ahead, int $speed_drive_back, int $tank_volume, string $lamp_power, string $type){
        $this->speed_drive_ahead = $speed_drive_ahead;
        $this->speed_drive_back = $speed_drive_back;
        $this->tank_volume = $tank_volume;
        $this->lamp_power = $lamp_power;
        $this->type = $type;
    }
    public function about(){
        echo $this->type . " : " . $this->speed_drive_ahead . "км/ч - скорость движения передним ходом \n";
        echo $this->type . " : " . $this->speed_drive_back . "км/ч  - скорость движения задним ходом \n";
        echo $this->type . " : " . $this->tank_volume . "л - объём бака \n";
        echo $this->type . " : " . 'фары ' . $this->lamp_power . "\n";
    }
    public function check_lamp(){
        if($this->lamp_power == 'отсутствуют'){
            return 0;
        }
        return 1;
    }
    public function lamp_off(){
        if($this->check_lamp() == 1){
            $this->lamp = 'выключены';
            echo $this->type . " : " . 'фары ' . $this->lamp . "\n";
        }
    }
    public function lamp_on(){
        if($this->check_lamp() == 1){
            $this->lamp = 'включены';
            echo $this->type . " : " . 'фары ' . $this->lamp . "\n";
        }
    }
    public function move_ahead(int $distance){
        echo "Мы проехали вперёд " . $distance . " км за " . $distance / $this->speed_drive_ahead * 60 . " минут \n"; 
    }
    public function move_back(int $distance){
        echo "Мы проехали назад " . $distance . " км за " . $distance / $this->speed_drive_back * 60 . " минут \n"; 
    }

}

class Auto extends Mashine{
    public function nitrous_oxide(int $volume){
        $this->speed_drive_ahead = $volume * $this->speed_drive_ahead;
        echo "Загружено " . $volume . "л закиси азота \n";
        echo "Разгоняемся... скорость уже " . $this->speed_drive_ahead . "км/ч! \n";
    }
}

class Bulldozer extends Mashine{
    
    public function create_bulldozer(int $volume, string $ladle_pos){
        $this->ladle_volume = $volume;
        $this->ladle_pos = $ladle_pos;
        echo 'Объём ковша - ' . $this->ladle_volume . ' квадратных метров' . "\n";
        echo 'Ковш находится ' . $this->ladle_pos . "\n";
        
    }
    public function check_ladle_pos(){
        if($this->ladle_pos == "снизу"){
            return 1;
        }
        else{
            return 0;   
        }
    }
    public function move_ladle_down(){
        if($this->ladle_pos == 'сверху'){
            echo "Мы опустили ковш \n";
            $this->ladle_pos = "снизу";
        }
    }
    public function move_ladle_up(){
        if($this->ladle_pos == 'снизу'){
            echo "Мы подняли ковш \n";
            $this->ladle_pos = "сверху";
        }
    }
}

class Tank extends Mashine{
    public function shot(int $caliber){
        echo "Загрузили снаряд " . $distance . "калибра";
        if(rand(0, 1)){
            echo "Мы попали в противника!";
        }
        else{
            echo "Мы промахнулись";
        }
    }
}
$auto = new Auto(75, 20, 40, 'включены', 'Авто');
$auto->about();
$auto->lamp_off();
$auto->lamp_on();
$auto->move_ahead(10);
$auto->move_back(2);
$auto->nitrous_oxide(3);
$auto->move_ahead(2);
$auto->move_back(1);

echo "\n";

$bulldozer = new Bulldozer(40, 40, 100, 'выключены', 'Бульдозер');
$bulldozer->about();
$bulldozer->create_bulldozer(2, "снизу");
$bulldozer->move_ladle_up();
$bulldozer->move_ladle_down();
$bulldozer->move_ahead(3);
$bulldozer->move_back(1);

echo "\n";

$tank = new Tank(15, 5, 70, 'отсутствуют', 'Танк');
$tank->about();
$tank->move_ahead(20);
$tank->move_back(3);
?>
