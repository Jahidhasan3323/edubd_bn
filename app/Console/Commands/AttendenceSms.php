<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Custom\Attendance\AutoSms;

class AttendenceSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendence:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Attendence SMS Automatic';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo AutoSms::attend_students();
        echo AutoSms::absent_students();
    }
}
