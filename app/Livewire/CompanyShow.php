<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;

class CompanyShow extends Component
{
    public $company;
    public $name, $email, $website, $logo;
    public $currentLogo;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->name = $company->name;
        $this->email = $company->email;
        $this->website = $company->website;
        $this->currentLogo = $company->logo;
    }

    public function render()
    {
        return view('livewire.company-show');
    }
}
