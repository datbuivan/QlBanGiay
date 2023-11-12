@extends('Layout.LayoutAdmin')
@section('body')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách khách hàng</h6>
        <p>Tổng số khách hàng: <strong>{{ $customers->total() }}</strong></p>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <div class="mb-3">
                <select name="total_item" id="total_item" class="form-control" style="min-width: 60px">
                    @foreach ($totalItemOptions as $value => $label)
                    <option value="{{ $value }}" @if($currentTotalItem==$value) selected @endif>{{ $label }}</option>
                    @endforeach
                </select>

            </div>
            <div class="d-flex flex-wrap flex-md-nowrap">
                <select name="export" id="export" class="form-control mr-3 mb-3" style="min-width:100px;">
                    <option value="" disabled selected>Xuất file</option>
                    <option value="1">Print</option>
                    <option value="2">Excel</option>
                    <option value="3">Pdf</option>
                </select>
                <select name="price" id="price" class="form-control mr-3 mb-3" style="min-width:190px;">
                    @foreach ($priceOptions as $value => $label)
                    <option value="{{ $value }}" @if($currentPrice==$value) selected @endif>{{ $label }}</option>
                    @endforeach
                </select>
                <select name="status" id="status" class="form-control mr-3 mr-md-0 mb-3" style="min-width:150px;">
                    @foreach ($statusOptions as $value => $label)
                    <option value="{{ $value }}" @if($currentStatus==$value) selected @endif>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên tài khoản</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Tổng tiền mua</th>
                        <th>Trạng thái tài khoản</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($customers) > 0)
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customers->perPage() * ($customers->currentPage() - 1) + $loop->iteration }}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone_number}}</td>
                        <td>{{number_format($customer->total_amount, 0, ',', '.'). ' đ'}}</td>
                        <td>
                            @switch($customer->status)
                            @case('hoat dong')
                            Hoạt động
                            @break

                            @case('chua xac minh')
                            Chưa xác minh
                            @break

                            @case('khoa')
                            Khoá
                            @break

                            @default
                            @break
                            @endswitch
                        </td>
                        <td>
                            <form method='post'
                                action="{{ url('/QLBanGiay/admin/customer/changeStatus/'.$customer->id) }}?action={{$customer->status == 'khoa' ? 'mo_khoa' : 'khoa'}}">
                                <!-- <form method='post' action="{{ url('/QLBanGiay/admin/customer/changeStatus/10') }}?action={{$customer->status == 'khoa' ? 'mo_khoa' : 'khoa'}}"> -->
                                @csrf
                                @if($customer->status == 'khoa')
                                <button style="min-width: 60px; opacity: 1" class="btn btn-success">
                                    Mở khóa
                                </button>
                                @elseif($customer->status == 'hoat dong')
                                <button style="min-width: 60px; opacity: 1" class="btn btn-danger">
                                    Khoá
                                </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7" class="text-center text-error">Không có người dùng nào.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @if($customers->total() > $currentTotalItem)
    <tr>
        <td colspan="4"> {{ $customers->appends(request()->query())->onEachSide(5)->links() }} </td>
    </tr>
    @endif
</div>



@if(session('message'))
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
.custom-title {
    font-size: 18px;
    color: #ffffff;
}

.custom-popup.success {
    background-color: #198754 !important;
}

.custom-popup.failed {
    background-color: #dc3545 !important;
}

.custom-icon.success {
    background-color: #71dd37 !important;
}

.custom-icon.failed {
    background-color: #ff3e1d !important;
}

.custom-progress-bar.success {
    background-color: #71dd37 !important;
}

.custom-progress-bar.failed {
    background-color: #ff3e1d !important;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
Swal.fire({
    toast: true,
    icon: '{{ session('
    type ') ?? '
    ' }}',
    title: '{{ session('
    message ') ?? '
    ' }}',
    animation: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    showCloseButton: true,
    customClass: {
        title: 'custom-title',
        icon: '{{ session('
        type ') === '
        error ' ? '
        custom - icon failed ' : '
        custom - icon success ' }}',
        popup: '{{ session('
        type ') === '
        error ' ? '
        custom - popup failed ' : '
        custom - popup success ' }}',
        timerProgressBar: '{{ session('
        type ') === '
        error ' ? '
        custom - progress - bar failed ' : '
        custom - progress - bar success ' }}',
    },
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});
</script>

@endif

<script src="../../../QlBanGiay/public/Admin/vendor/linkPrint/jquery.js"></script>
<script src="../../../QlBanGiay/public/Admin/vendor/linkPrint/filesaver.js"></script>
<script src="../../../QlBanGiay/public/Admin/vendor/linkPrint/xlsx.js"></script>
<script src="../../../QlBanGiay/public/Admin/vendor/linkPrint/bundle.js"></script>
<script src="../../../QlBanGiay/public/Admin/vendor/linkPrint/print.js"></script>

<script>
$(document).ready(function() {
    $('#total_item').on('change', function() {
        var totalItem = $(this).val();
        var newUrl = window.location.origin + window.location.pathname + '?total_item=' + totalItem;
        window.location.href = newUrl;
    });

    $('#status').on('change', function() {
        var status = $(this).val();
        var currentUrl = window.location.href;
        var newUrl = updateQueryStringParameter(currentUrl, 'status', status);
        window.location.href = newUrl;
    });

    $('#price').on('change', function() {
        var price = $(this).val();
        var currentUrl = window.location.href;
        var newUrl = updateQueryStringParameter(currentUrl, 'price', price);
        window.location.href = newUrl;
    });

    function updateQueryStringParameter(uri, key, value) {
        var page = /([?&])page=[^&]*(&|$)/i;

        if (uri.match(page)) {
            uri = uri.replace(page, '$1$2');
        }

        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }
    }

    $('#export').on('change', function() {
        var exportVal = $(this).val();
        var data = @json($allCustomer);
        console.log(data);
        if (exportVal == 2) {
            exportToExcel(data);
        } else if (exportVal == 3) {
            exportToPDF(data);
        } else {
            exportoPrint(data);
        }
        $(this).val('');
    });


    function exportoPrint(data) {

        generateTable(data, 'dataTablePrint', 'divDataTablePrint');

        const tablePrint = document.getElementById('dataTablePrint');

        if (tablePrint) {
            printJS('dataTablePrint', 'html');
            const divtablePrint = $('#divDataTablePrint');
            divtablePrint.remove();
        } else {
            console.error("Table element not found.");
        }
    }

    // Export to Excel
    function exportToExcel(data) {
        var ws = XLSX.utils.json_to_sheet(data);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Customers');

        // Đặt độ rộng cho tất cả các cột thành 40
        var columnWidth = 25;
        var columnWidths = [];

        for (var i = 0; i < data.length; i++) {
            columnWidths.push({
                wch: columnWidth
            });
        }

        ws['!cols'] = columnWidths;

        var customFileName = prompt('Nhập tên file :', 'khach_hang.xlsx');
        if (customFileName) {
            XLSX.writeFile(wb, customFileName);
        }
    }


    function exportToPDF(data) {

        generateTable(data, 'dataTablePDF', 'divDataTablePDF');

        const tablePrint = document.getElementById('dataTablePDF');

        if (tablePrint) {
            var fileName = prompt("Nhập tên file: ", 'khach_hang.pdf');
            if (fileName) {
                var options = {
                    margin: 10,
                    filename: fileName,
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                html2pdf().set(options).from(tablePrint).save();
            }
            const divtablePrint = document.getElementById('divDataTablePDF');
            divtablePrint.remove();
        } else {
            console.error("Table element not found.");
        }
    }

    function generateTable(data, tableId, divId) {
        const table = document.createElement("table");
        table.classList.add("table", "table-bordered");
        table.id = tableId;

        const thead = document.createElement("thead");
        const theadRow = document.createElement("tr");
        // Thêm các tiêu đề cột
        const headers = Object.keys(data[0]);
        headers.forEach((header) => {
            const th = document.createElement("th");
            th.style.whiteSpace = "nowrap";
            th.textContent = header;
            theadRow.appendChild(th);
        });
        thead.appendChild(theadRow);
        table.appendChild(thead);

        const tbody = document.createElement("tbody");
        // Thêm dữ liệu vào từng hàng
        data.forEach((item, index) => {
            const row = document.createElement("tr");
            headers.forEach((header) => {
                const cell = document.createElement("td");
                cell.style.whiteSpace = "nowrap";
                cell.textContent = item[header];
                row.appendChild(cell);
            });
            tbody.appendChild(row);
        });
        table.appendChild(tbody);

        const div = document.createElement("div");
        div.id = divId;
        div.style.width = '0px';
        div.style.height = '0px';
        div.style.overflow = 'hidden';
        div.appendChild(table);

        document.body.appendChild(div);
    }


});
</script>


@endsection