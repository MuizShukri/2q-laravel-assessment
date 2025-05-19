<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CompanyCreate extends Component
{
    use WithFileUploads;

    public $name, $email, $logo, $website;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:companies,email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'website' => 'nullable|url|unique:companies,website',
        ];
    }

    public function updatedLogo()
    {
        // Check if the uploaded logo is at least 100x100 pixels
        if ($this->logo) {
            $image = getimagesize($this->logo->getRealPath());
            if ($image[0] < 100 || $image[1] < 100) {
                $this->addError('logo', 'Logo must be at least 100x100 pixels.');
            }
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->logo) {
            // Check if the uploaded logo is at least 100x100 pixels
            $image = getimagesize($this->logo->getRealPath());
            if ($image[0] < 100 || $image[1] < 100) {
                $this->addError('logo', 'Logo must be at least 100x100 pixels.');
                return;
            }
        }

        // Upload the logo
        $path = $this->logo ? $this->logo->store('logos', 'public') : null;

        Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'logo' => $path,
            'website' => $this->website,
        ]);

        session()->flash('message', 'Company created successfully.');
        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.company-create');
    }
}
