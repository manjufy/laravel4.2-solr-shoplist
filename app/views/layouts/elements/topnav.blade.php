<div class="masthead">
    <h3 class="text-primary">Store</h3>
    <nav>
        <ul class="nav nav-justified">
            <li <?php echo isset($i_active) ? $i_active : ''; ?>><a href="{{ URL::to('/')}}">Home</a></li>
            <li <?php echo isset($s_active) ? $s_active : ''; ?>><a href="{{ URL::to('store/all')}}">All Store Listing</a></li>
            <li <?php echo isset($n_active) ? $n_active : ''; ?>><a href="{{ URL::to('store/nearbyme') }}">Stores Near By Me</a></li>
            <li <?php echo isset($a_active) ? $a_active : ''; ?>><a href="{{ URL::to('aboutus') }}">About Us</a></li>
            <li <?php echo isset($c_active) ? $c_active  : ''; ?>><a href="{{ URL::to('contactus') }}">Contact Us</a></li>
        </ul>
    </nav>
</div>
