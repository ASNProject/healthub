## HEALTHUB

### Clone Project
```
git clone https://github.com/ASNProject/Project-Chart-Sensor.git
```

### Run Project
- Save project to `/XAMPP/htdocs/`
- Import `healthub_db.sql` from database folder to pypmyadmin/mysql
- Open browser, run `localhost/folder_project/index.php`
  - Example : `localhost/healthub/index.php`

### Use API 
```
ADMIN
- GET all admin
/healthub/rest_api/api.php/admin
- GET admin by id
/healthub/rest_api/api.php/admin/1
- POST admin 
/healthub/rest_api/api.php/admin
Body (raw, JSON): { "username": "username", "password": "password" }
- PUT admin id
/healthub/rest_api/api.php/admin/1
Body (raw, JSON): { "username": "username", "password": "password" }
- DELETE admin by id
/healthub/rest_api/api.php/admin/1

PASIEN DATA
- GET all pasiendata
/healthub/rest_api/api.php/pasiendata
- GET pasiendata by nik
/healthub/rest_api/api.php/pasiendata/123456789
- POST pasiendata 
/healthub/rest_api/api.php/pasiendata
Body (raw, JSON): { "nama": "NamaPengguna", "jenis_kelamin": "L/P", "tanggal_lahir": "1 Januari 2000", "nik": "123456789", "berat_badan": "100", "tinggi_badan": "100", "pekerjaan": "Guru", "alamat": "Alamat", }
- PUT pasiendata nik
/healthub/rest_api/api.php/pasiendata/123456789
Body (raw, JSON): { "nama": "NamaPengguna", "jenis_kelamin": "L/P", "tanggal_lahir": "1 Januari 2000", "nik": "123456789", "berat_badan": "100", "tinggi_badan": "100", "pekerjaan": "Guru", "alamat": "Alamat", }
- DELETE pasiendata by id
/healthub/rest_api/api.php/pasiendata/1

HEARTRATES
- GET all heartrate
/healthub/rest_api/api.php/heartrates
- GET heartrate by nik
/healthub/rest_api/api.php/heartrates/123456789
- POST heartrate 
/healthub/rest_api/api.php/heartrates
Body (raw, JSON): { "nama": "NamaPengguna", "nik": "123456789", "sensor1": "NilaiSensor1", "sensor2": "NilaiSensor2" }
- PUT heartrate id
/healthub/rest_api/api.php/heartrate/1
Body (raw, JSON): { "nama": "NamaPengguna", "nik": "123456789", "sensor1": "NilaiSensor1", "sensor2": "NilaiSensor2" }
- DELETE heartrate by id
/healthub/rest_api/api.php/heartrates/1

SATURATION
- GET all saturations
/healthub/rest_api/api.php/saturations
- GET saturations by nik
/healthub/rest_api/api.php/saturations/123456789
- POST saturations 
/healthub/rest_api/api.php/saturations
Body (raw, JSON): { "nama": "NamaPengguna", "nik": "123456789", "sensor1": "NilaiSensor1", "sensor2": "NilaiSensor2" }
- PUT saturations id
/healthub/rest_api/api.php/saturations/1
Body (raw, JSON): { "nama": "NamaPengguna", "nik": "123456789", "sensor1": "NilaiSensor1", "sensor2": "NilaiSensor2" }
- DELETE saturations by id
/healthub/rest_api/api.php/saturations/1

SUHU
- GET all suhu
/healthub/rest_api/api.php/suhu
- GET suhu by nik
/healthub/rest_api/api.php/suhu/123456789
- POST suhu 
/healthub/rest_api/api.php/suhu
Body (raw, JSON): { "nama": "NamaPengguna", "nik": "123456789", "sensor1": "NilaiSensor1", "sensor2": "NilaiSensor2" }
- PUT suhu id
/healthub/rest_api/api.php/suhu/1
Body (raw, JSON): { "nama": "NamaPengguna", "nik": "123456789", "sensor1": "NilaiSensor1", "sensor2": "NilaiSensor2" }
- DELETE suhu by id
/healthub/rest_api/api.php/suhu/1


```
