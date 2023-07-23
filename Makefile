build:
	docker build . --tag gpb

run:
	make build
	docker run -it gpb

test:
	docker run -it -v $(PWD):/var/www/html gpb php artisan test