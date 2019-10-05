<?php
require_once('controleur/Action.Interface.php');
require_once('modele/CompteDAO.class.php');
require_once('modele/DisponibiliteDAO.class.php');
require_once('modele/EmployeDAO.class.php');
require_once('modele/EmployeurDAO.class.php');
require_once('modele/RestaurantDAO.class.php');
class LoginAction implements Action
{
    public function execute()
    {

        if (!ISSET ($_REQUEST ["username"])) {
            return "connection";
        }
        if (!$this->valide()) {
            return "connection";
        }
        $udao = new CompteDAO();
        $user = $udao->find($_REQUEST ["username"]);
        if ($user == null) {
            $_REQUEST ["field_messages"] ["username"] = "Utilisateur inexistant";
            return "connection";
        } elseif ($user->getMotDePasse() != $_REQUEST ["password"]) {
            $_REQUEST ["field_messages"] ["password"] = "Mot de passe incorrect";
            return "connection";
        }
            if (!ISSET ($_SESSION))
            session_start();
            $_SESSION ["connected"] = $_REQUEST ["username"];
            if ($user->getEstEmploye() == 1) {
                $_REQUEST["estEmploye"] = true;

                //---- Il aide a charg� la disponibilit� si il y a.
                $disDAO     = new DisponibiliteDAO();
                $empDAO     = new EmployeDAO();
                $objEmplo   = $empDAO->findByIdCompte($user->getIdCompte());
                $_SESSION["infoCompte"]  = $user;
                $_SESSION["infoEmploye"] = $objEmplo;
                $_SESSION["dispo"]  = $disDAO->findEmploye($objEmplo->getIdEmploye());
                if(isset($_SESSION["dispo"])){
                    //$_SESSION["dispo"]  = $disDAO->findEmploye($objEmplo->getIdEmploye());
                }
                // ------------------- fin
                return "profilEmploye";
            } else {
                $_REQUEST ["estEmploye"] = false;
                $DAOEmployeur     = new EmployeurDAO();
                $DAOResto   = new RestaurantDAO();

                $objEmployeur   = $DAOEmployeur->findByIdCommpte($user->getIdCompte());
                $objResto   = $DAOResto->findByIdEmployeur($objEmployeur->getIdEmployeur());
                $_SESSION["infoCompte"]  = $user;
                $_SESSION["infoEmployeur"] = $objEmployeur;
                $_SESSION["infoResto"] = $objResto;
                $this->makeJson();
                return "profilResto";
            }
    }


    public function valide()
    {
        $result = true;
        if ($_REQUEST ['username'] == "") {
            $_REQUEST ["field_messages"] ["username"] = "Donnez votre nom d'utilisateur";
            $result = false;
        }
        if ($_REQUEST ['password'] == "") {
            $_REQUEST ["field_messages"] ["password"] = "Donnez votre mot de passe";
            $result = false;
        }
        return $result;
    }

    public function makeJson(){

        $restoCompte = array([
            'nomReto'   => $_SESSION["infoResto"]->getNomRest(),
            'adresse'   => $_SESSION["infoResto"]->getAdresseRest(),
            'province'  => $_SESSION["infoResto"]->getProvinceRest(),
            'ville'     => $_SESSION["infoResto"]->getVilleRest(),
            'codePostal' => $_SESSION["infoResto"]->getCodePostalRest(),
            'tel'       => $_SESSION["infoResto"]->getTelRest(),
            'description' => $_SESSION["infoResto"]->getDescRest()],

            [ 'nom'       => $_SESSION["infoCompte"]->getNom(),
            'prenom'    => $_SESSION["infoCompte"]->getPrenom(),
            'courriel'  => $_SESSION["infoCompte"]->getCourriel(),
            'motDePasse'=> $_SESSION["infoCompte"]->getmotDePasse(),
            'telCompte' => $_SESSION["infoEmployeur"]->getTel()]
        );
        $json = json_encode($restoCompte, JSON_PRETTY_PRINT);

        $file = 'js/user/compte.json';
        file_put_contents($file, $json);
    }
}
?>