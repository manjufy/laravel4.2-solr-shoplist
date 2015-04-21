## Hardware Shop Finder (Laravel 4.2)

Hardware Shop finder, lists Hardware shops
Administrator can add define and add more shops from the administrator section.
Use could browse through the list of hardware shops using location filter.
User could also browse by 'Nearbyme' feature that would list down all the shops near user location.

Application written in Laravel 4.2.* with MySQL as Database and Solr for search capabilities

Solr is used for Keyword Search, Faceting and Geospatial
MySQL is used to Store the shop list (Single Source of truth)

## Solr
Solr Version used is 4.10.3
Core name : Store
Configuration: You could find the solr configuration in app/config/solr.php

## Database MySQL
Create database name : hstore
Database tables and sample data is in data/hstore_2015_04_21.sql
Import this sql into hstore database

## Nginx Configuration
Look data/ngix


## Run
 Once your done with Nginx, MySQL and Solr configuration

 Go to http://{yourhost}:3333 for store front end
 Go to http://{yourhost}:3333/manager
* * username:admin
* * password:admin


