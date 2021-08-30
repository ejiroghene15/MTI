<script>
    $('.dropify').dropify();
    ClassicEditor.create(document.querySelector(".editor"), {
        toolbar: {
        items: [
            'imageUpload',
            'mediaEmbed',
            'heading',
            '|',
            'bold',
            'italic',
            'underline',
            'link',
            '|',
            'bulletedList',
            'numberedList',
            'blockQuote',
            '|'
        ]
    },
    image: {
        toolbar: [
            'imageTextAlternative',
            'imageStyle:full',
            'imageStyle:side'
        ]
    },
	simpleUpload: {
		// The URL the images are uploaded to.
		uploadUrl: "/api/upload"
	}
}).then(editor => {
    let article = '{!! @$article->body !!}';
    let old = '{!! old('body') !!}';
   let app = old != "" ? old : article;
    editor.setData(app);
});
</script>
