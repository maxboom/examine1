## Installation
- **Clone the repository:**
```bash
git clone git@github.com:maxboom/polygons.git .
```
- **Build docker**
```bash
docker-compose up -d
```
- **Enter in Docker container**
```bash
docker-compose exec laravel.test bash
```

- **Run Composer**
```bash
composer install
```

- **Exit from docker container**
```bash
exit
```

_Note: wait until mysql container starting_
- **Run migrations**
```bash
./vendor/bin/sail artisan migrate
```

- **Visit** http://localhost:81/login
