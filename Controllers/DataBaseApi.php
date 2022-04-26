<?php
$local = array(
    "Petition" => array(
                        0 => array(
                            "IDP" => hash ( "sha1" , "dummy"),
                            "Titre" => "dummy",
                            "Description" => "descriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescription",
                            "DatePublic" => date("F j, Y, g:i a")
                        ),
                        1 => array(
                            "IDP" => hash ( "sha1" , "dummy1"),
                            "Titre" => "dummy1",
                            "Description" => "description1",
                            "DatePublic" => date("F j, Y, g:i a")
                        ),
                        2 => array(
                            "IDP" => hash ( "sha1" , "dummy2"),
                            "Titre" => "dummy2",
                            "Description" => "description2",
                            "DatePublic" => date("F j, Y, g:i a")
                        ),
                        3 => array(
                            "IDP" => hash ( "sha1" , "dummy3"),
                            "Titre" => "dummy3",
                            "Description" => "description3",
                            "DatePublic" => date("F j, Y, g:i a")
                        ),
                        4 => array(
                            "IDP" => hash ( "sha1" , "dummy4"),
                            "Titre" => "dummy4",
                            "Description" => "description4",
                            "DatePublic" => date("F j, Y, g:i a")
                        )
                    ),
    "User" => array(
                        0 => array(
                            "IDU" => "0",
                            "FirstName" => "Jane",
                            "LastName" => "Doee",
                            "Age" => "30",
                            "Gender" => false,
                            "Password" => "password",
                            "Email" => "jane.doe@mail.com",
                            "Country" => "country0"
                        ),
                        1 => array(
                            "IDU" => "1",
                            "FirstName" => "John",
                            "LastName" => "Doee",
                            "Age" => "18",
                            "Gender" => true,
                            "Password" => "password",
                            "Email" => "john.doe@mail.com",
                            "Country" => "country1"
                        ),
                        2 => array(
                            "IDU" => "2",
                            "FirstName" => "marchello",
                            "LastName" => "whatyudoin",
                            "Age" => "60",
                            "Gender" => true,
                            "Password" => "password",
                            "Email" => "marc.doe@mail.com",
                            "Country" => "country2"
                        ),
    ),
    "Signature" => array(
                        0 => array(
                            "IDS" => "0",
                            "IDP" => hash ( "sha1" , "dummy" . strval(rand(0,4))),
                            "IDU" => strval(rand(0,2)),
                            "DateS" => date("F j, Y, g:i a")
                        ),
                        5 => array(
                            "IDS" => "5",
                            "IDP" => hash ( "sha1" , "dummy" . strval(rand(0,4))),
                            "IDU" => strval(rand(0,2)),
                            "DateS" => date("F j, Y, g:i a")
                        ),
                        1 => array(
                            "IDS" => "1",
                            "IDP" => hash ( "sha1" , "dummy" . strval(rand(0,4))),
                            "IDU" => strval(rand(0,2)),
                            "DateS" => date("F j, Y, g:i a")
                        ),
                        2 => array(
                            "IDS" => "2",
                            "IDP" => hash ( "sha1" , "dummy" . strval(rand(0,4))),
                            "IDU" => strval(rand(0,2)),
                            "DateS" => date("F j, Y, g:i a")
                        ),
                        3 => array(
                            "IDS" => "3",
                            "IDP" => hash ( "sha1" , "dummy" . strval(rand(0,4))),
                            "IDU" => strval(rand(0,2)),
                            "DateS" => date("F j, Y, g:i a")
                        ),
                        4 => array(
                            "IDS" => "4",
                            "IDP" => hash ( "sha1" , "dummy" . strval(rand(0,4))),
                            "IDU" => strval(rand(0,2)),
                            "DateS" => date("F j, Y, g:i a")
                        ),
                    ),
);

function connect(){
    global  $local;
    $host = "localhost";
    $dbname = "Me2oo";
    $user = "CykaBlyat";
    $pass = "password";
    try {
        $dbh = new PDO(
            "mysql:host=$host;dbname=$dbname",
            $user,
            $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    } catch(PDOException $e) {
        return $local;
        //echo "Connection failed: " . $e->getMessage();
    }
}

function fetchData($dbh, $statement) {
    if ($dbh) {
        $query = $dbh->prepare($statement);
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if($res = null)
            return array();
        else return $res;
    }
    return array();
}

function updateData($dbh, $statement, $debug = true) {
    if ($dbh && !$debug) {
        $dbh->exec($statement); 
    }
}

function getBy ($table, $conn, $conds, $debug= true) {
    if($debug){
        return array_filter($conn[$table], function($e) use(&$conds){
            return array_reduce($conds, function ($acc, $itm) use(&$conds, $e){
                return $acc && ($e[array_search($itm, $conds)] == $itm);
            },true);
        });
    } else {
        $query = "SELECT * FROM " . $table;
        if(count($conds) != 0){
            $condStr = array_reduce($conds, function ($acc, $itm) use(&$conds){
                return $acc ." and ". array_search($itm, $conds) . " = " . $itm;
            },"");
            $query = $query . " WHERE " . $condStr . " true;";
        }
        return fetchData($conn, $query);
    }
}
?>