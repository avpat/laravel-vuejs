<p align="center">
    <img alt="Pod Point" height="150" src="./support/logo.png" title="Pod Point" width="498" />
</p>

# Pod Point - Full stack coding test

Hi and welcome to our coding test for joining the Pod Point Software Team!

***

**Table of Contents**

* [Presentation](#presentation)
* [Prerequisites](#prerequisites)
* [About your implementation](#about-your-implementation)
* [Your dev environment](#your-dev-environment)
* [The task](#the-task)
* [About you](#about-you)
    * [Your comments](#your-comments) (optional)

***

<p align="center">
    <strong>IMPORTANT: Publishing your test on a public repository would render an automatic disqualification</strong>
</p>

***

<a id="presentation"></a>
## Presentation

This challenge is designed to test your full stack abilities (PHP/JS).

You should approach the task as you would any other piece of work in a typical day.
Think about the tools and libraries you might use to make your life easier (frameworks, libraries, etc.).

Think about your markup and CSS in terms of re-usability and maintainability across a larger scale product.

You should be able to produce the work with a high quality finish in an acceptable amount of time.

Design:

<p align="center">
    <a href="./support/design.png">
        <img alt="Design low res" height="600" src="./support/design-low.png" title="Design low res" width="337" />
        <br />
        View High Resolution
    </a>
</p>

<a id="prerequisites"></a>
## Prerequisites

If you're using Mac OS, you will need:
* You will need to install [Docker](https://store.docker.com/editions/community/docker-ce-desktop-mac)

If you're using windows, you will need:
* [Docker toolbox](https://docs.docker.com/toolbox/toolbox_install_windows/) to use Docker and creating containers under windows
* put this whole folder inside `C/Users/Public` (to avoid having volume mounting issues)

<a id="about-your-implementation"></a>
## About your implementation

* Fill the [About you](#about-you) section below.
* If you have any notes to add to your test, please add them in the [Your comments](#your-comments) section below.
* Send a zip file with your completed entry to [peter.ward@pod-point.com](mailto:peter.ward@pod-point.com).

<a id="your-dev-environment"></a>
## Your dev environment

Once docker is downloaded, run the newly installed docker application, and wait for the message ‘Docker is now up and running’ to appear on the docker window.

We've prepared a docker environment for this test.

All you have to do, is run `./bin/docker-run.sh` and it will download all the relevant modules for each of the stacks and then spin up 3 containers:
* `podpoint-api` (for back end work, accessible on [http://localhost:8000/](http://localhost:8000/))
* `podpoint-api-docs` (for API documentation, accessible on [http://localhost:8001/](http://localhost:8001/))
* `podpoint-front` (for front end work, accessible on [http://localhost:8080/](http://localhost:8080/))

> **NOTE: If using Windows & Docker toolbox, run `docker-machine ip` to get the IP of your docker containers, then use this IP instead of `localhost` followed by the same ports as described above**
*(e.g. IP is `192.168.99.100`, API docs container will be accessible on [http://192.168.99.100:8001](http://192.168.99.100:8001))*

<a id="the-task"></a>
## The task

We need to build a very simple application that will be able to handle our units and give the ability to start/end a charge on a unit.

For this test you will need to implement this API, and build a simple frontend to list units & interact with units (start/stop a charge).

The test is split into 2 sections presenting the need for back end & front end:
* [see back end details](./docs/backend.md)
* [see front end details](./docs/frontend.md)

***

<p align="center">
    <strong>Thanks and good luck!</strong>
</p>

***

<a id="about-you"></a>
## About you

* **First name:** `Abhijeet`
* **Last name:** `Patil`


<a id="your-comments"></a>
### Your comments (optional)


> ***NOTE: If you have any comments, please write them down in this section.***

***

* The provided docker environment was not compatible so I've changed it to the docker-compose.yml
* I've prepared a docker equivalent emvironment with `docker-compose` file.  Which can be installed by following command 
`docker-compose build & docker-compose up -d`
* If needed, I've added installation instruction in the section [Docker Installation Notes](#the-installation)
* I've tested the code on the swagger-ui. I've implemented api's with Postman. The postman collection can be imported from the link. [![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/ebec28b9a285ec35d95e)


* Backend `Laravel` Framework : `api` folder
* Front-end Framework : `VueJS` : `front\code\public` -> please execute `yarn serve` so the frontend will be available at port 8080
* Css Framework: bulma https://bulma.io/ 
* The test was fun to work on. Thanks for the opportunity 

<p align="center">
    <strong>IMPORTANT: Publishing your test on a public repository would render an automatic disqualification</strong>
</p>


















<a id="the-installation"></a>
##Docker-compose Installation Notes

- Run a docker desktop on your machine
- Goto your root folder
- Run a docker build command and it should copy all the required images
`` docker-compose build && docker-compose up -d``
- Check if the docker container is running with following command
``docker-compose ps``
- If any issue occurs execute ``docker-compose down -v `` and then once again execute `` docker-compose build && docker-compose up -d``
- if any issue occurs check folder perssions from the docker desktop
- if everything ok then execute ``docker-compose exec php php artisan config:cache``


##Migrate and seed database
- The factory and migration files are provided along with this repo
- to run the migrations, run 
* ``docker-compose exec php php artisan migrate``
- Then seed
* ``    docker-compose exec php php artisan db:seed``

If you face any issue with migrate and seeding then follow these steps
- Rollback 
* ``docker-compose exec php php artisan migrate:rollback``
* ``composer dump-autoload``
* ``docker-compose exec php php artisan migrate:refresh --seed``

***
