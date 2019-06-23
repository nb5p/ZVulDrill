# ZVulDrill in Docker

## 如何使用

- 构建
    `docker build -t zvuldrill:latest .`
- 启动
    `docker run -itd -p80:80 -p3306:3306 -v ${PWD}/wwwroot/:/usr/share/nginx/html/:rw --name zvuldrill zvuldrill:latest; sleep 1; docker exec -i zvuldrill mysql -uroot -proot vuldata < sqldata/vuldata.sql`
- 停止
    `docker stop zvuldrill; docker rm zvuldrill`