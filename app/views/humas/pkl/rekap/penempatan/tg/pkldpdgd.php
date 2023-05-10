<div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/pkl/index">PKL</a></li>
                <div class="collapse" id="form-elements">
                  <div class="navsubitem">
                    <a class="nav-link" href="<?= BASEURL; ?>/pkl/rekap">Rekap PKL</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/pkl/pembekalan">Pembekalan PKL</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/pkl/pemberkasan">Pemberkasan</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/pkl/prakerin">Prakerin</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/pkl/nilai">Nilai PKL</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/pkl/dtampung">Daya Tampung</a>
                  </div>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL;?>/bkk/index">BKK</a></li>
                  <div class="navsubitem">
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/das">Alumni Sukses</a>
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/mou">MoU</a>
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/peminatan">Peminatan</a>
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/workshop">Workshop</a>
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/kebekerjaan">Kebekerjaan</a>
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/spw">SPW</a>
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/lomba">Lomba</a>
                    <a class="nav-link" href="<?= BASEURL;?>/bkk/loker">Lowongan Kerja</a>
                  </div>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/ict/index">ICT</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASEURL; ?>/stiru/index">Studi Tiru</a></li>
              </ul>
            </div>
            </li>  
        </ul>
      </nav> 
     
     <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Penempatan Teknik Grafika</h3>
                  <h6 class="font-weight-normal mb-0"><a class="text-dark" href="<? BASEURL; ?>/pkl"> Laman PKL</a> | <a class="text-dark" href="<? BASEURL; ?>/pkl/rekap"> Rekapitulasi </a> | <a class="text-dark" href="<? BASEURL; ?>/pkl/penempatan"> Data Penempatan </a> | <span class="text-primary"> Teknik Grafika </span></h6>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                     <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                       <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                         DG D
                       </button>
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                       <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatandga">DG A</a>
                         <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatandgb">DG B</a>
                         <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatandgc">DG C</a>
                         <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatandgd">DG D</a>
                         <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatanpda">PD A</a>
                         <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatanpdb">PD B</a>
                         <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatanpdc">PD C</a>
                         <a class="dropdown-item" href="<?= BASEURL; ?>/pkl/penempatanpdd">PD D</a>
                       </div>
                     </div>
                    </div>
                   </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="template-demo">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            </div>
            </div>

            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="nisn" class="col-form-label">NISN</label>
                        <input type="number" class="form-control" id="nisn">
                      </div>
                      <div class="form-group">
                        <label for="nis" class="col-form-label">NIS</label>
                        <input type="text" class="form-control" id="nis">
                      </div>
                      <div class="form-group">
                        <label for="nama" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="nama">
                      </div>
                      <div class="form-group">
                        <label for="kelas" class="col-form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas">
                      </div>
                      <div class="form-group">
                        <label for="perusahaan" class="col-form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-fw" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Data</button>
                  </div>
                </div>
              </div>
            </div>
        </div>

        

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
            <div class="table-responsive ">
              <table class="table table-hover" id="tabledptg">  
                  <thead>
                    <tr>
                      <th>Aksi</th>
                      <th>NISN</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Nama Perusahaan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><label class="badge badge-info"><i class="mdi mdi-information-variant"></i></label>
                        <label class="badge badge-success"><i class="mdi mdi-lead-pencil"></i></label>
                        <label class="badge badge-danger"><i class="mdi mdi-delete"></i></label></td>
                      <td>0071789957</td>
                      <td>2276/1772/063</td>
                      <td>Raib</td>
                      <td>XII DG D</td>
                      <td>Pt. Paralel</td>
                    </tr>
                </tbody>
                </table>
          </div>
          </div>
          </div>
          </div>
          </div>
                
       
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. SIMAS. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function () {
        $('#tabledptg').DataTable();
    } ) ;
  </script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
