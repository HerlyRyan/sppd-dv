<?php

namespace App\Livewire;

use App\Models\Sppd;
use Livewire\Component;
use Livewire\WithPagination;

class SppdTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $items = Sppd::paginate();

        return view('livewire.sppd-table', compact('items'));
    }
}
