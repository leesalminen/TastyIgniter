+function ($) {
    "use strict";

    var PaymentEditor = function (element, options) {
        this.$el = $(element)
        this.options = options
        this.editorModal = null

        this.init()
    }

    PaymentEditor.prototype.constructor = PaymentEditor

    PaymentEditor.prototype.dispose = function () {
        this.editorModal.remove()
        this.editorModal = null
    }

    PaymentEditor.prototype.init = function () {
        this.$el.on('click', '[data-editor-control]', $.proxy(this.onControlClick, this))
    }

    PaymentEditor.prototype.loadRecordForm = function (event) {
        var $button = $(event.currentTarget)

        this.editorModal = new $.ti.recordEditor.modal({
            alias: this.options.alias,
            recordId: $button.data('payment-code'),
            onSave: function () {
                this.hide()
            }
        })
    }

    // EVENT HANDLERS
    // ============================

    PaymentEditor.prototype.onControlClick = function (event) {
        var control = $(event.currentTarget).data('editor-control')

        switch (control) {
            case 'load-item':
                this.loadRecordForm(event)
                break;
        }
    }

    PaymentEditor.DEFAULTS = {
        data: {},
        alias: undefined
    }

    // FormTable PLUGIN DEFINITION
    // ============================

    var old = $.fn.paymentEditor

    $.fn.paymentEditor = function (option) {
        var args = Array.prototype.slice.call(arguments, 1), result
        this.each(function () {
            var $this = $(this)
            var data = $this.data('ti.paymentEditor')
            var options = $.extend({}, PaymentEditor.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('ti.paymentEditor', (data = new PaymentEditor(this, options)))
            if (typeof option == 'string') result = data[option].apply(data, args)
            if (typeof result != 'undefined') return false
        })

        return result ? result : this
    }

    $.fn.paymentEditor.Constructor = PaymentEditor

    // PaymentEditor NO CONFLICT
    // =================

    $.fn.paymentEditor.noConflict = function () {
        $.fn.paymentEditor = old
        return this
    }

    // PaymentEditor DATA-API
    // ===============
    $(document).render(function () {
        $('[data-control="paymenteditor"]').paymentEditor()
    })
}(window.jQuery);
