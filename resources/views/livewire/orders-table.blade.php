<div class="container">
    <div class="row">
        <div class="col-md-12 py-5">
            <form wire:submit.prevent="filter" >
                <div class="row">
                    <div class="mt-3 col-md-6 d-inline-block">
                        <label for="">Order Number</label>
                        <input type="text" wire:model.defer="order_number" class=" form-control">
                    </div>
                    <div class="mt-3 col-md-6  d-inline-block">
                        <label for="">Phone</label>
                        <input type="text" wire:model.defer="parent_mobile" class=" form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-md-6 d-inline-block">
                        <label for="">Date From</label>
                        <input type="date" class=" form-control" wire:model.defer="from" placeholder="from">
                    </div>
                    <div class="mt-3 col-md-6  d-inline-block">
                        <label for="">Date To</label>
                        <input type="date" class=" form-control"  wire:model.defer="to">
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 col-md-12">
                        <button class="btn btn-primary">Search</button>
                    </div>
                    <!-- /.mt-3 col-md-12 -->
                </div>

            </form>
        </div>
        <!-- /.col-md-12 -->
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th>Order Number</th>
                    <th>Parent Mobile</th>
                    <th>Student</th>
                    <th>Price</th>
                </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            {{$order->order_number}}
                        </td>
                        <td>
                            {{$order->parent_mobile}}
                        </td>
                        <td>
                            {{$order->student}}
                        </td>
                        <td>
                            {{$order->price}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.col-md-12 -->

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            @if ($orders->links())
                {{$orders->links()}}
            @endif

        </div>
    </div>
    <!-- /.row -->

</div>
