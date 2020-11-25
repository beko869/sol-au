<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class syncMarsWeatherData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sync_mars_weather_data';

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
        $response = Http::get( 'https://api.nasa.gov/insight_weather/?api_key=DEMO_KEY&feedtype=json&ver=1.0' );
        
        //TODO: check if response is valid
        $solResponseDataArray = $response->json();

        foreach( $solResponseDataArray as $solEntryKey => $solEntryData )
        {
            $this->info( $solEntryKey );
            $this->info( json_encode( $solEntryData ) );

            if( isset( $solEntryData[ 'AT' ] ) )
            {
                $insertDataArray = array(
                    'sol_key' => $solEntryKey,
                    'max_temp' => $solEntryData[ 'AT' ][ 'mx' ],
                    'min_temp' => $solEntryData[ 'AT' ][ 'mn' ],
                    'avg_temp' => $solEntryData[ 'AT' ][ 'av' ],
                    'max_windspeed' => $solEntryData[ 'HWS' ][ 'mx' ],
                    'min_windspeed' => $solEntryData[ 'HWS' ][ 'mn' ],
                    'avg_windspeed' => $solEntryData[ 'HWS' ][ 'av' ],
                );
                
                $insertResult = DB::table( 'sols' )->updateOrInsert( $insertDataArray );
                
                if( $insertResult === true )
                {
                    $this->info( 'Successfully inserted Sol key: ' . $solEntryKey );
                }
                else
                {
                    $this->error( 'Error inserting Sol key: ' . $solEntryKey );
                }
            }
        }        

        return 0;
    }
}
