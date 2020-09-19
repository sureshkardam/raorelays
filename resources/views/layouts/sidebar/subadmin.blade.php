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




<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Catalog"><i class="fa fa-folder" aria-hidden="true"></i>
      
        <label>Product Catalog</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('product') ? 'active' : '' }}"><a href="{{route('admin.product.list')}}">Products</a></li>
       <!--<li class="{{ Request::is('attribute') ? 'active' : '' }}"><a id="attribute-list" href="{{route('admin.attribute.list')}}">Attributes</a></li>-->
        <!--<li class="{{ Request::is('category') ? 'active' : '' }}"><a href="{{route('admin.category.list')}}">Categories</a></li>
        <li class="{{ Request::is('option') ? 'active' : '' }}"><a href="{{route('admin.option.list')}}">Options</a></li>-->
        
    </ul>
</li>



<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Material Catalog"><i class="fa fa-archive" aria-hidden="true"></i>
      
        <label>Material Catalog</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        <li class="{{ Request::is('material/product') ? 'active' : '' }}"><a href="{{route('admin.material.product.list')}}">Material Products</a></li>
       <!--<li class="{{ Request::is('attribute') ? 'active' : '' }}"><a id="attribute-list" href="{{route('admin.attribute.list')}}">Attributes</a></li>-->
        <li class="{{ Request::is('material/category') ? 'active' : '' }}"><a href="{{route('admin.material.category.list')}}">Material Categories</a></li>
        <li class="{{ Request::is('material/option') ? 'active' : '' }}"><a href="{{route('admin.material.option.list')}}">Material Options</a></li>
        
    </ul>
</li>










<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Manage Company">
        <i class="fa fa-building" aria-hidden="true"></i>
        <label>Company</label>
        <span class="fa fa-plus"></span>
    </a>
    <ul class="dropdown-menu">
       
        <li class="{{ Request::is('company') ? 'active' : '' }}">
            <a href="{{route('admin.company.list')}}">Company List</a>
        </li>
		<li class="{{ Request::is('plant') ? 'active' : '' }}">
            <a href="{{route('admin.plant.list')}}">Plant List</a>
        </li>
		 
		
    </ul>
</li>









<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Activity Log"><i class="fa fa-list" aria-hidden="true"></i>
        <label>Activity Log</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        
       
        <li class="{{ Request::is('user/activity/list') ? 'active' : '' }}"><a href="{{route('user.activity.list')}}">User Log</a></li>
		
		<li class="{{ Request::is('product/activity/list') ? 'active' : '' }}"><a href="{{route('product.activity.list')}}">Product Log</a></li>
		
		
		<li class="{{ Request::is('order/activity/list') ? 'active' : '' }}"><a href="{{route('order.activity.list')}}">Order Log</a></li>
        
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Setting"><i class="fa fa-cog" aria-hidden="true"></i>
        <label>Settings</label> <span class="fa fa-plus"></span> </a>
    <ul class="dropdown-menu">
        
       
        <li class="{{ Request::is('order/status/list') ? 'active' : '' }}"><a href="{{route('order.status.list')}}">Order Status</a></li>
        
    </ul>
</li>



