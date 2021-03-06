<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        if ($this->confirm('계속 하시겠습니까?')) {
            DB::transaction(function () {
                Product::chunk(100, function ($products) {
                    foreach ($products as $product) {
                        $product->price = $product-> price * 2;
                        $product->save();

                        $format = '%s (id: %d) 가격 변경 (%d  ->  %d)';
                        $this->line(sprintf(
                            $format,
                            $product->name,
                            $product->id,
                            $product->price,
                            $product->price * 2
                        ));
                    }
                });
            });

            $this->line('프로그램을 종료합니다.');
        }
    }
}
