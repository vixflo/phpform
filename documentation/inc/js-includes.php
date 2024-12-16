<?php
$dir_path = 'https://www.phpformbuilder.pro/documentation/';
if ($_SERVER['HTTP_HOST'] != 'www.phpformbuilder.pro') {
    if (strpos($_SERVER['REQUEST_URI'], 'templates/') || strpos($_SERVER['REQUEST_URI'], 'phpformbuilder/')) {
        $dir_path = '../documentation/';
    } elseif (!strpos($_SERVER['REQUEST_URI'], 'documentation')) {
        $dir_path = 'documentation/';
    } else {
        $dir_path = '';
    }
}
?>
<script>
    const dirPath = '<?php echo $dir_path; ?>';
</script>
<script src="<?php echo $dir_path; ?>assets/javascripts/loadjs.min.js"></script>
<script src="<?php echo $dir_path; ?>assets/javascripts/project.min.js"></script>
<script async src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>


<!-- schema.org -->

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "PHP Form Builder",
        "url": "https://www.phpformbuilder.pro",
        "description": "PHP Form Builder - Form Generator including 20+ JavaScript Plugins, Live validation + Server-side validation, Email and Database features.",
        "applicationCategory": "Forms",
        "applicationSubCategory": "PHP",
        "about": {
            "@type": "Thing",
            "description": "PHP, form"
        },
        "browserRequirements": "Requires JavaScript. Requires HTML5.",
        "softwareVersion": "4.3",
        "softwareHelp": {
            "@type": "CreativeWork",
            "url": "https://www.miglisoft.com/#contact"
        },
        "operatingSystem": "All",
        "releaseNotes": "https://www.phpformbuilder.pro/#changelog",
        "image": "https://www.phpformbuilder.pro/documentation/assets/images/phpformbuilder-preview.png",
        "offers": {
            "@type": "Offer",
            "price": "20.00",
            "priceCurrency": "USD",
            "url": "https://codecanyon.net/item/php-form-builder/8790160"
        },
        "aggregateRating": {
            "@type": "aggregateRating",
            "ratingValue": "4.83",
            "reviewCount": "179"
        }
    }
</script>

<script type='application/ld+json'>
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Miglisoft",
        "url": "https://www.miglisoft.com",
        "logo": "https://www.miglisoft.com/assets/images/migli-logo.png",
        "sameAs": [
            "https://www.facebook.com/miglisoft/",
            "https://twitter.com/miglisoft",
            "https://plus.google.com/+GillesMiglioriMigli",
            "https://www.linkedin.com/in/gilles-migliori-ab661626/"
        ]
    }
</script>

<script type='application/ld+json'>
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "category": "Forms",
        "url": "https://www.phpformbuilder.pro",
        "description": "PHP Form Builder New version 4 Build now Materialize AND Material Bootstrap forms New Material Date/time picker plugin New Very fast and 100% optimized loading with LoadJs New Visual Studio Code extension Easy powerful JavaScript Plugins integration including jQuery Validator (50$ value) jQuery Fileuploader (12$ value) Save up to 50% with the Extended license   What is PHP Form Builder? PHP Form Builder is a complete library based on a PHP class, which allows you to program any type of form and layout them using simple functions.",
        "name": "PHP Form Builder",
        "image": "https://www.phpformbuilder.pro/documentation/assets/images/phpformbuilder-preview.png",
        "offers": {
            "@type": "Offer",
            "availability": "https://schema.org/InStock",
            "Price": "20.00",
            "priceValidUntil": "<?php echo date('Y-m-d', strtotime('+1 year')); ?>",
            "priceCurrency": "USD",
            "url": "https://www.phpformbuilder.pro"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.83",
            "reviewCount": "179"
        }
    }
</script>

<!-- Prism -->

<script async defer src="/documentation/assets/javascripts/prism.min.js" data-manual></script>
<?php
if ($_SERVER['HTTP_HOST'] === 'www.phpformbuilder.pro') {
    // include_once('share-buttons.php');
?>

    <!--Start of Tawk.to Script-->
    <script>
        setTimeout(() => {
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/5e994d8569e9320caac48144/default';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        }, 5000);
    </script>
    <!--End of Tawk.to Script-->

    <script>
        partytown = {
            forward: ['dataLayer.push', 'enableSearch'],
        };
    </script>
    <script>
        /* Partytown 0.7.1 - MIT builder.io */ ! function(t, e, n, i, r, o, a, d, s, c, p, l) {
            function u() {
                l || (l = 1, "/" == (a = (o.lib || "/~partytown/") + (o.debug ? "debug/" : ""))[0] && (s = e.querySelectorAll('script[type="text/partytown"]'), i != t ? i.dispatchEvent(new CustomEvent("pt1", {
                    detail: t
                })) : (d = setTimeout(w, 1e4), e.addEventListener("pt0", f), r ? h(1) : n.serviceWorker ? n.serviceWorker.register(a + (o.swPath || "partytown-sw.js"), {
                    scope: a
                }).then((function(t) {
                    t.active ? h() : t.installing && t.installing.addEventListener("statechange", (function(t) {
                        "activated" == t.target.state && h()
                    }))
                }), console.error) : w())))
            }

            function h(t) {
                c = e.createElement(t ? "script" : "iframe"), t || (c.setAttribute("style", "display:block;width:0;height:0;border:0;visibility:hidden"), c.setAttribute("aria-hidden", !0)), c.src = a + "partytown-" + (t ? "atomics.js?v=0.7.1" : "sandbox-sw.html?" + Date.now()), e.body.appendChild(c)
            }

            function w(t, n) {
                for (f(), t = 0; t < s.length; t++)(n = e.createElement("script")).innerHTML = s[t].innerHTML, e.head.appendChild(n);
                c && c.parentNode.removeChild(c)
            }

            function f() {
                clearTimeout(d)
            }
            o = t.partytown || {}, i == t && (o.forward || []).map((function(e) {
                p = t, e.split(".").map((function(e, n, i) {
                    p = p[i[n]] = n + 1 < i.length ? "push" == i[n + 1] ? [] : p[i[n]] || {} : function() {
                        (t._ptf = t._ptf || []).push(i, arguments)
                    }
                }))
            })), "complete" == e.readyState ? u() : (t.addEventListener("DOMContentLoaded", u), t.addEventListener("load", u))
        }(window, document, navigator, top, window.crossOriginIsolated);
    </script>

    <!--Start of Tawk.to Script-->
    <!-- <script type="text/partytown">
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
</script>
<script type="text/partytown" src="https://embed.tawk.to/5e994d8569e9320caac48144/default" crossorigin="*">
</script> -->
    <!--End of Tawk.to Script-->

    <script type="text/partytown" src="/documentation/assets/javascripts/plugins/loaders/pace.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script type="text/partytown" src="https://www.googletagmanager.com/gtag/js?id=G-PYVV22GLS5"></script>
    <script type="text/partytown">
        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PYVV22GLS5');
</script>
<?php
} else { ?>
    <script src="/documentation/assets/javascripts/plugins/loaders/pace.min.js"></script>
<?php }
if (strpos($_SERVER['REQUEST_URI'], 'javascript-plugins.php')) { ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php }
