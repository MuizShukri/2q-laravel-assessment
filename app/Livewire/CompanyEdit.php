<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyEdit extends Component
{
    use WithFileUploads;

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

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:companies,email,' . $this->company->id,
            'website' => 'nullable|url|unique:companies,website,' . $this->company->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function updatedLogo()
    {
        // Check if the uploaded logo is at least 100x100 pixels
        if ($this->logo) {
            $image = getimagesize($this->logo->getRealPath());
            if ($image[0] < 100 || $image[1] < 100) {
                $this->addError('logo', 'Logo must be at least 100x100 pixels.');
            } else {
                $this->resetErrorBag('logo');
            }
        }
    }

    public function update()
    {
        $this->validate();

        if ($this->logo) {
            // Check if the uploaded logo is at least 100x100 pixels
            $image = getimagesize($this->logo->getRealPath());
            if ($image[0] < 100 || $image[1] < 100) {
                $this->addError('logo', 'Logo must be at least 100x100 pixels.');
                return;
            }
            // Delete the old logo
            if ($this->currentLogo && Storage::disk('public')->exists($this->currentLogo)) {
                Storage::disk('public')->delete($this->currentLogo);
            }
            // Upload the new logo
            $this->currentLogo = $this->logo->store('logos', 'public');
        }

        $this->company->update([
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
            'logo' => $this->currentLogo,
        ]);

        session()->flash('message', 'Company updated successfully.');

        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.company-edit');
    }
}