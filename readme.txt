1. Nambah fitur forward (650)
2. List antrian data (order by prioritas, tanggal) Fungsi Next (500)
3. Button undo masukin ke baris antrian (350)
4. Tampilkan info user login (Free)
5. Login admin dan user dipisah saja (Free)
6. Go To Next Promp input nomor ticket buat next action (500)
7. Tambahkan module finish (200)
8. Nambahin info default forward di info header (di atas login) (Free)

update script :
module md_home :
- controller md_home
- view vw_home_1
- vier vw_counter

module counter :
- controller md_counter
- model mo_counter

catatan :
- query prioritas belum fix (DONE)
- session login admin dan counter dipisah  (DONE)
- prioritas nilai terendah  (DONE)
- default forward lihat table layanan (DONE)
- forward : (DONE)
  - waktu_ambil (current)
  - waktu_panggil (set 0)
  - id_layanan n group layanan sesuai forwarding
  - status_transaksi n id_* diset 0
- id_user table transaksi itu user login (done)
- no tiket user : no_ticket_awal + no_ticket (DONE)
- position logout paling bawah (DONE)
- position "go to next" di bawah skip button (DONE)
- button finish di bawah button go to next (DONE)
- default forward masuk di fungsi next dan finish (DONE)

query :
ALTER TABLE  `transaksi` ADD  `waktu_finish` TIME NOT NULL ;