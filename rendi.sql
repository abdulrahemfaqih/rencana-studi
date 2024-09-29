
CREATE TABLE `semester` (
  `id` int primary key not NULL auto_increment,
  `kode_semester` char(1),
  `nama` varchar(10)
);
CREATE TABLE `rencana studi` (
  `id` int primary key not NULL auto_increment,
  `semester_id` int,
  `total_sks` int,
  `target_ip` int,
  `deskripsi` int NULL,
   FOREIGN KEY (`semester_id`) REFERENCES `semester`(`id`)

);



CREATE TABLE `matakuliah` (
  `id` int primary key not NULL auto_increment,
  `nama` varchar(50),
  `sks` int,
  `deksripsi` text NULL,
  `prasyarat_id` int ,
  FOREIGN KEY (`prasyarat_id`) REFERENCES `matakuliah`(`id`)
);

CREATE TABLE `bobot_nilai` (
  `id` int primary key not NULL auto_increment,
  `predikat` varchar(2),
  `bobot` float
);

CREATE TABLE `detail_rencana_studi` (
  `id` int primary key not NULL auto_increment,
  `matakuliah_id` int,
  `rencana_studi_id` int,
  `bobot_nilai_id` int,
  FOREIGN KEY (`bobot_nilai_id`) REFERENCES `bobot_nilai`(`id`),
  FOREIGN KEY (`matakuliah_id`) REFERENCES `matakuliah`(`id`),
  FOREIGN KEY (`rencana_studi_id`) REFERENCES `rencana studi`(`id`)
);

