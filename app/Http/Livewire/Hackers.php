<?php

namespace App\Http\Livewire;

use App\Models\Hacker;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Hackers extends TableComponent {
	use HtmlComponents;

	public $loadingIndicator = true;

    public function query() : Builder {
        return Hacker::whereRaw("1 = 1");
    }

    public function columns() : array {
    	return [
    		Column::make("ID")->sortable(),
    		Column::make("fullname")->searchable(),
    		Column::make("email")->searchable(),
    		Column::make("university"),
    		Column::make("hackathons"),
    		Column::make("Linkedin")->format(function(Hacker $model) {
    			return $this->link($model->linkedIn, "Link", "target='_blank'");
    		}),
    		Column::make("Github")->format(function(Hacker $model) {
    			return $this->link($model->github, "Link", "target='_blank'");
    		}),
    		Column::make("size"),
    		Column::make("Stay at night")->format(function(Hacker $model) {
    			return $this->html(($model->stay_at_night) ? "Yes" : "No");
    		}),
    		Column::make("motivation"),
    		Column::make("Image")->format(function(Hacker $model) {
    			return $this->link(url('storage/app')."/".$model->image, "Image", "target='_blank'");
    		}),
    		Column::make("created_at")->sortable(),
            Column::make("Activated")->sortable(),
            Column::make("Actions")->format(function(Hacker $model) {
                 if ($model->activated == false) {
                    return view("livewire.accept-hacker", ["hacker_id" => $model->id]);
                }
            })
    	];
    }

    public function accept($hacker_id) {
        Hacker::findOrFail($hacker_id)->update(["activated" => true]);  
    }
    // public function render() {
    //     return view('livewire.hackers');
    // }
}
