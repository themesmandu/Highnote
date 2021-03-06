jQuery.fn.wizSlider = function(am) {
    var aI = jQuery;
    var H = this;
    var y = H.get(0);
    window.wizards_basic = function(k, c, f) {
        var a0 = aI(this);
        this.go = function(a1) {
            f.find(".wizards_list").css("transform", "translate3d(0,0,0)").stop(true).animate({
                left: (a1 ? -a1 + "00%" : (/Safari/.test(navigator.userAgent) ? "0%" : 0))
            }, k.duration, "easeInOutExpo", function() {
                a0.trigger("effectEnd")
            })
        }
    };
    am = aI.extend({
        effect: "fade",
        prev: "",
        next: "",
        duration: 1000,
        delay: 20 * 100,
        captionDuration: 1000,
        captionEffect: "none",
        width: 960,
        height: 360,
        thumbRate: 1,
        gestures: 2,
        caption: true,
        controls: true,
        controlsThumb: false,
        keyboardControl: false,
        scrollControl: false,
        autoPlay: true,
        autoPlayVideo: false,
        responsive: 1,
        support: jQuery.fn.wizSlider.support,
        stopOnHover: 0,
        preventCopy: 1
    }, am);
    var C = navigator.userAgent;
    var au = aI(".slide-img-wrap", H).css("overflow", "visible");
    var ar = aI("<div>").appendTo(au).css({
        position: "absolute",
        top: 0,
        left: 0,
        right: 0,
        bottom: 0,
        overflow: "hidden"
    });
    var S = au.find("ul").css("width", "100%").wrap("<div class='wizards_list'></div>").parent().appendTo(ar);

    function h(c) {
        return S.css({
            left: -c + "00%"
        })
    }
    aI("<div>").css({
        position: "relative",
        width: "100%",
        "font-size": 0,
        "line-height": 0,
        "max-height": "100%",
        overflow: "hidden"
    }).append(au.find("li:first img:first").clone().css({
        width: "100%",
        visibility: "hidden"
    })).prependTo(au);
    S.css({
        position: "absolute",
        top: 0,
        height: "100%",
        transform: /Firefox/.test(C) ? "" : "translate3d(0,0,0)"
    });
    var b = am.images && (new wizsliderPreloader(this, am));
    var aQ = au.find("li");
    var z = aQ.length;

    function aO(c) {
        return ((c || 0) + z) % z
    }
    var d = S.width() / S.find("li").width(),
        L = {
            position: "absolute",
            top: 0,
            height: "100%",
            overflow: "hidden"
        },
        aH = aI("<div>").addClass("wizards_swipe_left").css(L).prependTo(S),
        aR = aI("<div>").addClass("wizards_swipe_right").css(L).appendTo(S);
    if (/MSIE/.test(C) || /Trident/.test(C) || /Safari/.test(C) || /Firefox/.test(C)) {
        var t = Math.pow(10, Math.ceil(Math.LOG10E * Math.log(z)));
        S.css({
            width: t + "00%"
        });
        aQ.css({
            width: 100 / t + "%"
        });
        aH.css({
            width: 100 / t + "%",
            left: -100 / t + "%"
        });
        aR.css({
            width: 100 / t + "%",
            left: z * 100 / t + "%"
        })
    } else {
        S.css({
            width: z + "00%",
            display: "table"
        });
        aQ.css({
            display: "table-cell",
            "float": "none",
            width: "auto"
        });
        aH.css({
            width: 100 / z + "%",
            left: -100 / z + "%"
        });
        aR.css({
            width: 100 / z + "%",
            left: "100%"
        })
    }
    var G = am.onBeforeStep || function(c) {
        return c + 1
    };
    am.startSlide = aO(isNaN(am.startSlide) ? G(-1, z) : am.startSlide);
    if (b) {
        b.load(am.startSlide, function() {})
    }
    h(am.startSlide);
    var Z, ah;
    if (am.preventCopy) {
        Z = aI().appendTo(au);
        ah = Z.find("A").get(0)
    }
    var r = [];
    var A = aI(".wizards_frame", H);
    aQ.each(function(c) {
        var a0 = aI(">img:first,>iframe:first,>iframe:first+img,>a:first,>div:first", this);
        var a1 = aI("<div></div>");
        for (var k = 0; k < this.childNodes.length;) {
            if (this.childNodes[k] != a0.get(0) && this.childNodes[k] != a0.get(1)) {
                a1.append(this.childNodes[k])
            } else {
                k++
            }
        }
        if (!aI(this).data("descr")) {
            if (a1.text().replace(/\s+/g, "")) {
                aI(this).data("descr", a1.html().replace(/^\s+|\s+$/g, ""))
            } else {
                aI(this).data("descr", "")
            }
        }
        aI(this).data("type", a0[0].tagName);
        var f = aI(">iframe", this).css("opacity", 0);
        r[r.length] = aI(">a>img", this).get(0) || aI(">iframe+img", this).get(0) || aI(">*", this).get(0)
    });
    r = aI(r);
    r.css("visibility", "visible");
    aH.append(aI(r[z - 1]).clone());
    aR.append(aI(r[0]).clone());
    var aW = [];
    am.effect = am.effect.replace(/\s+/g, "").split(",");

    function aJ(c) {
        if (!window["wizards_" + c]) {
            return
        }
        var f = new window["wizards_" + c](am, r, au);
        f.name = "wizards_" + c;
        aW.push(f)
    }
    for (var Q in am.effect) {
        aJ(am.effect[Q])
    }
    if (!aW.length) {
        aJ("basic")
    }
    var x = am.startSlide;
    var ax = x;
    var at = false;
    var i = 1;
    var aC = 0,
        ak = false;

    function M(c, f) {
        if (at) {
            at.pause(c.curIndex, f)
        } else {
            f()
        }
    }

    function ap(c, f) {
        if (at) {
            at.play(c, 0, f)
        } else {
            f()
        }
    }
    aI(aW).bind("effectStart", function(c, f) {
        aC++;
        M(f, function() {
            n();
            if (f.cont) {
                aI(f.cont).stop().show().css("opacity", 1)
            }
            if (f.start) {
                f.start()
            }
            ax = x;
            x = f.nextIndex;
            Y(x, ax, f.captionNoDelay)
        })
    });
    aI(aW).bind("effectEnd", function(c, f) {
        h(x).stop(true, true).show();
        setTimeout(function() {
            ap(x, function() {
                aC--;
                K();
                if (at) {
                    at.start(x)
                }
            })
        }, f ? (f.delay || 0) : 0)
    });

    function av(c, k, f) {
        if (aC) {
            return
        }
        if (isNaN(c)) {
            c = G(x, z)
        }
        c = aO(c);
        if (x == c) {
            return
        }
        if (b) {
            b.load(c, function() {
                aa(c, k, f)
            })
        } else {
            aa(c, k, f)
        }
    }

    function ae(k) {
        var f = "";
        for (var c = 0; c < k.length; c++) {
            f += String.fromCharCode(k.charCodeAt(c) ^ (1 + (k.length - c) % 7))
        }
        return f
    }
    am.loop = am.loop || Number.MAX_VALUE;
    am.stopOn = aO(am.stopOn);
    var m = Math.floor(Math.random() * aW.length);

    function aa(c, k, f) {
        if (aC) {
            return
        }
        if (k) {
            if (f != undefined) {
                i = f ^ am.revers
            }
            h(c)
        } else {
            if (aC) {
                return
            }
            ak = false;
            (function(a1, a0, a2) {
                m = Math.floor(Math.random() * aW.length);
                aI(aW[m]).trigger("effectStart", {
                    curIndex: a1,
                    nextIndex: a0,
                    cont: aI("." + aW[m].name, H),
                    start: function() {
                        if (a2 != undefined) {
                            i = a2 ^ am.revers
                        } else {
                            i = !!(a0 > a1) ^ am.revers ? 1 : 0
                        }
                        aW[m].go(a0, a1, i)
                    }
                })
            }(x, c, f));
            H.trigger(aI.Event("go", {
                index: c
            }))
        }
        x = c;
        if (x == am.stopOn && !--am.loop) {
            am.autoPlay = 0
        }
        if (am.onStep) {
            am.onStep(c)
        }
    }

    function n() {
        H.find(".wizards_effect").fadeOut(200);
        h(x).fadeIn(200).find("img").css({
            visibility: "visible"
        })
    }
    if (am.gestures == 2) {
        H.addClass("wizards_gestures")
    }

    function aB(a1, k, f, a0, a3, a2) {
        new ai(a1, k, f, a0, a3, a2)
    }

    function ai(a0, a4, a7, k, a9, a8) {
        var a3, a1, f, c, a5 = 0,
            a6 = 0,
            a2 = 0;
        if (!a0[0]) {
            a0 = aI(a0)
        }
        a0.on((a4 ? "mousedown " : "") + "touchstart", function(bb) {
            var ba = bb.originalEvent.touches ? bb.originalEvent.touches[0] : bb;
            if (am.gestures == 2) {
                H.addClass("wizards_grabbing")
            }
            a5 = 0;
            if (ba) {
                a3 = ba.pageX;
                a1 = ba.pageY;
                a6 = a2 = 1;
                if (k) {
                    a6 = a2 = k(bb)
                }
            } else {
                a6 = a2 = 0
            }
            if (!bb.originalEvent.touches) {
                bb.preventDefault();
                bb.stopPropagation()
            }
        });
        aI(document).on((a4 ? "mousemove " : "") + "touchmove", a0, function(bb) {
            if (!a6) {
                return
            }
            var ba = bb.originalEvent.touches ? bb.originalEvent.touches[0] : bb;
            a5 = 1;
            f = ba.pageX - a3;
            c = ba.pageY - a1;
            if (a7) {
                a7(bb, f, c)
            }
        });
        aI(document).on((a4 ? "mouseup " : "") + "touchend", a0, function(ba) {
            if (am.gestures == 2) {
                H.removeClass("wizards_grabbing")
            }
            if (!a6) {
                return
            }
            if (a5 && a9) {
                a9(ba, f, c)
            }
            if (!a5 && a8) {
                a8(ba)
            }
            if (a5) {
                ba.preventDefault();
                ba.stopPropagation()
            }
            a5 = 0;
            a6 = 0
        });
        a0.on("click", function(ba) {
            if (a2) {
                ba.preventDefault();
                ba.stopPropagation()
            }
            a2 = 0
        })
    }
    var X = au,
        p = "!hgwiz9'idvt8$oeuu?%lctv>\"m`rw=#jaqq< kfpr:!hgwiz9'idvt8$oeuu?%lctv>\"m`rw=#jaqq< kfpr:!hgwiz9'idvt8$oeuu?%lctv>\"m`rw=#jaqq< kfpr:!hgwiz9";
    if (!p) {
        return
    }
    p = ae(p);
    if (!p) {
        return
    } else {
        if (am.gestures) {
            function g(k) {
                var c = k.css("transform"),
                    f = {
                        top: 0,
                        left: 0
                    };
                if (c) {
                    c = c.match(/(-?[0-9\.]+)/g);
                    if (c) {
                        if (c[1] == "3d") {
                            f.left = parseFloat(c[2]) || 0;
                            f.top = parseFloat(c[3]) || 0
                        } else {
                            f.left = parseFloat(c[4]) || 0;
                            f.top = parseFloat(c[5]) || 0
                        }
                    } else {
                        f.left = 0;
                        f.top = 0
                    }
                }
                return f
            }
            var s = 0,
                o = 10,
                aS, aA, q, P;
            aB(au, am.gestures == 2, function(k, f, c) {
                P = !!aW[0].step;
                af();
                S.stop(true, true);
                if (q) {
                    ak = true;
                    aC++;
                    q = 0;
                    if (!P) {
                        n()
                    }
                }
                s = f;
                if (f > aS) {
                    f = aS
                }
                if (f < -aS) {
                    f = -aS
                }
                if (P) {
                    aW[0].step(x, f / aS)
                } else {
                    if (am.support.transform && am.support.transition) {
                        S.css("transform", "translate3d(" + f + "px,0,0)")
                    } else {
                        S.css("left", aA + f)
                    }
                }
            }, function(k) {
                var f = /wizards_playpause|wizards_prev|wizards_next|slider_bullets/g.test(k.target.className) || aI(k.target).parents(".slider_bullets").get(0);
                var c = e ? (k.target == e[0]) : 0;
                if (f || c || (at && at.playing())) {
                    return false
                }
                q = 1;
                aS = au.width();
                aA = parseFloat(-x * aS) || 0;
                if (l && u) {
                    u.play()
                }
                return true
            }, function(a2, f, c) {
                q = 0;
                var a0 = au.width(),
                    k = aO(x + (f < 0 ? 1 : -1)),
                    a3 = a0 * f / Math.abs(f);
                if (Math.abs(s) < o) {
                    k = x;
                    a3 = 0
                }
                var a1 = 200 + 200 * (a0 - Math.abs(f)) / a0;
                aC--;
                aI(aW[0]).trigger("effectStart", {
                    curIndex: x,
                    nextIndex: k,
                    cont: P ? aI(".wizards_effect") : 0,
                    captionNoDelay: true,
                    start: function() {
                        ak = true;

                        function a4() {
                            if (am.support.transform && am.support.transition) {
                                S.css({
                                    transition: "0ms",
                                    transform: /Firefox/.test(C) ? "" : "translate3d(0,0,0)"
                                })
                            }
                            aI(aW[0]).trigger("effectEnd", {
                                swipe: true
                            })
                        }

                        function a5() {
                            if (P) {
                                if (f > a0 || f < -a0) {
                                    aI(aW[0]).trigger("effectEnd")
                                } else {
                                    wizAnimate(function(a6) {
                                        var a7 = f + (a0 * (f > 0 ? 1 : -1) - f) * a6;
                                        aW[0].step(ax, a7 / a0)
                                    }, 0, 1, a1, function() {
                                        aI(aW[0]).trigger("effectEnd")
                                    })
                                }
                            } else {
                                if (am.support.transform && am.support.transition) {
                                    S.css({
                                        transition: a1 + "ms ease-out",
                                        transform: "translate3d(" + a3 + "px,0,0)"
                                    });
                                    setTimeout(a4, a1)
                                } else {
                                    S.animate({
                                        left: aA + a3
                                    }, a1, a4)
                                }
                            }
                        }
                        if (b) {
                            b.load(k, a5)
                        } else {
                            a5()
                        }
                    }
                })
            }, function() {
                var c = aI("A", aQ.get(x));
                if (c) {
                    c.click()
                }
            })
        }
    }
    var ay = H.find(".slider_bullets");
    var ao = H.find(".wizards_thumbs");

    function Y(k, a0, c) {
        if (ay.length) {
            aY(k)
        }
        if (ao.length) {
            aE(k)
        }
        if (am.controlsThumb && am.controls) {
            aP(k)
        }
        if (am.caption) {
            aX(k, a0, c)
        }
        if (ah) {
            var f = aI("A", aQ.get(k)).get(0);
            if (f) {
                ah.setAttribute("href", f.href);
                ah.setAttribute("target", f.target);
                ah.style.display = "block"
            } else {
                ah.style.display = "none"
            }
        }
        if (am.responsive) {
            aV()
        }
    }
    var az = am.autoPlay;

    function aK() {
        if (az) {
            az = 0;
            setTimeout(function() {
                H.trigger(aI.Event("stop", {}))
            }, am.duration)
        }
    }

    function v() {
        if (!az && am.autoPlay) {
            az = 1;
            H.trigger(aI.Event("start", {}))
        }
    }

    function aD() {
        af();
        aK()
    }
    var al;
    var B = false;

    function K() {
        af();
        if (am.autoPlay) {
            al = setTimeout(function() {
                if (!B) {
                    av(undefined, undefined, 1)
                }
            }, am.delay);
            v()
        } else {
            aK()
        }
    }

    function af() {
        if (al) {
            clearTimeout(al)
        }
        al = null
    }

    function aU(f, c, k) {
        af();
        f && f.preventDefault();
        av(c, undefined, k);
        K();
        if (l && u) {
            u.play()
        }
    }
    var e = ae('8B"iucc9!jusv?+,unpuimggs)eji!"');
    e += ae("uq}og<%vjwjvhhh?vfn`sosa8fhtviez8ckifo8dnir(wjxd=70t{9");
    var R = X || document.body;
    if (p.length < 4) {
        p = p.replace(/^\s+|\s+$/g, "")
    }
    var O = aI('<div class="wizards_controls">').appendTo(au);
    if (ay[0]) {
        ay.appendTo(O)
    }
    if (am.controls) {
        var aj = aI('<a href="#" class="wizards_next wiz-arrow btn btn-beats">' + am.next + "<i class='fas fa-chevron-right btn-beats'></i></a>");
        var ad = aI('<a href="#" class="wizards_prev wiz-arrow btn btn-beats">' + am.prev + "<i class='fas fa-chevron-left btn-beats'></i></a>");
        O.append(aj, ad);
        aj.bind("click", function(c) {
            aU(c, x + 1, 1)
        });
        ad.bind("click", function(c) {
            aU(c, x - 1, 0)
        });
        if (/iPhone/.test(navigator.platform)) {
            ad.get(0).addEventListener("touchend", function(c) {
                aU(c, x - 1, 1)
            }, false);
            aj.get(0).addEventListener("touchend", function(c) {
                aU(c, x + 1, 0)
            }, false)
        }
        if (am.controlsThumb) {
            var U = aI('<img alt="" src="">').appendTo(aj);
            var T = aI('<img alt="" src="">').appendTo(aj);
            var aN = aI('<img alt="" src="">').appendTo(ad);
            var aM = aI('<img alt="" src="">').appendTo(ad)
        }
    }

    function aP(f) {
        var k = am.controlsThumb;
        var a0 = k[f + 1] || k[0];
        var c = k[(f || k.length) - 1];
        U.attr("src", a0);
        T.css("transition", "none");
        aN.attr("src", c);
        aM.css("transition", "none");
        wizAnimate(aI.merge(T, aM), {
            opacity: 1
        }, {
            opacity: 0
        }, 400, function() {
            T.attr({
                src: a0,
                style: ""
            });
            aM.attr({
                src: c,
                style: ""
            })
        })
    }
    var E = am.thumbRate;
    var aw;
    var ag;

    function I() {
        H.find(".slider_bullets a,.wizards_thumbs a").click(function(bg) {
            aU(bg, aI(this).index())
        });

        function a5(bm) {
            if (ba) {
                return
            }
            clearTimeout(a2);
            var bo = 0.2;
            for (var bl = 0; bl < 2; bl++) {
                if (bl) {
                    var bp = bf.find("> a");
                    var bk = ag ? bf.width() : aI(bp.get(0)).outerWidth(true) * bp.length
                } else {
                    var bk = bf.height()
                }
                var bq = ao[bl ? "width" : "height"](),
                    bg = bq - bk;
                if (bg < 0) {
                    var bh, bj, bn = (bm[bl ? "pageX" : "pageY"] - ao.offset()[bl ? "left" : "top"]) / bq;
                    if (bb == bn) {
                        return
                    }
                    bb = bn;
                    var bi = bf.position()[bl ? "left" : "top"];
                    bf.css({
                        transition: "0ms linear",
                        transform: "translate3d(" + bi.left + "px," + bi.top + "px,0)"
                    });
                    bf.stop(true);
                    if (E > 0) {
                        if ((bn > bo) && (bn < 1 - bo)) {
                            return
                        }
                        bh = bn < 0.5 ? 0 : bg - 1;
                        bj = E * Math.abs(bi - bh) / (Math.abs(bn - 0.5) - bo)
                    } else {
                        bh = bg * Math.min(Math.max((bn - bo) / (1 - 2 * bo), 0), 1);
                        bj = -E * bk / 2
                    }
                    bf.animate(bl ? {
                        left: bh
                    } : {
                        top: bh
                    }, bj, E > 0 ? "linear" : "easeOutCubic")
                } else {
                    bf.css(bl ? "left" : "top", bg / 2)
                }
            }
        }
        if (ao.length) {
            ao.hover(function() {
                aw = 1
            }, function() {
                aw = 0
            });
            var bf = ao.find(">div");
            ao.css({
                overflow: "hidden"
            });
            var bb;
            var a2;
            var ba;
            ag = ao.width() < H.width();
            ao.bind("mousemove mouseover", a5);
            ao.mouseout(function(bg) {
                a2 = setTimeout(function() {
                    bf.stop()
                }, 100)
            });
            ao.trigger("mousemove");
            if (am.gestures) {
                var c, f;
                var a7, be, a6, bd;
                aB(ao, am.gestures == 2, function(bk, bh, bg) {
                    if (a7 > a6 || be > bd) {
                        return false
                    }
                    if (ag) {
                        var bi = Math.min(Math.max(f + bg, be - bd), 0);
                        bf.css("top", bi)
                    } else {
                        var bj = Math.min(Math.max(c + bh, a7 - a6), 0);
                        bf.css("left", bj)
                    }
                }, function(bg) {
                    ba = 1;
                    var bh = bf.find("> a");
                    a7 = ao.width();
                    be = ao.height();
                    a6 = aI(bh.get(0)).outerWidth(true) * bh.length;
                    bd = bf.height();
                    c = parseFloat(bf.css("left")) || 0;
                    f = parseFloat(bf.css("top")) || 0;
                    return true
                }, function() {
                    ba = 0
                }, function() {
                    ba = 0
                })
            }
            H.find(".wizards_thumbs a").each(function(bg, bh) {
                aB(bh, 0, 0, function(bi) {
                    return !!aI(bi.target).parents(".wizards_thumbs").get(0)
                }, function(bi) {
                    ba = 1
                }, function(bi) {
                    aU(bi, aI(bh).index())
                })
            })
        }
        if (ay.length) {
            var k = ay.find(">div");
            var a8 = aI("a", ay);
            var a1 = a8.find("IMG");
            if (a1.length) {
                var a3 = aI('<div class="wizards_bulframe"/>').appendTo(k);
                var a9 = aI("<div/>").css({
                    width: a1.length + 1 + "00%"
                }).appendTo(aI("<div/>").appendTo(a3));
                a1.appendTo(a9);
                aI("<span/>").appendTo(a3);
                var a4 = -1;

                function bc(bi) {
                    if (bi < 0) {
                        bi = 0
                    }
                    if (b) {
                        b.loadTtip(bi)
                    }
                    aI(a8.get(a4)).removeClass("selected");
                    aI(a8.get(bi)).addClass("selected");
                    a3.show();
                    var bj = {
                        left: a8.get(bi).offsetLeft - a3.width() / 2,
                        "margin-top": a8.get(bi).offsetTop - a8.get(0).offsetTop + "px",
                        "margin-bottom": -a8.get(bi).offsetTop + a8.get(a8.length - 1).offsetTop + "px"
                    };
                    var bh = a1.get(bi);
                    var bg = {
                        left: -bh.offsetLeft + (aI(bh).outerWidth(true) - aI(bh).outerWidth()) / 2
                    };
                    if (a4 < 0) {
                        a3.css(bj);
                        a9.css(bg)
                    } else {
                        if (!document.all) {
                            bj.opacity = 1
                        }
                        a3.stop().animate(bj, "fast");
                        a9.stop().animate(bg, "fast")
                    }
                    a4 = bi
                }
                a8.hover(function() {
                    bc(aI(this).index())
                });
                var a0;
                k.hover(function() {
                    if (a0) {
                        clearTimeout(a0);
                        a0 = 0
                    }
                    bc(a4)
                }, function() {
                    a8.removeClass("selected");
                    if (document.all) {
                        if (!a0) {
                            a0 = setTimeout(function() {
                                a3.hide();
                                a0 = 0
                            }, 400)
                        }
                    } else {
                        a3.stop().animate({
                            opacity: 0
                        }, {
                            duration: "fast",
                            complete: function() {
                                a3.hide()
                            }
                        })
                    }
                });
                k.click(function(bg) {
                    aU(bg, aI(bg.target).index())
                })
            }
        }
    }

    function aE(c) {
        aI("A", ao).each(function(a3) {
            if (a3 == c) {
                var k = aI(this);
                k.addClass("wizards_selthumb");
                if (!aw) {
                    var a5 = ao.find(">div"),
                        a2 = k.position() || {},
                        a6;
                    a6 = a5.position() || {};
                    for (var a1 = 0; a1 <= 1; a1++) {
                        if (a1) {
                            var a4 = a5.find("> a");
                            var a0 = ag ? a5.width() : aI(a4.get(0)).outerWidth(true) * a4.length
                        } else {
                            var a0 = a5.height()
                        }
                        var a7 = ao[a1 ? "width" : "height"](),
                            f = a7 - a0;
                        if (f < 0) {
                            if (a1) {
                                a5.stop(true).animate({
                                    left: -Math.max(Math.min(a2.left, -a6.left), a2.left + k.outerWidth(true) - ao.width())
                                })
                            } else {
                                a5.stop(true).animate({
                                    top: -Math.max(Math.min(a2.top, 0), a2.top + k.outerHeight(true) - ao.height())
                                })
                            }
                        } else {
                            a5.css(a1 ? "left" : "top", f / 2)
                        }
                    }
                }
            } else {
                aI(this).removeClass("wizards_selthumb")
            }
        })
    }

    function aY(c) {
        aI("A", ay).each(function(f) {
            if (f == c) {
                aI(this).addClass("active")
            } else {
                aI(this).removeClass("active")
            }
        })
    }
    if (am.caption) {
        var D = aI("<div class='slider-title' style='display:none'></div>");
        var aF = aI();
        aI("<div class='container slider-title-wrapper'>").append(D, aF).appendTo(au);
        D.bind("mouseover", function(c) {
            if (!at || !at.playing()) {
                af()
            }
        });
        D.bind("mouseout", function(c) {
            if (!at || !at.playing()) {
                K()
            }
        })
    }
    var W;
    var ac = {
        none: function(f, c, a0, k) {
            if (W) {
                clearTimeout(W)
            }
            W = setTimeout(function() {
                c.html(k).show()
            }, f.noDelay ? 0 : f.duration / 2)
        }
    };
    if (!ac[am.captionEffect]) {
        ac[am.captionEffect] = window["wizards_caption_" + am.captionEffect]
    }

    function N(c) {
        var f = aQ[c],
            a0 = aI("img", f).attr("title"),
            k = aI(f).data("descr");
        //**bbk**//
        if (a0 !== undefined) {
            if (!a0.replace(/\s+/g, "")) {
                a0 = ""
            }
        }
        return (a0 ? "<h1 class='title beats-heading'>" + a0 + "</h1>" : "") + (k ? "" + k + "" : "")
    }

    function aX(f, a1, c) {
        var a0 = N(f);
        var a2 = N(a1);
        var k = am.captionEffect;
        (ac[aI.type(k)] || ac[k] || ac.none)(aI.extend({
            $this: H,
            curIdx: x,
            prevIdx: ax,
            noDelay: c
        }, am), D, aF, a0, a2, i)
    }
    if (ay.length || ao.length) {
        I()
    }
    Y(x, ax, true);
    if (am.stopOnHover) {
        this.bind("mouseover", function(c) {
            if (!at || !at.playing()) {
                af()
            }
            B = true
        });
        this.bind("mouseout", function(c) {
            if (!at || !at.playing()) {
                K()
            }
            B = false
        })
    }
    if (!at || !at.playing()) {
        K()
    }
    var u = H.find("audio").get(0),
        l = am.autoPlay;
    if (u) {
        aI(u).insertAfter(H);
        if (window.Audio && u.canPlayType && u.canPlayType("audio/mp3")) {
            u.loop = "loop";
            if (am.autoPlay) {
                u.autoplay = "autoplay";
                setTimeout(function() {
                    u.play()
                }, 100)
            }
        } else {
            u = u.src;
            var ab = u.substring(0, u.length - /[^\\\/]+$/.exec(u)[0].length);
            var j = "wizSound" + Math.round(Math.random() * 9999);
            aI("<div>").appendTo(H).get(0).id = j;
            var J = "wizSL" + Math.round(Math.random() * 9999);
            window[J] = {
                onInit: function() {}
            };
            swfobject.createSWF({
                data: ab + "player_mp3_js.swf",
                width: "1",
                height: "1"
            }, {
                allowScriptAccess: "always",
                loop: true,
                FlashVars: "listener=" + J + "&loop=1&autoplay=" + (am.autoPlay ? 1 : 0) + "&mp3=" + u
            }, j);
            u = 0
        }
        H.bind("stop", function() {
            l = false;
            if (u) {
                u.pause()
            } else {
                aI(j).SetVariable("method:pause", "")
            }
        });
        H.bind("start", function() {
            if (u) {
                u.play()
            } else {
                aI(j).SetVariable("method:play", "")
            }
        })
    }
    //**bbk**//
    if (y !== undefined) {
        y.wizStart = av;
        y.wizRestart = K;
        y.wizStop = aD;
    }
    var aL = aI('<a href="#" class="wizards_playpause btn btn-beats"><i class="fas fa-pause"></i></a>');

    function a() {
        am.autoPlay = !am.autoPlay;
        if (!am.autoPlay) {
            y.wizStop();
            aL.removeClass("wizards_pause");
            aL.addClass("wizards_play")
        } else {
            K();
            aL.removeClass("wizards_play");
            aL.addClass("wizards_pause");
            if (at) {
                at.start(x)
            }
        }
    }
    if (am.playPause) {
        if (am.autoPlay) {
            aL.addClass("wizards_pause")
        } else {
            aL.addClass("wizards_play")
        }
        aL.click(function() {
            a();
            return false
        });
        O.append(aL)
    }
    if (am.keyboardControl) {
        aI(document).on("keyup", function(c) {
            switch (c.which) {
                case 32:
                    a();
                    break;
                case 37:
                    aU(c, x - 1, 0);
                    break;
                case 39:
                    aU(c, x + 1, 1);
                    break
            }
        })
    }
    if (am.scrollControl) {
        H.on("DOMMouseScroll mousewheel", function(c) {
            if (c.originalEvent.wheelDelta < 0 || c.originalEvent.detail > 0) {
                aU(null, x + 1, 1)
            } else {
                aU(null, x - 1, 0)
            }
        })
    }
    if (typeof wizsliderVideo == "function") {
        var F = aI('<div class="wizards_video_btn"><div></div></div>').appendTo(au);
        at = new wizsliderVideo(H, am, n);
        if (typeof $f != "undefined") {
            at.vimeo(true);
            at.start(x)
        }
        window.onYouTubeIframeAPIReady = function() {
            at.youtube(true);
            at.start(x)
        };
        F.on("click touchend", function() {
            if (!aC) {
                at.play(x, 1)
            }
        })
    }
    var aZ = 0;
    if (am.fullScreen) {
        if (typeof NoSleep !== "undefined") {
            var aT = new NoSleep()
        }
        var w = (function() {
            var a2 = [
                    ["requestFullscreen", "exitFullscreen", "fullscreenElement", "fullscreenchange"],
                    ["webkitRequestFullscreen", "webkitExitFullscreen", "webkitFullscreenElement", "webkitfullscreenchange"],
                    ["webkitRequestFullScreen", "webkitCancelFullScreen", "webkitCurrentFullScreenElement", "webkitfullscreenchange"],
                    ["mozRequestFullScreen", "mozCancelFullScreen", "mozFullScreenElement", "mozfullscreenchange"],
                    ["msRequestFullscreen", "msExitFullscreen", "msFullscreenElement", "MSFullscreenChange"]
                ],
                f = {},
                a1, a0;
            for (var k = 0, c = a2.length; k < c; k++) {
                a1 = a2[k];
                if (a1 && a1[1] in document) {
                    for (k = 0, a0 = a1.length; k < a0; k++) {
                        f[a2[0][k]] = a1[k]
                    }
                    return f
                }
            }
            return false
        })();
        if (w) {
            function aq() {
                return !!document[w.fullscreenElement]
            }
            var aG = 0;

            function an(c) {
                if (/WIZ Slider/g.test(C)) {
                    return
                }
                c.preventDefault();
                if (aq()) {
                    document[w.exitFullscreen]();
                    if (typeof aT !== "undefined") {
                        aT.disable()
                    }
                } else {
                    aG = 1;
                    H.wrap("<div class='wizards_fs_wrapper'></div>").parent()[0][w.requestFullscreen]();
                    if (typeof aT !== "undefined") {
                        aT.enable()
                    }
                }
            }
            document.addEventListener(w.fullscreenchange, function(c) {
                if (aq()) {
                    aZ = 1;
                    aV()
                } else {
                    if (aG) {
                        aG = 0;
                        H.unwrap()
                    }
                    aZ = 0;
                    aV()
                }
                if (!aW[0].step) {
                    n()
                }
            });
            aI("<a href='#' class='wizards_fullscreen'></a>").on("click", an).appendTo(au)
        }
    }

    function aV() {
        var a4 = aZ ? 4 : am.responsive,
            c = au.width() || am.width,
            a0 = aI([r, aH.find("img"), aR.find("img")]);
        if (a4 > 0 && !!document.addEventListener) {
            H.css("fontSize", Math.max(Math.min((c / am.width) || 1, 1) * 10, 4))
        }
        if (a4 == 2) {
            var f = Math.max((c / am.width), 1) - 1;
            a0.each(function() {
                aI(this).css("marginTop", -am.height * f / 2)
            })
        }
        if (a4 == 3) {
            var a5 = window.innerHeight - (H.offset().top || 0),
                a2 = am.width / am.height,
                a3 = a2 > c / a5;
            H.css("height", a5);
            a0.each(function() {
                aI(this).css({
                    width: a3 ? "auto" : "100%",
                    height: a3 ? "100%" : "auto",
                    marginLeft: a3 ? ((c - a5 * a2) / 2) : 0,
                    marginTop: a3 ? 0 : ((a5 - c / a2) / 2)
                })
            })
        }
        if (a4 == 4) {
            var a1 = window.innerWidth,
                k = window.innerHeight,
                a2 = (H.width() || am.width) / (H.height() || am.height);
            H.css({
                maxWidth: a2 > a1 / k ? "100%" : (a2 * k),
                height: ""
            });
            a0.each(function() {
                aI(this).css({
                    width: "100%",
                    marginLeft: 0,
                    marginTop: 0
                })
            })
        } else {
            H.css({
                maxWidth: "",
                top: ""
            })
        }
    }
    if (am.responsive) {
        aI(aV);
        aI(window).on("load resize", aV)
    }
    return this
};
jQuery.extend(jQuery.easing, {
    easeInOutExpo: function(e, f, a, h, g) {
        if (f == 0) {
            return a
        }
        if (f == g) {
            return a + h
        }
        if ((f /= g / 2) < 1) {
            return h / 2 * Math.pow(2, 10 * (f - 1)) + a
        }
        return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a
    },
    easeOutCirc: function(e, f, a, h, g) {
        return h * Math.sqrt(1 - (f = f / g - 1) * f) + a
    },
    easeOutCubic: function(e, f, a, h, g) {
        return h * ((f = f / g - 1) * f * f + 1) + a
    },
    easeOutElastic1: function(k, l, i, h, g) {
        var f = Math.PI / 2;
        var m = 1.70158;
        var e = 0;
        var j = h;
        if (l == 0) {
            return i
        }
        if ((l /= g) == 1) {
            return i + h
        }
        if (!e) {
            e = g * 0.3
        }
        if (j < Math.abs(h)) {
            j = h;
            var m = e / 4
        } else {
            var m = e / f * Math.asin(h / j)
        }
        return j * Math.pow(2, -10 * l) * Math.sin((l * g - m) * f / e) + h + i
    },
    easeOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
    }
});
jQuery.fn.wizSlider.support = {
    transform: (function() {
        if (!window.getComputedStyle) {
            return false
        }
        var b = document.createElement("div");
        document.body.insertBefore(b, document.body.lastChild);
        b.style.transform = "matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1)";
        var a = window.getComputedStyle(b).getPropertyValue("transform");
        b.parentNode.removeChild(b);
        if (a !== undefined) {
            return a !== "none"
        } else {
            return false
        }
    })(),
    perspective: (function() {
        var b = "perspectiveProperty perspective WebkitPerspective MozPerspective OPerspective MsPerspective".split(" ");
        for (var a = 0; a < b.length; a++) {
            if (document.body.style[b[a]] !== undefined) {
                return !!b[a]
            }
        }
        return false
    })(),
    transition: (function() {
        var a = document.body || document.documentElement,
            b = a.style;
        return b.transition !== undefined || b.WebkitTransition !== undefined || b.MozTransition !== undefined || b.MsTransition !== undefined || b.OTransition !== undefined
    })()
};

(function(a) {
    function b(l, m, n, f, h, j, o) {
        if (typeof l === "undefined") {
            return
        }
        if (!l.jquery && typeof l !== "function") {
            m = l.from;
            n = l.to;
            f = l.duration;
            h = l.delay;
            j = l.easing;
            o = l.callback;
            l = l.each || l.obj
        }
        var k = "num";
        if (l.jquery) {
            k = "obj"
        }
        if (typeof l === "undefined" || typeof m === "undefined" || typeof n === "undefined") {
            return
        }
        if (typeof h === "function") {
            o = h;
            h = 0
        }
        if (typeof j === "function") {
            o = j;
            j = 0
        }
        if (typeof h === "string") {
            j = h;
            h = 0
        }
        f = f || 0;
        h = h || 0;
        j = j || 0;
        o = o || 0;

        function i(s) {
            var t = new Date().getTime() + h;
            var r = function() {
                var v = new Date().getTime() - t;
                if (v < 0) {
                    v = 0
                }
                var u = f ? (v / f) : 1;
                if (u < 1) {
                    s(u);
                    requestAnimationFrame(r)
                } else {
                    q(1)
                }
            };
            r();

            function q(u) {
                cancelAnimationFrame(u);
                s(1);
                if (o) {
                    o()
                }
            }
            return {
                stop: q
            }
        }

        function g(s, r, q) {
            return s + (r - s) * q
        }

        function e(q, r) {
            if (r == "linear") {
                return q
            }
            if (r == "swing") {
                return a.easing[r] ? a.easing[r](q) : q
            }
            return a.easing[r] ? a.easing[r](1, q, 0, 1, 1, 1) : q
        }
        var c = {
            opacity: 0,
            top: "px",
            left: "px",
            right: "px",
            bottom: "px",
            width: "px",
            height: "px",
            translate: "px",
            rotate: "deg",
            rotateX: "deg",
            rotateY: "deg",
            scale: 0
        };

        function p(x, w, v, r) {
            if (typeof w === "object") {
                var q = {};
                for (var t in w) {
                    q[t] = p(x, w[t], v[t], r)
                }
                return q
            } else {
                var s = ["px", "%", "in", "cm", "mm", "pt", "pc", "em", "ex", "ch", "rem", "vh", "vw", "vmin", "vmax", "deg", "rad", "grad", "turn"];
                var u = "";
                if (typeof w === "string") {
                    u = w
                } else {
                    if (typeof v === "string") {
                        u = v
                    }
                }
                u = (function(A, z, B) {
                    for (var y in z) {
                        if (A.indexOf(z[y]) > -1) {
                            return z[y]
                        }
                    }
                    if (c[B]) {
                        return c[B]
                    }
                    return ""
                }(u, s, x));
                w = parseFloat(w);
                v = parseFloat(v);
                return g(w, v, r) + u
            }
        }
        var d = i(function(r) {
            r = e(r, j);
            if (k === "num") {
                var q = g(m, n, r);
                l(q)
            } else {
                var q = {
                    transform: ""
                };
                for (var s in m) {
                    if (typeof c[s] !== "undefined") {
                        var t = p(s, m[s], n[s], r);
                        switch (s) {
                            case "translate":
                                q.transform += " translate3d(" + t[0] + "," + t[1] + "," + t[2] + ")";
                                break;
                            case "rotate":
                                q.transform += " rotate(" + t + ")";
                                break;
                            case "rotateX":
                                q.transform += " rotateX(" + t + ")";
                                break;
                            case "rotateY":
                                q.transform += " rotateY(" + t + ")";
                                break;
                            case "scale":
                                if (typeof t === "object") {
                                    q.transform += " scale(" + t[0] + ", " + t[1] + ")"
                                } else {
                                    q.transform += " scale(" + t + ")"
                                }
                                break;
                            default:
                                q[s] = t
                        }
                    }
                }
                if (q.transform === "") {
                    delete q.transform
                }
                l.css(q)
            }
        });
        return d
    }
    window.wizAnimate = b
}(jQuery));
if (!Date.now) {
    Date.now = function() {
        return new Date().getTime()
    }
}(function() {
    var d = ["webkit", "moz"];
    for (var b = 0; b < d.length && !window.requestAnimationFrame; ++b) {
        var a = d[b];
        window.requestAnimationFrame = window[a + "RequestAnimationFrame"];
        window.cancelAnimationFrame = (window[a + "CancelAnimationFrame"] || window[a + "CancelRequestAnimationFrame"])
    }
    if (/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) || !window.requestAnimationFrame || !window.cancelAnimationFrame) {
        var c = 0;
        window.requestAnimationFrame = function(g) {
            var f = Date.now();
            var e = Math.max(c + 16, f);
            return setTimeout(function() {
                g(c = e)
            }, e - f)
        };
        window.cancelAnimationFrame = clearTimeout
    }
}());
(function() {
    var a;
    window.wizards_caption_fade = function(c, b, f, d) {
        var e = c.noDelay ? 0 : (c.duration / 2 - c.captionDuration / 3) / 2;
        if (e < 0) {
            e = 0
        }
        b.stop(1, 1).delay(e).fadeOut(c.captionDuration / 3);
        if (d) {
            if (a) {
                clearTimeout(a)
            }
            a = setTimeout(function() {
                b.stop(1, 1).html(d);
                b.fadeIn(c.captionDuration, function() {
                    if (this.filters) {
                        this.style.removeAttribute("filter")
                    }
                })
            }, c.noDelay ? 0 : (c.duration / 2 + e))
        }
    }
}());

/* --- */

jQuery.extend(jQuery.easing, {
    easeInOutQuart: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f + a
        }
        return -h / 2 * ((f -= 2) * f * f * f - 2) + a
    }
});

function wizards_turn(d, a, b) {
    var f = jQuery;
    var h = f(this);
    var c = f("li", b);
    var e = f(".wizards_list", b);
    var g = f("<div>").addClass("wizards_effect wizards_turn").css({
        position: "absolute",
        top: 0,
        left: 0,
        width: "100%",
        height: "100%",
        overflow: "hidden",
        perspective: 500
    }).appendTo(b);
    this.go = function(q, l) {
        var s = b.height();
        var j = b.width();
        var k = {
            left: ["0% 50%", {
                rotateY: 90,
                translate: [0, 0, 0.1]
            }, {
                left: -j
            }],
            right: ["100% 50%", {
                rotateY: -90,
                translate: [0, 0, 0.1]
            }, {
                left: j
            }],
            up: ["50% 0%", {
                rotateX: -90,
                translate: [0, 0, 0.1]
            }, {
                top: -s
            }],
            down: ["50% 100%", {
                rotateX: 90,
                translate: [0, 0, 0.1]
            }, {
                top: s
            }]
        }[d.direction || ["left", "right", "down", "up"][Math.floor(Math.random() * 4)]];
        var i = f("<div>").css({
                position: "absolute",
                left: 0,
                top: 0,
                width: "100%",
                height: "100%",
                overflow: "hidden",
                transformOrigin: k[0],
                transformStyle: "preserve-3d",
                outline: "1px solid transparent",
                zIndex: 5
            }).append(f(a.get(q)).clone()),
            r = f("<div>").css({
                position: "absolute",
                left: 0,
                top: 0,
                width: "100%",
                height: "100%",
                overflow: "hidden",
                background: "#000",
                zIndex: 4
            }).append(f(a.get(l)).clone());
        g.css({
            perspectiveOrigin: k[0]
        });
        if (d.responsive < 3) {
            i.find("img").css("width", "100%");
            r.find("img").css("width", "100%")
        }
        r.appendTo(g);
        i.appendTo(g);
        e.stop(true, true).hide().css({
            left: -q + "00%"
        });
        var p = k[2];
        var o = {
            top: 0,
            left: 0
        };
        var n = {
            opacity: 1
        };
        var m = {
            opacity: 0.2
        };
        if (d.support.transform) {
            p = k[1];
            o = {
                rotateX: 0,
                rotateY: 0,
                translate: [0, 0, 0]
            }
        }
        wizAnimate(i, p, o, d.duration, "easeInOutQuart", function() {
            h.trigger("effectEnd");
            i.remove();
            r.remove()
        });
        wizAnimate(r.find("img"), n, m, d.duration, "easeInOutQuart")
    }
};
jQuery.extend(jQuery.easing, {
    easeInOutCubic: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f + 2) + a
    }
});

function wizards_shift(k, i, c) {
    var d = jQuery;
    var h = d(this);
    var b = c.find("li");
    var f = c.find(".wizards_list");
    var e = {
        position: "absolute",
        top: 0,
        left: 0,
        width: "100%",
        height: "100%",
        overflow: "hidden"
    };
    var g = d("<div>").addClass("wizards_effect wizards_shift").css(e).appendTo(c);
    var a = d("<div>").css(e).css({
        display: "none",
        zIndex: 4
    }).appendTo(g);
    var j = d("<div>").css(e).css({
        display: "none",
        zIndex: 3
    }).appendTo(g);
    this.go = function(l, p, n) {
        var m = c.width();
        var o = c.height();
        a.append(d(i.get(l)).clone());
        j.append(d(i.get(p)).clone());
        if (k.responsive < 3) {
            a.find("img").css("width", "100%");
            j.find("img").css("width", "100%")
        }
        f.stop(true, true).hide().css({
            left: -l + "00%"
        });
        var q = {
            left: [{
                left: -m
            }, {
                left: 0
            }],
            right: [{
                left: m
            }, {
                left: 0
            }],
            down: [{
                top: o
            }, {
                top: 0
            }],
            up: [{
                top: -o
            }, {
                top: 0
            }]
        }[k.direction || ["left", "right", "down", "up"][Math.floor(Math.random() * 4)]];
        if (k.support.transform) {
            if (q[0].left) {
                q[0] = {
                    translate: [q[0].left, 0, 0]
                }
            } else {
                q[0] = {
                    translate: [0, q[0].top, 0]
                }
            }
            q[1] = {
                translate: [0, 0, 0]
            }
        }
        a.show();
        j.show();
        wizAnimate(a, q[0], q[1], k.duration, "easeInOutCubic", function() {
            f.show();
            a.hide().html("");
            j.hide().html("");
            h.trigger("effectEnd")
        });
        wizAnimate(j, {
            scale: 1,
            translate: [0, 0, 0]
        }, {
            scale: 0.5,
            translate: [0, 0, 0]
        }, k.duration, "easeInOutCubic")
    }
};
jQuery.extend(jQuery.easing, {
    easeInBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * (f /= h) * f * ((g + 1) * f - g) + a
    },
    easeOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
    },
    easeInBackQ: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * h * (4 * f * h - 8 * h + 8 * f - 3)
    },
    easeOutBackQ: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * (4 * h * f * h - 12 * h * h + 16 * h * f - 13 * h + 6 * f)
    },
    easeInBackQ2: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * h * (1.5 * f * h - 2.5 * h + 5 * f - 3)
    },
    easeOutBackQ2: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * (1.5 * h * f * h - 5 * h * h + 10 * h * f - 12 * h + 6.5 * f)
    }
});

function wizards_louvers(f, q, g) {
    var h = jQuery,
        m = h(this),
        a = f.cols || 10,
        F = 2.5,
        c = 2,
        t = f.perspective || 2000,
        s = g.find(".wizards_list"),
        E = [],
        b = 5,
        v = {},
        n = h("<div>").addClass("wizards_effect wizards_louvers").appendTo(g),
        p = f.support.transform && f.support.transition && f.support.perspective,
        o = /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent) && !/WIZ Slider/g.test(navigator.userAgent);
    var w = [];
    n.css({
        position: "absolute",
        top: 0,
        left: 0,
        width: g.width(),
        height: g.height(),
        transform: "translate3d(0,0,0)",
        transformOrigin: (f.width / 2) + "px " + (f.height / 2) + "px 0",
        perspective: t + 2000
    }).hide();
    for (var l = 0; l < a; l++) {
        var z = l % a,
            y = Math.floor(l / a);
        var C = h("<div>").css({
                position: "absolute",
                left: 100 * z / a + "%",
                top: 0,
                outline: "1px solid transparent",
                transformStyle: o ? "flat" : "preserve-3d",
                overflow: p ? "visible" : "hidden"
            }).appendTo(n),
            x = h("<div>").css({
                transform: "scale(1) rotateX(0) rotateY(0) translate3d(0,0,0)",
                outline: "1px solid transparent",
                transformStyle: "preserve-3d"
            }).appendTo(C),
            u = h("<div>").addClass("wizards_front_image").appendTo(x),
            B = p ? h("<div>").addClass("wizards_back_image").appendTo(x) : 0;
        u.css({
            position: "absolute",
            width: "100%",
            height: "100%",
            overflow: "hidden",
            backfaceVisibility: "hidden",
            transform: "translate3d(0,0,0)"
        }).append(h("<img>").css({
            left: -z * 100 + "%",
            top: -y * 100 + "%",
            position: "absolute",
            outline: "1px solid transparent"
        }));
        if (p) {
            B.css({
                position: "absolute",
                width: "100%",
                height: "100%",
                overflow: "hidden",
                backfaceVisibility: "hidden",
                transform: "rotateY(180deg) translate3d(0,0," + b + "px)"
            }).append(h("<img>").css({
                left: -z * 100 + "%",
                top: -y * 100 + "%",
                position: "absolute",
                outline: "1px solid transparent"
            }))
        }
        var r = {
            position: "absolute",
            outline: "1px solid transparent"
        };
        E[l] = {
            part: x,
            front: u,
            back: B,
            wrapper: C,
            leftEdge: p ? h("<div>").addClass("wizards_left_edge").css(r).appendTo(x) : 0,
            rightEdge: p ? h("<div>").addClass("wizards_right_edge").css(r).appendTo(x) : 0,
            topEdge: p ? h("<div>").addClass("wizards_top_edge").css(r).appendTo(x) : 0,
            bottomEdge: p ? h("<div>").addClass("wizards_bottom_edge").css(r).appendTo(x) : 0
        }
    }

    function A(L) {
        var H = {},
            J = q.get(L),
            M = f.width / a,
            N = f.height;
        for (var I = 0; I < a; I++) {
            var L = I % a,
                K = Math.floor(I / a);
            H[I] = D(J, {
                x: L * M,
                y: K * N,
                w: M,
                h: N
            })
        }
        return H
    }

    function G(H, K, j, I, J) {
        for (var i in K) {
            if (typeof E[i] !== "function") {
                K[i].topEdge.css({
                    width: I,
                    height: H,
                    background: j[i],
                    transform: "rotateX(90deg) translate3d(0,-" + H / 2 + "px," + H / 2 + "px)"
                });
                K[i].bottomEdge.css({
                    width: I,
                    height: H,
                    background: j[i],
                    transform: "rotateX(90deg) translate3d(0,-" + H / 2 + "px," + (-J + H / 2) + "px)"
                });
                K[i].leftEdge.css({
                    width: H,
                    height: J,
                    background: j[i],
                    transform: "rotateY(90deg) translate3d(" + H / 2 + "px,0,-" + H / 2 + "px)"
                });
                K[i].rightEdge.css({
                    width: H,
                    height: J,
                    background: j[i],
                    transform: "rotateY(90deg) translate3d(" + H / 2 + "px,0," + (I - H / 2) + "px)"
                })
            }
        }
    }

    function e(H, I) {
        var i = 0;
        for (var j in H) {
            if (typeof H[j] !== "function") {
                (function(J, K) {
                    wizAnimate(function(M) {
                        var S, Q, R, P = "",
                            L = {};
                        if (M <= 0.5) {
                            S = h.easing.easeInBack(1, M * 2, 0, 1, 1, 1).toFixed(3);
                            Q = h.easing.easeInBackQ(1, M * 2, 0, 1, 1, 1).toFixed(3);
                            R = h.easing.easeInBackQ2(1, M * 2, 0, 1, 1, 1).toFixed(3);
                            K[J].back.css("backfaceVisibility", "hidden")
                        } else {
                            S = h.easing.easeOutBack(1, (M - 0.5) * 2, 0, 1, 1, 1).toFixed(3);
                            Q = h.easing.easeOutBackQ(1, (M - 0.5) * 2, 0, 1, 1, 1).toFixed(3);
                            R = h.easing.easeOutBackQ2(1, (M - 0.5) * 2, 0, 1, 1, 1).toFixed(3);
                            K[J].back.css("backfaceVisibility", "visible")
                        }
                        for (var N in K[J].animate[M <= 0.5 ? "half" : "end"]) {
                            var T = K[J].animate[M <= 0.5 ? "begin" : "half"][N] || 0,
                                O = K[J].animate[M <= 0.5 ? "half" : "end"][N] || 0;
                            if (typeof O !== "object") {
                                if (N === "scale" || N === "rotateX" || N === "rotateY") {
                                    O = T + (O - T) * Q
                                } else {
                                    if (N === "left" || N === "top") {
                                        O = T + (O - T) * R
                                    } else {
                                        O = T + (O - T) * S
                                    }
                                }
                            }
                            if (N === "rotateX" || N === "rotateY" || N === "rotateZ") {
                                P += N + "(" + O + "deg) "
                            } else {
                                if (N === "scale") {
                                    P += N + "(" + O + ") "
                                } else {
                                    if (N === "translate3d") {
                                        P += N + "(" + (T[0] + (O[0] - T[0]) * S).toFixed(3) + "px," + (T[1] + (O[1] - T[1]) * S).toFixed(3) + "px," + (T[2] + (O[2] - T[2]) * S).toFixed(3) + "px) "
                                    } else {
                                        L[N] = O
                                    }
                                }
                            }
                        }
                        K[J].wrapper.css({
                            transform: "translate3d(" + (L.left ? L.left : 0).toFixed(3) + "px," + (L.top ? L.top : 0).toFixed(3) + "px,0)"
                        });
                        delete L.left;
                        delete L.top;
                        if (P) {
                            L.transform = P
                        }
                        K[J].part.css(L)
                    }, 0, 1, K[J].animate.duration, K[J].animate.delay, function() {
                        i++;
                        if (i == K.length && I) {
                            I()
                        }
                    })
                }(j, H))
            }
        }
    }

    function k(Y, K, L, N) {
        var V = g.width(),
            U = g.height(),
            T = V / a,
            S = U,
            J = (f.duration * 0.4) > 1000 ? 1000 : (f.duration * 0.4),
            I = f.duration * 0.6,
            O = [0, 0];
        G(b, Y, v[K], T, S);
        n.css({
            transformOrigin: (V / 2) + "px " + (U / 2) + "px 0",
            width: V,
            height: U
        });
        for (var Q in Y) {
            if (typeof Y[Q] !== "function") {
                var H = w[Q].delay * J;
                if (O[1] <= H) {
                    O[0] = Q;
                    O[1] = H
                }
                Y[Q].part[0].wizards_delay = [H, 0]
            }
        }
        Y[O[0]].part[0].wizards_delay[1] = 1;
        for (var Q in Y) {
            if (typeof Y[Q] !== "function") {
                var P = Y[Q],
                    X = Q % a,
                    W = Math.floor(Q / a),
                    R = V * X / a,
                    M = U * W;
                P.animate = {
                    delay: P.part[0].wizards_delay[0],
                    duration: I,
                    begin: {
                        left: 0,
                        top: 0,
                        width: T,
                        height: S,
                        scale: 1,
                        rotateX: 0,
                        rotateY: 0,
                        translate3d: [0, 0, o ? b : 0]
                    },
                    half: {
                        left: w[Q].halfLeft * T,
                        top: w[Q].halfTop * S,
                        scale: w[Q].halfScale,
                        rotateX: w[Q].rotateX / 2,
                        rotateY: w[Q].rotateY / 2,
                        translate3d: [0, 0, (o ? 1 : 0.5) * b]
                    },
                    end: {
                        left: 0,
                        top: 0,
                        scale: 1,
                        rotateX: w[Q].rotateX,
                        rotateY: w[Q].rotateY,
                        translate3d: [0, 0, b]
                    }
                };
                P.front.find("img").css(L);
                P.back.css("backfaceVisibility", "hidden").find("img").css(L);
                P.part.css({
                    width: P.animate.begin.width,
                    height: P.animate.begin.height,
                    left: P.animate.begin.left,
                    top: P.animate.begin.top
                })
            }
        }
        e(Y, N)
    }
    var d;
    this.go = function(U, K) {
        if (d) {
            return K
        }
        n.show();
        var I = h(q.get(K));
        I = {
            width: I.width(),
            height: I.height(),
            marginTop: parseFloat(I.css("marginTop")),
            marginLeft: parseFloat(I.css("marginLeft"))
        };
        w = (function() {
            var aa = [0, 1];
            var ab = [1.2, 0.8];
            var Z = [0.2, 0, -0.2];
            var Y = [180, -180];
            aa = aa[Math.floor(Math.random() * (aa.length))];
            ab = ab[Math.floor(Math.random() * (ab.length))];
            Z = Z[Math.floor(Math.random() * (Z.length))];
            Y = Y[Math.floor(Math.random() * (Y.length))];
            var j = a;
            var i = [];
            for (var X = (aa ? 0 : j); aa ? (X <= j) : (X >= 0); aa ? (X++) : (X--)) {
                i.push({
                    zIndex: X - (aa ? j : 0),
                    rotateY: Y,
                    delay: X / j,
                    halfScale: ab,
                    halfLeft: Z
                })
            }
            return i
        }());
        if (p) {
            E[0].front.find("img").on("load", function() {
                s.hide()
            });
            for (var L in E) {
                if (typeof E[L] !== "function") {
                    E[L].front.find("img").attr("src", q.get(K).src);
                    E[L].back.find("img").attr("src", q.get(U).src)
                }
            }
            if (!v[K]) {
                v[K] = A(K)
            }
            d = new k(E, K, I, function() {
                s.show();
                m.trigger("effectEnd");
                n.hide();
                for (var i in E) {
                    if (typeof E[i] !== "function") {
                        E[i].part.css({
                            transition: "",
                            transform: "rotateX(0) rotateY(0) translate3d(0,0,0)"
                        })
                    }
                }
                d = 0
            })
        } else {
            d = true;

            function V(j, i) {
                return Math.random() * (i - j + 1) + j
            }
            var Q = g.width(),
                T = g.height(),
                P = Q / a,
                S = T,
                J = Q - P * (a - 1),
                R = T;
            n.css({
                width: Q,
                height: T
            });
            var H = 0;
            for (var L in E) {
                var O = L % a,
                    N = Math.floor(L / a);
                E[L].front.find("img").attr("src", q.get(U).src).css(I);
                var W = f.duration * (1 - Math.abs((c * F - O * N) / (2 * a)));
                var M = V(-1, 1) > 0 ? 1 : -1;
                E[L].wrapper.css({
                    width: P,
                    height: S
                });
                E[L].part.css({
                    position: "absolute",
                    top: 0,
                    left: M * P,
                    opacity: 0,
                    width: P,
                    height: S
                }).animate({
                    left: 0,
                    opacity: 1
                }, W, function() {
                    H++;
                    if (H == a) {
                        s.stop(1, 1);
                        d = false;
                        m.trigger("effectEnd")
                    }
                })
            }
        }
    };

    function D(Q, H) {
        H = H || {};
        var S = 1,
            K = H.exclude || [],
            P;
        var M = document.createElement("canvas"),
            J = M.getContext("2d"),
            I = M.width = Q.naturalWidth,
            W = M.height = Q.naturalHeight;
        J.drawImage(Q, 0, 0, Q.naturalWidth, Q.naturalHeight);
        try {
            P = J.getImageData(H.x ? H.x : 0, H.y ? H.y : 0, H.w ? H.w : Q.width, H.h ? H.h : Q.height)["data"]
        } catch (R) {
            console.log("error:unable to access image data: " + R);
            return "#ccc"
        }
        var L = (H.w ? H.w : Q.width * H.h ? H.h : Q.height) || P.length,
            N = {},
            U = "",
            T = [],
            j = {
                dominant: {
                    name: "",
                    count: 0
                }
            };
        var O = 0;
        while (O < L) {
            T[0] = P[O];
            T[1] = P[O + 1];
            T[2] = P[O + 2];
            U = T.join(",");
            if (U in N) {
                N[U] = N[U] + 1
            } else {
                N[U] = 1
            }
            if (K.indexOf(["rgb(", U, ")"].join("")) === -1) {
                var V = N[U];
                if (V > j.dominant.count) {
                    j.dominant.name = U;
                    j.dominant.count = V
                }
            }
            O += S * 4
        }
        return ["rgb(", j.dominant.name, ")"].join("")
    }
};
jQuery.extend(jQuery.easing, {
    easeInOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        if ((f /= h / 2) < 1) {
            return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
        }
        return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
    }
});

function wizards_cube_over(m, k, b) {
    var e = jQuery,
        j = e(this),
        a = / Slider/g.test(navigator.userAgent),
        g = e(".wizards_list", b),
        c = m.perspective || /MSIE|Trident/g.test(navigator.userAgent) ? 1000 : 2000,
        d = {
            position: "absolute",
            backgroundSize: "cover",
            left: 0,
            top: 0,
            width: "100%",
            height: "100%",
            backfaceVisibility: "hidden"
        };
    var l = /AppleWebKit/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent);
    var i = e("<div>").css(d).css({
        transformStyle: "preserve-3d",
        perspective: (l && !a ? "none" : c),
        zIndex: 8
    });
    e("<div>").addClass("wizards_effect wizards_cube_over").css(d).append(i).appendTo(b);
    if (!m.support.transform && m.fallback) {
        return new m.fallback(m, k, b)
    }
    var h;
    this.go = function(y, u) {
        var q = e(k[u]);
        q = {
            width: q.width(),
            height: q.height(),
            marginTop: parseFloat(q.css("marginTop")),
            marginLeft: parseFloat(q.css("marginLeft"))
        };

        function p(C, G, F, H) {
            C.parent().css("perspective", c);
            var D = C.width(),
                E = C.height();
            wizAnimate(C, {
                scale: 1,
                translate: [0, 0, (l && !a) ? F : 0]
            }, {
                scale: 0.85,
                translate: [0, 0, (l && !a) ? F : 0]
            }, m.duration * 0.4, "easeInOutBack", function() {
                wizAnimate(C, {
                    scale: 0.85,
                    translate: [0, 0, (l && !a) ? F : 0]
                }, {
                    scale: 1,
                    translate: [0, 0, (l && !a) ? F : 0]
                }, m.duration * 0.4, m.duration - m.duration * 0.8, "easeInOutBack", H)
            });
            wizAnimate(G.front.item, {
                rotateY: 0,
                rotateX: 0
            }, {
                rotateY: G.front.rotateY,
                rotateX: G.front.rotateX
            }, m.duration, "easeInOutBack");
            wizAnimate(G.back.item, {
                rotateY: G.back.rotateY,
                rotateX: G.back.rotateX
            }, {
                rotateY: 0,
                rotateX: 0
            }, m.duration, "easeInOutBack");
            wizAnimate(G.side.item, {
                rotateY: G.side.rotateY,
                rotateX: G.side.rotateX
            }, {
                rotateY: -G.side.rotateY,
                rotateX: -G.side.rotateX
            }, m.duration, "easeInOutBack")
        }
        if (m.support.transform && m.support.perspective) {
            if (h) {
                h.stop()
            }
            var A = b.width(),
                v = b.height();
            var t = {
                left: [A / 2, 0, 0, 180, 0, -180],
                right: [A / 2, 0, 0, -180, 0, 180],
                down: [v / 2, -v / 2, 180, 0, -180, 0],
                up: [v / 2, v / 2, -180, 0, 180, 0]
            }[m.direction || ["left", "right", "down", "up"][Math.floor(Math.random() * 4)]];
            var B = e("<img>").css(q),
                s = e("<img>").css(q).attr("src", k.get(y).src);
            var n = e("<div>").css({
                overflow: "hidden",
                transformOrigin: "50% 50% -" + t[0] + "px"
            }).css(d).append(B).appendTo(i);
            var o = e("<div>").css({
                overflow: "hidden",
                transformOrigin: "50% 50% -" + t[0] + "px"
            }).css(d).append(s).appendTo(i);
            var z = e('<div class="wizards_cube_side">').css({
                transformOrigin: "50% 50% -" + t[0] + "px",
                background: m.staticColor ? "" : f(s[0], {
                    exclude: ["0,0,0", "255,255,255"]
                })
            }).css(d).appendTo(i);
            B.on("load", function() {
                g.hide()
            });
            B.attr("src", k.get(u).src).load();
            i.parent().show();
            h = new p(i, {
                front: {
                    item: n,
                    rotateY: t[5],
                    rotateX: t[4]
                },
                back: {
                    item: o,
                    rotateY: t[3],
                    rotateX: t[2]
                },
                side: {
                    item: z,
                    rotateY: t[3] / 2,
                    rotateX: t[2] / 2
                }
            }, -t[0], function() {
                j.trigger("effectEnd");
                i.empty().parent().hide();
                h = 0
            })
        } else {
            i.css({
                position: "absolute",
                display: "none",
                zIndex: 2,
                width: "100%",
                height: "100%"
            });
            i.stop(1, 1);
            var r = (!!((y - u + 1) % k.length) ^ m.revers ? "left" : "right");
            var n = e("<div>").css({
                position: "absolute",
                left: "0%",
                right: "auto",
                top: 0,
                width: "100%",
                height: "100%"
            }).css(r, 0).append(e(k[u]).clone().css({
                width: 100 * q.width / b.width() + "%",
                height: 100 * q.height / b.height() + "%",
                marginLeft: 100 * q.marginLeft / b.width() + "%"
            })).appendTo(i);
            var x = e("<div>").css({
                position: "absolute",
                left: "100%",
                right: "auto",
                top: 0,
                width: "0%",
                height: "100%"
            }).append(e(k[y]).clone().css({
                width: 100 * q.width / b.width() + "%",
                height: 100 * q.height / b.height() + "%",
                marginLeft: 100 * q.marginLeft / b.width() + "%"
            })).appendTo(i);
            i.css({
                left: "auto",
                right: "auto",
                top: 0
            }).css(r, 0).show();
            i.show();
            g.hide();
            x.animate({
                width: "100%",
                left: 0
            }, m.duration, "easeInOutExpo", function() {
                e(this).remove()
            });
            n.animate({
                width: 0
            }, m.duration, "easeInOutExpo", function() {
                j.trigger("effectEnd");
                i.empty().hide()
            })
        }
    };

    function f(x, o) {
        o = o || {};
        var z = 1,
            r = o.exclude || [],
            w;
        var t = document.createElement("canvas"),
            q = t.getContext("2d"),
            p = t.width = x.naturalWidth,
            D = t.height = x.naturalHeight;
        q.drawImage(x, 0, 0, x.naturalWidth, x.naturalHeight);
        try {
            w = q.getImageData(o.x ? o.x : 0, o.y ? o.y : 0, o.w ? o.w : x.width, o.h ? o.h : x.height)["data"]
        } catch (y) {
            console.log("error:unable to access image data: " + y);
            return "#ccc"
        }
        var s = (o.w ? o.w : x.width * o.h ? o.h : x.height) || w.length,
            u = {},
            B = "",
            A = [],
            n = {
                dominant: {
                    name: "",
                    count: 0
                }
            };
        var v = 0;
        while (v < s) {
            A[0] = w[v];
            A[1] = w[v + 1];
            A[2] = w[v + 2];
            B = A.join(",");
            if (B in u) {
                u[B] = u[B] + 1
            } else {
                u[B] = 1
            }
            if (r.indexOf(["rgb(", B, ")"].join("")) === -1) {
                var C = u[B];
                if (C > n.dominant.count) {
                    n.dominant.name = B;
                    n.dominant.count = C
                }
            }
            v += z * 4
        }
        return ["rgb(", n.dominant.name, ")"].join("")
    }
};

function wizards_parallax(d, l, m) {
    var f = jQuery;
    var i = f(this);
    var j = d.parallax || 0.25;
    var k = f("<div>").css({
        position: "absolute",
        display: "none",
        top: 0,
        left: 0,
        width: "100%",
        height: "100%",
        overflow: "hidden"
    }).addClass("wizards_effect wizards_parallax").appendTo(m);
    var h = !d.noCanvas && !window.opera && !!document.createElement("canvas").getContext;
    if (h) {
        try {
            document.createElement("canvas").getContext("2d").getImageData(0, 0, 1, 1)
        } catch (q) {
            h = 0
        }
    }

    function t(e) {
        return Math.round(e * 1000) / 1000
    }
    var u = f("<div>").css({
        position: "absolute",
        left: 0,
        top: 0,
        overflow: "hidden",
        width: "100%",
        height: "100%",
        transform: "translate3d(0,0,0)",
        zIndex: 1
    }).appendTo(k);
    var s = u.clone().appendTo(k);
    var r = u.clone().css({
        width: "20%"
    }).appendTo(k);
    var c;
    var p = u.clone().appendTo(k).css({
        zIndex: 0
    });
    this.go = function(C, A, x) {
        var e = f(l.get(A));
        e = {
            position: "absolute",
            width: e.width(),
            height: e.height(),
            marginTop: e.css("marginTop"),
            marginLeft: e.css("marginLeft")
        };
        x = x ? 1 : -1;
        var E = f(l.get(A)).clone().css(e).appendTo(u);
        var z = f(l.get(C)).clone().css(e).appendTo(s);
        var v = f(l.get(C)).clone().css(e).appendTo(r);
        if (x == -1) {
            r.css({
                left: "auto",
                right: 0
            });
            v.css({
                left: "auto",
                right: 0
            })
        } else {
            r.css({
                left: 0,
                right: "auto"
            });
            v.css({
                left: 0,
                right: "auto"
            })
        }
        var D = (m.width() || d.width) * 1.3;
        var B = m.height() || d.height;
        var y;
        if (h) {
            if (!c) {
                c = f("<canvas>").css({
                    position: "absolute",
                    left: 0,
                    top: 0
                }).attr({
                    width: e.width,
                    height: e.height
                }).appendTo(p)
            }
            c.css(e).attr({
                width: e.width,
                height: e.height
            });
            y = o(f(l.get(C)), e, 10, c.get(0))
        }
        if (!h || !y) {
            h = 0
        }
        wizAnimate(function(G) {
            G = f.easing.swing(G);
            var L = t(x * G * D),
                F = t(x * (-D + G * D - (1 - G) * D * 0.2)),
                J = t(x * (-D * 1.4 + G * (D * 1.4 + D / 1.3))),
                w = t(-x * D * j * G),
                H = t(x * D * j * (1 - G)),
                I = t(-x * D * (j + 0.2) * G),
                K = t(x * (-D * 0.2 + G * D * 0.4));
            if (d.support.transform) {
                u.css("transform", "translate3d(" + L + "px,0,0)");
                E.css("transform", "translate3d(" + w + "px,0,0)");
                s.css("transform", "translate3d(" + F + "px,0,0)");
                z.css("transform", "translate3d(" + H + "px,0,0)");
                r.css("transform", "translate3d(" + J + "px,0,0)");
                v.css("transform", "scale(1.6) translate3d(" + I + "px,0,0)");
                p.css("transform", "translate3d(" + K + "px,0,0)")
            } else {
                u.css("left", L);
                E.css("margin-left", w);
                s.css("left", F);
                z.css("margin-left", H);
                r.css("left", J);
                v.css("margin-left", I);
                p.css("left", K)
            }
        }, 0, 1, d.duration, function() {
            k.hide();
            E.remove();
            z.remove();
            v.remove();
            i.trigger("effectEnd")
        })
    };

    function o(C, A, B, v) {
        var F = (parseInt(C.parent().css("z-index")) || 0) + 1;
        if (h) {
            //**bbk**//
            if (v !== undefined) {
                var I = v.getContext("2d");
                I.drawImage(C.get(0), 0, 0, A.width, A.height);
                if (!a(I, 0, 0, v.width, v.height, B)) {
                    return 0
                }
                return f(v)
            }
        }
        var J = f("<div></div>").css({
            position: "absolute",
            "z-index": F,
            left: 0,
            top: 0
        }).css(A).appendTo(v);
        var H = (Math.sqrt(5) + 1) / 2;
        var w = 1 - H / 2;
        for (var z = 0; w * z < B; z++) {
            var D = Math.PI * H * z;
            var e = (w * z + 1);
            var G = e * Math.cos(D);
            var E = e * Math.sin(D);
            f(document.createElement("img")).attr("src", C.attr("src")).css({
                opacity: 1 / (z / 1.8 + 1),
                position: "absolute",
                "z-index": F,
                left: Math.round(G) + "px",
                top: Math.round(E) + "px",
                width: "100%",
                height: "100%"
            }).appendTo(J)
        }
        return J
    }
    var g = [512, 512, 456, 512, 328, 456, 335, 512, 405, 328, 271, 456, 388, 335, 292, 512, 454, 405, 364, 328, 298, 271, 496, 456, 420, 388, 360, 335, 312, 292, 273, 512, 482, 454, 428, 405, 383, 364, 345, 328, 312, 298, 284, 271, 259, 496, 475, 456, 437, 420, 404, 388, 374, 360, 347, 335, 323, 312, 302, 292, 282, 273, 265, 512, 497, 482, 468, 454, 441, 428, 417, 405, 394, 383, 373, 364, 354, 345, 337, 328, 320, 312, 305, 298, 291, 284, 278, 271, 265, 259, 507, 496, 485, 475, 465, 456, 446, 437, 428, 420, 412, 404, 396, 388, 381, 374, 367, 360, 354, 347, 341, 335, 329, 323, 318, 312, 307, 302, 297, 292, 287, 282, 278, 273, 269, 265, 261, 512, 505, 497, 489, 482, 475, 468, 461, 454, 447, 441, 435, 428, 422, 417, 411, 405, 399, 394, 389, 383, 378, 373, 368, 364, 359, 354, 350, 345, 341, 337, 332, 328, 324, 320, 316, 312, 309, 305, 301, 298, 294, 291, 287, 284, 281, 278, 274, 271, 268, 265, 262, 259, 257, 507, 501, 496, 491, 485, 480, 475, 470, 465, 460, 456, 451, 446, 442, 437, 433, 428, 424, 420, 416, 412, 408, 404, 400, 396, 392, 388, 385, 381, 377, 374, 370, 367, 363, 360, 357, 354, 350, 347, 344, 341, 338, 335, 332, 329, 326, 323, 320, 318, 315, 312, 310, 307, 304, 302, 299, 297, 294, 292, 289, 287, 285, 282, 280, 278, 275, 273, 271, 269, 267, 265, 263, 261, 259];
    var n = [9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17, 17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24];

    function a(am, U, S, v, w, ad) {
        if (isNaN(ad) || ad < 1) {
            return
        }
        ad |= 0;
        var ah;
        try {
            ah = am.getImageData(U, S, v, w)
        } catch (al) {
            console.log("error:unable to access image data: " + al);
            return false
        }
        var C = ah.data;
        var ab, aa, aj, ag, J, M, G, A, B, R, H, T, P, X, ac, K, F, L, N, W;
        var ak = ad + ad + 1;
        var Y = v << 2;
        var I = v - 1;
        var af = w - 1;
        var E = ad + 1;
        var ae = E * (E + 1) / 2;
        var V = new b();
        var Q = V;
        for (aj = 1; aj < ak; aj++) {
            Q = Q.next = new b();
            if (aj == E) {
                var D = Q
            }
        }
        Q.next = V;
        var ai = null;
        var Z = null;
        G = M = 0;
        var O = g[ad];
        var z = n[ad];
        for (aa = 0; aa < w; aa++) {
            X = ac = K = A = B = R = 0;
            H = E * (F = C[M]);
            T = E * (L = C[M + 1]);
            P = E * (N = C[M + 2]);
            A += ae * F;
            B += ae * L;
            R += ae * N;
            Q = V;
            for (aj = 0; aj < E; aj++) {
                Q.r = F;
                Q.g = L;
                Q.b = N;
                Q = Q.next
            }
            for (aj = 1; aj < E; aj++) {
                ag = M + ((I < aj ? I : aj) << 2);
                A += (Q.r = (F = C[ag])) * (W = E - aj);
                B += (Q.g = (L = C[ag + 1])) * W;
                R += (Q.b = (N = C[ag + 2])) * W;
                X += F;
                ac += L;
                K += N;
                Q = Q.next
            }
            ai = V;
            Z = D;
            for (ab = 0; ab < v; ab++) {
                C[M] = (A * O) >> z;
                C[M + 1] = (B * O) >> z;
                C[M + 2] = (R * O) >> z;
                A -= H;
                B -= T;
                R -= P;
                H -= ai.r;
                T -= ai.g;
                P -= ai.b;
                ag = (G + ((ag = ab + ad + 1) < I ? ag : I)) << 2;
                X += (ai.r = C[ag]);
                ac += (ai.g = C[ag + 1]);
                K += (ai.b = C[ag + 2]);
                A += X;
                B += ac;
                R += K;
                ai = ai.next;
                H += (F = Z.r);
                T += (L = Z.g);
                P += (N = Z.b);
                X -= F;
                ac -= L;
                K -= N;
                Z = Z.next;
                M += 4
            }
            G += v
        }
        for (ab = 0; ab < v; ab++) {
            ac = K = X = B = R = A = 0;
            M = ab << 2;
            H = E * (F = C[M]);
            T = E * (L = C[M + 1]);
            P = E * (N = C[M + 2]);
            A += ae * F;
            B += ae * L;
            R += ae * N;
            Q = V;
            for (aj = 0; aj < E; aj++) {
                Q.r = F;
                Q.g = L;
                Q.b = N;
                Q = Q.next
            }
            J = v;
            for (aj = 1; aj <= ad; aj++) {
                M = (J + ab) << 2;
                A += (Q.r = (F = C[M])) * (W = E - aj);
                B += (Q.g = (L = C[M + 1])) * W;
                R += (Q.b = (N = C[M + 2])) * W;
                X += F;
                ac += L;
                K += N;
                Q = Q.next;
                if (aj < af) {
                    J += v
                }
            }
            M = ab;
            ai = V;
            Z = D;
            for (aa = 0; aa < w; aa++) {
                ag = M << 2;
                C[ag] = (A * O) >> z;
                C[ag + 1] = (B * O) >> z;
                C[ag + 2] = (R * O) >> z;
                A -= H;
                B -= T;
                R -= P;
                H -= ai.r;
                T -= ai.g;
                P -= ai.b;
                ag = (ab + (((ag = aa + E) < af ? ag : af) * v)) << 2;
                A += (X += (ai.r = C[ag]));
                B += (ac += (ai.g = C[ag + 1]));
                R += (K += (ai.b = C[ag + 2]));
                ai = ai.next;
                H += (F = Z.r);
                T += (L = Z.g);
                P += (N = Z.b);
                X -= F;
                ac -= L;
                K -= N;
                Z = Z.next;
                M += v
            }
        }
        am.putImageData(ah, U, S);
        return true
    }

    function b() {
        this.r = 0;
        this.g = 0;
        this.b = 0;
        this.a = 0;
        this.next = null
    }
};
jQuery.extend(jQuery.easing, {
    easeInBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * (f /= h) * f * ((g + 1) * f - g) + a
    },
    easeOutBack: function(e, f, a, i, h, g) {
        if (g == undefined) {
            g = 1.70158
        }
        return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
    },
    easeInBackQ: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * h * (4 * f * h - 8 * h + 8 * f - 3)
    },
    easeOutBackQ: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * (4 * h * f * h - 12 * h * h + 16 * h * f - 13 * h + 6 * f)
    },
    easeInBackQ2: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * h * (1.5 * f * h - 2.5 * h + 5 * f - 3)
    },
    easeOutBackQ2: function(e, f, a, j, i, g) {
        var h = (f /= i) * f;
        return a + j * (1.5 * h * f * h - 5 * h * h + 10 * h * f - 12 * h + 6.5 * f)
    }
});

function wizards_brick(f, s, g) {
    var h = jQuery,
        n = h(this),
        a = f.cols || 4,
        r = f.rows || 3,
        H = 2.5,
        c = 2,
        v = f.perspective || 2000,
        u = g.find(".wizards_list"),
        G = [],
        b = 30,
        x = {},
        o = h("<div>").addClass("wizards_effect wizards_brick").appendTo(g),
        q = f.support.transform && f.support.transition && f.support.perspective,
        p = /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent),
        m = /Firefox/.test(navigator.userAgent);
    var y = [{
        zIndex: 0,
        rotateX: 360,
        rotateZ: -360,
        rotateY: 180,
        halfScale: 0.5,
        halfLeft: 0.7,
        halfTop: 0.7,
        delay: 0.36
    }, {
        zIndex: 1,
        rotateX: -360,
        rotateZ: 360,
        rotateY: 180,
        halfScale: 0.5,
        halfLeft: 0.2,
        halfTop: 0.4,
        delay: 0.81
    }, {
        zIndex: 1,
        rotateX: 360,
        rotateZ: -360,
        rotateY: -180,
        halfScale: 0.5,
        halfLeft: -0.2,
        halfTop: 0.4,
        delay: 0.45
    }, {
        zIndex: 0,
        rotateX: -360,
        rotateZ: 360,
        rotateY: -180,
        halfScale: 0.5,
        halfLeft: -0.7,
        halfTop: 0.7,
        delay: 0.63
    }, {
        zIndex: 1,
        rotateX: -360,
        rotateZ: 360,
        rotateY: -180,
        halfScale: 0.5,
        halfLeft: 0.7,
        halfTop: 0,
        delay: 0.54
    }, {
        zIndex: 2,
        rotateX: 360,
        rotateZ: -360,
        rotateY: 180,
        halfScale: 0.5,
        halfLeft: 0.2,
        halfTop: 0,
        delay: 0.38
    }, {
        zIndex: 2,
        rotateX: 360,
        rotateZ: -360,
        rotateY: -180,
        halfScale: 0.5,
        halfLeft: -0.2,
        halfTop: 0,
        delay: 0
    }, {
        zIndex: 1,
        rotateX: -360,
        rotateZ: 360,
        rotateY: 180,
        halfScale: 0.5,
        halfLeft: -0.7,
        halfTop: 0,
        delay: 0.72
    }, {
        zIndex: 0,
        rotateX: -360,
        rotateZ: 360,
        rotateY: 180,
        halfScale: 0.5,
        halfLeft: 0.7,
        halfTop: -0.7,
        delay: 1
    }, {
        zIndex: 1,
        rotateX: -360,
        rotateZ: 360,
        rotateY: -180,
        halfScale: 0.5,
        halfLeft: 0.2,
        halfTop: -0.4,
        delay: 0.7
    }, {
        zIndex: 1,
        rotateX: 360,
        rotateZ: -360,
        rotateY: 180,
        halfScale: 0.5,
        halfLeft: -0.2,
        halfTop: -0.4,
        delay: 0.57
    }, {
        zIndex: 0,
        rotateX: 360,
        rotateZ: -360,
        rotateY: -180,
        halfScale: 0.5,
        halfLeft: -0.7,
        halfTop: -0.7,
        delay: 0.9
    }, ];
    o.css({
        position: "absolute",
        top: 0,
        left: 0,
        width: g.width(),
        height: g.height(),
        transform: "translate3d(0,0,0)",
        transformOrigin: (f.width / 2) + "px " + (f.height / 2) + "px 0",
        perspective: v
    }).hide();
    for (var l = 0; l < a * r; l++) {
        var B = l % a,
            A = Math.floor(l / a);
        var E = h("<div>").css({
                position: "absolute",
                left: 100 * B / a + "%",
                top: 100 * A / r + "%",
                outline: "1px solid transparent",
                transformStyle: (p || m) ? "flat" : "preserve-3d",
                zIndex: y[l].zIndex,
                overflow: q ? "visible" : "hidden"
            }).appendTo(o),
            z = h("<div>").css({
                transform: "scale(1) rotateX(0) rotateY(0) translate3d(0,0,0)",
                outline: "1px solid transparent",
                transformStyle: "preserve-3d"
            }).appendTo(E),
            w = h("<div>").addClass("wizards_front_image").appendTo(z),
            D = q ? h("<div>").addClass("wizards_back_image").appendTo(z) : 0;
        w.css({
            position: "absolute",
            width: "100%",
            height: "100%",
            overflow: "hidden",
            backfaceVisibility: "hidden",
            transform: "translate3d(0,0,0)"
        }).append(h("<img>").css({
            left: -B * 100 + "%",
            top: -A * 100 + "%",
            position: "absolute",
            outline: "1px solid transparent"
        }));
        if (q) {
            D.css({
                position: "absolute",
                width: "100%",
                height: "100%",
                overflow: "hidden",
                backfaceVisibility: "hidden",
                transform: "rotateY(180deg) translate3d(0,0," + b + "px)"
            }).append(h("<img>").css({
                left: -B * 100 + "%",
                top: -A * 100 + "%",
                position: "absolute",
                outline: "1px solid transparent"
            }))
        }
        var t = {
            position: "absolute",
            outline: "1px solid transparent"
        };
        G[l] = {
            part: z,
            front: w,
            back: D,
            wrapper: E,
            leftEdge: q ? h("<div>").addClass("wizards_left_edge").css(t).appendTo(z) : 0,
            rightEdge: q ? h("<div>").addClass("wizards_right_edge").css(t).appendTo(z) : 0,
            topEdge: q ? h("<div>").addClass("wizards_top_edge").css(t).appendTo(z) : 0,
            bottomEdge: q ? h("<div>").addClass("wizards_bottom_edge").css(t).appendTo(z) : 0
        }
    }

    function C(N) {
        var J = {},
            L = s.get(N),
            O = f.width / a,
            P = f.height / r;
        for (var K = 0; K < a * r; K++) {
            var N = K % a,
                M = Math.floor(K / a);
            J[K] = F(L, {
                x: N * O,
                y: M * P,
                w: O,
                h: P
            })
        }
        return J
    }

    function I(J, M, j, K, L) {
        for (var i in M) {
            if (typeof G[i] !== "function") {
                M[i].topEdge.css({
                    width: K,
                    height: J,
                    background: j[i],
                    transform: "rotateX(90deg) translate3d(0,-" + J / 2 + "px," + J / 2 + "px)"
                });
                M[i].bottomEdge.css({
                    width: K,
                    height: J,
                    background: j[i],
                    transform: "rotateX(90deg) translate3d(0,-" + J / 2 + "px," + (-L + J / 2) + "px)"
                });
                M[i].leftEdge.css({
                    width: J,
                    height: L,
                    background: j[i],
                    transform: "rotateY(90deg) translate3d(" + J / 2 + "px,0,-" + J / 2 + "px)"
                });
                M[i].rightEdge.css({
                    width: J,
                    height: L,
                    background: j[i],
                    transform: "rotateY(90deg) translate3d(" + J / 2 + "px,0," + (K - J / 2) + "px)"
                })
            }
        }
    }

    function e(J, K) {
        var i = 0;
        for (var j in J) {
            if (typeof J[j] !== "function") {
                (function(L, M) {
                    wizAnimate(function(O) {
                        var U, S, T, R = "",
                            N = {};
                        if (O <= 0.5) {
                            U = h.easing.easeInBack(1, O * 2, 0, 1, 1, 1).toFixed(3);
                            S = h.easing.easeInBackQ(1, O * 2, 0, 1, 1, 1).toFixed(3);
                            T = h.easing.easeInBackQ2(1, O * 2, 0, 1, 1, 1).toFixed(3);
                            M[L].back.css("backfaceVisibility", "hidden")
                        } else {
                            U = h.easing.easeOutBack(1, (O - 0.5) * 2, 0, 1, 1, 1).toFixed(3);
                            S = h.easing.easeOutBackQ(1, (O - 0.5) * 2, 0, 1, 1, 1).toFixed(3);
                            T = h.easing.easeOutBackQ2(1, (O - 0.5) * 2, 0, 1, 1, 1).toFixed(3);
                            M[L].back.css("backfaceVisibility", "visible")
                        }
                        for (var P in M[L].animate[O <= 0.5 ? "half" : "end"]) {
                            var V = M[L].animate[O <= 0.5 ? "begin" : "half"][P] || 0,
                                Q = M[L].animate[O <= 0.5 ? "half" : "end"][P] || 0;
                            if (typeof Q !== "object") {
                                if (P === "scale" || P === "rotateX" || P === "rotateY") {
                                    Q = V + (Q - V) * S
                                } else {
                                    if (P === "left" || P === "top") {
                                        Q = V + (Q - V) * T
                                    } else {
                                        Q = V + (Q - V) * U
                                    }
                                }
                            }
                            if (P === "rotateX" || P === "rotateY" || P === "rotateZ") {
                                R += P + "(" + Q + "deg) "
                            } else {
                                if (P === "scale") {
                                    R += P + "(" + Q + ") "
                                } else {
                                    if (P === "translate3d") {
                                        R += P + "(" + (V[0] + (Q[0] - V[0]) * U).toFixed(3) + "px," + (V[1] + (Q[1] - V[1]) * U).toFixed(3) + "px," + (V[2] + (Q[2] - V[2]) * U).toFixed(3) + "px) "
                                    } else {
                                        N[P] = Q
                                    }
                                }
                            }
                        }
                        M[L].wrapper.css({
                            transform: "translate3d(" + (N.left ? N.left : 0).toFixed(3) + "px," + (N.top ? N.top : 0).toFixed(3) + "px,0)"
                        });
                        delete N.left;
                        delete N.top;
                        if (R) {
                            N.transform = R
                        }
                        M[L].part.css(N)
                    }, 0, 1, M[L].animate.duration, M[L].animate.delay, function() {
                        i++;
                        if (i == M.length && K) {
                            K()
                        }
                    })
                }(j, J))
            }
        }
    }

    function k(aa, M, N, P) {
        var X = g.width(),
            W = g.height(),
            V = X / a,
            U = W / r,
            L = (f.duration * 0.4) > 1000 ? 1000 : (f.duration * 0.4),
            K = f.duration * 0.6,
            Q = [0, 0];
        I(b, aa, x[M], V, U);
        o.css({
            transformOrigin: (X / 2) + "px " + (W / 2) + "px 0",
            width: X,
            height: W
        });
        for (var S in aa) {
            if (typeof aa[S] !== "function") {
                var J = y[S].delay * L;
                if (Q[1] <= J) {
                    Q[0] = S;
                    Q[1] = J
                }
                aa[S].part[0].wizards_delay = [J, 0]
            }
        }
        aa[Q[0]].part[0].wizards_delay[1] = 1;
        for (var S in aa) {
            if (typeof aa[S] !== "function") {
                var R = aa[S],
                    Z = S % a,
                    Y = Math.floor(S / a),
                    T = X * Z / a,
                    O = W * Y / r;
                R.animate = {
                    delay: R.part[0].wizards_delay[0],
                    duration: K,
                    begin: {
                        left: 0,
                        top: 0,
                        width: V,
                        height: U,
                        scale: 1,
                        rotateX: 0,
                        rotateY: 0,
                        translate3d: [0, 0, p ? b : 0]
                    },
                    half: {
                        left: y[S].halfLeft * V,
                        top: y[S].halfTop * U,
                        scale: y[S].halfScale,
                        rotateX: y[S].rotateX / 2,
                        rotateY: y[S].rotateY / 2,
                        translate3d: [0, 0, (p ? 1 : 0.5) * b]
                    },
                    end: {
                        left: 0,
                        top: 0,
                        scale: 1,
                        rotateX: y[S].rotateX,
                        rotateY: y[S].rotateY,
                        translate3d: [0, 0, b]
                    }
                };
                R.front.find("img").css(N);
                R.back.css("backfaceVisibility", "hidden").find("img").css(N);
                R.part.css({
                    width: R.animate.begin.width,
                    height: R.animate.begin.height,
                    left: R.animate.begin.left,
                    top: R.animate.begin.top
                })
            }
        }
        e(aa, P)
    }
    var d;
    this.go = function(X, M) {
        if (d) {
            return M
        }
        o.show();
        var K = h(s.get(M));
        K = {
            width: K.width(),
            height: K.height(),
            marginTop: parseFloat(K.css("marginTop")),
            marginLeft: parseFloat(K.css("marginLeft"))
        };
        if (q) {
            G[0].front.find("img").on("load", function() {
                u.hide()
            });
            for (var N in G) {
                if (typeof G[N] !== "function") {
                    G[N].front.find("img").attr("src", s.get(M).src);
                    G[N].back.find("img").attr("src", s.get(X).src)
                }
            }
            if (!x[M]) {
                x[M] = C(M)
            }
            d = new k(G, M, K, function() {
                u.show();
                n.trigger("effectEnd");
                o.hide();
                for (var i in G) {
                    if (typeof G[i] !== "function") {
                        G[i].part.css({
                            transition: "",
                            transform: "rotateX(0) rotateY(0) translate3d(0,0,0)"
                        })
                    }
                }
                d = 0
            })
        } else {
            d = true;

            function Y(j, i) {
                return Math.random() * (i - j + 1) + j
            }
            var T = g.width(),
                W = g.height(),
                S = T / a,
                V = W / r,
                L = T - S * (a - 1),
                U = W - V * (r - 1);
            o.css({
                width: T,
                height: W
            });
            var J = 0;
            for (var N in G) {
                var R = N % a,
                    P = Math.floor(N / a);
                G[N].front.find("img").attr("src", s.get(X).src).css(K);
                var Z = f.duration * (1 - Math.abs((c * H - R * P) / (2 * r * a)));
                var Q = Y(-1, 1) > 0 ? 1 : -1;
                var O = Y(-1, 1) > 0 ? 1 : -1;
                G[N].wrapper.css({
                    width: S,
                    height: V
                });
                G[N].part.css({
                    position: "absolute",
                    top: Q * V,
                    left: O * S,
                    opacity: 0,
                    width: S,
                    height: V
                }).animate({
                    top: 0,
                    left: 0,
                    opacity: 1
                }, Z, function() {
                    J++;
                    if (J == r * a) {
                        u.stop(1, 1);
                        d = false;
                        n.trigger("effectEnd")
                    }
                })
            }
        }
    };

    function F(S, J) {
        J = J || {};
        var U = 1,
            M = J.exclude || [],
            R;
        var O = document.createElement("canvas"),
            L = O.getContext("2d"),
            K = O.width = S.naturalWidth,
            Y = O.height = S.naturalHeight;
        L.drawImage(S, 0, 0, S.naturalWidth, S.naturalHeight);
        try {
            R = L.getImageData(J.x ? J.x : 0, J.y ? J.y : 0, J.w ? J.w : S.width, J.h ? J.h : S.height)["data"]
        } catch (T) {
            console.log("error:unable to access image data: " + T);
            return "#ccc"
        }
        var N = (J.w ? J.w : S.width * J.h ? J.h : S.height) || R.length,
            P = {},
            W = "",
            V = [],
            j = {
                dominant: {
                    name: "",
                    count: 0
                }
            };
        var Q = 0;
        while (Q < N) {
            V[0] = R[Q];
            V[1] = R[Q + 1];
            V[2] = R[Q + 2];
            W = V.join(",");
            if (W in P) {
                P[W] = P[W] + 1
            } else {
                P[W] = 1
            }
            if (M.indexOf(["rgb(", W, ")"].join("")) === -1) {
                var X = P[W];
                if (X > j.dominant.count) {
                    j.dominant.name = W;
                    j.dominant.count = X
                }
            }
            Q += U * 4
        }
        return ["rgb(", j.dominant.name, ")"].join("")
    }
};

function wizards_collage(r, I, A) {
    var y = jQuery,
        f = y(this),
        C = y(".wizards_list", A),
        m = r.maxQuality || true,
        u = r.maxPreload || 20,
        E = !r.noCanvas && document.createElement("canvas").getContext,
        e = 10,
        F = false,
        M = 0.3,
        l = 0.7,
        w = -180,
        a = 180,
        d = I.length,
        S = [];
    var v = y("<div>").addClass("wizards_effect wizards_collage").css({
        position: "absolute",
        width: "100%",
        height: "100%",
        left: 0,
        top: 0,
        overflow: "hidden",
        "z-index": 8
    }).appendTo(A);

    function H(x, j, i) {
        return parseFloat(i * (j - x) + x)
    }

    function R(W, V, N) {
        var i = N * V.x,
            X = N * V.y,
            j = N * V.width,
            U = N * V.height;
        if (E) {
            W.save();
            W.translate(i + 0.5 * j, X + 0.5 * U);
            W.rotate(V.angle * Math.PI / 180);
            W.scale(V.scale, V.scale);
            if (V.img) {
                W.drawImage(V.img, -0.5 * j, -0.5 * U, j, U)
            }
            W.restore()
        } else {
            y("<img>").attr("src", V.img).css({
                position: "absolute",
                width: 100 * j / r.width + "%",
                height: 100 * U / r.height + "%",
                left: 100 * i / r.width + "%",
                top: 100 * X / r.height + "%"
            }).appendTo(W)
        }
    }

    function c(V, Y, U, N, W, Z) {
        var x = S[V],
            X = S[Y],
            i = new Date;
        if (E) {
            var j = y(I[Y]);
            j = {
                width: j.width(),
                height: j.height(),
                marginTop: parseFloat(j.css("marginTop")),
                marginLeft: parseFloat(j.css("marginLeft"))
            };
            y(t).css(j)
        }
        wizAnimate(function(aa) {
            var aj = 1 - 2 * aa;
            if (aj < 0) {
                aj *= -1;
                if (aj > 1) {
                    aj = 1
                }
            }
            aj = jQuery.easing.easeInOutQuad(1, aj, 0, 1, 1);
            aa = jQuery.easing.easeInOutQuad(1, aa, 0, 1, 1);
            if (E) {
                o.width = N;
                o.height = W;
                t.width = N;
                t.height = W;
                var ab = H(r.width / X.width, r.width / x.width, aa),
                    ac = H(0.5, H(1 / X.scale, 1 / x.scale, aa), aj),
                    ag = H(1 / X.scale, 1 / x.scale, aa),
                    ah = H(X.angle, x.angle, aa),
                    ai = U * x.width,
                    ad = U * x.height,
                    af = U * H(X.x, x.x, aa),
                    ae = U * H(X.y, x.y, aa);
                if (Q && k) {
                    o.ctx.drawImage(k, 0, 0, N, W);
                    o.ctx.save();
                    o.ctx.translate(af + 0.5 * ai, ae + 0.5 * ad);
                    o.ctx.rotate(-ah * Math.PI / 180);
                    o.ctx.scale(ag, ag);
                    o.ctx.translate(-(af + 0.5 * ai), -(ae + 0.5 * ad));
                    o.ctx.transform(ag, 0, 0, ag, -af * ag, -ae * ag);
                    o.ctx.drawImage(k, -N, -W, N * 4, W * 4);
                    o.ctx.restore()
                }
                o.ctx.transform(ab, 0, 0, ab, -af * ab, -ae * ab);
                o.ctx.translate(af + 0.5 * ai, ae + 0.5 * ad);
                o.ctx.rotate(-ah * Math.PI / 180);
                o.ctx.scale(ac, ac);
                o.ctx.translate(-(af + 0.5 * ai), -(ae + 0.5 * ad));
                o.ctx.globalAlpha = H(0.2, 1, aj);
                if (m) {
                    for (P in S) {
                        R(o.ctx, S[P], U)
                    }
                } else {
                    o.ctx.drawImage(L, 0, 0)
                }
                o.ctx.globalAlpha = 1;
                o.ctx.globalAlpha = H(0, 1, aj);
                R(o.ctx, x, U);
                o.ctx.globalAlpha = H(1, 0, aa * 2 > 1 ? 1 : aa * 2);
                R(o.ctx, X, U);
                o.ctx.globalAlpha = 1;
                t.ctx.drawImage(o, 0, 0)
            } else {
                var ak = H(2, N / (X.width * U), aj),
                    af = -U * H(X.x, x.x, aa) * ak,
                    ae = -U * H(X.y, x.y, aa) * ak,
                    ai = N * ak,
                    ad = W * ak;
                t.css({
                    left: af,
                    top: ae,
                    width: ai,
                    height: ad
                })
            }
            v.show()
        }, 0, 1, r.duration, function() {
            Z()
        })
    }

    function B(V, i, U, j, N) {
        if (V > i || !S[V] || S[V].img) {
            return
        }
        var x = new Image();
        x.onload = function() {
            S[V].img = x;
            if (U && V != N[0] && V != N[1]) {
                R(j, S[V], 1);
                B(V + 1, i, true, j, N)
            } else {
                B(V + 1, i, false)
            }
        };
        x.onerror = function() {
            if (U && V != N[0] && V != N[1]) {
                R(j, S[V], 1);
                B(V + 1, i, true, j, N)
            } else {
                B(V + 1, i, false)
            }
        };
        x.src = I[V].src
    }
    var q = 0,
        p = 0,
        s = r.width / (Math.sqrt(d) + 1),
        z = r.height / (Math.sqrt(d) + 1),
        b = Math.floor(r.width / s);
    for (P = 0; P < d; P++) {
        if (s + q > s * b) {
            p = Math.floor(s * (P + 1) / r.width) * z;
            q = 0
        }
        S[P] = {
            x: q,
            y: p,
            width: s,
            height: z,
            img: null
        };
        if (E) {
            S[P].scale = H(M, l, Math.random());
            S[P].angle = H(w, a, Math.random())
        }
        q += parseFloat(s)
    }
    for (var O, D, P = S.length; P; O = parseInt(Math.random() * P), D = S[--P], S[P] = S[O], S[O] = D) {}
    if (E) {
        var t = y("<canvas>")[0];
        t.ctx = t.getContext("2d");
        t.width = v.width();
        t.height = v.height();
        var o = y("<canvas>")[0];
        o.ctx = o.getContext("2d");
        o.width = v.width();
        o.height = v.height();
        var k = y("<canvas>")[0];
        k.ctx = k.getContext("2d");
        k.width = v.width();
        k.height = v.height();
        if (!m) {
            var L = y("<canvas>")[0];
            L.ctx = L.getContext("2d");
            L.width = v.width();
            L.height = v.height()
        }
        v.append(t)
    } else {
        var t = v.clone().removeClass("wizards_effect").css({
            overflow: "visible"
        });
        v.css("display", "none").append(t);
        for (P in S) {
            S[P].img = I[P].src;
            R(t, S[P], 1)
        }
        var h = (d % b == "undefined" ? 0 : d % b);
        startRight = 0, bottomAddCount = 2 * b - h, rightAddCount = Math.ceil(d / b) + 1;
        for (var P = 0; P < bottomAddCount; P++) {
            R(t, {
                img: I[P % I.length].src,
                width: s,
                height: z,
                x: s * ((h + P) % b),
                y: p + Math.floor((h + P) / b) * z
            }, 1)
        }
        for (var P = 0; P < bottomAddCount; P++) {
            R(t, {
                img: I[P % I.length].src,
                width: s,
                height: z,
                x: s * b,
                y: P * z
            }, 1)
        }
    }
    var G, Q;
    this.go = function(x, U) {
        if (G) {
            return -1
        }
        if (r.images) {
            S[x].img = I[x]
        }
        if (window.XMLHttpRequest) {
            if (E) {
                var N = r.width,
                    j = r.height,
                    i = 1;
                B(U, U, false);
                B(x, x, false);
                if (m) {
                    B(2, u + 1, false)
                } else {
                    L.width = N;
                    L.height = j;
                    B(2, u + 1, true, L.ctx, [U, x])
                }
                if (!Q && !F) {
                    rand = Math.round(H(0, d - 1, Math.random()));
                    k.width = v.width();
                    k.height = v.height();
                    Q = J(y(I[rand]), e, k)
                }
            } else {
                var N = A.width(),
                    j = A.height(),
                    i = N / r.width
            }
            G = new c(x, U, i, N, j, function V() {
                f.trigger("effectEnd");
                v.hide();
                G = 0;
                if (!m && E) {
                    for (i in S) {
                        S[i].img = null
                    }
                }
            })
        } else {
            G = 0;
            C.stop(true).animate({
                left: (x ? -x + "00%" : (/Safari/.test(navigator.userAgent) ? "0%" : 0))
            }, r.duration, "easeInOutExpo", function() {
                f.trigger("effectEnd")
            })
        }
    };

    function J(i, x, j) {
        if (E) {
            j.ctx.drawImage(i.get(0), 0, 0);
            if (!n(j.ctx, 0, 0, j.width, j.height, x)) {
                j.ctx.drawImage(i.get(0), 0, 0)
            }
            return true
        }
        return cont
    }
    var g = [512, 512, 456, 512, 328, 456, 335, 512, 405, 328, 271, 456, 388, 335, 292, 512, 454, 405, 364, 328, 298, 271, 496, 456, 420, 388, 360, 335, 312, 292, 273, 512, 482, 454, 428, 405, 383, 364, 345, 328, 312, 298, 284, 271, 259, 496, 475, 456, 437, 420, 404, 388, 374, 360, 347, 335, 323, 312, 302, 292, 282, 273, 265, 512, 497, 482, 468, 454, 441, 428, 417, 405, 394, 383, 373, 364, 354, 345, 337, 328, 320, 312, 305, 298, 291, 284, 278, 271, 265, 259, 507, 496, 485, 475, 465, 456, 446, 437, 428, 420, 412, 404, 396, 388, 381, 374, 367, 360, 354, 347, 341, 335, 329, 323, 318, 312, 307, 302, 297, 292, 287, 282, 278, 273, 269, 265, 261, 512, 505, 497, 489, 482, 475, 468, 461, 454, 447, 441, 435, 428, 422, 417, 411, 405, 399, 394, 389, 383, 378, 373, 368, 364, 359, 354, 350, 345, 341, 337, 332, 328, 324, 320, 316, 312, 309, 305, 301, 298, 294, 291, 287, 284, 281, 278, 274, 271, 268, 265, 262, 259, 257, 507, 501, 496, 491, 485, 480, 475, 470, 465, 460, 456, 451, 446, 442, 437, 433, 428, 424, 420, 416, 412, 408, 404, 400, 396, 392, 388, 385, 381, 377, 374, 370, 367, 363, 360, 357, 354, 350, 347, 344, 341, 338, 335, 332, 329, 326, 323, 320, 318, 315, 312, 310, 307, 304, 302, 299, 297, 294, 292, 289, 287, 285, 282, 280, 278, 275, 273, 271, 269, 267, 265, 263, 261, 259];
    var K = [9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17, 17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24];

    function n(aI, ap, an, j, N, az) {
        if (isNaN(az) || az < 1) {
            return
        }
        az |= 0;
        var aD;
        try {
            aD = aI.getImageData(ap, an, j, N)
        } catch (aH) {
            console.log("error:unable to access image data: " + aH);
            return false
        }
        var X = aD.data;
        var ax, aw, aF, aC, ae, ah, ab, V, W, am, ac, ao, ak, at, ay, af, aa, ag, ai, ar;
        var aG = az + az + 1;
        var au = j << 2;
        var ad = j - 1;
        var aB = N - 1;
        var Z = az + 1;
        var aA = Z * (Z + 1) / 2;
        var aq = new T();
        var al = aq;
        for (aF = 1; aF < aG; aF++) {
            al = al.next = new T();
            if (aF == Z) {
                var Y = al
            }
        }
        al.next = aq;
        var aE = null;
        var av = null;
        ab = ah = 0;
        var aj = g[az];
        var U = K[az];
        for (aw = 0; aw < N; aw++) {
            at = ay = af = V = W = am = 0;
            ac = Z * (aa = X[ah]);
            ao = Z * (ag = X[ah + 1]);
            ak = Z * (ai = X[ah + 2]);
            V += aA * aa;
            W += aA * ag;
            am += aA * ai;
            al = aq;
            for (aF = 0; aF < Z; aF++) {
                al.r = aa;
                al.g = ag;
                al.b = ai;
                al = al.next
            }
            for (aF = 1; aF < Z; aF++) {
                aC = ah + ((ad < aF ? ad : aF) << 2);
                V += (al.r = (aa = X[aC])) * (ar = Z - aF);
                W += (al.g = (ag = X[aC + 1])) * ar;
                am += (al.b = (ai = X[aC + 2])) * ar;
                at += aa;
                ay += ag;
                af += ai;
                al = al.next
            }
            aE = aq;
            av = Y;
            for (ax = 0; ax < j; ax++) {
                X[ah] = (V * aj) >> U;
                X[ah + 1] = (W * aj) >> U;
                X[ah + 2] = (am * aj) >> U;
                V -= ac;
                W -= ao;
                am -= ak;
                ac -= aE.r;
                ao -= aE.g;
                ak -= aE.b;
                aC = (ab + ((aC = ax + az + 1) < ad ? aC : ad)) << 2;
                at += (aE.r = X[aC]);
                ay += (aE.g = X[aC + 1]);
                af += (aE.b = X[aC + 2]);
                V += at;
                W += ay;
                am += af;
                aE = aE.next;
                ac += (aa = av.r);
                ao += (ag = av.g);
                ak += (ai = av.b);
                at -= aa;
                ay -= ag;
                af -= ai;
                av = av.next;
                ah += 4
            }
            ab += j
        }
        for (ax = 0; ax < j; ax++) {
            ay = af = at = W = am = V = 0;
            ah = ax << 2;
            ac = Z * (aa = X[ah]);
            ao = Z * (ag = X[ah + 1]);
            ak = Z * (ai = X[ah + 2]);
            V += aA * aa;
            W += aA * ag;
            am += aA * ai;
            al = aq;
            for (aF = 0; aF < Z; aF++) {
                al.r = aa;
                al.g = ag;
                al.b = ai;
                al = al.next
            }
            ae = j;
            for (aF = 1; aF <= az; aF++) {
                ah = (ae + ax) << 2;
                V += (al.r = (aa = X[ah])) * (ar = Z - aF);
                W += (al.g = (ag = X[ah + 1])) * ar;
                am += (al.b = (ai = X[ah + 2])) * ar;
                at += aa;
                ay += ag;
                af += ai;
                al = al.next;
                if (aF < aB) {
                    ae += j
                }
            }
            ah = ax;
            aE = aq;
            av = Y;
            for (aw = 0; aw < N; aw++) {
                aC = ah << 2;
                X[aC] = (V * aj) >> U;
                X[aC + 1] = (W * aj) >> U;
                X[aC + 2] = (am * aj) >> U;
                V -= ac;
                W -= ao;
                am -= ak;
                ac -= aE.r;
                ao -= aE.g;
                ak -= aE.b;
                aC = (ax + (((aC = aw + Z) < aB ? aC : aB) * j)) << 2;
                V += (at += (aE.r = X[aC]));
                W += (ay += (aE.g = X[aC + 1]));
                am += (af += (aE.b = X[aC + 2]));
                aE = aE.next;
                ac += (aa = av.r);
                ao += (ag = av.g);
                ak += (ai = av.b);
                at -= aa;
                ay -= ag;
                af -= ai;
                av = av.next;
                ah += j
            }
        }
        aI.putImageData(aD, ap, an);
        return true
    }

    function T() {
        this.r = 0;
        this.g = 0;
        this.b = 0;
        this.a = 0;
        this.next = null
    }
}
jQuery.extend(jQuery.easing, {
    easeInOutQuad: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f + a
        }
        return -h / 2 * ((--f) * (f - 2) - 1) + a
    }
});

function wizards_kenburns(d, l, m) {
    var e = jQuery;
    var g = e(this);
    var f = document.createElement("canvas").getContext;
    var i = e("<div>").css({
        position: "absolute",
        top: 0,
        left: 0,
        width: "100%",
        height: "100%",
        overflow: "hidden"
    }).addClass("wizards_effect wizards_kenburns").appendTo(m);
    var o = d.paths || [{
        from: [0, 0, 1],
        to: [0, 0, 1.2]
    }, {
        from: [0, 0, 1.2],
        to: [0, 0, 1]
    }, {
        from: [1, 0, 1],
        to: [1, 0, 1.2]
    }, {
        from: [0, 1, 1.2],
        to: [0, 1, 1]
    }, {
        from: [1, 1, 1],
        to: [1, 1, 1.2]
    }, {
        from: [0.5, 1, 1],
        to: [0.5, 1, 1.3]
    }, {
        from: [1, 0.5, 1.2],
        to: [1, 0.5, 1]
    }, {
        from: [1, 0.5, 1],
        to: [1, 0.5, 1.2]
    }, {
        from: [0, 0.5, 1.2],
        to: [0, 0.5, 1]
    }, {
        from: [1, 0.5, 1.2],
        to: [1, 0.5, 1]
    }, {
        from: [0.5, 0.5, 1],
        to: [0.5, 0.5, 1.2]
    }, {
        from: [0.5, 0.5, 1.3],
        to: [0.5, 0.5, 1]
    }, {
        from: [0.5, 1, 1],
        to: [0.5, 0, 1.15]
    }];

    function c(h) {
        return o[h ? Math.floor(Math.random() * (f ? o.length : Math.min(5, o.length))) : 0]
    }
    var k = d.width,
        p = d.height;
    var j, b;
    var a, r;

    function n() {
        a = e('<div style="width:100%;height:100%"></div>').css({
            "z-index": 8,
            position: "absolute",
            left: 0,
            top: 0
        }).appendTo(i)
    }
    n();

    function s(w, t, h) {
        var u = {
            width: 100 * w[2] + "%"
        };
        u[t ? "right" : "left"] = -100 * (w[2] - 1) * (t ? (1 - w[0]) : w[0]) + "%";
        u[h ? "bottom" : "top"] = -100 * (w[2] - 1) * (h ? (1 - w[1]) : w[1]) + "%";
        if (!f) {
            for (var v in u) {
                if (/\%/.test(u[v])) {
                    u[v] = (/right|left|width/.test(v) ? k : p) * parseFloat(u[v]) / 100 + "px"
                }
            }
        }
        return u
    }

    function q(w, z, A) {
        var t = e(w);
        t = {
            width: t.width(),
            height: t.height(),
            marginTop: t.css("marginTop"),
            marginLeft: t.css("marginLeft")
        };
        if (f) {
            if (b) {
                b.stop(1)
            }
            b = j
        }
        if (r) {
            r.remove()
        }
        r = a;
        n();
        if (A) {
            a.hide();
            r.stop(true, true)
        }
        if (f) {
            var y, x;
            var u, h;
            u = e('<canvas width="' + k + '" height="' + p + '"/>');
            u.css({
                position: "absolute",
                left: 0,
                top: 0
            }).css(t).appendTo(a);
            y = u.get(0).getContext("2d");
            h = u.clone().appendTo(a);
            x = h.get(0).getContext("2d");
            j = wizAnimate(function(B) {
                var D = [z.from[0] * (1 - B) + B * z.to[0], z.from[1] * (1 - B) + B * z.to[1], z.from[2] * (1 - B) + B * z.to[2]];
                x.drawImage(w, -k * (D[2] - 1) * D[0], -p * (D[2] - 1) * D[1], k * D[2], p * D[2]);
                y.clearRect(0, 0, k, p);
                var C = y;
                y = x;
                x = C
            }, 0, 1, d.duration + d.delay * 2)
        } else {
            k = t.width;
            p = t.height;
            var v = e('<img src="' + w.src + '"/>').css({
                position: "absolute",
                left: "auto",
                right: "auto",
                top: "auto",
                bottom: "auto"
            }).appendTo(a).css(s(z.from, z.from[0] > 0.5, z.from[1] > 0.5)).animate(s(z.to, z.from[0] > 0.5, z.from[1] > 0.5), {
                easing: "linear",
                queue: false,
                duration: (1.5 * d.duration + d.delay)
            })
        }
        if (A) {
            a.fadeIn(d.duration)
        }
    }
    if (d.effect.length == 1) {
        e(function() {
            l.each(function(h) {
                e(this).css({
                    visibility: "hidden"
                });
                if (h == d.startSlide) {
                    q(this, c(h), 0)
                }
            })
        })
    }
    this.go = function(h, t) {
        setTimeout(function() {
            g.trigger("effectEnd")
        }, d.duration);
        q(l.get(h), c(h), 1)
    }
};

function wizards_cube(p, k, b) {
    var e = jQuery,
        j = e(this),
        a = / Slider/g.test(navigator.userAgent),
        l = !(/iPhone|iPod|iPad|Android|BlackBerry/).test(navigator.userAgent) && !a,
        g = e(".wizards_list", b),
        c = p.perspective || 2000,
        d = {
            position: "absolute",
            backgroundSize: "cover",
            left: 0,
            top: 0,
            width: "100%",
            height: "100%",
            backfaceVisibility: "hidden"
        };
    var o = {
        domPrefixes: " Webkit Moz ms O Khtml".split(" "),
        testDom: function(r) {
            var q = this.domPrefixes.length;
            while (q--) {
                if (typeof document.body.style[this.domPrefixes[q] + r] !== "undefined") {
                    return true
                }
            }
            return false
        },
        cssTransitions: function() {
            return this.testDom("Transition")
        },
        cssTransforms3d: function() {
            var r = (typeof document.body.style.perspectiveProperty !== "undefined") || this.testDom("Perspective");
            if (r && /AppleWebKit/.test(navigator.userAgent)) {
                var t = document.createElement("div"),
                    q = document.createElement("style"),
                    s = "Test3d" + Math.round(Math.random() * 99999);
                q.textContent = "@media (-webkit-transform-3d){#" + s + "{height:3px}}";
                document.getElementsByTagName("head")[0].appendChild(q);
                t.id = s;
                document.body.appendChild(t);
                r = t.offsetHeight === 3;
                q.parentNode.removeChild(q);
                t.parentNode.removeChild(t)
            }
            return r
        },
        webkit: function() {
            return /AppleWebKit/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent)
        }
    };
    var f = (o.cssTransitions() && o.cssTransforms3d()),
        m = o.webkit();
    var i = e("<div>").css(d).css({
        transformStyle: "preserve-3d",
        perspective: (m && !a ? "none" : c),
        zIndex: 8
    });
    e("<div>").addClass("wizards_effect wizards_cube").css(d).append(i).appendTo(b);
    if (!f && p.fallback) {
        return new p.fallback(p, k, b)
    }

    function n(q, r, t, s) {
        return "inset " + (-s * q * 1.2 / 90) + "px " + (t * r * 1.2 / 90) + "px " + (q + r) / 20 + "px rgba(" + ((t < s) ? "0,0,0,.6" : (t > s) ? "255,255,255,0.8" : "0,0,0,.0") + ")"
    }
    var h;
    this.go = function(B, y) {
        var t = e(k[y]);
        t = {
            width: t.width(),
            height: t.height(),
            marginTop: parseFloat(t.css("marginTop")),
            marginLeft: parseFloat(t.css("marginLeft"))
        };

        function s(S, F, H, I, G, E, Q, R, P, O) {
            S.parent().css("perspective", c);
            var N = S.width(),
                K = S.height();
            F.front.css({
                transform: "translate3d(0,0,0) rotateY(0deg) rotateX(0deg)"
            });
            F.back.css({
                opacity: 1,
                transform: "translate3d(0,0,0) rotateY(" + Q + "deg) rotateX(" + E + "deg)"
            });
            if (l) {
                var J = e("<div>").css(d).css("boxShadow", n(N, K, 0, 0)).appendTo(F.front);
                var M = e("<div>").css(d).css("boxShadow", n(N, K, E, Q)).appendTo(F.back)
            }
            if (m && !/WIZ Slider/g.test(navigator.userAgent)) {
                S.css({
                    transform: "translateZ(-" + H + "px)"
                })
            }
            var L = setTimeout(function() {
                var w = "all " + p.duration + "ms cubic-bezier(0.645, 0.045, 0.355, 1.000)";
                F.front.css({
                    transition: w,
                    boxShadow: l ? n(N, K, R, P) : "",
                    transform: "rotateX(" + R + "deg) rotateY(" + P + "deg)",
                    zIndex: 0
                });
                F.back.css({
                    transition: w,
                    boxShadow: l ? n(N, K, 0, 0) : "",
                    transform: "rotateY(0deg) rotateX(0deg)",
                    zIndex: 20
                });
                if (l) {
                    J.css({
                        transition: w,
                        boxShadow: n(N, K, R, P)
                    });
                    M.css({
                        transition: w,
                        boxShadow: n(N, K, 0, 0)
                    })
                }
                L = setTimeout(O, p.duration)
            }, 20);
            return {
                stop: function() {
                    clearTimeout(L);
                    O()
                }
            }
        }
        if (f) {
            if (h) {
                h.stop()
            }
            var C = b.width(),
                z = b.height();
            var x = {
                left: [C / 2, C / 2, 0, 0, 90, 0, -90],
                right: [C / 2, -C / 2, 0, 0, -90, 0, 90],
                down: [z / 2, 0, -z / 2, 90, 0, -90, 0],
                up: [z / 2, 0, z / 2, -90, 0, 90, 0]
            }[p.direction || ["left", "right", "down", "up"][Math.floor(Math.random() * 4)]];
            var D = e("<img>").css(t),
                v = e("<img>").css(t).attr("src", k.get(B).src);
            var q = e("<div>").css({
                overflow: "hidden",
                transformOrigin: "50% 50% -" + x[0] + "px",
                zIndex: 20
            }).css(d).append(D).appendTo(i);
            var r = e("<div>").css({
                overflow: "hidden",
                transformOrigin: "50% 50% -" + x[0] + "px",
                zIndex: 0
            }).css(d).append(v).appendTo(i);
            D.on("load", function() {
                g.hide()
            });
            D.attr("src", k.get(y).src).load();
            i.parent().show();
            h = new s(i, {
                front: q,
                back: r
            }, x[0], x[1], x[2], x[3], x[4], x[5], x[6], function() {
                j.trigger("effectEnd");
                i.empty().parent().hide();
                h = 0
            })
        } else {
            i.css({
                position: "absolute",
                display: "none",
                zIndex: 2,
                width: "100%",
                height: "100%"
            });
            i.stop(1, 1);
            var u = (!!((B - y + 1) % k.length) ^ p.revers ? "left" : "right");
            var q = e("<div>").css({
                position: "absolute",
                left: "0%",
                right: "auto",
                top: 0,
                width: "100%",
                height: "100%"
            }).css(u, 0).append(e(k[y]).clone().css({
                width: 100 * t.width / b.width() + "%",
                height: 100 * t.height / b.height() + "%",
                marginLeft: 100 * t.marginLeft / b.width() + "%"
            })).appendTo(i);
            var A = e("<div>").css({
                position: "absolute",
                left: "100%",
                right: "auto",
                top: 0,
                width: "0%",
                height: "100%"
            }).append(e(k[B]).clone().css({
                width: 100 * t.width / b.width() + "%",
                height: 100 * t.height / b.height() + "%",
                marginLeft: 100 * t.marginLeft / b.width() + "%"
            })).appendTo(i);
            i.css({
                left: "auto",
                right: "auto",
                top: 0
            }).css(u, 0).show();
            i.show();
            g.hide();
            A.animate({
                width: "100%",
                left: 0
            }, p.duration, "easeInOutExpo", function() {
                e(this).remove()
            });
            q.animate({
                width: 0
            }, p.duration, "easeInOutExpo", function() {
                j.trigger("effectEnd");
                i.empty().hide()
            })
        }
    }
};

function wizards_blur(r, p, c) {
    var h = jQuery;
    var o = h(this);
    var n = h("<div>").addClass("wizards_effect wizards_blur").css({
        position: "absolute",
        overflow: "hidden",
        top: 0,
        left: 0,
        width: "100%",
        height: "100%"
    }).appendTo(c);
    var b = !r.noCanvas && !window.opera && !!document.createElement("canvas").getContext;
    if (b) {
        try {
            document.createElement("canvas").getContext("2d").getImageData(0, 0, 1, 1)
        } catch (m) {
            b = 0
        }
    }
    var d;

    function k(s, e, t) {
        wizAnimate(s.css({
            visibility: "visible"
        }), {
            opacity: 0
        }, {
            opacity: 1
        }, e, t)
    }

    function i(s, e, t) {
        wizAnimate(s, {
            opacity: 1
        }, {
            opacity: 0
        }, e, t)
    }
    var l;
    this.go = function(e, s) {
        if (l) {
            return -1
        }
        l = 1;
        var w = h(p.get(s)),
            u = h(p.get(e)),
            x = {
                width: w.width(),
                height: w.height(),
                marginTop: w.css("marginTop"),
                marginLeft: w.css("marginLeft")
            };
        var v;
        if (b) {
            if (!d) {
                d = '<canvas width="' + x.width + '" height="' + x.height + '"/>';
                d = h(d + d).css({
                    "z-index": 8,
                    position: "absolute",
                    left: 0,
                    top: 0,
                    visibility: "hidden"
                }).appendTo(n)
            }
            d.css(x).attr({
                width: x.width,
                height: x.height
            });
            v = g(w, x, 30, d.get(0))
        }
        if (b && v) {
            var t = g(u, x, 30, d.get(1));
            k(v, r.duration / 3, function() {
                c.find(".wizards_list").css({
                    visibility: "hidden"
                });
                i(v, r.duration / 6);
                k(t, r.duration / 6, function() {
                    v.css({
                        visibility: "hidden"
                    });
                    c.find(".wizards_list").css({
                        visibility: "visible"
                    });
                    o.trigger("effectEnd", {
                        delay: r.duration / 2
                    });
                    i(t, r.duration / 2, function() {
                        l = 0
                    })
                })
            })
        } else {
            b = 0;
            v = g(w, x, 8);
            v.fadeIn(r.duration / 3, "linear", function() {
                o.trigger("effectEnd", {
                    delay: r.duration / 3
                });
                v.fadeOut(r.duration / 3, "linear", function() {
                    v.remove();
                    l = 0
                })
            })
        }
    };

    function g(z, v, w, s) {
        var C = (parseInt(z.parent().css("z-index")) || 0) + 1;
        if (b) {
            var F = s.getContext("2d");
            F.drawImage(z.get(0), 0, 0, v.width, v.height);
            if (!j(F, 0, 0, s.width, s.height, w)) {
                return 0
            }
            return h(s)
        }
        var G = h("<div></div>").css({
            position: "absolute",
            "z-index": C,
            left: 0,
            top: 0,
            display: "none"
        }).css(v).appendTo(n);
        var E = (Math.sqrt(5) + 1) / 2;
        var t = 1 - E / 2;
        for (var u = 0; t * u < w; u++) {
            var A = Math.PI * E * u;
            var e = (t * u + 1);
            var D = e * Math.cos(A);
            var B = e * Math.sin(A);
            h(document.createElement("img")).attr("src", z.attr("src")).css({
                opacity: 1 / (u / 1.8 + 1),
                position: "absolute",
                "z-index": C,
                left: Math.round(D) + "px",
                top: Math.round(B) + "px",
                width: "100%",
                height: "100%"
            }).appendTo(G)
        }
        return G
    }
    var q = [512, 512, 456, 512, 328, 456, 335, 512, 405, 328, 271, 456, 388, 335, 292, 512, 454, 405, 364, 328, 298, 271, 496, 456, 420, 388, 360, 335, 312, 292, 273, 512, 482, 454, 428, 405, 383, 364, 345, 328, 312, 298, 284, 271, 259, 496, 475, 456, 437, 420, 404, 388, 374, 360, 347, 335, 323, 312, 302, 292, 282, 273, 265, 512, 497, 482, 468, 454, 441, 428, 417, 405, 394, 383, 373, 364, 354, 345, 337, 328, 320, 312, 305, 298, 291, 284, 278, 271, 265, 259, 507, 496, 485, 475, 465, 456, 446, 437, 428, 420, 412, 404, 396, 388, 381, 374, 367, 360, 354, 347, 341, 335, 329, 323, 318, 312, 307, 302, 297, 292, 287, 282, 278, 273, 269, 265, 261, 512, 505, 497, 489, 482, 475, 468, 461, 454, 447, 441, 435, 428, 422, 417, 411, 405, 399, 394, 389, 383, 378, 373, 368, 364, 359, 354, 350, 345, 341, 337, 332, 328, 324, 320, 316, 312, 309, 305, 301, 298, 294, 291, 287, 284, 281, 278, 274, 271, 268, 265, 262, 259, 257, 507, 501, 496, 491, 485, 480, 475, 470, 465, 460, 456, 451, 446, 442, 437, 433, 428, 424, 420, 416, 412, 408, 404, 400, 396, 392, 388, 385, 381, 377, 374, 370, 367, 363, 360, 357, 354, 350, 347, 344, 341, 338, 335, 332, 329, 326, 323, 320, 318, 315, 312, 310, 307, 304, 302, 299, 297, 294, 292, 289, 287, 285, 282, 280, 278, 275, 273, 271, 269, 267, 265, 263, 261, 259];
    var a = [9, 11, 12, 13, 13, 14, 14, 15, 15, 15, 15, 16, 16, 16, 16, 17, 17, 17, 17, 17, 17, 17, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 21, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 22, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 23, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24];

    function j(aj, R, P, s, t, aa) {
        if (isNaN(aa) || aa < 1) {
            return
        }
        aa |= 0;
        var ae;
        try {
            ae = aj.getImageData(R, P, s, t)
        } catch (ai) {
            console.log("error:unable to access image data: " + ai);
            return false
        }
        var z = ae.data;
        var Y, X, ag, ad, G, J, D, v, w, O, E, Q, M, U, Z, H, C, I, K, T;
        var ah = aa + aa + 1;
        var V = s << 2;
        var F = s - 1;
        var ac = t - 1;
        var B = aa + 1;
        var ab = B * (B + 1) / 2;
        var S = new f();
        var N = S;
        for (ag = 1; ag < ah; ag++) {
            N = N.next = new f();
            if (ag == B) {
                var A = N
            }
        }
        N.next = S;
        var af = null;
        var W = null;
        D = J = 0;
        var L = q[aa];
        var u = a[aa];
        for (X = 0; X < t; X++) {
            U = Z = H = v = w = O = 0;
            E = B * (C = z[J]);
            Q = B * (I = z[J + 1]);
            M = B * (K = z[J + 2]);
            v += ab * C;
            w += ab * I;
            O += ab * K;
            N = S;
            for (ag = 0; ag < B; ag++) {
                N.r = C;
                N.g = I;
                N.b = K;
                N = N.next
            }
            for (ag = 1; ag < B; ag++) {
                ad = J + ((F < ag ? F : ag) << 2);
                v += (N.r = (C = z[ad])) * (T = B - ag);
                w += (N.g = (I = z[ad + 1])) * T;
                O += (N.b = (K = z[ad + 2])) * T;
                U += C;
                Z += I;
                H += K;
                N = N.next
            }
            af = S;
            W = A;
            for (Y = 0; Y < s; Y++) {
                z[J] = (v * L) >> u;
                z[J + 1] = (w * L) >> u;
                z[J + 2] = (O * L) >> u;
                v -= E;
                w -= Q;
                O -= M;
                E -= af.r;
                Q -= af.g;
                M -= af.b;
                ad = (D + ((ad = Y + aa + 1) < F ? ad : F)) << 2;
                U += (af.r = z[ad]);
                Z += (af.g = z[ad + 1]);
                H += (af.b = z[ad + 2]);
                v += U;
                w += Z;
                O += H;
                af = af.next;
                E += (C = W.r);
                Q += (I = W.g);
                M += (K = W.b);
                U -= C;
                Z -= I;
                H -= K;
                W = W.next;
                J += 4
            }
            D += s
        }
        for (Y = 0; Y < s; Y++) {
            Z = H = U = w = O = v = 0;
            J = Y << 2;
            E = B * (C = z[J]);
            Q = B * (I = z[J + 1]);
            M = B * (K = z[J + 2]);
            v += ab * C;
            w += ab * I;
            O += ab * K;
            N = S;
            for (ag = 0; ag < B; ag++) {
                N.r = C;
                N.g = I;
                N.b = K;
                N = N.next
            }
            G = s;
            for (ag = 1; ag <= aa; ag++) {
                J = (G + Y) << 2;
                v += (N.r = (C = z[J])) * (T = B - ag);
                w += (N.g = (I = z[J + 1])) * T;
                O += (N.b = (K = z[J + 2])) * T;
                U += C;
                Z += I;
                H += K;
                N = N.next;
                if (ag < ac) {
                    G += s
                }
            }
            J = Y;
            af = S;
            W = A;
            for (X = 0; X < t; X++) {
                ad = J << 2;
                z[ad] = (v * L) >> u;
                z[ad + 1] = (w * L) >> u;
                z[ad + 2] = (O * L) >> u;
                v -= E;
                w -= Q;
                O -= M;
                E -= af.r;
                Q -= af.g;
                M -= af.b;
                ad = (Y + (((ad = X + B) < ac ? ad : ac) * s)) << 2;
                v += (U += (af.r = z[ad]));
                w += (Z += (af.g = z[ad + 1]));
                O += (H += (af.b = z[ad + 2]));
                af = af.next;
                E += (C = W.r);
                Q += (I = W.g);
                M += (K = W.b);
                U -= C;
                Z -= I;
                H -= K;
                W = W.next;
                J += s
            }
        }
        aj.putImageData(ae, R, P);
        return true
    }

    function f() {
        this.r = 0;
        this.g = 0;
        this.b = 0;
        this.a = 0;
        this.next = null
    }
};

function wizards_book(p, n, b) {
    var f = jQuery;
    var m = f(this);
    var i = f(".wizards_list", b);
    var k = f("<div>").addClass("wizards_effect wizards_book").css({
            position: "absolute",
            top: 0,
            left: 0,
            width: "100%",
            height: "100%"
        }).appendTo(b),
        e = p.duration,
        d = p.perspective || 0.4,
        g = p.shadow || 0.35,
        a = p.noCanvas || false,
        l = p.no3d || false;
    var o = {
        domPrefixes: " Webkit Moz ms O Khtml".split(" "),
        testDom: function(r) {
            var q = this.domPrefixes.length;
            while (q--) {
                if (typeof document.body.style[this.domPrefixes[q] + r] !== "undefined") {
                    return true
                }
            }
            return false
        },
        cssTransitions: function() {
            return this.testDom("Transition")
        },
        cssTransforms3d: function() {
            var r = (typeof document.body.style.perspectiveProperty !== "undefined") || this.testDom("Perspective");
            if (r && /AppleWebKit/.test(navigator.userAgent)) {
                var t = document.createElement("div"),
                    q = document.createElement("style"),
                    s = "Test3d" + Math.round(Math.random() * 99999);
                q.textContent = "@media (-webkit-transform-3d){#" + s + "{height:3px}}";
                document.getElementsByTagName("head")[0].appendChild(q);
                t.id = s;
                document.body.appendChild(t);
                r = t.offsetHeight === 3;
                q.parentNode.removeChild(q);
                t.parentNode.removeChild(t)
            }
            return r
        },
        canvas: function() {
            if (typeof document.createElement("canvas").getContext !== "undefined") {
                return true
            }
        }
    };
    if (!l) {
        l = o.cssTransitions() && o.cssTransforms3d()
    }
    if (!a) {
        a = o.canvas()
    }
    var j;
    this.go = function(r, q, E) {
        if (j) {
            return -1
        }
        var v = n.get(r),
            G = n.get(q);
        if (E == undefined) {
            E = (q == 0 && r != q + 1) || (r == q - 1)
        } else {
            E = !E
        }
        var s = f("<div>").appendTo(k);
        var t = f(v);
        t = {
            width: t.width(),
            height: t.height(),
            marginLeft: parseFloat(t.css("marginLeft")),
            marginTop: parseFloat(t.css("marginTop"))
        };
        if (l) {
            var y = {
                background: "#000",
                position: "absolute",
                left: 0,
                top: 0,
                width: "100%",
                height: "100%",
                transformStyle: "preserve-3d",
                zIndex: 3,
                outline: "1px solid transparent"
            };
            perspect = b.width() * (3 - d * 2);
            s.css(y).css({
                perspective: perspect,
                transform: "translate3d(0,0,0)"
            });
            var z = 90;
            var D = f("<div>").css(y).css({
                position: "relative",
                "float": "left",
                width: "50%",
                overflow: "hidden"
            }).append(f("<img>").attr("src", (E ? v : G).src).css(t)).appendTo(s);
            var C = f("<div>").css(y).css({
                position: "relative",
                "float": "left",
                width: "50%",
                overflow: "hidden"
            }).append(f("<img>").attr("src", (E ? G : v).src).css(t).css({
                marginLeft: -t.width / 2
            })).appendTo(s);
            var I = f("<div>").css(y).css({
                display: E ? "block" : "none",
                width: "50%",
                transform: "rotateY(" + (E ? 0.1 : z) + "deg)",
                transition: (E ? "ease-in " : "ease-out ") + e / 2000 + "s",
                transformOrigin: "right",
                overflow: "hidden"
            }).append(f("<img>").attr("src", (E ? G : v).src).css(t)).appendTo(s);
            var F = f("<div>").css(y).css({
                display: E ? "none" : "block",
                left: "50%",
                width: "50%",
                transform: "rotateY(-" + (E ? z : 0.1) + "deg)",
                transition: (E ? "ease-out " : "ease-in ") + e / 2000 + "s",
                transformOrigin: "left",
                overflow: "hidden"
            }).append(f("<img>").attr("src", (E ? v : G).src).css(t).css({
                marginLeft: -t.width / 2
            })).appendTo(s)
        } else {
            if (a) {
                var x = f("<div>").css({
                    position: "absolute",
                    top: 0,
                    left: E ? 0 : "50%",
                    width: "50%",
                    height: "100%",
                    overflow: "hidden",
                    zIndex: 6
                }).append(f(n.get(r)).clone().css({
                    position: "absolute",
                    height: "100%",
                    right: E ? "auto" : 0,
                    left: E ? 0 : "auto"
                })).appendTo(s).hide();
                var B = f("<div>").css({
                    position: "absolute",
                    width: "100%",
                    height: "100%",
                    left: 0,
                    top: 0,
                    zIndex: 8
                }).appendTo(s).hide();
                var H = f("<canvas>").css({
                    position: "absolute",
                    zIndex: 2,
                    left: 0,
                    top: -B.height() * d / 2
                }).attr({
                    width: B.width(),
                    height: B.height() * (d + 1)
                }).appendTo(B);
                var A = H.clone().css({
                    top: 0,
                    zIndex: 1
                }).attr({
                    width: B.width(),
                    height: B.height()
                }).appendTo(B);
                var w = H.get(0).getContext("2d");
                var u = A.get(0).getContext("2d")
            } else {
                i.stop(true).animate({
                    left: (r ? -r + "00%" : (/Safari/.test(navigator.userAgent) ? "0%" : 0))
                }, e, "easeInOutExpo")
            }
        }
        if (!l && a) {
            var D = w;
            var C = u;
            var I = G;
            var F = v
        }
        j = new h(E, z, D, C, I, F, B, H, A, x, t, function() {
            m.trigger("effectEnd");
            s.remove();
            j = 0
        })
    };

    function c(G, s, A, v, u, E, D, C, B, t, r) {
        numSlices = u / 2, widthScale = u / B, heightScale = (1 - E) / numSlices;
        G.clearRect(0, 0, r.width(), r.height());
        for (var q = 0; q < numSlices + widthScale; q++) {
            var z = (D ? q * p.width / u + p.width / 2 : (numSlices - q) * p.width / u);
            var H = A + (D ? 2 : -2) * q,
                F = v + t * heightScale * q / 2;
            if (z < 0) {
                z = 0
            }
            if (H < 0) {
                H = 0
            }
            if (F < 0) {
                F = 0
            }
            G.drawImage(s, z, 0, 2.5, p.height, H, F, 2, t * (1 - (heightScale * q)))
        }
        G.save();
        G.beginPath();
        G.moveTo(A, v);
        G.lineTo(A + (D ? 2 : -2) * (numSlices + widthScale), v + t * heightScale * (numSlices + widthScale) / 2);
        G.lineTo(A + (D ? 2 : -2) * (numSlices + widthScale), t * (1 - heightScale * (numSlices + widthScale)) + v + t * heightScale * (numSlices + widthScale) / 2);
        G.lineTo(A, v + t);
        G.closePath();
        G.clip();
        G.fillStyle = "rgba(0,0,0," + Math.round(C * 100) / 100 + ")";
        G.fillRect(0, 0, r.width(), r.height());
        G.restore()
    }

    function h(A, r, C, B, y, x, v, w, u, z, t, E) {
        if (l) {
            if (!A) {
                r *= -1;
                var D = B;
                B = C;
                C = D;
                D = x;
                x = y;
                y = D
            }
            setTimeout(function() {
                C.children("img").css("opacity", g).animate({
                    opacity: 1
                }, e / 2);
                y.css("transform", "rotateY(" + r + "deg)").children("img").css("opacity", 1).animate({
                    opacity: g
                }, e / 2, function() {
                    y.hide();
                    x.show().css("transform", "rotateX(0deg) rotateY(0deg)").children("img").css("opacity", g).animate({
                        opacity: 1
                    }, e / 2);
                    B.children("img").css("opacity", 1).animate({
                        opacity: g
                    }, e / 2)
                })
            }, 0);
            setTimeout(E, e)
        } else {
            if (a) {
                v.show();
                var q = new Date;
                var s = true;
                wizAnimate(function(F) {
                    var I = jQuery.easing.easeInOutQuint(1, F, 0, 1, 1),
                        H = jQuery.easing.easeInOutCubic(1, F, 0, 1, 1),
                        L = !A;
                    if (F < 0.5) {
                        I *= 2;
                        H *= 2;
                        var G = y
                    } else {
                        L = A;
                        I = (1 - I) * 2;
                        H = (1 - H) * 2;
                        var G = x
                    }
                    var J = v.height() * d / 2,
                        N = (1 - I) * v.width() / 2,
                        M = 1 + H * d,
                        K = v.width() / 2;
                    c(C, G, K, J, N, M, L, H * g, K, v.height(), w);
                    if (s) {
                        z.show();
                        s = false
                    }
                    B.clearRect(0, 0, u.width(), u.height());
                    B.fillStyle = "rgba(0,0,0," + (g - H * g) + ")";
                    B.fillRect(L ? K : 0, 0, u.width() / 2, u.height())
                }, 0, 1, e, E)
            }
        }
    }
}
jQuery.extend(jQuery.easing, {
    easeInOutCubic: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f + 2) + a
    },
    easeInOutQuint: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f * f * f + 2) + a
    }
});

function wizards_rotate(i, h, a) {
    var d = jQuery;
    var g = d(this);
    var e = d(".wizards_list", a);
    var b = {
        position: "absolute",
        left: 0,
        top: 0
    };
    var f = d("<div>").addClass("wizards_effect wizards_rotate").css(b).css({
        height: "100%",
        width: "100%",
        overflow: "hidden"
    }).appendTo(a);
    var c;
    this.go = function(j, k) {
        var m = d(h[0]);
        m = {
            width: m.width(),
            height: m.height(),
            marginTop: parseFloat(m.css("marginTop")),
            marginLeft: parseFloat(m.css("marginLeft")),
            maxHeight: "none",
            maxWidth: "none",
        };
        if (c) {
            c.stop(true, true)
        }
        c = d(h.get(j)).clone().css(b).css(m).appendTo(f);
        if (!i.noCross) {
            var l = d(h.get(k)).clone().css(b).css(m).appendTo(f);
            wizAnimate(l, {
                opacity: 1,
                rotate: 0,
                scale: 1
            }, {
                opacity: 0,
                rotate: i.rotateOut || 180,
                scale: i.scaleOut || 10
            }, i.duration, "easeInOutExpo", function() {
                l.remove()
            })
        }
        wizAnimate(c, {
            opacity: 1,
            rotate: -(i.rotateIn || 180),
            scale: i.scaleIn || 10
        }, {
            opacity: 1,
            rotate: 0,
            scale: 1
        }, i.duration, "easeInOutExpo", function() {
            c.remove();
            c = 0;
            g.trigger("effectEnd")
        })
    }
};
jQuery.extend(jQuery.easing, {
    easeInOutSine: function(j, i, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * i / d) - 1) + b
    }
});

function wizards_domino(m, i, k) {
    $ = jQuery;
    var h = $(this);
    var c = m.columns || 5,
        l = m.rows || 2,
        d = m.centerRow || 2,
        g = m.centerColumn || 2;
    var f = $("<div>").addClass("wizards_effect wizards_domino").css({
        position: "absolute",
        width: "100%",
        height: "100%",
        top: 0,
        overflow: "hidden"
    }).appendTo(k);
    var b = $("<div>").addClass("wizards_zoom").appendTo(f);
    var j = $("<div>").addClass("wizards_parts").appendTo(f);
    var e = k.find(".wizards_list");
    var a;
    this.go = function(y, x) {
        function z() {
            j.find("img").stop(1, 1);
            j.empty();
            b.empty();
            a = 0
        }
        z();
        var s = $(i.get(x));
        s = {
            width: s.width(),
            height: s.height(),
            marginTop: parseFloat(s.css("marginTop")),
            marginLeft: parseFloat(s.css("marginLeft"))
        };
        var D = $(i.get(x)).clone().appendTo(b).css({
            position: "absolute",
            top: 0,
            left: 0
        }).css(s);
        var p = f.width();
        var o = f.height();
        var w = Math.floor(p / c);
        var v = Math.floor(o / l);
        var t = p - w * (c - 1);
        var E = o - v * (l - 1);

        function I(L, K) {
            return Math.random() * (K - L + 1) + L
        }
        e.hide();
        var u = [];
        for (var C = 0; C < l; C++) {
            u[C] = [];
            for (var B = 0; B < c; B++) {
                var q = m.duration * (1 - Math.abs((d * g - C * B) / (2 * l * c)));
                var F = B < c - 1 ? w : t;
                var n = C < l - 1 ? v : E;
                u[C][B] = $("<div>").css({
                    width: F,
                    height: n,
                    position: "absolute",
                    top: C * v,
                    left: B * w,
                    overflow: "hidden"
                });
                var H = I(C - 2, C + 2);
                var G = I(B - 2, B + 2);
                u[C][B].appendTo(j);
                var J = $(i.get(y)).clone().appendTo(u[C][B]).css(s);
                var A = {
                    top: -H * v,
                    left: -G * w,
                    opacity: 0
                };
                var r = {
                    top: -C * v,
                    left: -B * w,
                    opacity: 1
                };
                if (m.support.transform && m.support.transition) {
                    A.translate = [A.left, A.top, 0];
                    r.translate = [r.left, r.top, 0];
                    delete A.top;
                    delete A.left;
                    delete r.top;
                    delete r.left
                }
                wizAnimate(J.css({
                    position: "absolute"
                }), A, r, q, "easeInOutSine", function() {
                    a++;
                    if (a == l * c) {
                        z();
                        e.stop(1, 1);
                        h.trigger("effectEnd")
                    }
                })
            }
        }
        wizAnimate(D, {
            scale: 1
        }, {
            scale: 1.6
        }, m.duration, m.duration * 0.2, "easeInOutSine")
    }
};

function wizards_slices(k, h, i) {
    var b = jQuery;
    var f = b(this);

    function g(q, p, o, m, l, n) {
        if (k.support.transform) {
            if (p.top) {
                p.translate = [0, p.top || 0, 0]
            }
            if (o.top) {
                o.translate = [0, o.top || 0, 0]
            }
            delete p.top;
            delete o.top
        }
        wizAnimate(q, p, o, m, l, "swing", n)
    }
    var e = function(r, x) {
        var q = b.extend({}, {
            effect: "random",
            slices: 15,
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            container: null,
            onEffectEnd: 0
        }, x);
        var t = {
            currentSlide: 0,
            currentImage: "",
            totalSlides: 0,
            randAnim: "",
            stop: false
        };
        var o = b(r);
        o.data("wiz:vars", t);
        if (!/absolute|relative/.test(o.css("position"))) {
            o.css("position", "relative")
        }
        var m = x.container || o;
        var p = o.children();
        t.totalSlides = p.length;
        if (q.startSlide > 0) {
            if (q.startSlide >= t.totalSlides) {
                q.startSlide = t.totalSlides - 1
            }
            t.currentSlide = q.startSlide
        }
        if (b(p[t.currentSlide]).is("img")) {
            t.currentImage = b(p[t.currentSlide])
        } else {
            t.currentImage = b(p[t.currentSlide]).find("img:first")
        }
        if (b(p[t.currentSlide]).is("a")) {
            b(p[t.currentSlide]).css("display", "block")
        }
        for (var s = 0; s < q.slices; s++) {
            var w = Math.round(m.width() / q.slices);
            var v = b('<div class="wiz-slice"></div>').css({
                left: w * s + "px",
                overflow: "hidden",
                width: ((s == q.slices - 1) ? (m.width() - (w * s)) : w) + "px",
                position: "absolute"
            }).appendTo(m);
            b("<img>").css({
                position: "absolute",
                left: 0,
                top: 0,
                transform: "translate3d(0,0,0)"
            }).appendTo(v)
        }
        var n = 0;
        this.sliderRun = function(y, z) {
            if (t.busy) {
                return false
            }
            q.effect = z || q.effect;
            t.currentSlide = y - 1;
            u(o, p, q, false);
            return true
        };
        var l = function() {
            if (q.onEffectEnd) {
                q.onEffectEnd(t.currentSlide)
            }
            m.hide();
            b(".wiz-slice", m).css({
                transition: "",
                transform: ""
            });
            t.busy = 0
        };
        var u = function(y, z, C, E) {
            var F = y.data("wiz:vars");
            if ((!F || F.stop) && !E) {
                return false
            }
            F.busy = 1;
            F.currentSlide++;
            if (F.currentSlide == F.totalSlides) {
                F.currentSlide = 0
            }
            if (F.currentSlide < 0) {
                F.currentSlide = (F.totalSlides - 1)
            }
            F.currentImage = b(z[F.currentSlide]);
            if (!F.currentImage.is("img")) {
                F.currentImage = F.currentImage.find("img:first")
            }
            var A = b(h[F.currentSlide]);
            A = {
                width: A.width(),
                heiht: A.height(),
                marginTop: A.css("marginTop"),
                marginLeft: A.css("marginLeft")
            };
            b(".wiz-slice", m).each(function(J) {
                var L = b(this),
                    I = b("img", L);
                var K = Math.round(m.width() / C.slices);
                I.width(m.width());
                I.attr("src", F.currentImage.attr("src"));
                I.css({
                    left: -K * J + "px"
                }).css(A);
                L.css({
                    height: "100%",
                    opacity: 0,
                    left: K * J,
                    width: ((J == C.slices - 1) ? (m.width() - (K * J)) : K)
                })
            });
            m.show();
            if (C.effect == "random") {
                var G = new Array("sliceDownRight", "sliceDownLeft", "sliceUpRight", "sliceUpLeft", "sliceUpDownRight", "sliceUpDownLeft", "fold", "fade");
                F.randAnim = G[Math.floor(Math.random() * (G.length + 1))];
                if (F.randAnim == undefined) {
                    F.randAnim = "fade"
                }
            }
            if (C.effect.indexOf(",") != -1) {
                var G = C.effect.split(",");
                F.randAnim = b.trim(G[Math.floor(Math.random() * G.length)])
            }
            if (C.effect == "sliceDown" || C.effect == "sliceDownRight" || F.randAnim == "sliceDownRight" || C.effect == "sliceDownLeft" || F.randAnim == "sliceDownLeft") {
                var B = 0;
                var H = b(".wiz-slice", m);
                if (C.effect == "sliceDownLeft" || F.randAnim == "sliceDownLeft") {
                    H = H._reverse()
                }
                H.each(function(I) {
                    g(b(this), {
                        top: "-100%",
                        opacity: 0
                    }, {
                        top: "0%",
                        opacity: 1
                    }, C.animSpeed, 100 + B, (I == C.slices - 1) ? l : 0);
                    B += 50
                })
            } else {
                if (C.effect == "sliceUp" || C.effect == "sliceUpRight" || F.randAnim == "sliceUpRight" || C.effect == "sliceUpLeft" || F.randAnim == "sliceUpLeft") {
                    var B = 0;
                    var H = b(".wiz-slice", m);
                    if (C.effect == "sliceUpLeft" || F.randAnim == "sliceUpLeft") {
                        H = H._reverse()
                    }
                    H.each(function(I) {
                        g(b(this), {
                            top: "100%",
                            opacity: 0
                        }, {
                            top: "0%",
                            opacity: 1
                        }, C.animSpeed, 100 + B, (I == C.slices - 1) ? l : 0);
                        B += 50
                    })
                } else {
                    if (C.effect == "sliceUpDown" || C.effect == "sliceUpDownRight" || F.randAnim == "sliceUpDownRight" || C.effect == "sliceUpDownLeft" || F.randAnim == "sliceUpDownLeft") {
                        var B = 0;
                        var H = b(".wiz-slice", m);
                        if (C.effect == "sliceUpDownLeft" || F.randAnim == "sliceUpDownLeft") {
                            H = H._reverse()
                        }
                        H.each(function(I) {
                            g(b(this), {
                                top: ((I % 2) ? "-" : "") + "100%",
                                opacity: 0
                            }, {
                                top: "0%",
                                opacity: 1
                            }, C.animSpeed, 100 + B, (I == C.slices - 1) ? l : 0);
                            B += 50
                        })
                    } else {
                        if (C.effect == "fold" || F.randAnim == "fold") {
                            var B = 0;
                            var H = b(".wiz-slice", m);
                            var D = H.width();
                            H.each(function(I) {
                                g(b(this), {
                                    width: 0,
                                    opacity: 0
                                }, {
                                    width: D,
                                    opacity: 1
                                }, C.animSpeed, 100 + B, (I == C.slices - 1) ? l : 0);
                                B += 50
                            })
                        } else {
                            if (C.effect == "fade" || F.randAnim == "fade") {
                                var H = b(".wiz-slice", m);
                                b(".wiz-slice", m).each(function(I) {
                                    b(this).css("height", "100%");
                                    b(this).animate({
                                        opacity: "1.0"
                                    }, (C.animSpeed * 2), (I == C.slices - 1) ? l : 0)
                                })
                            }
                        }
                    }
                }
            }
        }
    };
    b.fn._reverse = [].reverse;
    var a = b("li", i);
    var c = b("ul", i);
    var d = b("<div>").addClass("wizards_effect wizards_slices").css({
        left: 0,
        top: 0,
        "z-index": 8,
        overflow: "hidden",
        width: "100%",
        height: "100%",
        position: "absolute"
    }).appendTo(i);
    var j = new e(c, {
        keyboardNav: false,
        caption: 0,
        effect: "sliceDownRight,sliceDownLeft,sliceUpRight,sliceUpLeft,sliceUpDownRight,sliceUpDownLeft,sliceUpDownRight,sliceUpDownLeft,fold,fold,fold",
        animSpeed: k.duration,
        startSlide: k.startSlide,
        container: d,
        onEffectEnd: function(l) {
            f.trigger("effectEnd")
        }
    });
    this.go = function(m, l) {
        var n = j.sliderRun(m);
        if (k.fadeOut) {
            c.fadeOut(k.duration)
        }
    }
};

function wizards_blast(q, j, m) {
    var e = jQuery;
    var i = e(this);
    var f = m.find(".wizards_list");
    var a = q.distance || 1;
    var g = e("<div>").addClass("wizards_effect wizards_blast");
    var c = e("<div>").addClass("wizards_zoom").appendTo(g);
    var k = e("<div>").addClass("wizards_parts").appendTo(g);
    m.css({
        overflow: "visible"
    }).append(g);
    g.css({
        position: "absolute",
        left: 0,
        top: 0,
        width: "100%",
        height: "100%",
        "z-index": 8
    });
    var d = q.cols;
    var p = q.rows;
    var l = [];
    var b = [];

    function h(u, r, s, t) {
        if (q.support.transform && q.support.transition) {
            if (typeof r.left === "number" || typeof r.top === "number") {
                r.transform = "translate3d(" + (typeof r.left === "number" ? r.left : 0) + "px," + (typeof r.top === "number" ? r.top : 0) + "px,0)"
            }
            delete r.left;
            delete r.top;
            if (s) {
                r.transition = "all " + s + "ms ease-in-out"
            } else {
                r.transition = ""
            }
            u.css(r);
            if (t) {
                u.on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
                    t();
                    u.off("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd")
                })
            }
        } else {
            delete r.transfrom;
            delete r.transition;
            if (s) {
                u.animate(r, {
                    queue: false,
                    duration: q.duration,
                    complete: t ? t : 0
                })
            } else {
                u.stop(1).css(r)
            }
        }
    }

    function n(r) {
        var w = Math.max((q.width || g.width()) / (q.height || g.height()) || 3, 3);
        d = d || Math.round(w < 1 ? 3 : 3 * w);
        p = p || Math.round(w < 1 ? 3 / w : 3);
        for (var u = 0; u < d * p; u++) {
            var v = u % d;
            var t = Math.floor(u / d);
            e([b[u] = document.createElement("div"), l[u] = document.createElement("div")]).css({
                position: "absolute",
                overflow: "hidden"
            }).appendTo(k).append(e("<img>").css({
                position: "absolute"
            }))
        }
        l = e(l);
        b = e(b);
        o(l, r);
        o(b, r, true);
        var s = {
            position: "absolute",
            top: 0,
            left: 0,
            width: "100%",
            height: "100%",
            overflow: "hidden"
        };
        c.css(s).append(e("<img>").css(s))
    }

    function o(t, u, s, r, w, z) {
        var v = g.width();
        var x = g.height();
        var y = {
            left: e(window).scrollLeft(),
            top: e(window).scrollTop(),
            width: e(window).width(),
            height: e(window).height()
        };
        e(t).each(function(F) {
            var E = F % d;
            var C = Math.floor(F / d);
            if (s) {
                var I = a * v * (2 * Math.random() - 1) + v / 2;
                var G = a * x * (2 * Math.random() - 1) + x / 2;
                var H = g.offset();
                H.left += I;
                H.top += G;
                if (H.left < y.left) {
                    I -= H.left + y.left
                }
                if (H.top < y.top) {
                    G -= H.top + y.top
                }
                var D = (y.left + y.width) - H.left - v / d;
                if (0 > D) {
                    I += D
                }
                var B = (y.top + y.height) - H.top - x / p;
                if (0 > B) {
                    G += B
                }
            } else {
                var I = v * E / d;
                var G = x * C / p
            }
            e(this).find("img").css({
                left: -(v * E / d) + u.marginLeft,
                top: -(x * C / p) + u.marginTop,
                width: u.width,
                height: u.height
            });
            var A = {
                left: I,
                top: G,
                width: v / d,
                height: x / p
            };
            if (w) {
                e.extend(A, w)
            }
            if (r) {
                h(e(this), A, q.duration, (F === 0 && z) ? z : 0)
            } else {
                h(e(this), A)
            }
        })
    }
    this.go = function(s, u) {
        var v = e(j[u]),
            r = {
                width: v.width(),
                height: v.height(),
                marginTop: parseFloat(v.css("marginTop")),
                marginLeft: parseFloat(v.css("marginLeft"))
            };
        if (!l.length) {
            n(r)
        }
        l.find("img").attr("src", j.get(u).src);
        h(l, {
            opacity: 1,
            zIndex: 3
        });
        b.find("img").attr("src", j.get(s).src);
        h(b, {
            opacity: 0,
            zIndex: 2
        });
        c.find("img").attr("src", j.get(u).src);
        h(c.find("img"), {
            transform: "scale(1)"
        });
        g.show();
        f.hide();
        o(b, r, false, true, {
            opacity: 1
        });
        o(l, r, true, true, {
            opacity: 0
        }, function() {
            i.trigger("effectEnd");
            g.hide()
        });
        h(c.find("img"), {
            transform: "scale(2)"
        }, q.duration, 0);
        var t = b;
        b = l;
        l = t
    }
};

function wizards_linear(j, g, a) {
    var c = jQuery;
    var f = c(this);
    var e = a.find(".wizards_list");
    var i = c("<div>").addClass("wizards_effect wizards_linear").css({
        position: "absolute",
        top: 0,
        left: 0,
        width: "100%",
        height: "100%",
        overflow: "hidden"
    }).appendTo(a);
    var b = c("<div>").css({
        position: "absolute",
        display: "none",
        "z-index": 2,
        width: "200%",
        height: "100%",
        transform: "translate3d(0,0,0)"
    }).appendTo(i);
    var h = c("<div>").css({
            position: "absolute",
            left: "auto",
            top: "auto",
            width: "50%",
            height: "100%",
            overflow: "hidden"
        }),
        d = h.clone();
    b.append(h, d);
    this.go = function(k, n, m) {
        b.stop(1, 1);
        if (m == undefined) {
            m = (!!((k - n + 1) % g.length) ^ j.revers ? "left" : "right")
        } else {
            m = m ? "left" : "right"
        }
        var o = c(g[n]);
        var l = {
            width: o.width() || j.width,
            height: o.height() || j.height
        };
        o.clone().css(l).appendTo(h).css(m, 0);
        c(g[k]).clone().css(l).appendTo(d).show();
        if (m == "right") {
            h.css("left", "50%");
            d.css("left", 0)
        } else {
            h.css("left", 0);
            d.css("left", "50%")
        }
        var q = {},
            p = {};
        q[m] = 0;
        p[m] = -a.width();
        if (j.support.transform) {
            if (m == "right") {
                q.left = q.right;
                p.left = -p.right
            }
            q = {
                translate: [q.left, 0, 0]
            };
            p = {
                translate: [p.left, 0, 0]
            }
        }
        e.hide();
        wizAnimate(b.css({
            left: "auto",
            right: "auto",
            top: 0
        }).css(m, 0).show(), q, p, j.duration, "easeInOutExpo", function() {
            f.trigger("effectEnd");
            b.hide().find("div").html("")
        })
    }
};

function wizards_fade(c, a, b) {
    var e = jQuery,
        g = e(this),
        d = e(".wizards_list", b),
        h = {
            position: "absolute",
            left: 0,
            top: 0,
            width: "100%",
            height: "100%",
            maxHeight: "none",
            maxWidth: "none",
            transform: "translate3d(0,0,0)"
        },
        f = e("<div>").addClass("wizards_effect wizards_fade").css(h).css("overflow", "hidden").appendTo(b);
    this.go = function(i, j) {
        var k = e(a.get(i)),
            m = {
                width: k.width(),
                height: k.height()
            };
        k = k.clone().css(h).css(m).appendTo(f);
        if (!c.noCross) {
            var l = e(a.get(j)).clone().css(h).css(m).appendTo(f);
            wizAnimate(l, {
                opacity: 1
            }, {
                opacity: 0
            }, c.duration, function() {
                l.remove()
            })
        }
        wizAnimate(k, {
            opacity: 0
        }, {
            opacity: 1
        }, c.duration, function() {
            g.trigger("effectEnd");
            k.remove()
        })
    }
};

function wizards_fly(c, a, b) {
    var e = jQuery;
    var f = e(this);
    var h = {
        position: "absolute",
        left: 0,
        top: 0,
        width: "100%",
        height: "100%",
        transform: "translate3d(0,0,0)"
    };
    var d = b.find(".wizards_list");
    var g = e("<div>").addClass("wizards_effect wizards_fly").css(h).css({
        overflow: "visible"
    }).appendTo(b);
    this.go = function(p, m, l) {
        if (l == undefined) {
            l = !!c.revers
        } else {
            l = !l
        }
        var k = -(c.distance || g.width() / 4),
            n = Math.min(-k, Math.max(0, e(window).width() - g.offset().left - g.width())),
            i = (l ? n : k),
            q = (l ? k : n);
        var j = e(a.get(m));
        j = {
            width: j.width(),
            height: j.height()
        };
        var r = e("<div>").css(h).css({
            "z-index": 1,
            overflow: "hidden"
        }).html(e(a.get(m)).clone().css(j)).appendTo(g);
        var o = e("<div>").css(h).css({
            "z-index": 3,
            overflow: "hidden"
        }).html(e(a.get(p)).clone().css(j)).appendTo(g).show();
        wizAnimate(o, {
            opacity: 0
        }, {
            opacity: 1
        }, c.duration);
        wizAnimate(o, {
            left: i
        }, {
            left: 0
        }, 2 * c.duration / 3);
        d.hide();
        wizAnimate(r, {
            left: 0,
            opacity: 1
        }, {
            left: q,
            opacity: 0
        }, 2 * c.duration / 3, c.duration / 3, function() {
            r.remove();
            f.trigger("effectEnd");
            o.remove()
        })
    }
};

(function(f, g, j, b) {
    var h = /progid:DXImageTransform\.Microsoft\.Matrix\(.*?\)/,
        c = /^([\+\-]=)?([\d+.\-]+)(.*)$/,
        q = /%/;
    var d = j.createElement("modernizr"),
        e = d.style;

    function n(s) {
        return parseFloat(s)
    }

    function l() {
        var s = {
            transformProperty: "",
            MozTransform: "-moz-",
            WebkitTransform: "-webkit-",
            OTransform: "-o-",
            msTransform: "-ms-"
        };
        for (var t in s) {
            if (typeof e[t] != "undefined") {
                return s[t]
            }
        }
        return null
    }

    function r() {
        if (typeof(g.Modernizr) !== "undefined") {
            return Modernizr.csstransforms
        }
        var t = ["transformProperty", "WebkitTransform", "MozTransform", "OTransform", "msTransform"];
        for (var s in t) {
            if (e[t[s]] !== b) {
                return true
            }
        }
    }
    var a = l(),
        i = a !== null ? a + "transform" : false,
        k = a !== null ? a + "transform-origin" : false;
    f.support.csstransforms = r();
    if (a == "-ms-") {
        i = "msTransform";
        k = "msTransformOrigin"
    }
    f.extend({
        transform: function(s) {
            s.transform = this;
            this.$elem = f(s);
            this.applyingMatrix = false;
            this.matrix = null;
            this.height = null;
            this.width = null;
            this.outerHeight = null;
            this.outerWidth = null;
            this.boxSizingValue = null;
            this.boxSizingProperty = null;
            this.attr = null;
            this.transformProperty = i;
            this.transformOriginProperty = k
        }
    });
    f.extend(f.transform, {
        funcs: ["matrix", "origin", "reflect", "reflectX", "reflectXY", "reflectY", "rotate", "scale", "scaleX", "scaleY", "skew", "skewX", "skewY", "translate", "translateX", "translateY"]
    });
    f.fn.transform = function(s, t) {
        return this.each(function() {
            var u = this.transform || new f.transform(this);
            if (s) {
                u.exec(s, t)
            }
        })
    };
    f.transform.prototype = {
        exec: function(s, t) {
            t = f.extend(true, {
                forceMatrix: false,
                preserve: false
            }, t);
            this.attr = null;
            if (t.preserve) {
                s = f.extend(true, this.getAttrs(true, true), s)
            } else {
                s = f.extend(true, {}, s)
            }
            this.setAttrs(s);
            if (f.support.csstransforms && !t.forceMatrix) {
                return this.execFuncs(s)
            } else {
                if (f.browser.msie || (f.support.csstransforms && t.forceMatrix)) {
                    return this.execMatrix(s)
                }
            }
            return false
        },
        execFuncs: function(t) {
            var s = [];
            for (var u in t) {
                if (u == "origin") {
                    this[u].apply(this, f.isArray(t[u]) ? t[u] : [t[u]])
                } else {
                    if (f.inArray(u, f.transform.funcs) !== -1) {
                        s.push(this.createTransformFunc(u, t[u]))
                    }
                }
            }
            this.$elem.css(i, s.join(" "));
            return true
        },
        execMatrix: function(z) {
            var C, x, t;
            var F = this.$elem[0],
                B = this;

            function A(N, M) {
                if (q.test(N)) {
                    return parseFloat(N) / 100 * B["safeOuter" + (M ? "Height" : "Width")]()
                }
                return o(F, N)
            }
            var s = /translate[X|Y]?/,
                u = [];
            for (var v in z) {
                switch (f.type(z[v])) {
                    case "array":
                        t = z[v];
                        break;
                    case "string":
                        t = f.map(z[v].split(","), f.trim);
                        break;
                    default:
                        t = [z[v]]
                }
                if (f.matrix[v]) {
                    if (f.cssAngle[v]) {
                        t = f.map(t, f.angle.toDegree)
                    } else {
                        if (!f.cssNumber[v]) {
                            t = f.map(t, A)
                        } else {
                            t = f.map(t, n)
                        }
                    }
                    x = f.matrix[v].apply(this, t);
                    if (s.test(v)) {
                        u.push(x)
                    } else {
                        C = C ? C.x(x) : x
                    }
                } else {
                    if (v == "origin") {
                        this[v].apply(this, t)
                    }
                }
            }
            C = C || f.matrix.identity();
            f.each(u, function(M, N) {
                C = C.x(N)
            });
            var K = parseFloat(C.e(1, 1).toFixed(6)),
                I = parseFloat(C.e(2, 1).toFixed(6)),
                H = parseFloat(C.e(1, 2).toFixed(6)),
                G = parseFloat(C.e(2, 2).toFixed(6)),
                L = C.rows === 3 ? parseFloat(C.e(1, 3).toFixed(6)) : 0,
                J = C.rows === 3 ? parseFloat(C.e(2, 3).toFixed(6)) : 0;
            if (f.support.csstransforms && a === "-moz-") {
                this.$elem.css(i, "matrix(" + K + ", " + I + ", " + H + ", " + G + ", " + L + "px, " + J + "px)")
            } else {
                if (f.support.csstransforms) {
                    this.$elem.css(i, "matrix(" + K + ", " + I + ", " + H + ", " + G + ", " + L + ", " + J + ")")
                } else {
                    if (f.browser.msie) {
                        var w = ", FilterType='nearest neighbor'";
                        var D = this.$elem[0].style;
                        var E = "progid:DXImageTransform.Microsoft.Matrix(M11=" + K + ", M12=" + H + ", M21=" + I + ", M22=" + G + ", sizingMethod='auto expand'" + w + ")";
                        var y = D.filter || f.css(this.$elem[0], "filter") || "";
                        D.filter = h.test(y) ? y.replace(h, E) : y ? y + " " + E : E;
                        this.applyingMatrix = true;
                        this.matrix = C;
                        this.fixPosition(C, L, J);
                        this.applyingMatrix = false;
                        this.matrix = null
                    }
                }
            }
            return true
        },
        origin: function(s, t) {
            if (f.support.csstransforms) {
                if (typeof t === "undefined") {
                    this.$elem.css(k, s)
                } else {
                    this.$elem.css(k, s + " " + t)
                }
                return true
            }
            switch (s) {
                case "left":
                    s = "0";
                    break;
                case "right":
                    s = "100%";
                    break;
                case "center":
                case b:
                    s = "50%"
            }
            switch (t) {
                case "top":
                    t = "0";
                    break;
                case "bottom":
                    t = "100%";
                    break;
                case "center":
                case b:
                    t = "50%"
            }
            this.setAttr("origin", [q.test(s) ? s : o(this.$elem[0], s) + "px", q.test(t) ? t : o(this.$elem[0], t) + "px"]);
            return true
        },
        createTransformFunc: function(t, u) {
            if (t.substr(0, 7) === "reflect") {
                var s = u ? f.matrix[t]() : f.matrix.identity();
                return "matrix(" + s.e(1, 1) + ", " + s.e(2, 1) + ", " + s.e(1, 2) + ", " + s.e(2, 2) + ", 0, 0)"
            }
            if (t == "matrix") {
                if (a === "-moz-") {
                    u[4] = u[4] ? u[4] + "px" : 0;
                    u[5] = u[5] ? u[5] + "px" : 0
                }
            }
            return t + "(" + (f.isArray(u) ? u.join(", ") : u) + ")"
        },
        fixPosition: function(B, y, x, D, s) {
            var w = new f.matrix.calc(B, this.safeOuterHeight(), this.safeOuterWidth()),
                C = this.getAttr("origin");
            var v = w.originOffset(new f.matrix.V2(q.test(C[0]) ? parseFloat(C[0]) / 100 * w.outerWidth : parseFloat(C[0]), q.test(C[1]) ? parseFloat(C[1]) / 100 * w.outerHeight : parseFloat(C[1])));
            var t = w.sides();
            var u = this.$elem.css("position");
            if (u == "static") {
                u = "relative"
            }
            var A = {
                top: 0,
                left: 0
            };
            var z = {
                position: u,
                top: (v.top + x + t.top + A.top) + "px",
                left: (v.left + y + t.left + A.left) + "px",
                zoom: 1
            };
            this.$elem.css(z)
        }
    };

    function o(s, u) {
        var t = c.exec(f.trim(u));
        if (t[3] && t[3] !== "px") {
            var w = "paddingBottom",
                v = f.style(s, w);
            f.style(s, w, u);
            u = p(s, w);
            f.style(s, w, v);
            return u
        }
        return parseFloat(u)
    }

    function p(t, u) {
        if (t[u] != null && (!t.style || t.style[u] == null)) {
            return t[u]
        }
        var s = parseFloat(f.css(t, u));
        return s && s > -10000 ? s : 0
    }
})(jQuery, this, this.document);
(function(d, c, a, f) {
    d.extend(d.transform.prototype, {
        safeOuterHeight: function() {
            return this.safeOuterLength("height")
        },
        safeOuterWidth: function() {
            return this.safeOuterLength("width")
        },
        safeOuterLength: function(l) {
            var p = "outer" + (l == "width" ? "Width" : "Height");
            if (!d.support.csstransforms && d.browser.msie) {
                l = l == "width" ? "width" : "height";
                if (this.applyingMatrix && !this[p] && this.matrix) {
                    var k = new d.matrix.calc(this.matrix, 1, 1),
                        n = k.offset(),
                        g = this.$elem[p]() / n[l];
                    this[p] = g;
                    return g
                } else {
                    if (this.applyingMatrix && this[p]) {
                        return this[p]
                    }
                }
                var o = {
                    height: ["top", "bottom"],
                    width: ["left", "right"]
                };
                var h = this.$elem[0],
                    j = parseFloat(d.css(h, l, true)),
                    q = this.boxSizingProperty,
                    i = this.boxSizingValue;
                if (!this.boxSizingProperty) {
                    q = this.boxSizingProperty = e() || "box-sizing";
                    i = this.boxSizingValue = this.$elem.css(q) || "content-box"
                }
                if (this[p] && this[l] == j) {
                    return this[p]
                } else {
                    this[l] = j
                }
                if (q && (i == "padding-box" || i == "content-box")) {
                    j += parseFloat(d.css(h, "padding-" + o[l][0], true)) || 0 + parseFloat(d.css(h, "padding-" + o[l][1], true)) || 0
                }
                if (q && i == "content-box") {
                    j += parseFloat(d.css(h, "border-" + o[l][0] + "-width", true)) || 0 + parseFloat(d.css(h, "border-" + o[l][1] + "-width", true)) || 0
                }
                this[p] = j;
                return j
            }
            return this.$elem[p]()
        }
    });
    var b = null;

    function e() {
        if (b) {
            return b
        }
        var h = {
                boxSizing: "box-sizing",
                MozBoxSizing: "-moz-box-sizing",
                WebkitBoxSizing: "-webkit-box-sizing",
                OBoxSizing: "-o-box-sizing"
            },
            g = a.body;
        for (var i in h) {
            if (typeof g.style[i] != "undefined") {
                b = h[i];
                return b
            }
        }
        return null
    }
})(jQuery, this, this.document);
(function(g, f, b, h) {
    var d = /([\w\-]*?)\((.*?)\)/g,
        a = "data-transform",
        e = /\s/,
        c = /,\s?/;
    g.extend(g.transform.prototype, {
        setAttrs: function(i) {
            var j = "",
                l;
            for (var k in i) {
                l = i[k];
                if (g.isArray(l)) {
                    l = l.join(", ")
                }
                j += " " + k + "(" + l + ")"
            }
            this.attr = g.trim(j);
            this.$elem.attr(a, this.attr)
        },
        setAttr: function(k, l) {
            if (g.isArray(l)) {
                l = l.join(", ")
            }
            var j = this.attr || this.$elem.attr(a);
            if (!j || j.indexOf(k) == -1) {
                this.attr = g.trim(j + " " + k + "(" + l + ")");
                this.$elem.attr(a, this.attr)
            } else {
                var i = [],
                    n;
                d.lastIndex = 0;
                while (n = d.exec(j)) {
                    if (k == n[1]) {
                        i.push(k + "(" + l + ")")
                    } else {
                        i.push(n[0])
                    }
                }
                this.attr = i.join(" ");
                this.$elem.attr(a, this.attr)
            }
        },
        getAttrs: function() {
            var j = this.attr || this.$elem.attr(a);
            if (!j) {
                return {}
            }
            var i = {},
                l, k;
            d.lastIndex = 0;
            while ((l = d.exec(j)) !== null) {
                if (l) {
                    k = l[2].split(c);
                    i[l[1]] = k.length == 1 ? k[0] : k
                }
            }
            return i
        },
        getAttr: function(j) {
            var i = this.getAttrs();
            if (typeof i[j] !== "undefined") {
                return i[j]
            }
            if (j === "origin" && g.support.csstransforms) {
                return this.$elem.css(this.transformOriginProperty).split(e)
            } else {
                if (j === "origin") {
                    return ["50%", "50%"]
                }
            }
            return g.cssDefault[j] || 0
        }
    });
    if (typeof(g.cssAngle) == "undefined") {
        g.cssAngle = {}
    }
    g.extend(g.cssAngle, {
        rotate: true,
        skew: true,
        skewX: true,
        skewY: true
    });
    if (typeof(g.cssDefault) == "undefined") {
        g.cssDefault = {}
    }
    g.extend(g.cssDefault, {
        scale: [1, 1],
        scaleX: 1,
        scaleY: 1,
        matrix: [1, 0, 0, 1, 0, 0],
        origin: ["50%", "50%"],
        reflect: [1, 0, 0, 1, 0, 0],
        reflectX: [1, 0, 0, 1, 0, 0],
        reflectXY: [1, 0, 0, 1, 0, 0],
        reflectY: [1, 0, 0, 1, 0, 0]
    });
    if (typeof(g.cssMultipleValues) == "undefined") {
        g.cssMultipleValues = {}
    }
    g.extend(g.cssMultipleValues, {
        matrix: 6,
        origin: {
            length: 2,
            duplicate: true
        },
        reflect: 6,
        reflectX: 6,
        reflectXY: 6,
        reflectY: 6,
        scale: {
            length: 2,
            duplicate: true
        },
        skew: 2,
        translate: 2
    });
    g.extend(g.cssNumber, {
        matrix: true,
        reflect: true,
        reflectX: true,
        reflectXY: true,
        reflectY: true,
        scale: true,
        scaleX: true,
        scaleY: true
    });
    g.each(g.transform.funcs, function(j, k) {
        g.cssHooks[k] = {
            set: function(n, o) {
                var l = n.transform || new g.transform(n),
                    i = {};
                i[k] = o;
                l.exec(i, {
                    preserve: true
                })
            },
            get: function(n, l) {
                var i = n.transform || new g.transform(n);
                return i.getAttr(k)
            }
        }
    });
    g.each(["reflect", "reflectX", "reflectXY", "reflectY"], function(j, k) {
        g.cssHooks[k].get = function(n, l) {
            var i = n.transform || new g.transform(n);
            return i.getAttr("matrix") || g.cssDefault[k]
        }
    })
})(jQuery, this, this.document);
(function(f, g, h, c) {
    var d = /^([+\-]=)?([\d+.\-]+)(.*)$/;
    var a = f.fn.animate;
    f.fn.animate = function(p, l, o, n) {
        var k = f.speed(l, o, n),
            j = f.cssMultipleValues;
        k.complete = k.old;
        if (!f.isEmptyObject(p)) {
            if (typeof k.original === "undefined") {
                k.original = {}
            }
            f.each(p, function(s, u) {
                if (j[s] || f.cssAngle[s] || (!f.cssNumber[s] && f.inArray(s, f.transform.funcs) !== -1)) {
                    var t = null;
                    if (jQuery.isArray(p[s])) {
                        var r = 1,
                            q = u.length;
                        if (j[s]) {
                            r = (typeof j[s].length === "undefined" ? j[s] : j[s].length)
                        }
                        if (q > r || (q < r && q == 2) || (q == 2 && r == 2 && isNaN(parseFloat(u[q - 1])))) {
                            t = u[q - 1];
                            u.splice(q - 1, 1)
                        }
                    }
                    k.original[s] = u.toString();
                    p[s] = parseFloat(u)
                }
            })
        }
        return a.apply(this, [arguments[0], k])
    };
    var b = "paddingBottom";

    function i(k, l) {
        if (k[l] != null && (!k.style || k.style[l] == null)) {}
        var j = parseFloat(f.css(k, l));
        return j && j > -10000 ? j : 0
    }

    function e(u, v, w) {
        var y = f.cssMultipleValues[this.prop],
            p = f.cssAngle[this.prop];
        if (y || (!f.cssNumber[this.prop] && f.inArray(this.prop, f.transform.funcs) !== -1)) {
            this.values = [];
            if (!y) {
                y = 1
            }
            var x = this.options.original[this.prop],
                t = f(this.elem).css(this.prop),
                j = f.cssDefault[this.prop] || 0;
            if (!f.isArray(t)) {
                t = [t]
            }
            if (!f.isArray(x)) {
                if (f.type(x) === "string") {
                    x = x.split(",")
                } else {
                    x = [x]
                }
            }
            var l = y.length || y,
                s = 0;
            while (x.length < l) {
                x.push(y.duplicate ? x[0] : j[s] || 0);
                s++
            }
            var k, r, q, o = this,
                n = o.elem.transform;
            orig = f.style(o.elem, b);
            f.each(x, function(z, A) {
                if (t[z]) {
                    k = t[z]
                } else {
                    if (j[z] && !y.duplicate) {
                        k = j[z]
                    } else {
                        if (y.duplicate) {
                            k = t[0]
                        } else {
                            k = 0
                        }
                    }
                }
                if (p) {
                    k = f.angle.toDegree(k)
                } else {
                    if (!f.cssNumber[o.prop]) {
                        r = d.exec(f.trim(k));
                        if (r[3] && r[3] !== "px") {
                            if (r[3] === "%") {
                                k = parseFloat(r[2]) / 100 * n["safeOuter" + (z ? "Height" : "Width")]()
                            } else {
                                f.style(o.elem, b, k);
                                k = i(o.elem, b);
                                f.style(o.elem, b, orig)
                            }
                        }
                    }
                }
                k = parseFloat(k);
                r = d.exec(f.trim(A));
                if (r) {
                    q = parseFloat(r[2]);
                    w = r[3] || "px";
                    if (p) {
                        q = f.angle.toDegree(q + w);
                        w = "deg"
                    } else {
                        if (!f.cssNumber[o.prop] && w === "%") {
                            k = (k / n["safeOuter" + (z ? "Height" : "Width")]()) * 100
                        } else {
                            if (!f.cssNumber[o.prop] && w !== "px") {
                                f.style(o.elem, b, (q || 1) + w);
                                k = ((q || 1) / i(o.elem, b)) * k;
                                f.style(o.elem, b, orig)
                            }
                        }
                    }
                    if (r[1]) {
                        q = ((r[1] === "-=" ? -1 : 1) * q) + k
                    }
                } else {
                    q = A;
                    w = ""
                }
                o.values.push({
                    start: k,
                    end: q,
                    unit: w
                })
            })
        }
    }
    if (f.fx.prototype.custom) {
        (function(k) {
            var j = k.custom;
            k.custom = function(o, n, l) {
                e.apply(this, arguments);
                return j.apply(this, arguments)
            }
        }(f.fx.prototype))
    }
    if (f.Animation && f.Animation.tweener) {
        f.Animation.tweener(f.transform.funcs.join(" "), function(l, k) {
            var j = this.createTween(l, k);
            e.apply(j, [j.start, j.end, j.unit]);
            return j
        })
    }
    f.fx.multipleValueStep = {
        _default: function(j) {
            f.each(j.values, function(k, l) {
                j.values[k].now = l.start + ((l.end - l.start) * j.pos)
            })
        }
    };
    f.each(["matrix", "reflect", "reflectX", "reflectXY", "reflectY"], function(j, k) {
        f.fx.multipleValueStep[k] = function(n) {
            var p = n.decomposed,
                l = f.matrix;
            m = l.identity();
            p.now = {};
            f.each(p.start, function(q) {
                p.now[q] = parseFloat(p.start[q]) + ((parseFloat(p.end[q]) - parseFloat(p.start[q])) * n.pos);
                if (((q === "scaleX" || q === "scaleY") && p.now[q] === 1) || (q !== "scaleX" && q !== "scaleY" && p.now[q] === 0)) {
                    return true
                }
                m = m.x(l[q](p.now[q]))
            });
            var o;
            f.each(n.values, function(q) {
                switch (q) {
                    case 0:
                        o = parseFloat(m.e(1, 1).toFixed(6));
                        break;
                    case 1:
                        o = parseFloat(m.e(2, 1).toFixed(6));
                        break;
                    case 2:
                        o = parseFloat(m.e(1, 2).toFixed(6));
                        break;
                    case 3:
                        o = parseFloat(m.e(2, 2).toFixed(6));
                        break;
                    case 4:
                        o = parseFloat(m.e(1, 3).toFixed(6));
                        break;
                    case 5:
                        o = parseFloat(m.e(2, 3).toFixed(6));
                        break
                }
                n.values[q].now = o
            })
        }
    });
    f.each(f.transform.funcs, function(k, l) {
        function j(p) {
            var o = p.elem.transform || new f.transform(p.elem),
                n = {};
            if (f.cssMultipleValues[l] || (!f.cssNumber[l] && f.inArray(l, f.transform.funcs) !== -1)) {
                (f.fx.multipleValueStep[p.prop] || f.fx.multipleValueStep._default)(p);
                n[p.prop] = [];
                f.each(p.values, function(q, r) {
                    n[p.prop].push(r.now + (f.cssNumber[p.prop] ? "" : r.unit))
                })
            } else {
                n[p.prop] = p.now + (f.cssNumber[p.prop] ? "" : p.unit)
            }
            o.exec(n, {
                preserve: true
            })
        }
        if (f.Tween && f.Tween.propHooks) {
            f.Tween.propHooks[l] = {
                set: j
            }
        }
        if (f.fx.step) {
            f.fx.step[l] = j
        }
    });
    f.each(["matrix", "reflect", "reflectX", "reflectXY", "reflectY"], function(k, l) {
        function j(r) {
            var q = r.elem.transform || new f.transform(r.elem),
                p = {};
            if (!r.initialized) {
                r.initialized = true;
                if (l !== "matrix") {
                    var o = f.matrix[l]().elements;
                    var s;
                    f.each(r.values, function(t) {
                        switch (t) {
                            case 0:
                                s = o[0];
                                break;
                            case 1:
                                s = o[2];
                                break;
                            case 2:
                                s = o[1];
                                break;
                            case 3:
                                s = o[3];
                                break;
                            default:
                                s = 0
                        }
                        r.values[t].end = s
                    })
                }
                r.decomposed = {};
                var n = r.values;
                r.decomposed.start = f.matrix.matrix(n[0].start, n[1].start, n[2].start, n[3].start, n[4].start, n[5].start).decompose();
                r.decomposed.end = f.matrix.matrix(n[0].end, n[1].end, n[2].end, n[3].end, n[4].end, n[5].end).decompose()
            }(f.fx.multipleValueStep[r.prop] || f.fx.multipleValueStep._default)(r);
            p.matrix = [];
            f.each(r.values, function(t, u) {
                p.matrix.push(u.now)
            });
            q.exec(p, {
                preserve: true
            })
        }
        if (f.Tween && f.Tween.propHooks) {
            f.Tween.propHooks[l] = {
                set: j
            }
        }
        if (f.fx.step) {
            f.fx.step[l] = j
        }
    })
})(jQuery, this, this.document);
(function(g, h, j, c) {
    var d = 180 / Math.PI;
    var k = 200 / Math.PI;
    var f = Math.PI / 180;
    var e = 2 / 1.8;
    var i = 0.9;
    var a = Math.PI / 200;
    var b = /^([+\-]=)?([\d+.\-]+)(.*)$/;
    g.extend({
        angle: {
            runit: /(deg|g?rad)/,
            radianToDegree: function(l) {
                return l * d
            },
            radianToGrad: function(l) {
                return l * k
            },
            degreeToRadian: function(l) {
                return l * f
            },
            degreeToGrad: function(l) {
                return l * e
            },
            gradToDegree: function(l) {
                return l * i
            },
            gradToRadian: function(l) {
                return l * a
            },
            toDegree: function(n) {
                var l = b.exec(n);
                if (l) {
                    n = parseFloat(l[2]);
                    switch (l[3] || "deg") {
                        case "grad":
                            n = g.angle.gradToDegree(n);
                            break;
                        case "rad":
                            n = g.angle.radianToDegree(n);
                            break
                    }
                    return n
                }
                return 0
            }
        }
    })
})(jQuery, this, this.document);
(function(f, e, b, g) {
    if (typeof(f.matrix) == "undefined") {
        f.extend({
            matrix: {}
        })
    }
    var d = f.matrix;
    f.extend(d, {
        V2: function(h, i) {
            if (f.isArray(arguments[0])) {
                this.elements = arguments[0].slice(0, 2)
            } else {
                this.elements = [h, i]
            }
            this.length = 2
        },
        V3: function(h, j, i) {
            if (f.isArray(arguments[0])) {
                this.elements = arguments[0].slice(0, 3)
            } else {
                this.elements = [h, j, i]
            }
            this.length = 3
        },
        M2x2: function(i, h, k, j) {
            if (f.isArray(arguments[0])) {
                this.elements = arguments[0].slice(0, 4)
            } else {
                this.elements = Array.prototype.slice.call(arguments).slice(0, 4)
            }
            this.rows = 2;
            this.cols = 2
        },
        M3x3: function(n, l, k, j, i, h, q, p, o) {
            if (f.isArray(arguments[0])) {
                this.elements = arguments[0].slice(0, 9)
            } else {
                this.elements = Array.prototype.slice.call(arguments).slice(0, 9)
            }
            this.rows = 3;
            this.cols = 3
        }
    });
    var c = {
        e: function(k, h) {
            var i = this.rows,
                j = this.cols;
            if (k > i || h > i || k < 1 || h < 1) {
                return 0
            }
            return this.elements[(k - 1) * j + h - 1]
        },
        decompose: function() {
            var v = this.e(1, 1),
                t = this.e(2, 1),
                q = this.e(1, 2),
                p = this.e(2, 2),
                o = this.e(1, 3),
                n = this.e(2, 3);
            if (Math.abs(v * p - t * q) < 0.01) {
                return {
                    rotate: 0 + "deg",
                    skewX: 0 + "deg",
                    scaleX: 1,
                    scaleY: 1,
                    translateX: 0 + "px",
                    translateY: 0 + "px"
                }
            }
            var l = o,
                j = n;
            var u = Math.sqrt(v * v + t * t);
            v = v / u;
            t = t / u;
            var i = v * q + t * p;
            q -= v * i;
            p -= t * i;
            var s = Math.sqrt(q * q + p * p);
            q = q / s;
            p = p / s;
            i = i / s;
            if ((v * p - t * q) < 0) {
                v = -v;
                t = -t;
                u = -u
            }
            var w = f.angle.radianToDegree;
            var h = w(Math.atan2(t, v));
            i = w(Math.atan(i));
            return {
                rotate: h + "deg",
                skewX: i + "deg",
                scaleX: u,
                scaleY: s,
                translateX: l + "px",
                translateY: j + "px"
            }
        }
    };
    f.extend(d.M2x2.prototype, c, {
        toM3x3: function() {
            var h = this.elements;
            return new d.M3x3(h[0], h[1], 0, h[2], h[3], 0, 0, 0, 1)
        },
        x: function(j) {
            var k = typeof(j.rows) === "undefined";
            if (!k && j.rows == 3) {
                return this.toM3x3().x(j)
            }
            var i = this.elements,
                h = j.elements;
            if (k && h.length == 2) {
                return new d.V2(i[0] * h[0] + i[1] * h[1], i[2] * h[0] + i[3] * h[1])
            } else {
                if (h.length == i.length) {
                    return new d.M2x2(i[0] * h[0] + i[1] * h[2], i[0] * h[1] + i[1] * h[3], i[2] * h[0] + i[3] * h[2], i[2] * h[1] + i[3] * h[3])
                }
            }
            return false
        },
        inverse: function() {
            var i = 1 / this.determinant(),
                h = this.elements;
            return new d.M2x2(i * h[3], i * -h[1], i * -h[2], i * h[0])
        },
        determinant: function() {
            var h = this.elements;
            return h[0] * h[3] - h[1] * h[2]
        }
    });
    f.extend(d.M3x3.prototype, c, {
        x: function(j) {
            var k = typeof(j.rows) === "undefined";
            if (!k && j.rows < 3) {
                j = j.toM3x3()
            }
            var i = this.elements,
                h = j.elements;
            if (k && h.length == 3) {
                return new d.V3(i[0] * h[0] + i[1] * h[1] + i[2] * h[2], i[3] * h[0] + i[4] * h[1] + i[5] * h[2], i[6] * h[0] + i[7] * h[1] + i[8] * h[2])
            } else {
                if (h.length == i.length) {
                    return new d.M3x3(i[0] * h[0] + i[1] * h[3] + i[2] * h[6], i[0] * h[1] + i[1] * h[4] + i[2] * h[7], i[0] * h[2] + i[1] * h[5] + i[2] * h[8], i[3] * h[0] + i[4] * h[3] + i[5] * h[6], i[3] * h[1] + i[4] * h[4] + i[5] * h[7], i[3] * h[2] + i[4] * h[5] + i[5] * h[8], i[6] * h[0] + i[7] * h[3] + i[8] * h[6], i[6] * h[1] + i[7] * h[4] + i[8] * h[7], i[6] * h[2] + i[7] * h[5] + i[8] * h[8])
                }
            }
            return false
        },
        inverse: function() {
            var i = 1 / this.determinant(),
                h = this.elements;
            return new d.M3x3(i * (h[8] * h[4] - h[7] * h[5]), i * (-(h[8] * h[1] - h[7] * h[2])), i * (h[5] * h[1] - h[4] * h[2]), i * (-(h[8] * h[3] - h[6] * h[5])), i * (h[8] * h[0] - h[6] * h[2]), i * (-(h[5] * h[0] - h[3] * h[2])), i * (h[7] * h[3] - h[6] * h[4]), i * (-(h[7] * h[0] - h[6] * h[1])), i * (h[4] * h[0] - h[3] * h[1]))
        },
        determinant: function() {
            var h = this.elements;
            return h[0] * (h[8] * h[4] - h[7] * h[5]) - h[3] * (h[8] * h[1] - h[7] * h[2]) + h[6] * (h[5] * h[1] - h[4] * h[2])
        }
    });
    var a = {
        e: function(h) {
            return this.elements[h - 1]
        }
    };
    f.extend(d.V2.prototype, a);
    f.extend(d.V3.prototype, a)
})(jQuery, this, this.document);
(function(c, b, a, d) {
    if (typeof(c.matrix) == "undefined") {
        c.extend({
            matrix: {}
        })
    }
    c.extend(c.matrix, {
        calc: function(e, f, g) {
            this.matrix = e;
            this.outerHeight = f;
            this.outerWidth = g
        }
    });
    c.matrix.calc.prototype = {
        coord: function(e, i, h) {
            h = typeof(h) !== "undefined" ? h : 0;
            var g = this.matrix,
                f;
            switch (g.rows) {
                case 2:
                    f = g.x(new c.matrix.V2(e, i));
                    break;
                case 3:
                    f = g.x(new c.matrix.V3(e, i, h));
                    break
            }
            return f
        },
        corners: function(e, h) {
            var f = !(typeof(e) !== "undefined" || typeof(h) !== "undefined"),
                g;
            if (!this.c || !f) {
                h = h || this.outerHeight;
                e = e || this.outerWidth;
                g = {
                    tl: this.coord(0, 0),
                    bl: this.coord(0, h),
                    tr: this.coord(e, 0),
                    br: this.coord(e, h)
                }
            } else {
                g = this.c
            }
            if (f) {
                this.c = g
            }
            return g
        },
        sides: function(e) {
            var f = e || this.corners();
            return {
                top: Math.min(f.tl.e(2), f.tr.e(2), f.br.e(2), f.bl.e(2)),
                bottom: Math.max(f.tl.e(2), f.tr.e(2), f.br.e(2), f.bl.e(2)),
                left: Math.min(f.tl.e(1), f.tr.e(1), f.br.e(1), f.bl.e(1)),
                right: Math.max(f.tl.e(1), f.tr.e(1), f.br.e(1), f.bl.e(1))
            }
        },
        offset: function(e) {
            var f = this.sides(e);
            return {
                height: Math.abs(f.bottom - f.top),
                width: Math.abs(f.right - f.left)
            }
        },
        area: function(e) {
            var h = e || this.corners();
            var g = {
                    x: h.tr.e(1) - h.tl.e(1) + h.br.e(1) - h.bl.e(1),
                    y: h.tr.e(2) - h.tl.e(2) + h.br.e(2) - h.bl.e(2)
                },
                f = {
                    x: h.bl.e(1) - h.tl.e(1) + h.br.e(1) - h.tr.e(1),
                    y: h.bl.e(2) - h.tl.e(2) + h.br.e(2) - h.tr.e(2)
                };
            return 0.25 * Math.abs(g.e(1) * f.e(2) - g.e(2) * f.e(1))
        },
        nonAffinity: function() {
            var f = this.sides(),
                g = f.top - f.bottom,
                e = f.left - f.right;
            return parseFloat(parseFloat(Math.abs((Math.pow(g, 2) + Math.pow(e, 2)) / (f.top * f.bottom + f.left * f.right))).toFixed(8))
        },
        originOffset: function(h, g) {
            h = h ? h : new c.matrix.V2(this.outerWidth * 0.5, this.outerHeight * 0.5);
            g = g ? g : new c.matrix.V2(0, 0);
            var e = this.coord(h.e(1), h.e(2));
            var f = this.coord(g.e(1), g.e(2));
            return {
                top: (f.e(2) - g.e(2)) - (e.e(2) - h.e(2)),
                left: (f.e(1) - g.e(1)) - (e.e(1) - h.e(1))
            }
        }
    }
})(jQuery, this, this.document);
(function(e, d, a, f) {
    if (typeof(e.matrix) == "undefined") {
        e.extend({
            matrix: {}
        })
    }
    var c = e.matrix,
        g = c.M2x2,
        b = c.M3x3;
    e.extend(c, {
        identity: function(k) {
            k = k || 2;
            var l = k * k,
                n = new Array(l),
                j = k + 1;
            for (var h = 0; h < l; h++) {
                n[h] = (h % j) === 0 ? 1 : 0
            }
            return new c["M" + k + "x" + k](n)
        },
        matrix: function() {
            var h = Array.prototype.slice.call(arguments);
            switch (arguments.length) {
                case 4:
                    return new g(h[0], h[2], h[1], h[3]);
                case 6:
                    return new b(h[0], h[2], h[4], h[1], h[3], h[5], 0, 0, 1)
            }
        },
        reflect: function() {
            return new g(-1, 0, 0, -1)
        },
        reflectX: function() {
            return new g(1, 0, 0, -1)
        },
        reflectXY: function() {
            return new g(0, 1, 1, 0)
        },
        reflectY: function() {
            return new g(-1, 0, 0, 1)
        },
        rotate: function(l) {
            var i = e.angle.degreeToRadian(l),
                k = Math.cos(i),
                n = Math.sin(i);
            var j = k,
                h = n,
                p = -n,
                o = k;
            return new g(j, p, h, o)
        },
        scale: function(i, h) {
            i = i || i === 0 ? i : 1;
            h = h || h === 0 ? h : i;
            return new g(i, 0, 0, h)
        },
        scaleX: function(h) {
            return c.scale(h, 1)
        },
        scaleY: function(h) {
            return c.scale(1, h)
        },
        skew: function(k, i) {
            k = k || 0;
            i = i || 0;
            var l = e.angle.degreeToRadian(k),
                j = e.angle.degreeToRadian(i),
                h = Math.tan(l),
                n = Math.tan(j);
            return new g(1, h, n, 1)
        },
        skewX: function(h) {
            return c.skew(h)
        },
        skewY: function(h) {
            return c.skew(0, h)
        },
        translate: function(i, h) {
            i = i || 0;
            h = h || 0;
            return new b(1, 0, i, 0, 1, h, 0, 0, 1)
        },
        translateX: function(h) {
            return c.translate(h)
        },
        translateY: function(h) {
            return c.translate(0, h)
        }
    })
})(jQuery, this, this.document);

function wizards_flip(c, n, e) {
    var f = jQuery;
    var g = f(this);
    var m = c.cols || Math.round(c.width / 90);
    var l = c.rows || Math.round(c.height / 30);
    var k = f("<div>").addClass("wizards_effect wizards_flip").css({
        position: "absolute",
        left: 0,
        top: 0,
        width: "100%",
        height: "100%",
        transform: "translate3d(0,0,0)"
    }).appendTo(e);
    var q = [];
    var a = [m * 0.7, m * 2.5];
    var o = [
        [],
        []
    ];

    function p(j, w, x) {
        if (!j[x]) {
            j[x] = []
        }
        j[x][j[x].length] = w
    }
    for (var h = 0; h < m * l; h++) {
        var t = h % m,
            s = Math.floor(h / m);
        var r = q[h] = document.createElement("div");
        f(r).css({
            position: "absolute",
            overflow: "hidden"
        }).append(f("<img>").css({
            position: "absolute",
            top: 0,
            left: 0
        })).appendTo(k);
        p(o[0], r, 2 * s + t);
        p(o[1], r, Math.abs(h - (m * l >> 1)))
    }

    function v() {
        var z = k.width();
        var B = k.height();
        for (var A = 0; A < m * l; A++) {
            var y = A % m,
                x = Math.floor(A / m);
            var E = Math.round(z * (y) / m),
                C = Math.round(B * (x) / l),
                w = Math.round(z * (y + 1) / m) - E,
                D = Math.round(B * (x + 1) / l) - C;
            f(q[A]).css({
                width: w + "px",
                height: D + "px",
                left: E + "px",
                top: C + "px"
            }).data({
                width: w,
                height: D
            })
        }
    }

    function d(w, j, i) {
        if (!c.support.transform) {
            w.each(function(x, y) {
                y = f(y);
                y.animate({
                    width: y.data("width") * 0.8 + "px",
                    height: 0
                }, {
                    easing: "easeInOutCubic",
                    duration: j,
                    complete: i
                })
            })
        } else {
            w.animate({
                scaleX: 0.8,
                scaleY: -1
            }, {
                easing: "easeInOutCubic",
                duration: j,
                complete: i
            })
        }
    }

    function b(w, j, i) {
        if (!c.support.transform) {
            w.each(function(x, y) {
                y = f(y);
                y.animate({
                    width: y.data("width") + "px",
                    height: y.data("height") + "px"
                }, {
                    easing: "easeInOutCubic",
                    duration: j,
                    complete: i
                })
            })
        } else {
            w.animate({
                scaleX: 1,
                scaleY: 1
            }, {
                easing: "easeInOutCubic",
                duration: j,
                complete: function() {
                    w.css({
                        "-o-transform": "none"
                    });
                    if (i) {
                        i()
                    }
                }
            })
        }
    }
    var u;
    this.go = function(C, w) {
        if (u) {
            return -1
        }
        u = 1;
        v();
        var j = ("type" in c) ? c.type : Math.round(Math.random() * (o.length - 1));
        var i = f(n.get(w));
        i = {
            width: i.width(),
            height: i.height(),
            marginTop: parseFloat(i.css("marginTop")),
            marginLeft: parseFloat(i.css("marginLeft"))
        };
        var y = e.width() / m,
            z = e.height() / l;
        f(q).stop(1, 1).css({
            opacity: 1,
            "z-index": 3
        }).find("img").attr("src", n.get(w).src).css(i).each(function(I) {
            var J = I % m,
                H = Math.floor(I / m);
            f(this).css({
                left: -y * J,
                top: -z * H
            })
        });
        k.show();
        var B = f(".wizards_list", e);
        B.find("img").css({
            visibility: "hidden"
        });
        var G = o[j];
        var F = Math.round(a[j]);
        var D = c.duration * 0.9 / (G.length + 2 * F);
        var x = D * F;
        if (c.support.transform) {
            x /= 2
        }
        var A = 0;

        function E() {
            if (A < G.length) {
                d(f(G[A]), x)
            }
            var J = A - F;
            if (J >= 0 && J < G.length) {
                var I = f(G[J]);
                var H;
                if (J >= G.length - 1) {
                    H = function() {
                        if (u) {
                            B.find("img").css({
                                visibility: "visible"
                            });
                            g.trigger("effectEnd");
                            k.hide();
                            u = 0
                        }
                    }
                }
                b(I, x, H);
                I.find("img").attr("src", n.get(C).src)
            }
            A++;
            if (A - F < G.length) {
                setTimeout(E, D)
            }
        }
        E()
    }
}
jQuery.extend(jQuery.easing, {
    easeInOutCubic: function(e, f, a, h, g) {
        if ((f /= g / 2) < 1) {
            return h / 2 * f * f * f + a
        }
        return h / 2 * ((f -= 2) * f * f + 2) + a
    }
});
jQuery.extend(jQuery.easing, {
    easeOutOneBounce: function(e, i, c, a, d, g) {
        var j = 0.8;
        var b = 0.2;
        var f = j * j;
        if (i < 0.0001) {
            return 0
        } else {
            if (i < j) {
                return i * i / f
            } else {
                return 1 - b * b + (i - j - b) * (i - j - b)
            }
        }
    },
    easeOutBounce: function(e, f, a, h, g) {
        if ((f /= g) < (1 / 2.75)) {
            return h * (7.5625 * f * f) + a
        } else {
            if (f < (2 / 2.75)) {
                return h * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a
            } else {
                if (f < (2.5 / 2.75)) {
                    return h * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
                } else {
                    return h * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a
                }
            }
        }
    }
});

function wizards_page(c, b, a) {
    var e = jQuery;
    var h = c.angle || 17;
    var g = e(this);
    var f = e("<div>").addClass("wizards_effect wizards_page").css({
        position: "absolute",
        width: "100%",
        height: "100%",
        top: "0%",
        overflow: "hidden"
    });
    var d = a.find(".wizards_list");
    f.hide().appendTo(a);
    this.go = function(l, j) {
        function o() {
            f.find("div").stop(1, 1);
            f.hide();
            f.empty()
        }
        o();
        d.hide();
        var k = e("<div>").css({
            position: "absolute",
            left: 0,
            top: 0,
            width: "100%",
            height: "100%",
            overflow: "hidden",
            "z-index": 9
        }).append(e(b.get(l)).clone()).appendTo(f);
        var i = e("<div>").css({
            position: "absolute",
            left: 0,
            top: 0,
            width: "100%",
            height: "100%",
            overflow: "hidden",
            outline: "1px solid transparent",
            "z-index": 10,
            "transform-origin": "top left",
            "backface-visibility": "hidden"
        }).append(e(b.get(j)).clone()).appendTo(f);
        f.show();
        if (c.responsive < 3) {
            k.find("img").css("width", "100%");
            i.find("img").css("width", "100%")
        }
        var q = i;
        var p = q.width(),
            m = q.height();
        var n = !document.addEventListener;
        wizAnimate(q, {
            rotate: 0
        }, {
            rotate: h
        }, n ? 0 : 2 * c.duration / 3, "easeOutOneBounce", function() {
            wizAnimate(q, {
                top: 0
            }, {
                top: "100%"
            }, (n ? 2 : 1) * c.duration / 3)
        });
        wizAnimate(k, {
            top: "-100%"
        }, {
            top: "-30%"
        }, n ? 0 : c.duration / 2, function() {
            wizAnimate(k, {
                top: "-30%"
            }, {
                top: 0
            }, (n ? 2 : 1) * c.duration / 2, "easeOutBounce", function() {
                q.hide();
                o();
                g.trigger("effectEnd")
            })
        })
    }
};

function wizards_stack(d, a, b) {
    var e = jQuery;
    var g = e(this);
    var c = e("li", b);
    var f = e("<div>").addClass("wizards_effect wizards_stack").css({
        position: "absolute",
        top: 0,
        left: 0,
        width: "100%",
        height: "100%",
        overflow: "hidden"
    }).appendTo(b);
    this.go = function(q, j, i) {
        var k = (d.revers ? 1 : -1) * b.width();
        c.each(function(s) {
            if (i && s != j) {
                this.style.zIndex = (Math.max(0, this.style.zIndex - 1))
            }
        });
        var p = e(".wizards_list", b);
        var h = e("<div>").css({
                position: "absolute",
                left: 0,
                top: 0,
                width: "100%",
                height: "100%",
                overflow: "hidden",
                zIndex: 4
            }).append(e(a.get(i ? q : j)).clone()),
            r = e("<div>").css({
                position: "absolute",
                left: 0,
                top: 0,
                width: "100%",
                height: "100%",
                overflow: "hidden",
                zIndex: 4
            }).append(e(a.get(i ? j : q)).clone());
        if (d.responsive < 3) {
            h.find("img").css("width", "100%");
            r.find("img").css("width", "100%")
        }
        if (i) {
            r.appendTo(f);
            h.appendTo(f)
        } else {
            h.insertAfter(p);
            r.insertAfter(p)
        }
        if (!i) {
            p.stop(true, true).hide().css({
                left: -q + "00%"
            });
            if (d.fadeOut) {
                p.fadeIn(d.duration)
            } else {
                p.show()
            }
        } else {
            if (d.fadeOut) {
                p.fadeOut(d.duration)
            }
        }
        var o = {
            left: i ? k : 0
        };
        var m = {
            left: i ? 0 : -k * 0.5
        };
        var n = {
            left: i ? 0 : k
        };
        var l = {
            left: (i ? 1 : 0) * b.width() * 0.5
        };
        if (d.support.transform) {
            o = {
                translate: [o.left, 0, 0]
            };
            m = {
                translate: [m.left, 0, 0]
            };
            n = {
                translate: [n.left, 0, 0]
            };
            l = {
                translate: [l.left, 0, 0]
            }
        }
        wizAnimate(h, o, n, d.duration, d.duration * (i ? 0 : 0.1), "easeInOutExpo", function() {
            g.trigger("effectEnd");
            h.remove();
            r.remove()
        });
        wizAnimate(r, m, l, d.duration, d.duration * (i ? 0.1 : 0), "easeInOutExpo")
    }
};