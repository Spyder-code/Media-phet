<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('/game/2/') }}/TemplateData/favicon.ico">
    <link rel="stylesheet" href="{{ asset('/game/2/') }}/TemplateData/style.css">
    <title>{{ $title }} | Junior Heigh School | PHET</title>
    <style>
        @media screen and (min-width: 320px) and (max-width: 767px) and (orientation: landscape) {
            html {
                transform: rotate(-90deg);
                transform-origin: left top;
                width: 100vh;
                overflow-x: hidden;
                position: absolute;
                top: 100%;
                left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="unity-container" class="unity-desktop">
        <canvas id="unity-canvas" width=960 height=600></canvas>
        <div id="unity-loading-bar">
          <div id="unity-logo"></div>
          <div id="unity-progress-bar-empty">
            <div id="unity-progress-bar-full"></div>
          </div>
        </div>
        <div id="unity-warning"> </div>
        <div id="unity-footer">
          <div id="unity-fullscreen-button"></div>
          <div id="unity-build-title">Education Game Junior Height School</div>
        </div>
      </div>
      <script>
        var container = document.querySelector("#unity-container");
        var canvas = document.querySelector("#unity-canvas");
        var loadingBar = document.querySelector("#unity-loading-bar");
        var progressBarFull = document.querySelector("#unity-progress-bar-full");
        var fullscreenButton = document.querySelector("#unity-fullscreen-button");
        var warningBanner = document.querySelector("#unity-warning");

        // Shows a temporary message banner/ribbon for a few seconds, or
        // a permanent error message on top of the canvas if type=='error'.
        // If type=='warning', a yellow highlight color is used.
        // Modify or remove this function to customize the visually presented
        // way that non-critical warnings and error messages are presented to the
        // user.
        function unityShowBanner(msg, type) {
          function updateBannerVisibility() {
            warningBanner.style.display = warningBanner.children.length ? 'block' : 'none';
          }
          var div = document.createElement('div');
          div.innerHTML = msg;
          warningBanner.appendChild(div);
          if (type == 'error') div.style = 'background: red; padding: 10px;';
          else {
            if (type == 'warning') div.style = 'background: yellow; padding: 10px;';
            setTimeout(function() {
              warningBanner.removeChild(div);
              updateBannerVisibility();
            }, 5000);
          }
          updateBannerVisibility();
        }
        var name = {!! json_encode($name) !!};
        var url = {!! json_encode($url) !!};
        var participant = {!! json_encode($participant) !!};
        var domain = {!! json_encode(url('/')) !!};
        var buildUrl = {!! json_encode(asset('game/2/Build')) !!};
        var loaderUrl = buildUrl + "/Pola Bilangan.loader.js";
        var config = {
          dataUrl: buildUrl + "/Pola Bilangan.data.unityweb",
          frameworkUrl: buildUrl + "/Pola Bilangan.framework.js.unityweb",
          codeUrl: buildUrl + "/Pola Bilangan.wasm.unityweb",
          streamingAssetsUrl: "StreamingAssets",
          companyName: "Spyder-code",
          productName: "Education Game Junior Height School",
          productVersion: "1.0",
          showBanner: unityShowBanner,
        };

        // By default Unity keeps WebGL canvas render target size matched with
        // the DOM size of the canvas element (scaled by window.devicePixelRatio)
        // Set this to false if you want to decouple this synchronization from
        // happening inside the engine, and you would instead like to size up
        // the canvas DOM size and WebGL render target sizes yourself.
        // config.matchWebGLToCanvasSize = false;

        if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
          // Mobile device style: fill the whole browser client area with the game canvas:

          var meta = document.createElement('meta');
          meta.name = 'viewport';
          meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
          document.getElementsByTagName('head')[0].appendChild(meta);
          container.className = "unity-mobile";

          // To lower canvas resolution on mobile devices to gain some
          // performance, uncomment the following line:
          // config.devicePixelRatio = 1;

          canvas.style.width = window.innerWidth + 'px';
          canvas.style.height = window.innerHeight + 'px';

          unityShowBanner('WebGL builds are not supported on mobile devices.');
        } else {
          // Desktop style: Render the game canvas in a window that can be maximized to fullscreen:

          canvas.style.width = "960px";
          canvas.style.height = "600px";
        }

        loadingBar.style.display = "block";

        var script = document.createElement("script");
        script.src = loaderUrl;
        script.onload = () => {
          createUnityInstance(canvas, config, (progress) => {
            progressBarFull.style.width = 100 * progress + "%";
          }).then((unityInstance) => {
            loadingBar.style.display = "none";
            unityInstance.SetFullscreen(1);
            fullscreenButton.onclick = () => {
              unityInstance.SetFullscreen(1);
            };
            unityInstance.SendMessage('Main', 'username', name);
            unityInstance.SendMessage('Main', 'url', url);
            unityInstance.SendMessage('Main', 'domain', domain);
            unityInstance.SendMessage('Main', 'participant', participant);
          }).catch((message) => {
            alert(message);
          });
        };
        document.body.appendChild(script);
      </script>
</body>
</html>
