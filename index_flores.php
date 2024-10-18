<!DOCTYPE html>
<html lang="en">
   <head>
        <title>Slider WebAR</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://swiperjs.com/package/swiper-bundle.min.css">
        <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
        <script src="https://raw.githack.com/AR-js-org/AR.js/master/aframe/build/aframe-ar.js"></script>
        <script src="js/swiped-events.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <?php
	    	$total_objetos = count(glob('models/{*.glb}',GLOB_BRACE));
	    ?>
		<script>
		    
		AFRAME.registerComponent('loader', {
		init: function() {
		    	
		    	var max_objetos = <?php echo $total_objetos; ?>;
		    	var max_objetos_1 = 1 + max_objetos;
		        var objetos = 1;
		        $("#pagina").html(objetos);
		        $("#pagina_max").html(max_objetos);
		        let planta_1 = document.querySelector("#glbtest_1");
		        let ar_i_1 = document.querySelector("#text1");
		        let ar_d_1 = document.querySelector("#text2");
		        let ab_i_1 = document.querySelector("#text3");
		        let ab_d_1 = document.querySelector("#text4");
		        let logo_1 = document.querySelector("#logo");
		        var modelo = "models/flor";
		        var ab_i = "img/ab_i";
		        var ab_d = "img/ab_d";
		        var ar_i = "img/ar_i";
		        var ar_d = "img/ar_d";
		        var logo = "img/logo";

		        document.addEventListener('swiped-left', function(e) {
		            objetos = objetos + 1;
			        if (objetos >= max_objetos_1) {
			            objetos = 1;
			        }

		            modelo += objetos;
		        	modelo += ".glb";
		        	planta_1.setAttribute("gltf-model", modelo);
		        	modelo = "models/flor";

		        	ab_i += objetos;
		        	ab_i += ".png";
		        	ab_i_1.setAttribute("src", ab_i);
		        	ab_i = "img/ab_i";

		        	ab_d += objetos;
		        	ab_d += ".png";
		        	ab_d_1.setAttribute("src", ab_d);
		        	ab_d = "img/ab_d";

		        	ar_i += objetos;
		        	ar_i += ".png";
		        	ar_i_1.setAttribute("src", ar_i);
		        	ar_i = "img/ar_i";

		        	ar_d += objetos;
		        	ar_d += ".png";
		        	ar_d_1.setAttribute("src", ar_d);
		        	ar_d = "img/ar_d";

					$("#pagina").html(objetos);
		        });

		        document.addEventListener('swiped-right', function(e) {
		            objetos = objetos - 1;
		            if (objetos <= 0) {
			            objetos = max_objetos;
			        }

			        modelo += objetos;
		        	modelo += ".glb";
		        	planta_1.setAttribute("gltf-model", modelo);
		        	modelo = "models/flor";

		        	ab_i += objetos;
		        	ab_i += ".png";
		        	ab_i_1.setAttribute("src", ab_i);
		        	ab_i = "img/ab_i";

		        	ab_d += objetos;
		        	ab_d += ".png";
		        	ab_d_1.setAttribute("src", ab_d);
		        	ab_d = "img/ab_d";

		        	ar_i += objetos;
		        	ar_i += ".png";
		        	ar_i_1.setAttribute("src", ar_i);
		        	ar_i = "img/ar_i";

		        	ar_d += objetos;
		        	ar_d += ".png";
		        	ar_d_1.setAttribute("src", ar_d);
		        	ar_d = "img/ar_d";

		        	$("#pagina").html(objetos);
		        });
		    }
		})
		</script>

		<style type="text/css">

			#paginacion{
				position: absolute;
			    bottom: 20px;
			    left: calc(50% - 30px);
			    background: #000;
			    padding: 10px 15px;
			    font-family: sans-serif;
			    border-radius: 20px;
			    border: 2px solid #fff;
			    color: #fff;
			}
			#izq img{
				top: calc(50% - 20px);
				left: 10px;
				height: 40px;
				z-index: 1000000;
				position: absolute;
				filter: drop-shadow(0px 0px 2px #fff);
			}

			#drx img{
				top: calc(50% - 20px);
				right: 10px;
				height: 40px;
				z-index: 1000000;
				position: absolute;
				filter: drop-shadow(0px 0px 2px #fff);
			}

			/*

		    html,
		    body {
		      position: relative;
		      height: 100%;
		    }

		    body {
		      background: #eee;
		      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
		      font-size: 14px;
		      color: #000;
		      margin: 0;
		      padding: 0;
		    }

		    .swiper-container {
		      width: 100%;
		      height: 100%;
		    }

		    .swiper-slide {
		      text-align: center;
		      font-size: 18px;
		      background: #fff;

		      display: -webkit-box;
		      display: -ms-flexbox;
		      display: -webkit-flex;
		      display: flex;
		      -webkit-box-pack: center;
		      -ms-flex-pack: center;
		      -webkit-justify-content: center;
		      justify-content: center;
		      -webkit-box-align: center;
		      -ms-flex-align: center;
		      -webkit-align-items: center;
		      align-items: center;
		    }

		    */
		</style>

    </head>
    <body data-swipe-threshold="100">

    	<div id="paginacion">
    		<span id="pagina"></span>
    		<span> / </span>
    		<span id="pagina_max"></span>
    	</div>
    	<div id="izq" onclick="izquierda()"><img src="img/flecha_izq.svg"></div>
    	<div id="drx" onclick="derecha()"><img src="img/flecha_drx.svg"></div>

    	<!-- <div class="swiper-container">
		    <div class="swiper-wrapper">
		      <div class="swiper-slide">Slide 1</div>
		      <div class="swiper-slide">Slide 2</div>
		      <div class="swiper-slide">Slide 3</div>
		      <div class="swiper-slide">Slide 4</div>
		      <div class="swiper-slide">Slide 5</div>
		      <div class="swiper-slide">Slide 6</div>
		      <div class="swiper-slide">Slide 7</div>
		      <div class="swiper-slide">Slide 8</div>
		      <div class="swiper-slide">Slide 9</div>
		      <div class="swiper-slide">Slide 10</div>
		    </div>
		    <div class="swiper-pagination"></div>
		</div>

		<script src="https://swiperjs.com/package/swiper-bundle.min.js"></script>

		<script>
		    var swiper = new Swiper('.swiper-container', {
		      slidesPerView: 3,
		      spaceBetween: 30,
		      freeMode: true,
		      pagination: {
		        el: '.swiper-pagination',
		        clickable: true,
		      },
		    });
		</script> -->
       
    	<a-scene
	        loading-screen="enabled: false"
	        vr-mode-ui="enabled: false"
	        embedded arjs="sourceType: webcam; debugUIEnabled: false;"
	        renderer="antialias: true; logarithmicDepthBuffer: true;">   

	        <a-marker
		        id="animated-marker"
		        type="pattern"
		        preset="hiro"
		        raycaster="objects: .clickable"
		        emitevents="true"
		        cursor="fuse: false; rayOrigin: mouse;"
		        id="markerA"
		      	>
	        

		        <a-image loader src="img/25.png" scale="" class="clickable" rotation="-90 0 0" gesture-handler="" material="" geometry="">
				</a-image>
				
		        <a-entity id="glbtest_1" gltf-model="models/flor1.glb" position="0.04 -0.66 -0.27" scale="0.06 0.06 0.06">
		        </a-entity>

		        <a-entity>
		            <a-image id="text1" src="img/ar_i1.png" width="5.12" height="5.12" scale="0.4 0.4 0.4" position="-0.7 1.5 -0.1" visible="" material="" geometry="width: 3.85; height: 0.7" rotation="-25.5 27.8 -12.6"></a-image>
		        </a-entity>

		        <a-entity>
		            <a-image id="text2" src="img/ar_d1.png" width="5.12" height="5.12" scale="0.4 0.4 0.4" position="0.7 1.5 -0.1" visible="" material="" geometry="width: 3.85; height: 0.7" rotation="-25.5 -27.8 12.6"></a-image>
		        </a-entity>

		        <a-entity>
		            <a-image id="text3" src="img/ab_i1.png" width="5.12" height="5.12" scale="0.4 0.4 0.4" position="-0.7 0.8 -0.1" visible="" material="" geometry="width: 3; height: 2.5" rotation="-25.5 27.8 -12.6"></a-image>
		        </a-entity>

		        <a-entity>
		            <a-image id="text4" src="img/ab_d1.png" width="5.12" height="5.12" scale="0.4 0.4 0.4" position="0.7 0.8 -0.1" visible="" material="" geometry="width: 3; height: 2.5" rotation="-25.5 -27.8 12.6"></a-image>
		        </a-entity>
		        
		        <a-entity>
		            <a-image id="logo" src="img/logo1.png" width="5.12" height="5.12" scale="1 0.2 1" position="0 1.9 -0.1" visible="" material="" geometry="width: 3; height: 2.5" rotation="-25 0 0"></a-image>
		        </a-entity>
		        
		      	                   
	        </a-marker>
	          	        
	      	<a-entity camera="near:0.01; far:10000"> </a-entity>
          
      	</a-scene>

      	<script>
            function derecha(){
                const swipeleft = new Event('swiped-left');    
                document.dispatchEvent(swipeleft);
	        }
            
            function izquierda(){
                const swiperight = new Event('swiped-right');    
                document.dispatchEvent(swiperight);
	        }
        </script>
    </body>
</html>