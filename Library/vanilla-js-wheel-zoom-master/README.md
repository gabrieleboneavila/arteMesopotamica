# vanilla-js-wheel-zoom

Image resizing using mouse wheel + drag scrollable image (as well as any HTML content)

![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/worka/vanilla-js-wheel-zoom)
[![GitHub stars](https://img.shields.io/github/stars/worka/vanilla-js-wheel-zoom)](https://github.com/worka/vanilla-js-wheel-zoom/stargazers)
[![GitHub issues](https://img.shields.io/github/issues/worka/vanilla-js-wheel-zoom)](https://github.com/worka/vanilla-js-wheel-zoom/issues)
[![GitHub forks](https://img.shields.io/github/forks/worka/vanilla-js-wheel-zoom)](https://github.com/worka/vanilla-js-wheel-zoom/network)

Advantages: 
* the ability to fit the image into a container of any proportion
* the ability to scale any HTML content

> Starting with version 5, the plugin switched to using `style transform`. To use the plugin in older browsers, switch to earlier versions.

> You need to center the image (or any HTML content) in the "window" in which scaling will take place. The "window" is taken automatically as the parent of the image in DOM.

> HTML content can be of any structure, but the topmost child element in the “window” must be one. In the example with "badge" below, it will be more clear what is meant.

<a href="https://worka.github.io/vanilla-js-wheel-zoom/demo-image.html">Demo (only one image)</a>

<a href="https://worka.github.io/vanilla-js-wheel-zoom/demo-html.html">Demo (html)</a>

### Install

```cmd
npm i vanilla-js-wheel-zoom
```

or

```cmd
yarn add vanilla-js-wheel-zoom
```

### Get started

```css
#myWindow {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #999;
}

#myContent {
    position: relative;
    display: flex;
    align-items: center;
}
```

```html
<div id="myWindow" style="width:600px;height:600px;">
    <img id="myContent" src="https://placehold.it/2400x1400" alt="image" />
</div>
```

``` javascript
WZoom.create('#myContent');
```

#### Default params

``` javascript
var defaults = {
    // type content: `image` - only one image, `html` - any HTML content
    type: 'image',
    // for type `image` computed auto (if width set null), for type `html` need set real html content width, else computed auto
    width: null,
    // for type `image` computed auto (if height set null), for type `html` need set real html content height, else computed auto
    height: null,
    // drag scrollable image
    dragScrollable: true,
    // options for the DragScrollable module
    dragScrollableOptions: {
        // smooth extinction moving element after set loose
        smoothExtinction: false,
        // callback triggered when grabbing an element
        onGrab: null,
        // callback triggered when moving an element
        onMove: null,
        // callback triggered when dropping an element
        onDrop: null
    },
    // maximum allowed proportion of scale
    maxScale: 1,
    // image resizing speed
    speed: 10
};
```

#### Badge on the image

```css
#myWindow {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: aqua;
}

#myContent {
    position: relative;
    display: flex;
    align-items: center;
}

#myBadge {
    position: absolute;
    border: solid 2px red;
    font-size: 80px;
}

#myImage {
    display: block;
    width: auto;
    height: auto;
    margin: auto;
    align-self: center;
    flex-shrink: 0;
}
```

``` html
<div id="myWindow" style="width:600px;height:600px;">
    <div id="myContent">
        <div id="myBadge" style="left:900px;top:500px;">Badge</div>
        <img id="myImage" src="https://placehold.it/2500x1500" alt="image"/>
    </div>
</div>
```
    
``` javascript
WZoom.create('#myContent', {
    type: 'html',
    width: 2500,
    height: 1500
});
```

#### Control buttons

```html
<button data-zoom-up>Zoom Up</button>
<button data-zoom-down>Zoom Down</button>
```

``` javascript
const wzoom = WZoom.create('img');

document.querySelector('[data-zoom-up]').addEventListener('click', () => {
    wzoom.zoomUp();
});

document.querySelector('[data-zoom-down]').addEventListener('click', () => {
    wzoom.zoomDown();
});
```

#### On window resize

``` javascript
const wzoom = WZoom.create('img');

window.addEventListener('resize', () => {
    wzoom.prepare();
});
```

### Options

| name                                     | type       | default     | note                                                                                                                                                                                                                                                                                                  |
|------------------------------------------|------------|-------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type                                     | _String_  | `image`     | `image` - if you need to scale only one image. In this case, there is no need to pass the parameters `width` and `height`. `html` - if you need to scale the HTML code. It is advisable to specify the parameters `width` and `height` that correspond to the original full size of the HTML content. |
| width                                    | _Integer_  | `null`      | For type `image` computed auto (if width set null), for type `html` need set real html content width, else computed auto.                                                                                                                                                                             |
| height                                   | _Integer_  | `null`      | For type `image` computed auto (if height set null), for type `html` need set real html content height, else computed auto.                                                                                                                                                                           |
| dragScrollable                           | _Boolean_  | `true`      | If `true` -  scaled image can be dragged with the mouse to see parts of the image that are out of scale.                                                                                                                                                                                              |
| dragScrollableOptions._smoothExtinction_ | _Boolean_  | `false`     | If `true` -  smooth extinction moving element after set loose.                                                                                                                                                                                                                                        |
| dragScrollableOptions._onGrab_           | _Function_ | `undefined` | Сalled after grabbing an element.                                                                                                                                                                                                                                                                     |
| dragScrollableOptions._onMove_           | _Function_ | `undefined` | Called on every tick when moving element.                                                                                                                                                                                                                                                             |
| dragScrollableOptions._onDrop_           | _Function_ | `undefined` | Сalled after dropping an element.                                                                                                                                                                                                                                                                     |
| maxScale                                 | _Integer_  | `1`         | The maximum scale to which the image can be zoomed.<br>`1` means that the image can be maximized to 100%, `2` - 200%, etc.                                                                                                                                                                            |
| speed                                    | _Integer_  | `10`        | Step with which the image will be scaled. Measured in relative units.<br>The larger the value, the smaller the step and vice versa.                                                                                                                                                                   |
| prepare                                  | _Function_ | `undefined` | Сalled after the script is initialized when the image is scaled and fit into the container.                                                                                                                                                                                                           |
| rescale                                  | _Function_ | `undefined` | Сalled on every change of scale.                                                                                                                                                                                                                                                                      |

### API

| name        | note                                      |
|-------------|-------------------------------------------|
| .prepare()  | Reinitialize script                       |
| .zoomUp()   | Zoom on one step (see option `speed`)     |
| .zoomDown() | Zoom out on one step (see option `speed`) |

### MIT LICENSE

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
