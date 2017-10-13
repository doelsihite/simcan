<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Daftar Usulan Musrenbang Desa/Kelurahan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Musrenbang']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div id="pesan"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 id="judul" class="panel-title"> {{ $this->title }}</h2>
                </div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <div class="add">
                      <button id="btnAddMusrendes" type="button" class="btn btn-labeled btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Usulan Musrenbang Desa</button>
                    </div>
                    <table id="tblMusrendes" class="table table-striped table-bordered table-responsive compact display" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5px" style="text-align: center; vertical-align:middle">No Urut</th>
                                    <th width="10%" style="text-align: center; vertical-align:middle">Desa/Kelurahan</th>
                                    <th style="text-align: center; vertical-align:middle">Uraian Aktivitas Kegiatan</th>
                                    <th width="10%" style="text-align: center; vertical-align:middle">Volume</th>
                                    <th width="20%" style="text-align: center; vertical-align:middle">Pagu Usulan</th>
                                    <th width="5px" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                    <th width="20px" style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>  
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ModalMusrendes" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalMusrendes" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_musrendes_rw" name="id_musrendes_rw">
                <input type="hidden" id="id_musrendes" name="id_musrendes">
                <input type="hidden" id="tahun_musren" name="tahun_musren">
                <input type="hidden" id="id_desa" name="id_desa">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_usulan" id="no_urut_usulan">
                  </div>
                  <div class="col-sm-3 chkUsulan">
                    <label class="checkbox-inline">
                    <input class="checkUsulan" type="checkbox" name="checkUsulan" id="checkUsulan" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="rtrw">RT / RW :</label>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" id="id_rt" name="id_rt">
                  </div>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" id="id_rw" name="id_rw">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Aktivitas :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_aktivitas_kegiatan" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_aktivitas_asb" name="id_aktivitas_asb">
                    <input type="hidden" id="id_renja" name="id_renja">
                    <input type="hidden" id="id_kegiatan" name="id_kegiatan">
                    <span class="btn btn-sm btn-primary btnCariASB" id="btnCariASB" name="btnCariASB"><i class="glyphicon glyphicon-search"></i></span>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-responsive compact">
                        <thead>
                          <tr>
                            <td width="15%" style="text-align: center; vertical-align:middle;">Volume</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Satuan</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Harga Satuan</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Jumlah Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="15%" style="text-align: center; vertical-align:middle;">
                                <input type="text" class="form-control number" id="volume" name="volume">
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control" id="ur_satuan" name="ur_satuan" disabled>
                                <input type="hidden" class="form-control number" id="id_satuan" name="id_satuan">
                              </td>                          
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="harga_satuan" name="harga_satuan" disabled>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="jumlah_pagu" name="jumlah_pagu" disabled>
                              </td>
                          </tr>
                        </tbody>
                    </table>
                </div>                  
                </div>
                <div class="form-group">
                  <label for="uraian_kondisi" class="col-sm-3 control-label" align='left'>Keterangan Usulan :</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="uraian_kondisi" id="uraian_kondisi" rows="5"></textarea>
                  </div>
                </div>

              </form>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        <button type="button" id="btnHapusMusrendes" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnMusrendes" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<div id="HapusMusrendes" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Hapus Data Usulan Musrenbang Desa/Kelurahan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musrenrw_hapus" name="id_musrenrw_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Data Usulan ini : <strong><span id="ur_musrenrw_hapus"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi data selanjutnya akan ikut terhapus.....!!!!</strong> 
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnDelMusrendes" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>

<div id="cariAktivitasASB" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 style="text-align: center;">Daftar Aktivitas Kegiatan yang di-Musrenbang-kan</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariAktivitasASB' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle;">No Urut</th>
                            <th style="text-align: center; vertical-align:middle;">Uraian Aktivitas ASB</th>
                            <th width="25%" style="text-align: center; vertical-align:middle;">Jumlah Pagu</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
            </div>
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div>  
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {

function createPesan(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += '<i class="fa fa-exclamation fa-lg fa-fw" aria-hidden="true"></i>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();

$('.number').number(true,0,',', '.');
  
$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var usulan_tbl
    usulan_tbl=$('#tblMusrendes').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "musrenrw/getData"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center", width :"5px"},
                        { data: 'nama_desa', sClass: "dt-left", width :"10%"},
                        { data: 'uraian_aktivitas_kegiatan', sClass: "dt-left"},
                        { data: 'volume', sClass: "dt-center",width :"10%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu', sClass: "dt-right",width :"20%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width :"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, width :"20px", 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });

var cariAktivitasASB
$(document).on('click', '.btnCariASB', function() {
  $('#cariAktivitasASB').modal('show'); 

  cariAktivitasASB = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./renja/blang/getAktivitasASB/"+tahun_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_aktivitas_asb'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#btnAddMusrendes').click(function(){
  $('#btnMusrendes').addClass('addMusrendes');
  $('#btnMusrendes').removeClass('editMusrendes');      
  $('.form-horizontal').show();
  $('.modal-title').text('Tambah Daftar Usulan Musrenbang Desa/Kelurahan');

  $('#ModalMusrendes').modal('show');

});

$('#btnEditMusrendes').click(function(){
  $('#btnMusrendes').removeClass('addMusrendes');
  $('#btnMusrendes').addClass('editMusrendes');      
  $('.form-horizontal').show();
  $('.modal-title').text('Edit Daftar Usulan Musrenbang Desa/Kelurahan');

  $('#ModalMusrendes').modal('show');

});

$(document).on('click', '#btnHapusMusrendes', function() {

  // $('#id_aktivitas_hapus').val($('#id_aktivitas').val());
  // $('#ur_aktivitas_hapus').text($('#ur_aktivitas_kegiatan').val());  

  $('#HapusMusrendes').modal('show');

});

$(document).on('click', '#btnDelMusrendes', function() {
    // $.ajaxSetup({
    //    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    // });

    // $.ajax({
    //   type: 'post',
    //   url: 'forumskpd/forum/hapusAktivitas',
    //   data: {
    //     '_token': $('input[name=_token]').val(),
    //     'id_aktivitas_forum': $('#id_aktivitas_hapus').val()
    //   },
    //   success: function(data) {
        $('#ModalMusrendes').modal('hide'); 
        $('#tblMusrendes').DataTable().ajax.reload();
        createPesan('data.pesan',"info");
    //   }
    // });
});

} );
</script>
@endsection
