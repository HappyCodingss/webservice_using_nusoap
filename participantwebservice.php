<?php
require "nusoap.php";
require "api.php";

$soap=new nusoap_server();
$soap->configureWSDL("participantwebservice","urn:register");
$soap->register(
                    "getParticipantByLastname",
                    array(
                        "lastname"=>"xsd:string"  
                    ),
                    array("result" =>"xsd:string")
                );

$soap->register(
                    "getParticipantByCompany",
                    array(
                        "company"=>"xsd:string"  
                    ),
                    array("result" =>"xsd:string")
                );
$soap->register(
                    "getAllParticipant",
                    array(),
                    array("result" =>"xsd:string")
                );
$soap->register(
                    "insertParticipant",
                    array(
                        "firstname"=>"xsd:string", 
                        "lastname"=>"xsd:string", 
                        "email"=>"xsd:string", 
                        "password"=>"xsd:string", 
                        "sex"=>"xsd:string",
                        "company"=>"xsd:string", 
                        "mobile"=>"xsd:long", 
                        "role"=>"xsd:string",
                    ),
                    array("result" =>"xsd:boolean")
                );

$soap->register(
                    "updateParticipant",
                    array(
                            "participant_id"=> "xsd:integer",
                            "firstname"=>"xsd:string", 
                            "lastname"=>"xsd:string", 
                            "email"=>"xsd:string", 
                            "password"=>"xsd:string", 
                            "sex"=>"xsd:string",
                            "company"=>"xsd:string", 
                            "mobile"=>"xsd:long", 
                            "role"=>"xsd:string",
                    ),
                    array("result" =>"xsd:string")
                );

$soap->register(
                    "deleteParticipant",
                    array(
                            "paticipant_id" => "xsd:integer",
                        ),
                    array(
                            "result" =>"xsd:boolean"
                        )
                );


$soap->service(file_get_contents("php://input"));

?>