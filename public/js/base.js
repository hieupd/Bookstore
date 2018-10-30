var $defaultOptionsJTable = {
    paging: true, //Enable paging
    pageSize: 10, //Set page size (default: 10)
    pageSizes: [10, 20, 50, 100],
    pageSizeChangeArea: true,
    gotoPageArea: 'textbox', //possible values: 'textbox', 'combobox', 'none'
    sorting: true, //Enable sorting
    animationsEnabled: true,
    defaultDateFormat: 'dd/mm/yy',
    dialogShowEffect: 'fade',
    dialogHideEffect: 'fade',
    showCloseButton: false,
    loadingAnimationDelay: 500,
    saveUserPreferences: true,
    jqueryuiTheme: true,
    unAuthorizedRequestRedirectUrl: null,
    messages: {
        //Delete
        deleteConfirmation: 'Bạn có chắc chắn muốn xóa bản ghi này?',
        deleteText: 'Xóa',
        deleting: 'Đang xóa...',
        canNotDeletedRecords: 'Không thể xóa {0}/{1} bản ghi!',
        deleteProggress: 'Đang thực hiệc xóa {0}/{1} bản ghi...',
        //Paging
        pagingInfo: '{0} - {1} / {2} bản ghi',
        pageSizeChangeLabel: 'Số bản ghi mỗi trang',
        gotoPageLabel: 'Đi đến',
        //Notice
        serverCommunicationError: 'Lỗi kết nối với server.',
        loadingMessage: 'Đang tải bản ghi...',
        noDataAvailable: 'Không có dữ liệu!',
        areYouSure: 'Thông báo',
        save: 'Lưu',
        saving: 'Đang lưu...',
        cancel: 'Đóng',
        error: 'Lỗi',
        close: 'Đóng',
        cannotLoadOptionsFor: 'Can not load options for field {0}',
        //
        addNewRecord: 'Thêm mới',
        editRecord: 'Sửa'
    }
};

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};


(function ($) {
    $.JTABLE = function ($opt) {
        return $.extend($defaultOptionsJTable, $opt)
    };

    $.ALERT = function ($text, $type) {
        $type = $type || 'info';
        return toastr[$type]($text, 'Thông báo');
    };

})(jQuery);

var knnLoading = function () {
    return {
        show: function () {
            $('#knnLoading').fadeIn(300);
            $('body').append('<div id="loading_over"></div>');
            $('#loading_over').fadeIn(300);
            return false;
        },
        hide: function () {
            $('#loading_over, #knnLoading').fadeOut(300, function () {
                $('#loading_over').remove();

            });

        }
    }
}();

var knn = function () {
    return {
        domain: 'knn-haui.edu.vn',
        convertDateJTable: function (date, formatdate) {
            formatdate = formatdate || $defaultOptionsJTable.defaultDateFormat;
            var self = this;
            return $.datepicker.formatDate(formatdate, self._parseDate(date));
        },
        _parseDate: function (dateString) {
            if (dateString.indexOf('Date') >= 0) { //Format: /Date(1320259705710)/
                return new Date(
                    parseInt(dateString.substr(6), 10)
                );
            } else if (dateString.length == 10) { //Format: 2011-01-01
                return new Date(
                    parseInt(dateString.substr(0, 4), 10),
                    parseInt(dateString.substr(5, 2), 10) - 1,
                    parseInt(dateString.substr(8, 2), 10)
                );
            } else if (dateString.length == 19) { //Format: 2011-01-01 20:32:42
                return new Date(
                    parseInt(dateString.substr(0, 4), 10),
                    parseInt(dateString.substr(5, 2), 10) - 1,
                    parseInt(dateString.substr(8, 2, 10)),
                    parseInt(dateString.substr(11, 2), 10),
                    parseInt(dateString.substr(14, 2), 10),
                    parseInt(dateString.substr(17, 2), 10)
                );
            } else {
                this._logWarn('Given date is not properly formatted: ' + dateString);
                return 'format error!';
            }
        },
        lastName: function (e) {
            e = $.trim(e);
            var d = e.lastIndexOf(" ");
            if (d === -1) {
                return e
            }
            var f = e.length;
            return e.substring(d + 1, f)
        },
        render: function (html, data) {
            if (data)
                return $('<div></div>').render(html, data).html();
            return html.replace(/\$/g, '')
        },
        popup: function (html, title, settings) {
            var dWidth = $(window).width() * 0.4;
            var dHeight = $(window).height() * 0.6;
            title = title || 'Popup';
            var $defaultOpts = {
                modal: true,
                height: dHeight,
                width: dWidth,
                hideTitleCloseBtn: false
            };
            var options = $.extend($defaultOpts, settings);
            var $dialog = $('<div></div>')
                .html(html)
                .dialog({
                    closeOnEscape: false,
                    resizable: false,
                    modal: options.height,
                    height: options.height,
                    width: options.width,
                    title: title,
                    // create: function () {
                    //     $("body").addClass('stop-scrolling')
                    // },
                    // beforeClose: function () {
                    //     $("body").removeClass('stop-scrolling')
                    // },
                    open: function () {
                        options.hideTitleCloseBtn ? $(".ui-dialog-titlebar-close").hide() : null;
                        $(this).parent().promise().done(options.afterShow);
                    },
                    close: function () {
                        $(this).parent().promise().done(options.afterClose);
                    },
                    buttons: options.buttons
                });
            console.log($dialog.dialog('option', 'buttons'));
            $dialog.dialog('open');
            $('.ui-dialog-buttonset button').addClass('btn btn-white btn-bold').blur();
        },
        alert: function ($text, $type, $title) {
            $type = $type || 'info';
            $title = $title || 'Thông báo';
            toastr[$type]($text, $title);
        }
    }
}();

