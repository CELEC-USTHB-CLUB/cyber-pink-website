<?php

namespace App\Http\Livewire;

use App\Models\Hacker;
use App\Models\Submission;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Submits extends TableComponent {
	use HtmlComponents;

	public $loadingIndicator = true;
	public $exports = ["xlsx"];

    public function query() : Builder {
        return Submission::whereRaw("1 = 1");
    }

    public function columns() : array {
    	return [
    		Column::make("ID")->sortable(),
    		Column::make("Team")->searchable(),
    		Column::make("Project name")->searchable(),
    		Column::make("hackers")->format(function(Submission $model) {
    			$html = "<ul>";
    			foreach($model->users as $userId) {
    				$html .= "<li>".Hacker::findOrFail($userId)->email."</li>";
    			}
    			$html .="</ul>";
    			return $this->html($html);
    		})->exportFormat(function(Submission $model) {
    			$emails = null;
    			foreach (Hacker::findOrFail($model->users)->pluck("email") as $email) {
    				$emails .= $email."\n";
    			}
    			return $emails;
    		}),
    		Column::make("Description"),
    		Column::make("Video link")->format(function(Submission $model) {
    			return $this->link($model->video_link);
    		}),
    		Column::make("Github link")->format(function(Submission $model) {
    			return $this->link($model->github_link);
    		}),
    		Column::make("Images")->format(function(Submission $model) {
    			$html = "";
    			foreach($model->images as $x => $image) {
    				$html .= "<a href=".url('storage/app')."/".$image->path.">".($x+1)."</a> / ";
    			}
    			return $this->html($html);
    		})->exportFormat(function(Submission $model) {
    			$html = "";
    			foreach($model->images as $x => $image) {
    				$html .= url('storage/app')."/".$image->path."\n";
    			}
    			return $html;
    		}),
    		Column::make("Attached files")->format(function(Submission $model) {
    			$html = "";
    			$html .= "<a href=".url('storage/app')."/".$model->document->path.">Download</a>";
    			return $this->html($html);
    		})->exportFormat(function(Submission $model) {
    			return url('storage/app')."/".$model->document->path;
    		}),
    		Column::make("Solution type")->format(function(Submission $model) {
    			if($model->app()->exists()) {
		            if ($model->webapp()->exists()) {
		                $st = "web + mobile";
		            }else {
		                $st = "App";
		            }
		        }elseif($model->webapp()->exists()) {
		            $st = "web";
		        }else {
		            $st = "other";
		        }
		        return $st;
    		}),
    		Column::make("Download APK")->format(function(Submission $model) {
    			$url = null;
    			if($model->app()->exists()) {
    				$url = $model->app->path;
		        }
		        if ($url !== null) {
		        	return $this->link(url('storage/app')."/".$url);
		        }
		        return "NO APK";
    		}),
    		Column::make("Preview link")->format(function(Submission $model) {
    			$url = null;
    			if($model->webapp()->exists()) {
    				$url = $model->webapp->url;
		        }
		        if ($url !== null) {
		        	return $this->link($url);
		        }
		        return "NO LINK";
    		}),
    		Column::make("Challenge")->format(function(Submission $model) {
    			$challenge = null;
    			if ($model->selected_challenge == 1) {
    				$challenge = "Improving people’s healthcare quality";
    			}elseif($model->selected_challenge == 2) {
    				$challenge = "Easy access tools for reporting violence";
    			}elseif($model->selected_challenge == 3){
    				$challenge = "Aiding platforms for people in need";
    			}elseif($model->selected_challenge == 4) {
    				$challenge = "Improving Teacher-Parent communication in education";
    			}
    			return $challenge;
    		}),
    		Column::make("Created at"),
    	];
    }
}
