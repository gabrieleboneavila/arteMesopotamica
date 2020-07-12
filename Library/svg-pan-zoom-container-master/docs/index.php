<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>svg-pan-zoom-container</title>

    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());
      gtag("config", "UA-64398169-1");
    </script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto:300"
    />
    <link
      rel="preload"
      as="script"
      href="https://www.google-analytics.com/analytics.js"
    />
    <style>
      html,
      body {
        height: 100%;
      }
      body {
        margin: 0;
        padding: 8px 16px;
        box-sizing: border-box;
        font-family: Roboto, sans-serif;
        font-weight: 300;
      }
      header {
        display: flex;
        align-items: center;
        margin: 0.5em 0;
      }
      h1 {
        margin: 0;
        font-family: Comfortaa;
        font-weight: 400;
        font-size: 2.25rem;
        white-space: nowrap;
      }
      input,
      button {
        padding: 0.25em 0.5em;
        background: white;
        border: 1px solid #aaa;
        border-radius: 3px;
        font-size: inherit;
      }
      button {
        cursor: pointer;
        transition: all 0.2s ease-out;
      }
      button:hover {
        box-shadow: 0 0 8px #aaa;
      }
      input,
      button,
      .monospaced {
        font-family: Roboto, monospace;
      }
      input[type="number"] {
        text-align: right;
      }
      .ml4 {
        margin-left: 4px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>svg-pan-zoom-container</h1>
      <a href="https://github.com/luncheon/svg-pan-zoom-container"
        ><img
          src="https://cdn.jsdelivr.net/npm/octicons@7.0.1/build/svg/mark-github.svg"
          alt="GitHub"
          style="height: 2.5rem; margin-left: 1em; vertical-align: bottom;"
      /></a>
    </header>
    <p>
      A vanilla-js module for adding zoom-on-wheel and pan-on-drag behavior to
      inline SVG elements.
    </p>
    <div
      id="container"
      data-pan-on-drag
      data-zoom-on-wheel="max-scale: 1000;"
      style="
        border: 1px solid #ccc;
        box-shadow: 0 0 8px #aaa;
        width: calc(95vh - 150px);
        height: calc(95vh - 150px);
      "
    >

    </div>
    <div
      id="zoom-controller"
      style="font-size: 0.8125rem; margin: 8px 0 16px 0;"
    >
      <div style="position: relative; display: inline-block;">
        <input
          id="scale"
          type="number"
          value="100.00"
          min="100.00"
          max="100000.00"
          step="1.00"
          style="padding-right: 1em;"
          oninput="window.inputting=true;svgPanZoomContainer.setScale(document.getElementById('container'),+this.value/100)"
        /><span
          class="monospaced"
          style="position: absolute; right: 0.5em; bottom: 0.25em;"
          >%</span
        >
      </div>
      <button
        class="ml4"
        id="reset"
        type="button"
        onclick="svgPanZoomContainer.resetScale(document.getElementById('container'))"
      >
        Reset
      </button>
    </div>
      <!-- JQuery -->
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/svg-pan-zoom-container@0.2.7"></script>
    <script>
      var top = $("#container")
      $("#container").load("../../../SVGs/leaoBabiloniaBRANCO.svg");
      new MutationObserver(function (mutations) {
        if (window.inputting) {
          delete window.inputting;
        } else {
          mutations.forEach(function (mutation) {
            document.getElementById("scale").value = (
              Math.round(
                svgPanZoomContainer.getScale(mutation.target) * 10000
              ) / 100
            ).toFixed(2);
          });
        }
      }).observe(document.getElementById("container"), {
        attributes: true,
        attributeFilter: ["data-scale"],
      });
    </script>
    <!-- scroll observation-->
    <script>
      document
        .getElementById("container")
        .addEventListener("scroll", function () {
          console.log({
            scrollLeft: this.scrollLeft,
            scrollTop: this.scrollTop,
          });
        });
    </script>
    <!-- scale observation-->
    <script>
      const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          console.log("scale:", mutation.target.dataset.scale);
        });
      });

      observer.observe(document.getElementById("container"), {
        attributes: true,
        attributeFilter: ["data-scale"],
      });


    </script>
  </body>
</html>
