$(document).ready(function () {
    var url = "/QLBanGiay/api/v1/product-filter?filter=(;limit=8;currentPage=1;)";
    callApi(url);

    $('.filter-sort').on('click', function () {
        $('.filter-sort').not(this).each(function () {
            $(this).removeClass('filter-link-active');
            $(this).find('i.fas.fa-times').remove();
        });
        if (!$(this).hasClass('filter-link-active')) {
            $(this).addClass('filter-link-active');
            $(this).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');

        } else {
            $(this).removeClass('filter-link-active');
            $(this).find('i.fas.fa-times').remove();
        }
        callApi(updateUrl());
    });


    $('.filter-price').on('click', function () {
        $('.filter-price').not(this).each(function () {
            $(this).removeClass('filter-link-active');
            $(this).find('i.fas.fa-times').remove();
        });
        if (!$(this).hasClass('filter-link-active')) {
            $(this).addClass('filter-link-active');
            $(this).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');

        } else {
            $(this).removeClass('filter-link-active');
            $(this).find('i.fas.fa-times').remove();
        }
        callApi(updateUrl());
    });

    $('.filter-gender').on('click', function () {
        if (!$(this).hasClass('filter-link-active')) {
            $(this).addClass('filter-link-active');
            $(this).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');

        } else {
            $(this).removeClass('filter-link-active');
            $(this).find('i.fas.fa-times').remove();
        }
        callApi(updateUrl());
    });

    $('.filter-color').on('click', function () {
        if (!$(this).hasClass('filter-link-active')) {
            $(this).addClass('filter-link-active');
            $(this).append('<i class="fas fa-times" style="font-size:10px;margin-left:3px;margin-bottom:2px;"></i>');

        } else {
            $(this).removeClass('filter-link-active');
            $(this).find('i.fas.fa-times').remove();
        }
        callApi(updateUrl());
    });

    $('#select-total').on('change', function () {
        callApi(updateUrl(true));
    });

    $('#pagination').on('click', '.how-pagination1', function () {

        if ($(this).hasClass('previous')) {
            const current = $('.how-pagination1.active-pagination1').eq(0);
            const previous = $(current).prev();
            if (previous.length) {
                $('.how-pagination1').not(previous).each(function () {
                    $(this).removeClass('active-pagination1');
                });
                $(previous).addClass('active-pagination1');
                callApi(updateUrl());
            }
        } else if ($(this).hasClass('next')) {
            const current = $('.how-pagination1.active-pagination1').eq(0);
            const next = $(current).next();
            if (next.length) {
                $('.how-pagination1').not(next).each(function () {
                    $(this).removeClass('active-pagination1');
                });
                $(next).addClass('active-pagination1');
                callApi(updateUrl());
            }
        }
        else {
            $('.how-pagination1').not(this).each(function () {
                $(this).removeClass('active-pagination1');
            });
            if (!$(this).hasClass('active-pagination1')) {
                $(this).addClass('active-pagination1');
                callApi(updateUrl());
            }
        }
    });
});

function callApi(url) {
    console.log(url);
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var jsonData = JSON.stringify(data);
            appendHtml(data);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}

function appendHtml(data) {
    const $wrapper = $('#isotope-grid');
    const $pagination = $('#pagination');
    const products = data.products;
    const pageTotal = data.pageTotal;
    const currentPage = data.currentPage;

    ////////////////////////////////

    appendProducts(products, $wrapper);

    ////////////////////////////////

    appendPagination(pageTotal, currentPage, $pagination);
}


function updateUrl(isChangeSelectTotal = false) {
    var url = "/QLBanGiay/api/v1/product-filter?filter=(;";
    var isFirstColor = true;
    $('.filter-color').each(function () {
        if ($(this).hasClass('filter-link-active')) {
            var val = $(this).data('color-id');
            if (isFirstColor) {
                url += 'color=' + val;
                isFirstColor = false;
            } else {
                url += '-' + val;
            }
        }
    });

    if (!isFirstColor) {
        url += ';';
    }

    isFirstPrice = true;
    $('.filter-price').each(function () {
        if ($(this).hasClass('filter-link-active')) {
            var val = $(this).data('price');
            if (isFirstPrice) {
                url += 'price=' + val;
                isFirstPrice = false;
            } else {
                url += '-' + val;
            }
        }
    });

    if (!isFirstPrice) {
        url += ';';
    }

    var isFirstGender = true;
    $('.filter-gender').each(function () {
        if ($(this).hasClass('filter-link-active')) {
            var val = $(this).data('gender-id');
            if (isFirstGender) {
                url += 'gender=' + val;
                isFirstGender = false;
            } else {
                url += '-' + val;
            }
        }
    });

    if (!isFirstGender) {
        url += ';';
    }

    var isFirstSort = true;
    $('.filter-sort').each(function () {
        if ($(this).hasClass('filter-link-active')) {
            var val = $(this).data('sort');
            if (isFirstSort) {
                url += 'sort=' + val;
                isFirstSort = false;
            } else {
                url += '-' + val;
            }
        }
    });

    if (!isFirstSort) {
        url += ';';
    }

    url += "limit=" + $('#select-total').val() + ";";

    if (isChangeSelectTotal) {
        url += 'currentPage=1;';
    } else {
        var isFirstPagination = true;
        $('.how-pagination1').each(function () {
            if ($(this).hasClass('active-pagination1')) {
                var val = $(this).text();
                if (isFirstPagination) {
                    url += 'currentPage=' + val;
                    isFirstPagination = false;
                } else {
                    url += '-' + val;
                }
            }
        });

        if (!isFirstPagination) {
            url += ';';
        }
    }

    url += ")";

    return url;
}

function appendProducts(products, wrapper) {
    wrapper.empty();

    if (products.length > 0) {
        for (let index = 0; index < products.length; index++) {
            const product = products[index].product;
            const rating = products[index].rating;
            const productHtml = `
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div style="border: 1px solid #ccc" class="block2-pic hov-img0">
                                <img style="height: 270px" src="${'../../../QlBanGiay/resources/assets/image/' + product.avatar}"
                                    alt="IMG-PRODUCT">

                                <a style="border: 1px solid #ccc; font-size: 13px;"
                                    href="${'/QLBanGiay/' + product.id + '/productDetail'}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 
                                    ">
                                    Chi tiết sản phẩm
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        ${product.name}
                                    </a>

                                    <div class="price">
                                        <span class="stext-105 cl3 price_discount">
                                            ${product.export_price.toLocaleString('vi-VN') + 'đ'}
                                        </span>
                                        <span class="stext-105 cl3 price_span">
                                            ${(product.export_price - (product.export_price * product.discount)).toLocaleString('vi-VN') + 'đ'}
                                        </span>
                                    </div>
                                    <div class="stars-outer">
                                        <div style=' width: ${rating * 100 / 5 + '%'}' class="stars-inner"></div>
                                    </div>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="../../../QlBanGiay/resources/assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="../../../QlBanGiay/resources/assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            wrapper.append(productHtml);
        }
    } else {
        const productHtml = `
        <p style="width: 100%;
                text-align: center;
                font-size: 20px;
                color: red;">
            Không có sản phẩm
        </p>
        `;
        wrapper.append(productHtml);
    }
    wrapper.css('height', '');
}

function appendPagination(pageTotal, currentPage, pagination) {
    pagination.empty();
    if (pageTotal > 1) {
        const paginationChildren = [];

        const maxItems = 3;

        let startIndex = Math.max(currentPage - Math.floor(maxItems / 2), 1);
        let endIndex = Math.min(startIndex + maxItems - 1, pageTotal);

        if (endIndex - startIndex + 1 < maxItems) {
            startIndex = Math.max(endIndex - maxItems + 1, 1);
        }

        if (startIndex > 1) {
            paginationChildren.push(
                `<a href="javascript:void(0);" class="flex-c-m how-pagination1 previous trans-04 m-all-7">
                    <i class="zmdi zmdi-arrow-left"></i>
                </a>`
            );
        }

        for (let index = startIndex; index <= endIndex; index++) {
            paginationChildren.push(
                // `<li class="page-item${currentPage === index ? ' active ' : ''}">
                //     <span class="page-link">${index}</span>
                // </li>`
                `<a href="javascript:void(0);" class="flex-c-m how-pagination1 trans-04 m-all-7 ${currentPage === index ? ' active-pagination1 ' : ''}">
                    ${index}
                </a>`
            );
        }

        if (endIndex < pageTotal) {
            paginationChildren.push(
                `<a href="javascript:void(0);" class="flex-c-m how-pagination1 next trans-04 m-all-7">
                    <i class="zmdi zmdi-arrow-right"></i>
                </a>`
            );
        }

        pagination.append(paginationChildren.join(''));
    }
}


