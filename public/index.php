<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
$app->get('/', function (Request $request, Response $response) {
    $db = new SQLite3('../Slim/data/database.db');
    $result = $db->query("SELECT * FROM bands");
    
    $html = '<h1>Bandas</h1><ul>';
    while ($entrada = $result->fetchArray(SQLITE3_ASSOC)) {
        $html .= '<li>';
        $html .= '<h2>' . htmlspecialchars($entrada['name']) . '</h2>';
        $html .= '<p>' . htmlspecialchars($entrada['description']) . '</p>';
        $html .= '<p>' . "<b>Membres: </b>" . htmlspecialchars($entrada['members']) . '</p>';
        $html .= '<p>' . "<b>Generes: </b>" . htmlspecialchars($entrada['genres']) . '</p>';
        $html .= '<p>' . "<b>Web: </b>" . "<a href='". htmlspecialchars($entrada['website']) . "'>{$entrada['website']}</a>" .  '</p>';
        $html .= "<img src='". htmlspecialchars($entrada['image']) . "' width='350px'>";
        $html .= "<iframe src='". htmlspecialchars($entrada['video']) . "' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>";
        $html .= "<a href='". htmlspecialchars($entrada['songs']) . "'>" . '<img width="30px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Spotify_icon.svg/1982px-Spotify_icon.svg.png">' . "</a>" .  '</p>';
        $html .= '</li>';
    }
    $html .= '</ul>';
    
    $db->close();
    
    $response->getBody()->write($html);
    return $response->withHeader('Content-Type', 'text/html');
});


$app->run();

