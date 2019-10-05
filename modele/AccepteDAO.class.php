<?php
/**
 * Description of AccepteDAO.class
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
include_once('classes/Database.class.php');
include_once('classes/Accepte.class.php');
class AccepteDAO {
    public static function find($idE,$idS)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM accepte WHERE idEmploye = :x and idService= :y");
                $pstmt->execute(array(':x' => $idE, ':y'=> $idS));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result)
                {
					$a = new Accepte();
					$a->loadFromObject($result);
					$pstmt->closeCursor();
					$pstmt = NULL;
					Database::close();
					return $a;
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
            $accept = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM accepte");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $a = new Accepte();
                        $a->loadFromObject($result);
                        array_push($accept, $a);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $accept;
    }
    public static function create($accept)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
               
                $pstmt = $db->prepare("INSERT INTO accepte (fait, etoile, commentaire,idService,idEmploye)".
                                                  " VALUES (:i,:f,:e,:c,:is,:ie)");
                $n = $pstmt->execute(array(':f' => $accept->getFait(),
					   ':e' => $accept->getEtoile(),
                                           ':c' => $accept->getCommentaire(),
                                            ':is' => $accept->getIdService(),
                                            ':ie' => $accept->getIdEmploye()));
                                            
                
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
			return $n;            
    }    
    public static function delete($accept)
    {
            $db = Database::getInstance();
	 $n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM accepte WHERE idEmploye=:idE and idService=:idS");
                $n = $pstmt->execute(array(':idE' => $accept->getIdEmploye(), ':idS'=>$accept->getIdService()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $n;
    } 
    public static function deleteById($idE,$idS)
    {
        $a= new Compte();
        $a->setIdEmploye($idE);
        $a->setIdService($idS);
        self::delete($a);
                   
    } 
    public static function update($accept)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE accepte SET fait=:f, etoile=:e, commentaire=:c, idService=:is, idEmploye=:ie WHERE idEmploye=:idE and idService=:idS");
                $n = $pstmt->execute(array(':f' => $accept->getFait(),
					   ':e' => $accept->getEtoile(),
                                           ':c' => $accept->getCommentaire(),
                                           ':idS' => $accept->getIdService(),
                                           ':idE' => $accept->getIdEmploye()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}
