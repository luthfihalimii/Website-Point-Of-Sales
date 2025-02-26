<?php

namespace App\Livewire;

use Livewire\Component;

class ScannerModalComponent extends Component
{
    public $isScannerOpen = false;

    public function mount()
    {
        $this->isScannerOpen = false;
    }

    public function toggleScanner()
    {
        $this->isScannerOpen = !$this->isScannerOpen;
    }
    public function render()
    {
        return view('livewire.scanner-modal-component');
    }
}
