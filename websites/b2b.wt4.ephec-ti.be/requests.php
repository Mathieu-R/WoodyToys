<?php
$host = db;
$port = 5432;
$db = 'woodymarket';
$username = 'woodytoys';
$password = 'superwoody';
$dbstatus = NULL;

if (isset($_GET['rq']) && $_GET['rq'] === 'products') {

  try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password");
    /*if ($pdo) {
      $dbstatus =
        "<p>Connecté avec succès à la base de données <strong>postgresql</strong>.<br />
        Powered with Docker.</p>";
    } else {
      $dbstatus =
        "<p>Non Connecté à la base de données <strong>postgresql</strong>.<br />
        Problème de configuration ?</p>";
    }*/

    $results = $pdo->query('select nom, prix from produits');
    $pdo = null;
    echo $results;
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

}
