DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("admin","21232f297a57a5a743894a0e4a801fc3","Malik Fajar","Aktif","admin");



DROP TABLE IF EXISTS guru_kelas;

CREATE TABLE `guru_kelas` (
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `telp_guru` varchar(13) NOT NULL,
  `status` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id_kelas` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO guru_kelas VALUES("1234567890","Susanti          ","e807f1fcf82d132f9bb018ca6738a19f","Blitar","1985-01-01","Islam","081233344771 ","Aktif","../../upload/default.png","guru","1");
INSERT INTO guru_kelas VALUES("1234567891","Maliika ","0f7e44a922df352c05c5f73cb40ba115","Blitar","1985-11-11","Islam","085791447711 ","Aktif","../../upload/default.png","guru","2");
INSERT INTO guru_kelas VALUES("1234567892","Dadang ","d893377c9d852e09874125b10a0e4f66","Malang","1985-04-01","Islam","78866745 ","Aktif","../../upload/default.png","guru","3");
INSERT INTO guru_kelas VALUES("1234567893","Karina  ","43042f668f07adfd174cb1823d4795e1","Blitar","1985-11-05","Islam","65765876689  ","Aktif","../../upload/default.png","guru","4");
INSERT INTO guru_kelas VALUES("1234567894","Denada ","f66f4446648ae7ae56419eca43bf2b8a","Malang","1985-07-01","Islam","5645345435 ","Aktif","../../upload/default.png","guru","5");
INSERT INTO guru_kelas VALUES("1234567895","Selvy  Y     ","1665519df638f09d0610de6985fbdc33","MAlang","1985-04-01","Islam","334534575    ","Aktif","../../upload/default.png","guru","6");



DROP TABLE IF EXISTS kelas;

CREATE TABLE `kelas` (
  `id_kelas` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO kelas VALUES("1","Kelas 1");
INSERT INTO kelas VALUES("2","Kelas 2");
INSERT INTO kelas VALUES("3","Kelas 3");
INSERT INTO kelas VALUES("4","Kelas 4");
INSERT INTO kelas VALUES("5","Kelas 5");
INSERT INTO kelas VALUES("6","Kelas 6");



DROP TABLE IF EXISTS mapel;

CREATE TABLE `mapel` (
  `id_mapel` int(2) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO mapel VALUES("1","Bahasa Indonesia");
INSERT INTO mapel VALUES("2","Matematika");
INSERT INTO mapel VALUES("3","PJOK");
INSERT INTO mapel VALUES("4","Agama");
INSERT INTO mapel VALUES("5","PKN");



DROP TABLE IF EXISTS mapel_detail;

CREATE TABLE `mapel_detail` (
  `id_mapel` int(2) NOT NULL DEFAULT '0',
  `id_kelas` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mapel_detail VALUES("1","2");
INSERT INTO mapel_detail VALUES("1","3");
INSERT INTO mapel_detail VALUES("1","4");
INSERT INTO mapel_detail VALUES("1","5");
INSERT INTO mapel_detail VALUES("2","1");
INSERT INTO mapel_detail VALUES("2","2");
INSERT INTO mapel_detail VALUES("2","3");
INSERT INTO mapel_detail VALUES("2","4");
INSERT INTO mapel_detail VALUES("2","5");
INSERT INTO mapel_detail VALUES("2","6");
INSERT INTO mapel_detail VALUES("3","3");
INSERT INTO mapel_detail VALUES("3","4");
INSERT INTO mapel_detail VALUES("3","5");
INSERT INTO mapel_detail VALUES("3","6");
INSERT INTO mapel_detail VALUES("4","3");
INSERT INTO mapel_detail VALUES("4","4");
INSERT INTO mapel_detail VALUES("4","5");
INSERT INTO mapel_detail VALUES("4","6");
INSERT INTO mapel_detail VALUES("5","1");
INSERT INTO mapel_detail VALUES("5","2");
INSERT INTO mapel_detail VALUES("5","3");
INSERT INTO mapel_detail VALUES("5","4");
INSERT INTO mapel_detail VALUES("5","5");
INSERT INTO mapel_detail VALUES("5","6");



DROP TABLE IF EXISTS nilai;

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL DEFAULT '',
  `id_kelas` int(2) NOT NULL DEFAULT '0',
  `id_mapel` int(2) NOT NULL DEFAULT '0',
  `tahun_ajaran` year(4) NOT NULL DEFAULT '2017',
  `semester` varchar(20) NOT NULL DEFAULT '',
  `ulangan_1` int(3) NOT NULL DEFAULT '0',
  `ulangan_2` int(3) NOT NULL DEFAULT '0',
  `ulangan_3` int(3) NOT NULL DEFAULT '0',
  `uts` int(3) NOT NULL DEFAULT '0',
  `uas` int(3) NOT NULL DEFAULT '0',
  `kd_1` int(3) NOT NULL DEFAULT '0',
  `kd_2` int(3) NOT NULL DEFAULT '0',
  `kd_3` int(3) NOT NULL DEFAULT '0',
  `kd_4` int(3) NOT NULL DEFAULT '0',
  `doa` int(3) NOT NULL DEFAULT '0',
  `salam` int(3) NOT NULL DEFAULT '0',
  `tadarus` int(3) NOT NULL DEFAULT '0',
  `sholat` int(3) NOT NULL DEFAULT '0',
  `jujur` int(3) NOT NULL DEFAULT '0',
  `disiplin` int(3) NOT NULL DEFAULT '0',
  `tg_jawab` int(3) NOT NULL DEFAULT '0',
  `toleransi` int(3) NOT NULL DEFAULT '0',
  `gt_royong` int(3) NOT NULL DEFAULT '0',
  `santun` int(3) NOT NULL DEFAULT '0',
  `percaya_diri` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO nilai VALUES("1","001","1","1","2017","Ganjil","70","70","70","70","70","70","70","70","70","70","70","70","70","70","70","70","70","70","70","70");
INSERT INTO nilai VALUES("2","002","1","1","2017","Ganjil","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80");
INSERT INTO nilai VALUES("3","003","1","1","2017","Ganjil","90","90","90","90","90","90","90","90","90","90","90","90","90","90","90","90","90","90","90","90");
INSERT INTO nilai VALUES("4","004","1","1","2017","Ganjil","80","80","80","80","80","80","80","80","80","80","80","80","80","80","88","80","80","80","80","80");
INSERT INTO nilai VALUES("5","005","1","1","2017","Ganjil","85","85","85","85","85","85","85","85","85","85","85","85","85","85","85","85","85","85","85","85");
INSERT INTO nilai VALUES("6","006","1","1","2017","Ganjil","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80","80");



DROP TABLE IF EXISTS siswa;

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp_siswa` varchar(13) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_kelas` int(2) NOT NULL DEFAULT '0',
  `level` varchar(20) NOT NULL,
  `tahun_angkatan` year(4) NOT NULL DEFAULT '2017',
  `tahun_ajaran` year(4) NOT NULL DEFAULT '2017',
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO siswa VALUES("001","dc5c7986daef50c1e02ab09b442ee34f","junior ","2017-01-01","Islam","jl klayatan","002 ","Pelajar","../../upload/default.png","2","siswa","2017","2017");
INSERT INTO siswa VALUES("002","93dd4de5cddba2c733c65f233097f05a","jerry ","2017-01-01","Islam","jl bayam","0812 ","Pelajar","../../upload/default.png","2","siswa","2017","2017");
INSERT INTO siswa VALUES("003","e88a49bccde359f0cabb40db83ba6080","dedek bayi ","2017-01-01","Islam","jl rahim","0833 ","Pelajar","../../upload/default.png","3","siswa","2017","2017");
INSERT INTO siswa VALUES("004","11364907cf269dd2183b64287156072a","jirro ","2017-01-01","Islam","jl rumah","099 ","Pelajar","../../upload/default.png","4","siswa","2017","2017");
INSERT INTO siswa VALUES("005","ce08becc73195df12d99d761bfbba68d","bonny ","2017-01-01","Islam","jl tikus","098 ","Pelajar","../../upload/default.png","5","siswa","2017","2017");
INSERT INTO siswa VALUES("006","568628e0d993b1973adc718237da6e93","cantik ","2017-01-01","Islam","jl ayu","0877 ","Pelajar","../../upload/default.png","6","siswa","2017","2017");
INSERT INTO siswa VALUES("007","9e94b15ed312fa42232fd87a55db0d39","maung ","2017-01-01","Islam","jl buncis","0123 ","Pelajar","../../upload/default.png","3","siswa","2017","2017");
INSERT INTO siswa VALUES("008","a13ee062eff9d7295bfc800a11f33704","barry ","2017-01-01","Islam","jl dimoro","0125 ","Pelajar","../../upload/default.png","4","siswa","2017","2017");
INSERT INTO siswa VALUES("009","dc5e819e186f11ef3f59e6c7d6830c35","lala ","2017-01-01","Islam","jl candi","0341 ","Pelajar","../../upload/default.png","5","siswa","2017","2017");
INSERT INTO siswa VALUES("010","ea20a043c08f5168d4409ff4144f32e2","dipsy ","2017-01-01","Islam","jl teletubis","0342 ","Pelajar","../../upload/default.png","6","siswa","2017","2017");
INSERT INTO siswa VALUES("111","698d51a19d8a121ce581499d7b701668","1112 ","2017-01-01","Islam","11112","1112 ","Pelajar","../../upload/default.png","1","siswa","2017","2017");
INSERT INTO siswa VALUES("1231","6c14da109e294d1e8155be8aa4b1ce8e","Janny  ","2017-01-01","Islam","selopuro","1234233432  ","Pelajar","../../upload/default.png","1","siswa","2017","2017");
INSERT INTO siswa VALUES("1234","81dc9bdb52d04dc20036dbd8313ed055","Sumiati      ","2017-01-01","Islam","Tangil","085791447711 ","Pelajar","../../upload/default.png","1","siswa","2017","2017");



