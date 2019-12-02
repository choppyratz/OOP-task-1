<?php
class Worker
{
    public $fio;
    public $profession;
    public $salary;
    public $time;
    private $cost = 0;
    
    function __construct($fio, $profession, $salary, $time) {
        $this->fio = $fio; 
        $this->profession = $profession; 
        $this->salary = $salary; 
        $this->time = $time;
    }
    
    /**
     * Calculate the cost of the worker
     */
    public function calcCost() {
        if ($this->time == "all") {
            $this->cost = $this->salary;         
        } else {
           $this->cost = ( (int) $this->time ) * $this->salary;        
        }  
        return $this->cost;
    }
    
    /**
     * Print information about worker
     */
    public function printWorkerInfo() {
        echo "\n\nfio: " . $this->fio;
        echo "\nprofession: " . $this->profession;
        echo "\nsalary: " . $this->salary;
        echo "\ntime: " . $this->time;
    }
}

class Project
{
    public $totalCost = 0;
    private $worker;
    
    /**
     * add worker to the project
     * @param string $fio  name of the worker
     * @param string $profession profession of the worker
     * @param int $salary salary of the worker per $time
     * @param string $time count and type of the time
     */
    public function addWorker($fio, $profession, $salary, $time) {
        $this->worker = new Worker($fio, $profession, $salary, $time);
        $this->worker->printWorkerInfo();
        $this->totalCost = $this->totalCost + $this->worker->calcCost();
    }
    
    /**
     * Calculating total cost of the project
     */
    public function calcTotal() {
        return $this->totalCost;
    }

}

$X = new Project;
$X->addWorker("Masha", "Designer", 3000, "all");
$X->addWorker("Petya", "Senior Developer", 10, "60h");
$X->addWorker("Vasya", "Middle Developer", 1000, "3m");
$X->addWorker("Kolya", "Middle Developer", 1000, "3m");
$X->addWorker("Anton", "Front-end Developer", 5, "120h");

$projectCost = $X->calcTotal();

echo "\n\nTotal Project cost: " . $projectCost; 

