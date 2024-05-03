<?php

function db_conn(){
    $host = "localhost";
    $username = "root";
    $passsword ="";
    $db ="regsiter_hub";

    $conn = new mysqli($host, $username, $passsword, $db) or die("Unable to connect");
    return $conn;
}

function getParticipantByLastname($lastname){
    $conn=db_conn();
    $sql="SELECT * FROM participant WHERE lastname like '%" .$lastname."%'";
    $result=$conn->query($sql)or die ("Error query");
    if ($result->num_rows>0){
        while($data=$result->fetch_assoc()){
            $container[]=$data;
        }
        return json_encode($container);
    }
    
    }
    
    function getParticipantByCompany($company){
        $conn=db_conn();
        $sql="SELECT * FROM participant WHERE company like '%".$company."%'";
        $result=$conn->query($sql);
        if ($result->num_rows>0){
            while($data=$result->fetch_assoc()){
                $container[]=$data;
            }
            return json_encode($container);
        }
        
        }

        function getAllParticipant(){
            $conn=db_conn();
            $sql="SELECT * FROM participant";
            $result=$conn->query($sql);
            if ($result->num_rows>0){
                while($data=$result->fetch_assoc()){
                    $container[]=$data;
                }
                return json_encode($container);
            }
            
            }

            function updateParticipant($id, $firstname,$lastname, $email, $password, $sex, $company, $mobile, $role){
                $conn=db_conn();
                $sql="UPDATE `participant` SET `lastname`='$lastname',`firstname`='$firstname',`email`='$email',`password`='$password',`sex`='$sex',`company`='$company',`role`='$role',`mobile`='$mobile' WHERE `participant_id` = $id";
                $result=$conn->query($sql);
                if($result){
                    return true;
                }
                    else{
                        return false;
                    }
                }
                function deleteParticipant($id){
                    $conn=db_conn();
                    $sql="DELETE FROM participant WHERE participant_id = $id";
                    $result=$conn->query($sql);
                    if ($result) {
                        return true;
                    } else {
                        return false;
                    }
                }     
        function insertParticipant( $firstname,$lastname, $email, $password, $sex, $company, $mobile, $role){
        $conn = db_conn();
        $sql = "INSERT INTO `participant`(`lastname`, `firstname`,`password`, `sex`, `company`, `email`, `mobile`, `role`) 
                VALUES ('$lastname','$firstname','$password','$sex','$company','$email','$mobile','$role')";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
