function cargarCategorias() {
    $.ajax({
        method: 'POST',
        url: 'php/fetchCategories.php',
        success: function(sResult) {
            var oResult=sResult?JSON.parse(sResult):undefined;
            if(oResult && !oResult.error && oResult.data){
                $("#carouselOleosContent").empty();
                $("#carouselOleos_thumbnails").empty();
                $("#carouselOleos_slideIndicator").empty();
                for(var i in oResult.data){
                    var sActiveClass=i==0?"active":"";
                    //Indicators
                    var sIndicator='<li data-target="#carouselOleos" data-slide-to="'+i+'" class="'+sActiveClass+' img-thumbnail"></li>';
                    $("#carouselOleos_slideIndicator").append(sIndicator);
                    //Actual Slides
                    var sWrappingDiv = '<div class="carousel-item '+sActiveClass+'" style="background-image: url(\''+encodeURI(oResult.data[i].url)+'\')">';
                    var sSlideInfo= '<div class="carousel-caption d-none d-md-block"><h3>'+oResult.data[i].nombre+'</h3><p>'+oResult.data[i].descripcion+'</p></div>';
                    var sDivClosingTag= '</div>';
                    $("#carouselOleosContent").append(sWrappingDiv+sSlideInfo+sDivClosingTag);
                    //thumbnails
                    var sThumbnail= '<img src="'+oResult.data[i].url+'"  data-target="#carouselOleos" data-slide-to="'+i+'" class="img-thumbnail imagenMiniatura col-xs-3 col-md-3"/>';
                    $("#contenedorOleos").append(sThumbnail);
                }
               
            }else{
                console.error("Error al recoger las categorías");
            }
        }
    });
}