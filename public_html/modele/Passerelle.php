<?php
class Passerelle{
        static private $mysql_link;
        
	static function connexion($mysql_hote,$mysql_db,$mysql_user,$mysql_pass){
		Passerelle::$mysql_link = new PDO("mysql:host=$mysql_hote;dbname=$mysql_db", "$mysql_user", "$mysql_pass");
	}
	static function addPrescripteur($nom,$tel,$description,$mail){
            $description = addslashes($description);
            $sql = "insert prescripteurs(con_id, con_nom, con_tel, con_description, con_mail) values (NULL,'$nom','$tel','$description','$mail')";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
        static function getPrescripteurs(){
            $prescripteurs = array();
            $sql = "select * from prescripteurs order by con_nom ASC";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $id = $row['con_id'];
                            $nom = $row['con_nom'];
                            $tel = $row['con_tel'];
                            $description = $row['con_description'];
                            $mail = $row['con_mail'];
                            $prescripteur = new Prescripteur($id,$nom,$tel,$description,$mail);
                            $prescripteurs[] = $prescripteur;
            }		
            return $prescripteurs;
        }
        static function getOnePrescripteur($id){
            $prescripteur = null;
            if ($id != -1) {
                    $sql ="select * from prescripteurs where con_id=".$id;
                    $result = Passerelle::$mysql_link->query($sql);
                    if ($result){
                            $row = $result->fetch();
                            $nom = $row['con_nom'];
                            $tel = $row['con_tel'];
                            $description = $row['con_description'];
                            $mail= $row['con_mail'];
                            $prescripteur = new Prescripteur($id,$nom,$tel,$description,$mail);			
                    }
            }
            return $prescripteur;
        }
        static  function updateOnePrescripteur($id,$nom, $tel, $description, $mail){
           $prescripteur = null;
           if($id != -1){
               $sql = "UPDATE `prescripteurs` SET `con_nom`='".$nom."',`con_tel`='".$tel."',`con_description`='".$description."',`con_mail`='".$mail."' WHERE con_id=".$id."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
       static  function delPrescripteur($id){
           if($id != -1){
               $sql ="DELETE FROM `prescripteurs` WHERE `con_id`=".$id."";
               $result = Passerelle::$mysql_link->query($sql);
           }
       }
}
?>