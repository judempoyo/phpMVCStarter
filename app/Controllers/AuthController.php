<?php
namespace App\Controllers;

use App\Models\User;
use App\Core\ViewRenderer;
use App\Services\SessionManager;
use App\Models\PasswordReset;
use App\Services\MailService;
use Exception;

class AuthController
{
    use ViewRenderer;
    
    protected $session;
    protected $basePath;

    public function __construct()
    {
        $this->session = new SessionManager();
        $this->session->start();
        $this->basePath = '/Projets/KongB/public';
    }

    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        $this->checkAuthStatus();

        $this->render('app.guest', 'auth/login', [
            'title' => 'Connexion',
            'error' => $this->session->get('error'),
            'success' => $this->session->get('success')
        ]);
        $this->session->remove('error');
        $this->session->remove('success');
    }

    // Traiter la connexion
    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';



        try {
            $user = User::where('email', $email)->first();

            if ($user && password_verify($password, $user->password)) {
                $this->session->set('user', $user->id);
                $this->session->set('success', 'Connexion réussie !');
                header('Location: ' . $this->basePath . '/dashboard');
                exit();
            }

            $this->session->set('error', 'Email ou mot de passe incorrect.');
            header('Location: ' . $this->basePath . '/login');
            exit();
        } catch (Exception $e) {
            $this->session->set('error', 'Une erreur s\'est produite lors de la connexion.');
            header('Location: ' . $this->basePath . '/login');
            exit();
        }
    }

    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        $this->checkAuthStatus();
        $this->render('app.guest', 'auth/register', [
            'title' => 'Inscription',
            'errors' => $this->session->get('errors'),
            'old' => $this->session->get('old')
        ]);
        $this->session->remove(['errors', 'old']);
    }

   
    // Traiter l'inscription
    public function register()
    {
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => $_POST['password'],
            'password_confirmation' => $_POST['password_confirmation']
        ];

        $errors = $this->validateRegistration($data);

        if (!empty($errors)) {
            $this->session->set('errors', $errors);
            $this->session->set('old', $data);
            header('Location: ' . $this->basePath . '/register');
            exit();
        }

        try {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT)
            ]);

            $this->session->set('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');

            header('Location: ' . $this->basePath . '/login');
            exit();
        } catch (Exception $e) {
            $this->session->set('error', 'Une erreur s\'est produite lors de l\'inscription.');
            header('Location: ' . $this->basePath . '/register');
            exit();
        }
    }

    // Vérifier l'état de l'authentification
    public function checkAuthStatus()
    {
        if ($this->session->has('user')) {
            header('Location: ' . $this->basePath . '/dashboard');
            exit();
        }
    }

    // Déconnexion
    public function logout()
    {
        $this->session->destroy();
        $this->session->set('success', 'Vous avez été déconnecté avec succès.');
        header('Location: ' . $this->basePath . '/login');
        exit();
    }

    // Tableau de bord
    /* public function dashboard()
    {
        
        $user = User::find($this->session->get('user'));
        $this->render('app', 'auth/dashboard', [
            'title' => 'Tableau de bord',
            'user' => $user
        ]);
    } */

    // Afficher le formulaire de demande de réinitialisation du mot de passe
    public function showForgotPasswordForm()
    {
        $this->checkAuthStatus();
        $this->render('app.guest', 'auth/forgot-password', [
            'title' => 'Mot de passe oublié',
            'error' => $this->session->get('error'),
            'success' => $this->session->get('success')
        ]);
        $this->session->remove('error');
        $this->session->remove('success');
    }

    // Traiter la demande de réinitialisation du mot de passe
    public function sendResetLinkEmail()
    {
        $email = $_POST['email'] ?? '';

        try {
            $user = User::where('email', $email)->first();

            if ($user) {
                $token = bin2hex(random_bytes(32)); // Générer un token sécurisé
                PasswordReset::create([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

                // Envoyer l'email de réinitialisation
                $resetLink = PUBLIC_URL . "reset-password/$token";
                $subject = "Réinitialisation de votre mot de passe";
                $body = "Cliquez sur ce lien pour réinitialiser votre mot de passe : $resetLink";

                MailService::send($user->email, $subject, $body);

                $this->session->set('success', 'Un lien de réinitialisation a été envoyé à votre adresse email.');
                header('Location: ' . PUBLIC_URL . 'login');
                exit();
            }

            $this->session->set('error', 'Aucun utilisateur trouvé avec cette adresse email.');
            header('Location: ' . PUBLIC_URL . 'forgot-password');
            exit();
        } catch (Exception $e) {
            $this->session->set('error', 'Une erreur s\'est produite lors de l\'envoi du lien de réinitialisation.');
            header('Location: ' . PUBLIC_URL . 'forgot-password');
            exit();
        }
    }

    // Afficher le formulaire de réinitialisation du mot de passe
    public function showResetForm($token)
    {
        $this->checkAuthStatus();
        $resetRequest = PasswordReset::where('token', $token)->first();

        if (!$resetRequest || $this->isTokenExpired($resetRequest->created_at)) {
            $this->session->set('error', 'Le lien de réinitialisation est invalide ou a expiré.');
            header('Location: ' . PUBLIC_URL . 'forgot-password');
            exit();
        }

        $this->render('app.guest', 'auth/reset-password', [
            'title' => 'Réinitialiser le mot de passe',
            'token' => $token,
            'error' => $this->session->get('error')
        ]);
        $this->session->remove('error');
    }

    // Traiter la réinitialisation du mot de passe
    public function resetPassword()
    {
        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';
        $password_confirmation = $_POST['password_confirmation'] ?? '';

        try {
            $resetRequest = PasswordReset::where('token', $token)->first();

            if (!$resetRequest || $this->isTokenExpired($resetRequest->created_at)) {
                $this->session->set('error', 'Le lien de réinitialisation est invalide ou a expiré.');
                header('Location: ' . PUBLIC_URL . 'forgot-password');
                exit();
            }

            if ($password !== $password_confirmation) {
                $this->session->set('error', 'Les mots de passe ne correspondent pas.');
                header('Location: ' . PUBLIC_URL . 'reset-password/' . $token);
                exit();
            }

            $user = User::where('email', $resetRequest->email)->first();
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->save();

            PasswordReset::where('token', $token)->delete();

            $this->session->set('success', 'Votre mot de passe a été réinitialisé avec succès.');
            header('Location: ' . PUBLIC_URL . 'login');
            exit();
        } catch (Exception $e) {
            $this->session->set('error', 'Une erreur s\'est produite lors de la réinitialisation du mot de passe.');
            header('Location: ' . PUBLIC_URL . 'reset-password/' . $token);
            exit();
        }
    }

    // Vérifier si le token a expiré (1 heure de validité)
    private function isTokenExpired($createdAt)
    {
        $expirationTime = strtotime($createdAt) + 3600; // 1 heure
        return time() > $expirationTime;
    }

    // Validation de l'inscription
    private function validateRegistration($data)
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = 'Le nom est obligatoire';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'L\'email est obligatoire';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email invalide';
        } elseif (User::where('email', $data['email'])->exists()) {
            $errors['email'] = 'Cet email est déjà utilisé';
        }

        if (strlen($data['password']) < 8) {
            $errors['password'] = 'Le mot de passe doit faire au moins 8 caractères';
        } elseif ($data['password'] !== $data['password_confirmation']) {
            $errors['password'] = 'Les mots de passe ne correspondent pas';
        }

        return $errors;
    }
}