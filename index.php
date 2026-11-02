<?php

require_once __DIR__ . '/vendor/autoload.php';

use TpUnit\Stagiaire;

$stagiaire = new Stagiaire('Sadik', 20, 15.5);

echo '<h1>Gestion des stagiaires</h1>';
echo '<p>Nom : ' . htmlspecialchars($stagiaire->getNom(), ENT_QUOTES, 'UTF-8') . '</p>';
echo '<p>Age : ' . $stagiaire->getAge() . '</p>';
echo '<p>Moyenne : ' . $stagiaire->getMoyenne() . '</p>';
echo '<p>Résultat : ' . ($stagiaire->estAdmis() ? 'Admis' : 'Refusé') . '</p>';
echo '<p>Mention : ' . $stagiaire->mention() . '</p>';