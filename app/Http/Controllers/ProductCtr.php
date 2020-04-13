<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProductCtr extends Controller
{
    private $products = ['TV', 'Smartphone', 'Tablet'];

    public function index(){
        echo "<h1>Produtos</h1>";
        foreach($this->products as $p){
            echo "<p>{$p}</p>";
        }
    }

    public function addProduct($product){
        $this->products[] = $product; //..adiciona um produto
        $this->index(); //..executa o index
    }
}
