/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _nav_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./nav.js */ "./resources/js/nav.js");
/* harmony import */ var _nav_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_nav_js__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/js/nav.js":
/*!*****************************!*\
  !*** ./resources/js/nav.js ***!
  \*****************************/
/***/ (() => {

document.addEventListener("DOMContentLoaded", function () {
  // === MOBILE MENU ===
  var btn = document.getElementById("mobile-menu-button");
  var menu = document.getElementById("mobile-menu");
  if (!btn || !menu) return;
  var isOpen = false;
  btn.addEventListener("click", function () {
    if (!isOpen) {
      menu.classList.remove("hidden");
      requestAnimationFrame(function () {
        menu.classList.remove("opacity-0", "scale-95", "max-h-0");
        menu.classList.add("opacity-100", "scale-100", "max-h-[500px]");
      });
    } else {
      menu.classList.remove("opacity-100", "scale-100", "max-h-[500px]");
      menu.classList.add("opacity-0", "scale-95", "max-h-0");
      setTimeout(function () {
        menu.classList.add("hidden");
      }, 300);
    }
    isOpen = !isOpen;
  });
  var slides = document.querySelectorAll("#slider .slide");
  var current = 0;
  function showSlide(index) {
    slides.forEach(function (slide, i) {
      if (i === index) {
        slide.classList.add("opacity-100", "pointer-events-auto");
        slide.classList.remove("opacity-0", "pointer-events-none");
      } else {
        slide.classList.remove("opacity-100", "pointer-events-auto");
        slide.classList.add("opacity-0", "pointer-events-none");
      }
    });
  }
  if (slides.length > 0) {
    showSlide(current);
    setInterval(function () {
      current = (current + 1) % slides.length;
      showSlide(current);
    }, 5000);
  }
  console.log("Slider JS aktif, jumlah slide:", slides.length);

  // === DROPDOWN ===
  var button = document.getElementById("dropdownButton");
  var menuDropdown = document.getElementById("dropdownMenu");
  var arrow = document.getElementById("dropdownArrow");
  if (button && menuDropdown && arrow) {
    button.addEventListener("click", function () {
      isOpen = !isOpen;
      menuDropdown.classList.toggle("hidden");
      arrow.classList.toggle("rotate-180");
    });
    document.addEventListener("click", function (e) {
      if (!button.contains(e.target) && !menuDropdown.contains(e.target)) {
        menuDropdown.classList.add("hidden");
        arrow.classList.remove("rotate-180");
        isOpen = false;
      }
    });
  }

  // === SLIDER SCROLL ===
  var slider = document.getElementById("sliderContainer");
  var nextBtn = document.getElementById("nextBtn");
  var prevBtn = document.getElementById("prevBtn");
  if (slider && nextBtn && prevBtn) {
    nextBtn.addEventListener("click", function () {
      slider.scrollBy({
        left: 320,
        behavior: "smooth"
      });
    });
    prevBtn.addEventListener("click", function () {
      slider.scrollBy({
        left: -320,
        behavior: "smooth"
      });
    });
  }

  // === PAGINATION ===
  document.body.addEventListener("click", function (e) {
    if (e.target.closest(".pagination-link")) {
      e.preventDefault();
      var url = e.target.closest(".pagination-link").getAttribute("href");
      fetch(url).then(function (res) {
        return res.text();
      }).then(function (html) {
        var parser = new DOMParser();
        var doc = parser.parseFromString(html, "text/html");
        var newContent = doc.querySelector("#article-container");

        // Ganti konten, BUKAN ditambah
        document.querySelector("#article-container").innerHTML = newContent.innerHTML;

        // Scroll to top (opsional)
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      });
    }
  });

  // === INTERSECTION OBSERVER ===
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.remove("opacity-0", "translate-x-10");
        entry.target.classList.add("opacity-100", "translate-x-0");
      }
    });
  }, {
    threshold: 0.2
  });
  var target = document.getElementById("shortsSection");
  if (target) observer.observe(target);

  // === NAVBAR SHOW/HIDE ON SCROLL ===
  var lastScrollTop = 0;
  var navbar = document.getElementById("navbar");
  if (navbar) {
    window.addEventListener("scroll", function () {
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      navbar.style.transform = scrollTop > lastScrollTop ? "translateY(-100%)" : "translateY(0)";
      lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });
  }

  // === SHORTS SLIDER CUSTOM ===
  var shortsSlider = document.getElementById("sliderWrapper");
  var shortsSlides = shortsSlider ? shortsSlider.children : [];
  var totalSlides = shortsSlides.length;
  var currentIndex = 0;
  var nextSlideBtn = document.getElementById("nextSlide");
  var prevSlideBtn = document.getElementById("prevSlide");
  if (shortsSlider && nextSlideBtn && prevSlideBtn) {
    nextSlideBtn.addEventListener("click", function () {
      currentIndex = currentIndex < totalSlides - 1 ? currentIndex + 1 : 0;
      updateShortsSlider();
    });
    prevSlideBtn.addEventListener("click", function () {
      currentIndex = currentIndex > 0 ? currentIndex - 1 : totalSlides - 1;
      updateShortsSlider();
    });
  }
  function updateShortsSlider() {
    if (totalSlides === 0) return;
    var width = shortsSlides[0].clientWidth;
    shortsSlider.style.transform = "translateX(-".concat(width * currentIndex, "px)");
  }
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;