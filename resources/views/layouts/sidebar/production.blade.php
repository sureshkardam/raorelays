<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Orders">
        <i class="fa fa-first-order" aria-hidden="true"></i>
        <label>Order</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        
		<li class="{{ Request::is('order/create') ? 'active' : '' }}">
            <a href="{{route('admin.order.create')}}">Create Order</a>
        </li>
		
		<li class="{{ Request::is('order/list') ? 'active' : '' }}">
            <a href="{{route('admin.order.list')}}">Order List</a>
        </li>
		 
		
    </ul>
</li>



