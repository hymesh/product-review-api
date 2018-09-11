<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;

class DoubleProductPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:double-price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '모든 제품의 가격을 두 배로 증가시킵니다.';

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
        $this->line('모든 제품의 가격을 두 배로 증가시킵니다.');
        if ($this->confirm('계속 하시겠습니까? [y|N]')) {
            DB::transaction(function () {
                DB::table('products')->chunk(100, function ($products) {
                    foreach ($products as $product) {

                        $product->price = $product-> price * 2;
                        $product->save();
                    }
                });
            });

            $this->line('프로그램을 종료합니다.');
        }
    }
}
