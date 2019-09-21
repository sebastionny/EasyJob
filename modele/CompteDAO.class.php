<?php
/**
 * Description of CompteDAO.class
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
/*include_once('./classes/Database.class.php');
include_once('./classes/Compte.class.php');*/
include_once('modele/classes/Database.class.php');
include_once('modele/classes/Compte.class.php');
class CompteDAO {
    public static function find($courriel)
    {
            $db = Database::getInstance();

                $pstmt = $db->prepare("SELECT * FROM compte WHERE couriel = :x");
                $pstmt->execute(array(':x' => $courriel));
                $result = $pstmt->fetch(PDO::FETCH_OBJ);
                $c= new Compte();
                if ($result)
                {
					/*$c = new Compte();*/

                    $c->setCourriel($result->couriel);
                    $c->setMotDePasse($result->motPasse);
                    $c->setEstEmploye($result->estEmploye);
                  /*  $c->setNom($result->nom);*/
                   /* $c->setPrenom($result->prenom);*/
                  /*  $pstmt->closeCursor();*/
					return $c;
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
    }
    public static function findAll()
    {
            $db = Database::getInstance();
            $compt = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM compte");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $c = new Compte();
                        $c->loadFromObject($result);
                        array_push($compt, $c);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $compt;
    }
    public static function create($compte)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("INSERT INTO compte(idCompte, nom, prenom, motPasse, couriel, active)".
                                                  " VALUES (:i,:n,:p,:m,:c,:a)");
                $n = $pstmt->execute(array(':i' => $compte->getIdCompte(),
                                            ':n' => $compte->getNom(),
					   ':p' => $compte->getPrenom(),
                                           ':m' => $compte->getMotDePasse(),
                                            ':c' => $compte->getCourriel(),
                                            ':a' => $compte->getActive()));
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
			return $n;            
    }    
    public static function delete($compte)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM compte WHERE idCompte=:id");
                $n = $pstmt->execute(array(':id' => $compte->getIdCompte()));

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
        $c= new Compte();
        $c->setIdCompte($id);
        self::delete($c);
    } 
    public static function update($compte)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE compte SET nom=:n, prenom=:p, motPasse=:m, couriel=:c, active=:a WHERE idCompte=:id");
                $n = $pstmt->execute(array(':id' => $compte->getIdCompte(),
										    ':n' => $compte->getNom(),
										    ':p' => $compte->getPrenom(),
                                                                                    ':m' => $compte->getMotDePasse(),
                                                                                    ':c' => $compte->getCourriel(),
										    ':a' => $compte->getActive()));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}
