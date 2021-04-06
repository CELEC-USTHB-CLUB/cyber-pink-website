<?php

namespace App\Http\Livewire;

use App\Models\Hacker;
use Livewire\Component;

class AcceptHacker extends Component {

	public $hackerid;

	public function mount(Hacker $hacker) {
		$this->hackerid = $hacker->id;
	}

    public function render()
    {
        return view('livewire.accept-hacker');
    }
}
