<?php

class LoginController {
    public function showLoginForm() {

        // Afficher le formulaire de connexion
        require_once 'views/login.php';
    }

    public function authenticate() {

        // Logique d'authentification
        // Vérifier si les données POST existent
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {
            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // Exemple simple de vérification (à remplacer par une logique sécurisée)
            if ($email === 'mahomedcissokho@esp.sn' && $password === 'jetaime' && ($role === 'admin' || $role === 'editeur')) {
                // Authentification réussie, créer la session utilisateur
                $_SESSION['user'] = [
                    'email' => $email,
                    'role' => $role
                ];
                // Rediriger vers la page d'accueil ou une autre page sécurisée
                header('Location: /');
                exit();
            } else {
                // Si l'authentification échoue, afficher un message d'erreur
                echo "Identifiants incorrects. Veuillez réessayer.";
            }
        } else {
            // Redirection si les données POST ne sont pas fournies
            header('Location: /login.php');
            exit();
        }
    }

    public function logout() {

        // Logique de déconnexion
        unset($_SESSION['user']);
        // Rediriger vers la page d'accueil ou une autre page
        header('Location: /');
        exit();
    }
}

?>
