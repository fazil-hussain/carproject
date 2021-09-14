<?php

namespace App\Console\Commands;

use App\Models\maketrip;
use App\Models\RentCar;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class updaterentcar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rentcar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {


        $maketrip = maketrip::all();
        foreach ($maketrip as $key => $value) {
            $dropdatetime = $value->dropdatetime;
            $currentdatetime = Carbon::now();

            if ($dropdatetime >= $currentdatetime) {
                $carid = $value->car_id;
                $rentcar = DB::update('update rent_cars set status = 1 where id = ?', [$carid]);
                if ($rentcar) {
                    Log::info('updatecar is working fine');
                } else {
                    Log::info('not updating');
                }
            }
        }
    }
}
