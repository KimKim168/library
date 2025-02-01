<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Page;
use App\Models\PagePosition;

use Image as ImageClass;

class PageCreate extends Component
{
    use WithFileUploads;

    public $image;
    public $file;

    public $position = null;
    public $name = null;
    public $link = null;
    public $short_description = null;
    public $description = null;
    public $order_index = 0;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => 'file|max:51200', // 2MB Max
        ]);

        session()->flash('success', 'file successfully uploaded!');
    }

    public function updated()
    {
        $this->dispatch('livewire:updated');
    }


    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'file' => 'nullable|file|max:51200',
            'position' => 'required',
            'link' => 'nullable',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'order_index' => 'nullable',
        ]);

        $validated['create_by_user_id'] = request()->user()->id;

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        if (!empty($this->image)) {
            // $filename = time() . '_' . $this->image->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->image->getClientOriginalExtension();

            $pages_path = public_path('assets/images/pages/' . $filename);
            $pages_thumb_path = public_path('assets/images/pages/thumb/' . $filename);
            $imageUpload = ImageClass::make($this->image->getRealPath())->save($pages_path);
            $imageUpload->resize(512, null, function ($resize) {
                $resize->aspectRatio();
            })->save($pages_thumb_path);
            $validated['image'] = $filename;
        }

        if (!empty($this->file)) {
            // $filename = time() . '_' . $this->file->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('pages', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;
        }

        $createdImage = Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Successfully uploaded!');
    }

    public function render()
    {
        $positions = PagePosition::latest()->get();

        return view('livewire.page-create', [
            'positions' => $positions,
        ]);
    }
}
