<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products, $name, $price, $product_id;
    public $updateMode = false;

    private function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }


    public function create()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $this->price = str_replace(",", ".", $this->price);

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->resetInputFields();
        $this->dispatch('saved', ['message'=>'Operação realizada com sucesso.','price'=>$this->price]);
        //session()->flash('message', 'Produto criado com sucesso.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->price = $product->price;

        $this->updateMode = true;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($this->product_id);
        $product->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Produto atualizado com sucesso.');
        $this->resetInputFields();
    }


    public function delete($id)
    {
        if($id){
            Product::find($id)->delete();
            session()->flash('message', 'Produto deletado com sucesso.');
        }
    }


    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

}
