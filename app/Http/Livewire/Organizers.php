<?php

namespace App\Http\Livewire;

use App\Models\Organizer;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Organizers extends TableComponent {
	use HtmlComponents;

	public $loadingIndicator = true;
	public $exports = ["xlsx"];

    public function query() : Builder {
        return Organizer::whereRaw("1 = 1");
    }

    public function columns() : array {
    	return [
    		Column::make("ID")->sortable(),
    		Column::make("email")->searchable()->format(function(Organizer $model) {
    			return $this->mailto($model->email);
    		})->exportFormat(function(Organizer $model) {
    		    return $model->email;
    		}),
    		Column::make("university"),
    		Column::make("club"),
    		Column::make("created_at")->sortable()
    	];
    }
    // public function render() {
    //     return view('livewire.Organizers');
    // }
}
