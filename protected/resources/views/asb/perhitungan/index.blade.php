<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <?php
                $this->title = ' Perkada tentang Analiasa Standar Belanja ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul0';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
      </div>
    </div>
    <div id="pesan"></div>
<div class="row">
      <div class="col-md-12">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Perhitungan Analisa Standard Belanja per Tahun</h2>
          </div>

          <div class="panel-body">
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#perkada" aria-controls="perkada" role="tab" data-toggle="tab">Tahun Perhitungan</a></li>
            <li><a href="#kelompok" role="tab" data-toggle="tab">Kelompok</a></li>
            <li><a href="#subkelompok" role="tab" data-toggle="tab">Sub Kelompok</a></li>
            <li><a href="#subsubkelompok" role="tab" data-toggle="tab">Sub Sub Kelompok</a></li>
            <li><a href="#detailaktivitas" role="tab" data-toggle="tab">Aktivitas</a></li>
            <li><a href="#detailkomponen" role="tab" data-toggle="tab">Komponen</a></li>
            <li><a href="#detailrincian" role="tab" data-toggle="tab">Rincian Komponen</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="perkada">
              <br>
              {{-- <div class="add">
                  <p><a class="add-hitungasb btn btn-sm btn-success"><i class="glyphicon glyphicon-ruble"></i> Proses Perhitungan ASB</a>
                  <span class="test-hitung btn btn-sm btn-primary"><i class="glyphicon glyphicon-equalizer"></i> Pencetakan Perhitungan ASB</span></p>
              </div> --}}
              <div class="ui-group-buttons">
                  <a class="test-hitung btn btn-labeled btn-sm btn-primary" role="button"><span class="btn-label"><i class="glyphicon glyphicon-list"></i></span>Pencetakan Perhitungan ASB</a>
                  <div class="or"></div>
                  <a class="add-hitungasb btn btn-labeled btn-sm btn-success" role="button"><span class="btn-label"><i class="fa fa-calculator" aria-hidden="true"></i></span>Proses Perhitungan ASB </a>
              </div>

              <table id='tblPerkada' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10px" style="text-align: center; vertical-align:middle">Tahun Perhitungan</th>
                          <th style="text-align: center; vertical-align:middle">No Perkada ASB</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Tgl Perkada</th>
                          <th width="10px" style="text-align: center; vertical-align:middle">Status</th>
                          <th width="10%px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            
            <div role="tabpanel" class="tab-pane" id="kelompok">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td style="text-align: left; vertical-align:top;"><label id="no_perkada_kel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divKelompok">
              <table id="tblKelompok" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Kelompok Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="subkelompok">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_subkel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_subkel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id=divSubKelompok>
              <table id="tblSubKelompok" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sub Kelompok Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="subsubkelompok">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_sskel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_sskel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_sskel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id=divSubSubKel>
              <table id="tblSubSubKelompok" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sub Sub Kelompok Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="detailaktivitas">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_aktiv" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id=divAktivitas>
              <table id="tblAktivitas" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Aktivitas</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Pemicu Biaya 1</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Pemicu Biaya 2</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="detailkomponen">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_komp" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <table id="tblKomponen" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Nama Komponen</th>
                          <th style="text-align: center; vertical-align:middle">Kode Rekening</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="detailrincian">
            <br>
            <form class="form-horizontal col-sm-12" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Komponen</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_komp_rinc" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id=divRincian>
              <table id="tblRincian" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Nama Komponen</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Jenis Biaya</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Harga Satuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Koef 1</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Koef 2</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Koef 3</th>
                            <th width="15%" style="text-align: center; vertical-align:middle">Jml Pagu</th>
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
  </div>
  </div>
  </div>

  <div id="ProsesHitung" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="tahun_perhitungan" class="col-sm-3 control-label" align='left'>Tahun Perhitungan :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="tahun_perhitungan" id="tahun_perhitungan">
      					 		@foreach($reftahun as $val)
                      <option value={{ $val->tahun }}>{{ $val->tahun }}</option>
      					 		@endforeach
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Nomor Perkada ASB :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="id_perkada" id="id_perkada">
      					 		@foreach($refperkada as $val)
                      <option value={{ $val->id_asb_perkada }}>{{ $val->nomor_perkada }}</option>
      					 		@endforeach
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_zona">Zona dalam Perkada ASB :</label>
                <div class="col-sm-8">
                  <select class="form-control" name="id_zona" id="id_zona">
                    @foreach($refZona as $val)
                      <option value={{ $val->id_zona }}>{{ $val->keterangan_zona }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnProses btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-th-list"></i></span>Proses Hitung</button>
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

  <div id="SimulasiHitung" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="tahun_simulasi" class="col-sm-3 control-label" align='left'>Tahun Perhitungan :</label>
                <div class="col-sm-8">
                  <select class="form-control tahun_simulasi" name="tahun_simulasi" id="tahun_simulasi">
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada_simulasi">Nomor Perkada ASB :</label>
                <div class="col-sm-8">
                  <select class="form-control id_perkada_simulasi" name="id_perkada_simulasi" id="id_perkada_simulasi">
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="aktivitas_simulasi" class="col-sm-3 control-label" align='left'>Aktivitas ASB :</label>
                <div class="col-sm-8">
                  <select class="form-control aktivitas_simulasi" name="aktivitas_simulasi" id="aktivitas_simulasi">
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 1 :</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" id="v1_simulasi" name="v1_simulasi">
                </div>
                {{-- <div class="col-sm-2">
                  <label class="control-label" for="v1_satuan">Satuan :</label>
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="v1_satuan" name="v1_satuan" readonly="">
                </div> --}}
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 2 :</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" id="v2_simulasi" name="v2_simulasi">
                </div>
                {{-- <div class="col-sm-2">
                  <label class="control-label" for="v2_satuan">Satuan :</label>
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="v2_satuan" name="v2_satuan" readonly="">
                </div> --}}
              </div>
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    <button type="button" class="btn btn-sm btn-success btnCetakAktivitas  btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>Cetak Rumus Aktivitas</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-primary btnSimulasi btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooSimulasi" class="glyphicon glyphicon-equalizer"></i></span>Proses Simulasi</button>
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
  </div>

      <!--Modal Komponen Hapus -->
  <div id="UbahStatus" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <form name="frmUbahStatus" class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_perhitungan_status" name="id_perhitungan_status">
              <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Tahun Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="tahun_perhitungan_status" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>No Perkada</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_status" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Status Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;">
                            <label class="radio-inline">
                              <input type="radio" class="status_hitung" name="status_hitung" id="status_hitung" value="0">Draft</label>
                            <label class="radio-inline">
                              <input type="radio" class="status_hitung" name="status_hitung" id="status_hitung" value="1">Aktif</label>
                            <label class="radio-inline">
                              <input type="radio" class="status_hitung" name="status_hitung" id="status_hitung" value="2">Non Aktif</label>
                      </td>
                    </tr>
                  </tbody>
              </table>
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-primary btnUbahStatus btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooSimulasi" class="glyphicon glyphicon-save"></i></span>Update</button>
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

    <div id="HapusHitung" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <form name="frmHapusHitung" class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_perhitungan_hapus" name="id_perhitungan_hapus">
              <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Tahun Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="tahun_perhitungan_hapus" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>No Perkada</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_hapus" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Status Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="status_hitung_hapus" align='left'></label></td>
                    </tr>
                  </tbody>
              </table>
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-danger btnHapusHitung btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooSimulasi" class="glyphicon glyphicon-trash"></i></span>Hapus</button>
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

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
        <div class="text-center">
          <h4><strong>Sedang proses...</strong></h4>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw" style="color:grey;"></i>
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  var id_sk_asb;
  var id_hitung_asb;
  var id_kel_asb;
  var id_subkel_asb;
  var id_subsubkel_asb;
  var id_aktiv_asb;
  var id_komp_asb;
  var id_rinci_asb;
  var nm_sk_asb;
  var nm_kel_asb;
  var nm_subkel_asb;
  var nm_subsubkel_asb;
  var nm_aktiv_asb;
  var nm_komp_asb;
  var nm_rinci_asb;
  var flag_perkada;

  $('[data-toggle="popover"]').popover();

function createPesan(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
};


$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

  var perkada = $('#tblPerkada').DataTable( {
      processing: true,
      serverSide: true,
      "ajax": {"url":"./hitungasb/datahitung"},
      dom: 'bFrtip',
      "autoWidth": false,
      "columns": [
            { data: 'tahun_perhitungan', sClass: "dt-center",width:"10px"},
            { data: 'nomor_perkada'},
            { data: 'tanggal_perkada', sClass: "dt-center",width:"50px",
              render: function (data) {
              var date = new Date(data);
              return date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
            }},
            { data: 'status_perkada', sClass: "dt-center",width:"10px"},
            { data: 'action', 'searchable': false, 'orderable':false,width:"10%", sClass: "dt-center"}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );

  $('#tblPerkada tbody').on( 'dblclick', 'tr', function () {

    var data = perkada.row(this).data();

    id_sk_asb =  data.id_perkada;
    nm_sk_asb =  data.nomor_perkada;
    id_hitung_asb = data.id_perhitungan;
    flag_perkada = data.flag_aktif;

    document.getElementById("no_perkada_kel").innerHTML = data.nomor_perkada;
    
    $('.nav-tabs a[href="#kelompok"]').tab('show');
    $('#tblKelompok').DataTable().ajax.url("./hitungasb/datakelompok/"+id_hitung_asb).load();

  } );

  var kelompok = $('#tblKelompok').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'BFrtip',
      "ajax": {"url":"./hitungasb/datakelompok/0"},
      "language": {
          "decimal": ",",
          "thousands": "."},
      "columns": [
            { data: 'no_urut'},
            { data: 'uraian_kelompok_asb'},
            // { data: 'jml_pagu',
            //   render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );



  $('#tblKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = kelompok.row(this).data();

    id_sk_asb =  data.id_perkada;
    nm_sk_asb =  data.nomor_perkada;
    id_hitung_asb = data.id_perhitungan;
    flag_perkada = data.flag_aktif;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;

    document.getElementById("no_perkada_subkel").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_subkel").innerHTML =data.uraian_kelompok_asb;
    
    $('.nav-tabs a[href="#subkelompok"]').tab('show');
    $('#tblSubKelompok').DataTable().ajax.url("./hitungasb/datasubkelompok/"+id_kel_asb+"/"+id_hitung_asb).load();

  } );

  var subkelompok = $('#tblSubKelompok').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'BFrtip',
      "ajax": {"url":"./hitungasb/datasubkelompok/0/0"},
      "language": {
          "decimal": ",",
          "thousands": "."},
      "columns": [
            { data: 'no_urut'},
            { data: 'uraian_sub_kelompok_asb'},
            // { data: 'jml_pagu',
            //   render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );

  $('#tblSubKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = subkelompok.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;

    document.getElementById("no_perkada_aktiv").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_aktiv").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_aktiv").innerHTML =data.uraian_sub_kelompok_asb;

    $('.nav-tabs a[href="#subsubkelompok"]').tab('show');
    $('#tblSubSubKelompok').DataTable().ajax.url("./hitungasb/datasubsubkelompok/"+id_subkel_asb+"/"+id_hitung_asb).load();

  } );

  var subsubkelompok = $('#tblSubSubKelompok').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'BFrtip',
      "ajax": {"url":"./hitungasb/datasubsubkelompok/0/0"},
      "language": {
          "decimal": ",",
          "thousands": "."},
      "columns": [
            { data: 'no_urut'},
            { data: 'uraian_sub_sub_kelompok_asb'},
            // { data: 'jml_pagu',
            //   render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );

  $('#tblSubSubKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = subsubkelompok.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_subsubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_subsubkel_asb = data.uraian_sub_sub_kelompok_asb;

    document.getElementById("no_perkada_aktiv").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_aktiv").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_aktiv").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_aktiv").innerHTML =data.uraian_sub_sub_kelompok_asb;

    $('.nav-tabs a[href="#detailaktivitas"]').tab('show');
    $('#tblAktivitas').DataTable().ajax.url("./hitungasb/dataaktivitas/"+id_subsubkel_asb+"/"+id_hitung_asb).load();

  } );

  var aktivitas = $('#tblAktivitas').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        dom: 'BFrtip',
        "ajax": {"url": "./hitungasb/dataaktivitas/0/0"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut'},
              { data: 'nm_aktivitas_asb'},
              { data: 'satuan1'},
              { data: 'satuan2'},
              { data: 'jml_pagu',
                render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
              { data: 'action', 'searchable': false, 'orderable':false}
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  });

  $('#tblAktivitas tbody').on( 'dblclick', 'tr', function () {

    var data = aktivitas.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_subsubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_subsubkel_asb = data.uraian_sub_sub_kelompok_asb;
    id_aktiv_asb = data.id_aktivitas_asb;
    nm_aktiv_asb = data.nm_aktivitas_asb;

    document.getElementById("no_perkada_komp").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_komp").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_komp").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_komp").innerHTML =data.uraian_sub_sub_kelompok_asb;
    document.getElementById("nm_aktiv_komp").innerHTML =data.nm_aktivitas_asb;

    $('.nav-tabs a[href="#detailkomponen"]').tab('show');
    $('#tblKomponen').DataTable().ajax.url("./hitungasb/datakomponen/"+id_aktiv_asb+"/"+id_hitung_asb).load();

  } );  

  var komponen = $('#tblKomponen').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        dom: 'BFrtip',
        "ajax": {"url": "./hitungasb/datakomponen/0/0"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut'},
              { data: 'nm_komponen_asb'},
              { data: 'nm_rekening'},
              { data: 'jml_pagu',
                render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  });


  $('#tblKomponen tbody').on( 'dblclick', 'tr', function () {

    var data = komponen.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_subsubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_subsubkel_asb = data.uraian_sub_sub_kelompok_asb;
    id_aktiv_asb = data.id_aktivitas_asb;
    nm_aktiv_asb = data.nm_aktivitas_asb;
    id_komp_asb = data.id_komponen_asb;
    nm_komp_asb = data.nm_komponen_asb;

    document.getElementById("no_perkada_rinc").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_rinc").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_rinc").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_rinc").innerHTML =data.uraian_sub_sub_kelompok_asb;
    document.getElementById("nm_aktiv_rinc").innerHTML =data.nm_aktivitas_asb;
    document.getElementById("nm_komp_rinc").innerHTML =data.nm_komponen_asb;

    $('.nav-tabs a[href="#detailrincian"]').tab('show');
    $('#tblRincian').DataTable().ajax.url("./hitungasb/datarinci/"+id_komp_asb+"/"+id_hitung_asb).load();

  });

  var rincian = $('#tblRincian').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        dom: 'Bfrtip',
        "ajax": {"url": "./hitungasb/datarinci/0/0"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
          { data: 'no_urut'},
          { data: 'uraian_tarif_ssh'},
          { data: 'jenis_display'},
          { data: 'harga_satuan',
            render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp' )},
          { data: 'koefisien1',
            render: $.fn.dataTable.render.number( '.', ',', 4, '' )},
          { data: 'koefisien2',
            render: $.fn.dataTable.render.number( '.', ',', 4, '' )},
          { data: 'koefisien3',
            render: $.fn.dataTable.render.number( '.', ',', 4, '' )},
          { data: 'jml_pagu',
            render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp' )},
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  });

  //tambah perkada
  $(document).on('click', '.add-hitungasb', function() {
    $('.modal-title').text('Proses Perhitungan Pagu ASB Tahunan');
    $('.form-horizontal').show();
    $('#ProsesHitung').modal('show');
  });

  $(document).on('click', '.btnProses', function() {
    $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');
    $('#ProsesHitung').modal('hide');
    $.ajax({
            type: 'POST',
            url: './addPerhitungan',
            data: {
                '_token': $('input[name=_token]').val(),
                'tahun_perhitungan' : $('#tahun_perhitungan').val(),
                'id_perkada' : $('#id_perkada').val(),
            },
            success: function(data) {
              $.ajax({
                  type: 'POST',
                  url: './prosesASB',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'tahun_perhitungan' : $('#tahun_perhitungan').val(),
                      'id_zona' : $('#id_zona').val(),
                  },
                  success: function(data) {
                    createPesan("Proses Perhitungan Berhasil","success");
                    $('#tblPerkada').DataTable().ajax.reload();
                    $('#ModalProgress').modal('hide');
                  },
                  error: function(data) {
                    createPesan("Proses Perhitungan Gagal","danger");
                    $('#tblPerkada').DataTable().ajax.reload();
                    $('#ModalProgress').modal('hide');
                  }
                });

            }
          });
  });

  $(document).on('click', '.edit-status', function() {
    $('.modal-title').text('Perubahan Status Perhitungan ASB');
    document.getElementById("tahun_perhitungan_status").innerHTML = $(this).data('tahun_perhitungan');
    document.getElementById("no_perkada_status").innerHTML = $(this).data('no_perkada');
    $('#id_perhitungan_status').val($(this).data('id_perhitungan'));
    document.frmUbahStatus.status_hitung[$(this).data('flag_aktif')].checked=true;
    $('.form-horizontal').show();
    $('#UbahStatus').modal('show');

    $('.modal-footer').on('click', '.btnUbahStatus', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $('#UbahStatus').modal('hide');
      $.ajax({
          type: 'post',
          url: './UbahStatus',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_perhitungan': $('#id_perhitungan_status').val(),
              'flag_aktif': getStatus(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload();
              createPesan("Proses Posting Perhitungan Berhasil","success");
              $('#ModalProgress').modal('hide');

          }
      });
    });
  });

$(document).on('click', '.hapus-perhitungan', function() {
    $('.modal-title').text('Perubahan Status Perhitungan ASB');
    document.getElementById("tahun_perhitungan_hapus").innerHTML = $(this).data('tahun_perhitungan');
    document.getElementById("no_perkada_hapus").innerHTML = $(this).data('no_perkada');
    document.getElementById("status_hitung_hapus").innerHTML = $(this).data('status_perkada');
    $('#id_perhitungan_hapus').val($(this).data('id_perhitungan'));
    $('.form-horizontal').show();
    $('#HapusHitung').modal('show');

    $('.modal-footer').on('click', '.btnHapusHitung', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $('#HapusHitung').modal('hide');
      $.ajax({
          type: 'post',
          url: './hapusPerhitungan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_perhitungan': $('#id_perhitungan_hapus').val(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload();
              createPesan("Proses Perhitungan Berhasil Dihapus","info");
              $('#ModalProgress').modal('hide');
          }
      });
    });
  });

$(document).on('click', '.test-hitung', function() {
    $('.modal-title').text('Pencetakan Rumus dan Simulasi Aktivitas ASB');
    $('.form-horizontal').show();
    $('#SimulasiHitung').modal('show');

    $.ajax({
          type: "GET",
          url: './getTahunHitung',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="tahun_simulasi"]').empty();
          $('select[name="tahun_simulasi"]').append('<option value="-1">---Pilih Tahun Perhitungan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="tahun_simulasi"]').append('<option value="'+ post.tahun_perhitungan +'">'+ post.tahun_perhitungan +'</option>');
          }
          }
      });

  });

$( ".tahun_simulasi" ).change(function() {
      
      $.ajax({

          type: "GET",
          url: './getPerkadaSimulasi/'+$('#tahun_simulasi').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_perkada_simulasi"]').empty();
          $('select[name="id_perkada_simulasi"]').append('<option value="-1">---Pilih Nomor Perkada---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_perkada_simulasi"]').append('<option value="'+ post.id_perhitungan +'">'+ post.nomor_perkada +'</option>');
          }
          }
      });
    });

$( ".id_perkada_simulasi" ).change(function() {
      
      $.ajax({

          type: "GET",
          url: './getAktivitasSimulasi/'+$('#id_perkada_simulasi').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="aktivitas_simulasi"]').empty();
          $('select[name="aktivitas_simulasi"]').append('<option value="-1">---Pilih Aktivitas---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="aktivitas_simulasi"]').append('<option value="'+ post.id_aktivitas_asb +'">'+ post.nm_aktivitas_asb +'</option>');
          }
          }
      });
    });

function getStatus(){

    var xCheck = document.querySelectorAll('input[name="status_hitung"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.btnSimulasi', function() {

    location.replace('../printHitungSimulasiASB/'+$('#aktivitas_simulasi').val()+'/'+$('#v1_simulasi').val()+'/'+$('#v2_simulasi').val());
    
  });

$(document).on('click', '.btnCetakAktivitas', function() {

    location.replace('../printHitungRumusASB/'+$('#aktivitas_simulasi').val());
    
  });

$(document).on('click', '.print-hitungaktivitas', function() {

    location.replace('../printHitungRumusASB/'+$(this).data('id_aktivitas_asb'));
    
  });



});
</script>
@endsection
