- npm i
- npm run watch
- composer i


- composer require annotations
- composer require encore
- composer require symfony/twig-bundle

- composer require symfony/form
- composer require validator

- composer require symfony/security-bundle
- composer require knplabs/knp-paginator-bundle

Voir les erreurs en production
 - composer require twig-pack
 `https://127.0.0.1:8000/index.php/_error/404`

Mettre a jour la BBD: 
 - git pull
 - Vider votre base de données 'bizcut' via phpMyAdmin
 - Vider le dossier BizAndCut\src\Migration ( si il ne l'ai pas déjà ) 
 - symfony console make:migration
 - symfony console doctrine:migration:migrate -n
 - via phpMyadmin executé la requete suivant : 

ALTER TABLE rdv ADD heureCreneau VARCHAR(255);

INSERT INTO `devis_statut` (`id`, `texte_devis_statut`) VALUES
(1, 'En attente'),
(2, 'Accepté'),
(3, 'Refusé');
 - symfony serve 
