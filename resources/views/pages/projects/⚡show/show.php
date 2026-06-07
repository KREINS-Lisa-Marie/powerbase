<?php

use App\Models\Project;
use Livewire\Component;

new class extends Component
{
    public $project_id;


    public function mount(Project $project)         //avant de render ( 1x seulement)
    {
        $this->project_id = $project->id;
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $project = Project::findOrFail($this->project_id);
        $user = \App\Models\User::findOrFail($project->user_id);
        $orders = $project->orders;

        $project_products= [];          //tous les produits/orderitems de tous les commandes

        foreach ($orders as $order){
            foreach ($order->orderItems as $product){
                $project_products[] = $product;     //tous les orderitems de tous les commandes
            }
        }


        $products = [];

        foreach ($project_products as $project_product){
            $product_id = $project_product->product_id;

            if (!isset($products[$product_id])){        // si  le produit n'est pas défini, alors je le mets dans $products et je mets la qt à 0
                $products[$product_id] = [
                    'product'=>$project_product->product,       //marche parce que $project_product c'est un  OrderItem
                    'product_qt'=>'0',
                ];
            }
//sinon je continue ici
            $products[$product_id]['product_qt'] = $products[$product_id]['product_qt'] + $project_product->quantity;
        }



        //trier par alphabete
        $product_names=[];      //nouvel tableau pour faire le tri (avec noms)
        foreach ($products as $key=>$item){
            $product_names[$key] = $item['product']->product_name;          //productname de Product
        }
        asort($product_names);

        $sorted = [];       //nouvel tableau pour finir le tri
        foreach ($product_names as $key=>$item){
            $sorted[] = $products[$key];        //la on ajoute les produits dans le bon ordre
        }


        return view('pages.projects.⚡show.show', [
            'products' => $sorted, 'user' => $user, 'project' => $project
        ]);
    }

    // Asort parce que c'est un Associative array
    //les autres c'est pour non associativ ou selon index (selon Stackoverflow)

};
