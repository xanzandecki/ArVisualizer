<!doctype HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

        <link rel="stylesheet" href="https://swiperjs.com/package/swiper-bundle.min.css">

        <script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
        <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.7.2/aframe/build/aframe-ar.js"></script>
        <script src="js/swiped-events.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/aframe-event-set-component@^4.0.0/dist/aframe-event-set-component.min.js"></script>
        <?php
            $total_objetos = count(glob('models/{*.glb}',GLOB_BRACE));
        ?>
        <script>
            function openEditor(){
                window.postMessage('INJECT_AFRAME_INSPECTOR','*');
            }
            function closeEditor(){
            }

            AFRAME.registerComponent('button', {
                init: function() {

                    const button1 = document.querySelector('#button_weed');
                    const button2 = document.querySelector('#button_hash');
                    const button3 = document.querySelector('#button_prerolled');
                    const logo = document.querySelector('#logo');
                    const logo_neon = document.querySelector('#logo_neon');
                    const buttonatras = document.querySelector('#button_atras');
                    const pageweed = document.querySelector('#weed_page');
                    const paginacion = document.querySelector('#hmtl_elements');
                    const escena = document.querySelector('#escena');
                    escena.setAttribute('vr-mode-ui', 'enabled:  false');

                    button1.addEventListener('click', function(){
                        button1.setAttribute('scale', '0 0 0');
                        button2.setAttribute('scale', '0 0 0');
                        button3.setAttribute('scale', '0 0 0');
                        logo.setAttribute('scale', '0 0 0');
                        logo_neon.setAttribute('scale', '0 0 0');
                        weed_page.setAttribute('scale', '1 1 1');
                        paginacion.removeAttribute('hidden');

                    });

                    button2.addEventListener('click', function(){
                        button1.setAttribute('scale', '0 0 0');
                        button2.setAttribute('scale', '0 0 0');
                        button3.setAttribute('scale', '0 0 0');
                        logo.setAttribute('scale', '0 0 0');
                        logo_neon.setAttribute('scale', '0 0 0');
                    });

                    button3.addEventListener('click', function(){
                        button1.setAttribute('scale', '0 0 0');
                        button2.setAttribute('scale', '0 0 0');
                        button3.setAttribute('scale', '0 0 0');
                        logo.setAttribute('scale', '0 0 0');
                        logo_neon.setAttribute('scale', '0 0 0');
                    });

                    buttonatras.addEventListener('click', function(){
                        button1.setAttribute('scale', '1 1 0.01');
                        button2.setAttribute('scale', '1 1 0.01');
                        button3.setAttribute('scale', '1 1 0.01');
                        logo.setAttribute('scale', '0.05 0.05 0.05');
                        logo_neon.setAttribute('scale', '0.05 0.05 0.05');
                        pageweed.setAttribute('scale', '0 0 0');
                        paginacion.setAttribute('hidden', 'true');
                    });
                }
            });

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
                z-index: 10;
            }
            #izq img{
                top: calc(50% - 20px);
                left: 10px;
                height: 40px;
                z-index: 1000000;
                position: absolute;
                filter: drop-shadow(0px 0px 2px #fff);
                z-index: 10;
            }

            #drx img{
                top: calc(50% - 20px);
                right: 10px;
                height: 40px;
                z-index: 1000000;
                position: absolute;
                filter: drop-shadow(0px 0px 2px #fff);
                z-index: 10;
            }
        </style>
    </head>
    
    <body style='margin : 0px; overflow: hidden;' data-swipe-threshold="100">

        <div id="hmtl_elements" hidden>
            <div id="paginacion">
                <span id="pagina"></span>
                <span> / </span>
                <span id="pagina_max"></span>
            </div>
            <div id="izq" onclick="izquierda()"><img src="img/flecha_izq.svg"></div>
            <div id="drx" onclick="derecha()"><img src="img/flecha_drx.svg"></div>
        </div>

        <a-scene embedded arjs='sourceType: webcam; debugUIEnabled: false;'
                 vr-mode-ui="enabled: false"
                 loading-screen="enabled: false"
                 device-orientation-permission-ui="enabled:false;"
                 vr-mode-ui="enabled:  true;"
                 id="escena">

        <!-- importante: emitevents="true" y el atributo button para que funcione el script de arriba -->
        <a-marker preset="hiro" emitevents="true" button> 

            <!-- importante: la clase que pongas en objects tiene que ser la misma de la entity-->
            <a-entity cursor="rayOrigin: mouse; fuse: false; downEvents:  ;  upEvents:  "
                 raycaster="objects:  .clickable;  direction:  0 0 -1;  origin:  0 0 0;  useWorldCoordinates:  true; near: 0"
                 device-orientation-permission-ui="enabled"></a-entity>
            <!-- Importante: class="clickable" y MUY IMPORTANTE: el click solo funciona si el objeto esta pisando el marker-->
            <a-entity obj-model="obj: neon/texto.obj" scale="0.05 0.05 0.05" material="color: #fff01f; emissive: #ffee80; emissiveIntensity: 0.21; metalness: 0.42; roughness: 0.48" id ="logo" position=" 0 0.9 0"></a-entity>
            <a-entity obj-model="obj: neon/neon.obj" scale="0.05 0.05 0.05" material="src: neon/brillo.png; transparent: true; side: double" id ="logo_neon" position=" 0 0.9 0"></a-entity>

            <a-plane class="clickable" id ="button_weed" geometry="primitive: plane; height: 0.4" material="src: img/weed.png; side: double" position="-1.1 2.2 0" scale="1 1 0.01"></a-plane>
            <a-entity class="clickable" id ="button_hash" geometry="primitive: box; height: 0.4" material="src: img/hash.png" position="0 2.2 0" scale="1 1 0.01"></a-entity>
            <a-entity class="clickable" id ="button_prerolled" geometry="primitive: box; height: 0.4" material="src: img/prerolled.png" position="1.1 2.2 0" scale="1 1 0.01"></a-entity>
            <a-image loader src="img/25.png" scale="" class="clickable" rotation="-90 0 0" gesture-handler="" material="" geometry=""></a-image>
            
            
            <a-entity scale="0 0 0" id="weed_page">
                
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

                <a-entity class="clickable" id="button_atras" geometry="primitive: box; height: 0.4" material="src: img/atras.png" position="1.1 0.15 0.58" scale="0.7 0.7 0.01"></a-entity>
            </a-entity>
            

        </a-marker>

        <a-entity id="rotationfixer" position="0 0 0" rotation="">
            <a-camera camera="fov: 44; zoom: 0"
                id="camera" position="0 0 0"
                wasd-controls-enabled="false"
                look-controls="enabled: false"
                rotation=""
                wasd-controls=""
                zoom="1.5987500000000001"
                data-aframe-inspector-original-camera=""
                raycaster="objects: .clickable; useWorldCoordinates: false; direction: 0 0 0; near: 1.8;"
                cursor="rayOrigin: mouse; fuse: false; downEvents:  ;  upEvents:  "></a-camera>
        </a-entity>
        
        </a-scene>

        <script>
            openEditor();
            closeEditor();
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