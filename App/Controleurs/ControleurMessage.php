<?php
declare (strict_types = 1);
namespace App\Controleurs;
use App\App;
use App\Modeles\Message;
use App\Modeles\Responsable;

class ControleurMessage
{
    public function __construct()
    { 
    }
    public function creer(): void
    {
         session_start();
        if (isset($_SESSION['tValidation'])){
            $tValidation = $_SESSION['tValidation'];
            unset($_SESSION['tValidation']);
        }

        else{
            $tValidation = null;
        }

        if (isset($_SESSION['retroactions'])){
            $retroaction = $_SESSION['retroactions'];
            unset($_SESSION['retroactions']);
        }

        else{
            $retroaction = null;
        }

        $responsables = Responsable::trouverTousResponsable();       
        $tDonnees = array("tValidation"=>$tValidation , "responsables"=>$responsables , "retroactions"=>$retroaction);
        echo App::getBlade()->run('messages.creer',$tDonnees);
    }
    public function valider($source, $regex){
        return preg_match($regex, $source);
    }
    public function insert(): void
    {
        session_start();
        echo 'passé ici';
        $contenuFichierJson = file_get_contents("liaisons/json/messages-erreur_form.json");
        // Convertir en tableau associatif
        $tMessagesJson = json_decode($contenuFichierJson, true);
        
        if(isset($_POST['envoyer'])){
            // Required field names

            $required = array('nom', 'courriel', 'responsable_id', 'sujet', 'message');
            
            $regex_array = array('[a-zA-ZÀ-ÿ -]+', '^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$', '[0-9]', '[a-zA-ZÀ-ÿ -]+', "[a-zA-Z0-9À-ÿ - .'?!,@$#_]");


            if(isset($_POST['consentement'])){
                $_POST['consentement'] = '1';
            }

            if(isset($_POST['responsable_id']) && $_POST['responsable_id'] == '4'){
                array_push($required, 'telephone');
                array_push($regex_array, '^\([0-9]{3}\) [0-9]{3}\-[0-9]{4}$');
                array_push($required, 'consentement');
                array_push($regex_array, '[0-1]');
            }
            

            // Loop over field names, make sure each one exists and is not empty
            $error = false;
            $tValidation = [];
            for($i = 0; $i < count($required); $i++){
                if (!isset($_POST[$required[$i]]) || $_POST[$required[$i]] == "") {
                    $error = true;
                    $tValidation[$required[$i]] = array("valeur" => "", "statut" => '0', "erreur" => $tMessagesJson[$required[$i]]['erreurs']['vide'] .'<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>');
                }
                else{
                    $expression = '/'. $regex_array[$i] . '/';
                    if($this->valider($_POST[$required[$i]], $expression) == 0){
                        $error = true;
                        $tValidation[$required[$i]] = array("valeur" => $_POST[$required[$i]], "statut" => '0', "erreur" => $tMessagesJson[$required[$i]]['erreurs']['motif'] . '<span class="user-box user-box--warning"><i class="fa-solid fa-triangle-exclamation" aria-hidden="true" style="color:#FF0000; padding-right:5px"></i></span>');
                    }
                    else{
                        $tValidation[$required[$i]] = array("valeur" => $_POST[$required[$i]], "statut" => '1');
                    }
                }
            }
            if (!$error) {
                $contact = Message::envoyeBdd();
                $email = Message::envoyerMail();
                $_SESSION['retroactions'] = $email['retroactions'];
            }
            
            $_SESSION['tValidation'] = $tValidation;
            session_write_close();
            header('Location: index.php?controleur=message&action=creer#formulaire');
            exit;
                         
        }
    }

}
?>