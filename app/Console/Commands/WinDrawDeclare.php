<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AmazonInfoController;
use Auth;
use App\Models\User;
use App\Models\Draw;
use App\Models\DrawWinner;
use App\Models\OrderItem;
use Log;
use DateTime;


class WinDrawDeclare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'win_n_win:draw-declare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Draw of Win & Win';

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

        Log::info("win_n_win:draw -- start");
        $this->info("win_n_win:draw -- start");

        // get current draw
        $current_draw = Draw::where('is_current','1')->first();

        if(!empty($current_draw)) {

            $current_draw_date = $current_draw->draw_date;
            $draw_id = $current_draw->id;

            if($current_draw_date == date('Y-m-d')) {   

                $selected_ticket_number = $this->declareTicketNumber();
                $this->info(implode(",", $selected_ticket_number));

                if(!empty($selected_ticket_number)) {
                    $draw_ticket_number = implode(",", $selected_ticket_number);
                    $winner_user_id = '';

                    // check for order with declared ticket number
                    $order_item = OrderItem::where('draw_id',$draw_id)
                                                ->where('ticket_number',$draw_ticket_number)
                                                ->first();

                    if(!empty($order_item)) {
                        $winner_user_id = $order_item->user_id; 
                    } 

                    // insert data into table
                    $draw_winner =  new DrawWinner;
                    $draw_winners_data = [];
                    $draw_winners_data['draw_id'] = $draw_id;
                    if(!empty($winner_user_id)) {
                        $draw_winners_data['user_id'] = $winner_user_id;                        
                    }
                    $draw_winners_data['ticket_number'] = $draw_ticket_number;
                    $draw_winners_data['draw_date'] = $current_draw_date;
                    $draw_winner->create($draw_winners_data);


                    // create next draw
                    $draw = new Draw;

                    $draw::query()->update(['is_current' => '0']);

                    $next_draw_date = date('Y-m-d',strtotime('+1 days'));                    
                    $draw = new Draw;
                    $draw_data = [];
                    $draw_data['draw_date'] = $next_draw_date;
                    $draw_data['is_current'] = '1';
                    $draw->create($draw_data);

                }
            }

        }


        $this->info("win_n_win:draw -- end");
        Log::info("win_n_win:draw -- end");
        
    }


    public function declareTicketNumber(){

        $ticket_number = [];

        // first five from 1-50 
        for ($i=0; count($ticket_number) <= 5; $i++) { 
            // code...
            $number = mt_rand(1,50);
            if(!in_array($number, $ticket_number)) {
                $ticket_number[] = $number;
            }
        }

        //last from 1-10
        $ticket_number[] = mt_rand(1,10);

        return $ticket_number;
    }
}
