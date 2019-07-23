# Engie Hub

## Usefull links

* [The github page](https://osoc19.github.io/engie-hub/)

* [The website](http://engiemove.be/)

## Introduction

Energy harvesting has been used for decades for bicycle dynamos or solar panels. But the technology is living a revolution today with staggering applications areas, such as building and industry automation, smart cities, automotive vehicles, security systems…

How about generating energy while having fun? Team engie-hub partnered up with Engie Belgium to explore this question.

Our answer: "With the help of a dashboard, an energy generating floor and a particle photon we simplify the concept of energy creation and usage. By combining gamification with insights and goals we’re turning energy awareness and generation into a fun experience."

## Installation

### Requirements

* Node.JS (^v10.x.x)
* npm (^v6.x.x)
* Laravel (^v5.x.x)
* Pusher application ([pusher site](https://pusher.com/))

### Before anything

Create an empty database.
Clone the github repository and open a terminal in the repository.

### Set up

``` bash
# Install composer dependencies
composer install

# Install npm dependencies
npm install

# Rename .env.example file to .env
mv .env.example .env

# Generate an app encryption key
php artisan key:generate

```

#### In the .env file
Add database information
Add pusher app information

Run this in a terminal

``` bash

# Migrate the database
php artisan migrate

```

### Launch

``` bash

# Start the frontend
npm start

# Start the backend
php artisan serve

```
Now open your browser to http://localhost:8000/

> PS: Don't forget to start the front end.

More information about the API can be found [here](API.md)

For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
