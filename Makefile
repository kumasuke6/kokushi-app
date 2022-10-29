EXEC_APP := docker-compose exec -T app

up:
	docker-compose up -d

down:
	docker-compose down

test:
	$(EXEC_APP) php artisan test

# make controller controller=[コントローラー名]
controller:
	$(EXEC_APP) php artisan make:controller ${controller}

# make model model=[モデル名]
model:
	$(EXEC_APP) php aritisan make:model ${model}

migrate:
	$(EXEC_APP) php artisan migrate:fresh --seed