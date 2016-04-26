$(document).ready(function() {
  
  // FOUNDATION INIT
  $(document).foundation();

  // CARRUSELES
  $(".-carrusel-un-item--sin-controles").owlCarousel({
    autoPlay: true,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    pagination : false
  });

  $(".-carrusel-tres-items--paginacion").owlCarousel({
    autoPlay: true,
    navigation: false,
    pagination: true,
    items : 3,
    itemsDesktop : [1200,3],
    itemsDesktopSmall : [400,1]
  });

  $(".-carrusel-tres-items--navegacion").owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: ["←","→"],
    pagination: false,
    items : 3,
    itemsDesktop : [1200,3],
    itemsDesktopSmall : [400,1]
  });

  $(".-carrusel-cuatro-items--navegacion").owlCarousel({
    autoPlay: true,
    navigation: true,
    navigationText: ["←","→"],
    pagination: false,
    items : 4,
    itemsDesktop : [1200,3],
    itemsDesktopSmall : [400,1]
  });

  // Nombre del autor
  var autorNombre = $('.autor-contenedor .autor-nombre h3').text();
  $('.js-autor-nombre').text(autorNombre);

  // Alterna los escaparates
  $('.escaparate:nth-child(odd)').addClass('girado');
  $('.girado .escaparate-texto').addClass('medium-push-6');
  $('.girado .escaparate-imagen').addClass('medium-pull-6');

});

