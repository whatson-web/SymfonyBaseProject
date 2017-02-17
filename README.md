# Installation
## 1/ Cloner les fichiers dans un dossier dédié
La première fois : 
`git clone git@github.com:whatson-web/SymfonyBaseProject.git mesProjets/SymfonyBaseProject`
Sinon faire un `git pull`

## 2/ Copier tout le dossier SymfonyBaseProject dans le dossier du projet
Ne pas copier le dossier `.git`

## 3/ Préparer les paramètres
### Medias
Ajouter un sous-domaine `media` sur le domaine
Créer la zone DNS de type A si possible (sinon utiliser un alias `media.mondomaine.whatson-web.com`)
Lors d'une installation sur un serveur en ligne, vérifier que l'IP du serveur a bien le droit d'utiliser le service `Proftpd`

- `media.host` (IP du FTP)
- `media.username` (Login du FTP)
- `media.password` (Mot de passe du FTP)
- `media.root`: /media/
- `media.baseurl`: Selon les cas : `http://media.mondomaine.whatson-web.com`, `http://media.mondomaine.fr` ou `http://cdn.media.mondomaine.fr`

### Mailgun
Ajouter un domaine sur le compte dev@whatson-web.com (`Mailgun - dev@whatson-web.com` dans 1Password)

- key
- domain

## 4/ Lancer l'installation
	composer install
	app/console doctrine:schema:update --force
	app/console assets:install web/
	app/console assetic:dump
	app/console cache:clear
	app/console cache:clear --env=prod
	
## 5/ Ajouter un accès super admin
Suivre le [tuto](https://github.com/whatson-web/wiki/blob/master/Proc%C3%A9dures/Administration/Cr%C3%A9ation%20super%20admin.md)

## 6/ Installation d'autres bundles
- [CMS](https://github.com/whatson-web/CmsBundle/blob/master/README.md)
- [Blog](https://github.com/whatson-web/BlogBundle/blob/master/docs/Installation.md)