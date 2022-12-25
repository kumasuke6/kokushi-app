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
	$(EXEC_APP) php artisan make:model ${model}

migrate:
	$(EXEC_APP) php artisan migrate:fresh --seed

# make request request=[リクエスト名]
request:
	$(EXEC_APP) php artisan make:request ${request}

# make artisan artisan=[コード]
exec-app:
	docker-compose exec app bash