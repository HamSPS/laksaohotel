$(document).ready(function() {
    $('.data-table').bootstrapTable({
        formatSearch: function() {
            return 'ຄົ້ນຫາ...';
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

})