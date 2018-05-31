tinymce.init({
    selector: '.tinymce',
    height: 300,
    theme: 'modern',
    plugins: 'fullscreen autolink code image link media table hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools colorpicker',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
});

$(function(){
    $(document).ready(function(){
        $('.tabs').tabs();
        $('select').formSelect();
        $('.datepicker').datepicker({
            'format': 'yyyy-mm-dd'
        });
    });

    $('.datatable').DataTable({
        dom: 'lfrtBip',
        "order": [[1, "desc"]],
        iDisplayLength: 50,
        buttons: ['copy', 'print', 'excel', 'pdf'],
        language: {
            "search": "",
            "searchPlaceholder": "Search...",
            "lengthMenu": "_MENU_",
        }
    })
});