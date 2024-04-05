! function(e, t) {
    if ("object" == typeof exports && "object" == typeof module) module.exports = t();
    else if ("function" == typeof define && define.amd) define([], t);
    else {
        var i = t();
        for (var s in i)("object" == typeof exports ? exports : e)[s] = i[s]
    }
}(self, (function() {
    return function() {
        var e = {
                1936: function() {
                    ! function(e) {
                        "use strict";
                        var t = ["sanitize", "whiteList", "sanitizeFn"],
                            i = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
                            s = /^(?:(?:https?|mailto|ftp|tel|file):|[^&:/?#]*(?:[/?#]|$))/gi,
                            n = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[a-z0-9+/]+=*$/i,
                            o = ["title", "placeholder"];

                        function l(t, o) {
                            var l = t.nodeName.toLowerCase();
                            if (-1 !== e.inArray(l, o)) return -1 === e.inArray(l, i) || Boolean(t.nodeValue.match(s) || t.nodeValue.match(n));
                            for (var r = e(o).filter((function(e, t) {
                                    return t instanceof RegExp
                                })), a = 0, c = r.length; a < c; a++)
                                if (l.match(r[a])) return !0;
                            return !1
                        }

                        function r(e, t, i) {
                            if (i && "function" == typeof i) return i(e);
                            for (var s = Object.keys(t), n = 0, o = e.length; n < o; n++)
                                for (var r = e[n].querySelectorAll("*"), a = 0, c = r.length; a < c; a++) {
                                    var d = r[a],
                                        h = d.nodeName.toLowerCase();
                                    if (-1 !== s.indexOf(h))
                                        for (var p = [].slice.call(d.attributes), u = [].concat(t["*"] || [], t[h] || []), f = 0, m = p.length; f < m; f++) {
                                            var v = p[f];
                                            l(v, u) || d.removeAttribute(v.nodeName)
                                        } else d.parentNode.removeChild(d)
                                }
                        }

                        function a(e) {
                            var t, i = {};
                            return o.forEach((function(s) {
                                (t = e.attr(s)) && (i[s] = t)
                            })), !i.placeholder && i.title && (i.placeholder = i.title), i
                        }
                        "classList" in document.createElement("_") || function(t) {
                            if ("Element" in t) {
                                var i = "classList",
                                    s = "prototype",
                                    n = t.Element[s],
                                    o = Object,
                                    l = function() {
                                        var t = e(this);
                                        return {
                                            add: function(e) {
                                                return e = Array.prototype.slice.call(arguments).join(" "), t.addClass(e)
                                            },
                                            remove: function(e) {
                                                return e = Array.prototype.slice.call(arguments).join(" "), t.removeClass(e)
                                            },
                                            toggle: function(e, i) {
                                                return t.toggleClass(e, i)
                                            },
                                            contains: function(e) {
                                                return t.hasClass(e)
                                            }
                                        }
                                    };
                                if (o.defineProperty) {
                                    var r = {
                                        get: l,
                                        enumerable: !0,
                                        configurable: !0
                                    };
                                    try {
                                        o.defineProperty(n, i, r)
                                    } catch (e) {
                                        void 0 !== e.number && -2146823252 !== e.number || (r.enumerable = !1, o.defineProperty(n, i, r))
                                    }
                                } else o[s].__defineGetter__ && n.__defineGetter__(i, l)
                            }
                        }(window);
                        var c, d, h = document.createElement("_");
                        if (h.classList.add("c1", "c2"), !h.classList.contains("c2")) {
                            var p = DOMTokenList.prototype.add,
                                u = DOMTokenList.prototype.remove;
                            DOMTokenList.prototype.add = function() {
                                Array.prototype.forEach.call(arguments, p.bind(this))
                            }, DOMTokenList.prototype.remove = function() {
                                Array.prototype.forEach.call(arguments, u.bind(this))
                            }
                        }
                        if (h.classList.toggle("c3", !1), h.classList.contains("c3")) {
                            var f = DOMTokenList.prototype.toggle;
                            DOMTokenList.prototype.toggle = function(e, t) {
                                return 1 in arguments && !this.contains(e) == !t ? t : f.call(this, e)
                            }
                        }

                        function m() {
                            var e = this.selectpicker.main.data;
                            (this.options.source.data || this.options.source.search) && (e = Object.values(this.selectpicker.optionValuesDataMap));
                            var t = e.filter((function(e) {
                                return !(!e.selected || this.options.hideDisabled && e.disabled)
                            }), this);
                            if (this.options.source.data && !this.multiple && t.length > 1) {
                                for (var i = 0; i < t.length - 1; i++) t[i].selected = !1;
                                t = [t[t.length - 1]]
                            }
                            return t
                        }

                        function v(e) {
                            for (var t, i = [], s = e || m.call(this), n = 0, o = s.length; n < o; n++)(t = s[n]).disabled || i.push(void 0 === t.value ? t.text : t.value);
                            return this.multiple ? i : i.length ? i[0] : null
                        }
                        h = null, Object.values = "function" == typeof Object.values ? Object.values : function(e) {
                            return Object.keys(e).map((function(t) {
                                return e[t]
                            }))
                        }, String.prototype.startsWith || (c = {}.toString, d = function(e) {
                            if (null == this) throw new TypeError;
                            var t = String(this);
                            if (e && "[object RegExp]" == c.call(e)) throw new TypeError;
                            var i = t.length,
                                s = String(e),
                                n = s.length,
                                o = arguments.length > 1 ? arguments[1] : void 0,
                                l = o ? Number(o) : 0;
                            l != l && (l = 0);
                            var r = Math.min(Math.max(l, 0), i);
                            if (n + r > i) return !1;
                            for (var a = -1; ++a < n;)
                                if (t.charCodeAt(r + a) != s.charCodeAt(a)) return !1;
                            return !0
                        }, Object.defineProperty ? Object.defineProperty(String.prototype, "startsWith", {
                            value: d,
                            configurable: !0,
                            writable: !0
                        }) : String.prototype.startsWith = d);
                        var g = {
                            useDefault: !1,
                            _set: e.valHooks.select.set
                        };
                        e.valHooks.select.set = function(t, i) {
                            return i && !g.useDefault && e(t).data("selected", !0), g._set.apply(this, arguments)
                        };
                        var b = null,
                            w = function() {
                                try {
                                    return new Event("change"), !0
                                } catch (e) {
                                    return !1
                                }
                            }();

                        function k(e, t, i, s) {
                            for (var n = ["display", "subtext", "tokens"], o = !1, l = 0; l < n.length; l++) {
                                var r = n[l],
                                    a = e[r];
                                if (a && (a = a.toString(), "display" === r && (a = a.replace(/<[^>]+>/g, "")), s && (a = S(a)), a = a.toUpperCase(), o = "function" == typeof i ? i(a, t) : "contains" === i ? a.indexOf(t) >= 0 : a.startsWith(t))) break
                            }
                            return o
                        }

                        function I(e) {
                            return parseInt(e, 10) || 0
                        }
                        e.fn.triggerNative = function(e) {
                            var t, i = this[0];
                            i.dispatchEvent && (w ? t = new Event(e, {
                                bubbles: !0
                            }) : (t = document.createEvent("Event")).initEvent(e, !0, !1), i.dispatchEvent(t))
                        };
                        var y = {
                                "À": "A",
                                "Á": "A",
                                "Â": "A",
                                "Ã": "A",
                                "Ä": "A",
                                "Å": "A",
                                "à": "a",
                                "á": "a",
                                "â": "a",
                                "ã": "a",
                                "ä": "a",
                                "å": "a",
                                "Ç": "C",
                                "ç": "c",
                                "Ð": "D",
                                "ð": "d",
                                "È": "E",
                                "É": "E",
                                "Ê": "E",
                                "Ë": "E",
                                "è": "e",
                                "é": "e",
                                "ê": "e",
                                "ë": "e",
                                "Ì": "I",
                                "Í": "I",
                                "Î": "I",
                                "Ï": "I",
                                "ì": "i",
                                "í": "i",
                                "î": "i",
                                "ï": "i",
                                "Ñ": "N",
                                "ñ": "n",
                                "Ò": "O",
                                "Ó": "O",
                                "Ô": "O",
                                "Õ": "O",
                                "Ö": "O",
                                "Ø": "O",
                                "ò": "o",
                                "ó": "o",
                                "ô": "o",
                                "õ": "o",
                                "ö": "o",
                                "ø": "o",
                                "Ù": "U",
                                "Ú": "U",
                                "Û": "U",
                                "Ü": "U",
                                "ù": "u",
                                "ú": "u",
                                "û": "u",
                                "ü": "u",
                                "Ý": "Y",
                                "ý": "y",
                                "ÿ": "y",
                                "Æ": "Ae",
                                "æ": "ae",
                                "Þ": "Th",
                                "þ": "th",
                                "ß": "ss",
                                "Ā": "A",
                                "Ă": "A",
                                "Ą": "A",
                                "ā": "a",
                                "ă": "a",
                                "ą": "a",
                                "Ć": "C",
                                "Ĉ": "C",
                                "Ċ": "C",
                                "Č": "C",
                                "ć": "c",
                                "ĉ": "c",
                                "ċ": "c",
                                "č": "c",
                                "Ď": "D",
                                "Đ": "D",
                                "ď": "d",
                                "đ": "d",
                                "Ē": "E",
                                "Ĕ": "E",
                                "Ė": "E",
                                "Ę": "E",
                                "Ě": "E",
                                "ē": "e",
                                "ĕ": "e",
                                "ė": "e",
                                "ę": "e",
                                "ě": "e",
                                "Ĝ": "G",
                                "Ğ": "G",
                                "Ġ": "G",
                                "Ģ": "G",
                                "ĝ": "g",
                                "ğ": "g",
                                "ġ": "g",
                                "ģ": "g",
                                "Ĥ": "H",
                                "Ħ": "H",
                                "ĥ": "h",
                                "ħ": "h",
                                "Ĩ": "I",
                                "Ī": "I",
                                "Ĭ": "I",
                                "Į": "I",
                                "İ": "I",
                                "ĩ": "i",
                                "ī": "i",
                                "ĭ": "i",
                                "į": "i",
                                "ı": "i",
                                "Ĵ": "J",
                                "ĵ": "j",
                                "Ķ": "K",
                                "ķ": "k",
                                "ĸ": "k",
                                "Ĺ": "L",
                                "Ļ": "L",
                                "Ľ": "L",
                                "Ŀ": "L",
                                "Ł": "L",
                                "ĺ": "l",
                                "ļ": "l",
                                "ľ": "l",
                                "ŀ": "l",
                                "ł": "l",
                                "Ń": "N",
                                "Ņ": "N",
                                "Ň": "N",
                                "Ŋ": "N",
                                "ń": "n",
                                "ņ": "n",
                                "ň": "n",
                                "ŋ": "n",
                                "Ō": "O",
                                "Ŏ": "O",
                                "Ő": "O",
                                "ō": "o",
                                "ŏ": "o",
                                "ő": "o",
                                "Ŕ": "R",
                                "Ŗ": "R",
                                "Ř": "R",
                                "ŕ": "r",
                                "ŗ": "r",
                                "ř": "r",
                                "Ś": "S",
                                "Ŝ": "S",
                                "Ş": "S",
                                "Š": "S",
                                "ś": "s",
                                "ŝ": "s",
                                "ş": "s",
                                "š": "s",
                                "Ţ": "T",
                                "Ť": "T",
                                "Ŧ": "T",
                                "ţ": "t",
                                "ť": "t",
                                "ŧ": "t",
                                "Ũ": "U",
                                "Ū": "U",
                                "Ŭ": "U",
                                "Ů": "U",
                                "Ű": "U",
                                "Ų": "U",
                                "ũ": "u",
                                "ū": "u",
                                "ŭ": "u",
                                "ů": "u",
                                "ű": "u",
                                "ų": "u",
                                "Ŵ": "W",
                                "ŵ": "w",
                                "Ŷ": "Y",
                                "ŷ": "y",
                                "Ÿ": "Y",
                                "Ź": "Z",
                                "Ż": "Z",
                                "Ž": "Z",
                                "ź": "z",
                                "ż": "z",
                                "ž": "z",
                                "Ĳ": "IJ",
                                "ĳ": "ij",
                                "Œ": "Oe",
                                "œ": "oe",
                                "ŉ": "'n",
                                "ſ": "s"
                            },
                            x = /[\xc0-\xd6\xd8-\xf6\xf8-\xff\u0100-\u017f]/g,
                            E = RegExp("[\\u0300-\\u036f\\ufe20-\\ufe2f\\u20d0-\\u20ff\\u1ab0-\\u1aff\\u1dc0-\\u1dff]", "g");

                        function $(e) {
                            return y[e]
                        }

                        function S(e) {
                            return (e = e.toString()) && e.replace(x, $).replace(E, "")
                        }
                        var C, O, A, T, z, D = (C = {
                                "&": "&amp;",
                                "<": "&lt;",
                                ">": "&gt;",
                                '"': "&quot;",
                                "'": "&#x27;",
                                "`": "&#x60;"
                            }, O = function(e) {
                                return C[e]
                            }, A = "(?:" + Object.keys(C).join("|") + ")", T = RegExp(A), z = RegExp(A, "g"), function(e) {
                                return e = null == e ? "" : "" + e, T.test(e) ? e.replace(z, O) : e
                            }),
                            L = {
                                32: " ",
                                48: "0",
                                49: "1",
                                50: "2",
                                51: "3",
                                52: "4",
                                53: "5",
                                54: "6",
                                55: "7",
                                56: "8",
                                57: "9",
                                59: ";",
                                65: "A",
                                66: "B",
                                67: "C",
                                68: "D",
                                69: "E",
                                70: "F",
                                71: "G",
                                72: "H",
                                73: "I",
                                74: "J",
                                75: "K",
                                76: "L",
                                77: "M",
                                78: "N",
                                79: "O",
                                80: "P",
                                81: "Q",
                                82: "R",
                                83: "S",
                                84: "T",
                                85: "U",
                                86: "V",
                                87: "W",
                                88: "X",
                                89: "Y",
                                90: "Z",
                                96: "0",
                                97: "1",
                                98: "2",
                                99: "3",
                                100: "4",
                                101: "5",
                                102: "6",
                                103: "7",
                                104: "8",
                                105: "9"
                            },
                            N = window.Dropdown || bootstrap.Dropdown;

                        function H() {
                            var t;
                            try {
                                t = e.fn.dropdown.Constructor.VERSION
                            } catch (e) {
                                t = N.VERSION
                            }
                            return t
                        }
                        var M = {
                            success: !1,
                            major: "3"
                        };
                        try {
                            M.full = (H() || "").split(" ")[0].split("."), M.major = M.full[0], M.success = !0
                        } catch (e) {}
                        var P = 0,
                            W = ".bs.select",
                            B = {
                                DISABLED: "disabled",
                                DIVIDER: "divider",
                                SHOW: "open",
                                DROPUP: "dropup",
                                MENU: "dropdown-menu",
                                MENURIGHT: "dropdown-menu-right",
                                MENULEFT: "dropdown-menu-left",
                                BUTTONCLASS: "btn-default",
                                POPOVERHEADER: "popover-title",
                                ICONBASE: "glyphicon",
                                TICKICON: "glyphicon-ok"
                            },
                            R = {
                                MENU: "." + B.MENU,
                                DATA_TOGGLE: 'data-toggle="dropdown"'
                            },
                            j = {
                                div: document.createElement("div"),
                                span: document.createElement("span"),
                                i: document.createElement("i"),
                                subtext: document.createElement("small"),
                                a: document.createElement("a"),
                                li: document.createElement("li"),
                                whitespace: document.createTextNode(" "),
                                fragment: document.createDocumentFragment(),
                                option: document.createElement("option")
                            };
                        j.selectedOption = j.option.cloneNode(!1), j.selectedOption.setAttribute("selected", !0), j.noResults = j.li.cloneNode(!1), j.noResults.className = "no-results", j.a.setAttribute("role", "option"), j.a.className = "dropdown-item", j.subtext.className = "text-muted", j.text = j.span.cloneNode(!1), j.text.className = "text", j.checkMark = j.span.cloneNode(!1);
                        var U = new RegExp("38|40"),
                            V = new RegExp("^9$|27"),
                            _ = {
                                li: function(e, t, i) {
                                    var s = j.li.cloneNode(!1);
                                    return e && (1 === e.nodeType || 11 === e.nodeType ? s.appendChild(e) : s.innerHTML = e), void 0 !== t && "" !== t && (s.className = t), null != i && s.classList.add("optgroup-" + i), s
                                },
                                a: function(e, t, i) {
                                    var s = j.a.cloneNode(!0);
                                    return e && (11 === e.nodeType ? s.appendChild(e) : s.insertAdjacentHTML("beforeend", e)), void 0 !== t && "" !== t && s.classList.add.apply(s.classList, t.split(/\s+/)), i && s.setAttribute("style", i), s
                                },
                                text: function(e, t) {
                                    var i, s, n = j.text.cloneNode(!1);
                                    if (e.content) n.innerHTML = e.content;
                                    else {
                                        if (n.textContent = e.text, e.icon) {
                                            var o = j.whitespace.cloneNode(!1);
                                            (s = (!0 === t ? j.i : j.span).cloneNode(!1)).className = this.options.iconBase + " " + e.icon, j.fragment.appendChild(s), j.fragment.appendChild(o)
                                        }
                                        e.subtext && ((i = j.subtext.cloneNode(!1)).textContent = e.subtext, n.appendChild(i))
                                    }
                                    if (!0 === t)
                                        for (; n.childNodes.length > 0;) j.fragment.appendChild(n.childNodes[0]);
                                    else j.fragment.appendChild(n);
                                    return j.fragment
                                },
                                label: function(e) {
                                    var t, i, s = j.text.cloneNode(!1);
                                    if (s.innerHTML = e.display, e.icon) {
                                        var n = j.whitespace.cloneNode(!1);
                                        (i = j.span.cloneNode(!1)).className = this.options.iconBase + " " + e.icon, j.fragment.appendChild(i), j.fragment.appendChild(n)
                                    }
                                    return e.subtext && ((t = j.subtext.cloneNode(!1)).textContent = e.subtext, s.appendChild(t)), j.fragment.appendChild(s), j.fragment
                                }
                            },
                            F = {
                                fromOption: function(e, t) {
                                    var i;
                                    switch (t) {
                                        case "divider":
                                            i = "true" === e.getAttribute("data-divider");
                                            break;
                                        case "text":
                                            i = e.textContent;
                                            break;
                                        case "label":
                                            i = e.label;
                                            break;
                                        case "style":
                                            i = e.style.cssText;
                                            break;
                                        case "title":
                                            i = e.title;
                                            break;
                                        default:
                                            i = e.getAttribute("data-" + t.replace(/[A-Z]+(?![a-z])|[A-Z]/g, (function(e, t) {
                                                return (t ? "-" : "") + e.toLowerCase()
                                            })))
                                    }
                                    return i
                                },
                                fromDataSource: function(e, t) {
                                    var i;
                                    switch (t) {
                                        case "text":
                                        case "label":
                                            i = e.text || e.value || "";
                                            break;
                                        default:
                                            i = e[t]
                                    }
                                    return i
                                }
                            };

                        function G(e, t) {
                            e.length || (j.noResults.innerHTML = this.options.noneResultsText.replace("{0}", '"' + D(t) + '"'), this.$menuInner[0].firstChild.appendChild(j.noResults))
                        }

                        function q(e) {
                            return !(e.hidden || this.options.hideDisabled && e.disabled)
                        }
                        var K = function(t, i) {
                            var s = this;
                            g.useDefault || (e.valHooks.select.set = g._set, g.useDefault = !0), this.$element = e(t), this.$newElement = null, this.$button = null, this.$menu = null, this.options = i, this.selectpicker = {
                                main: {
                                    data: [],
                                    optionQueue: j.fragment.cloneNode(!1),
                                    hasMore: !1
                                },
                                search: {
                                    data: [],
                                    hasMore: !1
                                },
                                current: {},
                                view: {},
                                optionValuesDataMap: {},
                                isSearching: !1,
                                keydown: {
                                    keyHistory: "",
                                    resetKeyHistory: {
                                        start: function() {
                                            return setTimeout((function() {
                                                s.selectpicker.keydown.keyHistory = ""
                                            }), 800)
                                        }
                                    }
                                }
                            }, this.sizeInfo = {};
                            var n = this.options.windowPadding;
                            "number" == typeof n && (this.options.windowPadding = [n, n, n, n]), this.val = K.prototype.val, this.render = K.prototype.render, this.refresh = K.prototype.refresh, this.setStyle = K.prototype.setStyle, this.selectAll = K.prototype.selectAll, this.deselectAll = K.prototype.deselectAll, this.destroy = K.prototype.destroy, this.remove = K.prototype.remove, this.show = K.prototype.show, this.hide = K.prototype.hide, this.init()
                        };

                        function Q(i) {
                            var s, n = arguments,
                                o = i;
                            if ([].shift.apply(n), !M.success) {
                                try {
                                    M.full = (H() || "").split(" ")[0].split(".")
                                } catch (e) {
                                    K.BootstrapVersion ? M.full = K.BootstrapVersion.split(" ")[0].split(".") : (M.full = [M.major, "0", "0"], console.warn("There was an issue retrieving Bootstrap's version. Ensure Bootstrap is being loaded before bootstrap-select and there is no namespace collision. If loading Bootstrap asynchronously, the version may need to be manually specified via $.fn.selectpicker.Constructor.BootstrapVersion.", e))
                                }
                                M.major = M.full[0], M.success = !0
                            }
                            if (M.major >= "4") {
                                var l = [];
                                K.DEFAULTS.style === B.BUTTONCLASS && l.push({
                                    name: "style",
                                    className: "BUTTONCLASS"
                                }), K.DEFAULTS.iconBase === B.ICONBASE && l.push({
                                    name: "iconBase",
                                    className: "ICONBASE"
                                }), K.DEFAULTS.tickIcon === B.TICKICON && l.push({
                                    name: "tickIcon",
                                    className: "TICKICON"
                                }), B.DIVIDER = "dropdown-divider", B.SHOW = "show", B.BUTTONCLASS = "btn-light", B.POPOVERHEADER = "popover-header", B.ICONBASE = "", B.TICKICON = "bs-ok-default";
                                for (var r = 0; r < l.length; r++) i = l[r], K.DEFAULTS[i.name] = B[i.className]
                            }
                            M.major > "4" && (R.DATA_TOGGLE = 'data-bs-toggle="dropdown"');
                            var c = this.each((function() {
                                var i = e(this);
                                if (i.is("select")) {
                                    var l = i.data("selectpicker"),
                                        r = "object" == typeof o && o;
                                    if (r.title && (r.placeholder = r.title), l) {
                                        if (r)
                                            for (var c in r) Object.prototype.hasOwnProperty.call(r, c) && (l.options[c] = r[c])
                                    } else {
                                        var d = i.data();
                                        for (var h in d) Object.prototype.hasOwnProperty.call(d, h) && -1 !== e.inArray(h, t) && delete d[h];
                                        var p = e.extend({}, K.DEFAULTS, e.fn.selectpicker.defaults || {}, a(i), d, r);
                                        p.template = e.extend({}, K.DEFAULTS.template, e.fn.selectpicker.defaults ? e.fn.selectpicker.defaults.template : {}, d.template, r.template), p.source = e.extend({}, K.DEFAULTS.source, e.fn.selectpicker.defaults ? e.fn.selectpicker.defaults.source : {}, r.source), i.data("selectpicker", l = new K(this, p))
                                    }
                                    "string" == typeof o && (s = l[o] instanceof Function ? l[o].apply(l, n) : l.options[o])
                                }
                            }));
                            return void 0 !== s ? s : c
                        }
                        K.VERSION = "1.14.0-beta3", K.DEFAULTS = {
                            noneSelectedText: "Nothing selected",
                            noneResultsText: "No results matched {0}",
                            countSelectedText: function(e, t) {
                                return 1 == e ? "{0} item selected" : "{0} items selected"
                            },
                            maxOptionsText: function(e, t) {
                                return [1 == e ? "Limit reached ({n} item max)" : "Limit reached ({n} items max)", 1 == t ? "Group limit reached ({n} item max)" : "Group limit reached ({n} items max)"]
                            },
                            selectAllText: "Select All",
                            deselectAllText: "Deselect All",
                            source: {
                                pageSize: 40
                            },
                            chunkSize: 40,
                            doneButton: !1,
                            doneButtonText: "Close",
                            multipleSeparator: ", ",
                            styleBase: "btn",
                            style: B.BUTTONCLASS,
                            size: "auto",
                            title: null,
                            placeholder: null,
                            allowClear: !1,
                            selectedTextFormat: "values",
                            width: !1,
                            container: !1,
                            hideDisabled: !1,
                            showSubtext: !1,
                            showIcon: !0,
                            showContent: !0,
                            dropupAuto: !0,
                            header: !1,
                            liveSearch: !1,
                            liveSearchPlaceholder: null,
                            liveSearchNormalize: !1,
                            liveSearchStyle: "contains",
                            actionsBox: !1,
                            iconBase: B.ICONBASE,
                            tickIcon: B.TICKICON,
                            showTick: !1,
                            template: {
                                caret: '<span class="caret"></span>'
                            },
                            maxOptions: !1,
                            mobile: !1,
                            selectOnTab: !0,
                            dropdownAlignRight: !1,
                            windowPadding: 0,
                            virtualScroll: 600,
                            display: !1,
                            sanitize: !0,
                            sanitizeFn: null,
                            whiteList: {
                                "*": ["class", "dir", "id", "lang", "role", "tabindex", "style", /^aria-[\w-]*$/i],
                                a: ["target", "href", "title", "rel"],
                                area: [],
                                b: [],
                                br: [],
                                col: [],
                                code: [],
                                div: [],
                                em: [],
                                hr: [],
                                h1: [],
                                h2: [],
                                h3: [],
                                h4: [],
                                h5: [],
                                h6: [],
                                i: [],
                                img: ["src", "alt", "title", "width", "height"],
                                li: [],
                                ol: [],
                                p: [],
                                pre: [],
                                s: [],
                                small: [],
                                span: [],
                                sub: [],
                                sup: [],
                                strong: [],
                                u: [],
                                ul: []
                            }
                        }, K.prototype = {
                            constructor: K,
                            init: function() {
                                var t = this,
                                    i = this.$element.attr("id"),
                                    s = this.$element[0],
                                    n = s.form;
                                P++, this.selectId = "bs-select-" + P, s.classList.add("bs-select-hidden"), this.multiple = this.$element.prop("multiple"), this.autofocus = this.$element.prop("autofocus"), s.classList.contains("show-tick") && (this.options.showTick = !0), this.$newElement = this.createDropdown(), this.$element.after(this.$newElement).prependTo(this.$newElement), n && null === s.form && (n.id || (n.id = "form-" + this.selectId), s.setAttribute("form", n.id)), this.$button = this.$newElement.children("button"), this.options.allowClear && (this.$clearButton = this.$button.children(".bs-select-clear-selected")), this.$menu = this.$newElement.children(R.MENU), this.$menuInner = this.$menu.children(".inner"), this.$searchbox = this.$menu.find("input"), s.classList.remove("bs-select-hidden"), this.fetchData((function() {
                                    t.render(!0), t.buildList(), requestAnimationFrame((function() {
                                        t.$element.trigger("loaded" + W)
                                    }))
                                })), !0 === this.options.dropdownAlignRight && this.$menu[0].classList.add(B.MENURIGHT), void 0 !== i && this.$button.attr("data-id", i), this.checkDisabled(), this.clickListener(), M.major > 4 && (this.dropdown = new N(this.$button[0])), this.options.liveSearch ? (this.liveSearchListener(), this.focusedParent = this.$searchbox[0]) : this.focusedParent = this.$menuInner[0], this.setStyle(), this.setWidth(), this.options.container ? this.selectPosition() : this.$element.on("hide" + W, (function() {
                                    if (t.isVirtual()) {
                                        var e = t.$menuInner[0],
                                            i = e.firstChild.cloneNode(!1);
                                        e.replaceChild(i, e.firstChild), e.scrollTop = 0
                                    }
                                })), this.$menu.data("this", this), this.$newElement.data("this", this), this.options.mobile && this.mobile(), this.$newElement.on({
                                    "hide.bs.dropdown": function(e) {
                                        t.$element.trigger("hide" + W, e)
                                    },
                                    "hidden.bs.dropdown": function(e) {
                                        t.$element.trigger("hidden" + W, e)
                                    },
                                    "show.bs.dropdown": function(e) {
                                        t.$element.trigger("show" + W, e)
                                    },
                                    "shown.bs.dropdown": function(e) {
                                        t.$element.trigger("shown" + W, e)
                                    }
                                }), s.hasAttribute("required") && this.$element.on("invalid" + W, (function() {
                                    t.$button[0].classList.add("bs-invalid"), t.$element.on("shown" + W + ".invalid", (function() {
                                        t.$element.val(t.$element.val()).off("shown" + W + ".invalid")
                                    })).on("rendered" + W, (function() {
                                        this.validity.valid && t.$button[0].classList.remove("bs-invalid"), t.$element.off("rendered" + W)
                                    })), t.$button.on("blur" + W, (function() {
                                        t.$element.trigger("focus").trigger("blur"), t.$button.off("blur" + W)
                                    }))
                                })), n && e(n).on("reset" + W, (function() {
                                    requestAnimationFrame((function() {
                                        t.render()
                                    }))
                                }))
                            },
                            createDropdown: function() {
                                var t = this.multiple || this.options.showTick ? " show-tick" : "",
                                    i = this.multiple ? ' aria-multiselectable="true"' : "",
                                    s = "",
                                    n = this.autofocus ? " autofocus" : "";
                                M.major < 4 && this.$element.parent().hasClass("input-group") && (s = " input-group-btn");
                                var o, l = "",
                                    r = "",
                                    a = "",
                                    c = "",
                                    d = "";
                                return this.options.header && (l = '<div class="' + B.POPOVERHEADER + '"><button type="button" class="close" aria-hidden="true">&times;</button>' + this.options.header + "</div>"), this.options.liveSearch && (r = '<div class="bs-searchbox"><input type="search" class="form-control" autocomplete="off"' + (null === this.options.liveSearchPlaceholder ? "" : ' placeholder="' + D(this.options.liveSearchPlaceholder) + '"') + ' role="combobox" aria-label="Search" aria-controls="' + this.selectId + '" aria-autocomplete="list"></div>'), this.multiple && this.options.actionsBox && (a = '<div class="bs-actionsbox"><div class="btn-group btn-group-sm"><button type="button" class="actions-btn bs-select-all btn ' + B.BUTTONCLASS + '">' + this.options.selectAllText + '</button><button type="button" class="actions-btn bs-deselect-all btn ' + B.BUTTONCLASS + '">' + this.options.deselectAllText + "</button></div></div>"), this.multiple && this.options.doneButton && (c = '<div class="bs-donebutton"><div class="btn-group"><button type="button" class="btn btn-sm ' + B.BUTTONCLASS + '">' + this.options.doneButtonText + "</button></div></div>"), this.options.allowClear && (d = '<span class="close bs-select-clear-selected" title="' + this.options.deselectAllText + '"><span>&times;</span>'), o = '<div class="dropdown bootstrap-select' + t + s + '"><button type="button" tabindex="-1" class="' + this.options.styleBase + ' dropdown-toggle" ' + ("static" === this.options.display ? 'data-display="static"' : "") + R.DATA_TOGGLE + n + ' role="combobox" aria-owns="' + this.selectId + '" aria-haspopup="listbox" aria-expanded="false"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">&nbsp;</div></div> </div>' + d + "</span>" + (M.major >= "4" ? "" : '<span class="bs-caret">' + this.options.template.caret + "</span>") + '</button><div class="' + B.MENU + " " + (M.major >= "4" ? "" : B.SHOW) + '">' + l + r + a + '<div class="inner ' + B.SHOW + '" role="listbox" id="' + this.selectId + '" tabindex="-1" ' + i + '><ul class="' + B.MENU + " inner " + (M.major >= "4" ? B.SHOW : "") + '" role="presentation"></ul></div>' + c + "</div></div>", e(o)
                            },
                            setPositionData: function() {
                                this.selectpicker.view.canHighlight = [], this.selectpicker.view.size = 0, this.selectpicker.view.firstHighlightIndex = !1;
                                for (var e = 0; e < this.selectpicker.current.data.length; e++) {
                                    var t = this.selectpicker.current.data[e],
                                        i = !0;
                                    "divider" === t.type ? (i = !1, t.height = this.sizeInfo.dividerHeight) : "optgroup-label" === t.type ? (i = !1, t.height = this.sizeInfo.dropdownHeaderHeight) : t.height = this.sizeInfo.liHeight, t.disabled && (i = !1), this.selectpicker.view.canHighlight.push(i), i && (this.selectpicker.view.size++, t.posinset = this.selectpicker.view.size, !1 === this.selectpicker.view.firstHighlightIndex && (this.selectpicker.view.firstHighlightIndex = e)), t.position = (0 === e ? 0 : this.selectpicker.current.data[e - 1].position) + t.height
                                }
                            },
                            isVirtual: function() {
                                return !1 !== this.options.virtualScroll && this.selectpicker.main.data.length >= this.options.virtualScroll || !0 === this.options.virtualScroll
                            },
                            createView: function(t, i, s) {
                                var n = this,
                                    o = 0;
                                if (this.selectpicker.isSearching = t, this.selectpicker.current = t ? this.selectpicker.search : this.selectpicker.main, this.setPositionData(), i)
                                    if (s) o = this.$menuInner[0].scrollTop;
                                    else if (!n.multiple) {
                                    var l = n.$element[0],
                                        a = (l.options[l.selectedIndex] || {}).liIndex;
                                    if ("number" == typeof a && !1 !== n.options.size) {
                                        var c = n.selectpicker.main.data[a],
                                            d = c && c.position;
                                        d && (o = d - (n.sizeInfo.menuInnerHeight + n.sizeInfo.liHeight) / 2)
                                    }
                                }

                                function h(e, i) {
                                    var s, o, l, a, c, d, p, u, f, m, v = n.selectpicker.current.data.length,
                                        g = [],
                                        b = !0,
                                        w = n.isVirtual();
                                    n.selectpicker.view.scrollTop = e, s = n.options.chunkSize, o = Math.ceil(v / s) || 1;
                                    for (var k = 0; k < o; k++) {
                                        var I = (k + 1) * s;
                                        if (k === o - 1 && (I = v), g[k] = [k * s + (k ? 1 : 0), I], !v) break;
                                        void 0 === c && e - 1 <= n.selectpicker.current.data[I - 1].position - n.sizeInfo.menuInnerHeight && (c = k)
                                    }
                                    if (void 0 === c && (c = 0), d = [n.selectpicker.view.position0, n.selectpicker.view.position1], l = Math.max(0, c - 1), a = Math.min(o - 1, c + 1), n.selectpicker.view.position0 = !1 === w ? 0 : Math.max(0, g[l][0]) || 0, n.selectpicker.view.position1 = !1 === w ? v : Math.min(v, g[a][1]) || 0, p = d[0] !== n.selectpicker.view.position0 || d[1] !== n.selectpicker.view.position1, void 0 !== n.activeElement && (i && (n.activeElement !== n.selectedElement && n.defocusItem(n.activeElement), n.activeElement = void 0), n.activeElement !== n.selectedElement && n.defocusItem(n.selectedElement)), void 0 !== n.prevActiveElement && n.prevActiveElement !== n.activeElement && n.prevActiveElement !== n.selectedElement && n.defocusItem(n.prevActiveElement), i || p || n.selectpicker.current.hasMore) {
                                        if (u = n.selectpicker.view.visibleElements ? n.selectpicker.view.visibleElements.slice() : [], n.selectpicker.view.visibleElements = !1 === w ? n.selectpicker.current.elements : n.selectpicker.current.elements.slice(n.selectpicker.view.position0, n.selectpicker.view.position1), n.setOptionStatus(), (t || !1 === w && i) && (f = u, m = n.selectpicker.view.visibleElements, b = !(f.length === m.length && f.every((function(e, t) {
                                                return e === m[t]
                                            })))), (i || !0 === w) && b) {
                                            var y, x, E = n.$menuInner[0],
                                                $ = document.createDocumentFragment(),
                                                S = E.firstChild.cloneNode(!1),
                                                C = n.selectpicker.view.visibleElements,
                                                O = [];
                                            E.replaceChild(S, E.firstChild), k = 0;
                                            for (var A = C.length; k < A; k++) {
                                                var T, z, D = C[k];
                                                n.options.sanitize && (T = D.lastChild) && (z = n.selectpicker.current.data[k + n.selectpicker.view.position0]) && z.content && !z.sanitized && (O.push(T), z.sanitized = !0), $.appendChild(D)
                                            }
                                            if (n.options.sanitize && O.length && r(O, n.options.whiteList, n.options.sanitizeFn), !0 === w ? (y = 0 === n.selectpicker.view.position0 ? 0 : n.selectpicker.current.data[n.selectpicker.view.position0 - 1].position, x = n.selectpicker.view.position1 > v - 1 ? 0 : n.selectpicker.current.data[v - 1].position - n.selectpicker.current.data[n.selectpicker.view.position1 - 1].position, E.firstChild.style.marginTop = y + "px", E.firstChild.style.marginBottom = x + "px") : (E.firstChild.style.marginTop = 0, E.firstChild.style.marginBottom = 0), E.firstChild.appendChild($), !0 === w && n.sizeInfo.hasScrollBar) {
                                                var L = E.firstChild.offsetWidth;
                                                if (i && L < n.sizeInfo.menuInnerInnerWidth && n.sizeInfo.totalMenuWidth > n.sizeInfo.selectWidth) E.firstChild.style.minWidth = n.sizeInfo.menuInnerInnerWidth + "px";
                                                else if (L > n.sizeInfo.menuInnerInnerWidth) {
                                                    n.$menu[0].style.minWidth = 0;
                                                    var N = E.firstChild.offsetWidth;
                                                    N > n.sizeInfo.menuInnerInnerWidth && (n.sizeInfo.menuInnerInnerWidth = N, E.firstChild.style.minWidth = n.sizeInfo.menuInnerInnerWidth + "px"), n.$menu[0].style.minWidth = ""
                                                }
                                            }
                                        }
                                        if ((!t && n.options.source.data || t && n.options.source.search) && n.selectpicker.current.hasMore && c === o - 1 && e > 0) {
                                            var H = Math.floor(c * n.options.chunkSize / n.options.source.pageSize) + 2;
                                            n.fetchData((function() {
                                                n.render(), n.buildList(v, t), n.setPositionData(), h(e)
                                            }), t ? "search" : "data", H, t ? n.selectpicker.search.previousValue : void 0)
                                        }
                                    }
                                    if (n.prevActiveElement = n.activeElement, n.options.liveSearch) {
                                        if (t && i) {
                                            var M, P = 0;
                                            n.selectpicker.view.canHighlight[P] || (P = 1 + n.selectpicker.view.canHighlight.slice(1).indexOf(!0)), M = n.selectpicker.view.visibleElements[P], n.defocusItem(n.selectpicker.view.currentActive), n.activeElement = (n.selectpicker.current.data[P] || {}).element, n.focusItem(M)
                                        }
                                    } else n.$menuInner.trigger("focus")
                                }
                                h(o, !0), this.$menuInner.off("scroll.createView").on("scroll.createView", (function(e, t) {
                                    n.noScroll || h(this.scrollTop, t), n.noScroll = !1
                                })), e(window).off("resize" + W + "." + this.selectId + ".createView").on("resize" + W + "." + this.selectId + ".createView", (function() {
                                    n.$newElement.hasClass(B.SHOW) && h(n.$menuInner[0].scrollTop)
                                }))
                            },
                            focusItem: function(e, t, i) {
                                if (e) {
                                    t = t || this.selectpicker.current.data[this.selectpicker.current.elements.indexOf(this.activeElement)];
                                    var s = e.firstChild;
                                    s && (s.setAttribute("aria-setsize", this.selectpicker.view.size), s.setAttribute("aria-posinset", t.posinset), !0 !== i && (this.focusedParent.setAttribute("aria-activedescendant", s.id), e.classList.add("active"), s.classList.add("active")))
                                }
                            },
                            defocusItem: function(e) {
                                e && (e.classList.remove("active"), e.firstChild && e.firstChild.classList.remove("active"))
                            },
                            setPlaceholder: function() {
                                var e = this,
                                    t = !1;
                                if ((this.options.placeholder || this.options.allowClear) && !this.multiple) {
                                    this.selectpicker.view.titleOption || (this.selectpicker.view.titleOption = document.createElement("option")), t = !0;
                                    var i = this.$element[0],
                                        s = !1,
                                        n = !this.selectpicker.view.titleOption.parentNode,
                                        o = i.selectedIndex,
                                        l = i.options[o],
                                        r = i.querySelector("select > *:not(:disabled)"),
                                        a = r ? r.index : 0,
                                        c = window.performance && window.performance.getEntriesByType("navigation"),
                                        d = c && c.length ? "back_forward" !== c[0].type : 2 !== window.performance.navigation.type;
                                    n && (this.selectpicker.view.titleOption.className = "bs-title-option", this.selectpicker.view.titleOption.value = "", s = !l || o === a && !1 === l.defaultSelected && void 0 === this.$element.data("selected")), (n || 0 !== this.selectpicker.view.titleOption.index) && i.insertBefore(this.selectpicker.view.titleOption, i.firstChild), s && d ? i.selectedIndex = 0 : "complete" !== document.readyState && window.addEventListener("pageshow", (function() {
                                        e.selectpicker.view.displayedValue !== i.value && e.render()
                                    }))
                                }
                                return t
                            },
                            fetchData: function(e, t, i, s) {
                                i = i || 1, t = t || "data";
                                var n, o = this,
                                    l = this.options.source[t];
                                l ? (this.options.virtualScroll = !0, "function" == typeof l ? l.call(this, (function(i, s, l) {
                                    var r = o.selectpicker["search" === t ? "search" : "main"];
                                    r.hasMore = s, r.totalItems = l, n = o.buildData(i, t), e.call(o, n), o.$element.trigger("fetched" + W)
                                }), i, s) : Array.isArray(l) && (n = o.buildData(l, t), e.call(o, n))) : (n = this.buildData(!1, t), e.call(o, n))
                            },
                            buildData: function(t, i) {
                                var s = this,
                                    n = !1 === t ? F.fromOption : F.fromDataSource,
                                    o = ':not([hidden]):not([data-hidden="true"]):not([style*="display: none"])',
                                    l = [],
                                    r = this.selectpicker.main.data ? this.selectpicker.main.data.length : 0,
                                    a = 0,
                                    c = this.setPlaceholder() && !t ? 1 : 0;
                                "search" === i && (r = this.selectpicker.search.data.length), this.options.hideDisabled && (o += ":not(:disabled)");
                                var d = t ? t.filter(q, this) : this.$element[0].querySelectorAll("select > *" + o);

                                function h(e) {
                                    var t = l[l.length - 1];
                                    t && "divider" === t.type && (t.optID || e.optID) || ((e = e || {}).type = "divider", l.push(e))
                                }

                                function p(i, o) {
                                    if ((o = o || {}).divider = n(i, "divider"), !0 === o.divider) h({
                                        optID: o.optID
                                    });
                                    else {
                                        var a = l.length + r,
                                            c = n(i, "style"),
                                            d = c ? D(c) : "",
                                            p = (i.className || "") + (o.optgroupClass || "");
                                        o.optID && (p = "opt " + p), o.optionClass = p.trim(), o.inlineStyle = d, o.text = n(i, "text"), o.title = n(i, "title"), o.content = n(i, "content"), o.tokens = n(i, "tokens"), o.subtext = n(i, "subtext"), o.icon = n(i, "icon"), o.display = o.content || o.text, o.value = void 0 === i.value ? i.text : i.value, o.type = "option", o.index = a, o.option = i.option ? i.option : i, o.option.liIndex = a, o.selected = !!i.selected, o.disabled = o.disabled || !!i.disabled, !1 !== t && (s.selectpicker.optionValuesDataMap[o.value] ? o = e.extend(s.selectpicker.optionValuesDataMap[o.value], o) : s.selectpicker.optionValuesDataMap[o.value] = o), l.push(o)
                                    }
                                }

                                function u(e, i) {
                                    var s = i[e],
                                        r = !(e - 1 < c) && i[e - 1],
                                        d = i[e + 1],
                                        u = t ? s.children.filter(q, this) : s.querySelectorAll("option" + o);
                                    if (u.length) {
                                        var f, m, g = {
                                            display: D(n(v, "label")),
                                            subtext: n(s, "subtext"),
                                            icon: n(s, "icon"),
                                            type: "optgroup-label",
                                            optgroupClass: " " + (s.className || ""),
                                            optgroup: s
                                        };
                                        a++, r && h({
                                            optID: a
                                        }), g.optID = a, l.push(g);
                                        for (var b = 0, w = u.length; b < w; b++) {
                                            var k = u[b];
                                            0 === b && (m = (f = l.length - 1) + w), p(k, {
                                                headerIndex: f,
                                                lastIndex: m,
                                                optID: g.optID,
                                                optgroupClass: g.optgroupClass,
                                                disabled: s.disabled
                                            })
                                        }
                                        d && h({
                                            optID: a
                                        })
                                    }
                                }
                                for (var f = d.length, m = c; m < f; m++) {
                                    var v = d[m],
                                        g = v.children;
                                    g && g.length ? u.call(this, m, d) : p.call(this, v, {})
                                }
                                switch (i) {
                                    case "data":
                                        this.selectpicker.main.data || (this.selectpicker.main.data = []), Array.prototype.push.apply(this.selectpicker.main.data, l), this.selectpicker.current.data = this.selectpicker.main.data;
                                        break;
                                    case "search":
                                        Array.prototype.push.apply(this.selectpicker.search.data, l)
                                }
                                return l
                            },
                            buildList: function(e, t) {
                                var i = this,
                                    s = t ? this.selectpicker.search.data : this.selectpicker.main.data,
                                    n = [],
                                    o = 0;

                                function l(e, t) {
                                    var s, n = 0;
                                    switch (t.type) {
                                        case "divider":
                                            s = _.li(!1, B.DIVIDER, t.optID ? t.optID + "div" : void 0);
                                            break;
                                        case "option":
                                            (s = _.li(_.a(_.text.call(i, t), t.optionClass, t.inlineStyle), "", t.optID)).firstChild && (s.firstChild.id = i.selectId + "-" + t.index);
                                            break;
                                        case "optgroup-label":
                                            s = _.li(_.label.call(i, t), "dropdown-header" + t.optgroupClass, t.optID)
                                    }
                                    t.element ? t.element.innerHTML = s.innerHTML : t.element = s, e.push(t.element), t.display && (n += t.display.length), t.subtext && (n += t.subtext.length), t.icon && (n += 1), n > o && (o = n, i.selectpicker.view.widestOption = e[e.length - 1])
                                }!i.options.showTick && !i.multiple || j.checkMark.parentNode || (j.checkMark.className = this.options.iconBase + " " + i.options.tickIcon + " check-mark", j.a.appendChild(j.checkMark));
                                for (var r = e || 0, a = s.length, c = r; c < a; c++) l(n, s[c]);
                                e ? t ? Array.prototype.push.apply(this.selectpicker.search.elements, n) : (Array.prototype.push.apply(this.selectpicker.main.elements, n), this.selectpicker.current.elements = this.selectpicker.main.elements) : t ? this.selectpicker.search.elements = n : this.selectpicker.main.elements = this.selectpicker.current.elements = n
                            },
                            findLis: function() {
                                return this.$menuInner.find(".inner > li")
                            },
                            render: function(e) {
                                var t, i, s = this,
                                    n = this.$element[0],
                                    o = this.setPlaceholder() && 0 === n.selectedIndex,
                                    l = m.call(this),
                                    a = l.length,
                                    c = v.call(this, l),
                                    d = this.$button[0],
                                    h = d.querySelector(".filter-option-inner-inner"),
                                    p = document.createTextNode(this.options.multipleSeparator),
                                    u = j.fragment.cloneNode(!1),
                                    f = !1;
                                if (this.options.source.data && e && (l.map((function e(t) {
                                        t.selected ? s.createOption(t, !0) : t.children && t.children.length && t.children.map(e)
                                    })), n.appendChild(this.selectpicker.main.optionQueue), o && (o = 0 === n.selectedIndex)), d.classList.toggle("bs-placeholder", s.multiple ? !a : !c && 0 !== c), s.multiple || 1 !== l.length || (s.selectpicker.view.displayedValue = c), "static" === this.options.selectedTextFormat) u = _.text.call(this, {
                                    text: this.options.placeholder
                                }, !0);
                                else if ((t = this.multiple && -1 !== this.options.selectedTextFormat.indexOf("count") && a > 0) && (t = (i = this.options.selectedTextFormat.split(">")).length > 1 && a > i[1] || 1 === i.length && a >= 2), !1 === t) {
                                    if (!o) {
                                        for (var g = 0; g < a && g < 50; g++) {
                                            var b = l[g],
                                                w = {};
                                            b && (this.multiple && g > 0 && u.appendChild(p.cloneNode(!1)), b.title ? w.text = b.title : b.content && s.options.showContent ? (w.content = b.content.toString(), f = !0) : (s.options.showIcon && (w.icon = b.icon), s.options.showSubtext && !s.multiple && b.subtext && (w.subtext = " " + b.subtext), w.text = b.text.trim()), u.appendChild(_.text.call(this, w, !0)))
                                        }
                                        a > 49 && u.appendChild(document.createTextNode("..."))
                                    }
                                } else {
                                    var k = ':not([hidden]):not([data-hidden="true"]):not([data-divider="true"]):not([style*="display: none"])';
                                    this.options.hideDisabled && (k += ":not(:disabled)");
                                    var I = this.$element[0].querySelectorAll("select > option" + k + ", optgroup" + k + " option" + k).length,
                                        y = "function" == typeof this.options.countSelectedText ? this.options.countSelectedText(a, I) : this.options.countSelectedText;
                                    u = _.text.call(this, {
                                        text: y.replace("{0}", a.toString()).replace("{1}", I.toString())
                                    }, !0)
                                }
                                if (u.childNodes.length || (u = _.text.call(this, {
                                        text: this.options.placeholder ? this.options.placeholder : this.options.noneSelectedText
                                    }, !0)), d.title = u.textContent.replace(/<[^>]*>?/g, "").trim(), this.options.sanitize && f && r([u], s.options.whiteList, s.options.sanitizeFn), h.innerHTML = "", h.appendChild(u), M.major < 4 && this.$newElement[0].classList.contains("bs3-has-addon")) {
                                    var x = d.querySelector(".filter-expand"),
                                        E = h.cloneNode(!0);
                                    E.className = "filter-expand", x ? d.replaceChild(E, x) : d.appendChild(E)
                                }
                                this.$element.trigger("rendered" + W)
                            },
                            setStyle: function(e, t) {
                                var i, s = this.$button[0],
                                    n = this.$newElement[0],
                                    o = this.options.style.trim();
                                this.$element.attr("class") && this.$newElement.addClass(this.$element.attr("class").replace(/selectpicker|mobile-device|bs-select-hidden|validate\[.*\]/gi, "")), M.major < 4 && (n.classList.add("bs3"), n.parentNode.classList && n.parentNode.classList.contains("input-group") && (n.previousElementSibling || n.nextElementSibling) && (n.previousElementSibling || n.nextElementSibling).classList.contains("input-group-addon") && n.classList.add("bs3-has-addon")), i = e ? e.trim() : o, "add" == t ? i && s.classList.add.apply(s.classList, i.split(" ")) : "remove" == t ? i && s.classList.remove.apply(s.classList, i.split(" ")) : (o && s.classList.remove.apply(s.classList, o.split(" ")), i && s.classList.add.apply(s.classList, i.split(" ")))
                            },
                            liHeight: function(t) {
                                if (t || !1 !== this.options.size && !Object.keys(this.sizeInfo).length) {
                                    var i, s = j.div.cloneNode(!1),
                                        n = j.div.cloneNode(!1),
                                        o = j.div.cloneNode(!1),
                                        l = document.createElement("ul"),
                                        r = j.li.cloneNode(!1),
                                        a = j.li.cloneNode(!1),
                                        c = j.a.cloneNode(!1),
                                        d = j.span.cloneNode(!1),
                                        h = this.options.header && this.$menu.find("." + B.POPOVERHEADER).length > 0 ? this.$menu.find("." + B.POPOVERHEADER)[0].cloneNode(!0) : null,
                                        p = this.options.liveSearch ? j.div.cloneNode(!1) : null,
                                        u = this.options.actionsBox && this.multiple && this.$menu.find(".bs-actionsbox").length > 0 ? this.$menu.find(".bs-actionsbox")[0].cloneNode(!0) : null,
                                        f = this.options.doneButton && this.multiple && this.$menu.find(".bs-donebutton").length > 0 ? this.$menu.find(".bs-donebutton")[0].cloneNode(!0) : null,
                                        m = this.$element[0].options[0];
                                    if (this.sizeInfo.selectWidth = this.$newElement[0].offsetWidth, d.className = "text", c.className = "dropdown-item " + (m ? m.className : ""), s.className = this.$menu[0].parentNode.className + " " + B.SHOW, s.style.width = 0, "auto" === this.options.width && (n.style.minWidth = 0), n.className = B.MENU + " " + B.SHOW, o.className = "inner " + B.SHOW, l.className = B.MENU + " inner " + (M.major >= "4" ? B.SHOW : ""), r.className = B.DIVIDER, a.className = "dropdown-header", d.appendChild(document.createTextNode("​")), this.selectpicker.current.data.length)
                                        for (var v = 0; v < this.selectpicker.current.data.length; v++) {
                                            var g = this.selectpicker.current.data[v];
                                            if ("option" === g.type && "none" !== e(g.element.firstChild).css("display")) {
                                                i = g.element;
                                                break
                                            }
                                        } else i = j.li.cloneNode(!1), c.appendChild(d), i.appendChild(c);
                                    if (a.appendChild(d.cloneNode(!0)), this.selectpicker.view.widestOption && l.appendChild(this.selectpicker.view.widestOption.cloneNode(!0)), l.appendChild(i), l.appendChild(r), l.appendChild(a), h && n.appendChild(h), p) {
                                        var b = document.createElement("input");
                                        p.className = "bs-searchbox", b.className = "form-control", p.appendChild(b), n.appendChild(p)
                                    }
                                    u && n.appendChild(u), o.appendChild(l), n.appendChild(o), f && n.appendChild(f), s.appendChild(n), document.body.appendChild(s);
                                    var w, k = i.offsetHeight,
                                        y = a ? a.offsetHeight : 0,
                                        x = h ? h.offsetHeight : 0,
                                        E = p ? p.offsetHeight : 0,
                                        $ = u ? u.offsetHeight : 0,
                                        S = f ? f.offsetHeight : 0,
                                        C = e(r).outerHeight(!0),
                                        O = window.getComputedStyle(n),
                                        A = n.offsetWidth,
                                        T = {
                                            vert: I(O.paddingTop) + I(O.paddingBottom) + I(O.borderTopWidth) + I(O.borderBottomWidth),
                                            horiz: I(O.paddingLeft) + I(O.paddingRight) + I(O.borderLeftWidth) + I(O.borderRightWidth)
                                        },
                                        z = {
                                            vert: T.vert + I(O.marginTop) + I(O.marginBottom) + 2,
                                            horiz: T.horiz + I(O.marginLeft) + I(O.marginRight) + 2
                                        };
                                    o.style.overflowY = "scroll", w = n.offsetWidth - A, document.body.removeChild(s), this.sizeInfo.liHeight = k, this.sizeInfo.dropdownHeaderHeight = y, this.sizeInfo.headerHeight = x, this.sizeInfo.searchHeight = E, this.sizeInfo.actionsHeight = $, this.sizeInfo.doneButtonHeight = S, this.sizeInfo.dividerHeight = C, this.sizeInfo.menuPadding = T, this.sizeInfo.menuExtras = z, this.sizeInfo.menuWidth = A, this.sizeInfo.menuInnerInnerWidth = A - T.horiz, this.sizeInfo.totalMenuWidth = this.sizeInfo.menuWidth, this.sizeInfo.scrollBarWidth = w, this.sizeInfo.selectHeight = this.$newElement[0].offsetHeight, this.setPositionData()
                                }
                            },
                            getSelectPosition: function() {
                                var t, i = this,
                                    s = e(window),
                                    n = i.$newElement.offset(),
                                    o = e(i.options.container);
                                i.options.container && o.length && !o.is("body") ? ((t = o.offset()).top += parseInt(o.css("borderTopWidth")), t.left += parseInt(o.css("borderLeftWidth"))) : t = {
                                    top: 0,
                                    left: 0
                                };
                                var l = i.options.windowPadding;
                                this.sizeInfo.selectOffsetTop = n.top - t.top - s.scrollTop(), this.sizeInfo.selectOffsetBot = s.height() - this.sizeInfo.selectOffsetTop - this.sizeInfo.selectHeight - t.top - l[2], this.sizeInfo.selectOffsetLeft = n.left - t.left - s.scrollLeft(), this.sizeInfo.selectOffsetRight = s.width() - this.sizeInfo.selectOffsetLeft - this.sizeInfo.selectWidth - t.left - l[1], this.sizeInfo.selectOffsetTop -= l[0], this.sizeInfo.selectOffsetLeft -= l[3]
                            },
                            setMenuSize: function(e) {
                                this.getSelectPosition();
                                var t, i, s, n, o, l, r, a, c = this.sizeInfo.selectWidth,
                                    d = this.sizeInfo.liHeight,
                                    h = this.sizeInfo.headerHeight,
                                    p = this.sizeInfo.searchHeight,
                                    u = this.sizeInfo.actionsHeight,
                                    f = this.sizeInfo.doneButtonHeight,
                                    m = this.sizeInfo.dividerHeight,
                                    v = this.sizeInfo.menuPadding,
                                    g = 0;
                                if (this.options.dropupAuto && (r = d * this.selectpicker.current.data.length + v.vert, a = this.sizeInfo.selectOffsetTop - this.sizeInfo.selectOffsetBot > this.sizeInfo.menuExtras.vert && r + this.sizeInfo.menuExtras.vert + 50 > this.sizeInfo.selectOffsetBot, !0 === this.selectpicker.isSearching && (a = this.selectpicker.dropup), this.$newElement.toggleClass(B.DROPUP, a), this.selectpicker.dropup = a), "auto" === this.options.size) n = this.selectpicker.current.data.length > 3 ? 3 * this.sizeInfo.liHeight + this.sizeInfo.menuExtras.vert - 2 : 0, i = this.sizeInfo.selectOffsetBot - this.sizeInfo.menuExtras.vert, s = n + h + p + u + f, l = Math.max(n - v.vert, 0), this.$newElement.hasClass(B.DROPUP) && (i = this.sizeInfo.selectOffsetTop - this.sizeInfo.menuExtras.vert), o = i, t = i - h - p - u - f - v.vert;
                                else if (this.options.size && "auto" != this.options.size && this.selectpicker.current.elements.length > this.options.size) {
                                    for (var b = 0; b < this.options.size; b++) "divider" === this.selectpicker.current.data[b].type && g++;
                                    t = (i = d * this.options.size + g * m + v.vert) - v.vert, o = i + h + p + u + f, s = l = ""
                                }
                                this.$menu.css({
                                    "max-height": o + "px",
                                    overflow: "hidden",
                                    "min-height": s + "px"
                                }), this.$menuInner.css({
                                    "max-height": t + "px",
                                    overflow: "hidden auto",
                                    "min-height": l + "px"
                                }), this.sizeInfo.menuInnerHeight = Math.max(t, 1), this.selectpicker.current.data.length && this.selectpicker.current.data[this.selectpicker.current.data.length - 1].position > this.sizeInfo.menuInnerHeight && (this.sizeInfo.hasScrollBar = !0, this.sizeInfo.totalMenuWidth = this.sizeInfo.menuWidth + this.sizeInfo.scrollBarWidth), "auto" === this.options.dropdownAlignRight && this.$menu.toggleClass(B.MENURIGHT, this.sizeInfo.selectOffsetLeft > this.sizeInfo.selectOffsetRight && this.sizeInfo.selectOffsetRight < this.sizeInfo.totalMenuWidth - c), this.dropdown && this.dropdown._popper && this.dropdown._popper.update()
                            },
                            setSize: function(t) {
                                if (this.liHeight(t), this.options.header && this.$menu.css("padding-top", 0), !1 !== this.options.size) {
                                    var i = this,
                                        s = e(window);
                                    this.setMenuSize(), this.options.liveSearch && this.$searchbox.off("input.setMenuSize propertychange.setMenuSize").on("input.setMenuSize propertychange.setMenuSize", (function() {
                                        return i.setMenuSize()
                                    })), "auto" === this.options.size ? s.off("resize" + W + "." + this.selectId + ".setMenuSize scroll" + W + "." + this.selectId + ".setMenuSize").on("resize" + W + "." + this.selectId + ".setMenuSize scroll" + W + "." + this.selectId + ".setMenuSize", (function() {
                                        return i.setMenuSize()
                                    })) : this.options.size && "auto" != this.options.size && this.selectpicker.current.elements.length > this.options.size && s.off("resize" + W + "." + this.selectId + ".setMenuSize scroll" + W + "." + this.selectId + ".setMenuSize")
                                }
                                this.createView(!1, !0, t)
                            },
                            setWidth: function() {
                                var e = this;
                                "auto" === this.options.width ? requestAnimationFrame((function() {
                                    e.$menu.css("min-width", "0"), e.$element.on("loaded" + W, (function() {
                                        e.liHeight(), e.setMenuSize();
                                        var t = e.$newElement.clone().appendTo("body"),
                                            i = t.css("width", "auto").children("button").outerWidth();
                                        t.remove(), e.sizeInfo.selectWidth = Math.max(e.sizeInfo.totalMenuWidth, i), e.$newElement.css("width", e.sizeInfo.selectWidth + "px")
                                    }))
                                })) : "fit" === this.options.width ? (this.$menu.css("min-width", ""), this.$newElement.css("width", "").addClass("fit-width")) : this.options.width ? (this.$menu.css("min-width", ""), this.$newElement.css("width", this.options.width)) : (this.$menu.css("min-width", ""), this.$newElement.css("width", "")), this.$newElement.hasClass("fit-width") && "fit" !== this.options.width && this.$newElement[0].classList.remove("fit-width")
                            },
                            selectPosition: function() {
                                this.$bsContainer = e('<div class="bs-container" />');
                                var t, i, s, n = this,
                                    o = e(this.options.container),
                                    l = function(l) {
                                        var r = {},
                                            a = n.options.display || !!e.fn.dropdown.Constructor.Default && e.fn.dropdown.Constructor.Default.display;
                                        n.$bsContainer.addClass(l.attr("class").replace(/form-control|fit-width/gi, "")).toggleClass(B.DROPUP, l.hasClass(B.DROPUP)), t = l.offset(), o.is("body") ? i = {
                                            top: 0,
                                            left: 0
                                        } : ((i = o.offset()).top += parseInt(o.css("borderTopWidth")) - o.scrollTop(), i.left += parseInt(o.css("borderLeftWidth")) - o.scrollLeft()), s = l.hasClass(B.DROPUP) ? 0 : l[0].offsetHeight, (M.major < 4 || "static" === a) && (r.top = t.top - i.top + s, r.left = t.left - i.left), r.width = l[0].offsetWidth, n.$bsContainer.css(r)
                                    };
                                this.$button.on("click.bs.dropdown.data-api", (function() {
                                    n.isDisabled() || (l(n.$newElement), n.$bsContainer.appendTo(n.options.container).toggleClass(B.SHOW, !n.$button.hasClass(B.SHOW)).append(n.$menu))
                                })), e(window).off("resize" + W + "." + this.selectId + " scroll" + W + "." + this.selectId).on("resize" + W + "." + this.selectId + " scroll" + W + "." + this.selectId, (function() {
                                    n.$newElement.hasClass(B.SHOW) && l(n.$newElement)
                                })), this.$element.on("hide" + W, (function() {
                                    n.$menu.data("height", n.$menu.height()), n.$bsContainer.detach()
                                }))
                            },
                            createOption: function(e, t) {
                                var i = e.option ? e.option : e;
                                if (i && 1 !== i.nodeType) {
                                    var s = (t ? j.selectedOption : j.option).cloneNode(!0);
                                    void 0 !== i.value && (s.value = i.value), s.textContent = i.text, s.selected = !0, void 0 !== i.liIndex ? s.liIndex = i.liIndex : t || (s.liIndex = e.index), e.option = s, this.selectpicker.main.optionQueue.appendChild(s)
                                }
                            },
                            setOptionStatus: function(e) {
                                var t = this;
                                if (t.noScroll = !1, t.selectpicker.view.visibleElements && t.selectpicker.view.visibleElements.length) {
                                    for (var i = 0; i < t.selectpicker.view.visibleElements.length; i++) {
                                        var s = t.selectpicker.current.data[i + t.selectpicker.view.position0];
                                        s.option && (!0 !== e && t.setDisabled(s), t.setSelected(s))
                                    }
                                    this.options.source.data && this.$element[0].appendChild(this.selectpicker.main.optionQueue)
                                }
                            },
                            setSelected: function(e, t) {
                                t = void 0 === t ? e.selected : t;
                                var i, s, n = e.element,
                                    o = void 0 !== this.activeElement,
                                    l = this.activeElement === n || t && !this.multiple && !o;
                                n && (void 0 !== t && (e.selected = t, e.option && (e.option.selected = t)), t && this.options.source.data && this.createOption(e, !1), s = n.firstChild, t && (this.selectedElement = n), n.classList.toggle("selected", t), l ? (this.focusItem(n, e), this.selectpicker.view.currentActive = n, this.activeElement = n) : this.defocusItem(n), s && (s.classList.toggle("selected", t), t ? s.setAttribute("aria-selected", !0) : this.multiple ? s.setAttribute("aria-selected", !1) : s.removeAttribute("aria-selected")), l || o || !t || void 0 === this.prevActiveElement || (i = this.prevActiveElement, this.defocusItem(i)))
                            },
                            setDisabled: function(e) {
                                var t, i = e.disabled,
                                    s = e.element;
                                s && (t = s.firstChild, s.classList.toggle(B.DISABLED, i), t && (M.major >= "4" && t.classList.toggle(B.DISABLED, i), i ? (t.setAttribute("aria-disabled", i), t.setAttribute("tabindex", -1)) : (t.removeAttribute("aria-disabled"), t.setAttribute("tabindex", 0))))
                            },
                            isDisabled: function() {
                                return this.$element[0].disabled
                            },
                            checkDisabled: function() {
                                this.isDisabled() ? (this.$newElement[0].classList.add(B.DISABLED), this.$button.addClass(B.DISABLED).attr("aria-disabled", !0)) : this.$button[0].classList.contains(B.DISABLED) && (this.$newElement[0].classList.remove(B.DISABLED), this.$button.removeClass(B.DISABLED).attr("aria-disabled", !1))
                            },
                            clickListener: function() {
                                var t = this,
                                    i = e(document);

                                function s() {
                                    t.options.liveSearch ? t.$searchbox.trigger("focus") : t.$menuInner.trigger("focus")
                                }

                                function n() {
                                    t.dropdown && t.dropdown._popper && t.dropdown._popper.state ? s() : requestAnimationFrame(n)
                                }
                                i.data("spaceSelect", !1), this.$button.on("keyup", (function(e) {
                                    /(32)/.test(e.keyCode.toString(10)) && i.data("spaceSelect") && (e.preventDefault(), i.data("spaceSelect", !1))
                                })), this.$newElement.on("show.bs.dropdown", (function() {
                                    t.dropdown || "4" !== M.major || (t.dropdown = t.$button.data("bs.dropdown"), t.dropdown._menu = t.$menu[0])
                                })), this.$button.on("click.bs.dropdown.data-api", (function(e) {
                                    if (t.options.allowClear) {
                                        var i = e.target,
                                            s = t.$clearButton[0];
                                        /MSIE|Trident/.test(window.navigator.userAgent) && (i = document.elementFromPoint(e.clientX, e.clientY)), i !== s && i.parentElement !== s || (e.stopImmediatePropagation(), function(e) {
                                            if (t.multiple) t.deselectAll();
                                            else {
                                                var i = t.$element[0],
                                                    s = i.value,
                                                    n = i.selectedIndex,
                                                    o = i.options[n],
                                                    l = !!o && t.selectpicker.main.data[o.liIndex];
                                                l && t.setSelected(l, !1), i.selectedIndex = 0, b = [n, !1, s], t.$element.triggerNative("change")
                                            }
                                            t.$newElement.hasClass(B.SHOW) && (t.options.liveSearch && t.$searchbox.trigger("focus"), t.createView(!1))
                                        }())
                                    }
                                    t.$newElement.hasClass(B.SHOW) || t.setSize()
                                })), this.$element.on("shown" + W, (function() {
                                    t.$menuInner[0].scrollTop !== t.selectpicker.view.scrollTop && (t.$menuInner[0].scrollTop = t.selectpicker.view.scrollTop), M.major > 3 ? requestAnimationFrame(n) : s()
                                })), this.$menuInner.on("mouseenter", "li a", (function(e) {
                                    var i = this.parentElement,
                                        s = t.isVirtual() ? t.selectpicker.view.position0 : 0,
                                        n = Array.prototype.indexOf.call(i.parentElement.children, i),
                                        o = t.selectpicker.current.data[n + s];
                                    t.focusItem(i, o, !0)
                                })), this.$menuInner.on("click", "li a", (function(i, s) {
                                    var n = e(this),
                                        o = t.$element[0],
                                        l = t.isVirtual() ? t.selectpicker.view.position0 : 0,
                                        r = t.selectpicker.current.data[n.parent().index() + l],
                                        a = r.element,
                                        c = v.call(t),
                                        d = o.selectedIndex,
                                        h = o.options[d],
                                        p = !!h && t.selectpicker.main.data[h.liIndex],
                                        u = !0;
                                    if (t.multiple && 1 !== t.options.maxOptions && i.stopPropagation(), i.preventDefault(), !t.isDisabled() && !n.parent().hasClass(B.DISABLED)) {
                                        var f = r.option,
                                            g = e(f),
                                            w = f.selected,
                                            k = t.selectpicker.current.data.find((function(e) {
                                                return e.optID === r.optID && "optgroup-label" === e.type
                                            })),
                                            I = k ? k.optgroup : void 0,
                                            y = I instanceof Element ? F.fromOption : F.fromDataSource,
                                            x = I && I.children,
                                            E = parseInt(t.options.maxOptions),
                                            $ = I && parseInt(y(I, "maxOptions")) || !1;
                                        if (a === t.activeElement && (s = !0), s || (t.prevActiveElement = t.activeElement, t.activeElement = void 0), t.multiple && 1 !== E) {
                                            if (t.setSelected(r, !w), t.focusedParent.focus(), !1 !== E || !1 !== $) {
                                                var S = E < m.call(t).length,
                                                    C = 0;
                                                if (I && I.children)
                                                    for (var O = 0; O < I.children.length; O++) I.children[O].selected && C++;
                                                var A = $ < C;
                                                if (E && S || $ && A)
                                                    if (E && 1 === E) o.selectedIndex = -1, t.setOptionStatus(!0);
                                                    else if ($ && 1 === $) {
                                                    for (O = 0; O < x.length; O++) {
                                                        var T = x[O];
                                                        t.setSelected(t.selectpicker.current.data[T.liIndex], !1)
                                                    }
                                                    t.setSelected(r, !0)
                                                } else {
                                                    var z = "string" == typeof t.options.maxOptionsText ? [t.options.maxOptionsText, t.options.maxOptionsText] : t.options.maxOptionsText,
                                                        D = "function" == typeof z ? z(E, $) : z,
                                                        L = D[0].replace("{n}", E),
                                                        N = D[1].replace("{n}", $),
                                                        H = e('<div class="notify"></div>');
                                                    D[2] && (L = L.replace("{var}", D[2][E > 1 ? 0 : 1]), N = N.replace("{var}", D[2][$ > 1 ? 0 : 1])), t.$menu.append(H), E && S && (H.append(e("<div>" + L + "</div>")), u = !1, t.$element.trigger("maxReached" + W)), $ && A && (H.append(e("<div>" + N + "</div>")), u = !1, t.$element.trigger("maxReachedGrp" + W)), setTimeout((function() {
                                                        t.setSelected(r, !1)
                                                    }), 10), H[0].classList.add("fadeOut"), setTimeout((function() {
                                                        H.remove()
                                                    }), 1050)
                                                }
                                            }
                                        } else p && t.setSelected(p, !1), t.setSelected(r, !0);
                                        t.options.source.data && t.$element[0].appendChild(t.selectpicker.main.optionQueue), !t.multiple || t.multiple && 1 === t.options.maxOptions ? t.$button.trigger("focus") : t.options.liveSearch && t.$searchbox.trigger("focus"), u && (t.multiple || d !== o.selectedIndex) && (b = [f.index, g.prop("selected"), c], t.$element.triggerNative("change"))
                                    }
                                })), this.$menu.on("click", "li." + B.DISABLED + " a, ." + B.POPOVERHEADER + ", ." + B.POPOVERHEADER + " :not(.close)", (function(i) {
                                    i.currentTarget == this && (i.preventDefault(), i.stopPropagation(), t.options.liveSearch && !e(i.target).hasClass("close") ? t.$searchbox.trigger("focus") : t.$button.trigger("focus"))
                                })), this.$menuInner.on("click", ".divider, .dropdown-header", (function(e) {
                                    e.preventDefault(), e.stopPropagation(), t.options.liveSearch ? t.$searchbox.trigger("focus") : t.$button.trigger("focus")
                                })), this.$menu.on("click", "." + B.POPOVERHEADER + " .close", (function() {
                                    t.$button.trigger("click")
                                })), this.$searchbox.on("click", (function(e) {
                                    e.stopPropagation()
                                })), this.$menu.on("click", ".actions-btn", (function(i) {
                                    t.options.liveSearch ? t.$searchbox.trigger("focus") : t.$button.trigger("focus"), i.preventDefault(), i.stopPropagation(), e(this).hasClass("bs-select-all") ? t.selectAll() : t.deselectAll()
                                })), this.$button.on("focus" + W, (function(e) {
                                    var i = t.$element[0].getAttribute("tabindex");
                                    void 0 !== i && e.originalEvent && e.originalEvent.isTrusted && (this.setAttribute("tabindex", i), t.$element[0].setAttribute("tabindex", -1), t.selectpicker.view.tabindex = i)
                                })).on("blur" + W, (function(e) {
                                    void 0 !== t.selectpicker.view.tabindex && e.originalEvent && e.originalEvent.isTrusted && (t.$element[0].setAttribute("tabindex", t.selectpicker.view.tabindex), this.setAttribute("tabindex", -1), t.selectpicker.view.tabindex = void 0)
                                })), this.$element.on("change" + W, (function() {
                                    t.render(), t.$element.trigger("changed" + W, b), b = null
                                })).on("focus" + W, (function() {
                                    t.options.mobile || t.$button[0].focus()
                                }))
                            },
                            liveSearchListener: function() {
                                var e = this;
                                this.$button.on("click.bs.dropdown.data-api", (function() {
                                    e.$searchbox.val() && (e.$searchbox.val(""), e.selectpicker.search.previousValue = void 0)
                                })), this.$searchbox.on("click.bs.dropdown.data-api focus.bs.dropdown.data-api touchend.bs.dropdown.data-api", (function(e) {
                                    e.stopPropagation()
                                })), this.$searchbox.on("input propertychange", (function() {
                                    var t = e.$searchbox[0].value;
                                    if (e.selectpicker.search.elements = [], e.selectpicker.search.data = [], t)
                                        if (e.selectpicker.search.previousValue = t, e.options.source.search) e.fetchData((function(i) {
                                            e.render(), e.buildList(void 0, !0), e.noScroll = !0, e.$menuInner.scrollTop(0), e.createView(!0), G.call(e, i, t)
                                        }), "search", 0, t);
                                        else {
                                            var i = [],
                                                s = t.toUpperCase(),
                                                n = {},
                                                o = [],
                                                l = e._searchStyle(),
                                                r = e.options.liveSearchNormalize;
                                            r && (s = S(s));
                                            for (var a = 0; a < e.selectpicker.main.data.length; a++) {
                                                var c = e.selectpicker.main.data[a];
                                                n[a] || (n[a] = k(c, s, l, r)), n[a] && void 0 !== c.headerIndex && -1 === o.indexOf(c.headerIndex) && (c.headerIndex > 0 && (n[c.headerIndex - 1] = !0, o.push(c.headerIndex - 1)), n[c.headerIndex] = !0, o.push(c.headerIndex), n[c.lastIndex + 1] = !0), n[a] && "optgroup-label" !== c.type && o.push(a)
                                            }
                                            a = 0;
                                            for (var d = o.length; a < d; a++) {
                                                var h = o[a],
                                                    p = o[a - 1],
                                                    u = (c = e.selectpicker.main.data[h], e.selectpicker.main.data[p]);
                                                ("divider" !== c.type || "divider" === c.type && u && "divider" !== u.type && d - 1 !== a) && (e.selectpicker.search.data.push(c), i.push(e.selectpicker.main.elements[h]))
                                            }
                                            e.activeElement = void 0, e.noScroll = !0, e.$menuInner.scrollTop(0), e.selectpicker.search.elements = i, e.createView(!0), G.call(e, i, t)
                                        }
                                    else e.selectpicker.search.previousValue && (e.$menuInner.scrollTop(0), e.createView(!1))
                                }))
                            },
                            _searchStyle: function() {
                                return this.options.liveSearchStyle || "contains"
                            },
                            val: function(e) {
                                var t = this.$element[0];
                                if (void 0 !== e) {
                                    var i = m.call(this),
                                        s = v.call(this, i);
                                    b = [null, null, s], Array.isArray(e) || (e = [e]), e.map(String);
                                    for (var n = 0; n < i.length; n++) {
                                        var o = i[n];
                                        o && -1 === e.indexOf(String(o.value)) && this.setSelected(o, !1)
                                    }
                                    if (this.selectpicker.main.data.filter((function(t) {
                                            return -1 !== e.indexOf(String(t.value)) && (this.setSelected(t, !0), !0)
                                        }), this), this.options.source.data && t.appendChild(this.selectpicker.main.optionQueue), this.$element.trigger("changed" + W, b), this.$newElement.hasClass(B.SHOW))
                                        if (this.multiple) this.setOptionStatus(!0);
                                        else {
                                            var l = (t.options[t.selectedIndex] || {}).liIndex;
                                            "number" == typeof l && this.setSelected(this.selectpicker.current.data[l], !0)
                                        }
                                    return this.render(), b = null, this.$element
                                }
                                return this.$element.val()
                            },
                            changeAll: function(e) {
                                if (this.multiple) {
                                    void 0 === e && (e = !0);
                                    var t = this.$element[0],
                                        i = 0,
                                        s = 0,
                                        n = v.call(this);
                                    t.classList.add("bs-select-hidden");
                                    for (var o = 0, l = this.selectpicker.current.data, r = l.length; o < r; o++) {
                                        var a = l[o],
                                            c = a.option;
                                        c && !a.disabled && "divider" !== a.type && (a.selected && i++, c.selected = e, a.selected = e, !0 === e && s++)
                                    }
                                    t.classList.remove("bs-select-hidden"), i !== s && (this.setOptionStatus(), b = [null, null, n], this.$element.triggerNative("change"))
                                }
                            },
                            selectAll: function() {
                                return this.changeAll(!0)
                            },
                            deselectAll: function() {
                                return this.changeAll(!1)
                            },
                            toggle: function(e, t) {
                                var i, s = void 0 === t;
                                (e = e || window.event) && e.stopPropagation(), !1 === s && (i = this.$newElement[0].classList.contains(B.SHOW), s = !0 === t && !1 === i || !1 === t && !0 === i), s && this.$button.trigger("click.bs.dropdown.data-api")
                            },
                            open: function(e) {
                                this.toggle(e, !0)
                            },
                            close: function(e) {
                                this.toggle(e, !1)
                            },
                            keydown: function(t) {
                                var i, s, n, o, l, r = e(this),
                                    a = r.hasClass("dropdown-toggle"),
                                    c = (a ? r.closest(".dropdown") : r.closest(R.MENU)).data("this"),
                                    d = c.findLis(),
                                    h = !1,
                                    p = 9 === t.which && !a && !c.options.selectOnTab,
                                    u = U.test(t.which) || p,
                                    f = c.$menuInner[0].scrollTop,
                                    m = !0 === c.isVirtual() ? c.selectpicker.view.position0 : 0;
                                if (!(t.which >= 112 && t.which <= 123))
                                    if (!(s = c.$menu.hasClass(B.SHOW)) && (u || t.which >= 48 && t.which <= 57 || t.which >= 96 && t.which <= 105 || t.which >= 65 && t.which <= 90) && (c.$button.trigger("click.bs.dropdown.data-api"), c.options.liveSearch)) c.$searchbox.trigger("focus");
                                    else {
                                        if (27 === t.which && s && (t.preventDefault(), c.$button.trigger("click.bs.dropdown.data-api").trigger("focus")), u) {
                                            if (!d.length) return; - 1 !== (i = (n = c.activeElement) ? Array.prototype.indexOf.call(n.parentElement.children, n) : -1) && c.defocusItem(n), 38 === t.which ? (-1 !== i && i--, i + m < 0 && (i += d.length), c.selectpicker.view.canHighlight[i + m] || -1 == (i = c.selectpicker.view.canHighlight.slice(0, i + m).lastIndexOf(!0) - m) && (i = d.length - 1)) : (40 === t.which || p) && (++i + m >= c.selectpicker.view.canHighlight.length && (i = c.selectpicker.view.firstHighlightIndex), c.selectpicker.view.canHighlight[i + m] || (i = i + 1 + c.selectpicker.view.canHighlight.slice(i + m + 1).indexOf(!0))), t.preventDefault();
                                            var v = m + i;
                                            38 === t.which ? 0 === m && i === d.length - 1 ? (c.$menuInner[0].scrollTop = c.$menuInner[0].scrollHeight, v = c.selectpicker.current.elements.length - 1) : (o = c.selectpicker.current.data[v]) && (h = (l = o.position - o.height) < f) : (40 === t.which || p) && (i === c.selectpicker.view.firstHighlightIndex ? (c.$menuInner[0].scrollTop = 0, v = c.selectpicker.view.firstHighlightIndex) : (o = c.selectpicker.current.data[v]) && (h = (l = o.position - c.sizeInfo.menuInnerHeight) > f)), n = c.selectpicker.current.elements[v], c.activeElement = (c.selectpicker.current.data[v] || {}).element, c.focusItem(n), c.selectpicker.view.currentActive = n, h && (c.$menuInner[0].scrollTop = l), c.options.liveSearch ? c.$searchbox.trigger("focus") : r.trigger("focus")
                                        } else if (!r.is("input") && !V.test(t.which) || 32 === t.which && c.selectpicker.keydown.keyHistory) {
                                            var g, b, w = [];
                                            t.preventDefault(), c.selectpicker.keydown.keyHistory += L[t.which], c.selectpicker.keydown.resetKeyHistory.cancel && clearTimeout(c.selectpicker.keydown.resetKeyHistory.cancel), c.selectpicker.keydown.resetKeyHistory.cancel = c.selectpicker.keydown.resetKeyHistory.start(), b = c.selectpicker.keydown.keyHistory, /^(.)\1+$/.test(b) && (b = b.charAt(0));
                                            for (var I = 0; I < c.selectpicker.current.data.length; I++) {
                                                var y = c.selectpicker.current.data[I];
                                                k(y, b, "startsWith", !0) && c.selectpicker.view.canHighlight[I] && w.push(y.element)
                                            }
                                            if (w.length) {
                                                var x = 0;
                                                d.removeClass("active").find("a").removeClass("active"), 1 === b.length && (-1 === (x = w.indexOf(c.activeElement)) || x === w.length - 1 ? x = 0 : x++), g = w[x], f - (o = c.selectpicker.main.data[g]).position > 0 ? (l = o.position - o.height, h = !0) : (l = o.position - c.sizeInfo.menuInnerHeight, h = o.position > f + c.sizeInfo.menuInnerHeight), n = c.selectpicker.main.elements[g], c.activeElement = n, c.focusItem(n), n && n.firstChild.focus(), h && (c.$menuInner[0].scrollTop = l), r.trigger("focus")
                                            }
                                        }
                                        s && (32 === t.which && !c.selectpicker.keydown.keyHistory || 13 === t.which || 9 === t.which && c.options.selectOnTab) && (32 !== t.which && t.preventDefault(), c.options.liveSearch && 32 === t.which || (c.$menuInner.find(".active a").trigger("click", !0), r.trigger("focus"), c.options.liveSearch || (t.preventDefault(), e(document).data("spaceSelect", !0))))
                                    }
                            },
                            mobile: function() {
                                this.options.mobile = !0, this.$element[0].classList.add("mobile-device")
                            },
                            refresh: function() {
                                var t = this,
                                    i = e.extend({}, this.options, a(this.$element), this.$element.data());
                                this.options = i, this.options.source.data ? (this.render(), this.buildList()) : this.fetchData((function() {
                                    t.render(), t.buildList()
                                })), this.checkDisabled(), this.setStyle(), this.setWidth(), this.setSize(!0), this.$element.trigger("refreshed" + W)
                            },
                            hide: function() {
                                this.$newElement.hide()
                            },
                            show: function() {
                                this.$newElement.show()
                            },
                            remove: function() {
                                this.$newElement.remove(), this.$element.remove()
                            },
                            destroy: function() {
                                this.$newElement.before(this.$element).remove(), this.$bsContainer ? this.$bsContainer.remove() : this.$menu.remove(), this.selectpicker.view.titleOption && this.selectpicker.view.titleOption.parentNode && this.selectpicker.view.titleOption.parentNode.removeChild(this.selectpicker.view.titleOption), this.$element.off(W).removeData("selectpicker").removeClass("bs-select-hidden selectpicker mobile-device"), e(window).off(W + "." + this.selectId)
                            }
                        };
                        var Y = e.fn.selectpicker;

                        function Z() {
                            return M.major < 5 ? e.fn.dropdown ? (e.fn.dropdown.Constructor._dataApiKeydownHandler || e.fn.dropdown.Constructor.prototype.keydown).apply(this, arguments) : void 0 : N.dataApiKeydownHandler
                        }
                        e.fn.selectpicker = Q, e.fn.selectpicker.Constructor = K, e.fn.selectpicker.noConflict = function() {
                            return e.fn.selectpicker = Y, this
                        }, e(document).off("keydown.bs.dropdown.data-api").on("keydown.bs.dropdown.data-api", ":not(.bootstrap-select) > [" + R.DATA_TOGGLE + "]", Z).on("keydown.bs.dropdown.data-api", ":not(.bootstrap-select) > .dropdown-menu", Z).on("keydown" + W, ".bootstrap-select [" + R.DATA_TOGGLE + '], .bootstrap-select [role="listbox"], .bootstrap-select .bs-searchbox input', K.prototype.keydown).on("focusin.modal", ".bootstrap-select [" + R.DATA_TOGGLE + '], .bootstrap-select [role="listbox"], .bootstrap-select .bs-searchbox input', (function(e) {
                            e.stopPropagation()
                        })), document.addEventListener("DOMContentLoaded", (function() {
                            e(".selectpicker").each((function() {
                                var t = e(this);
                                Q.call(t, t.data())
                            }))
                        }))
                    }(jQuery)
                }
            },
            t = {};

        function i(s) {
            var n = t[s];
            if (void 0 !== n) return n.exports;
            var o = t[s] = {
                exports: {}
            };
            return e[s](o, o.exports, i), o.exports
        }
        i.n = function(e) {
            var t = e && e.__esModule ? function() {
                return e.default
            } : function() {
                return e
            };
            return i.d(t, {
                a: t
            }), t
        }, i.d = function(e, t) {
            for (var s in t) i.o(t, s) && !i.o(e, s) && Object.defineProperty(e, s, {
                enumerable: !0,
                get: t[s]
            })
        }, i.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }, i.r = function(e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }), Object.defineProperty(e, "__esModule", {
                value: !0
            })
        };
        var s = {};
        return function() {
            "use strict";
            i.r(s), i(1936)
        }(), s
    }()
}));