# CRM-Workshop 3 | Introduction EspoCRM

# CRM Workshop 3

One Day workshop on building and Integrating Your Apps with a CRM.

## Prerequisite
---
### Any Linux machine/VM with following packages installed

- docker
- [docker-compose](https://docs.docker.com/compose/install/)
- git (any recent version)

### GitHub account
- Create an account on [GitHub](https://github.com/join) (Only if you do not have an account)
- Fork [this](https://github.com/UniCourt/CRM-Workshop1) repository and then clone it to your machine
- You can refer [this](https://docs.github.com/en/get-started/quickstart/fork-a-repo) guide to understand how to fork and clone



### Docker Images
- Run the following commands to get few docker images required for the workshop
    ```
    1. docker pull mysql:8.0
    2. docker pull php:7.4-apache
    3. docker pull hello-world
    4. docker pull alpine
    ```

### Workshop environment setup 
 - Check if Git, Docker, Docker Compose are installed and docker images are downloaded on the system. Open the terminal and run the following command

   ```
   Command: $ git --version
   git version 2.25.1

   Command: $ docker --version
   Docker version 20.10.17, build 100c701

   Command: $ docker-compose --version
   docker-compose version 1.25.0, build 0a186604

   Command: $ sudo docker images
   ```
## What will you learn by the end of this workshop?

- You will learn about the world of CRMs and why they are critical for Businesses.
- You will be learn to integrate your apps with your very own CRM
- You will learn to customize your CRM to fit the needs for your busienss

## Schedule
| Time            | Topics
|-----------------|-------
| 09:15 - 09:45   |  [`Introduction`]
| 09:45 - 11:00   |  [`Introduction to CRMs`](chapters/1_getting_started.md)
| 11:00 - 11:15   |  `Break`
| 11:15 - 13:00   |  [`Session Continued`](chapters/1_getting_started.md)
| 13:00 - 13:30   |  `Lunch`
| 14:00 - 16:00   |  [`Session Continued`](chapters/1_getting_started.md)