$(document).ready(function () {

    const filterButton = $('.js-show-filter').eq(0);
    const panelFilter = $('.panel-filter').eq(0);
    const url = new URL(window.location.href);
    const hasColor = url.searchParams.has('color');
    const hasPrice = url.searchParams.has('price');
    const hasGender = url.searchParams.has('gender');
    const hasSort = url.searchParams.has('sort');
    // if (hasColor || hasPrice || hasSort) {
    //     filterButton.addClass('show-filter');
    //     panelFilter.css('display', 'block');
    //     if (hasColor) {
    //         var color = url.searchParams.get('color');
    //         var colorArray = color.split('-');
    //         $('.filter-color').each(function (index, element) {
    //             var val = $(element).data('color-id');
    //             if (colorArray.includes(val.toString())) {
    //                 $(element).addClass('filter-link-active');
    //                 $(element).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');
    //             } else {
    //                 $(element).removeClass('filter-link-active');
    //             }
    //         });
    //     }
    //     if (hasPrice) {
    //         var price = url.searchParams.get('price');
    //         $('.filter-price').each(function (index, element) {
    //             var val = $(element).data('price');
    //             if (price == val) {
    //                 $(element).addClass('filter-link-active');
    //                 if (val != "") {
    //                     $(element).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');
    //                 }
    //             } else {
    //                 $(element).removeClass('filter-link-active');
    //             }
    //         });
    //     }
    //     if (hasGender) {
    //         var gender = url.searchParams.get('gender');
    //         $('.filter-gender').each(function (index, element) {
    //             var val = $(element).data('gender-id');
    //             if (gender == val) {
    //                 $(element).addClass('filter-link-active');
    //                 if (val != "") {
    //                     $(element).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');
    //                 }
    //             } else {
    //                 $(element).removeClass('filter-link-active');
    //             }
    //         });
    //     }
    //     if (hasSort) {
    //         var sort = url.searchParams.get('sort');
    //         $('.filter-sort').each(function (index, element) {
    //             var val = $(element).data('sort');
    //             if (sort == val) {
    //                 $(element).addClass('filter-link-active');
    //                 if (val != "") {
    //                     $(element).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');
    //                 }
    //             } else {
    //                 $(element).removeClass('filter-link-active');
    //             }
    //         });
    //     }
    // }

    // $('.filter-sort').on('click', function () {
    //     var sortValue = $(this).data('sort');
    //     var currentURL = window.location.href;
    //     var url = new URL(currentURL);
    //     if (url.searchParams.has('sort')) {
    //         var sort = url.searchParams.get('sort');
    //         if (sortValue === sort) {
    //             url.searchParams.set('sort', "");
    //         } else {
    //             url.searchParams.set('sort', sortValue);
    //         }
    //     } else {
    //         url.searchParams.append('sort', sortValue);
    //     }
    //     // history.replaceState(null, '', url.toString());
    //     window.location.href = url.toString();
    // });

    // $('.filter-price').on('click', function () {
    //     var priceValue = $(this).data('price');
    //     var currentURL = window.location.href;
    //     var url = new URL(currentURL);
    //     if (url.searchParams.has('price')) {
    //         var price = url.searchParams.get('price');
    //         if (priceValue == price) {
    //             url.searchParams.set('price', "");
    //         } else {
    //             url.searchParams.set('price', priceValue);
    //         }
    //     } else {
    //         url.searchParams.append('price', priceValue);
    //     }
    //     // history.replaceState(null, '', url.toString());
    //     window.location.href = url.toString();
    // });

    // $('.filter-gender').on('click', function () {
    //     var genderValue = $(this).data('gender-id');
    //     var currentURL = window.location.href;
    //     var url = new URL(currentURL);
    //     if (url.searchParams.has('gender')) {
    //         var gender = url.searchParams.get('gender');
    //         if (genderValue.toString() === gender) {
    //             url.searchParams.set('gender', "");
    //         } else {
    //             url.searchParams.set('gender', genderValue);
    //         }
    //     } else {
    //         url.searchParams.append('gender', genderValue);
    //     }
    //     // history.replaceState(null, '', url.toString());
    //     window.location.href = url.toString();
    // });

    // $('.filter-color').on('click', function () {
    //     var colorValue = $(this).data('color-id');
    //     var currentURL = window.location.href;
    //     var url = new URL(currentURL);
    //     if (url.searchParams.has('color')) {
    //         var color = url.searchParams.get('color');
    //         if (color === "") {
    //             color = colorValue;
    //         } else {
    //             var colorArray = color.split('-');
    //             if (colorArray.includes(colorValue.toString())) {
    //                 var index = colorArray.indexOf(colorValue.toString());
    //                 colorArray.splice(index, 1);
    //                 color = colorArray.join("-");
    //             } else {
    //                 color = color + "-" + colorValue;
    //             }
    //         }
    //         url.searchParams.set('color', color);
    //     } else {
    //         url.searchParams.append('color', colorValue);
    //     }
    //     // history.replaceState(null, '', url.toString());
    //     window.location.href = url.toString();
    // });


    //
    $('#search-submit').on('submit', function (e) {
        e.preventDefault();
        var input = $(this).find('input[name=search-product]');
        if (input.val()) {
            var newUrl = "/QLBanGiay/search?search=" + input.val();
            window.location.replace(newUrl);
        }
    });

    console.log(url.pathname);
    if (url.pathname == '/QLBanGiay/search') {
        const searchParam = url.searchParams.get('search');
        if (searchParam) {
            $('input[name=search-product]').val(searchParam);
            $('.panel-search').css('display', 'block');
        }
    }
});
