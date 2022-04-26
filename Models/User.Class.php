<?php
require $_SERVER['DOCUMENT_ROOT']."/Controllers/DataBaseApi.php" ;

class User {
    public $Reference;
    public $Nom;
    public $Prenom;
    public $Gender;
    public $Age;
    public $Email;
    public $Pays;

    public function __construct ($data){
        $this->Reference = $data["IDU"];
        $this->Nom = $data["LastName"];
        $this->Prenom = $data["FirstName"];
        $this->Email = $data["Email"];
        $this->Age = $data["Age"];
        $this->Gender = $data["Gender"];
        $this->Pays = $data["Country"];
    }

    public function __toString() {
        return $this->Nom . ", " . $this->Prenom . ", " . $this->Gender . ", " . $this->Email . ", " . $this->Pays ;
    }
}
?>
