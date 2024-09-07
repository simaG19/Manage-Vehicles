<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use League\Csv\Writer;
use SplTempFileObject;

class GenerateUserReport extends Command
{
    protected $signature = 'report:generate-users';
    protected $description = 'Generate a weekly report of new users and send it to admin.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get new users registered in the last 7 days
        $newUsers = User::where('created_at', '>=', now()->subDays(7))->get();

        // Create CSV
        $csv = Writer::createFromFileObject(new SplTempFileObject());
        $csv->insertOne(['id', 'name', 'email', 'created_at']);

        foreach ($newUsers as $user) {
            $csv->insertOne([$user->id, $user->name, $user->email, $user->created_at]);
        }

        // Define file path
        $csvPath = storage_path('app' . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'new_users_report.csv');

        // Ensure the reports directory exists
        if (!file_exists(storage_path('app/reports'))) {
            mkdir(storage_path('app/reports'), 0775, true);
        }

        // Save the CSV file
        file_put_contents($csvPath, $csv->__toString());

        // Send Email
        Mail::raw('Please find the attached report for new users.', function ($message) use ($csvPath) {
            $message->to('XX@gmail.com')
                    ->subject('Weekly New Users Report')
                    ->attach($csvPath);
        });

        $this->info('Report generated and sent successfully!');
    }
}
