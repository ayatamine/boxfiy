<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Forms;
use Filament\Pages\Actions;
use App\Models\BallanceHistory;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use App\Notifications\User\BalanceCreditedNotification;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
            Actions\Action::make('Add Balance')
            ->action(function (array $data): void {
                $this->record->increment('wallet_balance' ,$data['amount']);
                $BallanceHistory = BallanceHistory::create(
                    [
                        'user_id'=>$this->record->id,
                        'transaction_type' =>'credit_ballance',
                        'amount' =>$data['amount'],
                        'payment_gateway_id'=>0,
                    ]
                    );

                    $this->record->notify(new BalanceCreditedNotification($this->record->name,$BallanceHistory));
            })
            ->form([
                Forms\Components\TextInput::make('amount')->numeric()
            ])
        ];
    }
}
