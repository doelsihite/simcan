$(document).ready(function() {
var id_dokumen_temp, tahun_rkpd_temp;
var tahun_session = $('#tahun_rkpd_main').val();

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();    

    setTimeout(function() {
            $('#pesanx').removeClass('in');
         }, 3500);
};

function formatTgl(val_tanggal){
  var formattedDate = new Date(val_tanggal);
  var d = formattedDate.getDate();
  var m = formattedDate.getMonth();
  var y = formattedDate.getFullYear();
  var m_names = new Array("Januari", "Februari", "Maret", 
    "April", "Mei", "Juni", "Juli", "Agustus", "September", 
    "Oktober", "November", "Desember")

  var tgl= d + " " + m_names[m] + " " + y;
  return tgl;
};

$('.page-alert .close').click(function(e) {
  e.preventDefault();
  $(this).closest('.page-alert').slideUp();
});

$('#tahun_rkpd').number(true,0,',','');

$('#tanggal_rkpd_x').datepicker({
  altField: "#tanggal_rkpd",
  altFormat: "yy-mm-dd", 
  dateFormat: "dd MM yy"
});

$('#btn').click(function() {
    $("#tanggal_rkpd_x").focus();
  });

function buatNip(string){
  return string.replace(/(\d{8})(\d{6})(\d{1})(\d{3})/,"$1 $2 $3 $4");
};

function nilaiNip(string){
  return string.replace(/\D/g,'').substring(0, 20);
};

var angkaNip = document.getElementsByClassName('nip');

angkaNip.onkeydown = function(e) {
  if(!((e.keyCode > 95 && e.keyCode < 106)
    || (e.keyCode > 47 && e.keyCode < 58) 
    )) { return false; }
};

$("input[name='nip_tandatangan_display']").on("keyup", function(){
    $("input[name='nip_tandatangan']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_tandatangan']").val());
});

$.ajax({

    type: "GET",
    url: './getUnitRenja',
    dataType: "json",

    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_unit"]').empty();
          $('select[name="id_unit"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_unit"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
          }
});

var dokumen_tbl;
dokumen_tbl = $('#tblDokumen').DataTable({    
  "autoWidth": false,
  "bDestroy": true
});

function LoadDokumen(id_unit){
dokumen_tbl = $('#tblDokumen').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax": {"url": "./getDataDokumen/"+id_unit},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'tahun_ranwal', sClass: "dt-center"},
              { data: 'nomor_ranwal'},
              { data: 'uraian_perkada'},
              { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"15px",
                render: function(data, type, row,meta) {
                return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
              }},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
      });
};

var id_dokumen_temp, tahun_rkpd_temp;
$('#tblDokumen tbody').on( 'dblclick', 'tr', function () {
    var data = dokumen_tbl.row(this).data();
    id_dokumen_temp=data.id_dokumen_rkpd;
    tahun_rkpd_temp=data.tahun_rkpd;

    if (data.flag == 1){
      document.getElementById("btnProses").style.visibility='hidden';
    } else {
      document.getElementById("btnProses").style.visibility='visible';
    }

    document.getElementById("tahun_rkpd_display").innerHTML = data.tahun_rkpd;
    document.getElementById("no_dokumen_display").innerHTML = data.nomor_rkpd;

    $('.nav-tabs a[href="#loaddata"]').tab('show');
    // LoadRekapLoad(id_dokumen_temp);

  });

$( "#id_unit" ).change(function() {
  LoadDokumen($('#id_unit').val());
});


$(document).on('click', '.btnProses', function() {

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$('#ModalProgress').modal('show');

$.ajax({
        type: 'POST',
        url: './prosesTransferData',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun_rkpd' : $('#tahun_rkpd').val(),
        },
        success: function(data) {
          createPesan("Data Berhasil di Load","success");
          $('#tblProgramRKPD').DataTable().ajax.url("./getDataRekap/"+$('#tahun_rkpd').val());
          $('#tblProgramRKPD').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        },
        error: function(data){
          createPesan("Data Gagal di Load","danger");
          $('#tblProgramRKPD').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        }
});
});

$(document).on('click', '.btnUnload', function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');

    $.ajax({
        type: 'POST',
        url: './unLoadProgramRkpd',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun' : $(this).data('tahun_rkpd'),
            'id_ranwal' : $(this).data('id_rkpd_ranwal'),
        },
        success: function(data) {
            createPesan(data.pesan,"success");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
        },
        error: function(data){
            createPesan(data.pesan,"danger");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
        }
    });
});

$(document).on('click', '#btnAddDokumen', function() {

  if($('#id_unit').val()== -1){
    createPesan("Unit Penyusun Rancangan Awal Renja Belum dipilih..!!!","danger");
  } else {
    $('#btnDokumen').removeClass('editDokumen');
     $('#btnDokumen').addClass('addDokumen');
     $('.modal-title').text('Tambah Dokumen Penyusunan Rancangan Awal Renja');
     $('.form-horizontal').show();

     $('#id_dokumen_rkpd').val(null);
     $('#tahun_rkpd').val(tahun_session);
     $('#tanggal_rkpd').val(null);
     $('#tanggal_rkpd_x').val(null);
     $('#nomor_rkpd').val(null);
     $('#uraian_perkada').val();
     $('#id_unit_perencana').val($('#id_unit').val());
     $('#id_unit_perencana_display').val($('#id_unit option:selected').text());
     $('#nama_tandatangan').val(null);

     $('#nip_tandatangan_display').val(null);
      
     $('#nip_tandatangan').val(null);

     $('#btnDelDokumen').hide();
     $('#btnDokumen').show();
     $('#TambahDokumen').modal('show');
  }

});

$('.modal-footer').on('click', '.addDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './addDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'tahun_rkpd': $('#tahun_rkpd').val(),
        'tanggal_rkpd': $('#tanggal_rkpd').val(),
        'nomor_rkpd': $('#nomor_rkpd').val(),
        'uraian_perkada': $('#uraian_perkada').val(),
        'id_unit_perencana': $('#id_unit_perencana').val(),
        'nama_tandatangan': $('#nama_tandatangan').val(),
        'nip_tandatangan': $('#nip_tandatangan').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnEditDokumen', function() {

  var data = dokumen_tbl.row( $(this).parents('tr') ).data();

      $('#btnDokumen').removeClass('addDokumen');
      $('#btnDokumen').addClass('editDokumen');
      $('.modal-title').text('Ubah Dokumen Penyusunan Rancangan Awal Renja');
      $('.form-horizontal').show();

      $('#id_dokumen_rkpd').val(data.id_dokumen_ranwal);
      $('#tahun_rkpd').val(data.tahun_ranwal);
      $('#tanggal_rkpd').val(data.tanggal_ranwal);
      $('#tanggal_rkpd_x').val(formatTgl(data.tanggal_ranwal));
      $('#nomor_rkpd').val(data.nomor_ranwal);
      $('#uraian_perkada').val(data.uraian_perkada);
      $('#id_unit_perencana').val(data.id_unit_renja);
      $('#id_unit_perencana_display').val(data.nm_unit);
      $('#nama_tandatangan').val(data.nama_tandatangan);      
      $('#nip_tandatangan').val(data.nip_tandatangan);
      
      if(data.nip_tandatangan==null){
        $('#nip_tandatangan_display').val(null);
      } else {
        $('#nip_tandatangan_display').val(buatNip(data.nip_tandatangan));
      };

      if(data.flag==1){
        $('#btnDelDokumen').hide();
        $('#btnDokumen').hide();
      } else {
        $('#btnDelDokumen').show();
        $('#btnDokumen').show();
      };

      $('#TambahDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './editDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_rkpd': $('#id_dokumen_rkpd').val(),
        'tahun_rkpd': $('#tahun_rkpd').val(),
        'tanggal_rkpd': $('#tanggal_rkpd').val(),
        'nomor_rkpd': $('#nomor_rkpd').val(),
        'uraian_perkada': $('#uraian_perkada').val(),
        'id_unit_perencana': $('#id_unit_perencana').val(),
        'nama_tandatangan': $('#nama_tandatangan').val(),
        'nip_tandatangan': $('#nip_tandatangan').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnDelDokumen', function() {
  
  $('#btnDelDokumen1').removeClass('delDokumen');
  $('#btnDelDokumen1').addClass('delDokumen');
  $('.form-horizontal').show();

  $('#id_dokumen_hapus').val($('#id_dokumen_rkpd').val());
  $('.ur_dokumen_del').html($('#nomor_rkpd').val());

  $('#HapusDokumen').modal('show');
});

$('.modal-footer').on('click', '.delDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './hapusDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_rkpd': $('#id_dokumen_hapus').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload();
        $('#TambahDokumen').modal('hide');
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnPostingRkpd', function() {

  var data = dokumen_tbl.row( $(this).parents('tr') ).data();
      $('.form-horizontal').show();

      $('#id_dokumen_posting').val(data.id_dokumen_ranwal);
      $('#status_dokumen_posting').val(data.flag);
      $('#tahun_dokumen_posting').val(data.tahun_ranwal);      
      $('#ur_tahun_posting').html(data.tahun_ranwal);
      $('#unit_posting').val(data.id_unit_renja);

      if(data.flag==0){
        $('#ur_status_dokumen_posting').html("Posting");
      } else {
        $('#ur_status_dokumen_posting').html("Un-Posting");
      };

      $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post, status_temp, status_awal;
      if($('#status_dokumen_posting').val()==0){
          status_post = 1;
          status_temp = 2;
          status_awal = 1;
      } else {
          status_post = 0;
          status_temp = 1;
          status_awal = 2;
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      
      $('#StatusProgram').modal('hide');
      $('#ModalProgress').modal('show');

      $.ajax({
          type: 'post',
          url: './postDokumen',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_rkpd': $('#tahun_dokumen_posting').val(),
              'id_dokumen_rkpd': $('#id_dokumen_posting').val(),
              'id_unit': $('#unit_posting').val(),
              'flag': status_post,
              'status': status_temp,
              'status_awal': status_awal,
          },
          success: function(data) {
              dokumen_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#ModalProgress').modal('hide');
          },
          error: function(data){
          dokumen_tbl.ajax.reload();
          $('#ModalProgress').modal('hide');
          createPesan("Data Gagal Diposting (0vdrPD)","danger");
        }
      });
    });

});