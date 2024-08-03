  <style>
     footer {
      flex-shrink: 0;
      position: sticky;
      bottom: 0;
      width: 100%;
      height: 60px; /* Adjust this value as needed */
      background-color: #f5f5f5; /* Adjust the background color as needed */
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
    }
  </style>

<script>
    $(document).ready(function() {


        //ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });




        if ($('.datanewAjax').length > 0) {


            $('.datanewAjax').DataTable({
                'processing': true,
                  
                'order': [
                    [0, 'desc']
                ], 
                'aLengthMenu': [
                    [20, 50, 100, 200,500, 10000],
                    [20, 50, 100, 200,500, "All"]
                   ],
                'serverSide': true, 
                'serverMethod': 'post', 
                'ajax': {
                    'url': AJAX_URL
                },

            });

        }
      
       if ($('.datanewPOS').length > 0) {


            $('.datanewPOS').DataTable({
                'processing': true,
                'scrollY': '500px',
                'order': [
                    [0, 'desc']
                ], 
                'aLengthMenu': [
                    [10, 20, 100, 200,500, 100000],
                    [10, 20, 100, 200,500, "All"]
                   ],
                'serverSide': true, 
                'serverMethod': 'post', 
                'ajax': {
                    'url': AJAX_URL
                },

            });

        }
      

   //'scrollY': '500px',



        $("#cat_name").keyup(function() {
            var name = $("#cat_name").val();
            if (!isDoubleByte(name)) {
                $("#cat_slug").val(name.replace(/ /g, "_"));
            } else {

                $("#cat_slug").val(makeid(10));
            }

        });

        function isDoubleByte(str) {
            for (var i = 0, n = str.length; i < n; i++) {
                if (str.charCodeAt(i) > 255) {
                    return true;
                }
            }
            return false;
        }

        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }


        $(document).on("click", '.delete-btn-group', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?"
                , text: "You won't be able to revert this!"
                , type: "warning"
                , showCancelButton: !0
                , confirmButtonColor: "#3085d6"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes, delete it!"
                , confirmButtonClass: "btn btn-primary"
                , cancelButtonClass: "btn btn-danger ml-1"
                , buttonsStyling: !1
            }).then(function(t) {
                if (t.isConfirmed) {
                    var url = get_checked();
                    window.location.href = href + "?token=" + url;
                }
            })
        })

        $(document).on("click", '.action-btn-group', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            Swal.fire({
                title: "You are going to change the status"
                , text: "Are you sure?"
                , type: "warning"
                , showCancelButton: !0
                , confirmButtonColor: "#3085d6"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes"
                , confirmButtonClass: "btn btn-primary"
                , cancelButtonClass: "btn btn-danger ml-1"
                , buttonsStyling: !1
            }).then(function(t) {
                if (t.isConfirmed) {
                    var url = get_checked();
                    window.location.href = href + "?token=" + url;
                }
            })
        })


        $(document).on("click", '.restore-btn-group', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?"
                , text: "You won't be able to revert this!"
                , type: "warning"
                , showCancelButton: !0
                , confirmButtonColor: "#3085d6"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes, restore it!"
                , confirmButtonClass: "btn btn-primary"
                , cancelButtonClass: "btn btn-danger ml-1"
                , buttonsStyling: !1
            }).then(function(t) {
                if (t.isConfirmed) {
                    var url = get_checked();
                    window.location.href = href + "?token=" + url;
                }
            })
        })



    });

    function get_checked() {
        var selected = [];
        $('input[type=checkbox]').each(function() {
            if ($(this).is(":checked")) {
                var num = $(this).attr('data-value');
                if (num != '0')
                    selected.push($(this).attr('data-value'));
            }
        });
        var url = (btoa(JSON.stringify(selected)));
        return url;

    }

    $("[title='print']").click(function() {
        var pageTitle = 'Print Table'
            , stylesheet = '{{asset("resources/assets/css/bootstrap.min.css")}}'
            , stylesheet2 = '{{asset("resources/assets/css/style.css")}}'
            , win = window.open('', 'Print', 'width=1000,height=1000');
        win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<link rel="stylesheet" href="' + stylesheet + '">' +
            '<link rel="stylesheet" href="' + stylesheet2 + '">' +
            '</head><body>' + $('.table')[0].outerHTML + '</body></html>');
        win.document.close();
        win.print();
        win.close();
        return false;
    });

    $("[title='excel']").click( function() {
        let table = document.getElementsByTagName("table");
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `export.xlsx`, // fileName you could use any name
            sheet: {
                name: 'Sheet 1' // sheetName
            }
        });
    });

    // active nav menu
   // $(".activex").closest('ul').css('display', 'block');
   
     $(".shoaeb_link.submenu.royal > a").addClass("subdrop");
     $(".shoaeb_link.submenu.royal > ul").show();
  
     $(".times_link.submenu.royal > a").addClass("subdrop");
     $(".times_link.submenu.royal > ul").show();


    $('table').on('click', 'input[type="checkbox"]', function() {
        var $tr = $(this).closest('tr');
        if ($(this).is(':checked')) {
            $tr.css('background-color', '#0d6efd75');
        } else {
            $tr.css('background-color', '');
        }
    });

    $('thead').on('click', 'th input[type="checkbox"]', function () {

        if ($('th input[type="checkbox"]').is(':checked')){
           
            $('tbody tr').addClass('cell-checked');
           
        }
        else{
            $('tbody tr').removeClass('cell-checked');
        }


});
  
        $(document).on('select2:open', (e) => {
            const selectId = e.target.id

            $(".select2-search__field[aria-controls='select2-" + selectId + "-results']").each(function (
                key,
                value,
            ){
                value.focus();
            })
        })

  
   $(document).on("click",'.warning-button', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            confirmButtonClass: "btn btn-primary",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: !1
        }).then(function (t) {
            if (t.isConfirmed) {
                window.location.href = href;
            }
        })
    });
    
      function numberMask(amount) {
            const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'BDT',
            });

            try {
                const formattedAmount = formatter.format(amount);
                if(formattedAmount==='BDTNaN'){
                    return 'BDT 0.00';
                }
                return formattedAmount;
            } catch (error) {
                return "0";
            }
        }


</script>
