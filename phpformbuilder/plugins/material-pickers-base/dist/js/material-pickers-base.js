/*!
 * Materialize v1.0.0 (https://materializecss.com)
 * Copyright 2014-2017 Materialize
 * MIT License (https://raw.githubusercontent.com/Dogfalo/materialize/master/LICENSE)
 */

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/*! cash-dom 1.3.5, https://github.com/kenwheeler/cash @license MIT */
(function (factory) {
  window.cash = factory();
})(function () {
  var doc = document,
    win = window,
    ArrayProto = Array.prototype,
    slice = ArrayProto.slice,
    filter = ArrayProto.filter,
    push = ArrayProto.push;

  var noop = function () { },
    isFunction = function (item) {
      // @see https://crbug.com/568448
      return typeof item === typeof noop && item.call;
    },
    isString = function (item) {
      return typeof item === typeof "";
    };

  var idMatch = /^#[\w-]*$/,
    classMatch = /^\.[\w-]*$/,
    htmlMatch = /<.+>/,
    singlet = /^\w+$/;

  function find(selector, context) {
    context = context || doc;
    var elems = classMatch.test(selector) ? context.getElementsByClassName(selector.slice(1)) : singlet.test(selector) ? context.getElementsByTagName(selector) : context.querySelectorAll(selector);
    return elems;
  }

  var frag;
  function parseHTML(str) {
    if (!frag) {
      frag = doc.implementation.createHTMLDocument(null);
      var base = frag.createElement("base");
      base.href = doc.location.href;
      frag.head.appendChild(base);
    }

    frag.body.innerHTML = str;

    return frag.body.childNodes;
  }

  function onReady(fn) {
    if (doc.readyState !== "loading") {
      fn();
    } else {
      doc.addEventListener("DOMContentLoaded", fn);
    }
  }

  function Init(selector, context) {
    if (!selector) {
      return this;
    }

    // If already a cash collection, don't do any further processing
    if (selector.cash && selector !== win) {
      return selector;
    }

    var elems = selector,
      i = 0,
      length;

    if (isString(selector)) {
      elems = idMatch.test(selector) ?
        // If an ID use the faster getElementById check
        doc.getElementById(selector.slice(1)) : htmlMatch.test(selector) ?
          // If HTML, parse it into real elements
          parseHTML(selector) :
          // else use `find`
          find(selector, context);

      // If function, use as shortcut for DOM ready
    } else if (isFunction(selector)) {
      onReady(selector); return this;
    }

    if (!elems) {
      return this;
    }

    // If a single DOM element is passed in or received via ID, return the single element
    if (elems.nodeType || elems === win) {
      this[0] = elems;
      this.length = 1;
    } else {
      // Treat like an array and loop through each item.
      length = this.length = elems.length;
      for (; i < length; i++) {
        this[i] = elems[i];
      }
    }

    return this;
  }

  function cash(selector, context) {
    return new Init(selector, context);
  }

  var fn = cash.fn = cash.prototype = Init.prototype = { // jshint ignore:line
    cash: true,
    length: 0,
    push: push,
    splice: ArrayProto.splice,
    map: ArrayProto.map,
    init: Init
  };

  Object.defineProperty(fn, "constructor", { value: cash });

  cash.parseHTML = parseHTML;
  cash.noop = noop;
  cash.isFunction = isFunction;
  cash.isString = isString;

  cash.extend = fn.extend = function (target) {
    target = target || {};

    var args = slice.call(arguments),
      length = args.length,
      i = 1;

    if (args.length === 1) {
      target = this;
      i = 0;
    }

    for (; i < length; i++) {
      if (!args[i]) {
        continue;
      }
      for (var key in args[i]) {
        if (args[i].hasOwnProperty(key)) {
          target[key] = args[i][key];
        }
      }
    }

    return target;
  };

  function each(collection, callback) {
    var l = collection.length,
      i = 0;

    for (; i < l; i++) {
      if (callback.call(collection[i], collection[i], i, collection) === false) {
        break;
      }
    }
  }

  function matches(el, selector) {
    var m = el && (el.matches || el.webkitMatchesSelector || el.mozMatchesSelector || el.msMatchesSelector || el.oMatchesSelector);
    return !!m && m.call(el, selector);
  }

  function getCompareFunction(selector) {
    return (
      /* Use browser's `matches` function if string */
      isString(selector) ? matches :
        /* Match a cash element */
        selector.cash ? function (el) {
          return selector.is(el);
        } :
          /* Direct comparison */
          function (el, selector) {
            return el === selector;
          }
    );
  }

  function unique(collection) {
    return cash(slice.call(collection).filter(function (item, index, self) {
      return self.indexOf(item) === index;
    }));
  }

  cash.extend({
    merge: function (first, second) {
      var len = +second.length,
        i = first.length,
        j = 0;

      for (; j < len; i++, j++) {
        first[i] = second[j];
      }

      first.length = i;
      return first;
    },

    each: each,
    matches: matches,
    unique: unique,
    isArray: Array.isArray,
    isNumeric: function (n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }

  });

  var uid = cash.uid = "_cash" + Date.now();

  function getDataCache(node) {
    return node[uid] = node[uid] || {};
  }

  function setData(node, key, value) {
    return getDataCache(node)[key] = value;
  }

  function getData(node, key) {
    var c = getDataCache(node);
    if (c[key] === undefined) {
      c[key] = node.dataset ? node.dataset[key] : cash(node).attr("data-" + key);
    }
    return c[key];
  }

  function removeData(node, key) {
    var c = getDataCache(node);
    if (c) {
      delete c[key];
    } else if (node.dataset) {
      delete node.dataset[key];
    } else {
      cash(node).removeAttr("data-" + name);
    }
  }

  fn.extend({
    data: function (name, value) {
      if (isString(name)) {
        return value === undefined ? getData(this[0], name) : this.each(function (v) {
          return setData(v, name, value);
        });
      }

      for (var key in name) {
        this.data(key, name[key]);
      }

      return this;
    },

    removeData: function (key) {
      return this.each(function (v) {
        return removeData(v, key);
      });
    }

  });

  var notWhiteMatch = /\S+/g;

  function getClasses(c) {
    return isString(c) && c.match(notWhiteMatch);
  }

  function hasClass(v, c) {
    return v.classList ? v.classList.contains(c) : new RegExp("(^| )" + c + "( |$)", "gi").test(v.className);
  }

  function addClass(v, c, spacedName) {
    if (v.classList) {
      v.classList.add(c);
    } else if (spacedName.indexOf(" " + c + " ")) {
      v.className += " " + c;
    }
  }

  function removeClass(v, c) {
    if (v.classList) {
      v.classList.remove(c);
    } else {
      v.className = v.className.replace(c, "");
    }
  }

  fn.extend({
    addClass: function (c) {
      var classes = getClasses(c);

      return classes ? this.each(function (v) {
        var spacedName = " " + v.className + " ";
        each(classes, function (c) {
          addClass(v, c, spacedName);
        });
      }) : this;
    },

    attr: function (name, value) {
      if (!name) {
        return undefined;
      }

      if (isString(name)) {
        if (value === undefined) {
          return this[0] ? this[0].getAttribute ? this[0].getAttribute(name) : this[0][name] : undefined;
        }

        return this.each(function (v) {
          if (v.setAttribute) {
            v.setAttribute(name, value);
          } else {
            v[name] = value;
          }
        });
      }

      for (var key in name) {
        this.attr(key, name[key]);
      }

      return this;
    },

    hasClass: function (c) {
      var check = false,
        classes = getClasses(c);
      if (classes && classes.length) {
        this.each(function (v) {
          check = hasClass(v, classes[0]);
          return !check;
        });
      }
      return check;
    },

    prop: function (name, value) {
      if (isString(name)) {
        return value === undefined ? this[0][name] : this.each(function (v) {
          v[name] = value;
        });
      }

      for (var key in name) {
        this.prop(key, name[key]);
      }

      return this;
    },

    removeAttr: function (name) {
      return this.each(function (v) {
        if (v.removeAttribute) {
          v.removeAttribute(name);
        } else {
          delete v[name];
        }
      });
    },

    removeClass: function (c) {
      if (!arguments.length) {
        return this.attr("class", "");
      }
      var classes = getClasses(c);
      return classes ? this.each(function (v) {
        each(classes, function (c) {
          removeClass(v, c);
        });
      }) : this;
    },

    removeProp: function (name) {
      return this.each(function (v) {
        delete v[name];
      });
    },

    toggleClass: function (c, state) {
      if (state !== undefined) {
        return this[state ? "addClass" : "removeClass"](c);
      }
      var classes = getClasses(c);
      return classes ? this.each(function (v) {
        var spacedName = " " + v.className + " ";
        each(classes, function (c) {
          if (hasClass(v, c)) {
            removeClass(v, c);
          } else {
            addClass(v, c, spacedName);
          }
        });
      }) : this;
    }
  });

  fn.extend({
    add: function (selector, context) {
      return unique(cash.merge(this, cash(selector, context)));
    },

    each: function (callback) {
      each(this, callback);
      return this;
    },

    eq: function (index) {
      return cash(this.get(index));
    },

    filter: function (selector) {
      if (!selector) {
        return this;
      }

      var comparator = isFunction(selector) ? selector : getCompareFunction(selector);

      return cash(filter.call(this, function (e) {
        return comparator(e, selector);
      }));
    },

    first: function () {
      return this.eq(0);
    },

    get: function (index) {
      if (index === undefined) {
        return slice.call(this);
      }
      return index < 0 ? this[index + this.length] : this[index];
    },

    index: function (elem) {
      var child = elem ? cash(elem)[0] : this[0],
        collection = elem ? this : cash(child).parent().children();
      return slice.call(collection).indexOf(child);
    },

    last: function () {
      return this.eq(-1);
    }

  });

  var camelCase = function () {
    var camelRegex = /(?:^\w|[A-Z]|\b\w)/g,
      whiteSpace = /[\s-_]+/g;
    return function (str) {
      return str.replace(camelRegex, function (letter, index) {
        return letter[index === 0 ? "toLowerCase" : "toUpperCase"]();
      }).replace(whiteSpace, "");
    };
  }();

  var getPrefixedProp = function () {
    var cache = {},
      doc = document,
      div = doc.createElement("div"),
      style = div.style;

    return function (prop) {
      prop = camelCase(prop);
      if (cache[prop]) {
        return cache[prop];
      }

      var ucProp = prop.charAt(0).toUpperCase() + prop.slice(1),
        prefixes = ["webkit", "moz", "ms", "o"],
        props = (prop + " " + prefixes.join(ucProp + " ") + ucProp).split(" ");

      each(props, function (p) {
        if (p in style) {
          cache[p] = prop = cache[prop] = p;
          return false;
        }
      });

      return cache[prop];
    };
  }();

  cash.prefixedProp = getPrefixedProp;
  cash.camelCase = camelCase;

  fn.extend({
    css: function (prop, value) {
      if (isString(prop)) {
        prop = getPrefixedProp(prop);
        return arguments.length > 1 ? this.each(function (v) {
          return v.style[prop] = value;
        }) : win.getComputedStyle(this[0])[prop];
      }

      for (var key in prop) {
        this.css(key, prop[key]);
      }

      return this;
    }

  });

  function compute(el, prop) {
    return parseInt(win.getComputedStyle(el[0], null)[prop], 10) || 0;
  }

  each(["Width", "Height"], function (v) {
    var lower = v.toLowerCase();

    fn[lower] = function () {
      return this[0].getBoundingClientRect()[lower];
    };

    fn["inner" + v] = function () {
      return this[0]["client" + v];
    };

    fn["outer" + v] = function (margins) {
      return this[0]["offset" + v] + (margins ? compute(this, "margin" + (v === "Width" ? "Left" : "Top")) + compute(this, "margin" + (v === "Width" ? "Right" : "Bottom")) : 0);
    };
  });

  function registerEvent(node, eventName, callback) {
    var eventCache = getData(node, "_cashEvents") || setData(node, "_cashEvents", {});
    eventCache[eventName] = eventCache[eventName] || [];
    eventCache[eventName].push(callback);
    node.addEventListener(eventName, callback);
  }

  function removeEvent(node, eventName, callback) {
    var events = getData(node, "_cashEvents"),
      eventCache = events && events[eventName],
      index;

    if (!eventCache) {
      return;
    }

    if (callback) {
      node.removeEventListener(eventName, callback);
      index = eventCache.indexOf(callback);
      if (index >= 0) {
        eventCache.splice(index, 1);
      }
    } else {
      each(eventCache, function (event) {
        node.removeEventListener(eventName, event);
      });
      eventCache = [];
    }
  }

  fn.extend({
    off: function (eventName, callback) {
      return this.each(function (v) {
        return removeEvent(v, eventName, callback);
      });
    },

    on: function (eventName, delegate, callback, runOnce) {
      // jshint ignore:line
      var originalCallback;
      if (!isString(eventName)) {
        for (var key in eventName) {
          this.on(key, delegate, eventName[key]);
        }
        return this;
      }

      if (isFunction(delegate)) {
        callback = delegate;
        delegate = null;
      }

      if (eventName === "ready") {
        onReady(callback);
        return this;
      }

      if (delegate) {
        originalCallback = callback;
        callback = function (e) {
          var t = e.target;
          while (!matches(t, delegate)) {
            if (t === this || t === null) {
              return t = false;
            }

            t = t.parentNode;
          }

          if (t) {
            originalCallback.call(t, e);
          }
        };
      }

      return this.each(function (v) {
        var finalCallback = callback;
        if (runOnce) {
          finalCallback = function () {
            callback.apply(this, arguments);
            removeEvent(v, eventName, finalCallback);
          };
        }
        registerEvent(v, eventName, finalCallback);
      });
    },

    one: function (eventName, delegate, callback) {
      return this.on(eventName, delegate, callback, true);
    },

    ready: onReady,

    /**
     * Modified
     * Triggers browser event
     * @param String eventName
     * @param Object data - Add properties to event object
     */
    trigger: function (eventName, data) {
      if (document.createEvent) {
        var evt = document.createEvent('HTMLEvents');
        evt.initEvent(eventName, true, false);
        evt = this.extend(evt, data);
        return this.each(function (v) {
          return v.dispatchEvent(evt);
        });
      }
    }

  });

  function encode(name, value) {
    return "&" + encodeURIComponent(name) + "=" + encodeURIComponent(value).replace(/%20/g, "+");
  }

  function getSelectMultiple_(el) {
    var values = [];
    each(el.options, function (o) {
      if (o.selected) {
        values.push(o.value);
      }
    });
    return values.length ? values : null;
  }

  function getSelectSingle_(el) {
    var selectedIndex = el.selectedIndex;
    return selectedIndex >= 0 ? el.options[selectedIndex].value : null;
  }

  function getValue(el) {
    var type = el.type;
    if (!type) {
      return null;
    }
    switch (type.toLowerCase()) {
      case "select-one":
        return getSelectSingle_(el);
      case "select-multiple":
        return getSelectMultiple_(el);
      case "radio":
        return el.checked ? el.value : null;
      case "checkbox":
        return el.checked ? el.value : null;
      default:
        return el.value ? el.value : null;
    }
  }

  fn.extend({
    serialize: function () {
      var query = "";

      each(this[0].elements || this, function (el) {
        if (el.disabled || el.tagName === "FIELDSET") {
          return;
        }
        var name = el.name;
        switch (el.type.toLowerCase()) {
          case "file":
          case "reset":
          case "submit":
          case "button":
            break;
          case "select-multiple":
            var values = getValue(el);
            if (values !== null) {
              each(values, function (value) {
                query += encode(name, value);
              });
            }
            break;
          default:
            var value = getValue(el);
            if (value !== null) {
              query += encode(name, value);
            }
        }
      });

      return query.substr(1);
    },

    val: function (value) {
      if (value === undefined) {
        return getValue(this[0]);
      }

      return this.each(function (v) {
        return v.value = value;
      });
    }

  });

  function insertElement(el, child, prepend) {
    if (prepend) {
      var first = el.childNodes[0];
      el.insertBefore(child, first);
    } else {
      el.appendChild(child);
    }
  }

  function insertContent(parent, child, prepend) {
    var str = isString(child);

    if (!str && child.length) {
      each(child, function (v) {
        return insertContent(parent, v, prepend);
      });
      return;
    }

    each(parent, str ? function (v) {
      return v.insertAdjacentHTML(prepend ? "afterbegin" : "beforeend", child);
    } : function (v, i) {
      return insertElement(v, i === 0 ? child : child.cloneNode(true), prepend);
    });
  }

  fn.extend({
    after: function (selector) {
      cash(selector).insertAfter(this);
      return this;
    },

    append: function (content) {
      insertContent(this, content);
      return this;
    },

    appendTo: function (parent) {
      insertContent(cash(parent), this);
      return this;
    },

    before: function (selector) {
      cash(selector).insertBefore(this);
      return this;
    },

    clone: function () {
      return cash(this.map(function (v) {
        return v.cloneNode(true);
      }));
    },

    empty: function () {
      this.html("");
      return this;
    },

    html: function (content) {
      if (content === undefined) {
        return this[0].innerHTML;
      }
      var source = content.nodeType ? content[0].outerHTML : content;
      return this.each(function (v) {
        return v.innerHTML = source;
      });
    },

    insertAfter: function (selector) {
      var _this = this;

      cash(selector).each(function (el, i) {
        var parent = el.parentNode,
          sibling = el.nextSibling;
        _this.each(function (v) {
          parent.insertBefore(i === 0 ? v : v.cloneNode(true), sibling);
        });
      });

      return this;
    },

    insertBefore: function (selector) {
      var _this2 = this;
      cash(selector).each(function (el, i) {
        var parent = el.parentNode;
        _this2.each(function (v) {
          parent.insertBefore(i === 0 ? v : v.cloneNode(true), el);
        });
      });
      return this;
    },

    prepend: function (content) {
      insertContent(this, content, true);
      return this;
    },

    prependTo: function (parent) {
      insertContent(cash(parent), this, true);
      return this;
    },

    remove: function () {
      return this.each(function (v) {
        if (!!v.parentNode) {
          return v.parentNode.removeChild(v);
        }
      });
    },

    text: function (content) {
      if (content === undefined) {
        return this[0].textContent;
      }
      return this.each(function (v) {
        return v.textContent = content;
      });
    }

  });

  var docEl = doc.documentElement;

  fn.extend({
    position: function () {
      var el = this[0];
      return {
        left: el.offsetLeft,
        top: el.offsetTop
      };
    },

    offset: function () {
      var rect = this[0].getBoundingClientRect();
      return {
        top: rect.top + win.pageYOffset - docEl.clientTop,
        left: rect.left + win.pageXOffset - docEl.clientLeft
      };
    },

    offsetParent: function () {
      return cash(this[0].offsetParent);
    }

  });

  fn.extend({
    children: function (selector) {
      var elems = [];
      this.each(function (el) {
        push.apply(elems, el.children);
      });
      elems = unique(elems);

      return !selector ? elems : elems.filter(function (v) {
        return matches(v, selector);
      });
    },

    closest: function (selector) {
      if (!selector || this.length < 1) {
        return cash();
      }
      if (this.is(selector)) {
        return this.filter(selector);
      }
      return this.parent().closest(selector);
    },

    is: function (selector) {
      if (!selector) {
        return false;
      }

      var match = false,
        comparator = getCompareFunction(selector);

      this.each(function (el) {
        match = comparator(el, selector);
        return !match;
      });

      return match;
    },

    find: function (selector) {
      if (!selector || selector.nodeType) {
        return cash(selector && this.has(selector).length ? selector : null);
      }

      var elems = [];
      this.each(function (el) {
        push.apply(elems, find(selector, el));
      });

      return unique(elems);
    },

    has: function (selector) {
      var comparator = isString(selector) ? function (el) {
        return find(selector, el).length !== 0;
      } : function (el) {
        return el.contains(selector);
      };

      return this.filter(comparator);
    },

    next: function () {
      return cash(this[0].nextElementSibling);
    },

    not: function (selector) {
      if (!selector) {
        return this;
      }

      var comparator = getCompareFunction(selector);

      return this.filter(function (el) {
        return !comparator(el, selector);
      });
    },

    parent: function () {
      var result = [];

      this.each(function (item) {
        if (item && item.parentNode) {
          result.push(item.parentNode);
        }
      });

      return unique(result);
    },

    parents: function (selector) {
      var last,
        result = [];

      this.each(function (item) {
        last = item;

        while (last && last.parentNode && last !== doc.body.parentNode) {
          last = last.parentNode;

          if (!selector || selector && matches(last, selector)) {
            result.push(last);
          }
        }
      });

      return unique(result);
    },

    prev: function () {
      return cash(this[0].previousElementSibling);
    },

    siblings: function (selector) {
      var collection = this.parent().children(selector),
        el = this[0];

      return collection.filter(function (i) {
        return i !== el;
      });
    }

  });

  return cash;
});
;
var Component = function () {
  /**
   * Generic constructor for all components
   * @constructor
   * @param {Element} el
   * @param {Object} options
   */
  function Component(classDef, el, options) {
    _classCallCheck(this, Component);

    // Display error if el is valid HTML Element
    if (!(el instanceof Element)) {
      console.error(Error(el + ' is not an HTML Element'));
    }

    // If exists, destroy and reinitialize in child
    var ins = classDef.getInstance(el);
    if (!!ins) {
      ins.destroy();
    }

    this.el = el;
    this.$el = cash(el);
  }

  /**
   * Initializes components
   * @param {class} classDef
   * @param {Element | NodeList | jQuery} els
   * @param {Object} options
   */


  _createClass(Component, null, [{
    key: "init",
    value: function init(classDef, els, options) {
      var instances = null;
      if (els instanceof Element) {
        instances = new classDef(els, options);
      } else if (!!els && (els.jquery || els.cash || els instanceof NodeList)) {
        var instancesArr = [];
        for (var i = 0; i < els.length; i++) {
          instancesArr.push(new classDef(els[i], options));
        }
        instances = instancesArr;
      }

      return instances;
    }
  }]);

  return Component;
}();

; // Required for Meteor package, the use of window prevents export by Meteor
(function (window) {
  if (window.Package) {
    M = {};
  } else {
    window.M = {};
  }

  // Check for jQuery
  M.jQueryLoaded = !!window.jQuery;
})(window);

// AMD
if (typeof define === 'function' && define.amd) {
  define('M', [], function () {
    return M;
  });

  // Common JS
} else if (typeof exports !== 'undefined' && !exports.nodeType) {
  if (typeof module !== 'undefined' && !module.nodeType && module.exports) {
    exports = module.exports = M;
  }
  exports.default = M;
}

M.version = '1.0.0';

M.keys = {
  TAB: 9,
  ENTER: 13,
  ESC: 27,
  ARROW_UP: 38,
  ARROW_DOWN: 40
};

/**
 * TabPress Keydown handler
 */
M.tabPressed = false;
M.keyDown = false;
let docHandleKeydown = function (e) {
  M.keyDown = true;
  if (e.which === M.keys.TAB || e.which === M.keys.ARROW_DOWN || e.which === M.keys.ARROW_UP) {
    M.tabPressed = true;
  }
};
let docHandleKeyup = function (e) {
  M.keyDown = false;
  if (e.which === M.keys.TAB || e.which === M.keys.ARROW_DOWN || e.which === M.keys.ARROW_UP) {
    M.tabPressed = false;
  }
};
let docHandleFocus = function (e) {
  if (M.keyDown) {
    document.body.classList.add('keyboard-focused');
  }
};
let docHandleBlur = function (e) {
  document.body.classList.remove('keyboard-focused');
};
document.addEventListener('keydown', docHandleKeydown, true);
document.addEventListener('keyup', docHandleKeyup, true);
document.addEventListener('focus', docHandleFocus, true);
document.addEventListener('blur', docHandleBlur, true);

/**
 * Initialize jQuery wrapper for plugin
 * @param {Class} plugin  javascript class
 * @param {string} pluginName  jQuery plugin name
 * @param {string} classRef  Class reference name
 */
M.initializeJqueryWrapper = function (plugin, pluginName, classRef) {
  jQuery.fn[pluginName] = function (methodOrOptions) {
    // Call plugin method if valid method name is passed in
    if (plugin.prototype[methodOrOptions]) {
      let params = Array.prototype.slice.call(arguments, 1);

      // Getter methods
      if (methodOrOptions.slice(0, 3) === 'get') {
        let instance = this.first()[0][classRef];
        return instance[methodOrOptions].apply(instance, params);
      }

      // Void methods
      return this.each(function () {
        let instance = this[classRef];
        instance[methodOrOptions].apply(instance, params);
      });

      // Initialize plugin if options or no argument is passed in
    } else if (typeof methodOrOptions === 'object' || !methodOrOptions) {
      plugin.init(this, arguments[0]);
      return this;
    }

    // Return error if an unrecognized  method name is passed in
    jQuery.error(`Method ${methodOrOptions} does not exist on jQuery.${pluginName}`);
  };
};

/**
 * Automatically initialize components
 * @param {Element} context  DOM Element to search within for components
 */
M.AutoInit = function (context) {
  // Use document.body if no context is given
  let root = !!context ? context : document.body;

  let registry = {
    // Autocomplete: root.querySelectorAll('.autocomplete:not(.no-autoinit)'),
    // Carousel: root.querySelectorAll('.carousel:not(.no-autoinit)'),
    // Chips: root.querySelectorAll('.chips:not(.no-autoinit)'),
    Collapsible: root.querySelectorAll('.collapsible:not(.no-autoinit)'),
    Datepicker: root.querySelectorAll('.datepicker:not(.no-autoinit)'),
    Dropdown: root.querySelectorAll('.dropdown-trigger:not(.no-autoinit)'),
    // Materialbox: root.querySelectorAll('.materialboxed:not(.no-autoinit)'),
    Modal: root.querySelectorAll('.modal:not(.no-autoinit)'),
    // Parallax: root.querySelectorAll('.parallax:not(.no-autoinit)'),
    // Pushpin: root.querySelectorAll('.pushpin:not(.no-autoinit)'),
    // ScrollSpy: root.querySelectorAll('.scrollspy:not(.no-autoinit)'),
    FormSelect: root.querySelectorAll('select:not(.no-autoinit)'),
    // Sidenav: root.querySelectorAll('.sidenav:not(.no-autoinit)'),
    // Tabs: root.querySelectorAll('.tabs:not(.no-autoinit)'),
    TapTarget: root.querySelectorAll('.tap-target:not(.no-autoinit)'),
    Timepicker: root.querySelectorAll('.timepicker:not(.no-autoinit)')
    // Tooltip: root.querySelectorAll('.tooltipped:not(.no-autoinit)'),
    // FloatingActionButton: root.querySelectorAll('.fixed-action-btn:not(.no-autoinit)')
  };

  for (let pluginName in registry) {
    let plugin = M[pluginName];
    plugin.init(registry[pluginName]);
  }
};

/**
 * Generate approximated selector string for a jQuery object
 * @param {jQuery} obj  jQuery object to be parsed
 * @returns {string}
 */
M.objectSelectorString = function (obj) {
  let tagStr = obj.prop('tagName') || '';
  let idStr = obj.attr('id') || '';
  let classStr = obj.attr('class') || '';
  return (tagStr + idStr + classStr).replace(/\s/g, '');
};

// Unique Random ID
M.guid = (function () {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return function () {
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
  };
})();

/**
 * Escapes hash from special characters
 * @param {string} hash  String returned from this.hash
 * @returns {string}
 */
M.escapeHash = function (hash) {
  return hash.replace(/(:|\.|\[|\]|,|=|\/)/g, '\\$1');
};

M.elementOrParentIsFixed = function (element) {
  let $element = $(element);
  let $checkElements = $element.add($element.parents());
  let isFixed = false;
  $checkElements.each(function () {
    if ($(this).css('position') === 'fixed') {
      isFixed = true;
      return false;
    }
  });
  return isFixed;
};

/**
 * @typedef {Object} Edges
 * @property {Boolean} top  If the top edge was exceeded
 * @property {Boolean} right  If the right edge was exceeded
 * @property {Boolean} bottom  If the bottom edge was exceeded
 * @property {Boolean} left  If the left edge was exceeded
 */

/**
 * @typedef {Object} Bounding
 * @property {Number} left  left offset coordinate
 * @property {Number} top  top offset coordinate
 * @property {Number} width
 * @property {Number} height
 */

/**
 * Escapes hash from special characters
 * @param {Element} container  Container element that acts as the boundary
 * @param {Bounding} bounding  element bounding that is being checked
 * @param {Number} offset  offset from edge that counts as exceeding
 * @returns {Edges}
 */
M.checkWithinContainer = function (container, bounding, offset) {
  let edges = {
    top: false,
    right: false,
    bottom: false,
    left: false
  };

  let containerRect = container.getBoundingClientRect();
  // If body element is smaller than viewport, use viewport height instead.
  let containerBottom = container === document.body ? Math.max(containerRect.bottom, window.innerHeight) : containerRect.bottom;

  let scrollLeft = container.scrollLeft;
  let scrollTop = container.scrollTop;

  let scrolledX = bounding.left - scrollLeft;
  let scrolledY = bounding.top - scrollTop;

  // Check for container and viewport for each edge
  if (scrolledX < containerRect.left + offset || scrolledX < offset) {
    edges.left = true;
  }

  if (scrolledX + bounding.width > containerRect.right - offset || scrolledX + bounding.width > window.innerWidth - offset) {
    edges.right = true;
  }

  if (scrolledY < containerRect.top + offset || scrolledY < offset) {
    edges.top = true;
  }

  if (scrolledY + bounding.height > containerBottom - offset || scrolledY + bounding.height > window.innerHeight - offset) {
    edges.bottom = true;
  }

  return edges;
};

M.checkPossibleAlignments = function (el, container, bounding, offset) {
  let canAlign = {
    top: true,
    right: true,
    bottom: true,
    left: true,
    spaceOnTop: null,
    spaceOnRight: null,
    spaceOnBottom: null,
    spaceOnLeft: null
  };

  let containerAllowsOverflow = getComputedStyle(container).overflow === 'visible';
  let containerRect = container.getBoundingClientRect();
  let containerHeight = Math.min(containerRect.height, window.innerHeight);
  let containerWidth = Math.min(containerRect.width, window.innerWidth);
  let elOffsetRect = el.getBoundingClientRect();

  let scrollLeft = container.scrollLeft;
  let scrollTop = container.scrollTop;

  let scrolledX = bounding.left - scrollLeft;
  let scrolledYTopEdge = bounding.top - scrollTop;
  let scrolledYBottomEdge = bounding.top + elOffsetRect.height - scrollTop;

  // Check for container and viewport for left
  canAlign.spaceOnRight = !containerAllowsOverflow ? containerWidth - (scrolledX + bounding.width) : window.innerWidth - (elOffsetRect.left + bounding.width);
  if (canAlign.spaceOnRight < 0) {
    canAlign.left = false;
  }

  // Check for container and viewport for Right
  canAlign.spaceOnLeft = !containerAllowsOverflow ? scrolledX - bounding.width + elOffsetRect.width : elOffsetRect.right - bounding.width;
  if (canAlign.spaceOnLeft < 0) {
    canAlign.right = false;
  }

  // Check for container and viewport for Top
  canAlign.spaceOnBottom = !containerAllowsOverflow ? containerHeight - (scrolledYTopEdge + bounding.height + offset) : window.innerHeight - (elOffsetRect.top + bounding.height + offset);
  if (canAlign.spaceOnBottom < 0) {
    canAlign.top = false;
  }

  // Check for container and viewport for Bottom
  canAlign.spaceOnTop = !containerAllowsOverflow ? scrolledYBottomEdge - (bounding.height - offset) : elOffsetRect.bottom - (bounding.height + offset);
  if (canAlign.spaceOnTop < 0) {
    canAlign.bottom = false;
  }

  return canAlign;
};

M.getOverflowParent = function (element) {
  if (element == null) {
    return null;
  }

  if (element === document.body || getComputedStyle(element).overflow !== 'visible') {
    return element;
  }

  return M.getOverflowParent(element.parentElement);
};

/**
 * Gets id of component from a trigger
 * @param {Element} trigger  trigger
 * @returns {string}
 */
M.getIdFromTrigger = function (trigger) {
  let id = trigger.getAttribute('data-target');
  if (!id) {
    id = trigger.getAttribute('href');
    if (id) {
      id = id.slice(1);
    } else {
      id = '';
    }
  }
  return id;
};

/**
 * Multi browser support for document scroll top
 * @returns {Number}
 */
M.getDocumentScrollTop = function () {
  return window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
};

/**
 * Multi browser support for document scroll left
 * @returns {Number}
 */
M.getDocumentScrollLeft = function () {
  return window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft || 0;
};

/**
 * @typedef {Object} Edges
 * @property {Boolean} top  If the top edge was exceeded
 * @property {Boolean} right  If the right edge was exceeded
 * @property {Boolean} bottom  If the bottom edge was exceeded
 * @property {Boolean} left  If the left edge was exceeded
 */

/**
 * @typedef {Object} Bounding
 * @property {Number} left  left offset coordinate
 * @property {Number} top  top offset coordinate
 * @property {Number} width
 * @property {Number} height
 */

/**
 * Get time in ms
 * @license https://raw.github.com/jashkenas/underscore/master/LICENSE
 * @type {function}
 * @return {number}
 */
let getTime =
  Date.now ||
  function () {
    return new Date().getTime();
  };

/**
 * Returns a function, that, when invoked, will only be triggered at most once
 * during a given window of time. Normally, the throttled function will run
 * as much as it can, without ever going more than once per `wait` duration;
 * but if you'd like to disable the execution on the leading edge, pass
 * `{leading: false}`. To disable execution on the trailing edge, ditto.
 * @license https://raw.github.com/jashkenas/underscore/master/LICENSE
 * @param {function} func
 * @param {number} wait
 * @param {Object=} options
 * @returns {Function}
 */
M.throttle = function (func, wait, options) {
  let context, args, result;
  let timeout = null;
  let previous = 0;
  options || (options = {});
  let later = function () {
    previous = options.leading === false ? 0 : getTime();
    timeout = null;
    result = func.apply(context, args);
    context = args = null;
  };
  return function () {
    let now = getTime();
    if (!previous && options.leading === false) previous = now;
    let remaining = wait - (now - previous);
    context = this;
    args = arguments;
    if (remaining <= 0) {
      clearTimeout(timeout);
      timeout = null;
      previous = now;
      result = func.apply(context, args);
      context = args = null;
    } else if (!timeout && options.trailing !== false) {
      timeout = setTimeout(later, remaining);
    }
    return result;
  };
};

/*
 v2.2.0
 2017 Julian Garnier
 Released under the MIT license
*/
var $jscomp = {
  scope: {}
};

$jscomp.defineProperty = "function" == typeof Object.defineProperties ? Object.defineProperty : function (e, r, p) {
  if (p.get || p.set) throw new TypeError("ES3 does not support getters and setters.");
  e != Array.prototype && e != Object.prototype && (e[r] = p.value);
};

$jscomp.getGlobal = function (e) {
  return "undefined" != typeof window && window === e ? e : "undefined" != typeof global && null != global ? global : e;
};

$jscomp.global = $jscomp.getGlobal(this);

$jscomp.SYMBOL_PREFIX = "jscomp_symbol_";

$jscomp.initSymbol = function () {
  $jscomp.initSymbol = function () { };
  $jscomp.global.Symbol || ($jscomp.global.Symbol = $jscomp.Symbol);
};

$jscomp.symbolCounter_ = 0;

$jscomp.Symbol = function (e) {
  return $jscomp.SYMBOL_PREFIX + (e || "") + $jscomp.symbolCounter_++;
};

$jscomp.initSymbolIterator = function () {
  $jscomp.initSymbol();
  var e = $jscomp.global.Symbol.iterator;
  e || (e = $jscomp.global.Symbol.iterator = $jscomp.global.Symbol("iterator"));
  "function" != typeof Array.prototype[e] && $jscomp.defineProperty(Array.prototype, e, {
    configurable: !0,
    writable: !0,
    value: function () {
      return $jscomp.arrayIterator(this);
    }
  });
  $jscomp.initSymbolIterator = function () { };
};

$jscomp.arrayIterator = function (e) {
  var r = 0;
  return $jscomp.iteratorPrototype(function () {
    return r < e.length ? {
      done: !1,
      value: e[r++]
    } : {
      done: !0
    };
  });
};

$jscomp.iteratorPrototype = function (e) {
  $jscomp.initSymbolIterator();
  e = {
    next: e
  };
  e[$jscomp.global.Symbol.iterator] = function () {
    return this;
  };
  return e;
};

$jscomp.array = $jscomp.array || {};

$jscomp.iteratorFromArray = function (e, r) {
  $jscomp.initSymbolIterator();
  e instanceof String && (e += "");
  var p = 0, m = {
    next: function () {
      if (p < e.length) {
        var u = p++;
        return {
          value: r(u, e[u]),
          done: !1
        };
      }
      m.next = function () {
        return {
          done: !0,
          value: void 0
        };
      };
      return m.next();
    }
  };
  m[Symbol.iterator] = function () {
    return m;
  };
  return m;
};

$jscomp.polyfill = function (e, r, p, m) {
  if (r) {
    p = $jscomp.global;
    e = e.split(".");
    for (m = 0; m < e.length - 1; m++) {
      var u = e[m];
      u in p || (p[u] = {});
      p = p[u];
    }
    e = e[e.length - 1];
    m = p[e];
    r = r(m);
    r != m && null != r && $jscomp.defineProperty(p, e, {
      configurable: !0,
      writable: !0,
      value: r
    });
  }
};

$jscomp.polyfill("Array.prototype.keys", function (e) {
  return e ? e : function () {
    return $jscomp.iteratorFromArray(this, function (e) {
      return e;
    });
  };
}, "es6-impl", "es3");

var $jscomp$this = this;

(function (r) {
  M.anime = r();
})(function () {
  function e(a) {
    if (!h.col(a)) try {
      return document.querySelectorAll(a);
    } catch (c) { }
  }
  function r(a, c) {
    for (var d = a.length, b = 2 <= arguments.length ? arguments[1] : void 0, f = [], n = 0; n < d; n++) if (n in a) {
      var k = a[n];
      c.call(b, k, n, a) && f.push(k);
    }
    return f;
  }
  function p(a) {
    return a.reduce(function (a, d) {
      return a.concat(h.arr(d) ? p(d) : d);
    }, []);
  }
  function m(a) {
    if (h.arr(a)) return a;
    h.str(a) && (a = e(a) || a);
    return a instanceof NodeList || a instanceof HTMLCollection ? [].slice.call(a) : [a];
  }
  function u(a, c) {
    return a.some(function (a) {
      return a === c;
    });
  }
  function C(a) {
    var c = {}, d;
    for (d in a) c[d] = a[d];
    return c;
  }
  function D(a, c) {
    var d = C(a), b;
    for (b in a) d[b] = c.hasOwnProperty(b) ? c[b] : a[b];
    return d;
  }
  function z(a, c) {
    var d = C(a), b;
    for (b in c) d[b] = h.und(a[b]) ? c[b] : a[b];
    return d;
  }
  function T(a) {
    a = a.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i, function (a, c, d, k) {
      return c + c + d + d + k + k;
    });
    var c = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(a);
    a = parseInt(c[1], 16);
    var d = parseInt(c[2], 16), c = parseInt(c[3], 16);
    return "rgba(" + a + "," + d + "," + c + ",1)";
  }
  function U(a) {
    function c(a, c, b) {
      0 > b && (b += 1);
      1 < b && --b;
      return b < 1 / 6 ? a + 6 * (c - a) * b : .5 > b ? c : b < 2 / 3 ? a + (c - a) * (2 / 3 - b) * 6 : a;
    }
    var d = /hsl\((\d+),\s*([\d.]+)%,\s*([\d.]+)%\)/g.exec(a) || /hsla\((\d+),\s*([\d.]+)%,\s*([\d.]+)%,\s*([\d.]+)\)/g.exec(a);
    a = parseInt(d[1]) / 360;
    var b = parseInt(d[2]) / 100, f = parseInt(d[3]) / 100, d = d[4] || 1;
    if (0 == b) f = b = a = f; else {
      var n = .5 > f ? f * (1 + b) : f + b - f * b, k = 2 * f - n, f = c(k, n, a + 1 / 3), b = c(k, n, a);
      a = c(k, n, a - 1 / 3);
    }
    return "rgba(" + 255 * f + "," + 255 * b + "," + 255 * a + "," + d + ")";
  }
  function y(a) {
    if (a = /([\+\-]?[0-9#\.]+)(%|px|pt|em|rem|in|cm|mm|ex|ch|pc|vw|vh|vmin|vmax|deg|rad|turn)?$/.exec(a)) return a[2];
  }
  function V(a) {
    if (-1 < a.indexOf("translate") || "perspective" === a) return "px";
    if (-1 < a.indexOf("rotate") || -1 < a.indexOf("skew")) return "deg";
  }
  function I(a, c) {
    return h.fnc(a) ? a(c.target, c.id, c.total) : a;
  }
  function E(a, c) {
    if (c in a.style) return getComputedStyle(a).getPropertyValue(c.replace(/([a-z])([A-Z])/g, "$1-$2").toLowerCase()) || "0";
  }
  function J(a, c) {
    if (h.dom(a) && u(W, c)) return "transform";
    if (h.dom(a) && (a.getAttribute(c) || h.svg(a) && a[c])) return "attribute";
    if (h.dom(a) && "transform" !== c && E(a, c)) return "css";
    if (null != a[c]) return "object";
  }
  function X(a, c) {
    var d = V(c), d = -1 < c.indexOf("scale") ? 1 : 0 + d;
    a = a.style.transform;
    if (!a) return d;
    for (var b = [], f = [], n = [], k = /(\w+)\((.+?)\)/g; b = k.exec(a);) f.push(b[1]),
      n.push(b[2]);
    a = r(n, function (a, b) {
      return f[b] === c;
    });
    return a.length ? a[0] : d;
  }
  function K(a, c) {
    switch (J(a, c)) {
      case "transform":
        return X(a, c);

      case "css":
        return E(a, c);

      case "attribute":
        return a.getAttribute(c);
    }
    return a[c] || 0;
  }
  function L(a, c) {
    var d = /^(\*=|\+=|-=)/.exec(a);
    if (!d) return a;
    var b = y(a) || 0;
    c = parseFloat(c);
    a = parseFloat(a.replace(d[0], ""));
    switch (d[0][0]) {
      case "+":
        return c + a + b;

      case "-":
        return c - a + b;

      case "*":
        return c * a + b;
    }
  }
  function F(a, c) {
    return Math.sqrt(Math.pow(c.x - a.x, 2) + Math.pow(c.y - a.y, 2));
  }
  function M(a) {
    a = a.points;
    for (var c = 0, d, b = 0; b < a.numberOfItems; b++) {
      var f = a.getItem(b);
      0 < b && (c += F(d, f));
      d = f;
    }
    return c;
  }
  function N(a) {
    if (a.getTotalLength) return a.getTotalLength();
    switch (a.tagName.toLowerCase()) {
      case "circle":
        return 2 * Math.PI * a.getAttribute("r");

      case "rect":
        return 2 * a.getAttribute("width") + 2 * a.getAttribute("height");

      case "line":
        return F({
          x: a.getAttribute("x1"),
          y: a.getAttribute("y1")
        }, {
          x: a.getAttribute("x2"),
          y: a.getAttribute("y2")
        });

      case "polyline":
        return M(a);

      case "polygon":
        var c = a.points;
        return M(a) + F(c.getItem(c.numberOfItems - 1), c.getItem(0));
    }
  }
  function Y(a, c) {
    function d(b) {
      b = void 0 === b ? 0 : b;
      return a.el.getPointAtLength(1 <= c + b ? c + b : 0);
    }
    var b = d(), f = d(-1), n = d(1);
    switch (a.property) {
      case "x":
        return b.x;

      case "y":
        return b.y;

      case "angle":
        return 180 * Math.atan2(n.y - f.y, n.x - f.x) / Math.PI;
    }
  }
  function O(a, c) {
    var d = /-?\d*\.?\d+/g, b;
    b = h.pth(a) ? a.totalLength : a;
    if (h.col(b)) if (h.rgb(b)) {
      var f = /rgb\((\d+,\s*[\d]+,\s*[\d]+)\)/g.exec(b);
      b = f ? "rgba(" + f[1] + ",1)" : b;
    } else b = h.hex(b) ? T(b) : h.hsl(b) ? U(b) : void 0; else f = (f = y(b)) ? b.substr(0, b.length - f.length) : b,
      b = c && !/\s/g.test(b) ? f + c : f;
    b += "";
    return {
      original: b,
      numbers: b.match(d) ? b.match(d).map(Number) : [0],
      strings: h.str(a) || c ? b.split(d) : []
    };
  }
  function P(a) {
    a = a ? p(h.arr(a) ? a.map(m) : m(a)) : [];
    return r(a, function (a, d, b) {
      return b.indexOf(a) === d;
    });
  }
  function Z(a) {
    var c = P(a);
    return c.map(function (a, b) {
      return {
        target: a,
        id: b,
        total: c.length
      };
    });
  }
  function aa(a, c) {
    var d = C(c);
    if (h.arr(a)) {
      var b = a.length;
      2 !== b || h.obj(a[0]) ? h.fnc(c.duration) || (d.duration = c.duration / b) : a = {
        value: a
      };
    }
    return m(a).map(function (a, b) {
      b = b ? 0 : c.delay;
      a = h.obj(a) && !h.pth(a) ? a : {
        value: a
      };
      h.und(a.delay) && (a.delay = b);
      return a;
    }).map(function (a) {
      return z(a, d);
    });
  }
  function ba(a, c) {
    var d = {}, b;
    for (b in a) {
      var f = I(a[b], c);
      h.arr(f) && (f = f.map(function (a) {
        return I(a, c);
      }), 1 === f.length && (f = f[0]));
      d[b] = f;
    }
    d.duration = parseFloat(d.duration);
    d.delay = parseFloat(d.delay);
    return d;
  }
  function ca(a) {
    return h.arr(a) ? A.apply(this, a) : Q[a];
  }
  function da(a, c) {
    var d;
    return a.tweens.map(function (b) {
      b = ba(b, c);
      var f = b.value, e = K(c.target, a.name), k = d ? d.to.original : e, k = h.arr(f) ? f[0] : k, w = L(h.arr(f) ? f[1] : f, k), e = y(w) || y(k) || y(e);
      b.from = O(k, e);
      b.to = O(w, e);
      b.start = d ? d.end : a.offset;
      b.end = b.start + b.delay + b.duration;
      b.easing = ca(b.easing);
      b.elasticity = (1e3 - Math.min(Math.max(b.elasticity, 1), 999)) / 1e3;
      b.isPath = h.pth(f);
      b.isColor = h.col(b.from.original);
      b.isColor && (b.round = 1);
      return d = b;
    });
  }
  function ea(a, c) {
    return r(p(a.map(function (a) {
      return c.map(function (b) {
        var c = J(a.target, b.name);
        if (c) {
          var d = da(b, a);
          b = {
            type: c,
            property: b.name,
            animatable: a,
            tweens: d,
            duration: d[d.length - 1].end,
            delay: d[0].delay
          };
        } else b = void 0;
        return b;
      });
    })), function (a) {
      return !h.und(a);
    });
  }
  function R(a, c, d, b) {
    var f = "delay" === a;
    return c.length ? (f ? Math.min : Math.max).apply(Math, c.map(function (b) {
      return b[a];
    })) : f ? b.delay : d.offset + b.delay + b.duration;
  }
  function fa(a) {
    var c = D(ga, a), d = D(S, a), b = Z(a.targets), f = [], e = z(c, d), k;
    for (k in a) e.hasOwnProperty(k) || "targets" === k || f.push({
      name: k,
      offset: e.offset,
      tweens: aa(a[k], d)
    });
    a = ea(b, f);
    return z(c, {
      children: [],
      animatables: b,
      animations: a,
      duration: R("duration", a, c, d),
      delay: R("delay", a, c, d)
    });
  }
  function q(a) {
    function c() {
      return window.Promise && new Promise(function (a) {
        return p = a;
      });
    }
    function d(a) {
      return g.reversed ? g.duration - a : a;
    }
    function b(a) {
      for (var b = 0, c = {}, d = g.animations, f = d.length; b < f;) {
        var e = d[b], k = e.animatable, h = e.tweens, n = h.length - 1, l = h[n];
        n && (l = r(h, function (b) {
          return a < b.end;
        })[0] || l);
        for (var h = Math.min(Math.max(a - l.start - l.delay, 0), l.duration) / l.duration, w = isNaN(h) ? 1 : l.easing(h, l.elasticity), h = l.to.strings, p = l.round, n = [], m = void 0, m = l.to.numbers.length, t = 0; t < m; t++) {
          var x = void 0, x = l.to.numbers[t], q = l.from.numbers[t], x = l.isPath ? Y(l.value, w * x) : q + w * (x - q);
          p && (l.isColor && 2 < t || (x = Math.round(x * p) / p));
          n.push(x);
        }
        if (l = h.length) for (m = h[0], w = 0; w < l; w++) p = h[w + 1], t = n[w], isNaN(t) || (m = p ? m + (t + p) : m + (t + " ")); else m = n[0];
        ha[e.type](k.target, e.property, m, c, k.id);
        e.currentValue = m;
        b++;
      }
      if (b = Object.keys(c).length) for (d = 0; d < b; d++) H || (H = E(document.body, "transform") ? "transform" : "-webkit-transform"),
        g.animatables[d].target.style[H] = c[d].join(" ");
      g.currentTime = a;
      g.progress = a / g.duration * 100;
    }
    function f(a) {
      if (g[a]) g[a](g);
    }
    function e() {
      g.remaining && !0 !== g.remaining && g.remaining--;
    }
    function k(a) {
      var k = g.duration, n = g.offset, w = n + g.delay, r = g.currentTime, x = g.reversed, q = d(a);
      if (g.children.length) {
        var u = g.children, v = u.length;
        if (q >= g.currentTime) for (var G = 0; G < v; G++) u[G].seek(q); else for (; v--;) u[v].seek(q);
      }
      if (q >= w || !k) g.began || (g.began = !0, f("begin")), f("run");
      if (q > n && q < k) b(q); else if (q <= n && 0 !== r && (b(0), x && e()), q >= k && r !== k || !k) b(k),
        x || e();
      f("update");
      a >= k && (g.remaining ? (t = h, "alternate" === g.direction && (g.reversed = !g.reversed)) : (g.pause(),
        g.completed || (g.completed = !0, f("complete"), "Promise" in window && (p(), m = c()))),
        l = 0);
    }
    a = void 0 === a ? {} : a;
    var h, t, l = 0, p = null, m = c(), g = fa(a);
    g.reset = function () {
      var a = g.direction, c = g.loop;
      g.currentTime = 0;
      g.progress = 0;
      g.paused = !0;
      g.began = !1;
      g.completed = !1;
      g.reversed = "reverse" === a;
      g.remaining = "alternate" === a && 1 === c ? 2 : c;
      b(0);
      for (a = g.children.length; a--;) g.children[a].reset();
    };
    g.tick = function (a) {
      h = a;
      t || (t = h);
      k((l + h - t) * q.speed);
    };
    g.seek = function (a) {
      k(d(a));
    };
    g.pause = function () {
      var a = v.indexOf(g);
      -1 < a && v.splice(a, 1);
      g.paused = !0;
    };
    g.play = function () {
      g.paused && (g.paused = !1, t = 0, l = d(g.currentTime), v.push(g), B || ia());
    };
    g.reverse = function () {
      g.reversed = !g.reversed;
      t = 0;
      l = d(g.currentTime);
    };
    g.restart = function () {
      g.pause();
      g.reset();
      g.play();
    };
    g.finished = m;
    g.reset();
    g.autoplay && g.play();
    return g;
  }
  var ga = {
    update: void 0,
    begin: void 0,
    run: void 0,
    complete: void 0,
    loop: 1,
    direction: "normal",
    autoplay: !0,
    offset: 0
  }, S = {
    duration: 1e3,
    delay: 0,
    easing: "easeOutElastic",
    elasticity: 500,
    round: 0
  }, W = "translateX translateY translateZ rotate rotateX rotateY rotateZ scale scaleX scaleY scaleZ skewX skewY perspective".split(" "), H, h = {
    arr: function (a) {
      return Array.isArray(a);
    },
    obj: function (a) {
      return -1 < Object.prototype.toString.call(a).indexOf("Object");
    },
    pth: function (a) {
      return h.obj(a) && a.hasOwnProperty("totalLength");
    },
    svg: function (a) {
      return a instanceof SVGElement;
    },
    dom: function (a) {
      return a.nodeType || h.svg(a);
    },
    str: function (a) {
      return "string" === typeof a;
    },
    fnc: function (a) {
      return "function" === typeof a;
    },
    und: function (a) {
      return "undefined" === typeof a;
    },
    hex: function (a) {
      return /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(a);
    },
    rgb: function (a) {
      return /^rgb/.test(a);
    },
    hsl: function (a) {
      return /^hsl/.test(a);
    },
    col: function (a) {
      return h.hex(a) || h.rgb(a) || h.hsl(a);
    }
  }, A = function () {
    function a(a, d, b) {
      return (((1 - 3 * b + 3 * d) * a + (3 * b - 6 * d)) * a + 3 * d) * a;
    }
    return function (c, d, b, f) {
      if (0 <= c && 1 >= c && 0 <= b && 1 >= b) {
        var e = new Float32Array(11);
        if (c !== d || b !== f) for (var k = 0; 11 > k; ++k) e[k] = a(.1 * k, c, b);
        return function (k) {
          if (c === d && b === f) return k;
          if (0 === k) return 0;
          if (1 === k) return 1;
          for (var h = 0, l = 1; 10 !== l && e[l] <= k; ++l) h += .1;
          --l;
          var l = h + (k - e[l]) / (e[l + 1] - e[l]) * .1, n = 3 * (1 - 3 * b + 3 * c) * l * l + 2 * (3 * b - 6 * c) * l + 3 * c;
          if (.001 <= n) {
            for (h = 0; 4 > h; ++h) {
              n = 3 * (1 - 3 * b + 3 * c) * l * l + 2 * (3 * b - 6 * c) * l + 3 * c;
              if (0 === n) break;
              var m = a(l, c, b) - k, l = l - m / n;
            }
            k = l;
          } else if (0 === n) k = l; else {
            var l = h, h = h + .1, g = 0;
            do {
              m = l + (h - l) / 2, n = a(m, c, b) - k, 0 < n ? h = m : l = m;
            } while (1e-7 < Math.abs(n) && 10 > ++g);
            k = m;
          }
          return a(k, d, f);
        };
      }
    };
  }(), Q = function () {
    function a(a, b) {
      return 0 === a || 1 === a ? a : -Math.pow(2, 10 * (a - 1)) * Math.sin(2 * (a - 1 - b / (2 * Math.PI) * Math.asin(1)) * Math.PI / b);
    }
    var c = "Quad Cubic Quart Quint Sine Expo Circ Back Elastic".split(" "), d = {
      In: [[.55, .085, .68, .53], [.55, .055, .675, .19], [.895, .03, .685, .22], [.755, .05, .855, .06], [.47, 0, .745, .715], [.95, .05, .795, .035], [.6, .04, .98, .335], [.6, -.28, .735, .045], a],
      Out: [[.25, .46, .45, .94], [.215, .61, .355, 1], [.165, .84, .44, 1], [.23, 1, .32, 1], [.39, .575, .565, 1], [.19, 1, .22, 1], [.075, .82, .165, 1], [.175, .885, .32, 1.275], function (b, c) {
        return 1 - a(1 - b, c);
      }],
      InOut: [[.455, .03, .515, .955], [.645, .045, .355, 1], [.77, 0, .175, 1], [.86, 0, .07, 1], [.445, .05, .55, .95], [1, 0, 0, 1], [.785, .135, .15, .86], [.68, -.55, .265, 1.55], function (b, c) {
        return .5 > b ? a(2 * b, c) / 2 : 1 - a(-2 * b + 2, c) / 2;
      }]
    }, b = {
      linear: A(.25, .25, .75, .75)
    }, f = {}, e;
    for (e in d) f.type = e, d[f.type].forEach(function (a) {
      return function (d, f) {
        b["ease" + a.type + c[f]] = h.fnc(d) ? d : A.apply($jscomp$this, d);
      };
    }(f)), f = {
      type: f.type
    };
    return b;
  }(), ha = {
    css: function (a, c, d) {
      return a.style[c] = d;
    },
    attribute: function (a, c, d) {
      return a.setAttribute(c, d);
    },
    object: function (a, c, d) {
      return a[c] = d;
    },
    transform: function (a, c, d, b, f) {
      b[f] || (b[f] = []);
      b[f].push(c + "(" + d + ")");
    }
  }, v = [], B = 0, ia = function () {
    function a() {
      B = requestAnimationFrame(c);
    }
    function c(c) {
      var b = v.length;
      if (b) {
        for (var d = 0; d < b;) v[d] && v[d].tick(c), d++;
        a();
      } else cancelAnimationFrame(B), B = 0;
    }
    return a;
  }();
  q.version = "2.2.0";
  q.speed = 1;
  q.running = v;
  q.remove = function (a) {
    a = P(a);
    for (var c = v.length; c--;) for (var d = v[c], b = d.animations, f = b.length; f--;) u(a, b[f].animatable.target) && (b.splice(f, 1),
      b.length || d.pause());
  };
  q.getValue = K;
  q.path = function (a, c) {
    var d = h.str(a) ? e(a)[0] : a, b = c || 100;
    return function (a) {
      return {
        el: d,
        property: a,
        totalLength: N(d) * (b / 100)
      };
    };
  };
  q.setDashoffset = function (a) {
    var c = N(a);
    a.setAttribute("stroke-dasharray", c);
    return c;
  };
  q.bezier = A;
  q.easings = Q;
  q.timeline = function (a) {
    var c = q(a);
    c.pause();
    c.duration = 0;
    c.add = function (d) {
      c.children.forEach(function (a) {
        a.began = !0;
        a.completed = !0;
      });
      m(d).forEach(function (b) {
        var d = z(b, D(S, a || {}));
        d.targets = d.targets || a.targets;
        b = c.duration;
        var e = d.offset;
        d.autoplay = !1;
        d.direction = c.direction;
        d.offset = h.und(e) ? b : L(e, b);
        c.began = !0;
        c.completed = !0;
        c.seek(d.offset);
        d = q(d);
        d.began = !0;
        d.completed = !0;
        d.duration > b && (c.duration = d.duration);
        c.children.push(d);
      });
      c.seek(0);
      c.reset();
      c.autoplay && c.restart();
      return c;
    };
    return c;
  };
  q.random = function (a, c) {
    return Math.floor(Math.random() * (c - a + 1)) + a;
  };
  return q;
});
(function ($, anim) {
  'use strict';

  let _defaults = {
    alignment: 'left',
    autoFocus: true,
    constrainWidth: true,
    container: null,
    coverTrigger: true,
    closeOnClick: true,
    hover: false,
    inDuration: 150,
    outDuration: 250,
    onOpenStart: null,
    onOpenEnd: null,
    onCloseStart: null,
    onCloseEnd: null,
    onItemClick: null
  };

  /**
   * @class
   */
  class Dropdown extends Component {
    constructor(el, options) {
      super(Dropdown, el, options);

      this.el.M_Dropdown = this;
      Dropdown._dropdowns.push(this);

      this.id = M.getIdFromTrigger(el);
      this.dropdownEl = document.getElementById(this.id);
      this.$dropdownEl = $(this.dropdownEl);

      /**
       * Options for the dropdown
       * @member Dropdown#options
       * @prop {String} [alignment='left'] - Edge which the dropdown is aligned to
       * @prop {Boolean} [autoFocus=true] - Automatically focus dropdown el for keyboard
       * @prop {Boolean} [constrainWidth=true] - Constrain width to width of the button
       * @prop {Element} container - Container element to attach dropdown to (optional)
       * @prop {Boolean} [coverTrigger=true] - Place dropdown over trigger
       * @prop {Boolean} [closeOnClick=true] - Close on click of dropdown item
       * @prop {Boolean} [hover=false] - Open dropdown on hover
       * @prop {Number} [inDuration=150] - Duration of open animation in ms
       * @prop {Number} [outDuration=250] - Duration of close animation in ms
       * @prop {Function} onOpenStart - Function called when dropdown starts opening
       * @prop {Function} onOpenEnd - Function called when dropdown finishes opening
       * @prop {Function} onCloseStart - Function called when dropdown starts closing
       * @prop {Function} onCloseEnd - Function called when dropdown finishes closing
       */
      this.options = $.extend({}, Dropdown.defaults, options);

      /**
       * Describes open/close state of dropdown
       * @type {Boolean}
       */
      this.isOpen = false;

      /**
       * Describes if dropdown content is scrollable
       * @type {Boolean}
       */
      this.isScrollable = false;

      /**
       * Describes if touch moving on dropdown content
       * @type {Boolean}
       */
      this.isTouchMoving = false;

      this.focusedIndex = -1;
      this.filterQuery = [];

      // Move dropdown-content after dropdown-trigger
      if (!!this.options.container) {
        $(this.options.container).append(this.dropdownEl);
      } else {
        this.$el.after(this.dropdownEl);
      }

      this._makeDropdownFocusable();
      this._resetFilterQueryBound = this._resetFilterQuery.bind(this);
      this._handleDocumentClickBound = this._handleDocumentClick.bind(this);
      this._handleDocumentTouchmoveBound = this._handleDocumentTouchmove.bind(this);
      this._handleDropdownClickBound = this._handleDropdownClick.bind(this);
      this._handleDropdownKeydownBound = this._handleDropdownKeydown.bind(this);
      this._handleTriggerKeydownBound = this._handleTriggerKeydown.bind(this);
      this._setupEventHandlers();
    }

    static get defaults() {
      return _defaults;
    }

    static init(els, options) {
      return super.init(this, els, options);
    }

    /**
     * Get Instance
     */
    static getInstance(el) {
      let domElem = !!el.jquery ? el[0] : el;
      return domElem.M_Dropdown;
    }

    /**
     * Teardown component
     */
    destroy() {
      this._resetDropdownStyles();
      this._removeEventHandlers();
      Dropdown._dropdowns.splice(Dropdown._dropdowns.indexOf(this), 1);
      this.el.M_Dropdown = undefined;
    }

    /**
     * Setup Event Handlers
     */
    _setupEventHandlers() {
      // Trigger keydown handler
      this.el.addEventListener('keydown', this._handleTriggerKeydownBound);

      // Item click handler
      this.dropdownEl.addEventListener('click', this._handleDropdownClickBound);

      // Hover event handlers
      if (this.options.hover) {
        this._handleMouseEnterBound = this._handleMouseEnter.bind(this);
        this.el.addEventListener('mouseenter', this._handleMouseEnterBound);
        this._handleMouseLeaveBound = this._handleMouseLeave.bind(this);
        this.el.addEventListener('mouseleave', this._handleMouseLeaveBound);
        this.dropdownEl.addEventListener('mouseleave', this._handleMouseLeaveBound);

        // Click event handlers
      } else {
        this._handleClickBound = this._handleClick.bind(this);
        this.el.addEventListener('click', this._handleClickBound);
      }
    }

    /**
     * Remove Event Handlers
     */
    _removeEventHandlers() {
      this.el.removeEventListener('keydown', this._handleTriggerKeydownBound);
      this.dropdownEl.removeEventListener('click', this._handleDropdownClickBound);

      if (this.options.hover) {
        this.el.removeEventListener('mouseenter', this._handleMouseEnterBound);
        this.el.removeEventListener('mouseleave', this._handleMouseLeaveBound);
        this.dropdownEl.removeEventListener('mouseleave', this._handleMouseLeaveBound);
      } else {
        this.el.removeEventListener('click', this._handleClickBound);
      }
    }

    _setupTemporaryEventHandlers() {
      // Use capture phase event handler to prevent click
      document.body.addEventListener('click', this._handleDocumentClickBound, true);
      document.body.addEventListener('touchend', this._handleDocumentClickBound);
      document.body.addEventListener('touchmove', this._handleDocumentTouchmoveBound);
      this.dropdownEl.addEventListener('keydown', this._handleDropdownKeydownBound);
    }

    _removeTemporaryEventHandlers() {
      // Use capture phase event handler to prevent click
      document.body.removeEventListener('click', this._handleDocumentClickBound, true);
      document.body.removeEventListener('touchend', this._handleDocumentClickBound);
      document.body.removeEventListener('touchmove', this._handleDocumentTouchmoveBound);
      this.dropdownEl.removeEventListener('keydown', this._handleDropdownKeydownBound);
    }

    _handleClick(e) {
      e.preventDefault();
      this.open();
    }

    _handleMouseEnter() {
      this.open();
    }

    _handleMouseLeave(e) {
      let toEl = e.toElement || e.relatedTarget;
      let leaveToDropdownContent = !!$(toEl).closest('.dropdown-content').length;
      let leaveToActiveDropdownTrigger = false;

      let $closestTrigger = $(toEl).closest('.dropdown-trigger');
      if (
        $closestTrigger.length &&
        !!$closestTrigger[0].M_Dropdown &&
        $closestTrigger[0].M_Dropdown.isOpen
      ) {
        leaveToActiveDropdownTrigger = true;
      }

      // Close hover dropdown if mouse did not leave to either active dropdown-trigger or dropdown-content
      if (!leaveToActiveDropdownTrigger && !leaveToDropdownContent) {
        this.close();
      }
    }

    _handleDocumentClick(e) {
      let $target = $(e.target);
      if (
        this.options.closeOnClick &&
        $target.closest('.dropdown-content').length &&
        !this.isTouchMoving
      ) {
        // isTouchMoving to check if scrolling on mobile.
        setTimeout(() => {
          this.close();
        }, 0);
      } else if (
        $target.closest('.dropdown-trigger').length ||
        !$target.closest('.dropdown-content').length
      ) {
        setTimeout(() => {
          this.close();
        }, 0);
      }
      this.isTouchMoving = false;
    }

    _handleTriggerKeydown(e) {
      // ARROW DOWN OR ENTER WHEN SELECT IS CLOSED - open Dropdown
      if ((e.which === M.keys.ARROW_DOWN || e.which === M.keys.ENTER) && !this.isOpen) {
        e.preventDefault();
        this.open();
      }
    }

    /**
     * Handle Document Touchmove
     * @param {Event} e
     */
    _handleDocumentTouchmove(e) {
      let $target = $(e.target);
      if ($target.closest('.dropdown-content').length) {
        this.isTouchMoving = true;
      }
    }

    /**
     * Handle Dropdown Click
     * @param {Event} e
     */
    _handleDropdownClick(e) {
      // onItemClick callback
      if (typeof this.options.onItemClick === 'function') {
        let itemEl = $(e.target).closest('li')[0];
        this.options.onItemClick.call(this, itemEl);
      }
    }

    /**
     * Handle Dropdown Keydown
     * @param {Event} e
     */
    _handleDropdownKeydown(e) {
      if (e.which === M.keys.TAB) {
        e.preventDefault();
        this.close();

        // Navigate down dropdown list
      } else if ((e.which === M.keys.ARROW_DOWN || e.which === M.keys.ARROW_UP) && this.isOpen) {
        e.preventDefault();
        let direction = e.which === M.keys.ARROW_DOWN ? 1 : -1;
        let newFocusedIndex = this.focusedIndex;
        let foundNewIndex = false;
        do {
          newFocusedIndex = newFocusedIndex + direction;

          if (
            !!this.dropdownEl.children[newFocusedIndex] &&
            this.dropdownEl.children[newFocusedIndex].tabIndex !== -1
          ) {
            foundNewIndex = true;
            break;
          }
        } while (newFocusedIndex < this.dropdownEl.children.length && newFocusedIndex >= 0);

        if (foundNewIndex) {
          this.focusedIndex = newFocusedIndex;
          this._focusFocusedItem();
        }

        // ENTER selects choice on focused item
      } else if (e.which === M.keys.ENTER && this.isOpen) {
        // Search for <a> and <button>
        let focusedElement = this.dropdownEl.children[this.focusedIndex];
        let $activatableElement = $(focusedElement)
          .find('a, button')
          .first();

        // Click a or button tag if exists, otherwise click li tag
        if (!!$activatableElement.length) {
          $activatableElement[0].click();
        } else if (!!focusedElement) {
          focusedElement.click();
        }

        // Close dropdown on ESC
      } else if (e.which === M.keys.ESC && this.isOpen) {
        e.preventDefault();
        this.close();
      }

      // CASE WHEN USER TYPE LETTERS
      let letter = String.fromCharCode(e.which).toLowerCase(),
        nonLetters = [9, 13, 27, 38, 40];
      if (letter && nonLetters.indexOf(e.which) === -1) {
        this.filterQuery.push(letter);

        let string = this.filterQuery.join(''),
          newOptionEl = $(this.dropdownEl)
            .find('li')
            .filter((el) => {
              return (
                $(el)
                  .text()
                  .toLowerCase()
                  .indexOf(string) === 0
              );
            })[0];

        if (newOptionEl) {
          this.focusedIndex = $(newOptionEl).index();
          this._focusFocusedItem();
        }
      }

      this.filterTimeout = setTimeout(this._resetFilterQueryBound, 1000);
    }

    /**
     * Setup dropdown
     */
    _resetFilterQuery() {
      this.filterQuery = [];
    }

    _resetDropdownStyles() {
      this.$dropdownEl.css({
        display: '',
        width: '',
        height: '',
        left: '',
        top: '',
        'transform-origin': '',
        transform: '',
        opacity: ''
      });
    }

    _makeDropdownFocusable() {
      // Needed for arrow key navigation
      this.dropdownEl.tabIndex = 0;

      // Only set tabindex if it hasn't been set by user
      $(this.dropdownEl)
        .children()
        .each(function (el) {
          if (!el.getAttribute('tabindex')) {
            el.setAttribute('tabindex', 0);
          }
        });
    }

    _focusFocusedItem() {
      if (
        this.focusedIndex >= 0 &&
        this.focusedIndex < this.dropdownEl.children.length &&
        this.options.autoFocus
      ) {
        this.dropdownEl.children[this.focusedIndex].focus();
      }
    }

    _getDropdownPosition() {
      let offsetParentBRect = this.el.offsetParent.getBoundingClientRect();
      let triggerBRect = this.el.getBoundingClientRect();
      let dropdownBRect = this.dropdownEl.getBoundingClientRect();

      let idealHeight = dropdownBRect.height;
      let idealWidth = dropdownBRect.width;
      let idealXPos = triggerBRect.left - dropdownBRect.left;
      let idealYPos = triggerBRect.top - dropdownBRect.top;

      let dropdownBounds = {
        left: idealXPos,
        top: idealYPos,
        height: idealHeight,
        width: idealWidth
      };

      // Countainer here will be closest ancestor with overflow: hidden
      let closestOverflowParent = !!this.dropdownEl.offsetParent
        ? this.dropdownEl.offsetParent
        : this.dropdownEl.parentNode;

      let alignments = M.checkPossibleAlignments(
        this.el,
        closestOverflowParent,
        dropdownBounds,
        this.options.coverTrigger ? 0 : triggerBRect.height
      );

      let verticalAlignment = 'top';
      let horizontalAlignment = this.options.alignment;
      idealYPos += this.options.coverTrigger ? 0 : triggerBRect.height;

      // Reset isScrollable
      this.isScrollable = false;

      if (!alignments.top) {
        if (alignments.bottom) {
          verticalAlignment = 'bottom';
        } else {
          this.isScrollable = true;

          // Determine which side has most space and cutoff at correct height
          if (alignments.spaceOnTop > alignments.spaceOnBottom) {
            verticalAlignment = 'bottom';
            idealHeight += alignments.spaceOnTop;
            idealYPos -= alignments.spaceOnTop;
          } else {
            idealHeight += alignments.spaceOnBottom;
          }
        }
      }

      // If preferred horizontal alignment is possible
      if (!alignments[horizontalAlignment]) {
        let oppositeAlignment = horizontalAlignment === 'left' ? 'right' : 'left';
        if (alignments[oppositeAlignment]) {
          horizontalAlignment = oppositeAlignment;
        } else {
          // Determine which side has most space and cutoff at correct height
          if (alignments.spaceOnLeft > alignments.spaceOnRight) {
            horizontalAlignment = 'right';
            idealWidth += alignments.spaceOnLeft;
            idealXPos -= alignments.spaceOnLeft;
          } else {
            horizontalAlignment = 'left';
            idealWidth += alignments.spaceOnRight;
          }
        }
      }

      if (verticalAlignment === 'bottom') {
        idealYPos =
          idealYPos - dropdownBRect.height + (this.options.coverTrigger ? triggerBRect.height : 0);
      }
      if (horizontalAlignment === 'right') {
        idealXPos = idealXPos - dropdownBRect.width + triggerBRect.width;
      }
      return {
        x: idealXPos,
        y: idealYPos,
        verticalAlignment: verticalAlignment,
        horizontalAlignment: horizontalAlignment,
        height: idealHeight,
        width: idealWidth
      };
    }

    /**
     * Animate in dropdown
     */
    _animateIn() {
      anim.remove(this.dropdownEl);
      anim({
        targets: this.dropdownEl,
        opacity: {
          value: [0, 1],
          easing: 'easeOutQuad'
        },
        scaleX: [0.3, 1],
        scaleY: [0.3, 1],
        duration: this.options.inDuration,
        easing: 'easeOutQuint',
        complete: (anim) => {
          if (this.options.autoFocus) {
            this.dropdownEl.focus();
          }

          // onOpenEnd callback
          if (typeof this.options.onOpenEnd === 'function') {
            this.options.onOpenEnd.call(this, this.el);
          }
        }
      });
    }

    /**
     * Animate out dropdown
     */
    _animateOut() {
      anim.remove(this.dropdownEl);
      anim({
        targets: this.dropdownEl,
        opacity: {
          value: 0,
          easing: 'easeOutQuint'
        },
        scaleX: 0.3,
        scaleY: 0.3,
        duration: this.options.outDuration,
        easing: 'easeOutQuint',
        complete: (anim) => {
          this._resetDropdownStyles();

          // onCloseEnd callback
          if (typeof this.options.onCloseEnd === 'function') {
            this.options.onCloseEnd.call(this, this.el);
          }
        }
      });
    }

    /**
     * Place dropdown
     */
    _placeDropdown() {
      // Set width before calculating positionInfo
      let idealWidth = this.options.constrainWidth
        ? this.el.getBoundingClientRect().width
        : this.dropdownEl.getBoundingClientRect().width;
      this.dropdownEl.style.width = idealWidth + 'px';

      let positionInfo = this._getDropdownPosition();
      this.dropdownEl.style.left = positionInfo.x + 'px';
      this.dropdownEl.style.top = positionInfo.y + 'px';
      this.dropdownEl.style.height = positionInfo.height + 'px';
      this.dropdownEl.style.width = positionInfo.width + 'px';
      this.dropdownEl.style.transformOrigin = `${positionInfo.horizontalAlignment === 'left' ? '0' : '100%'
        } ${positionInfo.verticalAlignment === 'top' ? '0' : '100%'}`;
    }

    /**
     * Open Dropdown
     */
    open() {
      if (this.isOpen) {
        return;
      }
      this.isOpen = true;

      // onOpenStart callback
      if (typeof this.options.onOpenStart === 'function') {
        this.options.onOpenStart.call(this, this.el);
      }

      // Reset styles
      this._resetDropdownStyles();
      this.dropdownEl.style.display = 'block';

      this._placeDropdown();
      this._animateIn();
      this._setupTemporaryEventHandlers();
    }

    /**
     * Close Dropdown
     */
    close() {
      if (!this.isOpen) {
        return;
      }
      this.isOpen = false;
      this.focusedIndex = -1;

      // onCloseStart callback
      if (typeof this.options.onCloseStart === 'function') {
        this.options.onCloseStart.call(this, this.el);
      }

      this._animateOut();
      this._removeTemporaryEventHandlers();

      if (this.options.autoFocus) {
        this.el.focus();
      }
    }

    /**
     * Recalculate dimensions
     */
    recalculateDimensions() {
      if (this.isOpen) {
        this.$dropdownEl.css({
          width: '',
          height: '',
          left: '',
          top: '',
          'transform-origin': ''
        });
        this._placeDropdown();
      }
    }
  }

  /**
   * @static
   * @memberof Dropdown
   */
  Dropdown._dropdowns = [];

  M.Dropdown = Dropdown;

  if (M.jQueryLoaded) {
    M.initializeJqueryWrapper(Dropdown, 'dropdown', 'M_Dropdown');
  }
})(cash, M.anime);

(function ($, anim) {
  'use strict';

  let _defaults = {
    opacity: 0.5,
    inDuration: 250,
    outDuration: 250,
    onOpenStart: null,
    onOpenEnd: null,
    onCloseStart: null,
    onCloseEnd: null,
    preventScrolling: true,
    dismissible: true,
    startingTop: '4%',
    endingTop: '10%'
  };

  /**
   * @class
   *
   */
  class Modal extends Component {
    /**
     * Construct Modal instance and set up overlay
     * @constructor
     * @param {Element} el
     * @param {Object} options
     */
    constructor(el, options) {
      super(Modal, el, options);

      this.el.M_Modal = this;

      /**
       * Options for the modal
       * @member Modal#options
       * @prop {Number} [opacity=0.5] - Opacity of the modal overlay
       * @prop {Number} [inDuration=250] - Length in ms of enter transition
       * @prop {Number} [outDuration=250] - Length in ms of exit transition
       * @prop {Function} onOpenStart - Callback function called before modal is opened
       * @prop {Function} onOpenEnd - Callback function called after modal is opened
       * @prop {Function} onCloseStart - Callback function called before modal is closed
       * @prop {Function} onCloseEnd - Callback function called after modal is closed
       * @prop {Boolean} [dismissible=true] - Allow modal to be dismissed by keyboard or overlay click
       * @prop {String} [startingTop='4%'] - startingTop
       * @prop {String} [endingTop='10%'] - endingTop
       */
      this.options = $.extend({}, Modal.defaults, options);

      /**
       * Describes open/close state of modal
       * @type {Boolean}
       */
      this.isOpen = false;

      this.id = this.$el.attr('id');
      this._openingTrigger = undefined;
      this.$overlay = $('<div class="modal-overlay"></div>');
      this.el.tabIndex = 0;
      this._nthModalOpened = 0;

      Modal._count++;
      this._setupEventHandlers();
    }

    static get defaults() {
      return _defaults;
    }

    static init(els, options) {
      return super.init(this, els, options);
    }

    /**
     * Get Instance
     */
    static getInstance(el) {
      let domElem = !!el.jquery ? el[0] : el;
      return domElem.M_Modal;
    }

    /**
     * Teardown component
     */
    destroy() {
      Modal._count--;
      this._removeEventHandlers();
      this.el.removeAttribute('style');
      this.$overlay.remove();
      this.el.M_Modal = undefined;
    }

    /**
     * Setup Event Handlers
     */
    _setupEventHandlers() {
      this._handleOverlayClickBound = this._handleOverlayClick.bind(this);
      this._handleModalCloseClickBound = this._handleModalCloseClick.bind(this);

      if (Modal._count === 1) {
        document.body.addEventListener('click', this._handleTriggerClick);
      }
      this.$overlay[0].addEventListener('click', this._handleOverlayClickBound);
      this.el.addEventListener('click', this._handleModalCloseClickBound);
    }

    /**
     * Remove Event Handlers
     */
    _removeEventHandlers() {
      if (Modal._count === 0) {
        document.body.removeEventListener('click', this._handleTriggerClick);
      }
      this.$overlay[0].removeEventListener('click', this._handleOverlayClickBound);
      this.el.removeEventListener('click', this._handleModalCloseClickBound);
    }

    /**
     * Handle Trigger Click
     * @param {Event} e
     */
    _handleTriggerClick(e) {
      let $trigger = $(e.target).closest('.modal-trigger');
      if ($trigger.length) {
        let modalId = M.getIdFromTrigger($trigger[0]);
        let modalInstance = document.getElementById(modalId).M_Modal;
        if (modalInstance) {
          modalInstance.open($trigger);
        }
        e.preventDefault();
      }
    }

    /**
     * Handle Overlay Click
     */
    _handleOverlayClick() {
      if (this.options.dismissible) {
        this.close();
      }
    }

    /**
     * Handle Modal Close Click
     * @param {Event} e
     */
    _handleModalCloseClick(e) {
      let $closeTrigger = $(e.target).closest('.modal-close');
      if ($closeTrigger.length) {
        this.close();
      }
    }

    /**
     * Handle Keydown
     * @param {Event} e
     */
    _handleKeydown(e) {
      // ESC key
      if (e.keyCode === 27 && this.options.dismissible) {
        this.close();
      }
    }

    /**
     * Handle Focus
     * @param {Event} e
     */
    _handleFocus(e) {
      // Only trap focus if this modal is the last model opened (prevents loops in nested modals).
      if (!this.el.contains(e.target) && this._nthModalOpened === Modal._modalsOpen) {
        this.el.focus();
      }
    }

    /**
     * Animate in modal
     */
    _animateIn() {
      // Set initial styles
      $.extend(this.el.style, {
        display: 'block',
        opacity: 0
      });
      $.extend(this.$overlay[0].style, {
        display: 'block',
        opacity: 0
      });

      // Animate overlay
      anim({
        targets: this.$overlay[0],
        opacity: this.options.opacity,
        duration: this.options.inDuration,
        easing: 'easeOutQuad'
      });

      // Define modal animation options
      let enterAnimOptions = {
        targets: this.el,
        duration: this.options.inDuration,
        easing: 'easeOutCubic',
        // Handle modal onOpenEnd callback
        complete: () => {
          if (typeof this.options.onOpenEnd === 'function') {
            this.options.onOpenEnd.call(this, this.el, this._openingTrigger);
          }
        }
      };

      // Bottom sheet animation
      if (this.el.classList.contains('bottom-sheet')) {
        $.extend(enterAnimOptions, {
          bottom: 0,
          opacity: 1
        });
        anim(enterAnimOptions);

        // Normal modal animation
      } else {
        $.extend(enterAnimOptions, {
          top: [this.options.startingTop, this.options.endingTop],
          opacity: 1,
          scaleX: [0.8, 1],
          scaleY: [0.8, 1]
        });
        anim(enterAnimOptions);
      }
    }

    /**
     * Animate out modal
     */
    _animateOut() {
      // Animate overlay
      anim({
        targets: this.$overlay[0],
        opacity: 0,
        duration: this.options.outDuration,
        easing: 'easeOutQuart'
      });

      // Define modal animation options
      let exitAnimOptions = {
        targets: this.el,
        duration: this.options.outDuration,
        easing: 'easeOutCubic',
        // Handle modal ready callback
        complete: () => {
          this.el.style.display = 'none';
          this.$overlay.remove();

          // Call onCloseEnd callback
          if (typeof this.options.onCloseEnd === 'function') {
            this.options.onCloseEnd.call(this, this.el);
          }
        }
      };

      // Bottom sheet animation
      if (this.el.classList.contains('bottom-sheet')) {
        $.extend(exitAnimOptions, {
          bottom: '-100%',
          opacity: 0
        });
        anim(exitAnimOptions);

        // Normal modal animation
      } else {
        $.extend(exitAnimOptions, {
          top: [this.options.endingTop, this.options.startingTop],
          opacity: 0,
          scaleX: 0.8,
          scaleY: 0.8
        });
        anim(exitAnimOptions);
      }
    }

    /**
     * Open Modal
     * @param {cash} [$trigger]
     */
    open($trigger) {
      if (this.isOpen) {
        return;
      }

      this.isOpen = true;
      Modal._modalsOpen++;
      this._nthModalOpened = Modal._modalsOpen;

      // Set Z-Index based on number of currently open modals
      this.$overlay[0].style.zIndex = 1000 + Modal._modalsOpen * 2;
      this.el.style.zIndex = 1000 + Modal._modalsOpen * 2 + 1;

      // Set opening trigger, undefined indicates modal was opened by javascript
      this._openingTrigger = !!$trigger ? $trigger[0] : undefined;

      // onOpenStart callback
      if (typeof this.options.onOpenStart === 'function') {
        this.options.onOpenStart.call(this, this.el, this._openingTrigger);
      }

      if (this.options.preventScrolling) {
        document.body.style.overflow = 'hidden';
      }

      this.el.classList.add('open');
      this.el.insertAdjacentElement('afterend', this.$overlay[0]);

      if (this.options.dismissible) {
        this._handleKeydownBound = this._handleKeydown.bind(this);
        this._handleFocusBound = this._handleFocus.bind(this);
        document.addEventListener('keydown', this._handleKeydownBound);
        document.addEventListener('focus', this._handleFocusBound, true);
      }

      anim.remove(this.el);
      anim.remove(this.$overlay[0]);
      this._animateIn();

      // Focus modal
      this.el.focus();

      return this;
    }

    /**
     * Close Modal
     */
    close() {
      if (!this.isOpen) {
        return;
      }

      this.isOpen = false;
      Modal._modalsOpen--;
      this._nthModalOpened = 0;

      // Call onCloseStart callback
      if (typeof this.options.onCloseStart === 'function') {
        this.options.onCloseStart.call(this, this.el);
      }

      this.el.classList.remove('open');

      // Enable body scrolling only if there are no more modals open.
      if (Modal._modalsOpen === 0) {
        document.body.style.overflow = '';
      }

      if (this.options.dismissible) {
        document.removeEventListener('keydown', this._handleKeydownBound);
        document.removeEventListener('focus', this._handleFocusBound, true);
      }

      anim.remove(this.el);
      anim.remove(this.$overlay[0]);
      this._animateOut();
      return this;
    }
  }

  /**
   * @static
   * @memberof Modal
   */
  Modal._modalsOpen = 0;

  /**
   * @static
   * @memberof Modal
   */
  Modal._count = 0;

  M.Modal = Modal;

  if (M.jQueryLoaded) {
    M.initializeJqueryWrapper(Modal, 'modal', 'M_Modal');
  }
})(cash, M.anime);

(function ($) {
  // Function to update labels of text fields
  M.updateTextFields = function () {
    let input_selector =
      'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea';
    $(input_selector).each(function (element, index) {
      let $this = $(this);
      if (
        element.value.length > 0 ||
        $(element).is(':focus') ||
        element.autofocus ||
        $this.attr('placeholder') !== null
      ) {
        $this.siblings('label').addClass('active');
      } else if (element.validity) {
        $this.siblings('label').toggleClass('active', element.validity.badInput === true);
      } else {
        $this.siblings('label').removeClass('active');
      }
    });
  };

  M.validate_field = function (object) {
    let hasLength = object.attr('data-length') !== null;
    let lenAttr = parseInt(object.attr('data-length'));
    let len = object[0].value.length;

    if (len === 0 && object[0].validity.badInput === false && !object.is(':required')) {
      if (object.hasClass('validate')) {
        object.removeClass('valid');
        object.removeClass('invalid');
      }
    } else {
      if (object.hasClass('validate')) {
        // Check for character counter attributes
        if (
          (object.is(':valid') && hasLength && len <= lenAttr) ||
          (object.is(':valid') && !hasLength)
        ) {
          object.removeClass('invalid');
          object.addClass('valid');
        } else {
          object.removeClass('valid');
          object.addClass('invalid');
        }
      }
    }
  };

  M.textareaAutoResize = function ($textarea) {
    // Wrap if native element
    if ($textarea instanceof Element) {
      $textarea = $($textarea);
    }

    if (!$textarea.length) {
      console.error('No textarea element found');
      return;
    }

    // Textarea Auto Resize
    let hiddenDiv = $('.hiddendiv').first();
    if (!hiddenDiv.length) {
      hiddenDiv = $('<div class="hiddendiv common"></div>');
      $('body').append(hiddenDiv);
    }

    // Set font properties of hiddenDiv
    let fontFamily = $textarea.css('font-family');
    let fontSize = $textarea.css('font-size');
    let lineHeight = $textarea.css('line-height');

    // Firefox can't handle padding shorthand.
    let paddingTop = $textarea.css('padding-top');
    let paddingRight = $textarea.css('padding-right');
    let paddingBottom = $textarea.css('padding-bottom');
    let paddingLeft = $textarea.css('padding-left');

    if (fontSize) {
      hiddenDiv.css('font-size', fontSize);
    }
    if (fontFamily) {
      hiddenDiv.css('font-family', fontFamily);
    }
    if (lineHeight) {
      hiddenDiv.css('line-height', lineHeight);
    }
    if (paddingTop) {
      hiddenDiv.css('padding-top', paddingTop);
    }
    if (paddingRight) {
      hiddenDiv.css('padding-right', paddingRight);
    }
    if (paddingBottom) {
      hiddenDiv.css('padding-bottom', paddingBottom);
    }
    if (paddingLeft) {
      hiddenDiv.css('padding-left', paddingLeft);
    }

    // Set original-height, if none
    if (!$textarea.data('original-height')) {
      $textarea.data('original-height', $textarea.height());
    }

    if ($textarea.attr('wrap') === 'off') {
      hiddenDiv.css('overflow-wrap', 'normal').css('white-space', 'pre');
    }

    hiddenDiv.text($textarea[0].value + '\n');
    let content = hiddenDiv.html().replace(/\n/g, '<br>');
    hiddenDiv.html(content);

    // When textarea is hidden, width goes crazy.
    // Approximate with half of window size

    if ($textarea[0].offsetWidth > 0 && $textarea[0].offsetHeight > 0) {
      hiddenDiv.css('width', $textarea.width() + 'px');
    } else {
      hiddenDiv.css('width', window.innerWidth / 2 + 'px');
    }

    /**
     * Resize if the new height is greater than the
     * original height of the textarea
     */
    if ($textarea.data('original-height') <= hiddenDiv.innerHeight()) {
      $textarea.css('height', hiddenDiv.innerHeight() + 'px');
    } else if ($textarea[0].value.length < $textarea.data('previous-length')) {
      /**
       * In case the new height is less than original height, it
       * means the textarea has less text than before
       * So we set the height to the original one
       */
      $textarea.css('height', $textarea.data('original-height') + 'px');
    }
    $textarea.data('previous-length', $textarea[0].value.length);
  };

  $(document).ready(function () {
    // Text based inputs
    let input_selector =
      'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea';

    // Add active if form auto complete
    $(document).on('change', input_selector, function () {
      if (this.value.length !== 0 || $(this).attr('placeholder') !== null) {
        $(this)
          .siblings('label')
          .addClass('active');
      }
      M.validate_field($(this));
    });

    // Add active if input element has been pre-populated on document ready
    $(document).ready(function () {
      M.updateTextFields();
    });

    // HTML DOM FORM RESET handling
    $(document).on('reset', function (e) {
      let formReset = $(e.target);
      if (formReset.is('form')) {
        formReset
          .find(input_selector)
          .removeClass('valid')
          .removeClass('invalid');
        formReset.find(input_selector).each(function (e) {
          if (this.value.length) {
            $(this)
              .siblings('label')
              .removeClass('active');
          }
        });

        // Reset select (after native reset)
        setTimeout(function () {
          formReset.find('select').each(function () {
            // check if initialized
            if (this.M_FormSelect) {
              $(this).trigger('change');
            }
          });
        }, 0);
      }
    });

    /**
     * Add active when element has focus
     * @param {Event} e
     */
    document.addEventListener(
      'focus',
      function (e) {
        if ($(e.target).is(input_selector)) {
          $(e.target)
            .siblings('label, .prefix')
            .addClass('active');
        }
      },
      true
    );

    /**
     * Remove active when element is blurred
     * @param {Event} e
     */
    document.addEventListener(
      'blur',
      function (e) {
        let $inputElement = $(e.target);
        if ($inputElement.is(input_selector)) {
          let selector = '.prefix';

          if (
            $inputElement[0].value.length === 0 &&
            $inputElement[0].validity.badInput !== true &&
            $inputElement.attr('placeholder') === null
          ) {
            selector += ', label';
          }
          $inputElement.siblings(selector).removeClass('active');
          M.validate_field($inputElement);
        }
      },
      true
    );

    // Radio and Checkbox focus class
    let radio_checkbox = 'input[type=radio], input[type=checkbox]';
    $(document).on('keyup', radio_checkbox, function (e) {
      // TAB, check if tabbing to radio or checkbox.
      if (e.which === M.keys.TAB) {
        $(this).addClass('tabbed');
        let $this = $(this);
        $this.one('blur', function (e) {
          $(this).removeClass('tabbed');
        });
        return;
      }
    });

    let text_area_selector = '.materialize-textarea';
    $(text_area_selector).each(function () {
      let $textarea = $(this);
      /**
       * Resize textarea on document load after storing
       * the original height and the original length
       */
      $textarea.data('original-height', $textarea.height());
      $textarea.data('previous-length', this.value.length);
      M.textareaAutoResize($textarea);
    });

    $(document).on('keyup', text_area_selector, function () {
      M.textareaAutoResize($(this));
    });
    $(document).on('keydown', text_area_selector, function () {
      M.textareaAutoResize($(this));
    });

    // File Input Path
    $(document).on('change', '.file-field input[type="file"]', function () {
      let file_field = $(this).closest('.file-field');
      let path_input = file_field.find('input.file-path');
      let files = $(this)[0].files;
      let file_names = [];
      for (let i = 0; i < files.length; i++) {
        file_names.push(files[i].name);
      }
      path_input[0].value = file_names.join(', ');
      path_input.trigger('change');
    });
  }); // End of $(document).ready
})(cash);

(function ($) {
  'use strict';

  let _defaults = {
    classes: '',
    dropdownOptions: {}
  };

  /**
   * @class
   *
   */
  class FormSelect extends Component {
    /**
     * Construct FormSelect instance
     * @constructor
     * @param {Element} el
     * @param {Object} options
     */
    constructor(el, options) {
      super(FormSelect, el, options);

      // Don't init if browser default version
      if (this.$el.hasClass('browser-default')) {
        return;
      }

      this.el.M_FormSelect = this;

      /**
       * Options for the select
       * @member FormSelect#options
       */
      this.options = $.extend({}, FormSelect.defaults, options);

      this.isMultiple = this.$el.prop('multiple');

      // Setup
      this.el.tabIndex = -1;
      this._keysSelected = {};
      this._valueDict = {}; // Maps key to original and generated option element.
      this._setupDropdown();

      this._setupEventHandlers();
    }

    static get defaults() {
      return _defaults;
    }

    static init(els, options) {
      return super.init(this, els, options);
    }

    /**
     * Get Instance
     */
    static getInstance(el) {
      let domElem = !!el.jquery ? el[0] : el;
      return domElem.M_FormSelect;
    }

    /**
     * Teardown component
     */
    destroy() {
      this._removeEventHandlers();
      this._removeDropdown();
      this.el.M_FormSelect = undefined;
    }

    /**
     * Setup Event Handlers
     */
    _setupEventHandlers() {
      this._handleSelectChangeBound = this._handleSelectChange.bind(this);
      this._handleOptionClickBound = this._handleOptionClick.bind(this);
      this._handleInputClickBound = this._handleInputClick.bind(this);

      $(this.dropdownOptions)
        .find('li:not(.optgroup)')
        .each((el) => {
          el.addEventListener('click', this._handleOptionClickBound);
        });
      this.el.addEventListener('change', this._handleSelectChangeBound);
      this.input.addEventListener('click', this._handleInputClickBound);
    }

    /**
     * Remove Event Handlers
     */
    _removeEventHandlers() {
      $(this.dropdownOptions)
        .find('li:not(.optgroup)')
        .each((el) => {
          el.removeEventListener('click', this._handleOptionClickBound);
        });
      this.el.removeEventListener('change', this._handleSelectChangeBound);
      this.input.removeEventListener('click', this._handleInputClickBound);
    }

    /**
     * Handle Select Change
     * @param {Event} e
     */
    _handleSelectChange(e) {
      this._setValueToInput();
    }

    /**
     * Handle Option Click
     * @param {Event} e
     */
    _handleOptionClick(e) {
      e.preventDefault();
      let option = $(e.target).closest('li')[0];
      let key = option.id;
      if (!$(option).hasClass('disabled') && !$(option).hasClass('optgroup') && key.length) {
        let selected = true;

        if (this.isMultiple) {
          // Deselect placeholder option if still selected.
          let placeholderOption = $(this.dropdownOptions).find('li.disabled.selected');
          if (placeholderOption.length) {
            placeholderOption.removeClass('selected');
            placeholderOption.find('input[type="checkbox"]').prop('checked', false);
            this._toggleEntryFromArray(placeholderOption[0].id);
          }
          selected = this._toggleEntryFromArray(key);
        } else {
          $(this.dropdownOptions)
            .find('li')
            .removeClass('selected');
          $(option).toggleClass('selected', selected);
          this._keysSelected = {};
          this._keysSelected[option.id] = true;
        }

        // Set selected on original select option
        // Only trigger if selected state changed
        let prevSelected = $(this._valueDict[key].el).prop('selected');
        if (prevSelected !== selected) {
          $(this._valueDict[key].el).prop('selected', selected);
          this.$el.trigger('change');
        }
      }

      e.stopPropagation();
    }

    /**
     * Handle Input Click
     */
    _handleInputClick() {
      if (this.dropdown && this.dropdown.isOpen) {
        this._setValueToInput();
        this._setSelectedStates();
      }
    }

    /**
     * Setup dropdown
     */
    _setupDropdown() {
      this.wrapper = document.createElement('div');
      $(this.wrapper).addClass('select-wrapper ' + this.options.classes);
      this.$el.before($(this.wrapper));
      this.wrapper.appendChild(this.el);

      if (this.el.disabled) {
        this.wrapper.classList.add('disabled');
      }

      // Create dropdown
      this.$selectOptions = this.$el.children('option, optgroup');
      this.dropdownOptions = document.createElement('ul');
      this.dropdownOptions.id = `select-options-${M.guid()}`;
      $(this.dropdownOptions).addClass(
        'dropdown-content select-dropdown ' + (this.isMultiple ? 'multiple-select-dropdown' : '')
      );

      // Create dropdown structure.
      if (this.$selectOptions.length) {
        this.$selectOptions.each((el) => {
          if ($(el).is('option')) {
            // Direct descendant option.
            let optionEl;
            if (this.isMultiple) {
              optionEl = this._appendOptionWithIcon(this.$el, el, 'multiple');
            } else {
              optionEl = this._appendOptionWithIcon(this.$el, el);
            }

            this._addOptionToValueDict(el, optionEl);
          } else if ($(el).is('optgroup')) {
            // Optgroup.
            let selectOptions = $(el).children('option');
            $(this.dropdownOptions).append(
              $('<li class="optgroup"><span>' + el.getAttribute('label') + '</span></li>')[0]
            );

            selectOptions.each((el) => {
              let optionEl = this._appendOptionWithIcon(this.$el, el, 'optgroup-option');
              this._addOptionToValueDict(el, optionEl);
            });
          }
        });
      }

      this.$el.after(this.dropdownOptions);

      // Add input dropdown
      this.input = document.createElement('input');
      $(this.input).addClass('select-dropdown dropdown-trigger');
      this.input.setAttribute('type', 'text');
      this.input.setAttribute('readonly', 'true');
      this.input.setAttribute('data-target', this.dropdownOptions.id);
      if (this.el.disabled) {
        $(this.input).prop('disabled', 'true');
      }

      this.$el.before(this.input);
      this._setValueToInput();

      // Add caret
      let dropdownIcon = $(
        '<svg class="caret" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'
      );
      this.$el.before(dropdownIcon[0]);

      // Initialize dropdown
      if (!this.el.disabled) {
        let dropdownOptions = $.extend({}, this.options.dropdownOptions);

        // Add callback for centering selected option when dropdown content is scrollable
        dropdownOptions.onOpenEnd = (el) => {
          let selectedOption = $(this.dropdownOptions)
            .find('.selected')
            .first();

          if (selectedOption.length) {
            // Focus selected option in dropdown
            M.keyDown = true;
            this.dropdown.focusedIndex = selectedOption.index();
            this.dropdown._focusFocusedItem();
            M.keyDown = false;

            // Handle scrolling to selected option
            if (this.dropdown.isScrollable) {
              let scrollOffset =
                selectedOption[0].getBoundingClientRect().top -
                this.dropdownOptions.getBoundingClientRect().top; // scroll to selected option
              scrollOffset -= this.dropdownOptions.clientHeight / 2; // center in dropdown
              this.dropdownOptions.scrollTop = scrollOffset;
            }
          }
        };

        if (this.isMultiple) {
          dropdownOptions.closeOnClick = false;
        }
        this.dropdown = M.Dropdown.init(this.input, dropdownOptions);
      }

      // Add initial selections
      this._setSelectedStates();
    }

    /**
     * Add option to value dict
     * @param {Element} el  original option element
     * @param {Element} optionEl  generated option element
     */
    _addOptionToValueDict(el, optionEl) {
      let index = Object.keys(this._valueDict).length;
      let key = this.dropdownOptions.id + index;
      let obj = {};
      optionEl.id = key;

      obj.el = el;
      obj.optionEl = optionEl;
      this._valueDict[key] = obj;
    }

    /**
     * Remove dropdown
     */
    _removeDropdown() {
      $(this.wrapper)
        .find('.caret')
        .remove();
      $(this.input).remove();
      $(this.dropdownOptions).remove();
      $(this.wrapper).before(this.$el);
      $(this.wrapper).remove();
    }

    /**
     * Setup dropdown
     * @param {Element} select  select element
     * @param {Element} option  option element from select
     * @param {String} type
     * @return {Element}  option element added
     */
    _appendOptionWithIcon(select, option, type) {
      // Add disabled attr if disabled
      let disabledClass = option.disabled ? 'disabled ' : '';
      let optgroupClass = type === 'optgroup-option' ? 'optgroup-option ' : '';
      let multipleCheckbox = this.isMultiple
        ? `<label><input type="checkbox"${disabledClass}"/><span>${option.innerHTML}</span></label>`
        : option.innerHTML;
      let liEl = $('<li></li>');
      let spanEl = $('<span></span>');
      spanEl.html(multipleCheckbox);
      liEl.addClass(`${disabledClass} ${optgroupClass}`);
      liEl.append(spanEl);

      // add icons
      let iconUrl = option.getAttribute('data-icon');
      if (!!iconUrl) {
        let imgEl = $(`<img alt="" src="${iconUrl}">`);
        liEl.prepend(imgEl);
      }

      // Check for multiple type.
      $(this.dropdownOptions).append(liEl[0]);
      return liEl[0];
    }

    /**
     * Toggle entry from option
     * @param {String} key  Option key
     * @return {Boolean}  if entry was added or removed
     */
    _toggleEntryFromArray(key) {
      let notAdded = !this._keysSelected.hasOwnProperty(key);
      let $optionLi = $(this._valueDict[key].optionEl);

      if (notAdded) {
        this._keysSelected[key] = true;
      } else {
        delete this._keysSelected[key];
      }

      $optionLi.toggleClass('selected', notAdded);

      // Set checkbox checked value
      $optionLi.find('input[type="checkbox"]').prop('checked', notAdded);

      // use notAdded instead of true (to detect if the option is selected or not)
      $optionLi.prop('selected', notAdded);

      return notAdded;
    }

    /**
     * Set text value to input
     */
    _setValueToInput() {
      let values = [];
      let options = this.$el.find('option');

      options.each((el) => {
        if ($(el).prop('selected')) {
          let text = $(el).text();
          values.push(text);
        }
      });

      if (!values.length) {
        let firstDisabled = this.$el.find('option:disabled').eq(0);
        if (firstDisabled.length && firstDisabled[0].value === '') {
          values.push(firstDisabled.text());
        }
      }

      this.input.value = values.join(', ');
    }

    /**
     * Set selected state of dropdown to match actual select element
     */
    _setSelectedStates() {
      this._keysSelected = {};

      for (let key in this._valueDict) {
        let option = this._valueDict[key];
        let optionIsSelected = $(option.el).prop('selected');
        $(option.optionEl)
          .find('input[type="checkbox"]')
          .prop('checked', optionIsSelected);
        if (optionIsSelected) {
          this._activateOption($(this.dropdownOptions), $(option.optionEl));
          this._keysSelected[key] = true;
        } else {
          $(option.optionEl).removeClass('selected');
        }
      }
    }

    /**
     * Make option as selected and scroll to selected position
     * @param {jQuery} collection  Select options jQuery element
     * @param {Element} newOption  element of the new option
     */
    _activateOption(collection, newOption) {
      if (newOption) {
        if (!this.isMultiple) {
          collection.find('li.selected').removeClass('selected');
        }
        let option = $(newOption);
        option.addClass('selected');
      }
    }

    /**
     * Get Selected Values
     * @return {Array}  Array of selected values
     */
    getSelectedValues() {
      let selectedValues = [];
      for (let key in this._keysSelected) {
        selectedValues.push(this._valueDict[key].el.value);
      }
      return selectedValues;
    }
  }

  M.FormSelect = FormSelect;

  if (M.jQueryLoaded) {
    M.initializeJqueryWrapper(FormSelect, 'formSelect', 'M_FormSelect');
  }
})(cash);
