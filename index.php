<!doctype HTML>
<html>
    <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    </head>
    <!-- importante: usar estas librerias en concreto -->
    <script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
    <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.7.2/aframe/build/aframe-ar.js"></script>
    
    <script>

        AFRAME.registerComponent('button', {
            init: function() {

                const gltf = document.querySelector('#animatedApple');

                gltf.addEventListener('click', function(ev, target){
                    gltf.setAttribute('material', 'color: red');

                });
                
                const cubodos = document.querySelector('#animatedBanana');
                cubodos.addEventListener('click', function(ev, target){
                    cubodos.setAttribute('material', 'color: orange');
                });
            }
        });
    </script>
    
    <body style='margin : 0px; overflow: hidden;'>

        <a-scene embedded arjs='sourceType: webcam; debugUIEnabled: false;'
                 vr-mode-ui="enabled: false">

        <!-- importante: emitevents="true" y el atributo button para que funcione el script de arriba -->
        <a-marker preset="hiro" emitevents="true" button> 

            <!-- importante: la clase que pongas en objects tiene que ser la misma de la entity-->
            <a-entity cursor="rayOrigin: mouse; fuse:false" raycaster="objects: .clickable; useWorldCoordinates: true;"></a-entity> 
            
            
            <!-- Importante: class="clickable" y MUY IMPORTANTE: el click solo funciona si el objeto esta pisando el marker-->
            <a-entity class="clickable" id ="animatedApple" geometry="primitive: box" material="color: yellow;" position="-0.6 0 0"></a-entity>
            <a-entity class="clickable" id ="animatedBanana" geometry="primitive: plane" material="color: blue;" position="0.6 0 0"></a-entity>
            
            <!--<a-entity class="clickable" id ="animatedBanana" geometry="primitive: box; width: 1; height: 1; depth: 1" material="color:red" position="0.5 0 0" scale="1 1 1"></a-entity>-->
            
            

        </a-marker>

        <a-entity camera></a-entity>
            
        </a-scene>
    </body>
</html>