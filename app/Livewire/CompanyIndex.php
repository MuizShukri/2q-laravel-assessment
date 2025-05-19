<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;

class CompanyIndex extends Component
{
    public $companies;

    public function mount()
    {
        // Get all companies
        $this->companies = Company::latest()->get();
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        // Delete the logo
        if ($company->logo && \Storage::disk('public')->exists($company->logo)) {
            \Storage::disk('public')->delete($company->logo);
        }
        
        $company->delete();

        session()->flash('message', 'Company deleted successfully.');

        $this->companies = Company::latest()->get(); // Refresh
    }

    public function render()
    {
        return view('livewire.company-index');
    }
}