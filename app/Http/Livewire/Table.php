<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $searchTerm;
    public $perPage;

    protected $listeners = [
        'updatedSearchTerm' => 'updateContactsWithFilter',
        'perPageUpdated' => 'updateContactsWithNewPaginationCount',
    ];

    public function mount()
    {
        $this->searchTerm = '';
        $this->perPage = 10;
    }

    public function updateContactsWithFilter($searchTerm)
    {
        $this->searchTerm = $searchTerm;
        $this->resetPage();
    }

    public function updateContactsWithNewPaginationCount($perPage)
    {
        $this->perPage = $perPage;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.table', [
            'contacts' => Contact::query()
                ->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                ->paginate($this->perPage),
        ]);
    }
}
