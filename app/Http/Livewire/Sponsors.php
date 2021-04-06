<?php

namespace App\Http\Livewire;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Sponsors extends TableComponent {
	use HtmlComponents;

	public $loadingIndicator = true;
	public $exports = ["xlsx"];

    public function query() : Builder {
        return Sponsor::whereRaw("1 = 1");
    }

    public function columns() : array {
    	return [
    		Column::make("ID")->sortable(),
    		Column::make("email")->searchable()->format(function(Sponsor $model) {
    			return $this->mailto($model->email);
    		})->exportFormat(function(Sponsor $model) {
    		    return $model->email;
    		}),
    		Column::make("letter"),
    		Column::make("created_at")->sortable()
    	];
    }
    // public function render() {
    //     return view('livewire.Sponsors');
    // }
}
