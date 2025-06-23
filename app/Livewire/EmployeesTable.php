<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        $items = Employee::with(['grade', 'position'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nama_pegawai', 'like', '%' . $this->search . '%')
                        ->orWhere('nip', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(10);

        return view('livewire.employees-table', compact('items'));
    }
}
