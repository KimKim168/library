<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WebsiteInfo;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WebsiteInfoEdit extends Component
{
    use WithFileUploads;

    public $image;
    public $banner;
    public $banner_academy;
    public $banner_support;

    public $item;
    public $name;
    public $name_kh;
    public $primary;
    public $primary_hover;
    public $banner_color;
    public $show_bg_menu;
    public $pdf_viewer_default;
    public $show_download_button;
    public $check_ip_range;
    public $ip_range;

    public $description;
    public $description_kh;

    public function mount(WebsiteInfo $item)
    {
        $this->item = $item;
        $this->name = $item->name;
        $this->name_kh = $item->name_kh;
        $this->primary = $item->primary;
        $this->primary_hover = $item->primary_hover;
        $this->banner_color = $item->banner_color;
        $this->ip_range = $item->ip_range;
        $this->show_bg_menu = (bool) $item->show_bg_menu;
        $this->pdf_viewer_default = (bool) $item->pdf_viewer_default;
        $this->show_download_button = (bool) $item->show_download_button;
        $this->check_ip_range = (bool) $item->check_ip_range;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|mimes:png|max:2048',
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    public function updatedBanner()
    {
        $this->validate([
            'banner' => 'image|max:2048',
        ]);

        session()->flash('success', 'Banner successfully uploaded!');
    }

    public function updatedBannerAcademy()
    {
        $this->validate([
            'banner_academy' => 'image|max:2048',
        ]);

        session()->flash('success', 'Academy banner successfully uploaded!');
    }

    public function updatedBannerSupport()
    {
        $this->validate([
            'banner_support' => 'image|max:2048',
        ]);

        session()->flash('success', 'Support banner successfully uploaded!');
    }

    private function processAndSaveImage($file, $filename, $width, $height)
    {
        $path = public_path("assets/images/website_infos/{$filename}");
        Image::make($file->getRealPath())->fit($width, $height)->save($path, 80);
        return $filename;
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'primary' => 'required|max:255',
            'primary_hover' => 'required|max:255',
            'banner_color' => 'required|max:255',
            'ip_range' => 'nullable|max:500',
            'show_bg_menu' => 'required|boolean',
            'pdf_viewer_default' => 'required|boolean',
            'show_download_button' => 'required|boolean',
            'check_ip_range' => 'required|boolean',
        ]);

        if (!empty($this->image)) {
            File::delete(public_path('assets/images/website_infos/logo.png'));
            File::delete(public_path('assets/images/website_infos/logo192.png'));

            $validated['image'] = $this->processAndSaveImage($this->image, 'logo.png', 512, 512);
            $this->processAndSaveImage($this->image, 'logo192.png', 192, 192);
        }

        if (!empty($this->banner)) {
            $old_path = public_path('assets/images/website_infos/' . $this->item->banner);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            $filename = time() . '_' . Str::random(10) . '.' . $this->banner->getClientOriginalExtension();
            $validated['banner'] = $this->processAndSaveImage($this->banner, $filename, 1600, 300);
        }

        if (!empty($this->banner_academy)) {
            $old_path = public_path('assets/images/website_infos/' . $this->item->banner_academy);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            $filename = time() . '_' . Str::random(10) . '.' . $this->banner_academy->getClientOriginalExtension();
            $validated['banner_academy'] = $this->processAndSaveImage($this->banner_academy, $filename, 1600, 300);
        }

        if (!empty($this->banner_support)) {
            $old_path = public_path('assets/images/website_infos/' . $this->item->banner_support);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            $filename = time() . '_' . Str::random(10) . '.' . $this->banner_support->getClientOriginalExtension();
            $validated['banner_support'] = $this->processAndSaveImage($this->banner_support, $filename,1600, 300);
        }

        $this->item->update($validated);

        session()->flash('success', 'Info updated successfully!');

        return redirect('admin/settings/website_infos/1/edit');


    }

    public function render()
    {
        return view('livewire.website-info-edit');
    }
}