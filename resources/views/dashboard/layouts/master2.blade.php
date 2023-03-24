<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>


    <meta charset="utf-8"/>
    <title>{{ generalSetting('general_site_name', 'value') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ generalSetting('general_favicon', 'value') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"/>
    <!-- Bootstrap Css -->
    <link href="{{ asset('back/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('back/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('back/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
<<<<<<< Updated upstream
    <link href="{{ asset('back/assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- App responsive Css-->
    <link href="{{ asset('back/assets/css/responsive.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link href="{{ asset('back/assets/css/new_style.css') }}" id="app-style" rel="stylesheet" type="text/css" />
=======
    <link href="{{ asset('back/assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <!-- App responsive Css-->
    <link href="{{ asset('back/assets/css/responsive.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('back/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
    <script src="{{ asset('back/jquery-validation/jquery-validation.init.js') }}" type="text/javascript"></script>

    <script>
        var KTUtil = function () {
            var resizeHandlers = [];

            /** @type {object} breakpoints The device width breakpoints **/
            var breakpoints = {
                sm: 544, // Small screen / phone
                md: 768, // Medium screen / tablet
                lg: 1024, // Large screen / desktop
                xl: 1200 // Extra large screen / wide desktop
            };

            /**
             * Handle window resize event with some
             * delay to attach event handlers upon resize complete
             */
            var _windowResizeHandler = function () {
                var _runResizeHandlers = function () {
                    // reinitialize other subscribed elements
                    for (var i = 0; i < resizeHandlers.length; i++) {
                        var each = resizeHandlers[i];
                        each.call();
                    }
                };

                var timeout = false; // holder for timeout id
                var delay = 250; // delay after event is "complete" to run callback

                window.addEventListener('resize', function () {
                    clearTimeout(timeout);
                    timeout = setTimeout(function () {
                        _runResizeHandlers();
                    }, delay); // wait 50ms until window resize finishes.
                });
            };

            return {
                /**
                 * Class main initializer.
                 * @param {object} options.
                 * @returns null
                 */
                //main function to initiate the theme
                init: function (options) {
                    if (options && options.breakpoints) {
                        breakpoints = options.breakpoints;
                    }

                    _windowResizeHandler();
                },

                /**
                 * Adds window resize event handler.
                 * @param {function} callback function.
                 */
                addResizeHandler: function (callback) {
                    resizeHandlers.push(callback);
                },

                /**
                 * Removes window resize event handler.
                 * @param {function} callback function.
                 */
                removeResizeHandler: function (callback) {
                    for (var i = 0; i < resizeHandlers.length; i++) {
                        if (callback === resizeHandlers[i]) {
                            delete resizeHandlers[i];
                        }
                    }
                },

                /**
                 * Trigger window resize handlers.
                 */
                runResizeHandlers: function () {
                    _runResizeHandlers();
                },

                resize: function () {
                    if (typeof (Event) === 'function') {
                        // modern browsers
                        window.dispatchEvent(new Event('resize'));
                    } else {
                        // for IE and other old browsers
                        // causes deprecation warning on modern browsers
                        var evt = window.document.createEvent('UIEvents');
                        evt.initUIEvent('resize', true, false, window, 0);
                        window.dispatchEvent(evt);
                    }
                },

                /**
                 * Get GET parameter value from URL.
                 * @param {string} paramName Parameter name.
                 * @returns {string}
                 */
                getURLParam: function (paramName) {
                    var searchString = window.location.search.substring(1),
                        i, val, params = searchString.split("&");

                    for (i = 0; i < params.length; i++) {
                        val = params[i].split("=");
                        if (val[0] == paramName) {
                            return unescape(val[1]);
                        }
                    }

                    return null;
                },

                /**
                 * Checks whether current device is mobile touch.
                 * @returns {boolean}
                 */
                isMobileDevice: function () {
                    return (this.getViewPort().width < this.getBreakpoint('lg') ? true : false);
                },

                /**
                 * Checks whether current device is desktop.
                 * @returns {boolean}
                 */
                isDesktopDevice: function () {
                    return KTUtil.isMobileDevice() ? false : true;
                },

                /**
                 * Gets browser window viewport size. Ref:
                 * http://andylangton.co.uk/articles/javascript/get-viewport-size-javascript/
                 * @returns {object}
                 */
                getViewPort: function () {
                    var e = window,
                        a = 'inner';
                    if (!('innerWidth' in window)) {
                        a = 'client';
                        e = document.documentElement || document.body;
                    }

                    return {
                        width: e[a + 'Width'],
                        height: e[a + 'Height']
                    };
                },

                /**
                 * Checks whether given device mode is currently activated.
                 * @param {string} mode Responsive mode name(e.g: desktop,
                 *     desktop-and-tablet, tablet, tablet-and-mobile, mobile)
                 * @returns {boolean}
                 */
                isInResponsiveRange: function (mode) {
                    var breakpoint = this.getViewPort().width;

                    if (mode == 'general') {
                        return true;
                    } else if (mode == 'desktop' && breakpoint >= (this.getBreakpoint('lg') + 1)) {
                        return true;
                    } else if (mode == 'tablet' && (breakpoint >= (this.getBreakpoint('md') + 1) && breakpoint < this.getBreakpoint('lg'))) {
                        return true;
                    } else if (mode == 'mobile' && breakpoint <= this.getBreakpoint('md')) {
                        return true;
                    } else if (mode == 'desktop-and-tablet' && breakpoint >= (this.getBreakpoint('md') + 1)) {
                        return true;
                    } else if (mode == 'tablet-and-mobile' && breakpoint <= this.getBreakpoint('lg')) {
                        return true;
                    } else if (mode == 'minimal-desktop-and-below' && breakpoint <= this.getBreakpoint('xl')) {
                        return true;
                    }

                    return false;
                },

                /**
                 * Generates unique ID for give prefix.
                 * @param {string} prefix Prefix for generated ID
                 * @returns {boolean}
                 */
                getUniqueID: function (prefix) {
                    return prefix + Math.floor(Math.random() * (new Date()).getTime());
                },

                /**
                 * Gets window width for give breakpoint mode.
                 * @param {string} mode Responsive mode name(e.g: xl, lg, md, sm)
                 * @returns {number}
                 */
                getBreakpoint: function (mode) {
                    return breakpoints[mode];
                },

                /**
                 * Checks whether object has property matchs given key path.
                 * @param {object} obj Object contains values paired with given key path
                 * @param {string} keys Keys path seperated with dots
                 * @returns {object}
                 */
                isset: function (obj, keys) {
                    var stone;

                    keys = keys || '';

                    if (keys.indexOf('[') !== -1) {
                        throw new Error('Unsupported object path notation.');
                    }

                    keys = keys.split('.');

                    do {
                        if (obj === undefined) {
                            return false;
                        }

                        stone = keys.shift();

                        if (!obj.hasOwnProperty(stone)) {
                            return false;
                        }

                        obj = obj[stone];

                    } while (keys.length);

                    return true;
                },

                /**
                 * Gets highest z-index of the given element parents
                 * @param {object} el jQuery element object
                 * @returns {number}
                 */
                getHighestZindex: function (el) {
                    var elem = KTUtil.get(el),
                        position, value;

                    while (elem && elem !== document) {
                        // Ignore z-index if position is set to a value where z-index is ignored by the browser
                        // This makes behavior of this function consistent across browsers
                        // WebKit always returns auto if the element is positioned
                        position = KTUtil.css(elem, 'position');

                        if (position === "absolute" || position === "relative" || position === "fixed") {
                            // IE returns 0 when zIndex is not specified
                            // other browsers return a string
                            // we ignore the case of nested elements with an explicit value of 0
                            // <div style="z-index: -10;"><div style="z-index: 0;"></div></div>
                            value = parseInt(KTUtil.css(elem, 'z-index'));

                            if (!isNaN(value) && value !== 0) {
                                return value;
                            }
                        }

                        elem = elem.parentNode;
                    }

                    return null;
                },

                /**
                 * Checks whether the element has any parent with fixed positionfreg
                 * @param {object} el jQuery element object
                 * @returns {boolean}
                 */
                hasFixedPositionedParent: function (el) {
                    var position;

                    while (el && el !== document) {
                        position = KTUtil.css(el, 'position');

                        if (position === "fixed") {
                            return true;
                        }

                        el = el.parentNode;
                    }

                    return false;
                },

                /**
                 * Simulates delay
                 */
                sleep: function (milliseconds) {
                    var start = new Date().getTime();
                    for (var i = 0; i < 1e7; i++) {
                        if ((new Date().getTime() - start) > milliseconds) {
                            break;
                        }
                    }
                },

                /**
                 * Gets randomly generated integer value within given min and max range
                 * @param {number} min Range start value
                 * @param {number} max Range end value
                 * @returns {number}
                 */
                getRandomInt: function (min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                },

                /**
                 * Checks whether Angular library is included
                 * @returns {boolean}
                 */
                isAngularVersion: function () {
                    return window.Zone !== undefined ? true : false;
                },

                // jQuery Workarounds

                // Deep extend:  $.extend(true, {}, objA, objB);
                deepExtend: function (out) {
                    out = out || {};

                    for (var i = 1; i < arguments.length; i++) {
                        var obj = arguments[i];

                        if (!obj)
                            continue;

                        for (var key in obj) {
                            if (obj.hasOwnProperty(key)) {
                                if (typeof obj[key] === 'object')
                                    out[key] = KTUtil.deepExtend(out[key], obj[key]);
                                else
                                    out[key] = obj[key];
                            }
                        }
                    }

                    return out;
                },

                // extend:  $.extend({}, objA, objB);
                extend: function (out) {
                    out = out || {};

                    for (var i = 1; i < arguments.length; i++) {
                        if (!arguments[i])
                            continue;

                        for (var key in arguments[i]) {
                            if (arguments[i].hasOwnProperty(key))
                                out[key] = arguments[i][key];
                        }
                    }

                    return out;
                },

                get: function (query) {
                    var el;

                    if (query === document) {
                        return document;
                    }

                    if (!!(query && query.nodeType === 1)) {
                        return query;
                    }

                    if (el = document.getElementById(query)) {
                        return el;
                    } else if (el = document.getElementsByTagName(query)) {
                        return el[0];
                    } else if (el = document.getElementsByClassName(query)) {
                        return el[0];
                    } else {
                        return null;
                    }
                },

                getByID: function (query) {
                    if (!!(query && query.nodeType === 1)) {
                        return query;
                    }

                    return document.getElementById(query);
                },

                getByTag: function (query) {
                    var el;

                    if (el = document.getElementsByTagName(query)) {
                        return el[0];
                    } else {
                        return null;
                    }
                },

                getByClass: function (query) {
                    var el;

                    if (el = document.getElementsByClassName(query)) {
                        return el[0];
                    } else {
                        return null;
                    }
                },

                /**
                 * Checks whether the element has given classes
                 * @param {object} el jQuery element object
                 * @param {string} Classes string
                 * @returns {boolean}
                 */
                hasClasses: function (el, classes) {
                    if (!el) {
                        return;
                    }

                    var classesArr = classes.split(" ");

                    for (var i = 0; i < classesArr.length; i++) {
                        if (KTUtil.hasClass(el, KTUtil.trim(classesArr[i])) == false) {
                            return false;
                        }
                    }

                    return true;
                },

                hasClass: function (el, className) {
                    if (!el) {
                        return;
                    }

                    return el.classList ? el.classList.contains(className) : new RegExp('\\b' + className + '\\b').test(el.className);
                },

                addClass: function (el, className) {
                    if (!el || typeof className === 'undefined') {
                        return;
                    }

                    var classNames = className.split(' ');

                    if (el.classList) {
                        for (var i = 0; i < classNames.length; i++) {
                            if (classNames[i] && classNames[i].length > 0) {
                                el.classList.add(KTUtil.trim(classNames[i]));
                            }
                        }
                    } else if (!KTUtil.hasClass(el, className)) {
                        for (var x = 0; x < classNames.length; x++) {
                            el.className += ' ' + KTUtil.trim(classNames[x]);
                        }
                    }
                },

                removeClass: function (el, className) {
                    if (!el || typeof className === 'undefined') {
                        return;
                    }

                    var classNames = className.split(' ');

                    if (el.classList) {
                        for (var i = 0; i < classNames.length; i++) {
                            el.classList.remove(KTUtil.trim(classNames[i]));
                        }
                    } else if (KTUtil.hasClass(el, className)) {
                        for (var x = 0; x < classNames.length; x++) {
                            el.className = el.className.replace(new RegExp('\\b' + KTUtil.trim(classNames[x]) + '\\b', 'g'), '');
                        }
                    }
                },

                triggerCustomEvent: function (el, eventName, data) {
                    var event;
                    if (window.CustomEvent) {
                        event = new CustomEvent(eventName, {
                            detail: data
                        });
                    } else {
                        event = document.createEvent('CustomEvent');
                        event.initCustomEvent(eventName, true, true, data);
                    }

                    el.dispatchEvent(event);
                },

                triggerEvent: function (node, eventName) {
                    // Make sure we use the ownerDocument from the provided node to avoid cross-window problems
                    var doc;
                    if (node.ownerDocument) {
                        doc = node.ownerDocument;
                    } else if (node.nodeType == 9) {
                        // the node may be the document itself, nodeType 9 = DOCUMENT_NODE
                        doc = node;
                    } else {
                        throw new Error("Invalid node passed to fireEvent: " + node.id);
                    }

                    if (node.dispatchEvent) {
                        // Gecko-style approach (now the standard) takes more work
                        var eventClass = "";

                        // Different events have different event classes.
                        // If this switch statement can't map an eventName to an eventClass,
                        // the event firing is going to fail.
                        switch (eventName) {
                            case "click": // Dispatching of 'click' appears to not work correctly in Safari. Use 'mousedown' or 'mouseup' instead.
                            case "mouseenter":
                            case "mouseleave":
                            case "mousedown":
                            case "mouseup":
                                eventClass = "MouseEvents";
                                break;

                            case "focus":
                            case "change":
                            case "blur":
                            case "select":
                                eventClass = "HTMLEvents";
                                break;

                            default:
                                throw "fireEvent: Couldn't find an event class for event '" + eventName + "'.";
                                break;
                        }
                        var event = doc.createEvent(eventClass);

                        var bubbles = eventName == "change" ? false : true;
                        event.initEvent(eventName, bubbles, true); // All events created as bubbling and cancelable.

                        event.synthetic = true; // allow detection of synthetic events
                        // The second parameter says go ahead with the default action
                        node.dispatchEvent(event, true);
                    } else if (node.fireEvent) {
                        // IE-old school style
                        var event = doc.createEventObject();
                        event.synthetic = true; // allow detection of synthetic events
                        node.fireEvent("on" + eventName, event);
                    }
                },

                index: function (elm) {
                    elm = KTUtil.get(elm);
                    var c = elm.parentNode.children, i = 0;
                    for (; i < c.length; i++)
                        if (c[i] == elm) return i;
                },

                trim: function (string) {
                    return string.trim();
                },

                eventTriggered: function (e) {
                    if (e.currentTarget.dataset.triggered) {
                        return true;
                    } else {
                        e.currentTarget.dataset.triggered = true;

                        return false;
                    }
                },

                remove: function (el) {
                    if (el && el.parentNode) {
                        el.parentNode.removeChild(el);
                    }
                },

                find: function (parent, query) {
                    parent = KTUtil.get(parent);
                    if (parent) {
                        return parent.querySelector(query);
                    }
                },

                findAll: function (parent, query) {
                    parent = KTUtil.get(parent);
                    if (parent) {
                        return parent.querySelectorAll(query);
                    }
                },

                insertAfter: function (el, referenceNode) {
                    return referenceNode.parentNode.insertBefore(el, referenceNode.nextSibling);
                },

                parents: function (elem, selector) {
                    // Element.matches() polyfill
                    if (!Element.prototype.matches) {
                        Element.prototype.matches =
                            Element.prototype.matchesSelector ||
                            Element.prototype.mozMatchesSelector ||
                            Element.prototype.msMatchesSelector ||
                            Element.prototype.oMatchesSelector ||
                            Element.prototype.webkitMatchesSelector ||
                            function (s) {
                                var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                                    i = matches.length;
                                while (--i >= 0 && matches.item(i) !== this) {
                                }
                                return i > -1;
                            };
                    }

                    // Set up a parent array
                    var parents = [];

                    // Push each parent element to the array
                    for (; elem && elem !== document; elem = elem.parentNode) {
                        if (selector) {
                            if (elem.matches(selector)) {
                                parents.push(elem);
                            }
                            continue;
                        }
                        parents.push(elem);
                    }

                    // Return our parent array
                    return parents;
                },

                children: function (el, selector, log) {
                    if (!el || !el.childNodes) {
                        return;
                    }

                    var result = [],
                        i = 0,
                        l = el.childNodes.length;

                    for (var i; i < l; ++i) {
                        if (el.childNodes[i].nodeType == 1 && KTUtil.matches(el.childNodes[i], selector, log)) {
                            result.push(el.childNodes[i]);
                        }
                    }

                    return result;
                },

                child: function (el, selector, log) {
                    var children = KTUtil.children(el, selector, log);

                    return children ? children[0] : null;
                },

                matches: function (el, selector, log) {
                    var p = Element.prototype;
                    var f = p.matches || p.webkitMatchesSelector || p.mozMatchesSelector || p.msMatchesSelector || function (s) {
                        return [].indexOf.call(document.querySelectorAll(s), this) !== -1;
                    };

                    if (el && el.tagName) {
                        return f.call(el, selector);
                    } else {
                        return false;
                    }
                },

                data: function (element) {
                    element = KTUtil.get(element);

                    return {
                        set: function (name, data) {
                            if (element === undefined) {
                                return;
                            }

                            if (element.customDataTag === undefined) {
                                window.KTUtilElementDataStoreID++;
                                element.customDataTag = window.KTUtilElementDataStoreID;
                            }

                            if (window.KTUtilElementDataStore[element.customDataTag] === undefined) {
                                window.KTUtilElementDataStore[element.customDataTag] = {};
                            }

                            window.KTUtilElementDataStore[element.customDataTag][name] = data;
                        },

                        get: function (name) {
                            if (element === undefined) {
                                return;
                            }

                            if (element.customDataTag === undefined) {
                                return null;
                            }

                            return this.has(name) ? window.KTUtilElementDataStore[element.customDataTag][name] : null;
                        },

                        has: function (name) {
                            if (element === undefined) {
                                return false;
                            }

                            if (element.customDataTag === undefined) {
                                return false;
                            }

                            return (window.KTUtilElementDataStore[element.customDataTag] && window.KTUtilElementDataStore[element.customDataTag][name]) ? true : false;
                        },

                        remove: function (name) {
                            if (element && this.has(name)) {
                                delete window.KTUtilElementDataStore[element.customDataTag][name];
                            }
                        }
                    };
                },

                outerWidth: function (el, margin) {
                    var width;

                    if (margin === true) {
                        width = parseFloat(el.offsetWidth);
                        width += parseFloat(KTUtil.css(el, 'margin-left')) + parseFloat(KTUtil.css(el, 'margin-right'));

                        return parseFloat(width);
                    } else {
                        width = parseFloat(el.offsetWidth);

                        return width;
                    }
                },

                offset: function (elem) {
                    var rect, win;
                    elem = KTUtil.get(elem);

                    if (!elem) {
                        return;
                    }

                    // Return zeros for disconnected and hidden (display: none) elements (gh-2310)
                    // Support: IE <=11 only
                    // Running getBoundingClientRect on a
                    // disconnected node in IE throws an error

                    if (!elem.getClientRects().length) {
                        return {top: 0, left: 0};
                    }

                    // Get document-relative position by adding viewport scroll to viewport-relative gBCR
                    rect = elem.getBoundingClientRect();
                    win = elem.ownerDocument.defaultView;

                    return {
                        top: rect.top + win.pageYOffset,
                        left: rect.left + win.pageXOffset
                    };
                },

                height: function (el) {
                    return KTUtil.css(el, 'height');
                },

                visible: function (el) {
                    return !(el.offsetWidth === 0 && el.offsetHeight === 0);
                },

                attr: function (el, name, value) {
                    el = KTUtil.get(el);

                    if (el == undefined) {
                        return;
                    }

                    if (value !== undefined) {
                        el.setAttribute(name, value);
                    } else {
                        return el.getAttribute(name);
                    }
                },

                hasAttr: function (el, name) {
                    el = KTUtil.get(el);

                    if (el == undefined) {
                        return;
                    }

                    return el.getAttribute(name) ? true : false;
                },

                removeAttr: function (el, name) {
                    el = KTUtil.get(el);

                    if (el == undefined) {
                        return;
                    }

                    el.removeAttribute(name);
                },

                animate: function (from, to, duration, update, easing, done) {
                    /**
                     * TinyAnimate.easings
                     *  Adapted from jQuery Easing
                     */
                    var easings = {};
                    var easing;

                    easings.linear = function (t, b, c, d) {
                        return c * t / d + b;
                    };

                    easing = easings.linear;

                    // Early bail out if called incorrectly
                    if (typeof from !== 'number' ||
                        typeof to !== 'number' ||
                        typeof duration !== 'number' ||
                        typeof update !== 'function') {
                        return;
                    }

                    // Create mock done() function if necessary
                    if (typeof done !== 'function') {
                        done = function () {
                        };
                    }

                    // Pick implementation (requestAnimationFrame | setTimeout)
                    var rAF = window.requestAnimationFrame || function (callback) {
                        window.setTimeout(callback, 1000 / 50);
                    };

                    // Animation loop
                    var canceled = false;
                    var change = to - from;

                    function loop(timestamp) {
                        var time = (timestamp || +new Date()) - start;

                        if (time >= 0) {
                            update(easing(time, from, change, duration));
                        }
                        if (time >= 0 && time >= duration) {
                            update(to);
                            done();
                        } else {
                            rAF(loop);
                        }
                    }

                    update(from);

                    // Start animation loop
                    var start = window.performance && window.performance.now ? window.performance.now() : +new Date();

                    rAF(loop);
                },

                actualCss: function (el, prop, cache) {
                    el = KTUtil.get(el);
                    var css = '';

                    if (el instanceof HTMLElement === false) {
                        return;
                    }

                    if (!el.getAttribute('kt-hidden-' + prop) || cache === false) {
                        var value;

                        // the element is hidden so:
                        // making the el block so we can meassure its height but still be hidden
                        css = el.style.cssText;
                        el.style.cssText = 'position: absolute; visibility: hidden; display: block;';

                        if (prop == 'width') {
                            value = el.offsetWidth;
                        } else if (prop == 'height') {
                            value = el.offsetHeight;
                        }

                        el.style.cssText = css;

                        // store it in cache
                        el.setAttribute('kt-hidden-' + prop, value);

                        return parseFloat(value);
                    } else {
                        // store it in cache
                        return parseFloat(el.getAttribute('kt-hidden-' + prop));
                    }
                },

                actualHeight: function (el, cache) {
                    return KTUtil.actualCss(el, 'height', cache);
                },

                actualWidth: function (el, cache) {
                    return KTUtil.actualCss(el, 'width', cache);
                },

                getScroll: function (element, method) {
                    // The passed in `method` value should be 'Top' or 'Left'
                    method = 'scroll' + method;
                    return (element == window || element == document) ? (
                        self[(method == 'scrollTop') ? 'pageYOffset' : 'pageXOffset'] ||
                        (browserSupportsBoxModel && document.documentElement[method]) ||
                        document.body[method]
                    ) : element[method];
                },

                css: function (el, styleProp, value) {
                    el = KTUtil.get(el);

                    if (!el) {
                        return;
                    }

                    if (value !== undefined) {
                        el.style[styleProp] = value;
                    } else {
                        var defaultView = (el.ownerDocument || document).defaultView;
                        // W3C standard way:
                        if (defaultView && defaultView.getComputedStyle) {
                            // sanitize property name to css notation
                            // (hyphen separated words eg. font-Size)
                            styleProp = styleProp.replace(/([A-Z])/g, "-$1").toLowerCase();
                            return defaultView.getComputedStyle(el, null).getPropertyValue(styleProp);
                        } else if (el.currentStyle) { // IE
                            // sanitize property name to camelCase
                            styleProp = styleProp.replace(/\-(\w)/g, function (str, letter) {
                                return letter.toUpperCase();
                            });
                            value = el.currentStyle[styleProp];
                            // convert other units to pixels on IE
                            if (/^\d+(em|pt|%|ex)?$/i.test(value)) {
                                return (function (value) {
                                    var oldLeft = el.style.left,
                                        oldRsLeft = el.runtimeStyle.left;
                                    el.runtimeStyle.left = el.currentStyle.left;
                                    el.style.left = value || 0;
                                    value = el.style.pixelLeft + "px";
                                    el.style.left = oldLeft;
                                    el.runtimeStyle.left = oldRsLeft;
                                    return value;
                                })(value);
                            }
                            return value;
                        }
                    }
                },

                slide: function (el, dir, speed, callback, recalcMaxHeight) {
                    if (!el || (dir == 'up' && KTUtil.visible(el) === false) || (dir == 'down' && KTUtil.visible(el) === true)) {
                        return;
                    }

                    speed = (speed ? speed : 600);
                    var calcHeight = KTUtil.actualHeight(el);
                    var calcPaddingTop = false;
                    var calcPaddingBottom = false;

                    if (KTUtil.css(el, 'padding-top') && KTUtil.data(el).has('slide-padding-top') !== true) {
                        KTUtil.data(el).set('slide-padding-top', KTUtil.css(el, 'padding-top'));
                    }

                    if (KTUtil.css(el, 'padding-bottom') && KTUtil.data(el).has('slide-padding-bottom') !== true) {
                        KTUtil.data(el).set('slide-padding-bottom', KTUtil.css(el, 'padding-bottom'));
                    }

                    if (KTUtil.data(el).has('slide-padding-top')) {
                        calcPaddingTop = parseInt(KTUtil.data(el).get('slide-padding-top'));
                    }

                    if (KTUtil.data(el).has('slide-padding-bottom')) {
                        calcPaddingBottom = parseInt(KTUtil.data(el).get('slide-padding-bottom'));
                    }

                    if (dir == 'up') { // up
                        el.style.cssText = 'display: block; overflow: hidden;';

                        if (calcPaddingTop) {
                            KTUtil.animate(0, calcPaddingTop, speed, function (value) {
                                el.style.paddingTop = (calcPaddingTop - value) + 'px';
                            }, 'linear');
                        }

                        if (calcPaddingBottom) {
                            KTUtil.animate(0, calcPaddingBottom, speed, function (value) {
                                el.style.paddingBottom = (calcPaddingBottom - value) + 'px';
                            }, 'linear');
                        }

                        KTUtil.animate(0, calcHeight, speed, function (value) {
                            el.style.height = (calcHeight - value) + 'px';
                        }, 'linear', function () {
                            callback();
                            el.style.height = '';
                            el.style.display = 'none';
                        });

>>>>>>> Stashed changes

                    } else if (dir == 'down') { // down
                        el.style.cssText = 'display: block; overflow: hidden;';

                        if (calcPaddingTop) {
                            KTUtil.animate(0, calcPaddingTop, speed, function (value) {
                                el.style.paddingTop = value + 'px';
                            }, 'linear', function () {
                                el.style.paddingTop = '';
                            });
                        }

                        if (calcPaddingBottom) {
                            KTUtil.animate(0, calcPaddingBottom, speed, function (value) {
                                el.style.paddingBottom = value + 'px';
                            }, 'linear', function () {
                                el.style.paddingBottom = '';
                            });
                        }

                        KTUtil.animate(0, calcHeight, speed, function (value) {
                            el.style.height = value + 'px';
                        }, 'linear', function () {
                            callback();
                            el.style.height = '';
                            el.style.display = '';
                            el.style.overflow = '';
                        });
                    }
                },

                slideUp: function (el, speed, callback) {
                    KTUtil.slide(el, 'up', speed, callback);
                },

                slideDown: function (el, speed, callback) {
                    KTUtil.slide(el, 'down', speed, callback);
                },

                show: function (el, display) {
                    if (typeof el !== 'undefined') {
                        el.style.display = (display ? display : 'block');
                    }
                },

                hide: function (el) {
                    if (typeof el !== 'undefined') {
                        el.style.display = 'none';
                    }
                },

                addEvent: function (el, type, handler, one) {
                    el = KTUtil.get(el);
                    if (typeof el !== 'undefined') {
                        el.addEventListener(type, handler);
                    }
                },

                removeEvent: function (el, type, handler) {
                    el = KTUtil.get(el);
                    el.removeEventListener(type, handler);
                },

                on: function (element, selector, event, handler) {
                    if (!selector) {
                        return;
                    }

                    var eventId = KTUtil.getUniqueID('event');

                    window.KTUtilDelegatedEventHandlers[eventId] = function (e) {
                        var targets = element.querySelectorAll(selector);
                        var target = e.target;

                        while (target && target !== element) {
                            for (var i = 0, j = targets.length; i < j; i++) {
                                if (target === targets[i]) {
                                    handler.call(target, e);
                                }
                            }

                            target = target.parentNode;
                        }
                    }

                    KTUtil.addEvent(element, event, window.KTUtilDelegatedEventHandlers[eventId]);

                    return eventId;
                },

                off: function (element, event, eventId) {
                    if (!element || !window.KTUtilDelegatedEventHandlers[eventId]) {
                        return;
                    }

                    KTUtil.removeEvent(element, event, window.KTUtilDelegatedEventHandlers[eventId]);

                    delete window.KTUtilDelegatedEventHandlers[eventId];
                },

                one: function onetime(el, type, callback) {
                    el = KTUtil.get(el);

                    el.addEventListener(type, function callee(e) {
                        // remove event
                        if (e.target && e.target.removeEventListener) {
                            e.target.removeEventListener(e.type, callee);
                        }

                        // call handler
                        return callback(e);
                    });
                },

                hash: function (str) {
                    var hash = 0,
                        i, chr;

                    if (str.length === 0) return hash;
                    for (i = 0; i < str.length; i++) {
                        chr = str.charCodeAt(i);
                        hash = ((hash << 5) - hash) + chr;
                        hash |= 0; // Convert to 32bit integer
                    }

                    return hash;
                },

                animateClass: function (el, animationName, callback) {
                    var animation;
                    var animations = {
                        animation: 'animationend',
                        OAnimation: 'oAnimationEnd',
                        MozAnimation: 'mozAnimationEnd',
                        WebkitAnimation: 'webkitAnimationEnd',
                        msAnimation: 'msAnimationEnd',
                    };

                    for (var t in animations) {
                        if (el.style[t] !== undefined) {
                            animation = animations[t];
                        }
                    }

                    KTUtil.addClass(el, 'animated ' + animationName);

                    KTUtil.one(el, animation, function () {
                        KTUtil.removeClass(el, 'animated ' + animationName);
                    });

                    if (callback) {
                        KTUtil.one(el, animation, callback);
                    }
                },

                transitionEnd: function (el, callback) {
                    var transition;
                    var transitions = {
                        transition: 'transitionend',
                        OTransition: 'oTransitionEnd',
                        MozTransition: 'mozTransitionEnd',
                        WebkitTransition: 'webkitTransitionEnd',
                        msTransition: 'msTransitionEnd'
                    };

                    for (var t in transitions) {
                        if (el.style[t] !== undefined) {
                            transition = transitions[t];
                        }
                    }

                    KTUtil.one(el, transition, callback);
                },

                animationEnd: function (el, callback) {
                    var animation;
                    var animations = {
                        animation: 'animationend',
                        OAnimation: 'oAnimationEnd',
                        MozAnimation: 'mozAnimationEnd',
                        WebkitAnimation: 'webkitAnimationEnd',
                        msAnimation: 'msAnimationEnd'
                    };

                    for (var t in animations) {
                        if (el.style[t] !== undefined) {
                            animation = animations[t];
                        }
                    }

                    KTUtil.one(el, animation, callback);
                },

                animateDelay: function (el, value) {
                    var vendors = ['webkit-', 'moz-', 'ms-', 'o-', ''];
                    for (var i = 0; i < vendors.length; i++) {
                        KTUtil.css(el, vendors[i] + 'animation-delay', value);
                    }
                },

                animateDuration: function (el, value) {
                    var vendors = ['webkit-', 'moz-', 'ms-', 'o-', ''];
                    for (var i = 0; i < vendors.length; i++) {
                        KTUtil.css(el, vendors[i] + 'animation-duration', value);
                    }
                },

                scrollTo: function (target, offset, duration) {
                    var duration = duration ? duration : 500;
                    var target = KTUtil.get(target);
                    var targetPos = target ? KTUtil.offset(target).top : 0;
                    var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
                    var from, to;

                    if (targetPos > scrollPos) {
                        from = targetPos;
                        to = scrollPos;
                    } else {
                        from = scrollPos;
                        to = targetPos;
                    }

                    if (offset) {
                        to += offset;
                    }

                    KTUtil.animate(from, to, duration, function (value) {
                        document.documentElement.scrollTop = value;
                        document.body.parentNode.scrollTop = value;
                        document.body.scrollTop = value;
                    }); //, easing, done
                },

                scrollTop: function (offset, duration) {
                    KTUtil.scrollTo(null, offset, duration);
                },

                isArray: function (obj) {
                    return obj && Array.isArray(obj);
                },

                ready: function (callback) {
                    if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
                        callback();
                    } else {
                        document.addEventListener('DOMContentLoaded', callback);
                    }
                },

                isEmpty: function (obj) {
                    for (var prop in obj) {
                        if (obj.hasOwnProperty(prop)) {
                            return false;
                        }
                    }

                    return true;
                },

                numberString: function (nStr) {
                    nStr += '';
                    var x = nStr.split('.');
                    var x1 = x[0];
                    var x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + ',' + '$2');
                    }
                    return x1 + x2;
                },

                detectIE: function () {
                    var ua = window.navigator.userAgent;

                    // Test values; Uncomment to check result …

                    // IE 10
                    // ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)';

                    // IE 11
                    // ua = 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';

                    // Edge 12 (Spartan)
                    // ua = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0';

                    // Edge 13
                    // ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586';

                    var msie = ua.indexOf('MSIE ');
                    if (msie > 0) {
                        // IE 10 or older => return version number
                        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
                    }

                    var trident = ua.indexOf('Trident/');
                    if (trident > 0) {
                        // IE 11 => return version number
                        var rv = ua.indexOf('rv:');
                        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
                    }

                    var edge = ua.indexOf('Edge/');
                    if (edge > 0) {
                        // Edge (IE 12+) => return version number
                        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
                    }

                    // other browser
                    return false;
                },

                isRTL: function () {
                    return (KTUtil.attr(KTUtil.get('html'), 'direction') == 'rtl');
                },

                //

                // Scroller
                scrollInit: function (element, options) {
                    if (!element) return;

                    // Define init function
                    function init() {
                        var ps;
                        var height;

                        if (options.height instanceof Function) {
                            height = parseInt(options.height.call());
                        } else {
                            height = parseInt(options.height);
                        }

                        // Destroy scroll on table and mobile modes
                        if ((options.mobileNativeScroll || options.disableForMobile) && KTUtil.isInResponsiveRange('tablet-and-mobile')) {
                            ps = KTUtil.data(element).get('ps');
                            if (ps) {
                                if (options.resetHeightOnDestroy) {
                                    KTUtil.css(element, 'height', 'auto');
                                } else {
                                    KTUtil.css(element, 'overflow', 'auto');
                                    if (height > 0) {
                                        KTUtil.css(element, 'height', height + 'px');
                                    }
                                }

                                ps.destroy();
                                ps = KTUtil.data(element).remove('ps');
                            } else if (height > 0) {
                                KTUtil.css(element, 'overflow', 'auto');
                                KTUtil.css(element, 'height', height + 'px');
                            }

                            return;
                        }

                        if (height > 0) {
                            KTUtil.css(element, 'height', height + 'px');
                        }

                        if (options.desktopNativeScroll) {
                            KTUtil.css(element, 'overflow', 'auto');
                            return;
                        }

                        // Init scroll
                        KTUtil.css(element, 'overflow', 'hidden');

                        ps = KTUtil.data(element).get('ps');
                        if (ps) {
                            ps.update();
                        } else {
                            KTUtil.addClass(element, 'kt-scroll');
                            ps = new PerfectScrollbar(element, {
                                wheelSpeed: 0.5,
                                swipeEasing: true,
                                wheelPropagation: (options.windowScroll === false ? false : true),
                                minScrollbarLength: 40,
                                maxScrollbarLength: 300,
                                suppressScrollX: KTUtil.attr(element, 'data-scroll-x') != 'true' ? true : false
                            });

                            KTUtil.data(element).set('ps', ps);
                        }

                        // Remember scroll position in cookie
                        var uid = KTUtil.attr(element, 'id');

                        if (options.rememberPosition === true && Cookies && uid) {
                            if (Cookies.get(uid)) {
                                var pos = parseInt(Cookies.get(uid));

                                if (pos > 0) {
                                    element.scrollTop = pos;
                                }
                            }

                            element.addEventListener('ps-scroll-y', function () {
                                Cookies.set(uid, element.scrollTop);
                            });
                        }
                    }

                    // Init
                    init();

                    // Handle window resize
                    if (options.handleWindowResize) {
                        KTUtil.addResizeHandler(function () {
                            init();
                        });
                    }
                },

                scrollUpdate: function (element) {
                    var ps = KTUtil.data(element).get('ps');
                    if (ps) {
                        ps.update();
                    }
                },

                scrollUpdateAll: function (parent) {
                    var scrollers = KTUtil.findAll(parent, '.ps');
                    for (var i = 0, len = scrollers.length; i < len; i++) {
                        KTUtil.scrollerUpdate(scrollers[i]);
                    }
                },

                scrollDestroy: function (element) {
                    var ps = KTUtil.data(element).get('ps');
                    if (ps) {
                        ps.destroy();
                        ps = KTUtil.data(element).remove('ps');
                    }
                },

                setHTML: function (el, html) {
                    if (KTUtil.get(el)) {
                        KTUtil.get(el).innerHTML = html;
                    }
                },

                getHTML: function (el) {
                    if (KTUtil.get(el)) {
                        return KTUtil.get(el).innerHTML;
                    }
                },

                getDocumentHeight: function () {
                    var body = document.body;
                    var html = document.documentElement;

                    return Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
                },

                getScrollTop: function () {
                    return (document.scrollingElement || document.documentElement).scrollTop;
                }
            }
        }();


    </script>
    <style>
        .is-invalid {
            border-color: #fd397a !important;
            padding-right: calc(1.5em + 1.3rem) !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fd397a' viewBox='-2 -2 7 7'%3e%3cpath stroke='%23fd397a' d='M0 0l3 3m0-3L0 3'/%3e%3ccircle r='.5'/%3e%3ccircle cx='3' r='.5'/%3e%3ccircle cy='3' r='.5'/%3e%3ccircle cx='3' cy='3' r='.5'/%3e%3c/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: center right calc(0.375em + 0.325rem) !important;
            background-size: calc(0.75em + 0.65rem) calc(0.75em + 0.65rem) !important;
        }

        .is-invalid:focus {
            border-color: #fd397a !important;
            -webkit-box-shadow: 0 0 0 0.2rem rgba(253, 57, 122, 0.25) !important;
            box-shadow: 0 0 0 0.2rem rgba(253, 57, 122, 0.25) !important;
        }

        .form-control:invalid ~ .invalid-feedback,
        .form-control:invalid ~ .invalid-tooltip, .form-control.is-invalid ~ .invalid-feedback,
        .form-control.is-invalid ~ .invalid-tooltip {
            display: block !important;
        }

        .dataTables_filter,
        .dataTables_paginate {
            float: left !important;
        }

        .dataTables_length,
        .dataTables_info {
            float: right !important;
        }

        .main-content .page-card .table-container .table i {
            font-weight: 600 !important;
            font-size: 16px !important;
            color: #000000 !important;
            margin: 0 7px !important;
            cursor: pointer !important;
        }
    </style>
    @yield('css')
</head>

<body data-sidebar="dark" dir="rtl">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<<<<<<< Updated upstream
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu d-lg-block">
            <div data-simplebar class="h-100 vertical-menu-layout">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <div class="main-logo text-center mb-3 d-none d-lg-block">
                        <img class="img-fluid" src="{{ generalSetting('general_logo_white', 'value') }}">
                    </div>
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled p-0" id="side-menu">
                        @yield('sidebar')
                    </ul>
=======
<!-- Begin page -->
<div id="layout-wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu d-lg-block">

        <div data-simplebar class="h-100 vertical-menu-layout">

            <!--- Sidemenu -->

            <div id="sidebar-menu">
                <div class="main-logo text-center mb-3 d-none d-lg-block">
                    <img class="img-fluid" src="{{ generalSetting('general_logo', 'value') }}">
>>>>>>> Stashed changes
                </div>
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled p-0" id="side-menu">
                    @yield('sidebar')
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

<<<<<<< Updated upstream
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')

            {{-- Modal Delete --}}
            <!-- Modal -->
            <div class="modal fade   delete-record" tabindex="-1" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">حذف البيانات</h3>
                        </div>
                        <div class="modal-body">
                            هل أنت متأكد من حذف الريكورد ؟
                        </div>
                        <div class="modal-body">
                            <form class="form-delete-record" action="" method="POST">
                                @csrf
                                <div class="row align-items-center justify-content-evenly">
                                    <div class="col-lg-12 text-start mt-3">
                                        <div class="modal-footer">
                                            <button type="submit"
                                                class="btn btn-danger waves-effect waves-light form-btn px-5">حذف</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>
        <!-- END layout-wrapper -->
=======
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @yield('content')
    </div>
    <!-- END layout-wrapper -->
>>>>>>> Stashed changes

    <!-- JAVASCRIPT -->

<<<<<<< Updated upstream
        <script src="{{ asset('back/assets/js/app.js') }}"></script>
        <!-- My Custom Sctipt File -->
        <script>
            const CONFIRMATION_MSG = '{{ __('translation.are_you_sure') }}';
        </script>
        <script src="{{ asset('back/assets/js/script.js') }}"></script>

        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
        @yield('js')

        @stack('scripts')
        @yield('js')
=======
    <script src="{{ asset('back/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/node-waves/waves.min.js') }}"></script>


    <script src="{{ asset('back/assets/js/app.js') }}"></script>
    <!-- My Custom Sctipt File -->
    <script src="{{ asset('back/assets/js/script.js') }}"></script>
    {{-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --}}

    <!-- ✅ load DataTables ✅ -->

@stack('scripts')
>>>>>>> Stashed changes

        <script>
            $(function() {
                setTimeout(function() {
                    $('.table-striped').removeClass('dataTable');
                    $('.dt-buttons').hide();
                    $(' .btn-dt-actions').prepend($('.dt-buttons'));
                    $('.dt-buttons').show();
                    $('.deleteBtn').on('click', function() {
                        console.log($(this).data('route'));
                        $('.form-delete-record').attr('action', $(this).data('route'));
                    });
                }, 100);
            });
        </script>
    </div>
</body>
</html>
