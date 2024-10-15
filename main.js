// main.js
import { ARButton } from 'https://cdn.jsdelivr.net/npm/three@0.128.0/examples/jsm/webxr/ARButton.js';

let scene, camera, renderer, controller;
let reticle; // To detect surfaces
let model;   // The 3D model we will load
let hitTestSource = null;
let hitTestSourceRequested = false;

function init() {
  // Create the scene
  scene = new THREE.Scene();

  // Set up camera and renderer for WebXR
  camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 0.01, 20);
  renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
  renderer.setSize(window.innerWidth, window.innerHeight);
  renderer.xr.enabled = true;
  document.body.appendChild(renderer.domElement);

  // Add light
  const light = new THREE.HemisphereLight(0xffffff, 0xbbbbff, 1);
  light.position.set(0.5, 1, 0.25);
  scene.add(light);

  // Set up reticle for surface detection
  reticle = new THREE.Mesh(
    new THREE.RingGeometry(0.15, 0.2, 32).rotateX(-Math.PI / 2),
    new THREE.MeshBasicMaterial({ color: 0x0fefbf })
  );
  reticle.matrixAutoUpdate = false;
  reticle.visible = false;
  scene.add(reticle);

  // Add AR button to enter AR mode
  document.body.appendChild(ARButton.createButton(renderer, { requiredFeatures: ['hit-test'] }));

  // Load the 3D model
  const loader = new THREE.OBJLoader();

  loader.load(
    './Assets/table.obj',
    function (object) {
      model = object;
      model.visible = false; // Hide until placed
      scene.add(model);
    },
    function (xhr) {
      console.log((xhr.loaded / xhr.total * 100) + '% loaded');
    },
    function (error) {
      console.error('An error happened', error);
    }
  );

  // Add AR session event listener for hit-test
  renderer.xr.addEventListener('sessionstart', onSessionStart);

  // Set up AR controller (to detect user gestures)
  controller = renderer.xr.getController(0);
  controller.addEventListener('selectstart', onSelectStart);
  scene.add(controller);

  // Render loop
  renderer.setAnimationLoop(render);
}

function onSessionStart() {
  const session = renderer.xr.getSession();
  session.requestReferenceSpace('viewer').then(referenceSpace => {
    session.requestHitTestSource({ space: referenceSpace }).then(source => {
      hitTestSource = source;
    });
  });
  session.addEventListener('end', () => {
    hitTestSourceRequested = false;
    hitTestSource = null;
  });
}

function render(timestamp, frame) {
  if (model && isRotating) {
      model.rotation.y += 0.01; // Rotate the model slowly when in rotation mode
  }
    
  if (frame) {
    const referenceSpace = renderer.xr.getReferenceSpace();
    const session = renderer.xr.getSession();

    if (hitTestSourceRequested === false) {
      session.requestHitTestSource({ space: referenceSpace }).then((source) => {
        hitTestSource = source;
      });
      hitTestSourceRequested = true;
    }

    if (hitTestSource) {
      const hitTestResults = frame.getHitTestResults(hitTestSource);
      if (hitTestResults.length > 0) {
        const hit = hitTestResults[0];
        const pose = hit.getPose(referenceSpace);
        reticle.visible = true;
        reticle.matrix.fromArray(pose.transform.matrix);

        // Position the model at the reticle location
        if (model && !model.visible) {
          model.position.setFromMatrixPosition(reticle.matrix);
          model.visible = true;
        }
      }
    }
  }

  renderer.render(scene, camera);
}

let isRotating = false;

function onSelectStart(event) {
  if (model && reticle.visible) {
    model.position.setFromMatrixPosition(reticle.matrix);
  }
  isRotating = !isRotating; // Toggle rotation mode
}

init();
