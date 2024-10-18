<!DOCTYPE html>
<html lang="en">
   <head>
        <title>Slider WebAR</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <script src="https://aframe.io/releases/0.9.2/aframe.min.js"></script>
        <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.7.2/aframe/build/aframe-ar.js"></script>
        <script src="js/swiped-events.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/aframe-event-set-component@^4.0.0/dist/aframe-event-set-component.min.js"></script>
        <script>

	        AFRAME.registerComponent('button', {
	            init: function() {

	                const gltf = document.querySelector('#boton_weed');

	                gltf.addEventListener('click', function(ev, target){
	                    gltf.setAttribute('scale', '0 0 0');

	                });
	                
	                const cubodos = document.querySelector('#animatedBanana');
	                cubodos.addEventListener('click', function(ev, target){
	                    cubodos.setAttribute('material', 'color: orange');
	                });
	            }
	        });
	    </script>

		<style type="text/css">
			
		</style>

    </head>
    <body data-swipe-threshold="100">

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
		        button
		      	>

		      	<a-entity cursor="rayOrigin: mouse" raycaster="objects: .clickable; useWorldCoordinates: true;"></a-entity> 
	        

		        <a-entity obj-model="obj: neon/texto.obj" scale="0.05 0.05 0.05" material="color: #fff01f; emissive: #ffee80; emissiveIntensity: 0.21; metalness: 0.42; roughness: 0.48"></a-entity>
		        <a-entity obj-model="obj: neon/neon.obj" scale="0.05 0.05 0.05" material="src: neon/brillo.png; transparent: true; side: double"></a-entity>

		        <a-entity class="clickable" id ="animatedApple" geometry="primitive: box" material="color: yellow;" position="-0.6 0 0"></a-entity>
		        
		        <a-entity text="value: WEED; color: #f5d400; side: double; wrapCount: 11; align: right; negate: false; letterSpacing: 4;" position="-1 1.3 0" scale="1 1 0.01" id="boton_weed" class="clickable" ></a-entity>

		        <a-entity text="value: HASH; color: #f5d400; side: double; wrapCount: 11; align: center; negate: false; letterSpacing: 4;" position="0 1.3 0"></a-entity>

		        <a-entity text="value: PREROLLED; color: #f5d400; side: double; wrapCount: 11; align: left; negate: false; letterSpacing: 4;" position="1 1.3 0"></a-entity>
		        
		      	                   
	        </a-marker>
	          
			
	        
	      	<a-entity camera="near:0.01; far:10000"> </a-entity>
          
      	</a-scene>
      	
    </body>
</html>