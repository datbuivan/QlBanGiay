<!-- Filter -->
<div class="dis-none panel-filter w-full p-t-10">
    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
        <div class="filter-col1 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Sort By
            </div>

            <ul>

                @foreach ($sort as $index => $option)
                <li class="p-b-6">
                    <a href="javascript:void(0);"
                        class="filter-link stext-106 trans-04 filter-sort {{ $index === 0 ? ' filter-link-active' : '' }}"
                        data-sort="{{ $index === 0 ? '' : $option}}">
                        {{ $option }}
                    </a>
                </li>
                @endforeach
            </ul>

        </div>

        <div class="filter-col2 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Price
            </div>

            <ul>
                @foreach($prices as $index => $price)
                <li class="p-b-6">
                    <!--filter-link-active-->
                    <a href="javascript:void(0);"
                        class="filter-link stext-106 trans-04 filter-price {{ $index === 0 ? ' filter-link-active' : '' }}"
                        data-price="{{ $index === 0 ? '' : str_replace(' ', '', $price) }}">
                        {{$price}}
                        @if ($loop->last)
                        <span class="plus-sign stext-106">+</span>
                        @endif
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="filter-col3 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Color
            </div>

            <ul>
                @foreach($colors as $color)
                <li class="p-b-6">
                    <span class="fs-15 lh-12 m-r-6" style="color: {{$color->codeHex}}">
                        <i class="zmdi zmdi-circle"></i>
                    </span>

                    <a href="javascript:void(0);" class="filter-link stext-106 trans-04 filter-color"
                        data-color-id="{{$color->id}}">
                        {{$color->name}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="filter-col4 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Gender
            </div>

            <ul>
                @foreach($genders as $gender)
                <li class="p-b-6">
                    <a href="javascript:void(0);" class="filter-link stext-106 trans-04 filter-gender"
                        data-gender-id="{{$gender->id}}">
                        {{$gender->name}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- <div class="filter-col4 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Tags
            </div>

            <div class="flex-w p-t-4 m-r--5">
                <a href="#"
                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Fashion
                </a>

                <a href="#"
                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Lifestyle
                </a>

                <a href="#"
                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Denim
                </a>

                <a href="#"
                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Streetstyle
                </a>

                <a href="#"
                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Crafts
                </a>
            </div>
        </div> -->

    </div>
</div>