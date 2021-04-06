<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Messages extends TableComponent {
	use HtmlComponents;

	public $loadingIndicator = true;

    public function query() : Builder {
        return Message::whereRaw("1 = 1");
    }

    public function columns() : array {
    	return [
    		Column::make("ID")->sortable(),
    		Column::make("fullname"),
    		Column::make("email")->searchable()->format(function(Message $model) {
    			return $this->mailto($model->email);
    		}),
    		Column::make("message"),
    		Column::make("created_at")->sortable()
    	];
    }
    // public function render() {
    //     return view('livewire.Messages');
    // }
}
