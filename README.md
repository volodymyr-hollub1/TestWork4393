### For local dev:
1) Make directory to docker
```
mkdir ./storage/docker
```
2) Copy .env.example 
```
cp .env.example .env
```
3) Add host user to .env
```
UID=1000
GID=1000
```
4) Run docker services
```
docker-compose up -d --build
```

