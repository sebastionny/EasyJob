<?php
/**
 * Description of RestaurantDAO.class
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
include_once('classes/Database.class.php');
include_once('classes/Restaurant.class.php');
class RestaurantDAO {
    public static function find($id)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM restaurant WHERE idRest = :x");
                $pstmt->execute(array(':x' => $id));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result)
                {
					$r = new Restaurant();
					$r->loadFromObject($result);
					$pstmt->closeCursor();
					$pstmt = NULL;
					Database::close();
					return $r;
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return NULL;
    }

    public static function findByIdEmployeur($id)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM restaurant WHERE idEmployeur = :x");
                $pstmt->execute(array(':x' => $id));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result)
                {
					$r = new Restaurant();
					$r->loadFromObject($result);
					$pstmt->closeCursor();
					$pstmt = NULL;
					Database::close();
					return $r;
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }
            return NULL;
    }
    public static function findAll()
    {
            $db = Database::getInstance();
            $rest = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM restaurant");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $r = new Restaurant();
                        $r->loadFromObject($result);
                        array_push($rest, $r);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $rest;
    }
    public static function create($rest)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
         
                $pstmt = $db->prepare("INSERT INTO restaurant (idRest, nomRest, adresseRest, telRest, descRest, provinceRest, villeRest, codePostalRest, idEmployeur)".
                                                  " VALUES (:ir,:nr,:ar,:tr,:dr,:pr,:vr,:cpr,:ie)");
                $n = $pstmt->execute(array(':ir' => $rest->getIdRest(),
                                            ':nr' => $rest->getNomRest(),
					                        ':ar' => $rest->getAdresseRest(),
                                           ':tr' => $rest->getTelRest(),
                                            ':dr' => $rest->getDescRest(),
                                            ':pr' => $rest->getProvinceRest(),
                                            ':vr' => $rest->getVilleRest(),
                                            ':cpr' => $rest->getCodePostalRest(),
                                            ':ie' => $rest->getIdEmployeur()));
                                            
                    
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
			return $n;            
    }    
    public static function delete($rest)
    {
            $db = Database::getInstance();
	 $n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM restaurant WHERE idRest=:id");
                $n = $pstmt->execute(array(':id' => $rest->getIdRest()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $n;
    } 
    public static function deleteById($id)
    {
        $r= new Restaurant();
        $r->setIdRes($id);
        self::delete($r);
                   
    }  
    public static function update($rest)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE restaurant SET nomRest=:nr, adresseRest=:ar, telRest=:tr, descRest=:dr,provinceRest=:pr, villeRest=:vr, codePostalRest=:cpr, idEmployeur=:ie WHERE idRest=:id");
                $n = $pstmt->execute(array(':id' => $rest->getIdRest(),
                                           ':nr' => $rest->getNomRest(),
                                            ':ar' => $rest->getAdresseRest(),
                                           ':tr' => $rest->getTelRest(),
                                            ':dr' => $rest->getDescRest(),
                                            ':pr' => $rest->getProvinceRest(),
                                            ':vr' => $rest->getVilleRest(),
                                            ':cpr' => $rest->getCodePostalRest(),
                                            ':ie' => $rest->getIdEmployeur()));
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}
