<?php

namespace EthnoDoc\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function loginAction()
    {
        // Hachage du mot de passe
		if(isset($_POST['pass']) && isset($_POST['pseudo'])){
			$pass_hache = sha1($_POST['pass']);
			try
				{
					$bdd = new \PDO('mysql:host=localhost;dbname=ethnodoc;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
				}
			catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}

			// Vérification des identifiants
			$req = $bdd->prepare('SELECT id FROM member WHERE pseudo = :pseudo AND pass = :pass');
			$req->execute(array(
				'pseudo' => $_POST['pseudo'],
				'pass' => $pass_hache));

			$resultat = $req->fetch();

			if (!$resultat)
			{
				$res = array("isConnected"=>false,"pseudo"=>$_POST['pseudo']);
				return $this->render('EthnoDocPublicationBundle:Login:login.html.twig', array(
				"data"=>json_encode($res)
				));
			}
			else
			{
				session_start();
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['pseudo'] = $_POST['pseudo'];
				$res = array("isConnected"=>true,"pseudo"=>$_POST['pseudo']);
				return $this->render('EthnoDocPublicationBundle:Login:login.html.twig', array(
				"data"=>json_encode($res)
				));
			}	
		}
		$res = array("isConnected"=>false);
		return $this->render('EthnoDocPublicationBundle:Login:login.html.twig', array(
		"data"=>json_encode($res)
		));
    }
	
	public function disconnectAction()
    {
		session_start();
		// Suppression des variables de session et de la session
		$_SESSION = array();
		session_destroy();
		return $this->redirectToRoute('home');
    }
}
