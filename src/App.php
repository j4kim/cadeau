<?php

namespace J4kim\Cadeau;

use Bramus\Router\Router;
use League\Plates\Engine;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class App
{
    private Router $router;
    private Engine $templates;

    public function __construct()
    {
        session_start();
        $this->router = new Router();
        $this->templates = new Engine('../views');
        $this->registerRoutes();
        $this->router->run();
    }

    private function redirect(string $to = "")
    {
        $loc = Config::base() . $to;
        header("Location: $loc");
    }

    public function checkAndRedirect()
    {
        if (!Auth::check()) {
            $this->redirect("login");
            die();
        }
    }

    private function registerRoutes()
    {
        $this->router->setBasePath(Config::base());

        $this->router->get('/', function () {
            $this->checkAndRedirect();
            $this->redirect("photo.jpg");
        });

        $this->router->get('/settings', function () {
            $this->checkAndRedirect();
            echo $this->templates->render('settings');
        });

        $this->router->post('/settings', function () {
            $this->checkAndRedirect();
            $newSettings = ['question' => $_POST['question']];
            if ($_POST['passphrase']) {
                $newSettings['passphrase'] = password_hash($_POST['passphrase'], PASSWORD_DEFAULT);
            }
            Config::store($newSettings);
            $this->redirect();
        });

        $this->router->get('/login', function () {
            echo $this->templates->render(Auth::check() ? 'logout' : 'login');
        });

        $this->router->post('/login', function () {
            if (Auth::login($_POST['passphrase'])) {
                $this->redirect();
                return;
            }
            echo $this->templates->render('login', ['error' => '😭 Mauvais mot de passe...']);
        });

        $this->router->post('/logout', function () {
            Auth::logout();
            $this->redirect("login");
        });

        $this->router->get('/fresh', function () {
            $cache = new FilesystemAdapter();
            $cache->clear();
            $this->redirect();
        });
    }
}
