<?php
/**
 * Description of EmployeurDAO.class
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
include_once('classes/Database.class.php');
include_once('classes/Employeur.class.php');
class EmployeurDAO {
    public static function find($id)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM employeur WHERE idEmployeur = :x");
                $pstmt->execute(array(':x' => $id));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result)
                {
					$e = new Employeur();
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
    public static function findByIdCommpte($id)
    {
        $db = Database::getInstance();
        try {
            $pstmt = $db->prepare("SELECT * FROM employeur WHERE idCompte = :x");
            $pstmt->execute(array(':x' => $id));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if ($result)
            {
                $e = new Employeur();
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
            $employeur = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM employeur");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $e = new Employeur();
                        $e->loadFromObject($result);
                        array_push($employeur, $e);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $employeur;
    }
    public static function create($employeur)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
          
                $pstmt = $db->prepare("INSERT INTO employeur (idEmployeur, photo, tel,idCompte)".
                                                  " VALUES (:i,:p,:t,:ic)");
                $n = $pstmt->execute(array(':i' => $employeur->getIdEmployeur(),
                                           ':p' => $employeur->getPhoto(),
                                           ':t' => $employeur->getTel(),
                                           ':ic' => $employeur->getIdCompte()));
                                            
             
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
			return $n;            
    }    
    public static function delete($employeur)
    {
            $db = Database::getInstance();
	 $n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM employeur WHERE idEmployeur=:id");
                $n = $pstmt->execute(array(':id' => $employeur->getIdEmployeur()));

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
        $e= new Employeur();
        $e->setIdEmployeur($id);
        self::delete($e);
                   
    } 
    public static function update($employeur)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE employeur SET  photo=:p, tel=:t, idCompte=:ic WHERE IdEmployeur=:id");
                $n = $pstmt->execute(array(':id' => $employeur->getIdEmployeur(),
                                            ':p' => $employeur->getPhoto(),
                                           ':t' => $employeur->getTel(),
                                           ':ic' => $employeur->getIdCompte()));
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}
