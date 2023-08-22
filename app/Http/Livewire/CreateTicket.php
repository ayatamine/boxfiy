<?php

namespace App\Http\Livewire;

use Filament\Forms;
use Livewire\Component;
use App\Models\TicketCategory;
use Filament\Forms\Components\Grid;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class CreateTicket extends Component implements HasForms 
{
    use InteractsWithForms;
    
   public $ticket_category_id;
   public $order_id;
   public $title;
   public $content;
    protected function getFormSchema(): array 
    {
        return [
            Grid::make(2)
            ->schema([
                Forms\Components\Select::make('ticket_category_id')->label('Category')
                ->options(TicketCategory::all()->pluck('title', 'id'))
                 ->searchable(),
                Forms\Components\TextInput::make('order_id')->label('Order ID'),
            ]),
            Grid::make(2)
            ->schema([
                Forms\Components\TextInput::make('title')->label('Title')->required()
                ->columnSpanFull(),

            ]),
            Grid::make(2)
            ->schema([
                Forms\Components\Textarea::make('content')->label('Description')->required()
                ->columnSpanFull(),

            ]),

        ];
    }
    public function save(): void
    {
        $this->user->update($this->form->getState());
        Notification::make() 
        ->title(trans('frontend.updated_successfully'))
        ->success()
        ->send(); 
    }
    public function render()
    {
        return view('livewire.create_tickets');
    }
}
