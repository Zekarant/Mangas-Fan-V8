
build: ##build the project
	docker compose build
start: ##start the project
	docker compose up -d
install: ## install the project
	docker exec -it -u www-data php-mf composer install
migrate:
	docker exec -it -u ./bin/console doctrine:migrations:migrate -n

.DEFAULT_GOAL := help

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/\[33m/'
.PHONY: help
