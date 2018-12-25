<div class="icon">
    <a href=""><i class="fas fa-shopping-cart"></i></a>
    <span class="number">{{ Cart::getContent()->count() }}</span>
</div>
<div class="dropdown course-list-dropdown corner-triangle top-right">
    <div class="list-wrapper">
        <div class="item-list">
            <ul>
                @foreach(Cart::getContent() as $cart)
                    <li>
                        <div class="item clearfix">
                            <div class="item-image">
                                <a href="">
                                    <img src="{{ asset('images/learning.jpg') }}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="item-details">
                                <a href="{{ route('course_detail', $cart->id) }}">
                                    <div class="course-name">{{ $cart->name }}</div>
                                    {{--<div class="instructor-name">first_name last_name</div>--}}
                                    <div class="item-price">
                                        <span class="current-price">${{ $cart->price }}</span>
                                        {{--<span class="original-price">$300</span>--}}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="dropdown-footer">
            <div class="cart-total-price clearfix">
                <span>Total:</span>
                <div class="float-right">
                    <span class="current-price">${{ Cart::getTotal() }}</span>
                </div>
            </div>
            <a href="{{ route('carts.all') }}">Go to cart</a>
        </div>
    </div>
    <div class="empty-box text-center d-none">
        <p>Your cart is empty.</p>
        <a href="">Keep Shopping</a>
    </div>
</div>
