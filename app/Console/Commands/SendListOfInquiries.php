<?php

namespace App\Console\Commands;

use App\Exports\SendEmailListOfInquiries;
use App\Mail\ExcelExportMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendListOfInquiries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendlistofinquiries:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lists = new SendEmailListOfInquiries;
        $filename = 'exports/inquiries_' . Carbon::now() . '.xlsx';
        $excelFile = $lists->store($filename, 's3'); // 'exports' is the directory in your S3 bucket
        $mailData = [
            'excelFile' => $filename
        ];
        Mail::to(['ashok.verma1098@gmail.com','s.nautiyal@ybrantworks.com'])
            ->send(new ExcelExportMail($mailData));
            info("Cron Job running at ". now());
        return Command::SUCCESS;
    }
}
