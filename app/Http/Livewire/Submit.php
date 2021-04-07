<?php

namespace App\Http\Livewire;

use App\Models\Hacker;
use App\Models\Submission;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Submit extends Component {
	use WithFileUploads;

	public $showR = false;
	public $search;
	public Collection $hackers;
	public $selected;
	public $team_name;
    public $project_title;
    public $challenge;
	public $description;
	public $video_link;
	public $repo_link;
	public $images = [];
	public $document;
    public $solution_type;
    public $apk;
    public $preview_link;
	protected $rules = [
        'project_title' => 'required|min:1|unique:submissions,project_name',
        'team_name' => 'required|min:1|unique:submissions,team',
        'challenge' => 'required|in:1,2,3,4',
        'description' => 'required|min:150',
        'video_link' => 'required|active_url|url',
        'repo_link' => 'active_url|url'
    ];
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

    public function updatedApk() {
        $this->validate([
            "apk" => "mimes:zip,rar|required|max:100000"
        ]);
    }

    public function updatedPreviewLink() {
        $this->validate([
            "preview_link" => "required"
        ]);
    }

	public function mount() {
		$this->selected = collect([]);
        $this->hackers = collect([]);
	}

	public function updatingSearch() {
		$this->showR = true;
        $this->hackers = Hacker::where("email", "LIKE", "%".$this->search."%")->get()->filter(function($hacker) {
            return (Submission::whereJsonContains("users", $hacker->id)->get()->isEmpty());
        });
	}

    public function render() {
    	if (is_null($this->search) OR empty($this->search) OR $this->search == "") {
			$this->showR = false;
		}
        return view('livewire.submit', ["hackers" => $this->hackers, "selected" => $this->selected]);
    }

    public function addToSelection($id, $fullname, $email, $image) {
    	$this->selected->put($id.$fullname, ["fullname" => $fullname, "email" => $email, "image" => $image, "id" => $id]);
    }

    public function remove($id) {
    	return $this->selected->forget($id);
    }

    public function save() {
        $this->validate();
    }

    public function submit() {
    	$this->validate();
    	$this->validate([
    		"images.*" => "required|image"
    	]);
    	$this->validate([
    		"document" => "mimes:docx,pdf|required"
    	]);
        if ($this->selected->isEmpty()) {
            return false;      
        }
    	$selected = [];
    	foreach($this->selected as $data) {
    		array_push($selected, $data["id"]);
    	}
        if ($this->solution_type == "app") {
            $this->validate([
                "apk" => "mimes:zip,rar|required|max:100000"
            ]);
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
            $this->validate([
                "apk" => "mimes:zip,rar|required|max:100000"
            ]);
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
    	$uniqueUrl = url('/modify')."/".md5(time());
    	$s = Submission::create([
    		"team" => $this->team_name,
    		"description" 		=> 	$this->description,
    		"video_link" 		=> 	$this->video_link,
    		"github_link" 		=> 	$this->repo_link,
    		"users" 			=> 	json_encode($selected),
    		"link"				=>	$uniqueUrl,
            "project_name"      =>  $this->project_title,
            "selected_challenge" => $this->challenge
    	]);
    	$s->document()->create(["path" => $this->document->store('documents')]);
    	foreach($this->images as $image) {
    		$s->images()->create(["path" => $image->store("images")]);
    	}
        if ($this->solution_type == "app") {
            $s->app()->create(["path" => $this->apk->store("apps")]);
        }elseif ($this->solution_type == "web") {
            if (!is_null($this->preview_link) AND !empty($this->preview_link)) {
                $s->webapp()->create(["url" => $this->preview_link]);
            }else {
                $s->webapp()->create(["url" => null]);
            }
        }elseif($this->solution_type == "webmobile") {
            $s->app()->create(["path" => $this->apk->store("apps")]);
            if (!is_null($this->preview_link) AND !empty($this->preview_link)) {
                $s->webapp()->create(["url" => $this->preview_link]);
            }else {
                $s->webapp()->create(["url" => null]);
            }
        }
    	session()->flash('saved', 'Your projet has been successfully submitted.
    		Please insure to save the following link that will allow you to later modify your project if needed. <a target="_blank" href="'.$uniqueUrl.'">'.$uniqueUrl.'</a>');
    }
}
