<?php

namespace Luanardev\LivewireUI;
use Luanardev\LivewireAlert\WithLivewireAlert;
use Livewire\Component;

abstract class LivewireUI extends Component
{
    use WithLivewireAlert;

    public $viewBag;
    public bool $createMode = false;
    public bool $editMode = false;
    public bool $browseMode = true;

    public function __construct()
    {
        $this->viewBag = collect();
    }

    public function with($key, $value)
    {
        $this->viewBag->put($key, $value);
        return $this;
    }

    public function getData($key)
    {
        return $this->viewBag->get($key);
    }

    public function viewBag()
    {
        return $this->viewBag;
    }

    public function emitRefresh()
    {
        $this->emit('refresh');
        return $this;
    }

    public function emitHideModal()
    {
        $this->emit('hideModal');
        return $this;
    }

    public function getListeners()
    {
        return [
            'refresh' => '$refresh',
            'alert' => 'alert',
            'toastr' => 'toastr'
        ];
    }

    public function creating()
    {
        return $this->createMode;
    }

    public function editing()
    {
        return $this->editMode;
    }

    public function browsing()
    {
        return $this->createMode;
    }

    public function createMode()
    {
        $this->createMode = true;
        $this->editMode = false;
        $this->browseMode = false;
        return $this;
    }

    public function editMode()
    {
        $this->editMode = true;
        $this->createMode = false;
        $this->browseMode = false;
        return $this;
    }

    public function browseMode()
    {
        $this->browseMode = true;
        $this->editMode = false;
        $this->createMode = false;
        return $this;
    }


}
