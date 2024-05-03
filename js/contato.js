document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExample'), {
      interval: 2100, // Defina o intervalo desejado em milissegundos
      wrap: true // Define se o carrossel deve voltar ao início após a última imagem
    });
  });
  