<?php

namespace App\Livewire\Admin\Category;

use pagination;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $debug = true;
    public $category_id;

    public function deleteCategory($category_id)
    {
        // dd($category_id);
        $this->category_id = $category_id;
    }
    public function destroyCategory()
    {
        // dd('Destroying category with ID: ' . $this->category_id);
        $category = Category::find($this->category_id);
        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('message', 'Category Deleted');
        $this->dispatchBrowserEvent('close-model');
    }
    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
