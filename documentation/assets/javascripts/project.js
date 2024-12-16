/* jshint browser: true, strict: global, unused:false */
/* global window, document, dirPath, loadjs, Prism */
'use strict';

// DISCOUNT

const discountEnabled = false;
const discountPercentAmount = 40;

const enableDiscount = function () {
    // if discount div
    if (document.getElementById('discount') !== null) {
        // add 'discount-enabled' class to body
        document.body.classList.add('discount-enabled');
        document.getElementById('discount').innerHTML = '<div class="w-100 d-flex align-items-center justify-content-center py-3 bg-warning">' + discountPercentAmount + '% OFF - THIS WEEK ONLY <a href="https://1.envato.market/GByBk" class="btn btn-sm btn-outline-dark ms-2" target="_blank">SHOP NOW <i class="bi bi-arrow-right-circle-fill ms-3"></i></a></div>';
        document.getElementById('discount').style.display = 'block';
        document.getElementById('discount').style.opacity = 1;
        document.getElementById('discount').style.visibility = 'visible';
        document.getElementById('discount').style.transition = 'opacity 0.3s ease-in-out';
    }
};

const coreFunctions = function () {
    function coreHighlight() {
        if (typeof(Prism) !== 'undefined') {
            Prism.highlightAll();
        } else {
            setTimeout(function() {
                coreHighlight();
            }, 50);
        }
    }

    setTimeout(() => {
        coreHighlight();
    }, 3000);

    let resizeTimer;

    window.addEventListener('resize', function (e) {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            if (document.body.clientWidth > 991) {
                document.getElementById('navbar-left-wrapper').style.display = 'block';
            }
        }, 250);
    });
};

loadjs([
    dirPath + 'assets/javascripts/popper.min.js',
    dirPath + 'assets/javascripts/bootstrap.min.js'
], 'core');

loadjs.ready('core', function () {
    coreFunctions();
    loadjs.done('sidebar');
    // search
    if (document.querySelector('input[name="search"]') !== null) {
        loadjs([dirPath + 'assets/javascripts/plugins/mark.min.js'], function () {
            loadjs.done('search');
            if (document.getElementById('google-reviews') !== null) {
                loadjs.done('googlereviews');
            }
        });
    }

    // discount
    if (discountEnabled) {
        enableDiscount();
    }
});

// core loaded
loadjs.ready(['sidebar'], function () {
    // left navbar collapse
    if (document.querySelector('main')) {
        document.querySelector('main').addEventListener('click', function (e) {
            if (document.body.clientWidth < 992) {
                document.getElementById('navbar-left-wrapper').style.display = 'none';
            }
        });
    }
    document.getElementById('navbar-left-toggler').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('navbar-left-wrapper').style.display = 'block';
        return false;
    });
    document.getElementById('navbar-left-collapse').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('navbar-left-wrapper').style.display = 'none';
        return false;
    });
    let hash = window.location.hash;
    if (hash !== '' && document.querySelector(hash)) {
        document.querySelector(hash).scrollIntoView({
            behavior: 'smooth'
        });
    }
});

// core + search loaded
loadjs.ready(['search'], function () {
    // the input field
    const markInstance = new Mark(document.querySelector("main"));
    let $input = document.querySelector("input[name='search']"),
        // clear button
        $clearBtn = document.querySelector("button[data-search='clear']"),
        // prev button
        $prevBtn = document.querySelector("button[data-search='prev']"),
        // next button
        $nextBtn = document.querySelector("button[data-search='next']"),
        // jQuery object to save <mark> elements
        $results,
        $resultsCount = document.getElementById('search-results-count'),
        // the class that will be appended to the current
        // focused element
        currentClass = "current",
        // top offset for the jump (the search bar)
        offsetTop = 160,
        // the current index of the focused element
        currentIndex = 0;

    function clearSearch (unstick = true) {
        markInstance.unmark();
        $resultsCount.innerHTML = '';
        $input.value = '';
        $input.focus();
        $prevBtn.classList.add('d-none');
        $nextBtn.classList.add('d-none');
        if (unstick) {
            document.getElementById('search-bar').classList.remove('sticky-top');
        }
        document.getElementById('search-bar').classList.remove('shadow');
    }

    /**
     * Jumps to the element matching the currentIndex
     */
    function jumpTo () {
        if ($results.length) {
            let position,
                $current = $results[currentIndex];
            $results.forEach(function (item) {
                item.classList.remove(currentClass)
            });

            $resultsCount.innerHTML = $results.length + ' results';
            $resultsCount.classList.remove('no-result');
            $current.classList.add(currentClass);
            position = $current.getBoundingClientRect().top + window.scrollY - offsetTop;
            window.scrollTo(0, position);

            $prevBtn.classList.remove('d-none');
            $nextBtn.classList.remove('d-none');
        } else {
            if ($input.value === '') {
                $resultsCount.innerHTML = '';
            } else {
                $resultsCount.innerHTML = 'no result in this page';
                $resultsCount.classList.add('no-result');
            }
            $prevBtn.classList.add('d-none');
            $nextBtn.classList.add('d-none');
        }
    }

    /**
     * Searches for the entered keyword in the
     * specified context on input
     */
    $input.addEventListener("input", function () {
        document.getElementById('search-bar').classList.add('sticky-top', 'shadow');
        const searchVal = this.value;
        if (searchVal.length > 1) {
            markInstance.unmark({
                done: function () {
                    markInstance.mark(searchVal, {
                        separateWordSearch: false,
                        done: function () {
                            $results = document.querySelectorAll("main mark");
                            currentIndex = 0;
                            jumpTo();
                        }
                    });
                }
            });
        } else if (searchVal.length === 0) {
            clearSearch(false);
        }
    });

    /**
     * Clears the search
     */
    $clearBtn.addEventListener("click", clearSearch);

    /**
     * Next and previous search jump to
     */
    $prevBtn.addEventListener("click", function () {
        if ($results.length) {
            currentIndex -= 1;
            if (currentIndex < 0) {
                currentIndex = $results.length - 1;
            }
            if (currentIndex > $results.length - 1) {
                currentIndex = 0;
            }
            jumpTo();
        }
    });

    $nextBtn.addEventListener("click", function () {
        if ($results.length) {
            currentIndex += 1;
            if (currentIndex < 0) {
                currentIndex = $results.length - 1;
            }
            if (currentIndex > $results.length - 1) {
                currentIndex = 0;
            }
            jumpTo();
        }
    });
});

loadjs.ready(['googlereviews'], function () {
    const $googleReviews = document.getElementById('google-reviews');
    if ($googleReviews !== null) {
        fetch('ajax-google-reviews.php')
            .then(function (response) {
                return response.text()
            })
            .then(function (html) {
                $googleReviews.innerHTML = html;
                const run = window.run;
                if (typeof run != 'undefined') {
                    setTimeout(run, 0);
                }
            }).catch((error) => {
                console.log(error);
            });
    }
});
