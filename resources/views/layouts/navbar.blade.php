<div class="nav-item">
    <div class="container">
        {{-- <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>All departments</span>
                <ul class="depart-hover">

                    @foreach ($departaments as $departament)
                        <li>
                            <a href="{{ route('products.show', $departament->id) }}">
                    {{ $departament->nombre }}
                    </a>
                    </li>
                    @endforeach

                    <li class="active"><a href="#">Women’s Clothing</a></li>
                    <li><a href="#">Men’s Clothing</a></li>
                    <li><a href="#">Underwear</a></li>
                    <li><a href="#">Kid's Clothing</a></li>
                    <li><a href="#">Brand Fashion</a></li>
                    <li><a href="#">Accessories/Shoes</a></li>
                    <li><a href="#">Luxury Brands</a></li>
                    <li><a href="#">Brand Outdoor Apparel</a></li>
                </ul>
            </div>
        </div> --}}
        <nav class="nav-menu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/collection') }}">Collection</a></li>
                <li><a href="#">Shopping Cart</a>
                    {{-- <ul class="dropdown"> --}}
                        {{-- <li><a href="#">Shopping Cart</a></li> --}}
                        {{-- <li><a href="#">Faq</a></li> --}}
                    </ul>
                </li>
                @if (\Gate::allows('Administrador'))
                    <li> <a href="{{ route('order.index') }}">Orders</a></li>
                    <li><a href="#">Settings</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('departament.index') }}">Departament</a></li>
                            <li><a href="{{ route('category.index') }}">Category</a></li>
                            <li><a href="{{ route('product.index') }}">Product</a></li>
                            <li><a href="{{ url('/file') }}">File</a></li>
                        </ul>
                    </li>
                @endif 
            </ul>
        </nav>
    </div>
</div>
