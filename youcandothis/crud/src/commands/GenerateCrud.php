<?php

namespace Youcandothis\Crud\Src\Commands;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateCrud extends Command
{
    protected $name = 'generate:crud';

    protected $description = 'Generate crud just by add your entity name.';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
        $option = $this->option('example');
        print('hiiiiiiiiiiiiii');

        $this->info('This a command test:'.$option);

    }
    protected function getArguments()
    {
        return [
            ['model_name', InputArgument::OPTIONAL, 'An example argument.'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['fields', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];


    }

    public function handle()
    {
        $fields = $this->option('fields');

        $k = [];
        $k = explode(",", $fields);
        //print('--- all fields are --- ' . $k[0]);
        $fillable = '$fillable';
        $fillables = "    protected " . $fillable . " = [];";
        if($this->option('fields'))
        {
            $fillables = "    protected " . $fillable . " = [\n        '" . str_replace(",","', '", $fields) . "',\n    ];";
        }
        
        // foreach($k as $i =>$key) {

        //     echo $i.' '.$key .'</br>';

        // }

        $modelName = $this->argument('model_name');
        if ($this->confirm('Would you like to create a model? [y|N]')) {
            if ($modelName === '' || is_null($modelName) || empty($modelName)) {
                 $this->error('Model Name Invalid..!');
             }


                 $m_path = 'app/' . title_case($modelName) . '.php';

                 if(! file_exists($m_path)) {
                     $m_content = "<?php\n\nnamespace App;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass " . $modelName . " extends Model\n{\n" . $fillables . "\n}";

                     file_put_contents($m_path, $m_content);
                     $this->info('Model ' . title_case($modelName) . ' Created Successfully.');

                 } else {
                     $this->error('Model ' . title_case($modelName) . ' Already Exists.');
                 }
        }
        if ($this->confirm('Would you like to create a controller? [y|N]')) {
            if ($modelName === '' || is_null($modelName) || empty($modelName)) {
                 $this->error('Model Name Invalid..!');
             }


                 $c_path = 'app/Http/Controllers/' . title_case($modelName) . 'sController.php';

                 if(! file_exists($c_path)) {
                     $c_content = "<?php\n\nnamespace App\Http\Controllers;\n\nuse Illuminate\Http\Request;\n\nuse App\Http\Controllers\Controller;\n\nclass " . title_case($modelName) . "sController extends Controller\n{\n\n}";

                     file_put_contents($c_path, $c_content);
                     $this->info(title_case($modelName) . 'sController Created Successfully.');

                 } else {
                     $this->error(title_case($modelName) . 'sController Already Exists.');
                 }
        }
        if ($this->confirm('Would you like to create a migration? [y|N]')) {
            if ($modelName === '' || is_null($modelName) || empty($modelName)) {
                 $this->error('Model Name Invalid..!');
             }


                 $m_path = 'database/migrations/' . date('Y_m_d_His_') . 'create_' . strtolower($modelName) . 's_table.php';

                 $tablek = '$table';
                 $increments = $tablek . "->increments('id');";
                 $timestamps = $tablek . "->timestamps();";

                 if(! file_exists($m_path)) {
                     $m_content = "<?php\n\nuse Illuminate\Support\Facades\Schema;\nuse Illuminate\Database\Schema\Blueprint;\nuse Illuminate\Database\Migrations\Migration;\n\nclass Create" . title_case($modelName) . "sTable extends Migration\n\n{\n\n  public function up()\n  {\n    Schema::create('" . strtolower($modelName) . "s', function (Blueprint $tablek) {\n      $increments\n      $timestamps\n    });\n  }\n\n  public function down()\n  {\n    Schema::drop('" . strtolower($modelName) . "s');\n  }\n\n}";

                     file_put_contents($m_path, $m_content);
                     $this->info('Migration ' . date('Y_m_d_His_') . 'create_' . strtolower($modelName) . 's_table.php' . ' Created Successfully.');

                 } else {
                     $this->error('Migration ' . date('Y_m_d_His_') . 'create_' . strtolower($modelName) . 's_table.php' . ' Already Exists.');
                 }
        }
    }
}
