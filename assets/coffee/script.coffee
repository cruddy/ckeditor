class Cruddy.Inputs.CKEditor extends Cruddy.Inputs.Base

    initialize: (options) ->
        options = $.extend { language: Cruddy.locale }, options.editor_options

        @editor = editor = CKEDITOR.appendTo @el, options

        editor.on "change", => @setValue editor.getData()

        editor.on "mode", =>
            if editor.mode is "source"
                $(editor.editable().$).on "change", (e) =>
                    @setValue e.target.value

                    return

            return

        super

    applyChanges: (data, external) ->
        @editor.setData data if external

        return this

    remove: ->
        @editor.destroy()

        super

class Cruddy.Fields.CKEditor extends Cruddy.Fields.Base

    createEditableInput: (model, inputId) ->  new Cruddy.Inputs.CKEditor
        model: model
        key: @id
        attributes: id: inputId
        editor_options: @attributes.editor_options

    format: (value) -> if value then "<pre class=limit-height>#{ value }</pre>" else super

    getType: -> "ckeditor"