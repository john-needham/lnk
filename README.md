# Build a dev env for a Laravel project

`setup` file

```bash
#!/bin/sh

PROJECT=$1;

echo $PROJECT

git clone git@github.com:john-needham/blank.git .

TEMPLATE="__PROJECT__"

sed -i '' "s/${TEMPLATE}/${PROJECT}/g" ./docker-compose.yml
sed -i '' "s/${TEMPLATE}/${PROJECT}/g" ./Makefile
sed -i '' "s/${TEMPLATE}/${PROJECT}/g" ./infra/etc/nginx/site.conf
sed -i '' "s/${TEMPLATE}/${PROJECT}/g" ./cmd

make build
make project tmp=tmp
shopt -s dotglob
mv ./tmp/* ./
rm ./tmp
make run

echo "## setup-sctipt-project: ${PROJECT}"  | sudo tee -a /etc/hosts
echo "127.0.0.1 ${PROJECT}.local" | sudo tee -a /etc/hosts
echo "## setup-sctipt-project-end"  | sudo tee -a /etc/hosts

echo "Broswe to http://${PROJECT}.local"

```

Execute:
```
$ cd name
$ setup name
```