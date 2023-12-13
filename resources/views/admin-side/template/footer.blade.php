<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Kelompok 07- PAM 2022</div>

        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</body>
<script>
    $('#deleteproduk').click( function(){
        var produkid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
                title: "Ingin Menghapus "+nama+" ?",
                text: "Sekali Anda menghapus "+nama+" dengan id_produk-"+produkid+", Anda tidak dapat recover produk ini kembali",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location="/produk/hapus/"+produkid+""
                    swal("Data berhasil dihapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus!");
                }
                });
    });


</script>
</html>