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
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Customer">
        <i class="fa fa-users" aria-hidden="true"></i>
        <label>Customer</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
         <li class="{{ Request::is('create/customer') ? 'active' : '' }}">
            <a href="{{route('admin.customer.create')}}">Create Customer</a>
        </li>
		<li class="{{ Request::is('customer') ? 'active' : '' }}">
            <a href="{{route('admin.customer.list')}}">All Customers</a>
        </li>
		<li class="{{ Request::is('customer/active') ? 'active' : '' }}">
            <a href="{{route('admin.active.customer.list')}}">Active Customers</a>
        </li>
		<li class="{{ Request::is('customer/archive') ? 'active' : '' }}">
            <a href="{{route('admin.archive.customer.list')}}">Archived Customers</a>
        </li>
		 
		
    </ul>
</li>
