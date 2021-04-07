<?php

namespace App\Http\Livewire;

use App\Models\Hacker;
use App\Models\Image;
use App\Models\Submission;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Modify extends Component {
	use WithFileUploads;

	public Submission $submission;

	public $showR = false;
	public $search;
	public Collection $hackers;
	public $selected;
	public $team_name;
    public $project_name;
    public $selected_challenge;
    public $challenge;
	public $description;
	public $video_link;
	public $repo_link;
	public $images = [];
	public $document;
    public $solution_type;
    public $oldSolutionType;
    public $apk;
    public $preview_link;

	protected function rules() {
		return [
	        'team_name' => 'required|min:1|unique:submissions,team,'.$this->submission->id,
	        'description' => 'required|min:150',
	        'video_link' => 'required|active_url|url',
	        'repo_link' => 'active_url|url',
	    ];
	}

	public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function updatedImages() {
    	$this->validate([
    		"images.*" => "required|image"
    	]);
    }

    public function updatedDocument() {
    	$this->validate([
    		"document" => "mimes:docx,pdf|required"
    	]);
    } 

	public function mount(string $link) {
		$this->submission 		= 	Submission::with("app", "webapp", "images", "document")->whereLink($link)->firstOrFail();
		$this->team_name 		= 	$this->submission->team;
        $this->project_name        =   $this->submission->project_name;
        $this->challenge        =   $this->submission->selected_challenge;
		$this->description 		= 	$this->submission->description;
		$this->video_link 		= 	$this->submission->video_link;
		$this->repo_link 		= 	$this->submission->github_link;
        if($this->submission->app()->exists()) {
            if ($this->submission->webapp()->exists()) {
                $this->solution_type    =   "webmobile";
                if(!is_null($this->submission->webapp->url)) {
                    $this->preview_link = $this->submission->webapp->url;
                }
            }else {
                $this->solution_type = "app";
            }
        }elseif($this->submission->webapp()->exists()) {
            $this->solution_type = "web";
            if(!is_null($this->submission->webapp->url)) {
                $this->preview_link = $this->submission->webapp->url;
            }
        }else {
            $this->solution_type = "other";
        }
		$users 					= 	($this->submission->users);
		$this->selected 		= 	collect([]);
		foreach($users as $user) {
			$hacker = Hacker::findOrFail($user);
			$this->selected->put($hacker->id.$hacker->fullname, ["fullname" => $hacker->fullname, "email" => $hacker->email, "image" => $hacker->image, "id" => $hacker->id]);
		}
		if (is_null($this->search) OR empty($this->search) OR $this->search == "") {
			$this->showR = false;
		}
	}

	public function remove($id) {
    	return $this->selected->forget($id);
    }

    public function updatingSearch() {
        $this->showR = true;
        $this->hackers = Hacker::where("email", "LIKE", "%".$this->search."%")->get()->filter(function($hacker) {
            return (Submission::whereJsonContains("users", $hacker->id)->get()->isEmpty());
        });
    }

	public function addToSelection($id, $fullname, $email, $image) {
    	$this->selected->put($id.$fullname, ["fullname" => $fullname, "email" => $email, "image" => $image, "id" => $id]);
    }

    public function render() {
    	if (is_null($this->search) OR empty($this->search) OR $this->search == "") {
			$this->showR = false;
		}
        $this->oldSolutionType = $this->solution_type;
        return view('livewire.modify');
    }

    public function deleteImage(int $id) {
    	$this->submission->images()->findOrFail($id)->delete();
    	$this->submission->refresh();
    }

     public function submit() {
     	$this->validate();
     	if(!empty($this->images)) {
     		$this->validate([
	    		"images.*" => "required|image"
	    	]);
     	}
     	if (!empty($this->document)) {
     		$this->validate([
	    		"document" => "mimes:docx,pdf|required"
	    	]);
     	}
     	if ($this->selected->isEmpty()) {
            return false;      
        }
     	$selected = [];
    	foreach($this->selected as $data) {
    		array_push($selected, $data["id"]);
    	}
        if ($this->solution_type == "app") {
            if (!$this->submission->app()->exists()) {
                $this->validate([
                    "apk" => "mimes:zip,rar|required|max:100000"
                ]);
            }
        }elseif ($this->solution_type == "web") {
            if (is_null($this->preview_link) OR empty($this->preview_link)) {
                $this->validate([
                    "repo_link" => "required|url|active_url"
                ]);
            }else {
                $this->validate([
                    "preview_link" => "required|url|active_url"
                ]);
            }
        }elseif ($this->solution_type == "webmobile") {
            if (!$this->submission->app()->exists()) {
                $this->validate([
                    "apk" => "mimes:zip,rar|required|max:100000"
                ]);
            }
            if (is_null($this->preview_link) OR empty($this->preview_link)) {
                $this->validate([
                    "repo_link" => "required|url|active_url"
                ]);
            }else {
                $this->validate([
                    "preview_link" => "required|url|active_url"
                ]);
            }
        }elseif ($this->solution_type !== "other") {
            return false;
        }
    	$this->submission->update([
    		"team" => $this->team_name,
    		"description" 		=> 	$this->description,
    		"video_link" 		=> 	$this->video_link,
    		"github_link" 		=> 	$this->repo_link,
    		"users" 			=> 	json_encode($selected),
    	]);
    	if (!empty($this->document)) {
    		$this->submission->document()->delete();
    		$this->submission->document()->create(["path" => $this->document->store('documents')]);
    	}
    	if (!empty($this->images)) {
    		foreach($this->images as $image) {
	    		$this->submission->images()->create(["path" => $image->store("images")]);
	    	}
    	}
        if ($this->solution_type == "app") {
            if ($this->submission->app()->exists()) {
                if (!is_null($this->apk)) {
                    $this->submission->app()->update(["path" => $this->apk->store("apps")]);
                }
            }else {
                $this->submission->app()->create(["path" => $this->apk->store("apps")]);
            }
            if ($this->submission->webapp()->exists()) {
                $this->submission->webapp()->delete();
            }
        }elseif ($this->solution_type == "web") {
            if ($this->submission->app()->exists()) {
                $this->submission->app()->delete();
            }
            if (!is_null($this->preview_link) AND !empty($this->preview_link)) {
                if ($this->submission->webapp()->exists()) {
                    $this->submission->webapp()->update(["url" => $this->preview_link]);
                }else {
                    $this->submission->webapp()->create(["url" => $this->preview_link]);
                }
            }else {
                if ($this->submission->webapp()->exists()) {
                    $this->submission->webapp()->update(["url" => null]);
                }else {
                    $this->submission->webapp()->create(["url" => null]);
                }
            }
        }elseif($this->solution_type == "webmobile") {
            if ($this->submission->app()->exists()) {
                if (!is_null($this->apk)) {
                    $this->submission->app()->update(["path" => $this->apk->store("apps")]);
                }
            }else {
                $this->submission->app()->create(["path" => $this->apk->store("apps")]);
            }
            if (!is_null($this->preview_link) AND !empty($this->preview_link)) {
                if ($this->submission->webapp()->exists()) {
                    $this->submission->webapp()->update(["url" => $this->preview_link]);
                }else {
                    $this->submission->webapp()->create(["url" => $this->preview_link]);
                }
            }else {
                if ($this->submission->webapp()->exists()) {
                    $this->submission->webapp()->update(["url" => null]);
                }else {
                    $this->submission->webapp()->create(["url" => null]);
                }
            }
        }elseif ($this->solution_type == "other") {
            if ($this->submission->webapp()->exists()) {
                $this->submission->webapp()->delete();
            }
            if ($this->submission->app()->exists()) {
                $this->submission->app()->delete();
            }
        }else {
            return false;
        }
    	$this->images = [];
    	$this->document = null;
    	$this->submission->refresh();
    	session()->flash('saved', 'Your submission has been successfully updated !');
     }
}
