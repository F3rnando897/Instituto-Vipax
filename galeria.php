<?php 
include "header.php";
?>

  <main>
    <section class="galeria">
      <a href="#img1"><img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800" alt="Floresta 1"></a>
      <a href="#img2"><img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=800" alt="Floresta 2"></a>
      <a href="#img3"><img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=800" alt="Floresta 3"></a>
      <a href="#img4"><img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800" alt="Floresta 4"></a>
      <a href="#img5"><img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800" alt="Floresta 5"></a>
    </section>
  </main>

  <div id="img1" class="modal">
    <a href="#" class="fechar">&times;</a>
    <a href="#img5" class="prev">&#10094;</a>
    <a href="#img2" class="next">&#10095;</a>
    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=1200" alt="Floresta 1">
  </div>

  <div id="img2" class="modal">
    <a href="#" class="fechar">&times;</a>
    <a href="#img1" class="prev">&#10094;</a>
    <a href="#img3" class="next">&#10095;</a>
    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=1200" alt="Floresta 2">
  </div>

  <div id="img3" class="modal">
    <a href="#" class="fechar">&times;</a>
    <a href="#img2" class="prev">&#10094;</a>
    <a href="#img4" class="next">&#10095;</a>
    <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=1200" alt="Floresta 3">
  </div>

  <div id="img4" class="modal">
    <a href="#" class="fechar">&times;</a>
    <a href="#img3" class="prev">&#10094;</a>
    <a href="#img5" class="next">&#10095;</a>
    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1200" alt="Floresta 4">
  </div>

  <div id="img5" class="modal">
    <a href="#" class="fechar">&times;</a>
    <a href="#img4" class="prev">&#10094;</a>
    <a href="#img1" class="next">&#10095;</a>
    <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200" alt="Floresta 5">
  </div>

<?php 
include "footer.php";
?>