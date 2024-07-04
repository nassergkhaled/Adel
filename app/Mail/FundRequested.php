<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $case;
    public $fund;
    public $bank;
    public $bank_account;
    public $pay_method;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($case, $fund, $bank, $bank_account, $pay_method)
    {
        $this->case = $case;
        $this->fund = $fund;
        $this->bank = $bank;
        $this->bank_account = $bank_account;
        $this->pay_method = $pay_method;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.fund_requested')
            ->with([
                'case' => $this->case,
                'fund' => $this->fund,
                'bank' => $this->bank,
                'bank_account' => $this->bank_account,
                'pay_method' => $this->pay_method
            ]);
    }
}
