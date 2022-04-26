<?php
require $_SERVER['DOCUMENT_ROOT']."/Models/User.Class.php" ;

class Signature {
    public $PetitonRef;
    public $Reference;
    public $SignerRef;
    public $Date;

    public function __construct ($data){
        $this->PetitonRef = $data["IDP"];
        $this->Reference = $data["IDS"];
        $this->Date = $data["DateS"];
        $this->SignerRef = $data["IDU"];
    }

    public function Signer(){
        $dbh=connect();
        return new User(array_values(getBy("User", $dbh, array(  "IDU" => $this->SignerRef)))[0]);
    }

    public function getTime () {
        return date('m.d.y', $Date);
    }

    public function __toString() {
        return "{IDP: " . $this->IDP . "\n" .
                "IDS: " . $this->IDS . "\n" . 
                "Signer: " . $this.User . "\n" . 
                "Date: " . $this->Date . "\n}\n";

    }
}
?>
