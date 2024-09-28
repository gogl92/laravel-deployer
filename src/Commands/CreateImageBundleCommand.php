<?php

namespace Inquid\Deployer\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class CreateImageBundleCommand extends Command
{
    protected $signature = 'deployer:create-image-bundle
                            {project_id : The project ID}
                            {dockerfile? : Dockerfile to use}
                            {repo_url? : Repository URL}
                            {branch_name? : Branch name}';

    protected $description = 'Create a Docker image bundle for the project';

    public function handle()
    {
        $project_id = $this->argument('project_id');
        $dockerfile = $this->argument('dockerfile');
        $repo_url = $this->argument('repo_url');
        $branch_name = $this->argument('branch_name');

        $scriptPath = __DIR__ . '/../../scripts/create-image-bundle.sh';

        // Prepare the arguments array
        $arguments = [$scriptPath, $project_id];

        // Add optional arguments if they are provided
        if ($dockerfile) {
            $arguments[] = $dockerfile;
        }
        if ($repo_url) {
            $arguments[] = $repo_url;
        }
        if ($branch_name) {
            $arguments[] = $branch_name;
        }

        $process = new Process($arguments, base_path());
        $process->setTimeout(null);

        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        if (!$process->isSuccessful()) {
            $this->error('An error occurred while creating the image bundle.');
            return 1;
        }

        $this->info('Image bundle created successfully.');
        return 0;
    }
}
