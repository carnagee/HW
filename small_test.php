<?php

class Path {
    public $name;
    public $length;
    public $tutors;

    public function add_tutor($tutor_name) {
        $this->tutors[] = $tutor_name;
        return $this;
    }

    public function del_tutor($tutor_key) {
        unset($this->tutors[$tutor_key]);
        return $this;
    }

    public function __call($name, $args){
        echo "Function " . $name . " does not exist in this class!";
    }

    public function __toString(){
        $res = "This is a path named " . $this->name . "\n" .
        "It will take up to " . $this->length . " lessons.\n" .
        "The tutors there will be:\n";
        foreach ($this->tutors as $tutor){
            $res .= $tutor . "\n";
        }
        return $res;
    }

    public function __construct($name, $len, $tutors = []) {
        $this->name = $name;
        $this->length = $len;
        $this->tutors = $tutors;
    }
}

class Group {
	static $groupsAmount = 0;

    static public $numeration = [];
    public $students;
    public $room;
    public $schedule;
    public $path;
    public $name;

    function __construct($path, $room = "", $schedule = []){
      	self::$groupsAmount++;
        if ($path instanceof Path) {
            $this->path = $path;
            self::$numeration[$path->name] =
                isset(self::$numeration[$path->name])?
                    ++self::$numeration[$path->name]:1;
            $this->name = $this->path->name . " " . self::$numeration[$path->name];
        }
        $this->room = $room;
        $this->schedule = $schedule;
    }

    public function output(){
        print_r ("\n" . $this->name . "  
   |room: " . $this->room . "
   |schedule: " . $this->schedule['0'] . ", " . $this->schedule['1'] . "\n");
	}
}

$phpAdvanced = new Path("PHP Advanced", 40, ["Daniil", "Artem", "Natalie", "Ivan"]);
$feAdvanced = new Path("FE Advanced", 48, ["Daniil", "Alex", "Natalie", "Ivan"]);
$DesAdvanced = new Path("Design Advanced", 40, ["Daniil", "Alex", "Natalie", "Ivan"]);

$DesA1 = new Group($DesAdvanced, "grey", ["Monday", "Thursday"]);
$DesA1->output();
$phpA1 = new Group($phpAdvanced, "yellow", ["Monday", "Thursday"]);
$phpA1->output();
$phpA2 = new Group($phpAdvanced, "white", ["Wednesday", "Friday"]);
$phpA2->output();
$phpA3 = new Group($phpAdvanced, "white", ["Tuesda", "Friday"]);
$phpA3->output();
$feA1 = new Group($feAdvanced, "green", ["Tuesday", "Friday"]);
$feA1->output();
$feA2 = new Group($feAdvanced, "blue", ["Wednesday", "Friday"]);
$feA2->output();
$feA3 = new Group($feAdvanced, "green", ["Monday", "Thursday"]); 
$feA3->output();  

print "_______________________________________________________________
    We have " . Group::$groupsAmount . " group\n";

?>