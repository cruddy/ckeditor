(function() {
  var __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  Cruddy.Inputs.CKEditor = (function(_super) {
    __extends(CKEditor, _super);

    function CKEditor() {
      return CKEditor.__super__.constructor.apply(this, arguments);
    }

    CKEditor.prototype.initialize = function(options) {
      var editor;
      options = $.extend({
        language: Cruddy.locale
      }, options.editor_options);
      this.editor = editor = CKEDITOR.appendTo(this.el, options);
      editor.on("change", (function(_this) {
        return function() {
          return _this.setValue(editor.getData());
        };
      })(this));
      editor.on("mode", (function(_this) {
        return function() {
          if (editor.mode === "source") {
            $(editor.editable().$).on("change", function(e) {
              _this.setValue(e.target.value);
            });
          }
        };
      })(this));
      return CKEditor.__super__.initialize.apply(this, arguments);
    };

    CKEditor.prototype.applyChanges = function(data, external) {
      if (external) {
        this.editor.setData(data);
      }
      return this;
    };

    CKEditor.prototype.remove = function() {
      this.editor.destroy();
      return CKEditor.__super__.remove.apply(this, arguments);
    };

    return CKEditor;

  })(Cruddy.Inputs.Base);

  Cruddy.Fields.CKEditor = (function(_super) {
    __extends(CKEditor, _super);

    function CKEditor() {
      return CKEditor.__super__.constructor.apply(this, arguments);
    }

    CKEditor.prototype.createEditableInput = function(model, inputId) {
      return new Cruddy.Inputs.CKEditor({
        model: model,
        key: this.id,
        attributes: {
          id: inputId
        },
        editor_options: this.attributes.editor_options
      });
    };

    CKEditor.prototype.format = function(value) {
      if (value) {
        return "<pre class=limit-height>" + value + "</pre>";
      } else {
        return CKEditor.__super__.format.apply(this, arguments);
      }
    };

    CKEditor.prototype.getType = function() {
      return "ckeditor";
    };

    return CKEditor;

  })(Cruddy.Fields.Base);

}).call(this);

//# sourceMappingURL=script.js.map
