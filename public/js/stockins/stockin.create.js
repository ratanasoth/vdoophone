(function(){
    InitializeComponent();
    function InitializeComponent()
    {
        $('body').on('click','#btnadd', function(){
            alert('ok');
        });

        $('body').on('click','#btndelete', function(){
            $('tr').has('.chhrow:checked').remove();
            $('#chhall').prop('checked', false);
        });

        $('body').on('click','.btnsave', function(){
            alert('ok');
        });

        $('body').on('change','.chhrow', function(){
            var chs = $('.chhrow:checked').length;
            if(chs == 0){
                $('#btndelete').attr('disabled', 'disabled');
            }else{
                $('#btndelete').removeAttr('disabled');
            }
        });

        $('body').on('change', '#chhall', function(){
            $('.chhrow').prop('checked', this.checked);
            if(this.checked == true){
                $('#btndelete').removeAttr('disabled');
            }else{
                $('#btndelete').attr('disabled', 'disabled');
            }
        });
    }
})();