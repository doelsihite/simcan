$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-golongan" ).html() );

    var rek1_tbl, rek2_tbl, rek3_tbl, rek4_tbl, rek5_tbl, rek6_tbl;
    var rek1_temp, rek2_temp, rek3_temp, rek4_temp, rek5_temp, rek6_temp;

    $( '[data-toggle="popover"]' ).popover();

    function createPesan ( message, type ) {
        var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';
        html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        html += '<p><strong>' + message + '</strong></p>';
        html += '</div>';
        $( html ).hide().prependTo( '#pesan' ).slideDown();

        setTimeout( function () {
            $( '#pesanx' ).removeClass( 'in' );
        }, 3500 );
    };

    $( '#prosesbar' ).hide();

    $( '.page-alert .close' ).click( function ( e ) {
        e.preventDefault();
        $( this ).closest( '.page-alert' ).slideUp();
    } );

    $( ".disabled" ).click( function ( e ) {
        e.preventDefault();
        return false;
    } );

    $( '.number' ).number( true, 0, '', '' );

    $( '.display' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true,
        language: {
            "decimal": ",",
            "thousands": ".",
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        },
    } );

    function back2Rek2 () {
        $( '.nav-tabs a[href="#tabrek12"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backBidang', function () {
        back2Rek2();
    } );

    $( document ).on( 'dblclick', '.backBidang', function () {
        back2Rek2();
    } );

    function back2Rek3 () {
        $( '.nav-tabs a[href="#tabrek3"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backProgram', function () {
        back2Rek3();
    } );

    $( document ).on( 'dblclick', '.backProgram', function () {
        back2Rek3();
    } );

    function back2Rek4 () {
        $( '.nav-tabs a[href="#tabrek4"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backKegiatan', function () {
        back2Rek4();
    } );

    $( document ).on( 'dblclick', '.backKegiatan', function () {
        back2Rek4();
    } );

    function back2Rek5 () {
        $( '.nav-tabs a[href="#tabrek5"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backRek5', function () {
        back2Rek5();
    } );

    $( document ).on( 'dblclick', '.backRek5', function () {
        back2Rek5();
    } );

    rek1_tbl = $( '#tblAkun' ).DataTable( {
        processing: true,
        serverSide: true,
        autoWidth: false,
        language: {
            "decimal": ",",
            "thousands": ".",
            "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "sProcessing": "Sedang memproses...",
            "sLengthMenu": "Tampilkan _MENU_ entri",
            "sZeroRecords": "Tidak ditemukan data yang sesuai",
            "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix": "",
            "sSearch": "Cari:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
            }
        },
        "pageLength": 25,
        "lengthMenu": [ [ 25, 50, -1 ], [ 25, 50, "All" ] ],
        "bDestroy": true,
        dom: 'BFRtIP',
        "ajax": { "url": "./sumdana/getListRek1" },
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "searchable": false,
                "data": null,
                "defaultContent": '',
                "width": "5px"
            },
            { data: 'kd_sd_1', sClass: "dt-center", width: "10%" },
            { data: 'uraian_sd_1' },
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    function initTableBidang ( tableId, data ) {
        rek2_tbl = $( '#' + tableId ).DataTable( {
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom: 'BFRtIp',
            autoWidth: false,
            language: {
                "decimal": ",",
                "thousands": ".",
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "pageLength": 25,
            columns: [
                { data: 'kode_sd_2', sClass: "dt-center", width: '10%' },
                { data: 'uraian_sd_2', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = rek2_tbl.row( this ).data();
            rek2_temp = data.id_sd_2;
            $( '#ur_akun_rek3' ).text( data.kd_sd_1 + ' ' + data.uraian_sd_1 );
            $( '#ur_gol_rek3' ).text( data.kode_sd_2 + ' ' + data.uraian_sd_2 );
            $( '.nav-tabs a[href="#tabrek3"]' ).tab( 'show' );
            loadTblJenis( rek2_temp );
        } );

    }

    $( '#tblAkun tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = rek1_tbl.row( tr );
        var tableId = 'golongan-' + row.data().id_sd_1;
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( template( row.data() ) ).show();
            initTableBidang( tableId, row.data() );
            tr.addClass( 'shown' );
            tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
        }
    } );

    function loadTblJenis ( bidang ) {
        rek3_tbl = $( '#tblJenis' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./sumdana/getListRek3/" + bidang },
            language: {
                "decimal": ",",
                "thousands": ".",
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "pageLength": 25,
            "columns": [
                { data: 'kode_sd_3', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sd_3', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListRek4 ( id_program ) {
        rek4_tbl = $( '#tblObyek' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./sumdana/getListRek4/" + id_program },
            language: {
                "decimal": ",",
                "thousands": ".",
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "pageLength": 25,
            "columns": [
                { data: 'kode_sd_4', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sd_4', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListRek5 ( id_kegiatan ) {
        rek5_tbl = $( '#tblRincian' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./sumdana/getListRek5/" + id_kegiatan },
            language: {
                "decimal": ",",
                "thousands": ".",
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "pageLength": 25,
            "columns": [
                { data: 'kode_sd_5', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sd_5', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListRek6 ( id_kegiatan ) {
        rek6_tbl = $( '#tblSubRincian' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./sumdana/getListRek6/" + id_kegiatan },
            language: {
                "decimal": ",",
                "thousands": ".",
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            "pageLength": 25,
            "columns": [
                { data: 'kode_sd_6', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sd_6', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( '#tblJenis tbody' ).on( 'dblclick', 'tr', function () {
        var data = rek3_tbl.row( this ).data();
        rek3_temp = data.id_sd_3;
        $( '#ur_akun_rek4' ).text( data.kd_sd_1 + ' ' + data.uraian_sd_1 );
        $( '#ur_gol_rek4' ).text( data.kode_sd_2 + ' ' + data.uraian_sd_2 );
        $( '#ur_jenis_rek4' ).text( data.kode_sd_3 + ' ' + data.uraian_sd_3 );
        $( '.nav-tabs a[href="#tabrek4"]' ).tab( 'show' );
        LoadListRek4( rek3_temp );
    } );

    $( '#tblObyek tbody' ).on( 'dblclick', 'tr', function () {
        var data = rek4_tbl.row( this ).data();
        rek4_temp = data.id_sd_4;
        $( '#ur_akun_rek5' ).text( data.kd_sd_1 + ' ' + data.uraian_sd_1 );
        $( '#ur_gol_rek5' ).text( data.kode_sd_2 + ' ' + data.uraian_sd_2 );
        $( '#ur_jenis_rek5' ).text( data.kode_sd_3 + ' ' + data.uraian_sd_3 );
        $( '#ur_obyek_rek5' ).text( data.kode_sd_4 + ' ' + data.uraian_sd_4 );
        $( '.nav-tabs a[href="#tabrek5"]' ).tab( 'show' );
        LoadListRek5( rek4_temp );
    } );

    $( '#tblRincian tbody' ).on( 'dblclick', 'tr', function () {
        var data = rek5_tbl.row( this ).data();
        rek5_temp = data.id_sd_5;
        $( '#ur_akun_rek6' ).text( data.kd_sd_1 + ' ' + data.uraian_sd_1 );
        $( '#ur_gol_rek6' ).text( data.kode_sd_2 + ' ' + data.uraian_sd_2 );
        $( '#ur_jenis_rek6' ).text( data.kode_sd_3 + ' ' + data.uraian_sd_3 );
        $( '#ur_obyek_rek6' ).text( data.kode_sd_4 + ' ' + data.uraian_sd_4 );
        $( '#ur_rincian_rek6' ).text( data.kode_sd_5 + ' ' + data.uraian_sd_5 );
        $( '.nav-tabs a[href="#tabrek6"]' ).tab( 'show' );
        LoadListRek6( rek5_temp );
    } );

} ); //end file