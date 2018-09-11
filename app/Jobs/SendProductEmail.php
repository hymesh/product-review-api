<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Product;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendProductEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function handle(Mailer $mailer)
    {
        $format = '새로운 Product가 생성되었습니다.
  -  id: %d
  -  name: %s';

        $message = sprintf(
            $format,
            $this->product->id,
            $this->product->name
        );

        $mailer->raw($message,function ($m) {

        });
    }
}
