(function () {
  tinymce.PluginManager.add('wp_ui_semantic', function(editor, url) {
    editor.addButton('wp_ui_semantic', {
      icon: true,
      image: url+'/../img/semantic.png',
      type: 'listbox',
      text: 'Semantic-Ui',

      onselect: function (e) {

        switch (this.value()) {
          case "button":
            openButtonShortcode(editor,url)
            break
          case "callout":
            openCalloutShortcode(editor)
            break;
          case "section":
            openSectionShortcode(editor)
            break
          case "card":
            openCardShortcode(editor)
            break;
		  case "image":
            openCardShortcode(editor)
            break;
        }

      },
      values: [
        { text: 'Button', value: 'button' },
        { text: 'Callout', value: 'callout' },
        { text: 'Section', value: 'section' },
        { text: 'Card', value: 'card' },
		{ text: 'Image', value: 'image' }
      ]

    });

  });

  function openButtonShortcode(editor,url){
    console.log(tinymce);
    editor.windowManager.open({
      title: 'Semantic UI Button plugin',
      url: url+'/../templates/semanticUi/buttons.php',
      width: 900,
      height: 550
    });
  }

  function openCalloutShortcode(editor){
    editor.windowManager.open({
      title: 'App-Arena Callout',
      body: [
        {type: 'textbox',  name: 'caption', label: 'Caption'},
        {type: 'textbox', multiline: true, name: 'text', label: 'Callout Text'},
        {type:'listbox', name: 'color',label: 'Color', values:[
          { text: 'Primary', value: 'primary' },
          { text: 'Success', value: 'success' },
          { text: 'Info', value: 'info' },
          { text: 'Warning', value: 'warning' },
          { text: 'Danger', value: 'danger' },
        ] }

      ],
      onsubmit: function(e) {
        // Insert content when the window form is submitted
        const shortcode='[aa_callout color="'+e.data.color+'" caption="'+ e.data.caption +'"  ]'+ e.data.text +'[/aa_callout]'
        editor.insertContent(shortcode);
      }
    });
  }

  function openSectionShortcode(editor){



    editor.windowManager.open({
      title: 'App-Arena Section',
      body: [
        {type: 'textbox',  name: 'title', label: 'Section Title'},
        {type: 'textbox', multiline: true, name: 'content', label: 'Section Content'},
        {type:'listbox', name: 'position',label: 'Position', values:[
          { text: 'Left', value: 'left' },
          { text: 'Right', value: 'right' }
        ] },
        {type:'button', name: 'image',label: 'Section Image', value: "test" , text:"Select Image",onclick: function(){uploadImage(editor);} },

      ],
      onsubmit: function(e) {
        var  img= editor.settings.addImage;
        if(img==undefined || img==""){
          img={'url':"", "link": ""}
        }
        // Insert content when the window form is submitted
        const shortcode='[aa_section  caption="'+ e.data.title +'" img_url="'+ img.url +'" img_href="'+ img.link +' " position="'+ e.data.position +'" ]'+ e.data.content +'[/aa_section]'
        editor.insertContent(shortcode);
        editor.settings.addImage="";

      }
    });

  }

  function openCardShortcode(editor){

    editor.windowManager.open({
      title: 'App-Arena Card',
      body: [
        {type: 'textbox',  name: 'title', label: 'Card Title'},
        {type: 'textbox', multiline: true, name: 'content', label: 'Card Content'},
        {type: 'textbox', name: 'custom_class', label: 'Custom Style'},
        {type:'button', name: 'image',label: 'Card Image', value: "test" , text:"Select Image",onclick: function(){uploadImage(editor);} },
        {type: 'textbox', name: 'btn_text', label: 'Card Button Content'},
        {type: 'textbox',  name: 'btn_url', label: 'Card Button Url'},

      ],
      onsubmit: function(e) {
        var img= editor.settings.addImage;

        if(img==undefined || img==""){
          img={'url':"", "link": ""}
        }
        // Insert content when the window form is submitted
        const shortcode='[aa_card  title="'+ e.data.title +'" img_url="'+img.url +'" img_href="'+ img.link +' " btn_text="'+ e.data.btn_text +'" btn_url="'+ e.data.btn_url +'" custom_class="'+ e.data.custom_class +'" ]'+ e.data.content +'[/aa_card]'
        editor.insertContent(shortcode);
        editor.settings.addImage="";
      }
    });

  }
  
  function openCardShortcode(editor){

    editor.windowManager.open({
      title: 'App-Arena Image',
      body: [
        {type:'button', name: 'image',label: 'Image', value: "test" , text:"Select Image",onclick: function(){uploadImage(editor);} },
        {type: 'textbox', name: 'img_href', label: 'Link To'},
        {type:'listbox', name: 'size',label: 'Size', values:[
		  {text: 'Original', value: ''},
          {text: 'Mini', value: 'mini'},
          {text: 'Tiny', value: 'tiny'},
          {text: 'Small', value: 'small'},
          {text: 'Medium', value: 'medium'},
          {text: 'Large', value: 'large'},
		  {text: 'Big', value: 'big'},
		  {text: 'Huge', value: 'huge'},
		  {text: 'Massive', value: 'massive'}
        ] },
		{type:'listbox', name: 'variation',label: 'Variation', values:[
		  {text: 'None', value: ''},
          {text: 'Avatar', value: 'avatar'},
          {text: 'Fluid', value: 'fluid'},
          {text: 'Top Aligned', value: 'top aligned'},
          {text: 'Middle Aligned', value: 'middle aligned'},
          {text: 'Bottom Aligned', value: 'bottom aligned'},
		  {text: 'Centered', value: 'centered'},
		  {text: 'Spaced', value: 'spaced'},
		  {text: 'Left Floated', value: 'left floated'},
		  {text: 'Right Floated', value: 'right floated'}
        ] },
		{type:'listbox', name: 'shape',label: 'Shape', values:[
		  {text: 'Original', value: ''},
          {text: 'Rounded', value: 'rounded'},
          {text: 'Circular', value: 'circular'}
        ] },
        {type: 'checkbox', name: 'bordered', label: 'Bordered'}
      ],
      onsubmit: function(e) {
        var img= editor.settings.addImage;

		if(img==undefined || img==""){
          img={'url':"", "link": ""}
        }
        // Insert content when the window form is submitted
        const shortcode='[aa_image img_url="'+img.url +'" ' + 
						'img_href="'+ e.data.img_href +'" ' +
						'size="'+ e.data.size +'" ' +
						'variation="'+ e.data.variation +'" ' +
						'shape="'+ e.data.shape +'" ' +
						'bordered="'+ e.data.bordered +'" ' +
						'][/aa_image]'
        editor.insertContent(shortcode);
        editor.settings.addImage="";
      }
    });

  }
  
  function uploadImage(e) {
    var image_frame = wp.media({
      title: 'Select Media',
      multiple : false,
      library : {
        type : 'image',
      }
    });

    image_frame.on('close',function() {
      // On close, get selections and save to the hidden input
      // plus other AJAX stuff to refresh the image preview
      var attachment = image_frame.state().get('selection').first().toJSON();

      e.settings.addImage=attachment;
    });


    image_frame.on('open',function() {
      // On open, get the id from the hidden input
      // and select the appropiate images in the media manager
      var selection =  image_frame.state().get('selection');

      //var img='<img src='
      return selection;

    });

    image_frame.open();
  }
})();