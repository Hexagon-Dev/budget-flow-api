# budget-flow-api

Backend for budget control system. Allows to monitor operations with money, analytics and much more.

## Running

### Install dependencies
```sh
composer install
```

### Copy .env file & generate key
Copy `.env.example` file and generate application key:
```sh
cp .env.example .env
php artisan key:generate
```
Change other settings where neccessary.

### Generate API documentation with Scribe (optional)
```sh
php artisan scribe:generate
```

### Start all the containers in the background
```sh
docker compose up -d
```


## Project structure

- `Dockerfile` and nginx configuration for the application are located in `docker/`
- The application itself is located in `src/`
