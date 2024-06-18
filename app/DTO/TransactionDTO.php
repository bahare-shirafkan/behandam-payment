<?php

namespace App\DTO;

class TransactionDTO
{

    public int $sourceCardNumber;
    public int $destinationCardNumber;
    public float $amount;

    public function __construct(array $fields)
    {
        $this->sourceCardNumber = $fields['source_card_number'];
        $this->destinationCardNumber = $fields['destination_card_number'];
        $this->amount = $fields['amount'];
    }


    public function toArray()
    {
        return [
            'source_card_number' => $this->sourceCardNumber,
            'destination_card_number' => $this->destinationCardNumber,
            'amount' => $this->amount,
        ];
    }
}
