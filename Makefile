.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t lista-de-la-compra-php .

build-container:
	docker run -dt --name lista-de-la-compra-php -v .:/540/ListaDeLaCompra lista-de-la-compra-php
	docker exec lista-de-la-compra-php composer install

start:
	docker start lista-de-la-compra-php

test: start
	docker exec -it lista-de-la-compra-php ./vendor/bin/phpunit  --colors=always --testdox --verbose tests/$(target)

shell: start
	docker exec -it lista-de-la-compra-php /bin/bash

stop:
	docker stop lista-de-la-compra-php

clean: stop
	docker rm lista-de-la-compra-php
	rm -rf vendor
