<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Get service name
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");
        $baseServicePath = app_path("Services/BaseService.php");

        //Check exist service
        if (!File::exists(app_path('Services'))) {
            File::makeDirectory(app_path('Services'), 0755, true);
        }

        // Create BaseService if not exist
        if (!File::exists($baseServicePath)) {
            $this->createBaseService($baseServicePath);
            $this->info('BaseService created successfully!');
        }

        //Service content
        $content = <<<EOT
        <?php

        namespace App\Services;

        class {$name} extends BaseService
        {
            // Define your service logic here
        }
        EOT;

        // Create and write content
        File::put($path, $content);

        $this->info("Service class {$name} created successfully!");
        return Command::SUCCESS;
    }

    /**
     * Create BaseService.
     *
     * @param string $path
     * @return void
     */
    protected function createBaseService(string $path)
    {
        $content = <<<EOT
        <?php

        namespace App\Services;

        class BaseService
        {
            // Shared logic for all services
        }
        EOT;

        File::put($path, $content);
    }

    /**
     * Create new Service and extend BaseService.
     *
     * @param string \$name
     * @param string \$path
     * @return void
     */
    protected function createNewService(string $name, string $path)
    {
        $content = <<<EOT
        <?php

        namespace App\Services;

        class {$name} extends BaseService
        {
            // Define your service logic here
        }
        EOT;

        File::put($path, $content);
    }
}
