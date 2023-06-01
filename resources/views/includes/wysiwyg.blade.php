<div>
    <script>
      var tinyConfig{{ $wysiwygFieldName }} = {
        path_absolute: '/',
        selector: '#wysiwyg{{ $wysiwygFieldName }}',
        plugins: 'paste print preview  searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help code',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
        schema: 'html5',
        relative_urls: false,
        remove_script_host: true,
        document_base_url: '{{config('app.url')}}/',
        min_height: 350,
        autoresize_min_height: 350,
          setup: function (editor) {
            var toggleState = false;               
            editor.on('init change', function () {
              editor.save();
            });
            editor.on('change', function (e) {
              @this.set('{{ $wysiwygFieldName }}', editor.getContent());
            });
          },
      };
      tinymce.init(tinyConfig{{ $wysiwygFieldName }});
    </script>
    <div wire:ignore>
      <textarea 
        id="wysiwyg{{ $wysiwygFieldName }}" 
        rows="20" 
        wire:model.lazy="{{ $wysiwygFieldName }}"
        wire:key="wysiwyg{{ time().$wysiwygFieldName }}"></textarea>
    </div>
    <script>
      if ((typeof tinyMCE != 'undefined') && (typeof tinyMCE.get("wysiwyg{{ $wysiwygFieldName }}").initialized !== null)) {
          tinyMCE.get("wysiwyg{{ $wysiwygFieldName }}").remove();
          tinyMCE.execCommand("mceToggleEditor", false, "wysiwyg{{ $wysiwygFieldName }}");
      }
    </script>
  </div>