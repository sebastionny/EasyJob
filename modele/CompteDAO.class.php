<?php
/**
 * Description of CompteDAO.class
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
/*include_once('classes/Database.class.php');
include_once('classes/Compte.class.php');*/
include_once('modele/classes/Database.class.php');
include_once('modele/classes/Compte.class.php');
class CompteDAO {
    public static function find($courriel)
    {
            $db = Database::getInstance();

                $pstmt = $db->prepare("SELECT * FROM compte WHERE courriel = :x");
                $pstmt->execute(array(':x' => $courriel));
                $result = $pstmt->fetch(PDO::FETCH_OBJ);
                $c= new Compte();
                if ($result)
                {
                    $c->setCourriel($result->courriel);
                    $c->setMotDePasse($result->motDePasse);
                    $c->setEstEmploye($result->estEmploye);
                    $c->setNom($result->nom);
                    $c->setPrenom($result->prenom);
                    $c->setEstEmploye($result->estEmploye);
                    $c->setIdCompte($result->idCompte);
                    $c->setActive($result->active);

					return $c;
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
    }

    public static function findById($id)
    {
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT * FROM compte WHERE idCompte = :x");
        $pstmt->execute(array(':x' => $id));
        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        $c= new Compte();
        if ($result)
        {
            $c->setCourriel($result->courriel);
            $c->setMotDePasse($result->motDePasse);
            $c->setEstEmploye($result->estEmploye);
            $c->setNom($result->nom);
            $c->setPrenom($result->prenom);
            $c->setEstEmploye($result->estEmploye);
            $c->setIdCompte($result->idCompte);
            $c->setActive($result->active);

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
                $pstmt = $db->prepare("INSERT INTO compte(idCompte, nom, prenom, motDePasse, courriel, active, estEmploye)".
                                                  " VALUES (:i,:n,:p,:m,:c,:a,:ee)");
                $n = $pstmt->execute(array(':i' => $compte->getIdCompte(),
                                            ':n' => $compte->getNom(),
					                        ':p' => $compte->getPrenom(),
                                           ':m' => $compte->getMotDePasse(),
                                            ':c' => $compte->getCourriel(),
                                            ':a' => $compte->getActive(),
                                            ':ee' => $compte->getEstEmploye()));
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
    public static function deleteByCourriel($courriel)
    {
        $c= new Compte();
        $c->setCourriel($courriel);
        self::delete($c);
    }
    public static function update($compte)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE compte SET nom=:n, prenom=:p, motDePasse=:m, courriel=:c, active=:a, estEmploye=:ee WHERE idCompte=:id");
                $n = $pstmt->execute(array(':id' => $compte->getIdCompte(),
										    ':n' => $compte->getNom(),
										    ':p' => $compte->getPrenom(),
                                            ':m' => $compte->getMotDePasse(),
                                            ':c' => $compte->getCourriel(),
										    ':a' => $compte->getActive(),
                                            ':ee' =>$compte->getEstEmploye()  ));

                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}
