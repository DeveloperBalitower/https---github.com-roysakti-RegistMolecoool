var base_url = window.location + "/";

$(document).ready(function() {
  generateTable();

  $("#btnSave").click(function(){
    doSave();
  });
});

function generateTable()
{   
  var where = "";      
  
  var table = $('#tablelist').DataTable( {
    ajax: {
      "url": base_url + "gridview",
      "type": "POST",
      "data" : {'where': where}
    }, 
    processing: true, 
    serverSide: true,
    scrollCollapse: true,
    destroy: true,
    iDisplayLength: 10,
    order: [[ 0, "desc" ]],
    dom: 'Bfrtip',
    buttons: [
        {
            text: '<i class="fa fa-plus"></i> Add New',
            action: function ( e, dt, node, config ) {
                generateModalForm('add', '');
            }
        }, 
        {
            extend: 'copy',
            text: '<i class="fa fa-copy"></i> Copy',
            exportOptions: {
                columns: []
            }
        }, 
        {
            extend: 'excel',
            title: '<?= ucwords($lbl_controller) ?>',
            text: '<i class="fa fa-file-excel-o"></i> Excel',
            exportOptions: {
                columns: []
            }
        }, 
        {
            extend: 'pdf',
            title: '<?= ucwords($lbl_controller) ?>',
            text: '<i class="fa fa-file-pdf-o"></i> PDF',
            exportOptions: {
                columns: []
            }
        }, 
        {
            extend: 'print',
            title: '<?= ucwords($lbl_controller) ?>',
            text: '<i class="fa fa-print"></i> Print',
            exportOptions: {
                columns: []
            }
        }
    ]
  });
}



function reloadDatatable()
{
  $('#tablelist').DataTable().ajax.reload();
}

function generateModalForm(state, row_id) {
  $('#modalForm').modal('show');
  $.ajax({
      type: 'post',
      async: false,
      url: base_url + 'form',
      data: {'txtstate': state, 'txtrowid': row_id},
      success: function(ret) {
          var data = JSON.parse(ret); 
          $('#btnSave').show();
          $('#tableModal').html(data['table']);
      }
  });
}

function generateModalView(row_id) {
  $.ajax({
      type: 'post',
      async: false,
      url: base_url + 'view',
      data: {'txtrowid': row_id},
      success: function(ret) {
          var data = JSON.parse(ret); 
          $('#btnSave').hide();
          $('#tableModal').html(data['table']);
          
      }
  });
}

function doSave(){

  var formData = new FormData($('.formInput')[0]);

  var txtposttitle = $('#txtposttitle').val(); 
var txtposttxt = $('#txtposttxt').val(); 
var txtfileimage = $('#txtfileimage').val(); 
var txtfileimage_hdn = $('#txtfileimage_hdn').val(); 
var txtcreateddate = $('#txtcreateddate').val(); 

  if(txtposttitle == '') {infoStatus('Title must be filled', 0); exit();}if(txtposttxt == '') {infoStatus('Descriptopm must be filled', 0); exit();}if(txtfileimage == '') {infoStatus('Image must be filled', 0); exit();}if(txtcreateddate == '') {infoStatus('Created Date must be filled', 0); exit();}

  $("#btnSave").html("Loading...");

  $.ajax({
    type: 'post',
    async: false,
    url: base_url + 'save',
    data: formData,
    mimeType: "multipart/form-data",
    contentType: false,
    cache: false,
    processData: false,
    success: function(ret) {
      var data = JSON.parse(ret); 
      $('#modalForm').modal('hide');
      $("#btnSave").html("SAVE");
      reloadDatatable();
      infoStatus(data['msg'], data['type']);
    }
  });
}

function doDelete(row_id) {
  bootbox.confirm({
    message: "<span class='alert-txt'><i class='fa fa-question-circle'></i>&nbsp;&nbsp;  Are you sure?<span>",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
      if(result == true) {
        $.ajax({
            type: 'post',
            async: false,
            url: base_url + 'delete',
            data: {'txtrowid': row_id},
            success: function(ret) {
              var data = JSON.parse(ret); 
              reloadDatatable();
              infoStatus(data['msg'], data['type']);
            }
        });
      }
    }
  });
}