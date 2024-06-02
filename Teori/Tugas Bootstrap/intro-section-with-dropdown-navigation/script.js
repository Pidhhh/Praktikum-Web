//memastikan agar kode program mengikuti peraturan ketat untuk menghindari error
"use strict"; 

//memeriksa elemen daftar navigasi utama dan tombol toggle menu samping
const navList = document.querySelector(`.nav__list`);
const sideMenutombol = document.querySelector(".side-menu-tombol");

//memeriksa ukuran layar kecil sacara awal (kurang dari atau sama dengan 760px)
let widthMatch = window.matchMedia("(max-width: 47.5em)");
let closeTimer;

// berfungsi untuk menyembunyikan menu dropdown
const closePopMenu = function (menu) {
  // menambahkan class "hidden" untuk menyembunyikan menu
  menu.classList.add("hidden");
  // mengubah sumber gambar untuk menunjukkan keadaan tertutup
  menu.querySelector("img").src = menu.querySelector("img").dataset.srcdown;
};

// berfungsi untuk membuka menu dropdown
const openPopMenu = function (menu) {
  // menghapus timer yang ada yang mungkin menutup menu
  clearInterval(closeTimer);
  // Hapus class "hidden" untuk menampilkan menu
  menu.classList.remove("hidden");
  // mengubah sumber gambar untuk menunjukkan keadaan terbuka (ganti dengan logika aktual)
  menu.querySelector("img").src =
    menu.closest(".menu").querySelector("img").dataset.srcup;
};

// Fungsi untuk menangani event hover mouse (untuk layar besar)
const mouseOverHandler = function (e) {
  console.log("Mouse diarahkan ke item menu atau elemen anaknya"); // Untuk debugging

  // Jika tidak melayang di atas menu atau popup-nya, keluar dari fungsi
  if (!e.target.parentElement.classList.contains("menu") &&
      !e.target.classList.contains("popMenu")) {
    return;
  }

  // Temukan elemen menu terdekat yang diarahkan kursor
  const currMenu = e.target.closest(".menu");
  // Tutup semua menu terbuka lainnya
  document.querySelectorAll(".menu").forEach((menu) => closePopMenu(menu));
  // Buka menu yang diarahkan kursor dengan sedikit penundaan untuk menghindari penutupan yang tidak disengaja
  openPopMenu(currMenu);
};

// Fungsi untuk menangani event mouse leave (untuk layar besar)
const mouseLeaveHandler = function (e) {
  // Setel timer untuk menutup menu setelah 1 detik mouse meninggalkan menu
  closeTimer = setTimeout(function () {
    // Tutup semua menu di dalam elemen yang ditinggalkan
    e.target.querySelectorAll(".menu").forEach((menu) => closePopMenu(menu));
  }, 1000);
};

// Fungsi untuk menangani event klik (untuk layar kecil)
const clickHandler = function (e) {
  console.log("Item menu diklik (untuk layar kecil)"); // Untuk debugging

  // Jika tidak mengklik menu atau popup-nya, keluar dari fungsi
  if (!e.target.parentElement.classList.contains("menu") &&
      !e.target.classList.contains("popMenu")) {
    return;
  }

  // Temukan elemen menu terdekat yang diklik
  const currMenu = e.target.closest(".menu");

  // Toggle class "hidden" untuk membuka atau menutup menu
  currMenu.classList.toggle("hidden");
};

// Ganti event listener secara otomatis berdasarkan ukuran layar
widthMatch.addEventListener("change", function (mm) {
  if (mm.matches) { // Jika layar kecil
    // Hapus listener hover/leave (tidak berlaku untuk layar kecil)
    navList.removeEventListener("mouseover", mouseOverHandler);
    navList.removeEventListener("mouseleave", mouseLeaveHandler);

    // Tambahkan listener klik untuk interaksi menu
    navList.addEventListener("click", clickHandler);
  } else { // Jika layar besar
    // Hapus listener klik (tidak berlaku untuk layar besar)
    navList.removeEventListener("click", clickHandler);

    // Tambahkan listener hover/leave untuk interaksi menu
    navList.addEventListener("mouseover", mouseOverHandler);
    navList.addEventListener("mouseleave", mouseLeaveHandler);
  }
});

// Menunggu event klik pada tombol toggle menu samping
sideMenutombol.addEventListener("click", function (e) {
  // Mencari elemen `.header` terdekat dari tombol toggle
  e.target.closest(".header").classList.toggle("side-open");
  // Mendapatkan informasi posisi tombol toggle (opsional untuk debugging)
  const rect = sideMenutombol.getBoundingClientRect();
  console.log(rect.top, rect.right, rect.bottom, rect.left);
  // Mengambil elemen img (gambar) di dalam tombol toggle
  const imgtombol = sideMenutombol.querySelector("img");
  // Mengubah gambar tombol toggle (terbuka <-> tertutup)
  imgtombol.src =
    imgtombol.src === sideMenutombol.dataset.open
      ? sideMenutombol.dataset.close
      : sideMenutombol.dataset.open;
  // Menambahkan/menghapus class "fixed" (opsional untuk penyesuaian tampilan)
  sideMenutombol.classList.toggle("fixed");
});

/* FIRST EVENT ASSIGNATION */
if (window.innerWidth <= 760) {
  //jika lebar layar kurang dari atau sama dengan 760px (perangkat seluler)
  navList.addEventListener("click", clickHandler);
} else {
  navList.addEventListener("mouseover", mouseOverHandler);
  navList.addEventListener("mouseleave", mouseLeaveHandler);
}