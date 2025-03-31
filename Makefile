.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t prueba-php .

build-container:
	docker run -dt --name prueba-php -v .:/540/Prueba prueba-php
	docker exec prueba-php composer install

start:
	docker start prueba-php

test: start
	docker exec -it prueba-php ./vendor/bin/phpunit  --colors=always --testdox --verbose tests/$(target)

shell: start
	docker exec -it prueba-php /bin/bash

stop:
	docker stop prueba-php

clean: stop
	docker rm prueba-php
	rm -rf vendor
