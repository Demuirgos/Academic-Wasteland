<?php
require $_SERVER['DOCUMENT_ROOT']."/Models/Signature.Class.php" ;
class Petition  {
    public $Reference;
    public $Titre;
    public $Description;
    public $DatePublic;

    public function __construct($data) {
        $this->Reference = $data["IDP"];
        $this->Titre = $data["Titre"];
        $this->Description = $data["Description"];
        $this->DatePublic = date("d-M-y",strtotime($data["DatePublic"]));
    }

    public function Signatures(){
        $dbh=connect();
        $itms = array_map(  function($s){
                                return new Signature($s);
                            },getBy("Signature", $dbh, array(  "IDP" => $this->Reference)));
        usort($itms,function($a, $b) {
                        return new DateTime($a->Date) <=> new DateTime($b->Date);
                    });
        return $itms;
    }

    public function __toString() {
        return "{Titre: " . $this->Titre . "\n" .
            "IDP: " . $this->IDP . "\n" .
            "Description:" . $this->Description . "\n" .
            "Date Public:" . $this->DatePublic . "}\n";
    }
}
?>
