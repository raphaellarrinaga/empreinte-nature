=== fasterImage Image Optimizer ===
Contributors: nhodin
Donate link: https://fasterImage.io/
Tags: image compression, image compress, sitespeed, webperf, picture optimization
Requires at least: 3.0.1
Tested up to: 5.8
Stable tag: 2.5.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Optimisez vos images & accélérez votre site Web! Vos images sont automatiquement optimisées tout en conservant leur qualité.

== Description ==

62% des ressources de votre site sont des images, grâce à fasterImage vous allez facilement réduire leur taille (sans altérer leur qualité) et accélérer le temps de chargement de vos pages.

fasterImage est un outil d'optimisation d'images en ligne, il peut être activé ou désactivé à tout moment sans interruption de votre site.

fasterImage supporte les images au format JPG, GIF et PNG ainsi que le WebP.

[Créez un compte](https://fasterimage.io/?utm_source=wordpress&utm_medium=plugin-page&utm_campaign=extensions) dès maintenant pour tester facilement et rapidement fasterImage.

**Comment ça marche ?**

1. Un visiteur accède à votre site et ouvre des pages web contenant des images.
2. Les requêtes vers les images de votre site sont gérées par fasterImage :
 * La première fois qu'un internaute accède à une image, fasterImage renvoie directement l'image hébergée par votre site web. Ceci permet de ne pas pénaliser le visiteur pendant le temps nécessaire à l'optimisation de votre image (1 à 2 secondes).
 * Ensuite, fasterImage télécharge cette image, l'optimise et la sauvegarde sur son serveur.
3. La prochaine fois qu'un visiteur se rend sur votre site, les images déjà optimisées sont envoyées directement par fasterImage.

[Plus de détails](https://fasterimage.io/fonctionnalites?utm_source=wordpress&utm_medium=plugin-page&utm_campaign=extensions)

== Installation ==

Pour démarrer l'optimisation de vos images avec fasterImage :

1. Créez un compte sur [https://fasterimage.io/](https://fasterimage.io/?utm_source=wordpress&utm_medium=plugin-page&utm_campaign=extensions).
2. Téléchargez le plugin fasterImage dans le dossier `/wp-content/plugins/` de votre site WordPress.
3. Activez le plugin via le menu `Extensions`.
4. Activez l'optimisation dans le menu `Réglages` > `fasterImage` et indiquez la clé API fournie par fasterImage pour votre nom de domaine lors de votre inscription.

== Frequently Asked Questions ==

= Que deviennent les images déjà présentes sur mon site =

Les images hébergées sur votre serveur ne seront jamais modifiées, vous pouvez ainsi à tout moment revenir en arrière si vous souhaitez ne plus utiliser notre service. La version optimisée de vos images est hébergée sur les serveurs de fasterImage, cela permet plusieurs avantages :

* les serveurs de fasterImage sont configurés et optimisés pour délivrer les images via un traitement ultra-rapide des requêtes, souvent plus rapide que sur votre propre hébergement,
* fasterImage gère et optimise la configuration du cache navigateur, cela permet d'améliorer aussi le temps de chargement des pages de votre site.

= Une autre question ? =

Vous pouvez [nous contacter](https://fasterimage.io/contact?utm_source=wordpress&utm_medium=plugin-page&utm_campaign=extensions) ou nous envoyer un [email](mailto:contact@fasterimage.io)!

== Screenshots ==

1. Réglages de fasterImage

== Changelog ==

= 2.5.2 =
* Translation changes

= 2.5.1 =
* Compatibilité avec la version 5.8 de WordPress

= 2.5.0 =
* Ajout de la localisation et des traductions anglaises et françaises

= 2.4.6 =
* Compatibilité avec la version 5.3 de WordPress

= 2.4.5 =
* Compatibilité avec la version 4.9 de WordPress

= 2.4.4 =
* Compatibilité avec la version 4.8 de WordPress

= 2.4.3 =
* Compatibilité avec la version 4.7 de WordPress

= 2.4.2 =
* Compatibilité avec la version 4.6 de WordPress

= 2.4.1 =
* Nettoyage des urls des médias à l'upload pour éviter les caractères accentués

= 2.4 =
* Compatibilité avec la nouvelle gestion des images en responsive de WordPress 4.4

= 2.3 =
* Correction mineure

= 2.2 =
* Correction d'un bug lors de la désactivtion du plugin. Merci @G3r0nimo !

= 2.1 = 
* Corrections de bug mineurs

= 2.0 =
* Nouvelle interface avec affichage de statistiques sur les optimisations. Le plugin utilise maintenant une API sécurisée pour obtenir des informations et contrôler la validité du compte.

= 1.3 =
* Augmentation de la durée d'expiration de la validation du domaine

= 1.2 = 
* Ajout d'un contrôle pour que les urls des images ne soient pas changées plusieurs fois

= 1.1 = 
* Vérification de l'activation du nom de domaine sur le compte fasterImage

= 1.0 =
* Première version publique

== Upgrade Notice ==

= 1.* to 2.1 =
Veuillez vous rendre dans la page de `Réglages` du plugin et indiquez votre clé API, que vous pouvez retrouver dans `Mon compte` > `Noms de domaine` sur [https://fasterimage.io](https://fasterimage.io/?utm_source=wordpress&utm_medium=plugin-page&utm_campaign=extensions)

= 1.1 to 1.3 = 
Aucune intervention nécessaire. Si vous n'aviez pas de compte fasterImage lors de cette mise à jour, vous serez obligé d'en créer un pour réactiver le plugin. 

= 1.0 =
Optimisez vos images & accélérez votre site Web !