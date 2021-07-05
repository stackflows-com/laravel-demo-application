# Laravel Demo Application

Start and stop the app
```
docker-compose up -d
docker-compose stop
```


### Setup
First launch of the app
```
cp .env.example .env
docker-compose up -d
make setup
```

You can change the ports in the `.env` file
```
NGINX_HOST_PORT=8080
PG_HOST_PORT=54321
```
