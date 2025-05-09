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
     
    $html = '<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandes Musicals</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Bandes Musicals</h1>
        </header>
        
        <div class="bands-grid">';
    
    while ($entrada = $result->fetchArray(SQLITE3_ASSOC)) { 
        $html .= '<div class="band-card">
                <div class="band-image">
                    <img src="' . htmlspecialchars($entrada['image']) . '" alt="' . htmlspecialchars($entrada['name']) . '">
                </div>
                <div class="band-content">
                    <h2 class="band-name">' . htmlspecialchars($entrada['name']) . '</h2>
                    <p class="band-description">' . htmlspecialchars($entrada['description']) . '</p>
                    <div class="band-details">
                        <p><b>Membres:</b> ' . htmlspecialchars($entrada['members']) . '</p>
                        <p><b>Gèneres:</b> ' . htmlspecialchars($entrada['genres']) . '</p>
                        <p><b>Web:</b> <a href="' . htmlspecialchars($entrada['website']) . '" target="_blank">' . htmlspecialchars($entrada['website']) . '</a></p>
                    </div>
                    <div class="media-container">
                        <div class="video-container">
                            <iframe src="' . htmlspecialchars($entrada['video']) . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <a href="' . htmlspecialchars($entrada['songs']) . '" class="spotify-link" target="_blank">
                            <img width="20px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Spotify_icon.svg/1982px-Spotify_icon.svg.png" alt="Spotify">
                            Escoltar a Spotify
                        </a>
                    </div>
                </div>
            </div>';
    } 
    
    $html .= '</div>
    </div>
</body>
</html>';
     
    $db->close(); 
     
    $response->getBody()->write($html); 
    return $response->withHeader('Content-Type', 'text/html'); 
}); 
 
$app->run();