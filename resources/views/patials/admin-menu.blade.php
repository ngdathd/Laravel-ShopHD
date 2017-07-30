<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active"><a href="{{url('admin')}}">
                <svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg>
                Dashboard</a></li>
        <li><a href="{{url('admin/category')}}">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Category</a></li>
        <li><a href="{{url('admin/product')}}">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Product</a></li>
        <li><a href="{{url('admin/user')}}">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                User</a></li>
        <li><a href="{{url('admin/order')}}">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Order</a></li>
        <li><a href="{{url('admin/login')}}">
                <svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg>
                Login Page</a></li>
    </ul>
</div><!--/.sidebar-->
