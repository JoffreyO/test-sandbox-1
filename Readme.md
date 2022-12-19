# README

## Install

```shell
docker-compose up -d --build
docker-compose exec --user=www-data php sh
```

> http://localhost:8080/health
```json
{
    "database": true
}
```
