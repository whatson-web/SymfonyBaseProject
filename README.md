# Installation
## 1/ Cloner les fichiers dans un dossier dédié
La première fois : 
`git clone git@github.com:whatson-web/SymfonyBaseProject.git mesProjets/SymfonyBaseProject`
Sinon faire un `git pull`

## 2/ Copier tout le dossier SymfonyBaseProject dans le dossier du projet
Ne pas copier le dossier `.git`

## 3/ Préparer les paramètres
### Amazon S3
Ajouter un bucket sur le compte dev@whatson-web.com (`Amazon - dev@whatson-web.com` dans 1Password)

[Tuto](https://github.com/whatson-web/wiki/blob/master/Proc%C3%A9dures/D%C3%A9veloppement/Amazon/Cr%C3%A9ation%20Bucket%20Amazon%20S3.md)

- key
- secret
- bucket

### Mailgun
Ajouter un domaine sur le compte dev@whatson-web.com (`Mailgun - dev@whatson-web.com` dans 1Password)

- key
- domain
- api-key

## 4/ Lancer l'installation
	composer install
	app/console doctrine:schema:update --force
	app/console assetic:dump
	app/console cache:clear
	app/console cache:clear --env=prod
	
## 5/ Ajouter un accès super admin
Suivre le [tuto](https://github.com/whatson-web/wiki/blob/master/Proc%C3%A9dures/Administration/Cr%C3%A9ation%20super%20admin.md)

## 6/ Installation d'autres bundles
- [CMS](https://github.com/whatson-web/CmsBundle/blob/master/docs/Installation.md)
- [Blog](https://github.com/whatson-web/BlogBundle/blob/master/docs/Installation.md)