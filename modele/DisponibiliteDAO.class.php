<?php
/**
 * Description of DisponibiliteDAO
 *
 * @author Meryem, Am�lia, Assia et S�bastien
 */
include_once('modele/classes/Database.class.php');
include_once('modele/classes/Disponibilite.class.php');
class DisponibiliteDAO {
    public static function find($id)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM disponibilite WHERE idDispo = :x");
                $pstmt->execute(array(':x' => $id));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result)
                {
					$d = new Disponibilite();
					$d->loadFromObject($result);
					$pstmt->closeCursor();
					$pstmt = NULL;
					Database::close();
					return $d;
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }
            return NULL;
    }


    public static function findEmploye($id)
    {
        $db = Database::getInstance();
        $dispoArr = Array();
        try {
            $pstmt = $db->prepare("SELECT * FROM disponibilite WHERE idEmploye = :x");
            $pstmt->execute(array(':x' => $id));

            while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
            {
                $d = new Disponibilite();
                $d->loadFromObject($result);
                array_push($dispoArr, $d);
            }

            $pstmt->closeCursor();
            $pstmt = NULL;
            Database::close();
        }
        catch (PDOException $ex){
            return 'Erreur en DAO Dispo';
        }
        return $dispoArr;

    }

    public static function findAll()
    {
            $db = Database::getInstance();
            $dispo = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM disponibilite");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $d = new Disponibilite();
                        $d->loadFromObject($result);
                        array_push($dispo, $d);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }
            return $dispo;
    }



    public static function create($dispo)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("INSERT INTO disponibilite (jour, heureDebut, heureFin, idEmploye , idDispo)".
                                                  " VALUES (:j,:hd,:hf,:ie,:id)");
                $n = $pstmt->execute(array( ':j' => $dispo->getJour(),
					                        ':hd' => $dispo->getHeureDebut(),
                                            ':hf' => $dispo->getHeureFin(),
                                            ':ie' => $dispo->getIdEmploye(),
                                            ':id' => $dispo->getIdDispo()));


                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }
			return $n;
    }


    public static function delete($dispo)
    {
            $db = Database::getInstance();
	 $n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM disponibilite WHERE idEmploye= :id ");
                $n = $pstmt->execute(array(':id' => $dispo->getIdEmploye()));
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
        $d= new Employe();
        $d->setIdEmploye($id);
        self::delete($d);
    }

    public static function update($dispo)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE disponibilite SET jour=:j, deHeure=:dh, aHeure=:ah, idEmploye=:i WHERE IdDispo=:id");
                $n = $pstmt->execute(array( ':id' => $dispo->getIdDispo(),
										    ':j' => $dispo->getJour(),
										    ':dh' => $dispo->getHeureDebut(),
                                            ':ah' => $dispo->getHeureFin(),
                                            ':i' => $dispo->getIdEmploye()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}
