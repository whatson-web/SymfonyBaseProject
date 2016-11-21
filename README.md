# Installation
## 1/ Cloner les fichiers dans un dossier dédié
La première fois : 
`git clone git@github.com:whatson-web/SymfonyBaseProject.git mesProjets/SymfonyBaseProject`
Sinon faire un `git pull`

## 2/ Copier tout le dossier SymfonyBaseProject dans le dossier du projet
Ne pas copier le dossier `.git`

## 3/ Préparer les paramètres
### Amazon S3
- key
- secret
- region
- bucket

### Mailgun
- key
- domain
- api-key

## 4/ Lancer l'installation
	composer install
	app/console doctrine:schema:update --force
	app/console assetic:dump
	app/console cache:clear
	app/console cache:clear --env=prod
	
## 5/ Installation d'autres bundles
- [CMS](https://github.com/whatson-web/CmsBundle/blob/master/docs/Installation.md)
- [Blog](https://github.com/whatson-web/BlogBundle/blob/master/docs/Installation.md)