# Laravel Sale Website with Docker

This is a Laravel project set up with Docker to simplify development and deployment.

---

## Prerequisites

Ensure you have the following installed on your local machine:

-   [Docker](https://www.docker.com/products/docker-desktop)
-   [Docker Compose](https://docs.docker.com/compose/install/)

---

## Setup Instructions

### 1. Clone the Repository

    git clone <repository_url>
    cd <repository_name>

### 2. Configure Environment Variables

Copy the .env.example file to .env and update the environment variables as needed:

    cp .env.example .env

### 3. Build and Start Docker Containers

Run the following command to build and start the containers:

    Copy code
    docker-compose up --build -d

This will set up:

-   PHP (Laravel application)
-   Nginx (Web server)
-   MongoDB (Database)
-   Node.js (For running frontend assets)

### 4. Install dependencies

Backend (Composer):

    docker exec -it app composer install

Frontend (Yarn):

    docker exec -it app yarn install
    docker exec -it app yarn dev

### 5. Generate Application Key

    docker exec -it app php artisan key:generate

## Accessing the Application

-   Application: http://localhost:9999
-   MongoDB: Port 27017 (can be accessed using tools like MongoDB Compass)
-   Nginx: Proxy for Laravel running on port 9999

## Useful Commands 

Install Additional Composer Packages

    docker exec -it app composer require <package_name>

For production

    docker exec -it app yarn build

Stop Container 

    docker-compose down

## Folder Structure

- /app: Laravel application files
- /dockers: Docker configuration files (e.g.nginx.conf, php.ini)
- /storage/logs: Application logs
- /resources: Views, JS, and CSS assets

## Contributing
Feel free to fork this repository and submit pull requests for improvements!


