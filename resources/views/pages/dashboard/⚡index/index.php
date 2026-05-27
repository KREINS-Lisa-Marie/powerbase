<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app')] class extends Component
{
    public $user;
    public $users;
    public $orders_to_finish;
    public $products_low_quantity;
    //public $projects_not_finished;
    public $products_in_stock;
    public $five_latest_orders;
    public $daily_orders;
    public $completed_orders;
    public $today_projects;
    public $today_products;
    public $open_projects;

//tri
    public $sortField = 'created_at';
    public $sortDirection = 'asc';

    protected $queryString =['sortField', 'sortDirection'];

    public function sortBy($field)
    {
        if ($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }else{
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function mount()         //avant de render ( 1x seulement)
    {
        $this->user = Auth::user();
        $this->orders_to_finish = Order::where('order_state', '!=', 'completed')->count();
        $this->products_low_quantity = Product::where('quantity', '<', 5)->count();
        $this->products_in_stock = Product::count();
        $this->five_latest_orders = Order::withCount('orderItems')->latest()->limit(5)->get();
        $this->users = User::all();
        $this->daily_orders = Order::whereDate('created_at',  Carbon::today())->count();
        $this->completed_orders = Order::whereDate('updated_at', Carbon::today())->where( 'order_state', '=', 'completed')->count();

        $this->today_products = Product::whereDate('created_at', Carbon::today())->count();
        $this->today_projects = Project::whereDate('created_at', Carbon::today())->count();
        $this->open_projects = Project::where('project_state', '=', 'open')->count();
    }

    public function render()        //à chaque fois que qqch sur la page change
    {
        $five_orders = Order::withCount('orderItems')->latest()->limit(5)->get(); //ici parce que ça doit rerender à chaque fois que je change de direction
        $this->five_latest_orders =
            $this->sortDirection === 'asc'
            ?$five_orders->sortBy($this->sortField)
                : $five_orders->sortByDesc($this->sortField);

        return view('pages.dashboard.⚡index.index');
    }

};
