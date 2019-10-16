<?php
/**
 * Description of ServiceDAO.class
 *
 * @author Meryem, Amélia, Assia et Sébastien
 */
include_once('classes/Database.class.php');
include_once('classes/Service.class.php');
class ServiceDAO {
    public static function find($id)
    {
            $db = Database::getInstance();
            try {
                $pstmt = $db->prepare("SELECT * FROM service WHERE idService = :x");
                $pstmt->execute(array(':x' => $id));

                $result = $pstmt->fetch(PDO::FETCH_OBJ);

                if ($result)
                {
					$s = new Service();
					$s->loadFromObject($result);
					$pstmt->closeCursor();
					$pstmt = NULL;
					Database::close();
					return $s;
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
            $service = Array();
            try {
                $pstmt = $db->prepare("SELECT * FROM service");
                $pstmt->execute();

                while ($result = $pstmt->fetch(PDO::FETCH_OBJ))
                {
                        $s = new Service();
                        $s->loadFromObject($result);
                        array_push($service, $s);
                }
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
            return $service;
    }
    public static function create($service)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("INSERT INTO service (idService, typeService, date, heureDebut, heureFin, sexe,remuneration, description, experience, active,idEmployeur)".
                                                  " VALUES (:is,:ts,:d,:hd,:hf,:s,:rh,:de,:e,:a,:ie)");
                $n = $pstmt->execute(array(':is' => $service->getIdService(),
                                            ':ts' => $service->getTypeService(),
					                        ':d' => $service->getDate(),
                                           ':hd' => $service->getHeureDebut(),
                                            ':hf' => $service->getHeureFin(),
                                            ':s' => $service->getSexe(),
                                            ':rh' => $service->getRenumeration(),
                                            ':de' => $service->getDescription(),
                                            ':e' => $service->getExperience(),
                                             ':a' => $service->getActive(),
                                            ':ie' => $service->getIdEmployeur()));
                                            
                    
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }             
			return $n;            
    }    
    public static function delete($service)
    {
            $db = Database::getInstance();
	 $n = 0;
            try {
                $pstmt = $db->prepare("DELETE FROM service WHERE idService=:id");
                $n = $pstmt->execute(array(':id' => $service->getIdService()));

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
        $s= new Service();
        $s->setIdService($id);
        self::delete($s);
                   
    } 
    public static function update($service)
    {
            $db = Database::getInstance();
			$n = 0;
            try {
                $pstmt = $db->prepare("UPDATE service SET typeService=:ts, date=:d, heureDebut=:hd, heureFin=:hf, sexe=:s, remuneration=:rh, description=:de, experience=:e, active=:a, idEmployeur=:ie WHERE idService=:id");
                $n = $pstmt->execute(array(':id' => $service->getIdService(),
                                            ':ts' => $service->getTypeService(),
					                        ':d' => $service->getDate(),
                                           ':hd' => $service->getHeureDebut(),
                                            ':hf' => $service->getHeureFin(),
                                            ':s' => $service->getSexe(),
                                            ':rh' => $service->getRenumeration(),
                                            ':de' => $service->getDescription(),
                                            ':e' => $service->getExperience(),
                                             ':a' => $service->getActive(),
                                            ':ie' => $service->getIdEmployeur()));
                $pstmt->closeCursor();
                $pstmt = NULL;
                Database::close();
            }
            catch (PDOException $ex){
            }           
			return $n;			
    }     
}
