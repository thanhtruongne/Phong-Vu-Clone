<div class="glide_widget">
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            @foreach ($data as $key => $product)
                @php
                   $product_price_after_discount = $product['promotion'][0]['product_price'] - $product['promotion'][0]['discount']; 
                   $canonical = makeTheURL($product->languages->first()->pivot->meta_link,true,false); 
                @endphp
                
                <li class="glide__slide" >
                    <div  class="css-1ei4kcr ">
                        <div class="css-1msrncq">
                            <a href="" style="text-decoration: none">
                                <div class="css-4rhdrh">
                                    <div style="margin-bottom: 0.25rem;position: relative;">
                                        <div class="" class="position-relative">
                                            <div style="width:100%;height:100%;position: relative"  class="">
                                                <img src="{{ $product->image }}" 
                                                style="width: 100%;height: 147px;object-fit: cover;">
                                                <div class="position-absolute" style="width: 86px;bottom:0;left:0">
                                                    <div class="css-zb7zul">
                                                    <div style="font-size: 10px;font-weight: 700;color: #ffd591;">TIẾT KIỆM</div>
                                                    <div style="font-size: 13px;line-height: 18px;font-weight: 700;color: #FFFFFF;">
                                                        {{ convert_price($product['promotion'][0]['discount']) }}
                                                    </div>
                                                    </div>
                                            </div>
                                            </div>                        
                                        </div>
                                        {{-- Title --}}
                                        <div style="margin-bottom: 0.25rem">
                                            <div class="css-90n0z6">{{ $product->product_cataloge->languages->first()->pivot->name }}</div>
                                        </div>
                                        {{-- desc --}}
                                        <div style="height:3rem">
                                        <div class="css-1uunp2d">
                                                <h3 style="font-size: 0.75rem;font-weight: 400;line-height: 1rem;display: inline;">
                                                    {{ $product->languages->first()->pivot->name }}
                                                </h3>
                                        </div>
                                    </div>
                                    {{-- price --}}
                                    <div style="position: relative;margin-top: 0.25rem;padding-right: unset;margin-bottom: 0.25rem;">
                                            <div class="css-do31rh">
                                                    {{ convert_price($product_price_after_discount)  }} ₫
                                                </div>
                                            <div style="display: flex;height: 1rem;">
                                                <div class="css-18z00w6">
                                                    {{ convert_price($product->price) }} đ
                                                </div>
                                                <div class="css-2rwx6s">
                                                   - {{ $product['promotion'][0]['discountValue'] }} {{ $product['promotion'][0]['discountType'] }}
                                                </div>

                                            </div>
                                    </div>

                                    </div>
                                </div>
                            </a>
                            <button class="css-16gdkk6">
                                <div class="css-ct8m8z">
                                    Thêm giỏ hàng
                                </div>
                            </button>
                        </div>
                    </div>
                </li>  
            @endforeach 
   
        </ul>
    </div>

    <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left access_arrow_slide_left"  style="border:none;outline:none;box-shadow:none;left:14rem" data-glide-dir="<">
              <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggb3BhY2l0eT0iMC4zIiBkPSJNMCAwSDI0QzM3LjI1NDggMCA0OCAxMC43NDUyIDQ4IDI0QzQ4IDM3LjI1NDggMzcuMjU0OCA0OCAyNCA0OEgwVjBaIiBmaWxsPSIjMUIxRDI5Ii8+CjxwYXRoIGQ9Ik0yNi41IDE4TDIwLjUgMjRMMjYuNSAzMCIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxLjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K" alt="">
        </button>
        <button class="glide__arrow glide__arrow--right access_arrow_slide_right"  style="border:none;outline:none;box-shadow:none" data-glide-dir=">">
             <img src=" data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggb3BhY2l0eT0iMC4zIiBkPSJNMCAyNEMwIDEwLjc0NTIgMTAuNzQ1MiAwIDI0IDBINDhWNDhIMjRDMTAuNzQ1MiA0OCAwIDM3LjI1NDggMCAyNFoiIGZpbGw9IiMxQjFEMjkiLz4KPHBhdGggZD0iTTIxLjUgMzBMMjcuNSAyNEwyMS41IDE4IiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjEuNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIi8+Cjwvc3ZnPgo=" alt="">
        </button>
    </div>
</div>          