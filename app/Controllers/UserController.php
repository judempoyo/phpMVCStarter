<?php
namespace App\Controllers;

use App\Models\User;
use App\Core\ViewRenderer;
use App\Services\SessionManager;
use Exception;

class USerController
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

    public function showProfile()
    {
        if (!$this->session->has('user')) {
            $this->session->set('error', 'Vous devez être connecté pour accéder au profil.');
            header('Location: ' . $this->basePath . '/login');
            exit();
        }
    
        $user = User::find($this->session->get('user'));
        
        $this->render('app', 'profile/profile', [
            'title' => 'Profil',
            'user' => $user,
            'errors' => $this->session->get('errors'),
            'old' => $this->session->get('old')
        ]);
        $this->session->remove(['errors', 'old']);
    }

    public function updateProfileInfo()
{
    if (!$this->session->has('user')) {
        $this->session->set('error', 'Vous devez être connecté pour modifier votre profil.');
        header('Location: ' . $this->basePath . '/login');
        exit();
    }

    $userId = $this->session->get('user');
    $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email'])
    ];

    $errors = $this->validateProfileInfo($data);

    if (!empty($errors)) {
        $this->session->set('errors', $errors);
        $this->session->set('old', $data);
        header('Location: ' . $this->basePath . '/profile');
        exit();
    }

    try {
        $user = User::find($userId);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        $this->session->set('success', 'Vos informations ont été mises à jour avec succès.');
        header('Location: ' . $this->basePath . '/profile');
        exit();
    } catch (Exception $e) {
        $this->session->set('error', 'Une erreur s\'est produite lors de la mise à jour de vos informations.');
        header('Location: ' . $this->basePath . '/profile');
        exit();
    }
}

private function validateProfileInfo($data)
{
    $errors = [];

    if (empty($data['name'])) {
        $errors['name'] = 'Le nom est obligatoire.';
    }

    if (empty($data['email'])) {
        $errors['email'] = 'L\'email est obligatoire.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'email est invalide.';
    } elseif (User::where('email', $data['email'])->where('id', '!=', $this->session->get('user'))->exists()) {
        $errors['email'] = 'Cet email est déjà utilisé par un autre utilisateur.';
    }

    return $errors;
}

public function updateProfilePassword()
{
    if (!$this->session->has('user')) {
        $this->session->set('error', 'Vous devez être connecté pour modifier votre mot de passe.');
        header('Location: ' . $this->basePath . '/login');
        exit();
    }

    $userId = $this->session->get('user');
    $data = [
        'current_password' => $_POST['current_password'],
        'new_password' => $_POST['new_password'],
        'new_password_confirmation' => $_POST['new_password_confirmation']
    ];

    $errors = $this->validateProfilePassword($data);

    if (!empty($errors)) {
        $this->session->set('errors', $errors);
        header('Location: ' . $this->basePath . '/profile');
        exit();
    }

    try {
        $user = User::find($userId);

        if (!password_verify($data['current_password'], $user->password)) {
            $this->session->set('error', 'Le mot de passe actuel est incorrect.');
            header('Location: ' . $this->basePath . '/profile');
            exit();
        }

        $user->password = password_hash($data['new_password'], PASSWORD_DEFAULT);
        $user->save();

        $this->session->set('success', 'Votre mot de passe a été mis à jour avec succès.');
        header('Location: ' . $this->basePath . '/profile');
        exit();
    } catch (Exception $e) {
        $this->session->set('error', 'Une erreur s\'est produite lors de la mise à jour de votre mot de passe.');
        header('Location: ' . $this->basePath . '/profile');
        exit();
    }
}

private function validateProfilePassword($data)
{
    $errors = [];

    if (empty($data['current_password'])) {
        $errors['current_password'] = 'Le mot de passe actuel est obligatoire.';
    }

    if (empty($data['new_password'])) {
        $errors['new_password'] = 'Le nouveau mot de passe est obligatoire.';
    } elseif (strlen($data['new_password']) < 8) {
        $errors['new_password'] = 'Le nouveau mot de passe doit faire au moins 8 caractères.';
    } elseif ($data['new_password'] !== $data['new_password_confirmation']) {
        $errors['new_password'] = 'Les nouveaux mots de passe ne correspondent pas.';
    }

    return $errors;
}
public function deleteProfile()
{
    if (!$this->session->has('user')) {
        $this->session->set('error', 'Vous devez être connecté pour supprimer votre compte.');
        header('Location: ' . $this->basePath . '/login');
        exit();
    }

    $userId = $this->session->get('user');
    $password = $_POST['password'] ?? '';

    try {
        $user = User::find($userId);

        // Vérifier le mot de passe
        if (!password_verify($password, $user->password)) {
            $this->session->set('error', 'Le mot de passe est incorrect.');
            header('Location: ' . $this->basePath . '/profile');
            exit();
        }

        // Supprimer l'utilisateur
        $user->delete();

        // Déconnecter l'utilisateur
        $this->session->destroy();

        // Rediriger vers la page d'accueil avec un message de succès
        $this->session->set('success', 'Votre compte a été supprimé avec succès.');
        header('Location: ' . $this->basePath . '/');
        exit();
    } catch (Exception $e) {
        $this->session->set('error', 'Une erreur s\'est produite lors de la suppression de votre compte.');
        header('Location: ' . $this->basePath . '/profile');
        exit();
    }
}
}