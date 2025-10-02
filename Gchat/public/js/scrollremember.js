  // Simpan posisi scroll sebelum user pindah halaman
  window.addEventListener("beforeunload", function () {
    sessionStorage.setItem("scrollPos", window.scrollY);
  });

  // Setelah reload, kembalikan scroll ke posisi terakhir
  window.addEventListener("load", function () {
    const scrollPos = sessionStorage.getItem("scrollPos");
    if (scrollPos) {
      window.scrollTo(0, parseInt(scrollPos));
    }
  });