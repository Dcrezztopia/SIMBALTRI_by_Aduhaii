USE simbaltri;

CREATE TABLE permohonan_surat (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nama_pemohon VARCHAR(30) NOT NULL,
    tempat_lahir VARCHAR(20),
    tanggal_lahir DATE,
    jenis_kelamin ENUM('L', 'P'),
    kewarganegaraan VARCHAR(30),
    alamat VARCHAR(30),
    perihal VARCHAR(50),
    tanggal_dibuat DATE
);

CREATE TABLE bansos (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nama VARCHAR(30),
	jenis VARCHAR(20),
	periode_mulai DATE,
    periode_selesai DATE,
	`status` VARCHAR(20)
);

INSERT INTO bansos (nama, jenis, periode_mulai, periode_selesai, `status`)
	VALUE ('Bansos B', 'Jenis B', '2024-1-1', '2025-1-1', 'berlangsung');

CREATE TABLE permintaan_bansos (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nik INT,
	nama VARCHAR(30),
	tempat_lahir VARCHAR(30),
	tanggal_lahir DATE,
	jenis_kelamin ENUM('L', 'P'),
	alamat VARCHAR(30),
	kewarganegaraan VARCHAR(30),
	tagihan_listrik INT,
	tagihan_air INT,
	jenis_tagihan_air VARCHAR(20)
);

