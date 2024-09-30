# Deployer

A Laravel package to build a singletone docker image containing everything it needs to run (PHP, MySQL, Nginx, Postgres, mailcatcher, redis, adminer), useful to deploy it for your testing team or the frontend/client developers.

## Installation

Install the package via Composer:

```bash
composer require inquid/laravel-deployer
```

## Usage
You can use the script in multiple ways:

1. **Laravel Artisan Command**

   Run the command from your Laravel project's root:

   ```bash
   php artisan deployer:create-image-bundle {project_id} {dockerfile?} {repo_url?} {branch_name?}
   ```

   - `project_id`: Required. The name of the image that will be created.
   - `dockerfile`: Optional. The dockerfile file to be used. PHP 7.4, 8.0, 8.1, 8.2, 8.3 available (https://github.com/gogl92/docker-lemp/tree/deployer)[More info]
   - `repo_url`: Optional. The repository containing the base images.
   - `branch_name`: Optional. The branch of the repository to take the Dockerfile from.

   *Note*: The command will create an apps image while building the image.

2. **Via Vendor Bin**

   Execute the script from vendor/bin:

   ```bash
   vendor/bin/create-image-bundle {project_id} {dockerfile?} {repo_url?} {branch_name?}
   ```

3. **Directly from the Script**

   Run the script directly:

   ```bash
   vendor/inquid/laravel-deployer/scripts/create-image-bundle.sh {project_id} {dockerfile?} {repo_url?} {branch_name?}
   ```

A docker image will be created and ready to run

```
docker run -p 8080:80 -p 8888:88 \
  -e MYSQL_ROOT_PASSWORD=1234567890 -e MYSQL_DATABASE=appdb \
  -e MYSQL_USER=dbuser -e MYSQL_PASSWORD=123456 \
  --name lemp -d project_id
```

### Default Values

- **Dockerfile**: 8.3.Dockerfile
- **Repository URL**: https://github.com/gogl92/docker-lemp
- **Branch Name**: deployer

These defaults are defined in the script itself to ensure there is only one source of truth for default values.

## Requirements

- PHP: >=7.4
- Laravel: 8.x, 9.x, or 10.x
- Docker: Installed and running
- Git: Installed
- Rsync: Installed

## Important Notes
- Environment File: Ensure that you have a .env.staging file in your project's root directory. 
The script copies this file to .env during execution. 
This file should contain the necessary environment configurations for your application, please take in consideration that credentials shouldn't use the docker compose syntax, it should use 127.0.0.1 or localhost.

## License

This package is open-sourced software licensed under the MIT license.

## Author

Inquid SAS de CV  
Email: luisarmando1234@gmail.com
