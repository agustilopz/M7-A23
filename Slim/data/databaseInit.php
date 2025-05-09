<?php
$db = new SQLite3('database.db');

/*
$db->exec("CREATE TABLE IF NOT EXISTS 'bands' (
  'id' INTEGER NOT NULL,
  'name' TEXT NOT NULL,
  'description' TEXT,
  'members' TEXT,
  'genres' TEXT,
  'website' TEXT,
  'image' TEXT,
  PRIMARY KEY('id' AUTOINCREMENT)
);");

// Inserció de dades amb noms de les bandes
$db->exec("INSERT INTO 'bands' ('name', 'description', 'members', 'genres', 'website', 'image') VALUES
('Queen', 'Banda de rock britànica formada el 1970, coneguda per les seves actuacions espectaculars i el seu estil únic.',
 'Freddie Mercury, Brian May, Roger Taylor, John Deacon',
 'Rock, Hard rock, Glam rock',
 'https://www.queenonline.com/',
 'https://cloudfront-us-east-1.images.arcpublishing.com/infobae/5EYK3RRSOFDZVELLUXH7ZQLG6U.jpg')");

$db->exec("INSERT INTO 'bands' ('name', 'description', 'members', 'genres', 'website', 'image') VALUES
('The Beatles', 'Banda de rock britànica formada a Liverpool el 1960. Considerada una de les més influents de tots els temps.',
 'John Lennon, Paul McCartney, George Harrison, Ringo Starr',
 'Rock, Pop, Psicodèlia',
 'https://www.thebeatles.com/',
 'https://images.squarespace-cdn.com/content/v1/58c22624f5e231655c4c4dad/be0e6811-7d36-40f0-898c-2bc3fb27df10/La+Historia+de+The+Beatles.jpg')");

$db->exec("INSERT INTO 'bands' ('name', 'description', 'members', 'genres', 'website', 'image') VALUES
('The Rolling Stones', 'Banda britànica de rock formada el 1962. Coneguda com una de les bandes més duradores i icòniques.',
 'Mick Jagger, Keith Richards, Charlie Watts, Ronnie Wood',
 'Rock, Blues rock',
 'https://rollingstones.com/',
 'https://s.wsj.net/public/resources/images/BN-NW458_Stones_M_20160504165415.jpg')");

$db->exec("INSERT INTO 'bands' ('name', 'description', 'members', 'genres', 'website', 'image') VALUES
('Oasis', 'Banda de rock britànica dels anys 90, coneguda per la seva rivalitat amb Blur i pel seu estil britpop.',
 'Liam Gallagher, Noel Gallagher, Paul Arthurs, Paul McGuigan, Tony McCarroll',
 'Britpop, Rock alternatiu',
 'https://www.oasisinet.com/',
 'https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2024/09/02/17252727598888.png')");

$db->exec("INSERT INTO 'bands' ('name', 'description', 'members', 'genres', 'website', 'image') VALUES
('Nirvana', 'Banda de grunge estatunidenca formada a Seattle el 1987. Va tenir un impacte enorme en l’escena rock dels 90.',
 'Kurt Cobain, Krist Novoselic, Dave Grohl',
 'Grunge, Rock alternatiu',
 'https://www.nirvana.com/',
 'https://www.impericon.com/cdn/shop/articles/20230912_nirvanajubilaeum_2_52c5ec1e-4a78-4f5a-b5f3-3b054e9cc10c.jpg?v=1740047327')");

*/



// Afegir la nova columna 'video' a la taula
$db->exec("ALTER TABLE bands ADD COLUMN video TEXT");

// Actualitzar cada banda amb un enllaç de vídeo representatiu
$db->exec("UPDATE bands SET video = 'https://www.youtube.com/watch?v=fJ9rUzIMcZQ' WHERE name = 'Queen'"); // Bohemian Rhapsody
$db->exec("UPDATE bands SET video = 'https://www.youtube.com/watch?v=CGj85pVzRJs' WHERE name = 'The Beatles'"); // Let It Be
$db->exec("UPDATE bands SET video = 'https://www.youtube.com/watch?v=SGyOaCXr8Lw' WHERE name = 'The Rolling Stones'"); // Paint It Black
$db->exec("UPDATE bands SET video = 'https://www.youtube.com/watch?v=6hzrDeceEKc' WHERE name = 'Oasis'"); // Wonderwall
$db->exec("UPDATE bands SET video = 'https://www.youtube.com/watch?v=hTWKbfoikeg' WHERE name = 'Nirvana'"); // Smells Like Teen Spirit

$db->close();



$db->close();

?>