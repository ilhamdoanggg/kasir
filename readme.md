## readme first!!!!

-- penempatan hosting --
1. jika di windows dengan xampp
	- letakan file di dalam "C:/xampp/htdoct" tanpa sub folder
	- import database dari folder db
	- jalankan service apache dan mysql pada xampp control panel
	- pada web browser address bar ketikan localhost / 127.0.0.1

2. jika di linux
	- pastikan sudah menginstall php v5, phpmyadmin, dan mysql serve atau lebih tinggi
	- import database dari folder db
	- via terminal, masuk ke directory ini, dan jalankan perintah ```php -S localhost:8080```
	- atau bisa membuat virtual hosting tanpa harus menjalankan ```php -S localhost:8080```
	- jalankan service apache dan mysql
	- pada web browser address bar ketikan localhost / 127.0.0.1

3. User and Password
	- user level admin, 
		-- user : admin
		-- Password :admin
	- user level pegawai
		-- user : pegawai
		-- Password :admin