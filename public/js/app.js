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
  if (btn && menu) {
    var isMobileMenuOpen = false;
    btn.addEventListener("click", function () {
      if (!isMobileMenuOpen) {
        menu.classList.remove("hidden");
        requestAnimationFrame(function () {
          menu.classList.remove("opacity-0", "scale-95", "max-h-0");
          menu.classList.add("opacity-100", "scale-100", "max-h-96");
        });
      } else {
        menu.classList.remove("opacity-100", "scale-100", "max-h-96");
        menu.classList.add("opacity-0", "scale-95", "max-h-0");
        setTimeout(function () {
          return menu.classList.add("hidden");
        }, 300);
      }
      isMobileMenuOpen = !isMobileMenuOpen;
    });
  }

  // === SLIDER AUTO ===
  var slides = document.querySelectorAll("#slider .slide");
  var current = 0;
  var showSlide = function showSlide(i) {
    slides.forEach(function (slide, idx) {
      slide.classList.toggle("opacity-100", idx === i);
      slide.classList.toggle("pointer-events-auto", idx === i);
      slide.classList.toggle("opacity-0", idx !== i);
      slide.classList.toggle("pointer-events-none", idx !== i);
    });
  };
  if (slides.length) {
    showSlide(current);
    setInterval(function () {
      current = (current + 1) % slides.length;
      showSlide(current);
    }, 8000);
  }

  // === DROPDOWN ===
  function setupDropdown(buttonId, menuId, arrowId) {
    var btn = document.getElementById(buttonId);
    var menu = document.getElementById(menuId);
    var arrow = document.getElementById(arrowId);
    if (btn && menu && arrow) {
      btn.addEventListener("click", function (e) {
        e.stopPropagation();
        menu.classList.toggle("hidden");
        arrow.classList.toggle("rotate-180");
      });
      document.addEventListener("click", function (e) {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
          menu.classList.add("hidden");
          arrow.classList.remove("rotate-180");
        }
      });
    }
  }
  setupDropdown("desktopContentTypeButton", "desktopContentTypeMenu", "desktopContentTypeArrow");
  setupDropdown("mobileContentTypeButton", "mobileContentTypeMenu", "mobileContentTypeArrow");

  // === GENERIC DROPDOWN ===
  var buttonDropdown = document.getElementById("dropdownButton");
  var menuDropdown = document.getElementById("dropdownMenu");
  var arrowDropdown = document.getElementById("dropdownArrow");
  if (buttonDropdown && menuDropdown && arrowDropdown) {
    buttonDropdown.addEventListener("click", function () {
      menuDropdown.classList.toggle("hidden");
      arrowDropdown.classList.toggle("rotate-180");
    });
    document.addEventListener("click", function (e) {
      if (!buttonDropdown.contains(e.target) && !menuDropdown.contains(e.target)) {
        menuDropdown.classList.add("hidden");
        arrowDropdown.classList.remove("rotate-180");
      }
    });
  }

  // === SLIDER SCROLL BTN ===
  var slider = document.getElementById("sliderContainer");
  var nextBtn = document.getElementById("nextBtn");
  var prevBtn = document.getElementById("prevBtn");
  if (slider && nextBtn && prevBtn) {
    nextBtn.addEventListener("click", function () {
      return slider.scrollBy({
        left: 320,
        behavior: "smooth"
      });
    });
    prevBtn.addEventListener("click", function () {
      return slider.scrollBy({
        left: -320,
        behavior: "smooth"
      });
    });
  }

  // === PAGINATION AJAX ===
  document.body.addEventListener("click", function (e) {
    if (e.target.closest(".pagination-link")) {
      e.preventDefault();
      var url = e.target.closest(".pagination-link").getAttribute("href");
      fetch(url).then(function (res) {
        return res.text();
      }).then(function (html) {
        var doc = new DOMParser().parseFromString(html, "text/html");
        document.querySelector("#article-container").innerHTML = doc.querySelector("#article-container").innerHTML;
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      });
    }
  });

  // === INTERSECTION OBSERVER SHORTS ===
  var shortsObserver = new IntersectionObserver(function (entries) {
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
  if (target) shortsObserver.observe(target);

  // === NAVBAR HIDE/SHOW ===
  var lastScrollTop = 0;
  var navbar = document.getElementById("navbar");
  if (navbar) {
    window.addEventListener("scroll", function () {
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      navbar.style.transform = scrollTop > lastScrollTop ? "translateY(-100%)" : "translateY(0)";
      lastScrollTop = Math.max(scrollTop, 0);
    });
  }

  // === SHORTS SLIDER CUSTOM ===
  var shortsSlider = document.getElementById("sliderWrapper");
  var shortsSlides = shortsSlider ? shortsSlider.children : [];
  var currentIndex = 0;
  var totalSlides = shortsSlides.length;
  var nextSlideBtn = document.getElementById("nextSlide");
  var prevSlideBtn = document.getElementById("prevSlide");
  function updateShortsSlider() {
    if (totalSlides === 0) return;
    var width = shortsSlides[0].clientWidth;
    shortsSlider.style.transform = "translateX(-".concat(width * currentIndex, "px)");
  }
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

  // === LOAD MORE ARTICLES  ===
  var offset = 5;
  var loadBtn = document.getElementById("loadMoreArticlesButton");
  var wrapper = document.getElementById("moreArticlesWrapper");
  if (loadBtn && wrapper) {
    var loadUrl = loadBtn.dataset.url;
    loadBtn.addEventListener("click", function () {
      loadBtn.disabled = true;
      loadBtn.textContent = "Loading...";
      fetch(loadUrl + "?offset=" + offset).then(function (res) {
        return res.json();
      }).then(function (data) {
        if (!data.hasMore) {
          loadBtn.disabled = true;
          loadBtn.textContent = "No more articles";
          loadBtn.classList.add("opacity-60", "cursor-not-allowed");
        } else {
          wrapper.insertAdjacentHTML("beforeend", data.html);
          offset += 5;
          loadBtn.disabled = false;
          loadBtn.textContent = "Load More";
        }
      });
    });
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