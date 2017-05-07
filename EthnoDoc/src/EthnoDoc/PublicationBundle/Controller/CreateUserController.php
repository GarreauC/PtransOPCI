<?php

namespace EthnoDoc\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateUserController extends Controller
{
    public function createAction()
    {
        if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email'])){
			try
			{
				$bdd = new \PDO('mysql:host=localhost;dbname=ethnodoc;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
					die('Erreur : '.$e->getMessage());
			}
			
			//test pour voir si le pseudo existe deja
			$reponse = $bdd->query('SELECT pseudo FROM member');
			
			//boucle pour faire tous les tests et voir si pseudo existe deja
			$existe = false;
			while( $donnees = $reponse->fetch()){
				
			//renvoie les valeurs de la premiere entrée 
				$donnees = $reponse->fetch();
				$lepseudo= $donnees['pseudo'];
				if ($lepseudo == $_POST['pseudo'] ){
					$existe = true;
					break;
				} 	
			}
			
			if (!$existe){
				$pass_hache = sha1($_POST['pass']);
				$pseudo = $_POST['pseudo'];
				$email = $_POST['email'];
				$req = $bdd->prepare('INSERT INTO member(pseudo, pass, email, date_inscription) VALUES(:pseudo, :mdp, :email, CURDATE())');
				$req->execute(array(
					'pseudo' => $pseudo,
					'mdp' => $pass_hache,
					'email' => $email));
				return $this->redirectToRoute('home');
			}
			else{
				return $this->render('EthnoDocPublicationBundle:Page:register_errors.html.twig');
			}
			$reponse->closeCursor();
					
			}
	}
}
