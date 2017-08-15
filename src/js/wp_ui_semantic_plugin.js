(function () {
  tinymce.PluginManager.add('wp_ui_semantic', function(editor, url) {
    editor.addButton('wp_ui_semantic', {
      icon: true,
      image: url+'/img/semantic.png',
      type: 'listbox',
      text: 'Semantic-Ui',

      onselect: function (e) {

        switch (this.value()) {
          case "callout":
            openCalloutShortcode(editor)
            break;
          case "button":
            openButtonShortcode(editor)
            break
          case "section":
            openSectionShortcode(editor)
            break
          case "card":
            openCardShortcode(editor)
            break;
        }

      },
      values: [
        { text: 'Callout', value: 'callout' },
        { text: 'Button', value: 'button' },
        { text: 'Section', value: 'section' },
        { text: 'Card', value: 'card' }
      ]

    });

  });

  function openButtonShortcode(editor){
    editor.windowManager.open({
      title: 'App-Arena Button',
      body: [
        {type: 'textbox', name: 'title', label: 'Text'},
        {type: 'textbox', name: 'link_url', label: 'Link Url'},
        {type:'listbox', name: 'color',label: 'Color', values:[
          { text: 'Primary', value: 'primary' },
          { text: 'Success', value: 'success' },
          { text: 'Info', value: 'info' },
          { text: 'Warning', value: 'warning' },
          { text: 'Danger', value: 'danger' },
        ] },
        {type:'listbox', name: 'size',label: 'Size', values:[
          { text: 'Default', value: ' ' },
          { text: 'Large', value: 'lg' },
          { text: 'Small', value: 'sm' },
          { text: 'XSmall', value: 'xs' }

        ] },
        {type:'listbox', name: 'target',label: 'Target', values:[
          { text: '_blank', value: '_blank' },
          { text: '_self', value: '_self' },
          { text: '_parent', value: '_parent' },
          { text: '_top', value: '_top' }
        ] }


      ],
      onsubmit: function(e) {
        // Insert content when the window form is submitted
        console.log(e.data.color)
        const shortcode='[aa_button color="'+e.data.color+'" size="'+e.data.size+'" link_url="'+e.data.link_url+'" target="'+e.data.target+'" ]'+e.data.title+'[/aa_button]'
        editor.insertContent(shortcode);
      }
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
        if(img==undefined){
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

        if(img==undefined){
          img={'url':"", "link": ""}
        }
        // Insert content when the window form is submitted
        const shortcode='[aa_card  title="'+ e.data.title +'" img_url="'+img.url +'" img_href="'+ img.link +' " btn_text="'+ e.data.btn_text +'" btn_url="'+ e.data.btn_url +'" custom_class="'+ e.data.custom_class +'" ]'+ e.data.content +'[/aa_card]'
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