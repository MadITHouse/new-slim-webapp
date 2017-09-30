## madithouse/new-slim-webapp
Version: 1.0.0 Stable

## About
madithouse/new-slim-webapp is build using slim/slim, and contain basic settings to get started with a new PHP project.

## Demo
see the code working [here](http://new-slim-webapp.dev.madithouse.com)

## Get Started
Use composer to get started
```
composer create-project madithouse/new-slim-webapp
```

## Database Setup
  1. Setup Database see ```databaseStructure``` dir for database schema.
  2. Update ```src/config.php``` with database details.

## Creating new pages
  Pages are rendered using [slim/twig](https://github.com/slimphp/Twig-View)
  * Views are located in ```src/resources/views```
  * Routes ae called using classes, located in ```src/classes/Routes```
  * After setting up routes in classes, make sure you connect them using the container so they can be called by the routes page, container file is located at ```src/container.php```
  * At last setup the route in ```src/routes.php``` and call them using the container.
