# Deployer

A Laravel package to automate Docker image bundle creation for your projects.

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

   - `project_id`: Required.
   - `dockerfile`: Optional.
   - `repo_url`: Optional.
   - `branch_name`: Optional.

   *Note*: Default values for optional arguments are managed within the script, so you only need to provide them if you want to override the defaults.

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
This file should contain the necessary environment configurations for your application.

## License

This package is open-sourced software licensed under the MIT license.

## Author

Inquid SAS de CV  
Email: luisarmando1234@gmail.com
