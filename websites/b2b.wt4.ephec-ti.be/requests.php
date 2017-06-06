<?php
$host = 'db';
$port = 5432;
$db = 'woodymarket';
$username = 'woodytoys';
$password = 'superwoody';
$dbstatus = NULL;

if ($_GET['rq'] === 'products') {

  try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db;user=$username;password=$password");
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //$pdo->prepare('INSERT INTO produits(nom, prix) VALUES ('train', 10)');
    //$pdo->e

    if ($pdo) {
      $dbstatus =
        "<p>Connecté avec succès à la base de données <strong>postgresql</strong>.<br />
        Powered with Docker.</p>";
      //echo $dbstatus;
    } else {
      $dbstatus =
        "<p>Non Connecté à la base de données <strong>postgresql</strong>.<br />
        Problème de configuration ?</p>";
    }

    $results = $pdo->query('select nom, prix from produits')->fetchAll();
    $pdo = null;
    echo json_encode($results);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

}
