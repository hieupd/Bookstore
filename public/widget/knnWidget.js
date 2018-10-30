var kWidget = (function () {
    return {
        s: function (cls, rel, val) {
            var _$clsrel_ = cls + rel;
            $('.' + _$clsrel_).each(function () {
                var dt = $(this);
                dt.html(val).removeClass(_$clsrel_);
            })
        },
        callserver: function (cls) {
            var params = {};
            $('.' + cls).each(function () {
                var rel = this.getAttribute('rel');
                if (rel && rel !== '' && parseInt(rel) > 0) {
                    params[rel] = 1;
                    $(this).addClass(cls + rel);
                    this.removeAttribute('rel');
                }
            });
            function call(_$params_) {
                $.getScript('/admin/widget/' + cls + '?ids=' + _$params_.join(','));
            }

            var _$params_ = [];
            for (var p in params) {
                _$params_.push(p);
                if (_$params_.length >= 50) {
                    call(_$params_);
                    _$params_ = [];
                }
            }
            if (_$params_.length > 0)
                call(_$params_);
        },
        cid2name: function () {
            this.callserver('cid2name')
        }
    };
})();

var userWidget = (function () {
    return {
        a3: function (b, a, c) {
            $("." + b).each(function () {
                var d = $(this);
                if (c && c !== "" && d.hasClass("username")) {
                    d.html(c)
                } else {
                    if (d.hasClass("lastname")) {
                        a = knn.lastName(a)
                    }
                    if (a && a !== "") {
                        d.html(a)
                    }
                }
                d.removeClass(b)
            })
        }, dus: function (a, b, c) {
            this.a3("sdwgU" + a, b, c)
        }, dut: function (a, b, c) {
            this.a3("tdwgU" + a, b, c);
        }, a0: function (c, d) {
            var b = [];
            for (var a in c) {
                b.push(a);
                if (b.length >= 50) {
                    d(b);
                    b = []
                }
            }
            if (b.length > 0) {
                d(b)
            }
        }, user: function () {
            var a = {}, c = {};
            $(".savatar,.sdisplay,.tavatar,.tdisplay").each(function () {
                var d = this.getAttribute("rel");
                if (d && d !== "") {
                    var g = $(this);
                    var e = g.hasClass("savatar") || g.hasClass("sdisplay");
                    var sa = g.hasClass("savatar"), ta = g.hasClass("tavatar");
                    if (sa || ta) {
                        var h = this.getAttribute("wid"), o = g.hasClass("iscircle"), u = g.hasClass('hasborder');
                        if (!h) {
                            h = 50
                        } else {
                            h = parseInt(h);
                            this.removeAttribute("wid")
                        }
                        if (h === 50 || h === 100 || h === 150) {
                            var x = ta ? 't' : 's';
                            var f = '//dnn.vn/rs/media/' + x + '/' + d + '.jpg';
                            if (o) {
                                g.removeClass("iscircle");
                                this.innerHTML = knn.render('<img class="nav-user-photo" src="' + f + '" ' +
                                    'style="max-width:${width}px">', {'width': h});
                            }
                            else if (u) {
                                g.removeClass("hasborder");
                                this.innerHTML = knn.render('<span class="profile-picture"><img class="img-responsive" ' +
                                    'src="' + f + '" width="${width}"></span>', {'src': f, 'width': h});
                            }
                            else
                                this.innerHTML = knn.render('<img class="img-responsive" ' +
                                    'src="' + f + '" width="${width}">', {'width': h})
                        }
                    } else {
                        if (e) {
                            a[d] = 1;
                            g.addClass("sdwgU" + d)
                        } else {
                            c[d] = 1;
                            g.addClass("tdwgU" + d)
                        }
                    }
                    this.removeAttribute("rel");
                }
            });
            if (a !== {}) {
                this.a0(a, function (d) {
                    $.getScript("/admin/widget/student?u=" + d.join("|"))
                })
            }
            if (c !== {}) {
                this.a0(c, function (d) {
                    $.getScript("/admin/widget/teacher?u=" + d.join("|"))
                })
            }
        }
    }
})();