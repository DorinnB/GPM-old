$(document).ready(function() {

    var tableJob = $('#table_followup').DataTable({

        "columnDefs": [{
            targets: [1],
            orderData: [1, 6]
        }, {
            targets: [6],
            orderData: [6, 7]
        }
      ],
        "order": [[ 0, "asc" ],[5, "asc" ]],
        scrollY: '79vh',
        scrollCollapse: true,
        paging: false,
        info: false,
        scrollX: true,

                select: true,
                buttons: [

                    {
                        extend: 'collection',
                        text: 'Export',
                        buttons: [
                            'copy',
                            'excel',
                            'csv',
                            'pdf',
                            'print'
                        ]
                    }
                ]
    });


    tableJob
        .buttons()
        .container()
        .appendTo( '#button' );



    $('#container').css('display', 'block');
    tableJob.columns.adjust().draw();

    // Setup - add a text input to each footer cell
    $(".dataTables_scrollFootInner tfoot th").each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="' + title + '" / style="width:100%">');
    });

    tableJob.columns().every(function() {
        var that = this;

        $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });

    document.getElementById("table_followup_filter").style.display = "none";



    $('.popover-markup').popover({
      html: true,
      container:'body',
      trigger: "manual",
      title: function () {
        return $(this).find('.head').html();
      },
      content: function () {
        return $(this).find('.content').html();
      }
    })
    .on("mouseenter", function () {
      var _this = this;
      $(this).popover("show");
      $(".popover").on("mouseleave", function () {
        $(_this).popover('hide');
      });
    }).on("mouseleave", function () {
      var _this = this;
      setTimeout(function () {
        if (!$(".popover:hover").length) {
          $(_this).popover("hide");
        }
      });
    });

});