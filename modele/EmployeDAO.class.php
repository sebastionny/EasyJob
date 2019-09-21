<?php
/**
 * Description of EmployeDAO.class
 *
 * @author Meryem, Am�lia, Assia et S�bastien
 */
include_once('./classes/Database.class.php');
include_once('./classes/Employe.class.php');
class EmployeDAO {
    public static function find($id)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM employe WHERE idEmploye = :x");
                $pstmt->execute(array(':x' => $id));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result)
                {
					$e = new Employe();
					$e->loadFromObject($result);
					$pstmt->closeCursor();
					$pstmt = NULL;
					Database::close();
					return $e;
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
            $employe = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM employe");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $e = new Employe();
                        $e->loadFromObject($result);
                        array_push($employe, $e);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $employe;
    }
    public static function create($employe)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
          
                $pstmt = $db->prepare("INSERT INTO employe (idEmploye, dateNais, photo, tel, fonction, experience, qualite, nomRef, telRef,idCompte)".
                                                  " VALUES (:i,:d,:p,:t,:f,:e,:q,:nr,:tr,:ic)");
                $n = $pstmt->execute(array(':i' => $employe->getIdEmploye(),
                                            ':d' => $employe->getDateNaissance(),
					   ':p' => $employe->getPhoto(),
                                           ':t' => $employe->getTel(),
                                            ':f' => $employe->getFonction(),
                                            ':e' => $employe->getExperience(),
                                            ':q' => $employe->getQualite(),
                                            ':nr' => $employe->getNomRef(),
                                            ':tr' => $employe->getTelRef(),
                                            ':ic' => $employe->getIdCompte()));
                                            
                    
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
			return $n;            
    }    
    public static function delete($employe)
    {
            $db = Database::getInstance();
	 $n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM disponibilite WHERE idEmploye=:id");
                $n = $pstmt->execute(array(':id' => $employe->getIdEmploye()));

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
        $e= new Employe();
        $e->setIdEmploye($id);
        self::delete($e);
                   
    } 
    public static function update($employe)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE employe SET dateNais=:dn, photo=:p, tel=:t, fonction=:f, experience=:e, qualite=:q, nomRef=:nr, telRef=:tr, idCompte=:ic WHERE IdEmploye=:id");
                $n = $pstmt->execute(array(':id' => $employe->getIdEmploye(),
                                            ':dn' => $employe->getDateNaissance(),
					   ':p' => $employe->getPhoto(),
                                           ':t' => $employe->getTel(),
                                            ':f' => $employe->getFonction(),
                                            ':e' => $employe->getExperience(),
                                            ':q' => $employe->getQualite(),
                                            ':nr' => $employe->getNomRef(),
                                            ':tr' => $employe->getTelRef(),
                                            ':ic' => $employe->getIdCompte()));
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}