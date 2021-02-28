<?php

namespace App\Http\Livewire;

use App\Models\Orders;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\Traits\Pagination;

class OrdersTable extends Component
{
    use Pagination;
    //protected $paginationTheme = 'bootstrap';

    public $from;
    public $to;
    public $order_number;
    public $parent_mobile;

    protected  $my_order = [];
    public $per_page = 10;


    public function mount()
    {
        $this->my_order = Orders::paginate($this->per_page);
    }

    public function render()
    {
       // $this->my_order = Orders::paginate(10);
        return view('livewire.orders-table', [
            'orders' => $this->my_order,
        ]);
    }
    public function filter(){
        if(!empty($this->from) && !empty($this->to) && !empty($this->order_number) && !empty($this->parent_mobile)  ){

            $this->my_order = Orders::whereBetween('created_at',[$this->from, $this->to])
            ->Where('order_number', 'LIKE', "%{$this->order_number}%")
            ->Where('parent_mobile', 'LIKE', "%{$this->parent_mobile}%")
            ->paginate($this->per_page);

        }elseif(!empty($this->from) && !empty($this->to) && !empty($this->order_number) ){

            $this->my_order = Orders::whereBetween('created_at',[$this->from, $this->to])
            ->Where('order_number', 'LIKE', "%{$this->order_number}%")
            ->paginate($this->per_page);

        }elseif(!empty($this->from) && !empty($this->to) && !empty($this->parent_mobile) ){

            $this->my_order = Orders::whereBetween('created_at',[$this->from, $this->to])
            ->Where('parent_mobile', 'LIKE', "%{$this->parent_mobile}%")
            ->paginate($this->per_page);

        }elseif(!empty($this->from) && !empty($this->to) ){

            $this->my_order = Orders::whereBetween('created_at',[$this->from, $this->to])
            ->paginate($this->per_page);

        }elseif(!empty($this->order_number) ){

            $this->my_order = Orders::Where('order_number', 'LIKE', "%{$this->order_number}%")
            ->paginate($this->per_page);

        }elseif(!empty($this->parent_mobile) ){

            $this->my_order = Orders::Where('parent_mobile', 'LIKE', "%{$this->parent_mobile}%")
            ->paginate($this->per_page);

        }else{

            $this->my_order = Orders::paginate($this->per_page);
        }

    }



}
