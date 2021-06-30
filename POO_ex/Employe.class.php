<?php


class Employe {
    private $_nom;
    private $_prenom;
    private $_date;
    private $_post;
    private $_salary;
    private $_service;
    private $_agence;

    public function __construct($nom,$prenom,$date,$post,$salary,$service){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_date = $date;
        $this->_post = $post;
        $this->_salary = $salary;
        $this->_service = $service;

        // $this->_agence = $agence;
    }

// EX_2
    public function getPeriod() {
        $now = new DateTime();
        // $date = DateTime::createFormFormat("Y-m-d", '2014-09-12');
        $interval = $now->diff($this->_date);
        $y = $interval->y;
        $m = $interval->m;
        $d = $interval->d;
        return array('y' => $y, 'm' => $m, 'd' => $d);
    }

// EX_3
    public function prime(){
        $now = new DateTime();
        $interval = $now->diff($this->_date);
        $y = $interval->y;
        $prime = 0.05*$this->_salary + 0.02*$this->_salary*$y;

        if($now->format('d') == 29 && $now->format('m') == 6) {
            return $prime;
        }
    }

// EX_7
    public function vacance(){
        $now = new DateTime();
        $interval = $now->diff($this->_date);
        $y = $interval->y;
        if($y>=1){
            echo "<br> L'employé ".$this->_prenom." ".$this->_nom." peut disposer de chèques
            vacances";
        } else{
            echo "<br> L'employé ".$this->_prenom." ".$this->_nom." ne peut pas disposer de chèques
            vacances";
        }
    }


    public function getAgence(){
        return $this->_agence;
    }
    public function setAgence($setAgence){
        return $this->_agence = $setAgence;
    }

    
    public function getNom(){
        if (!isset($_SESSION['login'])) {
            return $this->_nom;
        }
        else {
            return '';
        }
    }
    
    public function setNom($setNom){
        return $this->_nom = $setNom;
    }

    public function getPrenom(){
        return $this->_prenom;
    }
    public function setPrenom($setPrenom){
        return $this->_prenom = $setPrenom;
    }

    public function getDate(){
        return $this->_date;
    }
    public function setDate($setDate){
        return $this->_date = $setDate;
    }

    public function getPost(){
        return $this->_post;
    }
    public function setPost($setPost) {
        return $this->_post = $setPost;
    }

    public function getSalary(){
        return $this->_salary;
    }
    public function setSalary($setSalary){
        return $this->_salary = $setSalary;
    }

    public function getService(){
        return $this->_service;
    }
    public function setService($setService){
        return $this->_service = $setService;
    }
}


?>