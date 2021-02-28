<?php

namespace App\Http\Livewire;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Workshop extends TableComponent {
	use HtmlComponents;

	public $loadingIndicator = true;

    public function query() : Builder {
        return Participant::whereRaw("1 = 1");
    }

    public function columns() : array {
    	return [
    		Column::make("ID")->sortable(),
    		Column::make("fullname")->searchable(),
    		Column::make("email")->searchable()->format(function(Participant $model) {
    			return $this->mailto($model->email);
    		}),
    		Column::make("Birthdate"),
    		Column::make("Phone")->format(function(Participant $model) {
    			return $this->html($model->phone_number);
    		}),
    		Column::make("Size"),
    		Column::make("activated"),
    		Column::make("created_at")->sortable(),
            Column::make("Actions")->format(function(Participant $model) {
                if ($model->activated == false) {
                    return view("livewire.accept-hacker", ["hacker_id" => $model->id]);
                }
            })
    	];
    }

    public function accept($hacker_id) {
        return Participant::findOrFail($hacker_id)->update(["activated" => true]);  
    }
    // public function render() {
    //     return view('livewire.hackers');
    // }
}
